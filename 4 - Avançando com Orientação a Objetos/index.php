<?php

ini_set("display_errors", 1);
require_once "autoload.php";

use classes\funcionarios\Diretor;
use classes\funcionarios\Designer;

$diretor = new Diretor("999.999.999-99", 20000.00);
$designer = new Designer("464.543.414-89", 5000.00);

$diretor->senha = "123456";
var_dump($diretor->autenticar("teste"));

echo $designer->getBonificacao();
echo $diretor->getBonificacao();

var_dump($diretor);
var_dump($designer);

$designer->aumentarSalario();
$diretor->aumentarSalario();

var_dump($diretor);
var_dump($designer);
