<?php

use App\Http\Controllers\API\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/{id}', [LaporanController::class, 'show']);