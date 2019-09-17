<?php

function exibeMensagem ($mensagem) {
    echo $mensagem . PHP_EOL;
}

function sacar (array $conta, float $valorASacar) : array {
    if ($valorASacar <= $conta['saldo'] && $valorASacar > 0) {
        $conta['saldo'] -= $valorASacar;
    } else {
        exibeMensagem("Você não pode sacar esse valor");
    }
    return $conta;
}

function depositar (array $conta, float $valorADepositar) : array {
    if ($valorADepositar > 0) {
        $conta['saldo'] += $valorADepositar;
    } else {
        exibeMensagem("Você não pode depositar esse valor");
    }
    return $conta;
}

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

$contasCorrentes['123.456.489-11'] = sacar($contasCorrentes['123.456.489-11'], 500);
$contasCorrentes['123.456.789-10'] = sacar($contasCorrentes['123.456.789-10'], 1500);
$contasCorrentes['123.456.789-10'] = depositar($contasCorrentes['123.456.789-10'], 3800);

foreach ($contasCorrentes as $cpf => $conta) {
    exibeMensagem($cpf . " - " . $conta['titular'] . " - " . $conta['saldo']);
}