<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::apiResource('category', App\Http\Controllers\CategoryController::class)->except('store', 'update', 'destroy');

Route::apiResource('product', App\Http\Controllers\ProductController::class)->except('store', 'update', 'destroy');

Route::apiResource('order', App\Http\Controllers\OrderController::class)->except('update', 'destroy');

Route::apiResource('basket', App\Http\Controllers\BasketController::class);

Route::apiResource('favorite', App\Http\Controllers\FavoriteController::class);


Route::apiResource('category', App\Http\Controllers\CategoryController::class)->except('store', 'update', 'destroy');

Route::apiResource('product', App\Http\Controllers\ProductController::class)->except('store', 'update', 'destroy');

Route::apiResource('order', App\Http\Controllers\OrderController::class)->except('update', 'destroy');

Route::apiResource('basket', App\Http\Controllers\BasketController::class);

Route::apiResource('favorite', App\Http\Controllers\FavoriteController::class);
