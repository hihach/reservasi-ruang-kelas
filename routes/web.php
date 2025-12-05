<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('pages.home'))->name('home');

Route::get('/login', fn() => view('login'))->name('login');
Route::get('/ruangan', fn() => view('pages.ruangan'))->name('ruangan');
Route::get('/jam', fn() => view('pages.jam'))->name('jam');
Route::get('/notifikasi', fn() => view('pages.notifikasi'))->name('notifikasi');
Route::get('/akun', fn() => view('pages.akun'))->name('akun');
Route::get('/riwayat', fn() => view('pages.riwayat'))->name('riwayat');
Route::get('/form', fn() => view('pages.form'))->name('form');
