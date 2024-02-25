<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\PizzaOrderController;
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

// Route::get('{any?}', function () {
//     return view('app');
// })->where('any', '.*');

Route::get('/pizzas', [PizzaController::class, 'index'])->name('pizza.index');
Route::get('/pizzas/create', [PizzaController::class, 'create']);
Route::get('/pizzas/update', [PizzaController::class, 'update']);
Route::get('/pizzas/delete', [PizzaController::class, 'delete']);

Route::get('/pizza-orders', [PizzaOrderController::class, 'index'])->name('pizzaOrder.index');
Route::get('/orders', [OrderController::class, 'index'])->name('order.index');