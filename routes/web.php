<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/login', [CustomerController::class, 'showLogin'])->name('showlogin');

Route::post('/login', [CustomerController::class, 'login'])->name('customer.login');

Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');

Route::prefix('admin')->group(function() {
    Route::get('/', function () {
        return view('admin.home');
    })->name('admin.home');

    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.showlogin');

    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::prefix('car')->group(function () {
        Route::get('/', [CarController::class, 'index'])->name('admin.car.index');
        Route::get('/create', [CarController::class, 'create'])->name('admin.car.create');
        Route::post('/create', [CarController::class, 'store'])->name('admin.car.store');
        Route::get('show/{id}', [CarController::class, 'show'])->name('admin.car.show');
        Route::get('edit/{id}', [CarController::class, 'edit'])->name('admin.car.edit');
        Route::post('edit/{id}', [CarController::class, 'update'])->name('admin.car.update');
        Route::get('delete/{id}', [CarController::class, 'delete'])->name('admin.car.delete');
        Route::post('delete/{id}', [CarController::class, 'destroy'])->name('admin.car.destroy');
        Route::get('/filter', [CarController::class, 'filterByBrand'])->name('admin.car.filterByBrand');
        Route::get('/search', [CarController::class, 'search'])->name('admin.car.search');
    });

    Route::prefix('brand')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('admin.brand.index');
        Route::get('/create', [BrandController::class, 'create'])->name('admin.brand.create');
        Route::post('/create', [BrandController::class, 'store'])->name('admin.brand.store');
        Route::get('show/{id}', [BrandController::class, 'show'])->name('admin.brand.show');
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::post('edit/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
        Route::get('delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');
        Route::post('delete/{id}', [BrandController::class, 'destroy'])->name('admin.brand.destroy');
    });
});
