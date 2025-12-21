<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RuangController;
use Illuminate\Support\Facades\Route;


// =========================================================================
// 1. HALAMAN UTAMA (DASHBOARD)
// =========================================================================
Route::get('/', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('pages.home');


// =========================================================================
// 2. GROUP ROUTE KHUSUS USER LOGIN
// =========================================================================
Route::middleware('auth')->group(function () {

    // --- A. FITUR PROFIL (Bawaan Breeze) ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/ruangan', [RuangController::class, 'index'])->name('ruangan.index');



    Route::get('/booking', [ReservasiController::class, 'create'])->name('reservasi.create');

    // 2. Form Review & Input Alasan
    Route::get('/booking/form', [ReservasiController::class, 'tampilkanForm'])->name('reservasi.form');

    // 3. Proses Simpan ke Database (POST)
    Route::post('/booking', [ReservasiController::class, 'store'])->name('reservasi.store');


    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');

    Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');

    Route::post('/notifikasi/{id}/read', [NotifikasiController::class, 'markAsRead'])->name('notifikasi.read');
    Route::post('/notifikasi/clear', [NotifikasiController::class, 'clearAll'])->name('notifikasi.clear');
});

// =========================================================================
// 3. ROUTE AUTH (Breeze)
// =========================================================================
require __DIR__ . '/auth.php';
