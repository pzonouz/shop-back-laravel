<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/v1/signup', [AuthController::class, 'signup']);
Route::post('/v1/signin', [AuthController::class, 'signin']);
Route::prefix('/v1')->middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/hello', function (Request $request) {
        dd($request->user());
    });

    Route::apiResource('/categories', CategoryController::class);
});
