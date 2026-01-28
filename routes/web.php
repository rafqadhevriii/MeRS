<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\ConsentController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/consent', function () {
    return view('consent');
});

Route::get('/screening/phq9', function () {
    return view('screening.phq9');
});

Route::get('/screening/phq9', function () {
    return view('screening.phq9');
});

Route::get('/screening/gad7', function () {
    return view('screening.gad7');
});

Route::get('/screening/pcl5', function () {
    return view('screening.pcl5');
});

Route::get('/result', function () {
    return view('result');
});

Route::get('/routing', function () {
    return view('routing');
});

Route::post('/screening/phq9', [ScreeningController::class, 'storePHQ9']);
Route::post('/screening/gad7', [ScreeningController::class, 'storeGAD7']);
Route::post('/screening/pcl5', [ScreeningController::class, 'storePCL5']);

Route::get('/result', [ScreeningController::class, 'result']);
