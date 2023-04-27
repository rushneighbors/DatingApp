<?php

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

Route::controller(\App\Http\Controllers\LoginController::class)->group(function() {
   Route::post('/login', 'authenticate')->name('login');
});

//Route::controller(\App\Http\Controllers\UserInterestController::class)->group(function() {
//    Route::get('/activity', 'activities');
//    Route::get('/attitude', 'attitudes');
//    Route::get('/skillLevel', 'skillLevels');
//});


Route::controller(\App\Http\Controllers\UserController::class)->group(function() {
    Route::post('/user', 'store');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::controller(\App\Http\Controllers\UserController::class)->group(function() {
       Route::get('/user', 'index');
    });

    Route::controller(App\Http\Controllers\LogoutController::class)->group(function() {
        Route::get('/logout', 'logout');
    });

    Route::controller(App\Http\Controllers\UserInterestController::class)->group(function() {
        Route::post('/user/interest', 'store');
        Route::get('/user/interest', 'list');
        Route::get('/user/interest/{email}', 'show');
        Route::get('/activity', 'activities');
        Route::get('/attitude', 'attitudes');
        Route::get('/skillLevel', 'skillLevels');
    });
});



