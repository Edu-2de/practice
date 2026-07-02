<?php
class Projeto
{
    public string $nome;
    public float $hora;
    public float $valor_hora;

    public function __construct($nome_recebido, $hora_recebida, $valor_hora_recebido)
    {
        $this->nome = $nome_recebido;
        $this->hora = $hora_recebida;
        $this->valor_hora = $valor_hora_recebido;
    }

    function calcularOrcamento(): float
    {
        return $this->hora * $this->valor_hora;
    }
}

$app = new Projeto('app de Financas', 100.0, 300.5);
echo "O projeto $app->nome ficou em um total de R$" . $app->calcularOrcamento();
