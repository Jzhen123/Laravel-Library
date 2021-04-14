<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books/all', [App\Http\Controllers\BookController::class, 'index']);

Route::get('/books/new', [App\Http\Controllers\BookController::class, 'create']);

Route::get('/books/show/{id}', [App\Http\Controllers\BookController::class, 'show']);

Route::get('/books/update/{id}', [App\Http\Controllers\BookController::class, 'update']);

Route::get('/books/delete/{id}', [App\Http\Controllers\BookController::class, 'delete']);



Route::get('/checkouts/all', [App\Http\Controllers\CheckoutController::class, 'index']);

Route::get('/checkouts/new', [App\Http\Controllers\CheckoutController::class, 'create']);

Route::get('/checkouts/show/{id}', [App\Http\Controllers\CheckoutController::class, 'show']);

Route::get('/checkouts/update/{id}', [App\Http\Controllers\CheckoutController::class, 'update']);

Route::get('/checkouts/delete/{id}', [App\Http\Controllers\CheckoutController::class, 'delete']);





