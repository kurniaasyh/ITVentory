<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Inventory;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', function () {

        $inventories = Inventory::all();
        return view('dashboard', compact('inventories'));
    })->name('dashboard');

    Route::get('/loan-form', function () {
        return view('loan-form');
    })->name('loan-form');

    Route::get('/helpdesk', function () {
        return view('helpdesk');
    })->name('helpdesk');
});




require __DIR__.'/auth.php';
