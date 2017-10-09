<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of endereco
 *
 * @author Suporte
 */
class Endereco {
    //put your code here
    
    private $id;
    private $logradouro;
    private $numero;
    private $bairro;
    private $cidade;
    private $uf;
    private $pais;
    private $pontoReferencia;
    private $cep;
    
    public function getId() {
        return $this->id;
    }

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getUf() {
        return $this->uf;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getPontoReferencia() {
        return $this->pontoReferencia;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function setPais($pais) {
        $this->pais = $pais;
    }

    public function setPontoReferencia($pontoReferencia) {
        $this->pontoReferencia = $pontoReferencia;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }


    
}
