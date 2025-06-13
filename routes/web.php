<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('home');
});

Route::resource('pelanggan', PelangganController::class);
Route::resource('karyawan', KaryawanController::class);
Route::get('produk/create', [ProdukController::class, 'create'])->middleware('check.role')->name('produk.create');
Route::resource('produk', ProdukController::class)->except(['create']);
Route::resource('janjitemu', JanjiTemuController::class);
Route::resource('transaksi', TransaksiController::class);

// Rute Upload Gambar
Route::get('/upload', [ImageController::class, 'create'])->name('image.create');
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.destroy');

