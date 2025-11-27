<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowingController extends Controller
{
    public function index(Request $request)
    {
        $query = Borrowing::with(['user', 'item']);

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('borrowing_code', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('item', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $borrowings = $query->orderBy('created_at', 'desc')->paginate(10);

        $this->checkOverdueBorrowings();

        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $items = Item::where('available_quantity', '>', 0)->get();
        $users = User::where('role', 'user')->get();
        return view('borrowings.create', compact('items', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after:borrow_date',
            'purpose' => 'nullable|string',
            'notes' => 'nullable|string',
            'item_condition_borrow' => 'required|in:baik,rusak ringan,rusak berat',
        ]);

        $item = Item::findOrFail($validated['item_id']);

        if ($item->available_quantity < $validated['quantity']) {
            return back()->withErrors([
                'quantity' => 'Jumlah barang tidak tersedia. Tersedia: ' . $item->available_quantity
            ])->withInput();
        }

        $validated['borrowing_code'] = 'BRW-' . date('Ymd') . '-' . str_pad(Borrowing::count() + 1, 4, '0', STR_PAD_LEFT);
        $validated['status'] = 'dipinjam';

        Borrowing::create($validated);

        $item->available_quantity -= $validated['quantity'];
        $item->save();

        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil dicatat!');
    }

    public function show(Borrowing $borrowing)
    {
        $borrowing->load(['user', 'item.category']);
        return view('borrowings.show', compact('borrowing'));
    }

    public function edit(Borrowing $borrowing)
    {
        if ($borrowing->status === 'dikembalikan') {
            return redirect()->route('borrowings.index')
                ->with('error', 'Peminjaman yang sudah dikembalikan tidak dapat diedit!');
        }

        $items = Item::all();
        $users = User::where('role', 'user')->get();
        return view('borrowings.edit', compact('borrowing', 'items', 'users'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        if ($borrowing->status === 'dikembalikan') {
            return redirect()->route('borrowings.index')
                ->with('error', 'Peminjaman yang sudah dikembalikan tidak dapat diedit!');
        }

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after:borrow_date',
            'purpose' => 'nullable|string',
            'notes' => 'nullable|string',
            'item_condition_borrow' => 'required|in:baik,rusak ringan,rusak berat',
        ]);

        $oldItem = Item::findOrFail($borrowing->item_id);
        $newItem = Item::findOrFail($validated['item_id']);

        $oldItem->available_quantity += $borrowing->quantity;
        $oldItem->save();

        if ($newItem->available_quantity < $validated['quantity']) {
            return back()->withErrors([
                'quantity' => 'Jumlah barang tidak tersedia. Tersedia: ' . $newItem->available_quantity
            ])->withInput();
        }

        $newItem->available_quantity -= $validated['quantity'];
        $newItem->save();

        $borrowing->update($validated);

        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil diperbarui!');
    }

    public function return(Request $request, Borrowing $borrowing)
    {
        if ($borrowing->status === 'dikembalikan') {
            return redirect()->route('borrowings.index')
                ->with('error', 'Peminjaman sudah dikembalikan!');
        }

        $validated = $request->validate([
            'return_date' => 'required|date',
            'item_condition_return' => 'required|in:baik,rusak ringan,rusak berat',
            'notes' => 'nullable|string',
        ]);

        $borrowing->return_date = $validated['return_date'];
        $borrowing->item_condition_return = $validated['item_condition_return'];
        $borrowing->status = 'dikembalikan';
        
        if ($request->has('notes')) {
            $borrowing->notes = $validated['notes'];
        }

        $borrowing->save();

        $item = Item::findOrFail($borrowing->item_id);
        $item->available_quantity += $borrowing->quantity;
        
        if ($validated['item_condition_return'] !== 'baik') {
            $item->condition = $validated['item_condition_return'];
        }
        
        $item->save();

        return redirect()->route('borrowings.index')
            ->with('success', 'Barang berhasil dikembalikan!');
    }

    public function destroy(Borrowing $borrowing)
    {
        if ($borrowing->status !== 'dikembalikan') {
            $item = Item::findOrFail($borrowing->item_id);
            $item->available_quantity += $borrowing->quantity;
            $item->save();
        }

        $borrowing->delete();

        return redirect()->route('borrowings.index')
            ->with('success', 'Data peminjaman berhasil dihapus!');
    }

    private function checkOverdueBorrowings()
    {
        $overdueBorrowings = Borrowing::where('status', 'dipinjam')
            ->where('due_date', '<', Carbon::now())
            ->get();

        foreach ($overdueBorrowings as $borrowing) {
            $borrowing->status = 'terlambat';
            $borrowing->save();
        }
    }
}
