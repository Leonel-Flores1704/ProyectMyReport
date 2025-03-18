<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::post('/guardar-reporte', [ReporteController::class, 'store'])->name('guardar.reporte');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reports', function () {
    return view('reports');
});
Route::get('/terminos-y-condiciones', function () {
    return view('terminos'); // terminos
});

Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

Auth::routes();


