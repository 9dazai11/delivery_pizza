<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\PizzaOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pizzas', [PizzaController::class, 'index']);

Route::get('/cart', [PizzaOrderController::class, 'index']);
Route::post('/cart', [PizzaOrderController::class, 'addToCart']);
Route::put('/cart/{id}', [PizzaOrderController::class, 'updateCartItem']);
Route::delete('/cart/{id}', [PizzaOrderController::class, 'removeFromCart']);

Route::post('/orders', [OrderController::class, 'store']);
