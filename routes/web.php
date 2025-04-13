<?php

use App\Http\Controllers\UserController;

Route::resource('pengguna', UserController::class);
Route::get('/pengguna/{id}/delete', [UserController::class, 'confirmDelete']);
