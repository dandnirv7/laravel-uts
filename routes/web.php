<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PendaftaranController::class, 'index']);
Route::post('/pendaftaran/simpan', [PendaftaranController::class, 'simpan'])->name('pendaftaran.simpan');