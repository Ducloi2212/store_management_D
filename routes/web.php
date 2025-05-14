<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/category', [CategoryController::class, 'categoryProduct'])->name('category.product');

Route::get('/', function () {
    return view('welcome');
});
