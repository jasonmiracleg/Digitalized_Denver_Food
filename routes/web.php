<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StallController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LoginView');
})->name('guest');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/order', [OrderController::class, 'index'])->name('orderPage');
Route::get('/stalls', [StallController::class, 'index'])->name('stallsPage');
Route::get('/stalls/{stall}', [StallController::class, 'view'])->name('stallPage');

Route::get('/cart', [CartController::class, 'index'])->name('cartPage');
Route::post('/cart/cartItem', [CartItemsController::class, 'store'])->name('createCartItem');
Route::get('/checkout', [OrderController::class, 'create'])->name('checkout');


Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/order/{menu}', [MenuController::class, 'edit'])->name('menuDetail');
Route::post('/checkout/done', [OrderController::class, 'store'])->name('createOrder');
