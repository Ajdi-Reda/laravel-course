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

Route::get('/listings/create', [ListingController::class,'create'])->middleware('auth');

Route::post('/listings', [ListingController::class,'store'])->middleware('auth');

Route::get('/listings/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');

// Update post
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//Delete post
Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

Route::get('/listings/{listing}', [ListingController::class,'show']);

// register user
Route::get('/register', [UserController::class,'create'])->middleware('guest');

Route::post('/users', [UserController::class,'store']);

//logout user
Route::post('/logout', [UserController::class,'logout'])->middleware('auth');

//show login form
Route::get('/login', [UserController::class,'login'])->name('login')->middleware('auth');

//Login user
Route::post('/users/authenticate', [UserController::class,'authenticate']);

