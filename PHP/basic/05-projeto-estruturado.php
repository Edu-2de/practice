<?php
$projeto = [
    'nome' => 'Site Institucional',
    'horas' => 100.0,
    'valor_hora' => 300.00,
    'ativo' => true
];

$status_ativo = $projeto['ativo'] ? 'Ativo!' : 'Inativo!';

echo 'O ' . $projeto['nome'] . ' está: ' . $status_ativo;
