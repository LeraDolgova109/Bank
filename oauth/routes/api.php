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

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::get('/users', [App\Http\Controllers\Api\AuthController::class, 'index']);
    Route::get('/users/{user}', [App\Http\Controllers\Api\AuthController::class, 'show']);
    Route::get('/ban/{ban}', [\App\Http\Controllers\Api\BanController::class, 'show']);
    Route::post('/ban', [\App\Http\Controllers\Api\BanController::class, 'ban']);
    Route::put('/unban/{user}', [\App\Http\Controllers\Api\BanController::class, 'unban']);
    Route::post('/role', [\App\Http\Controllers\Api\RoleController::class, 'create']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user()->id;
});
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);