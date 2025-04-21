<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('home');
});

Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/{id}/show', [PelangganController::class, 'show']);
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit']);
Route::get('/pelanggan/{id}/delete', [PelangganController::class, 'destroy']);
