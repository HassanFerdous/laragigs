<?php

use App\Http\Controllers\ListingController;
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

//Update
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//Delete
Route::delete('/listings/{listing}', [ListingController::class, 'delete']);

//Single listing
Route::get('/listings/{listing}', [ListingController::class, 'listing']);
