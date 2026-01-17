<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ExampleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/example', [ExampleController::class, 'hello']);

Route::resource('/contacts', ContactController::class,)->parameters(['contacts' => 'uuid'])->only('index', 'show', 'store');
