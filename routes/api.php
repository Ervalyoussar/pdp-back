<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/invoices/convert', [App\Http\Controllers\InvoiceController::class, 'convertInvoice']);

Route::get('/invoice/{id}/pdf', 'App\Http\Controllers\InvoiceController@downloadAsPdf');
Route::get('/invoice/{id}/xml', 'App\Http\Controllers\InvoiceController@downloadAsXml');
