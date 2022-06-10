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
    Route::post('/delete/{vehicle}', [\App\Http\Controllers\Vehicle\VehicleController::class, 'delete'])->name('vehicle.delete');
});

/**
 *  Delivery
 */
Route::group(['prefix' => 'deliveries'], function () {
    Route::get('/', [\App\Http\Controllers\Delivery\DeliveryPriceController::class, 'index'])->name('delivery.index');
    Route::get('/create', [\App\Http\Controllers\Delivery\DeliveryPriceController::class, 'create'])->name('delivery.create');
    Route::post('/', [\App\Http\Controllers\Delivery\DeliveryPriceController::class, 'store'])->name('delivery.store');
    Route::get('/{delivery}/edit', [\App\Http\Controllers\Delivery\DeliveryPriceController::class, 'edit'])->name('delivery.edit');
    Route::get('/{delivery}', [\App\Http\Controllers\Delivery\DeliveryPriceController::class, 'show'])->name('delivery.show');
    Route::patch('/{delivery}', [\App\Http\Controllers\Delivery\DeliveryPriceController::class, 'update'])->name('delivery.update');
    Route::post('/delete/{delivery}', [\App\Http\Controllers\Delivery\DeliveryPriceController::class, 'delete'])->name('delivery.delete');
});
