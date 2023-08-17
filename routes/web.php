<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarianController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\PrintPermohonanController;

// Halaman utama
// Route::redirect('/', '/login');
Route::view('/', 'welcome');

// Route untuk pelawat membuat permohonan pinjaman
Route::get('pinjaman', [PinjamanController::class, 'create'])->name('pinjaman.create');
Route::post('pinjaman', [PinjamanController::class, 'store'])->name('pinjaman.store');
Route::get('pinjaman/status', [PinjamanController::class, 'semakStatus'])->name('pinjaman.status');
Route::get('pinjaman/result', [PinjamanController::class, 'resultStatus'])->name('pinjaman.result');


// Routing carian user
Route::get('carian/pbjwb', [CarianController::class, 'pbjwb'])->name('carian.pbjwb');

// Authentication
Route::get('/login', [LoginController::class, 'borangLogin'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.check');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// Route untuk pengguna/admin sistem
Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', DashboardController::class)->name('dashboard'); // Invokable method. tiada array dan nama function

    Route::get('/profile', fn() => view('template-profile'))->name('profile');
    Route::patch('/profile', fn() => 'Kemaskini profile berjaya')->name('profile.update');

    // CRUD
    // Route::get('/permohonan', fn() => view('folder-permohonan.template-senarai'));
    // Route::get('/permohonan/baru', fn() => view('folder-permohonan.template-borang-baru'));
    // Route::post('/permohonan/baru', fn() => 'Validasi Permohonan');
    // Route::get('/permohonan/{id}/edit', fn() => view('folder-permohonan.template-borang-edit'));
    // Route::patch('/permohonan/{id}/edit', fn() => 'Validasi Kemaskini Permohonan');
    // Route::get('/permohonan/{id}', fn() => view('folder-permohonan.template-detail'));
    // Route::delete('/permohonan/{id}', fn() => 'Remove/Delete Permohonan');

    Route::get('/permohonan/{id}/print', PrintPermohonanController::class)->name('permohonan.print');
    Route::resource('/permohonan', PermohonanController::class);

    // Syarat menggunakan Route resource, pastikan semua function/method di dalam Controller
    // turut menggunakan resource iaitu index, create, store, show, edit, update, destroy
    Route::resource('/users', UserController::class);

    // Contoh routing tanpa menggunakan resource
    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    // Route::post('/users', [UserController::class, 'store'])->name('users.store');
    // Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    // Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
    // Route::patch('/users', [UserController::class, 'update'])->name('users.update');
    // Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');

});
