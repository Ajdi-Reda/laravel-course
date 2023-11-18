<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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


Route::get('/', [ListingController::class, 'index']);

Route::get('/listings/create', [ListingController::class,'create']);

Route::post('/listings', [ListingController::class,'store']);

Route::get('/listings/{listing}/edit', [ListingController::class,'edit']);

// Update post
Route::put('/listings/{listing}', [ListingController::class,'update']);

//Delete post
Route::delete('/listings/{listing}', [ListingController::class,'destroy']);

Route::get('/listings/{listing}', [ListingController::class,'show']);

// register user
Route::get('/register', [UserController::class,'create']);

Route::post('/users', [UserController::class,'store']);

//logout user
Route::post('/logout', [UserController::class,'logout']);

//show login form
Route::get('/login', [UserController::class,'login']);

//Login user
Route::post('/users/authenticate', [UserController::class,'authenticate']);

