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
Route::get('users', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('users/{user}', [\App\Http\Controllers\UserController::class, 'show']);
Route::post('create', [\App\Http\Controllers\UserController::class, 'create']);
Route::get('/ban/{ban}', [\App\Http\Controllers\UserController::class, 'show_ban']);
Route::post('/ban', [\App\Http\Controllers\UserController::class, 'ban']);
Route::put('/unban/{user}', [\App\Http\Controllers\UserController::class, 'unban']);

Route::get('rate', [\App\Http\Controllers\RateController::class, 'index']);
Route::post('rate', [\App\Http\Controllers\RateController::class, 'create']);
Route::put('rate/{rate}', [\App\Http\Controllers\RateController::class, 'update']);
Route::delete('rate/{rate}', [\App\Http\Controllers\RateController::class, 'delete']);

Route::get('loan', [\App\Http\Controllers\CreditController::class, 'index']);
Route::get('loan/{loan}', [\App\Http\Controllers\CreditController::class, 'show']);
Route::get('customer/{customer}/loan', [\App\Http\Controllers\CreditController::class, 'customer']);
Route::put('loan/{loan}', [\App\Http\Controllers\CreditController::class, 'update']);

Route::get('customer', [\App\Http\Controllers\CustomerController::class, 'index']);
Route::get('customer/{customer}', [\App\Http\Controllers\CustomerController::class, 'show']);

Route::get('account/{account}/transaction', [\App\Http\Controllers\AccountController::class, 'show']);
