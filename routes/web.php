<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JuegoController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/a', function () {
    return view('prueba');
});


Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos.index');
Route::delete('/torneos/{id}', [TorneoController::class, 'destroy'])->name('torneos.destroy');
Route::put('/torneos/{id}/cerrar', [TorneoController::class, 'cerrar'])->name('torneos.cerrar');
Route::put('/torneos/{id}/abrir', [TorneoController::class, 'abrir'])->name('torneos.abrir');
Route::get('/torneos/{id}/ver', [TorneoController::class, 'show'])->name('torneos.show');




Route::get('/torneos/crear', [JuegoController::class, 'showAll'])->name('torneos.crear');
Route::post('/torneos', [TorneoController::class, 'store'])->name('torneos.store');

Route::get('/sesion/iniciar', [UserController::class, 'iniciar'])->name('sesion.iniciar');
Route::post('/sesion/iniciada', [UserController::class, 'login'])->name('sesion.iniciada');

Route::get('/sesion/cerrar', [UserController::class, 'logout'])->name('sesion.cerrar');

Route::post('/idioma/cambiar', [UserController::class, 'cambiarIdioma'])->name('idioma.cambiar');
Route::put('/torneos/{id}/inscribir', [TorneoController::class, 'inscribir'])->name('torneos.inscribir');
