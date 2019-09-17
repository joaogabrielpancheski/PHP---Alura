<?php

$conta1 = [
    'titular' => 'João Gabriel',
    'saldo' => 1000
];

$conta2 = [
    'titular' => 'Alan',
    'saldo' => 5000
];

$conta3 = [
    'titular' => 'Bruno',
    'saldo' => 10000
];

$contasCorrentes = [$conta1, $conta2, $conta3];

for ($i = 0; $i < count($contasCorrentes); $i++) {
    echo $contasCorrentes[$i]['titular'] . PHP_EOL;
}