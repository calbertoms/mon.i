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

require_once(APPPATH . 'entidades/Fornecedores.php');
require_once(APPPATH . 'entidades/Clientes.php');
require_once(APPPATH . 'entidades/MonitorInteligente.php');
require_once(APPPATH . 'entidades/Produtos.php');

abstract class Tanques {
    //put your code here
    
    private $idTanque;
    private $idFornecedor;
    private $idClientes;
    private $idMonitor;
    private $idProduto;
    private $identificacao;
    private $dataFabricacao;
    private $dataInspecao;
    private $dataManutencao;
    private $capacidade;
    private $comprimento;
    private $altura;
    private $largura;
    private $nivel;
    private $peso;
    private $status;
    private $dataCadastro;
    private $dataAlterado;
 
    private $model;

    public function __construct($model) {
        
        $this->model = $model;
    }
    
    public function getIdTanque() {
        return $this->idTanque;
    }

    public function getIdFornecedor() {
        return $this->idFornecedor;
    }

    public function getIdClientes() {
        return $this->idClientes;
    }

    public function getIdMonitor() {
        return $this->idMonitor;
    }

    public function getIdProduto() {
        return $this->idProduto;
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

    public function getComprimento() {
        return $this->comprimento;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getLargura() {
        return $this->largura;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getDataAlterado() {
        return $this->dataAlterado;
    }

    public function setIdTanque($idTanque) {
        $this->idTanque = $idTanque;
    }

    public function setIdFornecedor($idFornecedor) {
        $this->idFornecedor = $idFornecedor;
    }

    public function setIdClientes($idClientes) {
        $this->idClientes = $idClientes;
    }

    public function setIdMonitor($idMonitor) {
        $this->idMonitor = $idMonitor;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
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

    public function setComprimento($comprimento) {
        $this->comprimento = $comprimento;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function setLargura($largura) {
        $this->largura = $largura;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setDataAlterado($dataAlterado) {
        $this->dataAlterado = $dataAlterado;
    }
    
}
