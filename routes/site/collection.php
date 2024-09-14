<?php

use App\Http\Controllers\CollectionController;

Route::prefix('collections')->group(function () {
    Route::get('/', [CollectionController::class, 'index']);
    Route::get('/{id}', [CollectionController::class, 'show']);
    Route::post('/', [CollectionController::class, 'store']);
    Route::put('/{id}', [CollectionController::class, 'update']);
    Route::delete('/{id}', [CollectionController::class, 'destroy']);
});
