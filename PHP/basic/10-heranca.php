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

    public function calcularOrcamento(): float
    {
        return $this->hora * $this->valor_hora;
    }

    public function mostrarInfos(): string
    {
        return "O projeto $this->nome tem: $this->hora horas, com valor/hora de: $this->valor_hora\n";
    }
}

class ProjetoEspecial extends Projeto
{
    public function calcularOrcamento(): float
    {
        return parent::calcularOrcamento() + 500;
    }
}

$app = new Projeto('app de Financas', 100.0, 300.5);
$site = new ProjetoEspecial('site de Financas', 200.0, 40.3);
echo  $app->mostrarInfos() . " ficou em um total de R$" . $app->calcularOrcamento();
echo  $site->mostrarInfos() . " ficou em um total de R$" . $site->calcularOrcamento();
