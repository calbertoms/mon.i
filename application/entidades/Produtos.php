<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author Suporte
 */
class Produtos {
    //put your code here
    
    private $id;
    private $nome;
    private $tipo;
    private $codigo;
    private $unidade;
    private $tipoTransporte;
    private $tipoArmazenagem;
    private $validade;
    private $temperatura;
    private $densidade;
    private $dataCadastro;
    private $dataAlterado;
    
    private $model;
  
    
    public function __construct($model) {
        
        $this->model = $model;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getUnidade() {
        return $this->unidade;
    }

    public function getTipoTransporte() {
        return $this->tipoTransporte;
    }

    public function getTipoArmazenagem() {
        return $this->tipoArmazenagem;
    }

    public function getValidade() {
        return $this->validade;
    }

    public function getTemperatura() {
        return $this->temperatura;
    }

    public function getDensidade() {
        return $this->densidade;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getDataAlterado() {
        return $this->dataAlterado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

    public function setTipoTransporte($tipoTransporte) {
        $this->tipoTransporte = $tipoTransporte;
    }

    public function setTipoArmazenagem($tipoArmazenagem) {
        $this->tipoArmazenagem = $tipoArmazenagem;
    }

    public function setValidade($validade) {
        $this->validade = $validade;
    }

    public function setTemperatura($temperatura) {
        $this->temperatura = $temperatura;
    }

    public function setDensidade($densidade) {
        $this->densidade = $densidade;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setDataAlterado($dataAlterado) {
        $this->dataAlterado = $dataAlterado;
    }


    
}
