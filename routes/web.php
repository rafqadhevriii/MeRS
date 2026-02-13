<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Screening;
use App\Http\Controllers\ScreeningController;

/*
|--------------------------------------------------------------------------
| LANDING & STATIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/consent', function () {
    return view('consent');
});

Route::get('/routing', function () {
    return view('routing');
});

/*
|--------------------------------------------------------------------------
| SCREENING PAGES
|--------------------------------------------------------------------------
*/

Route::get('/screening/phq9', function () {
    return view('screening.phq9');
});

Route::get('/screening/gad7', function () {
    return view('screening.gad7');
});

Route::get('/screening/pcl5', function () {
    return view('screening.pcl5');
});

Route::post('/screening/phq9', [ScreeningController::class, 'storePHQ9']);
Route::post('/screening/gad7', [ScreeningController::class, 'storeGAD7']);
Route::post('/screening/pcl5', [ScreeningController::class, 'storePCL5']);

/*
|--------------------------------------------------------------------------
| RESULT
|--------------------------------------------------------------------------
*/

Route::get('/result', [ScreeningController::class, 'result']);

/*
|--------------------------------------------------------------------------
| TOKEN SYSTEM (30-DAY REVIEW)
|--------------------------------------------------------------------------
*/

Route::get('/enter-token', function () {
    return view('enter-token');
});

Route::post('/enter-token', function (Request $request) {

    $request->validate([
        'token' => ['required', 'regex:/^MRS-[A-F0-9]{8}$/']
    ]);

    $screening = Screening::where('screening_token', $request->token)
        ->where('expires_at', '>', now())
        ->first();

    if (!$screening) {
        return back()->withErrors([
            'token' => 'Invalid or expired token.'
        ]);
    }

    return redirect('/review/' . $screening->screening_token);
});

Route::get('/review/{token}', function ($token) {

    $screening = Screening::where('screening_token', $token)
        ->where('expires_at', '>', now())
        ->first();

    if (!$screening) {
        abort(404);
    }

    return view('result', [
        'risk' => $screening->risk_level,
        'screening_token' => $screening->screening_token
    ]);
});
