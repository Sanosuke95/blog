<?php

use App\Http\Controllers\Api\ExampleController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/example', [ExampleController::class, 'hello']);

Route::post('/signin', [UserController::class, 'signin']);
Route::post('/signup', [UserController::class, 'signup']);
