<?php

class ContaCorrente {

    private $titular;
    private $agencia;
    private $numero;
    private $saldo;
    public static $totalDeContas;
    public static $taxaOperacao;

    public function __construct ($titular, $agencia, $numero, $saldo) {
        $this->titular = $titular;
        $this->agencia = $agencia;
        $this->numero = $numero;
        $this->saldo = $saldo;

        self::$totalDeContas++;

        self::calculaTaxaOperacao();

    }

    public static function calculaTaxaOperacao () {
        try {
            if (self::$totalDeContas < 1) {
                throw new \DivisionByZeroError("Não é possivel realizar divisao por 0!");
            }
            self::$taxaOperacao = 30 / self::$totalDeContas;
        } catch (\DivisionByZeroError $erro) {
            echo $erro->getMessage() . PHP_EOL;
        }
    }

    private function validarValor ($valor) {
        try {
            Validacao::verificaNumerico($valor);
            Validacao::verificaNumeroPositivo($valor);
        } catch (Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
            exit();
        }
    }

    public function sacar ($valor) {
        $this->validarValor($valor);
        $this->saldo = $this->saldo - $valor;
        return $this;
    }

    public function depositar ($valor) {
        $this->validarValor($valor);
        $this->saldo = $this->saldo + $valor;
        return $this;
    }

    public function transferir ($valor, ContaCorrente $contaCorrente) {
        $this->validarValor($valor);
        $this->sacar($valor);
        $contaCorrente->depositar($valor);
        return $this;
    }

    public function __get ($atributo) {
        try {
            Validacao::protegeAtributo($atributo);
        } catch (Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
        }

        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        try {
            Validacao::protegeAtributo($atributo);
        } catch (Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
        }

        $this->$atributo = $valor;
    }

    private function formataSaldo() {
        return "R$ " . number_format($this->saldo, 2, ",",".");
    }

    public function getSaldo () {
        return $this->formataSaldo();
    }

    public function __toString() {
        return "O titular da conta é: " . $this->titular . ". Seu saldo é: " . $this->getSaldo();
    }
}

