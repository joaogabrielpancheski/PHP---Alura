<?php

class ContaCorrente {

    private $titular;
    private $agencia;
    private $numero;
    private $saldo;

    public function __construct ($titular, $agencia, $numero, $saldo) {
        $this->titular = $titular;
        $this->agencia = $agencia;
        $this->numero = $numero;
        $this->saldo = $saldo;
    }

    public function sacar ($valor) {
        $this->saldo = $this->saldo - $valor;
        return $this;
    }

    public function depositar ($valor) {
        $this->saldo = $this->saldo + $valor;
        return $this;
    }

    public function transferir ($valor, ContaCorrente $conta) {
        if (!is_numeric($valor)) {
            echo "O valor passado não é número";
            exit();
        }
        $this->sacar($valor);
        $conta->depositar($valor);
        return $this;
    }

    public function __get ($atributo) {
        $this->protegeAtributo($atributo);
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->protegeAtributo($atributo);
        $this->$atributo = $valor;
    }

    private function protegeAtributo ($atributo) {
        if ($atributo == "titular" || $atributo == "saldo") {
            throw new Exception("O atributo $atributo é privado");
        }
    }

    private function formataSaldo() {
        return "R$ " . number_format($this->saldo, 2, ",",".");
    }

    public function getSaldo () {
        return $this->formataSaldo();
    }
}

