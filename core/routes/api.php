<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CustomerController;
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
Route::post('/customer', [CustomerController::class, 'create']);//staff || user(owner)
Route::get('/customer/{customer}', [CustomerController::class, 'show']);//staff || user(owner)
Route::get('/customer', [CustomerController::class, 'index']);//staff
Route::post('/customer/{customer}/ban', [CustomerController::class, 'add_ban']);//staff

Route::get('account/{account}/transaction', [AccountController::class, 'transactions']);//staff || user(owner)
Route::post('account/{account}/replenish', [AccountController::class, 'replenish']);//user(owner) || credit
Route::post('account/{account}/debit', [AccountController::class, 'debit']);//user(owner) || credit
