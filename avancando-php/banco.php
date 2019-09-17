<?php

require_once 'funcoes.php';

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
$contasCorrentes['123.456.789-10'] = depositar($contasCorrentes['123.456.789-10'], 800);

titularComLetrasMaiusculas($contasCorrentes['123.456.789-10']);

unset($contasCorrentes['123.456.789-10']);

foreach ($contasCorrentes as $cpf => $conta) {
    ['titular' => $titular, 'saldo' => $saldo] = $conta;
    exibeMensagem("$cpf - $titular - $saldo");
}