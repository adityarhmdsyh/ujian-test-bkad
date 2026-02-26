<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\TanggapanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('kategori', KategoriController::class);
Route::resource('laporan', LaporanController::class);
Route::resource('tanggapan', TanggapanController::class);
Route::get('/rekap-laporan', [RekapController::class, 'index'])->name('rekap.index');
Route::get('/rekap-laporan/cetak', [RekapController::class, 'cetak_pdf'])->name('rekap.cetak');

