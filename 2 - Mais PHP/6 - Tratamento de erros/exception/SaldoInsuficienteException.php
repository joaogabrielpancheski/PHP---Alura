<?php

namespace exception;

class SaldoInsuficienteException extends \Exception {

    private $valor;
    private $saldo;

    public function __construct($message, $valor, $saldo) {

        $this->valor = $valor;
        $this->saldo = $saldo;

        parent::__construct($message, null, null);
    }

    public function __get($param) {
        return $this->$param;
    }
}