<?php

$idade = 17;
$numeroDePessoas = 2;
$mensagem = "Você tem $idade anos";

echo "Você só pode entrar se tiver a partir de 18 anos " .
        "ou a partir de 16 anos acompanhado." . PHP_EOL;

/*
 * || - ou
 * && - e
 */

if ($idade >= 18) {
    $mensagemCompleta = "$mensagem. Você pode entrar.";
} elseif ($idade >= 16 && $numeroDePessoas > 1) {
    $mensagemCompleta = "$mensagem mas está acompanhado. Você pode entrar.";
} else {
    $mensagemCompleta = "$mensagem. Você não pode entrar desacompanhado.";
}

echo $mensagemCompleta;