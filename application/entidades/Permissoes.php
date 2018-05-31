<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Permissao
 *
 * @author Suporte
 */
class Permissoes {
    //atributos
    
    private $id;
    private $permissao;
    private $permissoes;
    private $ususario;
    private $status;
    private $codigo;
    private $sigla;
    private $setor;
    private $categoria;
    private $descricao;
    private $obseracao;
    private $dataCadastro;
    private $dataAlterado;
    
    private $model;
  
    
    public function __construct($model) {
        
        $this->model = $model;
    }

    //atributos especiais
    
    public function getId() {
        return $this->id;
    }

    public function getPermissao() {
        return $this->permissao;
    }

    public function getPermissoes() {
        return $this->permissoes;
    }

    public function getUsusario() {
        return $this->ususario;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getSigla() {
        return $this->sigla;
    }

    public function getSetor() {
        return $this->setor;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getObseracao() {
        return $this->obseracao;
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

    public function setPermissao($permissao) {
        $this->permissao = $permissao;
    }

    public function setPermissoes($permissoes) {
        $this->permissoes = $permissoes;
    }

    public function setUsusario($ususario) {
        $this->ususario = $ususario;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setSigla($sigla) {
        $this->sigla = $sigla;
    }

    public function setSetor($setor) {
        $this->setor = $setor;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setObseracao($obseracao) {
        $this->obseracao = $obseracao;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setDataAlterado($dataAlterado) {
        $this->dataAlterado = $dataAlterado;
    }
    
    public function cadastrarClass() {
        
    }
    
    public function editarClass() {
        
    }
    
    public function desativarClass() {
        
    }
    
    public function buscarPermissaoClass() {
        
    }
    
    public function deletarClass() {
        
    }
}
