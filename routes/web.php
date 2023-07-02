<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[App\Http\Controllers\PortafolioController::class, 'index'] );

Auth::routes();

//ruta que dirige al crud
Route::resource('/proyectos',App\Http\Controllers\ProyectoController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ruta que se llama desde template > about section > button linea 97 par ala descarga del curriculum
Route::get('/descargar-pdf', function () {
    $rutaArchivo = public_path('assets\pdf\curriculum.pdf');
    return Response::download($rutaArchivo);
})->name('descargarPDF');