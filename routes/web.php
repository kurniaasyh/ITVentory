<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Inventory;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;

Route::resource('loans', LoanController::class)->middleware('auth');
Route::get('/pinjam', [LoanController::class, 'create'])->name('loan.create');
Route::post('/pinjam', [LoanController::class, 'store'])->name('loan.store');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/admin/admin.dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/admin/management', function () {
    return view('management');
});


Route::middleware(['auth'])->group(function () {
    // Dashboard pakai controller
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route lain boleh pakai closure jika sederhana
    Route::get('/loan-form', function () {
        return view('loan-form');
    })->name('loan-form');

    Route::get('/helpdesk', function () {
        return view('helpdesk');
    })->name('helpdesk');

    // Route profile, dll..
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/loan-form', function () {
        $inventories = Inventory::all();
        return view('loan-form', compact('inventories'));
    })->name('loan-form');
});

require __DIR__.'/auth.php';
