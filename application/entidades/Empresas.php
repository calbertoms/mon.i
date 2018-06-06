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

require_once(APPPATH . 'entidades/Usuario.php');

class Empresas {
    
    /**
     *ATRIBUTOS
     */
    
    private $idEmpresa;
    private $usuario;
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
    private $status;
    private $dataCadastro;
    private $dataAlterado;
    
    
     private $model;
  
    
    public function __construct($model) {
        
        $this->model = $model;
    }
    
    //geters e settes
    
    public function getIdEmpresa() {
        return $this->idEmpresa;
    }
    
    public function getUsuario() {
        return $this->usuario;
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
    
     public function getStatus() {
        return $this->status;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getDataAlterado() {
        return $this->dataAlterado;
    }

    public function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }
    
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
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
    
     public function setStatus($status) {
        $this->status = $status;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setDataAlterado($dataAlterado) {
        $this->dataAlterado = $dataAlterado;
    }

     public function cadastrarClass($tb) {

        $usuario = $this->getUsuario();
        $nome = $this->getNome();
        $nomeFantasia = $this->getNomeFantasia();
        $cnpj = $this->getCnpj();
        $email = $this->getEmail();
        $telefone = $this->getTelefone();
        $inscEstadual = $this->getInscEstadual();
        $areaUtilm2 = $this->getAreaUtilm2();
        $cep = $this->getCep();
        $numero = $this->getNumero();
        $logradouro = $this->getLogradouro();
        $complemento = $this->getComplemento();
        $uf = $this->getUf();
        $status = $this->getStatus();
        $cadastro = $this->getdataCadastro();
        $alterado = $this->getdataAlterado();
        
        
        $data = array(
            'idUsuario' => $usuario,
            'nome' => $nome,
            'nomeFantasia' => $nomeFantasia,
            'cnpj' => $cnpj,
            'email' => $email,
            'telefone' => $telefone,
            'inscEstadual' => $inscEstadual,
            'areaUtilm2' => $areaUtilm2,
            'cep' => $cep,
            'numero' => $numero,
            'logradouro' => $logradouro,
            'complemento' => $complemento,
            'uf' => $uf,
            'status' => $status,
            'dataCadastro' => $cadastro,
            'dataAlterado' => $alterado
        );

        if ($this->model->adicionar($tb, $data) == TRUE) {

            $result = TRUE;
        } else {

            $result = FALSE;
        }

        return $result;
    }
    
    public function editarClass($tb,$idTb) {

        $id = $this->getIdEmpresa();
        $usuario = $this->getUsuario();
        $nome = $this->getNome();
        $nomeFantasia = $this->getNomeFantasia();
        $cnpj = $this->getCnpj();
        $email = $this->getEmail();
        $telefone = $this->getTelefone();
        $inscEstadual = $this->getInscEstadual();
        $areaUtilm2 = $this->getAreaUtilm2();
        $cep = $this->getCep();
        $numero = $this->getNumero();
        $logradouro = $this->getLogradouro();
        $complemento = $this->getComplemento();
        $uf = $this->getUf();
        $status = $this->getStatus();
        $alterado = date('Y-m-d H:i:s');


           $data = array(
                'idEmpresa' => $id,
                'idUsuario' => $usuario,
                'nome' => $nome,
                'nomeFantasia' => $nomeFantasia,
                'cnpj' => $cnpj,
                'email' => $email,
                'telefone' => $telefone,
                'inscEstadual' => $inscEstadual,
                'areaUtilm2' => $areaUtilm2,
                'cep' => $cep,
                'numero' => $numero,
                'logradouro' => $logradouro,
                'complemento' => $complemento,
                'uf' => $uf,
                'status' => $status,
                'dataAlterado' => $alterado
        );

       
        if ($this->model->editar($tb, $data, $idTb, $id)) {

            $result = TRUE;
        } else {

            $result = FALSE;
        }

        return $result;
    }

    public function buscaEmpresaClass($tb,$idTb) {

        
       $result = $this->model->buscaEmpresaPorId($tb,$idTb, $this->getIdEmpresa());
 
        $this->setUsuario($result->idUsuario);
        $this->setNome($result->nome);
        $this->setNomeFantasia($result->nomeFantasia);
        $this->setCnpj($result->cnpj);
        $this->setEmail($result->email);
        $this->setTelefone($result->telefone);
        $this->setInscEstadual($result->inscEstadual);
        $this->setAreaUtilm2($result->areaUtilm2);
        $this->setCep($result->cep);
        $this->setNumero($result->numero);
        $this->setLogradouro($result->logradouro);
        $this->setComplemento($result->complemento);
        $this->setUf($result->uf);
        $this->setStatus($result->status);

    }

    //delete virtual
    public function deletarEmpresaClass($tb,$idTb) {

        $id = $this->getIdEmpresa();
        $alterado = date('Y-m-d H:i:s');


        $data = array(
            'status' => FALSE,
            'dataAlterado' => $alterado
        );

        if ($this->model->editar($tb, $data, $idTb, $id)) {

            $result = TRUE;
        } else {

            $result = FALSE;
        }

        return $result;
    }
    
    
}