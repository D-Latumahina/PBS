<?php

use App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\FurnitureController;

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
Route::get('/home', [HomeController::class, 'index'])->name('index')->middleware('mustBeLoggedIn');

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

// Index Routes
Route::get('/overview', [HomeController::class, 'overview'])->name('overview');
Route::get('/summaries', [HomeController::class, 'summary'])->name('summary');
Route::get('/monthly/index', [HomeController::class, 'monthly'])->name('monthly.index');

//Notes Routes
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
Route::post('/notes/store', [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes/edit/{id}', [NoteController::class, 'edit'])->name('notes.edit');
Route::post('/notes/update', [NoteController::class, 'update'])->name('notes.update');
Route::get('/notes/delete/{id}', [NoteController::class, 'destroy'])->name('notes.delete');


//Income Routes
Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');
Route::get('/incomes/create', [IncomeController::class, 'create'])->name('incomes.create');
Route::post('/incomes/store', [IncomeController::class, 'store'])->name('incomes.store');
Route::get('/incomes/edit/{id}', [IncomeController::class, 'edit'])->name('incomes.edit');
Route::post('/incomes/update', [IncomeController::class, 'update'])->name('incomes.update');
Route::get('/incomes/delete/{id}', [IncomeController::class, 'destroy'])->name('incomes.delete');

//Expense Routes
Route::get('/expense', [ExpenseController::class, 'index'])->name('expense.index');
Route::get('/expense/create', [ExpenseController::class, 'create'])->name('expense.create');
Route::post('/expense/store', [ExpenseController::class, 'store'])->name('expense.store');
Route::get('/expense/edit/{id}', [ExpenseController::class, 'edit'])->name('expenses.edit');
Route::post('/expense/update', [ExpenseController::class, 'update'])->name('expenses.update');
Route::get('/expense/delete/{id}', [ExpenseController::class, 'destroy'])->name('expenses.delete');

// Furnitures Routes
Route::get('/furnitures', [FurnitureController::class, 'index'])->name('furnitures.index');
Route::get('/furnitures/create', [FurnitureController::class, 'create'])->name('furnitures.create');
Route::post('/furnitures/store', [FurnitureController::class, 'store'])->name('furnitures.store');
Route::get('/furnitures/edit/{id}', [FurnitureController::class, 'edit'])->name('furnitures.edit');
Route::post('/furnitures/update', [FurnitureController::class, 'update'])->name('furnitures.update');
Route::get('/furnitures/delete/{id}', [FurnitureController::class, 'delete'])->name('furnitures.delete');

// Items Routes
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
Route::post('/items/update', [ItemController::class, 'update'])->name('items.update');
Route::get('/items/delete/{id}', [ItemController::class, 'destroy'])->name('items.delete');