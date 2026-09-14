<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemPenjualanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisController; 

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // RUTE HALAMAN TENTANG KAMI (Bisa diakses Admin & Kasir setelah login)
    Route::get('/tentang-kami', function () {
        return view('tentang kami.index');
    })->name('tentang.kami');

    // GRUP KHUSUS ADMIN (Data users tetap terkunci hanya untuk admin)
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // GRUP BERSAMA: ADMIN & KASIR (Akses jenis dipindahkan ke sini agar kasir bisa melihat data)
    Route::middleware('role:admin,kasir')->group(function () {
        Route::resource('/produk', ProdukController::class);
        Route::resource('/penjualan', PenjualanController::class);
        Route::resource('/itempenjualan', ItemPenjualanController::class);
        
        Route::get('/admin/jenis', [JenisController::class, 'index'])->name('admin.jenis.index');
        Route::post('/admin/jenis/store', [JenisController::class, 'store'])->name('admin.jenis.store');
        Route::put('/admin/jenis/update/{id}', [JenisController::class, 'update'])->name('admin.jenis.update');
        Route::delete('/admin/jenis/destroy/{id}', [JenisController::class, 'destroy'])->name('admin.jenis.destroy');
    });
});
