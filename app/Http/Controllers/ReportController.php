<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function borrowings(Request $request)
    {
        $query = Borrowing::with(['user', 'item']);

        if ($request->has('start_date') && $request->start_date) {
            $query->where('borrow_date', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date) {
            $query->where('borrow_date', '<=', $request->end_date);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $borrowings = $query->orderBy('borrow_date', 'desc')->get();

        return view('reports.borrowings', compact('borrowings'));
    }

    public function items(Request $request)
    {
        $query = Item::with('category');

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('condition') && $request->condition != '') {
            $query->where('condition', $request->condition);
        }

        $items = $query->get();
        $categories = Category::all();

        return view('reports.items', compact('items', 'categories'));
    }

    public function statistics()
    {
        $totalBorrowings = Borrowing::count();
        $activeBorrowings = Borrowing::where('status', 'dipinjam')->count();
        $returnedBorrowings = Borrowing::where('status', 'dikembalikan')->count();
        $overdueBorrowings = Borrowing::where('status', 'terlambat')->count();

        $mostBorrowedItems = Item::withCount(['borrowings' => function($query) {
            $query->where('status', '!=', 'dikembalikan');
        }])
        ->orderBy('borrowings_count', 'desc')
        ->limit(10)
        ->get();

        $borrowingsByCategory = Category::withCount('items')
            ->with(['items' => function($query) {
                $query->withCount('borrowings');
            }])
            ->get()
            ->map(function($category) {
                return [
                    'name' => $category->name,
                    'total_borrowings' => $category->items->sum('borrowings_count')
                ];
            })
            ->sortByDesc('total_borrowings');

        $monthlyBorrowings = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyBorrowings[] = Borrowing::whereMonth('borrow_date', $i)
                ->whereYear('borrow_date', Carbon::now()->year)
                ->count();
        }

        return view('reports.statistics', compact(
            'totalBorrowings',
            'activeBorrowings',
            'returnedBorrowings',
            'overdueBorrowings',
            'mostBorrowedItems',
            'borrowingsByCategory',
            'monthlyBorrowings'
        ));
    }
}
