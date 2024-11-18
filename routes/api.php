<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderRecordController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '/v1'], function () {
    Route::apiResource('/category', CategoryController::class)->except(['store', 'update', 'destroy']);
    Route::apiResource('/category', CategoryController::class)->middleware('auth:sanctum')->except(['index', 'show']);

    Route::apiResource('/product', ProductController::class)->except(['store', 'update', 'destroy']);
    Route::apiResource('/product', ProductController::class)->middleware('auth:sanctum')->except(['index', 'show']);

    Route::apiResource('/image', ImageController::class)->except(['store', 'update', 'destroy']);
    Route::apiResource('/image', ImageController::class)->middleware('auth:sanctum')->except(['index', 'show']);

    Route::apiResource('/order', OrderController::class)->middleware('auth:sanctum');
    Route::apiResource('/order_record', OrderRecordController::class)->middleware('auth:sanctum');
    Route::group(['prefix' => '/auth'], function () {
        Route::post('/signup', [AuthController::class, 'signup']);
        Route::post('/signin', [AuthController::class, 'signin']);
        Route::get('/user', function (Request $request) {
            return $request->user();
        })->middleware('auth:sanctum');
    });
});
