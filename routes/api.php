<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
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

########## Guest Routes #############
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->prefix('/auth')->group(function () {
        Route::post('/check-email', 'checkEmail')->name('check_email');
        Route::post('/login', 'login')->name('login');
        Route::post('/register', 'register')->name('register');
    });
});

########## Auth Routes #############
Route::middleware('auth:sanctum')->group(function () {
    Route::controller(AuthController::class)->prefix('/auth')->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::controller(ProfileController::class)->prefix('/profile')->as('profile.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/update', 'update')->name('update');
        Route::put('/update_password', 'updatePassword')->name('update_password');
    });

    ########### Admin Routes ###########

    ########### User Routes ###########
});

############# multiple Routes ##############
