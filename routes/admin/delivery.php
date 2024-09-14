<?php

use App\Http\Controllers\DeliveryController;

Route::prefix('admin/deliveries')->group(function () {
    Route::get('/', [DeliveryController::class, 'index']);
    Route::get('/{id}', [DeliveryController::class, 'show']);
    Route::post('/', [DeliveryController::class, 'store']);
    Route::put('/{id}', [DeliveryController::class, 'update']);
    Route::delete('/{id}', [DeliveryController::class, 'destroy']);
});
