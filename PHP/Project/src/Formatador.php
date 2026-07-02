<?php

namespace App\Financeiro;

class Formatador
{
    public static function moeda($valor)
    {
        return "R$ " . number_format($valor, 2, ",", ".");
    }
}
