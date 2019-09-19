<?php

class Validacao {

    public static function protegeAtributo ($atributo) {
        if ($atributo == "titular" || $atributo == "saldo") {
            throw new Exception("O atributo $atributo é privado");
        }
    }

    public static function verificaNumerico ($valor) {
        if (!is_numeric($valor)) {
            throw new Exception("O tipo de dado passado não é um número válido!");
        }
    }

}