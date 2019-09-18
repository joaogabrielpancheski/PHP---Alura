<?php

require_once "autoload.php";

use exception\SaldoInsuficienteException;

class ContaCorrente {

    private $titular;
    private $agencia;
    private $numero;
    private $saldo;
    public static $totalDeContas;
    public static $taxaOperacao;
    public $totalSaquesNaoPermitidos;

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

    public function sacar ($valor) {
        try {
            Validacao::verificaNumerico($valor);
            Validacao::verificaNumeroPositivo($valor);
            Validacao::validarSaldo($valor, $this->saldo);
        } catch (InvalidArgumentException $erro) {
            echo $erro->getMessage() . PHP_EOL;
        } catch (SaldoInsuficienteException $erro) {
            $this->totalSaquesNaoPermitidos++;
            echo $erro->getMessage() .
                " Saldo em conta: ".$erro->saldo .
                ". Valor do saque: ".$erro->valor."." . PHP_EOL;
        } catch (\Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
        }
        $this->saldo = $this->saldo - $valor;
        return $this;
    }

    public function depositar ($valor) {
        try {
            Validacao::verificaNumerico($valor);
            Validacao::verificaNumeroPositivo($valor);
        } catch (InvalidArgumentException $erro) {
            echo $erro->getMessage() . PHP_EOL;
        } catch (\Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
        }
        $this->saldo = $this->saldo + $valor;
        return $this;
    }

    public function transferir ($valor, ContaCorrente $contaCorrente) {
        $saldoAnterior = $this->saldo;
        $this->sacar($valor);

        if ($saldoAnterior == ($this->saldo - $valor)) {
            $contaCorrente->depositar($valor);
        }

        return $this;
    }

    public function __get ($atributo) {
        try {
            Validacao::protegeAtributo($atributo);
        } catch (\Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
        }

        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        try {
            Validacao::protegeAtributo($atributo);
        } catch (\Exception $erro) {
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

