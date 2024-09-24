<?php

use App\Http\Controllers\Apps\SetupApp;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/auth')->group(function () {
    Route::post('/register', [RegisterController::class, 'store']);
    Route::post('/login', [LoginController::class, 'login']);
});

Route::prefix('/apps')->group(function () {
    Route::resource('/setup', SetupApp::class)->middleware('auth:sanctum');
})->middleware('auth:sanctum');
