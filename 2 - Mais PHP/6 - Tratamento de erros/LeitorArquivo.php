<?php

class LeitorArquivo {

    private $arquivo;

    public function __construct ($arquivo) {
        $this->arquivo = $arquivo;
    }

    public function abrirArquivo () {
        echo "Abrindo arquivo" . PHP_EOL;
    }

    public function lerArquivo () {
        echo "Lendo arquivo" . PHP_EOL;
    }

    public function escreverArquivo () {
        echo "Escrevendo no arquivo" . PHP_EOL;
    }

    public function fecharArquivo () {
        echo "Fechando arquivo" . PHP_EOL;
    }

}