<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TorneoController;

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




Route::get('/torneos/crear', [TorneoController::class, 'create'])->name('torneos.crear');
Route::post('/torneos', [TorneoController::class, 'store'])->name('torneos.store');
