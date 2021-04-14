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

// All the User routes
Route::get('/users/all', [App\Http\Controllers\UserController::class, 'index']); // Get all users
Route::post('/users/create', [App\Http\Controllers\UserController::class, 'create']); // Create new user from user input
Route::get('/users/show/{id}', [App\Http\Controllers\UserController::class, 'show']); // Show a specfic user with their id
Route::post('/users/update/{id}', [App\Http\Controllers\UserController::class, 'update']); // Update a specfic user with their id
Route::get('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']); // Delete a specfic user with their id


// All the Book routes
Route::get('/books/all', [App\Http\Controllers\BookController::class, 'index']); // Get all books
Route::post('/books/create', [App\Http\Controllers\BookController::class, 'create']); // Create new book from user input
Route::get('/books/show/{id}', [App\Http\Controllers\BookController::class, 'show']); // Show a specfic book with their id
Route::post('/books/update/{id}', [App\Http\Controllers\BookController::class, 'update']); // Update a specfic book with their id
Route::get('/books/delete/{id}', [App\Http\Controllers\BookController::class, 'delete']); // Delete a specfic book with their id



Route::get('/checkouts/all', [App\Http\Controllers\CheckoutController::class, 'index']);

Route::get('/checkouts/new', [App\Http\Controllers\CheckoutController::class, 'create']);

Route::get('/checkouts/show/{id}', [App\Http\Controllers\CheckoutController::class, 'show']);

Route::get('/checkouts/update/{id}', [App\Http\Controllers\CheckoutController::class, 'update']);

Route::get('/checkouts/delete/{id}', [App\Http\Controllers\CheckoutController::class, 'delete']);





