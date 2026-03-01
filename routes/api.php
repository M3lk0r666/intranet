<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

//Ruta para API busqueda en tiempo real
Route::get('/search', [SearchController::class, 'liveSearch']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
