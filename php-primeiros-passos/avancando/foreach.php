<?php

$contasCorrentes = [
    12345678910 => [
        'titular' => 'João Gabriel',
        'saldo' => 1000
    ],
    12345648911 => [
        'titular' => 'Alan',
        'saldo' => 5000
    ],
    12325678910 => [
        'titular' => 'Bruno',
        'saldo' => 10000
    ]
];

$contasCorrentes['123.258.852-12'] = [
    'titular'=> 'Claudia',
    'saldo' => 2700
];

foreach ($contasCorrentes as $cpf => $conta) {
    echo $cpf . " " . "$conta"['titular'] . PHP_EOL;
}