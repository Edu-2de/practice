<?php

namespace App\Financeiro;

trait Logavel
{
    public function registrarLog($mensagem)
    {
        echo date('Y-m-d H:i:s') . " Log: $mensagem" . PHP_EOL;
    }
}
