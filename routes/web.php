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
Route::get('/create', [ListingController::class, 'create']);

// Store Listing
Route::post('/listings', [ListingController::class, 'store']);

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Register form
Route::get('/register', [UserController::class, 'create']);


//Create user
Route::post('/register', [UserController::class, 'store']);


// Signin form
Route::get('/login', [UserController::class, 'login_form']);

// Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Signout user
Route::post('/logout', [UserController::class, 'logout']);


//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'delete']);

//Single listing
Route::get('/listings/{listing}', [ListingController::class, 'listing']);
