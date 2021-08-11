<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'locale'], function() {
    Route::get('/', [UserController::class, 'home'])->name('home');

    Route::get('/login', [UserController::class, 'showLogin'])->name('show.login');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/register', [UserController::class, 'showRegister'])->name('show.register');
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/guest', [UserController::class, 'showPageGuest'])->name('customer.home');
    Route::get('/admin', [UserController::class, 'showPageAdmin'])->name('admin.home');
    Route::get('/redirect/{social}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
    Route::get('/callback/{social}', [SocialAuthController::class, 'callback'])->name('social.callback');

    Route::get('/change-language/{language}', [LanguageController::class, 'changeLanguage'])->name('change.language');

    Route::middleware(CheckLogin::class)->group(function() {
        Route::prefix('car')->group(function () {
            Route::get('/', [CarController::class, 'index'])->name('car.index');
            Route::get('/fetch_data', [CarController::class, 'index'])->name('car.fetch_data');
            Route::get('/create', [CarController::class, 'create'])->name('car.create');
            Route::post('/create', [CarController::class, 'store'])->name('car.store');
            Route::get('show/{id}', [CarController::class, 'show'])->name('car.show');
            Route::get('edit/{id}', [CarController::class, 'edit'])->name('car.edit');
            Route::post('edit/{id}', [CarController::class, 'update'])->name('car.update');
            Route::get('delete/{id}', [CarController::class, 'delete'])->name('car.delete');
            Route::post('delete/{id}', [CarController::class, 'destroy'])->name('car.destroy');
            Route::get('/filter', [CarController::class, 'filterByBrand'])->name('car.filterByBrand');
            Route::get('/search', [CarController::class, 'search'])->name('car.search');
        });

        Route::prefix('brand')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('brand.index');
            Route::get('/fetch_data', [BrandController::class, 'index'])->name('brand.fetch_data');
            Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
            Route::post('/create', [BrandController::class, 'store'])->name('brand.store');
            Route::get('show/{id}', [BrandController::class, 'show'])->name('brand.show');
            Route::get('edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
            Route::post('edit/{id}', [BrandController::class, 'update'])->name('brand.update');
            Route::get('delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
            Route::post('delete/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
        });

        Route::prefix('order')->group(function() {
            Route::post('create', [OrderController::class, 'store'])->name('order.store');
            Route::get('/', [OrderController::class, 'index'])->name('order.index');
            Route::get('/fetch_data', [OrderController::class, 'index'])->name('order.fetch_data');
            Route::get('/show/{id}', [OrderController::class, 'show'])->name('order.show');
        });
    });

    Route::prefix('cart')->group(function() {
        Route::post('/add', [CartController::class, 'addToCart'])->name('cart.add');
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    });

});

