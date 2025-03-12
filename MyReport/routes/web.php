<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\ReporteController;
Route::post('/upload-images', [ReporteController::class, 'upload'])->name('upload.images');

Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reports', function () {
    return view('reports');
});
Route::get('/terminos-y-condiciones', function () {
    return view('terminos'); // Aquí cambiarás 'terminos' por el nombre del archivo de vista
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
