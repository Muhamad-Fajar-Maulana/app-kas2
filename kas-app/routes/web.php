<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TipeTransaksiController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Redirect ke halaman kas
Route::get('/', function () {
    return redirect()->route('kas.index');
});

// ==============================
// AUTH ROUTES
// ==============================

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// ==============================
// ROUTE YANG HARUS LOGIN
// ==============================

Route::middleware('auth')->group(function () {
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::resource('/user', UserController::class);
    Route::resource('kas', KasController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('tipe_transaksi', TipeTransaksiController::class);

    Route::get('logs', [LogController::class, 'index'])->name('logs.index');
});
