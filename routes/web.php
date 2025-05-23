<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/category', [CategoryController::class, 'categoryProduct'])->name('category.product');

Route::get('/product', [ProductController::class, 'productDetail'])->name('product.detail');
Route::post('/product/review', [ReviewController::class, 'reviewProduct'])->name('product.review');

Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::post('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');


Route::get('/checkout', [CheckOutController::class, 'checkOut'])->name('cart.checkOut');
Route::post('/checkout', [CheckOutController::class, 'processCheckout'])->name('cart.checkout.process');

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

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class);
});

Route::get('signout', [UserController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('welcome');
});
