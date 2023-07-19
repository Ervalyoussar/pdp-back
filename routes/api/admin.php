<?php

/**
 * ADMIN ROUTES
 */

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// Users CRUD
Route::post('/user/register', [UserController::class, 'register']);
Route::patch('/user/edit/{id}', [UserController::class, 'edit']);
Route::delete('/user/delete/{id}', [UserController::class, 'delete']);
Route::get('/user/{id}', [UserController::class, 'get']);
