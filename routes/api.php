<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MobileProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('authenticate', [UserController::class, 'authenticate']);
    Route::get('products_by_category/{categoryId}',[MobileProductController::class, 'products_by_category']);
    Route::get('product_details/{productId}',[MobileProductController::class, 'product_details']);
    Route::get('products_by_name/{name}',[MobileProductController::class, 'products_by_name']);
    Route::post('search_product/{search_query}',[MobileProductController::class, 'search_product']);
    Route::post('bookings', [MobileProductController::class, 'store_booking']);
    Route::post('password', [MobileProductController::class, 'store_password']);
    Route::post('email', [MobileProductController::class, 'store_email']);
    Route::get('bookings/{name}', [MobileProductController::class, 'get_bookings']);
    Route::get('top_products',[MobileProductController::class, 'top_products']);
});

Route::post('/login',[UserController::class,'index']);
Route::post('/signup',[UserController::class,'store']);