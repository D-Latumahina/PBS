<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth Routes
Route::get('/auth/login', [MainController::class, 'showLogin'])->name('auth.login');
Route::post('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
Route::post('/logout', [MainController::class, 'logout'])->name('logout');
