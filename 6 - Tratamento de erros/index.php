<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

require_once "Validacao.php";
require_once "ContaCorrente.php";

$contaJoao = new ContaCorrente("João", "1212", "343434-4", 500.00);
$contaMaria = new ContaCorrente("Maria", "1212", "343445-4", 1500.00);
$contaMaria = new ContaCorrente("Pedro", "1212", "346544-4", 25000.00);
$contaMaria = new ContaCorrente("Carla", "1212", "349995-4", 85.00);
$contaJoana = new ContaCorrente("Joana","1212","343458-9",100.00);
$contaJosenilda = new ContaCorrente("Josenilda","1212","343987-9",100.00);
$contaFernanda = new ContaCorrente("Fernanda","1212","3434234-9",100.00);
$contaBernardo = new ContaCorrente("Bernardo","1212","3434235-9",100.00);

echo ContaCorrente::$totalDeContas . PHP_EOL;
echo ContaCorrente::$taxaOperacao . PHP_EOL;

$contaMaria->transferir(250, $contaJoao);

try {
    $contaJoao['teste'];
} catch (Error $erro) {
    echo $erro->getMessage() . PHP_EOL;
}
