<?php
interface Orcavel
{
    public function calcularOrcamento(): float;
}

trait Logavel
{
    public function registrarLog($mensagem)
    {
        echo date('Y-m-d H:i:s') . " Log: $mensagem" . PHP_EOL;
    }
}


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
            throw new Exception("O valor da hora não pode ser zero ou negativo.\n");
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

class Contrato
{
    public function criarContrato(Orcavel $item)
    {
        $valor = $item->calcularOrcamento();
        $valor_formatado = Formatador::moeda($valor);
        return "Contrato fechado no valor de $valor_formatado";
    }
}

class Consultoria implements Orcavel
{
    public float $valor_fixo = 150.00;

    use Logavel;

    public function calcularOrcamento(): float
    {
        $this->registrarLog("calculando orçamento...");
        return $this->valor_fixo;
    }
}



$app = new Projeto('app de Financas', 100.0, 300.5);
$site = new ProjetoEspecial('site de Financas', 200.0, 40.3);
echo  $app->mostrarInfos() . " ficou em um total de " . Formatador::moeda($app->calcularOrcamento())  . "\n";
echo  $site->mostrarInfos() . " ficou em um total de " . Formatador::moeda($site->calcularOrcamento()) . "\n";

try {
    $app->setValorHora(-50.0);
    echo "Sucesso!\n";
} catch (Exception $e) {
    echo "Erro!: " . $e->getMessage();
}

echo  $app->mostrarInfos() . " ficou em um total de " . Formatador::moeda($app->calcularOrcamento()) . "\n";

$contratoApp = new Contrato();
echo $contratoApp->criarContrato($app) . "\n";

$consultoria = new Consultoria();
$contratoConsultoria = new Contrato();
echo $contratoConsultoria->criarContrato($consultoria) . "\n";
