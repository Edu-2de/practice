<?php

namespace App\Financeiro;

require_once "src/Orcavel.php";
require_once "src/Logavel.php";
require_once "src/Projeto.php";
require_once "src/ProjetoEspecial.php";
require_once "src/Formatador.php";
require_once "src/Contrato.php";
require_once "src/Consultoria.php";

$app = new Projeto('app de Financas', 100.0, 300.5);
$site = new ProjetoEspecial('site de Financas', 200.0, 40.3);
echo  $app->mostrarInfos() . " ficou em um total de " . Formatador::moeda($app->calcularOrcamento())  . "\n";
echo  $site->mostrarInfos() . " ficou em um total de " . Formatador::moeda($site->calcularOrcamento()) . "\n";

try {
    $app->setValorHora(-50.0);
    echo "Sucesso!\n";
} catch (\Exception $e) {
    echo "Erro!: " . $e->getMessage();
}

echo  $app->mostrarInfos() . " ficou em um total de " . Formatador::moeda($app->calcularOrcamento()) . "\n";

$contratoApp = new Contrato();
echo $contratoApp->criarContrato($app) . "\n";

$consultoria = new Consultoria();
$contratoConsultoria = new Contrato();
echo $contratoConsultoria->criarContrato($consultoria) . "\n";
