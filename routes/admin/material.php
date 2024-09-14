<?php

use App\Http\Controllers\MaterialController;

Route::prefix('admin/materials')->group(function () {
    Route::get('/', [MaterialController::class, 'index']);
    Route::get('/{id}', [MaterialController::class, 'show']);
    Route::post('/', [MaterialController::class, 'store']);
    Route::put('/{id}', [MaterialController::class, 'update']);
    Route::delete('/{id}', [MaterialController::class, 'destroy']);
});
