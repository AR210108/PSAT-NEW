<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('welcome');
});

// Route resource untuk siswa (lengkap dengan nama-nama route otomatis)
Route::resource('siswa', SiswaController::class);
