<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;

Route::get('/', [PendaftaranController::class, 'index']);
Route::post('/pendaftaran/simpan', [PendaftaranController::class, 'simpan'])->name('pendaftaran.simpan');