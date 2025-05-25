<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContatoController::class, "index"])->name('main');
Route::post('/', [ContatoController::class, "create"]);
Route::delete('/', [ContatoController::class, "delete"]);
