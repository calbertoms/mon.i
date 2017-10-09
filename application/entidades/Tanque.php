<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tanque
 *
 * @author Suporte
 */
class Tanque {
    //put your code here
    
    private $id;
    private $identificacao;
    private $dataFabricacao;
    private $dataInspecao;
    private $dataManutencao;
    private $capacidade;


    public function getId() {
        return $this->id;
    }
    
    public function getIdentificacao() {
        return $this->identificacao;
    }

    public function getDataFabricacao() {
        return $this->dataFabricacao;
    }

    public function getDataInspecao() {
        return $this->dataInspecao;
    }

    public function getDataManutencao() {
        return $this->dataManutencao;
    }
    
    public function getCapacidade() {
        return $this->capacidade;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setIdentificacao($identificacao) {
        $this->identificacao = $identificacao;
    }

    public function setDataFabricacao($dataFabricacao) {
        $this->dataFabricacao = $dataFabricacao;
    }

    public function setDataInspecao($dataInspecao) {
        $this->dataInspecao = $dataInspecao;
    }

    public function setDataManutencao($dataManutencao) {
        $this->dataManutencao = $dataManutencao;
    }
    
    public function setCapacidade($capacidade) {
        $this->capacidade = $capacidade;
    }
    
}
