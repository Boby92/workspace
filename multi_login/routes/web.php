<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');

// Buyer Dashboard
Route::get('/dashboard', function () {
    return view('buyer.dashboard');
})->middleware(['auth', 'verified', 'buyer'])->name('buyer.dashboard');

// Seller Dashboard
Route::get('/seller/dashboard', function () {
    return view('seller.dashboard');
})->middleware(['auth', 'verified', 'seller'])->name('seller.dashboard');



require __DIR__.'/auth.php';
