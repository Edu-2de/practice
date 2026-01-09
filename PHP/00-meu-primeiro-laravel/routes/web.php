<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrcamentoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    return "Meu primeiro sistema Laravel!";
});

Route::get('/orcamento/{valor}/{horas}', [OrcamentoController::class, 'calcular']);
