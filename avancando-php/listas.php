<?php

$idadeList = [21, 23, 19, 25, 30, 41, 18];

list ($idadeUm, , $idadeTres) = $idadeList;

$idadeList[] = 20;

unset($idadeList[4]);

foreach ($idadeList as $idade) {
    echo $idade . PHP_EOL;
}