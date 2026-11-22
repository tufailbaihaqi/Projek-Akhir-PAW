<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ServiceController; // <-- 1. TAMBAHKAN BARIS INI

Route::get('/', function () {
    return redirect()->route('login');
});

// Fitur 1: Login & Registrasi (Gambar 2.1 & 2.2)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Fitur 4: Panel Admin - Dashboard & Manajemen Booking (Gambar 2.3)
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::patch('/bookings/{booking}/status', [AdminDashboardController::class, 'updateBookingStatus'])->name('bookings.status');
    Route::get('/services', [ServiceController::class, 'index'])->name('services'); // <-- 2. TAMBAHKAN BARIS INI
});