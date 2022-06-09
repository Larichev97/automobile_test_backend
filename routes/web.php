<?php

use Illuminate\Support\Facades\Route;

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

/**
 *  Main page
 */
Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');

/**
 *  Vehicles
 */
Route::group(['prefix' => 'vehicles'], function () {
    Route::get('/', [\App\Http\Controllers\Vehicle\VehicleController::class, 'index'])->name('vehicle.index');
    Route::get('/create', [\App\Http\Controllers\Vehicle\VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/', [\App\Http\Controllers\Vehicle\VehicleController::class, 'store'])->name('vehicle.store');
    Route::get('/{vehicle}/edit', [\App\Http\Controllers\Vehicle\VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::get('/{vehicle}', [\App\Http\Controllers\Vehicle\VehicleController::class, 'show'])->name('vehicle.show');
    Route::patch('/{vehicle}', [\App\Http\Controllers\Vehicle\VehicleController::class, 'update'])->name('vehicle.update');
    Route::delete('/{vehicle}', [\App\Http\Controllers\Vehicle\VehicleController::class, 'delete'])->name('vehicle.delete');
});
