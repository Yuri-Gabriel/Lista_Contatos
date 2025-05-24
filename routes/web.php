<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContatoController::class, "index"]);
Route::post('/', [ContatoController::class, "create"]);
Route::put('/', [ContatoController::class, "edit"]);
Route::delete('/', [ContatoController::class, "delete"]);
