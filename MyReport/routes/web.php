<?php
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store');
Route::get('/myreports', [ReporteController::class, 'index'])->name('myreports');
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/administrador', [AdministradorController::class, 'index'])->name('administrador.index');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/reports', function () {
        return view('reports');
    });
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/terminos-y-condiciones', function () {
    return view('terminos'); 
});
Route::get('/politica', function () {
    return view('politica');
});

Route::get('/resolvedMatters', function(){
    return view('resolvedMatters');
});


Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);



Auth::routes();


