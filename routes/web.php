<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\ReportController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('categories', CategoryController::class);

Route::resource('items', ItemController::class);

Route::resource('borrowings', BorrowingController::class);
Route::post('borrowings/{borrowing}/return', [BorrowingController::class, 'return'])->name('borrowings.return');

Route::prefix('reports')->name('reports.')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('index');
    Route::get('/borrowings', [ReportController::class, 'borrowings'])->name('borrowings');
    Route::get('/items', [ReportController::class, 'items'])->name('items');
    Route::get('/statistics', [ReportController::class, 'statistics'])->name('statistics');
});
