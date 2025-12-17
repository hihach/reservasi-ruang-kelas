<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RuangController; // <-- Jangan lupa import Controller baru ini
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Peta Jalan Aplikasi (Updated)
| Sekarang semua logic sudah rapi masuk ke Controller masing-masing.
|
*/

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


    // --- B. FITUR RUANGAN (List & Filter) ---
    // Menggunakan RuangController yang baru lo kasih.

    // 1. List Semua Ruangan (Bisa Filter Lantai & Search dari Controller)
    Route::get('/ruangan', [RuangController::class, 'index'])->name('ruangan.index');



    // --- C. ALUR BOOKING (RESERVASI) ---

    // 1. Pilih Jam (Grid Kotak-Kotak)
    // URL: /booking?class_id=1&date=2024-12-12
    Route::get('/booking', [ReservasiController::class, 'create'])->name('reservasi.create');

    // 2. Form Review & Input Alasan
    Route::get('/booking/form', [ReservasiController::class, 'tampilkanForm'])->name('reservasi.form');

    // 3. Proses Simpan ke Database (POST)
    Route::post('/booking', [ReservasiController::class, 'store'])->name('reservasi.store');


    // --- D. FITUR MONITORING & NOTIFIKASI ---

    // 1. Riwayat Reservasi
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');

    // 2. Notifikasi
    Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');

    // (Tambahan) Aksi tandai sudah dibaca & hapus semua
    Route::post('/notifikasi/{id}/read', [NotifikasiController::class, 'markAsRead'])->name('notifikasi.read');
    Route::post('/notifikasi/clear', [NotifikasiController::class, 'clearAll'])->name('notifikasi.clear');
});

// =========================================================================
// 3. ROUTE AUTH (Breeze)
// =========================================================================
require __DIR__ . '/auth.php';
