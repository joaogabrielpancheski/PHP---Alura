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

    public function getBonificacao () {
        return $this->salario * 0.5;
    }

    public function aumentarSalario () {
        $this->salario *= 1.5;
    }

}

