<?php

use App\Http\Controllers\ColorController;

Route::prefix('admin/colors')->group(function () {
    Route::get('/', [ColorController::class, 'index']);
    Route::get('/{id}', [ColorController::class, 'show']);
    Route::post('/', [ColorController::class, 'store']);
    Route::put('/{id}', [ColorController::class, 'update']);
    Route::delete('/{id}', [ColorController::class, 'destroy']);
});
