<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/category', [CategoryController::class, 'categoryProduct'])->name('category.product');

Route::get('/product', [ProductController::class, 'productDetail'])->name('product.detail');

Route::get('/', function () {
    return view('welcome');
});
