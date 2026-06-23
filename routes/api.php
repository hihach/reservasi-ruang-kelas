<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ReservasiController;
use App\Http\Controllers\Api\RiwayatController;
use App\Http\Controllers\Api\RuangController;
use App\Http\Controllers\Api\NotifikasiController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

  Route::get('/ruangan', [RuangController::class, 'index']);
  Route::get('/ruang/{id}', [RuangController::class, 'show']);

  Route::get('/profile', [ProfileController::class, 'show']);
  Route::put('/profile', [ProfileController::class, 'update']);

  Route::get('/reservasi', [ReservasiController::class, 'index']);
  Route::post('/reservasi', [ReservasiController::class, 'store']);
  Route::get('/reservasi/{id}', [ReservasiController::class, 'show']);
  Route::put('/reservasi/{id}', [ReservasiController::class, 'update']);

  Route::get('/riwayat', [RiwayatController::class, 'index']);

  Route::get('/notifikasi', [NotifikasiController::class, 'index']);
  Route::put('/notifikasi/{id}/read', [NotifikasiController::class, 'markAsRead']);
  Route::put('/notifikasi/clear-all', [NotifikasiController::class, 'clearAll']);

  Route::post('/change-password', [AuthController::class, 'changePassword']);
});



Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
