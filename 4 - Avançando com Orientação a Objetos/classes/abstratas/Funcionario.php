<?php

namespace classes\abstratas;

class Funcionario {
    public $nome;
    public $cpf;
    protected $salario;

    public function __construct ($cpf, $salario) {
        $this->cpf = $cpf;
        $this->salario = $salario;
    }
}

