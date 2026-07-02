<?php

namespace App\Financeiro;

class ProjetoEspecial extends Projeto
{
    public function calcularOrcamento(): float
    {
        return parent::calcularOrcamento() + 500;
    }
}
