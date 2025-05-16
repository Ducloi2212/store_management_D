<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\OrderController;

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/category', [CategoryController::class, 'categoryProduct'])->name('category.product');

Route::get('/product', [ProductController::class, 'productDetail'])->name('product.detail');

Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');

Route::get('/checkout', [CheckOutController::class, 'checkOut'])->name('cart.checkOut');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authUser'])->name('user.authUser');

Route::get('/create', [UserController::class, 'createUser'])->name('user.create');
Route::post('/create', [UserController::class, 'postUser'])->name('user.postUser');

Route::get('/user/profile/{id}', [UserProfileController::class, 'profileUser'])->name('user.profile');
Route::post('/user/profile/{id}/update', [UserProfileController::class, 'updateProfile'])->name('user.updateProfile');

Route::get('/user/orders/{id}', [OrderController::class, 'ordersUser'])->name('user.orders');

Route::get('/user/orders/{id}/detail', [OrderController::class, 'orderDetail'])->name('orders.detail');

Route::get('/user/{id}/change-password', [UserProfileController::class, 'showChangePasswordForm'])->name('user.showChangePassword');
Route::post('/user/change-password', [UserProfileController::class, 'changePassword'])->name('user.changePassword');

Route::delete('/user/{id}', [UserController::class, 'delete'])->name('user.delete');

Route::get('signout', [UserController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('welcome');
});
