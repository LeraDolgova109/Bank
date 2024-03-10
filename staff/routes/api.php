<?php

use Illuminate\Http\Request;
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

Route::group(['prefix' => 'staffs'], function (){
    Route::get('/', [\App\Http\Controllers\StaffController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\StaffController::class, 'store']);
    Route::delete('/{staff}', [\App\Http\Controllers\StaffController::class, 'delete']);
});
Route::group(['prefix' => 'roles'], function (){
    Route::get('/', [\App\Http\Controllers\RoleController::class, 'index']);
});
Route::group(['prefix' => 'bans'], function (){
    Route::put('/ban', [\App\Http\Controllers\BanController::class, 'ban']);
    Route::put('/unban', [\App\Http\Controllers\BanController::class, 'unban']);
});
