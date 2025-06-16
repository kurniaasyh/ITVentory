<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Models\Inventory;

// Route utama
Route::get('/', function () {
    return view('welcome');
});

// Halaman statis
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

    // Helpdesk dan profile
    Route::view('/helpdesk', 'helpdesk')->name('helpdesk');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
