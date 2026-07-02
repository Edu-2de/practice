<?php
$nome_do_projeto = 'Site Institucional';
$horas_estimadas = 100.0;
$valor_hora = 300.00;
$prazo_entrega = 10;
$etapas = ["Briefing", "Design", "Programação", "Testes"];
$valor_total = $horas_estimadas * $valor_hora;

if ($valor_total > 3000) {
    $valor_total = ($valor_total - ($valor_total * (10 / 100)));
    echo "Recebeu desconto por conta do valor!\n";
} else {
    echo "Sem desconto quanto ao valor.\n";
}

if ($prazo_entrega <= 5) {
    $valor_total = ($valor_total + ($valor_total  * (20 / 100)));
    echo "Taxa de Urgencia aplicada!\n";
} elseif ($prazo_entrega > 30) {
    $valor_total = ($valor_total - ($valor_total  * (15 / 100)));
    echo "Recebeu desconto!\n";
} else {
    echo "Sem desconto ou taxa quanto ao prazo.\n";
}

echo "O Servico $nome_do_projeto com prazo de $prazo_entrega dias ficou R$ $valor_total \n";

echo "Iniciando as etapas do projeto: \n";

foreach ($etapas as $index => $etapa) {
    echo ($index + 1) . ". $etapa \n";
}
