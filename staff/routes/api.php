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
    Route::get('/settings/{staff}', [\App\Http\Controllers\SettingsController::class, 'show']);
    Route::post('/settings/{staff}', [\App\Http\Controllers\SettingsController::class, 'store']);
    Route::get('/accounts/{staff}', [\App\Http\Controllers\HiddenController::class, 'index']);
    Route::post('/hide/{staff}', [\App\Http\Controllers\HiddenController::class, 'hide']);
    Route::get('/{staff}', [\App\Http\Controllers\StaffController::class, 'show']);
    Route::post('/', [\App\Http\Controllers\StaffController::class, 'store']);
    Route::delete('/{staff}', [\App\Http\Controllers\StaffController::class, 'delete']);
});
Route::group(['prefix' => 'roles'], function (){
    Route::get('/', [\App\Http\Controllers\RoleController::class, 'index']);
});
Route::post('/save_token', [\App\Http\Controllers\StaffController::class, 'saveToken']);
Route::get('/devices', [\App\Http\Controllers\StaffController::class, 'getDevices']);