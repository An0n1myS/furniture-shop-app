<?php

use App\Http\Controllers\PhotoController;

Route::prefix('admin/photos')->group(function () {
    Route::get('/', [PhotoController::class, 'index']);
    Route::get('/{id}', [PhotoController::class, 'show']);
    Route::post('/', [PhotoController::class, 'store']);
    Route::put('/{id}', [PhotoController::class, 'update']);
    Route::delete('/{id}', [PhotoController::class, 'destroy']);
});
