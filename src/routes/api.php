<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderItemController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->middleware('apikey')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
    Route::post('/decrypt', [ProductController::class, 'decryptResponse']);
});

Route::middleware('apikey')->group(function () {
    Route::apiResource('order-items', OrderItemController::class);
    Route::post('order-items/decrypt', [OrderItemController::class, 'decryptResponse']);
});
