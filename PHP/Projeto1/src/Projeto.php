<?php

namespace App\Financeiro;

class Projeto implements Orcavel
{
    public string $nome;
    public float $hora;
    private float $valor_hora;

    use Logavel;

    public function __construct($nome_recebido, $hora_recebida, $valor_hora_recebido)
    {
        $this->nome = $nome_recebido;
        $this->hora = $hora_recebida;
        $this->valor_hora = $valor_hora_recebido;
    }

    public function calcularOrcamento(): float
    {
        $this->registrarLog("Calculando orçamento...");
        return $this->hora * $this->valor_hora;
    }

    public function mostrarInfos(): string
    {
        return "O projeto $this->nome tem: $this->hora horas, com valor/hora de: $this->valor_hora\n";
    }

    public function setValorHora(float $novoValor)
    {
        if ($novoValor <= 0) {
            throw new \Exception("O valor da hora não pode ser zero ou negativo.\n");
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
