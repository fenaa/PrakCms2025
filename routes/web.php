<?php

use App\Http\Controllers\UserController;

Route::get('/User', [UserController::class, 'index']);
Route::get('/User/{id}', [UserController::class, 'show']);
Route::get('/User/{id}/edit', [UserController::class, 'edit']);
Route::get('/User/{id}/delete', [UserController::class, 'confirmDelete']);





