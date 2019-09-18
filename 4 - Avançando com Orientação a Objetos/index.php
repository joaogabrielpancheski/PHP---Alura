<?php

ini_set("display_errors", 1);
require_once "autoload.php";

use classes\funcionarios\Diretor;
use classes\funcionarios\Designer;
use classes\sistemaInterno\GerenciadorBonificacao;

$diretor = new Diretor("999.999.999-99", 20000.00);
$designer = new Designer("464.543.414-89");

$diretor->senha = "123456";
var_dump($diretor->autenticar("teste"));

$gerenciador = new GerenciadorBonificacao();

$gerenciador->AutentiqueAqui($diretor, "123456");

$gerenciador->registrar($diretor);
$gerenciador->registrar($designer);

var_dump($gerenciador->getTotalBonificacoes());

echo $designer->getBonificacao() . PHP_EOL;
echo $diretor->getBonificacao() . PHP_EOL;

var_dump($diretor);
var_dump($designer);

$designer->aumentarSalario();
$diretor->aumentarSalario();

var_dump($diretor);
var_dump($designer);
