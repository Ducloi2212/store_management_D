<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/category', [CategoryController::class, 'categoryProduct'])->name('category.product');

Route::get('/product', [ProductController::class, 'productDetail'])->name('product.detail');

Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');

Route::get('/checkout', [CheckOutController::class, 'checkOut'])->name('cart.checkOut');

Route::get('/', function () {
    return view('welcome');
});
