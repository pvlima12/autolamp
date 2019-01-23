<?php

class Disciplina {

    private $nome;
    private $cod_disciplina;
    private $csrgaHoraria;

    function getNome() {
        return $this->nome;
    }

    function getCod_disciplina() {
        return $this->cod_disciplina;
    }

    function getCsrgaHoraria() {
        return $this->csrgaHoraria;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCod_disciplina($cod_disciplina) {
        $this->cod_disciplina = $cod_disciplina;
    }

    function setCsrgaHoraria($csrgaHoraria) {
        $this->csrgaHoraria = $csrgaHoraria;
    }

}
