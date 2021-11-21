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
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'authenticate']);
Route::get('/', function () {
    $pathRoutesList = public_path() . '/routes.json';
    $routes = json_decode(file_get_contents($pathRoutesList), true, 512, JSON_THROW_ON_ERROR);
    return view('welcome', compact([
        'routesList' => 'routes'
    ]));
});
