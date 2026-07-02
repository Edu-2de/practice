<?php
class Projeto
{
    public string $nome;
    public float $hora;
    public float $valor_hora;

    function calcularOrcamento(): float
    {
        return $this->hora * $this->valor_hora;
    }
}
$app->nome = "Aplicativo Financas";
$app->hora = 100.0;
$app->valor_hora = 300.0;

echo "O valor total foi de: R$" . $app->calcularOrcamento();
