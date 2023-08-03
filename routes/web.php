<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\UserController;

// Halaman utama
Route::get('/', function () {

    return view('welcome');

})->name('utama');


// Route::get('/alamat', function(){});

Route::get('/login', [LoginController::class, 'borangLogin'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.check');


Route::get('/dashboard', DashboardController::class)->name('dashboard'); // Invokable method. tiada array dan nama function

Route::get('/profile', fn() => view('template-profile'));
Route::patch('/profile', fn() => 'Kemaskini profile berjaya');

// CRUD
// Route::get('/permohonan', fn() => view('folder-permohonan.template-senarai'));
// Route::get('/permohonan/baru', fn() => view('folder-permohonan.template-borang-baru'));
// Route::post('/permohonan/baru', fn() => 'Validasi Permohonan');
// Route::get('/permohonan/{id}/edit', fn() => view('folder-permohonan.template-borang-edit'));
// Route::patch('/permohonan/{id}/edit', fn() => 'Validasi Kemaskini Permohonan');
// Route::get('/permohonan/{id}', fn() => view('folder-permohonan.template-detail'));
// Route::delete('/permohonan/{id}', fn() => 'Remove/Delete Permohonan');

Route::resource('/permohonan', PermohonanController::class);

Route::resource('users', UserController::class);
