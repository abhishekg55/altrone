<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'frontHomePage'])->name('front.home');
Route::get('/front/products', [HomeController::class, 'products'])->name('front.products');

Route::group(['prefix' => 'carts', 'as' => 'carts.'], function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::POST('/store', [CartController::class, 'store'])->name('store');
    Route::POST('/remove', [CartController::class, 'remove'])->name('remove');
    Route::POST('/update', [CartController::class, 'update'])->name('update');
});

Route::POST('/register', [HomeController::class, 'register'])->name('register');
Route::GET('/checkout', [OrderController::class, 'goTocheckout'])->name('goTocheckout');

Route::middleware(['guest'])->group(function () {
    Route::POST('/user/login', [UserController::class, 'login'])->name('front.login');
    Route::GET('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::POST('/login', [LoginController::class, 'login']);
    Route::GET('/password/reset', [LoginController::class, 'reset'])->name('password.request');
});

Route::group(['middleware' => ['auth:customer']], function () {
    Route::POST('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::POST('/customer/logout', [UserController::class, 'logout'])->name('customer.logout');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::POST('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/all', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::POST('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{uuid}', [ProductController::class, 'edit'])->name('edit');
        Route::POST('/update', [ProductController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'vendors', 'as' => 'vendors.'], function () {
        Route::get('/', [VendorController::class, 'index'])->name('index');
        Route::get('/create', [VendorController::class, 'create'])->name('create');
        Route::POST('/store', [VendorController::class, 'store'])->name('store');
        Route::get('/edit/{uuid}', [VendorController::class, 'edit'])->name('edit');
        Route::POST('/update', [VendorController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/view/{uuid}', [OrderController::class, 'show'])->name('view');
    });
});
