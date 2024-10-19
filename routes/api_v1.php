<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1/auth')->group(function () {
    Route::get('/users/me', function (Request $request) {
        return $request->user();
    })->middleware('auth:api');
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/signin', [AuthController::class, 'signin']);
});
