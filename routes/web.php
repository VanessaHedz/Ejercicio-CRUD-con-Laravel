<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

Route::get('/', [PeliculaController::class, 'index'])
    ->name('peliculas.index');

Route::post('/create', [PeliculaController::class, 'add'])
    ->name('peliculas.create');

Route::post('/delete', [PeliculaController::class, 'delete'])
    ->name('peliculas.delete');

Route::post('/watch', [PeliculaController::class, 'watch'])
    ->name('peliculas.watch');

Route::post('/edit',[PeliculaController::class, 'edit'])
    ->name('peliculas.edit');