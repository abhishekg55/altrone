<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'frontHomePage'])->name('front.home');
Route::post('/enquiry', [HomeController::class, 'enquiry'])->name('enquiry');
Route::get('/about-us', [HomeController::class, 'about'])->name('about-us');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact-us');
Route::get('/products', [HomeController::class, 'products'])->name('products');

Route::group(['prefix' => 'carts', 'as' => 'carts.'], function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::POST('/store', [CartController::class, 'store'])->name('store');
});

Route::middleware(['guest'])->group(function () {
    Route::GET('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::POST('/login', [LoginController::class, 'login']);
    Route::GET('/password/reset', [LoginController::class, 'reset'])->name('password.request');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::POST('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
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
});
