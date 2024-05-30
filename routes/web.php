<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LoginView');
})->name('guest');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/order', [OrderController::class, 'index'])->name('orderPage');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/order/{menu}', [MenuController::class, 'edit'])->name('menuDetail');
Route::post('/order/store', [OrderController::class, 'store'])->name('createOrder');