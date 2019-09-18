<?php

namespace Alura;

require_once "autoload.php";


$correntistas = [
    "Giovanni",
    "João",
    "Maria",
    "Luis",
    "Luisa",
    "Rafael"
];

$saldos = [
    2500,
    3000,
    4400,
    1000,
    8700,
    9000
];

$relacionados = array_combine($correntistas, $saldos);

$relacionados["Matheus"] = 4500;

if (array_key_exists("João", $relacionados)) {
    echo "O saldo do João é: {$relacionados["João"]}";
} else {
    echo "Não foi encontrado!";
}

//var_dump($relacionados);
//echo $relacionados["Luis"];

$maiores = ArrayUtils::encontrarPessoasComSaldoMaior(3000, $relacionados);

var_dump($maiores);


/*
$correntistas = [
    "Giovanni",
    "João",
    "Maria",
    "Luis",
    "Luisa",
    "Rafael"
];

$correntistasNaoPagantes = [
    "Luis",
    "Luisa",
    "Rafael"
];

$correntistasPagantes = array_diff($correntistas, $correntistasNaoPagantes);

var_dump($correntistasPagantes);*/
