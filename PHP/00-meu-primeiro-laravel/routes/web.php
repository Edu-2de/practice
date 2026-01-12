<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrcamentoController;
use App\Http\Controllers\ClienteController;
use Symfony\Component\Routing\Router;
use App\Models\Cliente;

Route::get('/novo-orcamento', [OrcamentoController::class, 'mostrarFormulario']);

Route::post('/calcular', [OrcamentoController::class, 'calcular']);

Route::get('/', [OrcamentoController::class, 'index']);

Route::delete('/orcamento/{id}', [OrcamentoController::class, 'excluir']);

Route::get('/orcamento/{id}/editar', [OrcamentoController::class, 'editar']);

Route::put('/orcamento/{id}', [OrcamentoController::class, 'update']);

Route::get('/criar-cliente-teste', function () {
    Cliente::create([
        'nome' => 'Empresa ABC Ltda',
        'telefone' => '(11) 99999-8888'
    ]);
    return "Cliente de teste criado com sucesso!";
});


Route::get('/clientes', [ClienteController::class, 'index']);

Route::get('/novo-cliente', [ClienteController::class, 'mostrarFormualirocliente']);

Route::post('/criar-cliente', [ClienteController::class, 'criar']);

Route::get('/clientes/{id}/editar_cliente', [ClienteController::class, 'edit']);

Route::put('/clientes/{id}', [ClienteController::class, 'update']);

Route::delete('/clientes/{id}', [ClienteController::class, 'excluir']);
