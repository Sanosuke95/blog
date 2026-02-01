<?php

use App\Enum\TokenAbility;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ExampleController;
use Illuminate\Support\Facades\Route;

Route::get('/example', [ExampleController::class, 'hello']);
Route::resource('/contacts', ContactController::class,)->only('index', 'show', 'store');

Route::post('/signup', [AuthController::class, 'register']);
Route::post('/signin', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'abilities:' . TokenAbility::ACCESS_API->value])->group(function () {
    Route::get('/user', [AuthController::class, 'profile']);
    Route::post('/user/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth:sanctum', 'abilities:' . TokenAbility::REFRESH_API->value])->group(function () {
    Route::post('/user/refresh', [AuthController::class, 'refreshToken']);
});
