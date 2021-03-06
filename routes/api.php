<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->group(function () {
    //|-------------------------------------------------------------------------
    //| ADM Routes
    //|-------------------------------------------------------------------------
    Route::middleware(['isAdm'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->except(['create']);
            Route::resource('scheduling-services', \App\Http\Controllers\Admin\SchedulingServiceController::class)->except(['create']);
            Route::resource('worker-services', \App\Http\Controllers\Admin\WorkerServiceController::class)->except(['create']);
            Route::resource('feedstocks', \App\Http\Controllers\Admin\FeedstockController::class)->except(['create']);
        });
    });
    //|-------------------------------------------------------------------------
    //| CLIENT Routes
    //|-------------------------------------------------------------------------
    Route::middleware(['isCustomer'])->group(function () {
        Route::prefix('customer')->group(function () {
            Route::resource('ratings', \App\Http\Controllers\Customer\RatingController::class)->except(['create']);
        });
    });
});
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'authenticate']);
Route::post('/register', [\App\Http\Controllers\UserController::class, 'store']);
    //|-------------------------------------------------------------------------
    //| Mobile Routes
    //|-------------------------------------------------------------------------
//Route::post('/login', [\App\Http\Controllers\AuthController::class, 'authenticate']);

