<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckLogin;

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

Route::get('/', [UserController::class, 'home'])->name('home');

Route::get('/login', [UserController::class, 'showLogin'])->name('show.login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'showRegister'])->name('show.register');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(CheckLogin::class)->group(function() {
    Route::prefix('car')->group(function () {
        Route::get('/', [CarController::class, 'index'])->name('car.index');
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
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/create', [BrandController::class, 'store'])->name('brand.store');
        Route::get('show/{id}', [BrandController::class, 'show'])->name('brand.show');
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('edit/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
        Route::post('delete/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });
});


