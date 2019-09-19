<?php

require_once "autoload.php";

use exception\SaldoInsuficienteException;

$contaJoao = new ContaCorrente("João", "1212", "343434-4", 500.00);
$contaMaria = new ContaCorrente("Maria", "1212", "343445-4", 1500.00);
$contaPedro = new ContaCorrente("Pedro", "1212", "346544-4", 25000.00);
$contaCarla = new ContaCorrente("Carla", "1212", "349995-4", 85.00);
$contaJoana = new ContaCorrente("Joana","1212","343458-9",100.00);
$contaJosenilda = new ContaCorrente("Josenilda","1212","343987-9",100.00);
$contaFernanda = new ContaCorrente("Fernanda","1212","3434234-9",100.00);
$contaBernardo = new ContaCorrente("Bernardo","1212","3434235-9",100.00);

echo ContaCorrente::$totalDeContas . PHP_EOL;
echo ContaCorrente::$taxaOperacao . PHP_EOL;

try {
    $contaMaria->transferir(250, $contaJoao);
} catch (SaldoInsuficienteException $erro) {
    echo $erro->getMessage() . PHP_EOL;
    /*echo $erro->getPrevious()->getMessage();
    echo $erro->getTraceAsString();
    echo $erro->getPrevious()->getTraceAsString();*/
}

/*try {
    $contaJoao['teste'];
} catch (\Error $erro) {
    echo $erro->getMessage() . PHP_EOL;
}*/

echo ContaCorrente::$operacaoNaoRealizada . PHP_EOL;

$contaJoao->sacar(5000);
$contaJoao->sacar(7500);
$contaJoao->sacar(3600);

echo ContaCorrente::$operacaoNaoRealizada . PHP_EOL;
