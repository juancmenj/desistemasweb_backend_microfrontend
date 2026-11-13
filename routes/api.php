<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavBarController;
use App\Http\Controllers\FooterController;
use Illuminate\Support\Facades\Route;

//general
Route::get('/{lang}/navBar', [NavBarController::class, 'show']);
Route::get('/{lang}/footer', [FooterController::class, 'show']);
Route::get('/{lang}/homepage', [HomeController::class, 'show']);
//auth
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
