<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rota
 *
 * @author Suporte
 */
class Rota {
    //put your code here
    
    private $id;
    private $nome;
    private $fornecedor;
    private $consumidor;
    private $distancia;
    private $tempoViagem;
    private $pedagio;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getFornecedor() {
        return $this->fornecedor;
    }

    public function getConsumidor() {
        return $this->consumidor;
    }

    public function getDistancia() {
        return $this->distancia;
    }

    public function getTempoViagem() {
        return $this->tempoViagem;
    }

    public function getPedagio() {
        return $this->pedagio;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setFornecedor($fornecedor) {
        $this->fornecedor = $fornecedor;
    }

    public function setConsumidor($consumidor) {
        $this->consumidor = $consumidor;
    }

    public function setDistancia($distancia) {
        $this->distancia = $distancia;
    }

    public function setTempoViagem($tempoViagem) {
        $this->tempoViagem = $tempoViagem;
    }

    public function setPedagio($pedagio) {
        $this->pedagio = $pedagio;
    }

    
}
