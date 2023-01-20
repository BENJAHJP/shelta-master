<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index1'])->name('home1');

Auth::routes();

// ADMIN ROUTES
// cateogories routes
Route::get("/category_index", [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::post("/category_store", [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::get("/category_edit/{id}", [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::get("/category_destroy/{id}", [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
Route::put("/category_update/{id}", [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');

// PARTNERS ROUTES

// Booking Routes 

Route::get("/booking_index", [App\Http\Controllers\BookingController::class, 'index'])->name('booking.index');
Route::get("/booking_edit/{id}", [App\Http\Controllers\BookingController::class, 'edit'])->name("booking.edit");
Route::get("/booking_destroy/{id}", [App\Http\Controllers\BookingController::class, 'destroy'])->name("booking.destroy");
Route::put("/booking_update/{id}", [App\Http\Controllers\BookingController::class, 'update'])->name("booking.update");

// Product Routes
Route::get("/product_index", [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::post("/product_store", [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get("/product_destroy/{id}", [App\Http\Controllers\ProductController::class, 'destroy'])->name('product_destroy');
Route::get("/product_edit/{id}", [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::put("/product_update/{id}", [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');

