<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\RateController;
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

Route::prefix('rate')->group(function (){
    Route::get('/', [RateController::class, 'index']);
    //только для сотрудника
    Route::post('/', [RateController::class, 'create']);
    Route::put('/{rate}', [RateController::class, 'update']);
    Route::delete('/{rate}', [RateController::class, 'delete']);
});

Route::prefix('loan')->group(function (){
    Route::post('/request', [LoanController::class, 'create']);
    Route::get('/{loan}', [LoanController::class, 'get']);
    //только для сотрудника
    Route::get('/', [LoanController::class, 'index']);
    Route::put('/{loan}', [LoanController::class, 'update']);
});

Route::prefix('customer')->group(function (){
    Route::get('/{customer_id}/loan', [LoanController::class, 'index']);
});

Route::get('rating/{customer_id}', function (){
    return response(['rating' => rand(10, 100)], 200);
});
