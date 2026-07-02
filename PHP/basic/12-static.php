<?php
class Projeto
{
    public string $nome;
    public float $hora;
    private float $valor_hora;

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

    public function setValorHora(float $novoValor)
    {
        if ($novoValor <= 0) {
            return "Valor inválido\n";
        } else {
            $this->valor_hora = $novoValor;
            return "Novo valor definido!\n";
        }
    }

    public function getValorHora(): float
    {
        return $this->valor_hora;
    }
}

class ProjetoEspecial extends Projeto
{
    public function calcularOrcamento(): float
    {
        return parent::calcularOrcamento() + 500;
    }
}

class Formatador
{
    public static function moeda($valor)
    {
        return "R$ " . number_format($valor, 2, ",", ".");
    }
}

$app = new Projeto('app de Financas', 100.0, 300.5);
$site = new ProjetoEspecial('site de Financas', 200.0, 40.3);
echo  $app->mostrarInfos() . " ficou em um total de " . Formatador::moeda($app->calcularOrcamento())  . "\n";
echo  $site->mostrarInfos() . " ficou em um total de " . Formatador::moeda($site->calcularOrcamento()) . "\n";


echo $app->setValorHora(150.0);
echo  $app->mostrarInfos() . " ficou em um total de " . Formatador::moeda($app->calcularOrcamento()) . "\n";
