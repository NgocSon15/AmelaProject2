<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CarControllerApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/cars', [CarControllerApi::class, 'index'])->name('cars.api.index');
Route::get('/cars/{carId}', [CarControllerApi::class, 'show'])->name('cars.api.show');
Route::post('/cars', [CarControllerApi::class, 'store'])->name('cars.api.store');
Route::put('/cars/{carId}', [CarControllerApi::class, 'update'])->name('cars.api.update');
Route::delete('/cars/{carId}', [CarControllerApi::class, 'destroy'])->name('cars.api.destroy');

