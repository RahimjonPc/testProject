<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cars', [CarController::class, 'getCars']);
Route::get('users', [UserController::class, 'getUsers']);
Route::get('car/{id}/add/user', [CarController::class, 'AddUserToCar']);
Route::get('car/{id}/remove/user', [CarController::class, 'removeUserFromCar']);
