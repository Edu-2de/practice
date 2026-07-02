<?php

namespace App\Financeiro;

class Contrato
{
    public function criarContrato(Orcavel $item)
    {
        $valor = $item->calcularOrcamento();
        $valor_formatado = Formatador::moeda($valor);
        return "Contrato fechado no valor de $valor_formatado";
    }
}
