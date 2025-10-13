<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;

// Redirect root ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard, hanya untuk user yang sudah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// CRUD Departemen & Karyawan, hanya untuk user yang sudah login
Route::resource('departemen', DepartemenController::class)->middleware('auth');
Route::resource('karyawan', KaryawanController::class)->middleware('auth');

// Session / Login Routes
Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'login'])->name('login.post');
Route::post('/logout', [SessionController::class, 'logout'])->middleware('auth')->name('logout');

// Halaman info sesi (misalnya profile atau dashboard user), hanya untuk yang sudah login
Route::get('/sesi', [SessionController::class, 'index'])->middleware('auth')->name('sesi');
