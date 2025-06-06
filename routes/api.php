<?php

use App\Http\Controllers\HeladoController;
use Illuminate\Support\Facades\Route;

Route::prefix('helados')->group(function () {
    Route::get('/', [HeladoController::class, 'index']);
    Route::get('/{id}', [HeladoController::class, 'show']);
    Route::post('/', [HeladoController::class, 'store']);
    Route::delete('/{id}', [HeladoController::class, 'destroy']);
});
