<?php

class Validacao {

    public static function protegeAtributo ($atributo) {
        if ($atributo == "titular" || $atributo == "saldo") {
            throw new \Exception("O atributo $atributo é privado");
        }
    }

    public static function verificaNumerico ($valor) {
        if (!is_numeric($valor)) {
            throw new \InvalidArgumentException("O tipo de dado passado não é um número válido!");
        }
    }


    public static function verificaNumeroPositivo ($valor) {
        if ($valor <= 0) {
            throw new \Exception("O valor não é permitido!");
        }
    }

    public static function validarSaldo ($valor, $saldo) {
        if ($valor > $saldo) {
            throw new \exception\SaldoInsuficienteException("Saldo insuficiente!", $valor, $saldo);
        }
    }

}