<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrcamentoController extends Controller
{
    public function calcular(float $valor, float $horas)
    {
        $resultado = $valor * $horas;
        return view('resultado', [
            'v' => $valor,
            'h' => $horas,
            'total' => $resultado
        ]);
    }
}
