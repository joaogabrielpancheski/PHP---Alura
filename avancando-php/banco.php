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
$contasCorrentes['123.456.789-10'] = sacar($contasCorrentes['123.456.789-10'], 500);
$contasCorrentes['123.456.789-10'] = depositar($contasCorrentes['123.456.789-10'], 800);

titularComLetrasMaiusculas($contasCorrentes['123.456.789-10']);

unset($contasCorrentes['123.456.789-10']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Contas correntes</h1>

    <dl>
        <?php foreach ($contasCorrentes as $cpf => $conta) { ?>
        <dt><h3><?= $conta['titular']; ?> - <?= $cpf; ?></h3></dt>
        <dd>Saldo: <?= $conta['saldo']; ?></dd>
        <?php } ?>
    </dl>
</body>
</html>
