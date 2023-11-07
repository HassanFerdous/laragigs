<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// All listing
Route::get('/', [ListingController::class, 'index']);

//Create Listing
Route::get('/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->middleware('auth');

//Mange Listing
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single listing
Route::get('/listings/{listing}', [ListingController::class, 'listing']);



//Create user
Route::post('/register', [UserController::class, 'store'])->middleware('guest');

// Signin form
Route::get('/login', [UserController::class, 'login_form'])->name('login')->middleware('guest');

// Signout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Authenticate user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
