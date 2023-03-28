<?php

use App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\WishlistController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Default Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('mustBeLoggedIn');

// Auth Routes
Route::get('/auth/login', [MainController::class, 'showLogin'])->name('auth.login');
Route::post('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
Route::post('/logout', [MainController::class, 'logout'])->name('logout')->middleware('mustBeLoggedIn');

// Wishlist Routes
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index')->middleware('mustBeLoggedIn');
Route::get('/wishlist/create', [WishlistController::class, 'createForm'])->name('createForm')->middleware('mustBeLoggedIn');
Route::post('/wishlist/create', [WishlistController::class, 'storeWishlist'])->name('storeWishlist')->middleware('mustBeLoggedIn');
Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->middleware('mustBeLoggedIn');
Route::get('delete/{id}',[WishlistController::class, 'destroy'])->middleware('mustBeLoggedIn');
