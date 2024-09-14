<?php

use App\Http\Controllers\CartItemController;

Route::prefix('cart-items')->group(function () {
    Route::get('/', [CartItemController::class, 'index']);
    Route::get('/{id}', [CartItemController::class, 'show']);
    Route::post('/', [CartItemController::class, 'store']);
    Route::put('/{id}', [CartItemController::class, 'update']);
    Route::delete('/{id}', [CartItemController::class, 'destroy']);
});
