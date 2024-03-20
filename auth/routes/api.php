<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [\App\Http\Controllers\UserController::class, 'register']);
Route::group(['middleware' => 'auth:api'], function () {
    Route::put('/user', [\App\Http\Controllers\UserController::class, 'update']);
});

Route::prefix('auth')->middleware('api')->controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::get('user', 'user');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::get('users', [\App\Http\Controllers\UserController::class,'index']);
