<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Admin\ExportController;
use App\Models\Inventory;

// Group route dengan middleware Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Manajemen Inventaris
    Route::resource('inventories', InventoryController::class);
});

//download export
Route::get('/admin/export-loans', [ExportController::class, 'export'])->name('admin.loans.export');

// Route utama
Route::get('/', function () {
    return view('welcome');
});

// Menu Halaman utama
Route::get('/auth', fn() => view('auth.login-register'))->name('auth.page')->middleware('guest');
Route::view('/about', 'about');
Route::view('/contact', 'contact');


// Halaman dengan middleware auth
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Loans
    Route::get('/loans/create', [LoanController::class, 'create'])->name('loans.create');
    Route::post('/loans/store', [LoanController::class, 'store'])->name('loans.store');
    
    // Returns
    Route::get('/loans/returns', [LoanController::class, 'returns'])->name('loans.returns');
    Route::post('/loans/return/{loan}', [LoanController::class, 'returnLoan'])->name('returnLoan');

    // History
    Route::middleware(['auth'])->group(function () {
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    });

    // Helpdesk dan profile
    Route::view('/helpdesk', 'helpdesk')->name('helpdesk');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
