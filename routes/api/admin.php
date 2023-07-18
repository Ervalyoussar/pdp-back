<?php

/**
 * ADMIN ROUTES
 */

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/user/register', [UserController::class, 'register']);

