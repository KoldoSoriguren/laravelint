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
