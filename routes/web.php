<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Janji_temuController;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('home');
});

// Pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/{id}/show', [PelangganController::class, 'show']);
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit']);
Route::get('/pelanggan/{id}/delete', [PelangganController::class, 'destroy']);

// Transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/{id}/show', [TransaksiController::class, 'show']);
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit']);
Route::get('/transaksi/{id}/delete', [TransaksiController::class, 'destroy']);

// Produk
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}/show', [ProdukController::class, 'show']);
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit']);
Route::get('/produk/{id}/delete', [ProdukController::class, 'destroy']);

// Janji Temu
Route::get('/janji-temu', [Janji_temuController::class, 'index']);
Route::get('/janji-temu/{id}/show', [Janji_temuController::class, 'show']);
Route::get('/janji-temu/{id}/edit', [Janji_temuController::class, 'edit']);
Route::get('/janji-temu/{id}/delete', [Janji_temuController::class, 'delete']);


// Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::get('/karyawan/{id}/show', [KaryawanController::class, 'show']);
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit']);
Route::get('/karyawan/{id}/delete', [KaryawanController::class, 'destroy']);
