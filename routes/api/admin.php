<?php

/**
 * ADMIN ROUTES
 */

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('user/create', function (Request $request) {
    return User::all();
});

