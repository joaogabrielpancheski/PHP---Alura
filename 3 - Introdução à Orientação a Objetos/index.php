<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

require_once "ContaCorrente.php";

$contaJoao = new ContaCorrente("João", "1212", "343434-4", 500.00);
$contaMaria = new ContaCorrente("Maria", "1212", "343445-4", 1500.00);

var_dump($contaJoao);
var_dump($contaMaria);

$contaJoao->transferir(250.00, $contaMaria);

var_dump($contaJoao);
var_dump($contaMaria);




