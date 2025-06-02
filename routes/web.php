<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('home');
});

Route::resource('pelanggan', PelangganController::class);
Route::resource('karyawan', KaryawanController::class);
Route::resource('produk', ProdukController::class);
Route::resource('janjitemu', JanjiTemuController::class);
Route::resource('transaksi', TransaksiController::class);

