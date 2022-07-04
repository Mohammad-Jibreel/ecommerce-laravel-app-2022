<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/',[HomeController::class,'index']);



Route::resource('dashboard',DashboardController::class);

Route::resource('product',ProductController::class);
Route::resource('cart',CartController::class);
Route::resource('checkout',UserAddressController::class);
Route::resource('user',UserController::class);
Route::resource('order',OrderController::class);
Route::resource('address',UserAddressController::class);
Route::resource('payment',PaymentController::class);

Route::get('filter',[ProductController::class,'filterProduct'])->name('filter');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
