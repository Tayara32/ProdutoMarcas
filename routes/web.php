<?php

use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('produtos', ProdutoController::class);
Route::resource('marcas', MarcaController::class);
