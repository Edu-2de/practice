<?php
$nome_do_projeto = 'Site Institucional';
$horas_estimadas = 100.0;
$valor_hora = 300.00;
$valor_total = $horas_estimadas * $valor_hora;
if ($valor_total > 3000) {
    $valor_total = ($valor_total - ($valor_total * (10 / 100)));
    echo "Recebeu desconto! Novo valor: $valor_total";
} else {
    echo "Sem desconto. Valor: $valor_total";
}
