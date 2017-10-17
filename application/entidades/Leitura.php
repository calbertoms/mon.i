<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Leitura
 *
 * @author Suporte
 */
class Leitura {
    
    private $id;
    private $nivel;
    private $dataHora;
    
    public function getId() {
        return $this->id;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function getDataHora() {
        return $this->dataHora;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function setDataHora($dataHora) {
        $this->dataHora = $dataHora;
    }


    
}
