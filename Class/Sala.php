<?php

class Sala {

    private $id_sala;
    private $sala;
    private $equipamento_id;
    
    function getId_sala() {
        return $this->id_sala;
    }

    function getEquipamento_id() {
        return $this->equipamento_id;
    }

    function setId_sala($id_sala) {
        $this->id_sala = $id_sala;
    }

    function setEquipamento_id($equipamento_id) {
        $this->equipamento_id = $equipamento_id;
    }

        function getSala() {
        return $this->sala;
    }

    function setSala($sala) {
        $this->sala = $sala;
    }

}
