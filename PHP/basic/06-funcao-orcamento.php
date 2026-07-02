<?php

$site = [
    'nome' => 'Site Institucional',
    'horas' => 100.0,
    'valor_hora' => 300.00,
    'ativo' => true
];

$app = [
    'nome' => 'App Institucional',
    'horas' => 250.0,
    'valor_hora' => 600.00,
    'ativo' => true
];

function calcularOrcamento($qtde_horas, $valor_hora)
{
    return $qtde_horas * $valor_hora;
}

echo calcularOrcamento($site['horas'], $site['valor_hora']) . "\n";
echo calcularOrcamento($app['horas'], $app['valor_hora']) . "\n";
