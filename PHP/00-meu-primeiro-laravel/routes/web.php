<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrcamentoController;
use Symfony\Component\Routing\Router;

Route::get('/novo-orcamento', [OrcamentoController::class, 'mostrarFormulario']);

Route::post('/calcular', [OrcamentoController::class, 'calcular']);

Route::get('/', [OrcamentoController::class, 'index']);

Route::delete('/orcamento/{id}', [OrcamentoController::class, 'excluir']);

Route::get('/orcamento/{id}/editar', [OrcamentoController::class, 'editar']);
