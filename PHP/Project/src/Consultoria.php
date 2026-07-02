<?php

namespace App\Financeiro;

class Consultoria implements Orcavel
{
    public float $valor_fixo = 150.00;

    use Logavel;

    public function calcularOrcamento(): float
    {
        $this->registrarLog("calculando orçamento...");
        return $this->valor_fixo;
    }
}
