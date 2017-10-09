<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fabrica
 *
 * @author Suporte
 */
class Fabrica {
    //put your code here
    
    private $id;
    private $nome;
    private $setor;
    private $capacidadeProdutiva;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSetor() {
        return $this->setor;
    }

    public function getCapacidadeProdutiva() {
        return $this->capacidadeProdutiva;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSetor($setor) {
        $this->setor = $setor;
    }

    public function setCapacidadeProdutiva($capacidadeProdutiva) {
        $this->capacidadeProdutiva = $capacidadeProdutiva;
    }

    
}
