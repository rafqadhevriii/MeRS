<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScreeningApiController;

Route::prefix('mers')->group(function () {

    Route::post('/phq9', [ScreeningApiController::class, 'phq9']);
    Route::post('/gad7/{screening}', [ScreeningApiController::class, 'gad7']);
    Route::post('/pcl5/{screening}', [ScreeningApiController::class, 'pcl5']);

});
