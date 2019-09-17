<?php

ini_set("display_errors", 1);
require_once "autoload.php";

use classes\funcionarios\Diretor;
use classes\funcionarios\Designer;

$diretor = new Diretor();
$designer = new Designer();

var_dump($diretor);

