<?php

use App\Http\Controllers\Api\HelloController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', [HelloController::class, 'hello']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('/users')->group(function () {
        Route::get('/profile', [UserController::class, 'profile']);
        Route::post('/logout', [UserController::class, 'logout']);
    });
});
