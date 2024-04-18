<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CurrencyController;
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

Route::post('/account', [AccountController::class, 'open']);
Route::delete('/account/{account}', [AccountController::class, 'close']);
Route::get('/account/{account}/transaction', [AccountController::class, 'transaction_list']);//staff || user(owner)
Route::post('/account/{account}/replenish', [AccountController::class, 'replenish']);//user(owner) || credit
Route::post('/account/{account}/debit', [AccountController::class, 'debit']);//user(owner) || credit
Route::post('/account/{account}/transfer', [AccountController::class, 'transfer']);
Route::get('/account/master', [AccountController::class, 'get_master']);

Route::get('transaction/{transaction}', [AccountController::class, 'transaction']);

Route::get('/currency', [CurrencyController::class, 'index']);
