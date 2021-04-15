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

// All the Checkout routes
Route::get('/checkouts/all', [App\Http\Controllers\CheckoutController::class, 'index']); // Get all checkouts
Route::get('/checkouts/active_checkouts', [App\Http\Controllers\CheckoutController::class, 'active_checkouts']); // Get all active checkouts
Route::get('/checkouts/past_checkouts', [App\Http\Controllers\CheckoutController::class, 'past_checkouts']); // Get all past checkouts
Route::post('/checkouts/create', [App\Http\Controllers\CheckoutController::class, 'create']); // Create a checkout
Route::get('/checkouts/show/{id}', [App\Http\Controllers\CheckoutController::class, 'show']); // Show a checkout using id
Route::post('/checkouts/update/{id}', [App\Http\Controllers\CheckoutController::class, 'update']); // Update a checkout using id
Route::post('/checkouts/check_in/{id}', [App\Http\Controllers\CheckoutController::class, 'check_in']); // Checkin a checkout using a book id
Route::get('/checkouts/delete/{id}', [App\Http\Controllers\CheckoutController::class, 'delete']); // Delete a checkout using id



