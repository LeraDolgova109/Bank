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
});
Route::group(['prefix' => 'roles'], function (){
    Route::get('/', [\App\Http\Controllers\RoleController::class, 'index']);
});

// Route::group(['prefix' => 'user'], function (){
//     Route::post('/register', [\App\Http\Controllers\UserController::class, 'register']);
//     Route::get('/{user}', [\App\Http\Controllers\UserController::class, 'show']);
//     Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
//     Route::put('/{user}', [\App\Http\Controllers\UserController::class, 'update']);
//     Route::delete('/{user}', [\App\Http\Controllers\UserController::class, 'delete']);
//     Route::put('/ban/{user}', [\App\Http\Controllers\UserController::class, 'banUser']);
//     Route::put('/admin/{user}', [\App\Http\Controllers\UserController::class, 'makeAdmin']);
// });
// Route::resource('/manager', \App\Http\Controllers\ManagerController::class);
// Route::resource('/cook', \App\Http\Controllers\CookController::class);
// Route::resource('/courier', \App\Http\Controllers\CourierController::class);
// Route::resource('/customer', \App\Http\Controllers\CustomerController::class);


// Route::group(['prefix' => 'dish'], function (){
//     Route::get('/', [\App\Http\Controllers\DishController::class, 'index']);
//     Route::get('/{dish}', [\App\Http\Controllers\DishController::class, 'show']);
//     Route::post('/', [\App\Http\Controllers\DishController::class, 'store']);
//     Route::post('/menu', [\App\Http\Controllers\DishController::class, 'addMenu']);
//     Route::put('/menu', [\App\Http\Controllers\DishController::class, 'deleteMenu']);
//     Route::put('/{dish}', [\App\Http\Controllers\DishController::class, 'update']);
//     Route::delete('/{dish}', [\App\Http\Controllers\DishController::class, 'delete']);
// });
// Route::resource('/category', \App\Http\Controllers\CategoryController::class);
// Route::resource('/menu', \App\Http\Controllers\MenuController::class);
// Route::resource('/restaurant', \App\Http\Controllers\RestaurantController::class);
