<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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
    return view('home');
})->name('home');

Route::prefix('car')->group(function() {
    Route::get('/', [CarController::class, 'index'])->name('car.index');

    Route::get('/create', [CarController::class, 'create'])->name('car.create');

    Route::post('/create', [CarController::class, 'store'])->name('car.store');

    Route::get('show/{id}', [CarController::class, 'show'])->name('car.show');

    Route::get('edit/{id}', [CarController::class, 'edit'])->name('car.edit');

    Route::post('edit/{id}', [CarController::class, 'update'])->name('car.update');

    Route::get('delete/{id}', [CarController::class, 'delete'])->name('car.delete');

    Route::post('delete/{id}', [CarController::class, 'destroy'])->name('car.destroy');
});
