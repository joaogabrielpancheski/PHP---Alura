<?php

$contasCorrentes = [
    '123.456.789-10' => [
        'titular' => 'João Gabriel',
        'saldo' => 1000
    ],
    '123.456.489-11' => [
        'titular' => 'Alan',
        'saldo' => 5000
    ],
    '123.256.789-10' => [
        'titular' => 'Bruno',
        'saldo' => 10000
    ]
];

$contasCorrentes['123.456.489-11']['saldo'] -= 500;
if (1500 > $contasCorrentes['123.456.789-10']['saldo']) {
    echo "Você não pode sacar esse valor" . PHP_EOL;
} else {
    $contasCorrentes['123.456.789-10']['saldo'] -= 1500;
}

foreach ($contasCorrentes as $cpf => $conta) {
    echo $cpf . " - " . $conta['titular'] . " - " . $conta['saldo'] . PHP_EOL;
}