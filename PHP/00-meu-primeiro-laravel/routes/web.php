<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    return "Meu primeiro sistema Laravel!";
});

Route::get('/orcamento/{valor}/{horas}', function ($valor, $horas) {
    return "Orcamento deu: " . $valor * $horas;
});
