<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = Item::sum('quantity');
        $totalAvailableItems = Item::sum('available_quantity');
        $totalBorrowedItems = $totalItems - $totalAvailableItems;
        $totalCategories = Category::count();
        $totalUsers = User::where('role', 'user')->count();
        $activeBorrowings = Borrowing::where('status', 'dipinjam')->count();
        $overdueBorrowings = Borrowing::where('status', 'terlambat')->count();
        
        $recentBorrowings = Borrowing::with(['user', 'item'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        
        $itemsLowStock = Item::where('available_quantity', '<=', 5)
            ->where('available_quantity', '>', 0)
            ->get();
        
        $itemsOutOfStock = Item::where('available_quantity', 0)->get();
        
        $borrowingsByMonth = Borrowing::selectRaw('MONTH(borrow_date) as month, COUNT(*) as count')
            ->whereYear('borrow_date', Carbon::now()->year)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();
        
        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[] = $borrowingsByMonth[$i] ?? 0;
        }
        
        return view('dashboard.index', compact(
            'totalItems',
            'totalAvailableItems',
            'totalBorrowedItems',
            'totalCategories',
            'totalUsers',
            'activeBorrowings',
            'overdueBorrowings',
            'recentBorrowings',
            'itemsLowStock',
            'itemsOutOfStock',
            'monthlyData'
        ));
    }
}
