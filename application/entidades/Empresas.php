<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empresa
 *
 * @author Suporte
 */
class Empresas {
    
    /**
     *ATRIBUTOS
     */
    
    private $id;
    private $nome;
    private $nomeFantasia;
    private $cnpj;
    private $email;
    private $telefone;
    private $inscEstadual;
    private $areaUtilm2;
    private $logradouro;
    private $cep;
    private $numero;
    private $complemento;
    private $uf;
    private $dataCadastro;
    private $dataAlterado;
    
    
     private $model;
  
    
    public function __construct($model) {
        
        $this->model = $model;
    }
    
    //geters e settes
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getInscEstadual() {
        return $this->inscEstadual;
    }

    public function getAreaUtilm2() {
        return $this->areaUtilm2;
    }

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function getUf() {
        return $this->uf;
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

    public function setNomeFantasia($nomeFantasia) {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setInscEstadual($inscEstadual) {
        $this->inscEstadual = $inscEstadual;
    }

    public function setAreaUtilm2($areaUtilm2) {
        $this->areaUtilm2 = $areaUtilm2;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setDataAlterado($dataAlterado) {
        $this->dataAlterado = $dataAlterado;
    }

        
        
    /**
     * METODOS
     */
    
    public function cadastrarClass() {
        
    }
    
    public function editarClass() {
        
    }
    
    public function desativarClass() {
        
    }
    
    public function buscarEmpresaClass() {
        
    }
    
    public function deletarClass() {
        
    }
    
}