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
    
    private $idPermissao;
    private $permissao;
    private $permissoes;
    private $usuario;
    private $status;
    private $codigo;
    private $sigla;
    private $setor;
    private $categoria;
    private $descricao;
    private $observacao;
    private $efetivo;
    private $dataCadastro;
    private $dataAlterado;
    
    private $model;
  
    
    
    public function __construct($model) {
        
        $this->model = $model;
    }

    //atributos especiais
    
    public function getIdPermissao() {
        return $this->idPermissao;
    }

    public function getPermissao() {
        return $this->permissao;
    }

    public function getPermissoes() {
        return $this->permissoes;
    }

    public function getUsuario() {
        return $this->usuario;
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

    public function getObservacao() {
        return $this->observacao;
    }
    
      public function getEfetivo() {
        return $this->efetivo;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getDataAlterado() {
        return $this->dataAlterado;
    }
    
        public function setIdPermissao($idPermissao) {
        $this->idPermissao = $idPermissao;
    }

    public function setPermissao($permissao) {
        $this->permissao = $permissao;
    }

    public function setPermissoes($permissoes) {
        $this->permissoes = $permissoes;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
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

    public function setObservacao($observacao) {
        $this->observacao = $observacao;
    }
    
    public function setEfetivo($efetivo) {
        $this->efetivo = $efetivo;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setDataAlterado($dataAlterado) {
        $this->dataAlterado = $dataAlterado;
    }
    
    public function cadastrarClass() {
     
        $permissao = $this->getPermissao();
        $codigo = $this->getCodigo();
        $sigla = $this->getSigla();
        $setor = $this->getSetor();
        $categoria = $this->getCategoria();
        $efetivo = $this->getEfetivo();
        $descricao = $this->getDescricao();
        $observacao = $this->getObservacao();
        $status = $this->getStatus();
        $permissoes = $this->getPermissoes(); 
        $permissoes = serialize($permissoes);
        $cadastro = $this->getDataCadastro();
        $alterado = $this->getDataAlterado();
        
        $data = array(
            
            "permissao" => $permissao,
            'permissoes' => $permissoes,
            'codigo' => $codigo,
            'sigla' => $sigla,
            'setor' => $setor,
            'categoria' => $categoria,
            'efetivado' => $efetivo,
            'descricao' => $descricao,
            'observacao' => $observacao,
            'status' => $status,        
            'dataCadastro' => $cadastro,
            'dataAlterado' => $alterado
        );

        if ($this->model->adicionar("permissoes", $data) == TRUE) {

            $result = TRUE;
        } else {

            $result = FALSE;
        }

        return $result;
    }
    
    public function editarClass() {

        $id = $this->getIdPermissao();
        $permissao = $this->getPermissao();
        $codigo = $this->getCodigo();
        $sigla = $this->getSigla();
        $setor = $this->getSetor();
        $categoria = $this->getCategoria();
        $efetivo = $this->getEfetivo();
        $descricao = $this->getDescricao();
        $observacao = $this->getObservacao();
        $status = $this->getStatus();
        $permissoes = $this->getPermissoes();
        $alterado = $this->getDataAlterado();

        $data = array(
            "permissao" => $permissao,
            'permissoes' => $permissoes,
            'codigo' => $codigo,
            'sigla' => $sigla,
            'setor' => $setor,
            'categoria' => $categoria,
            'efetivado' => $efetivo,
            'descricao' => $descricao,
            'observacao' => $observacao,
            'status' => $status,
            'dataAlterado' => $alterado
        );

        
        if ($this->model->editar('permissoes', $data, 'idPermissao', $id)) {

            $result = TRUE;
            
        } else {

            $result = FALSE;
        }

        return $result;
    }

    public function buscaPermissaoClass() {
       

        $result = $this->model->buscaPermissaoPorId($this->getIdPermissao());
        
        $this->setPermissao($result->permissao);
        $this->setCodigo($result->codigo);
        $this->setSigla($result->sigla);
        $this->setSetor($result->setor);
        $this->setCategoria($result->categoria);
        $this->setEfetivo($result->efetivado);
        $this->setDescricao($result->descricao);
        $this->setObservacao($result->observacao);
        $this->setStatus($result->status);
        $this->setPermissoes($result->permissoes);
    }
    
    //delete virtual
    public function deletarPermissaoClass() {

        $id = $this->getIdPermissao();
        $alterado = date('Y-m-d H:i:s');


        $data = array(
            'status' => FALSE,
            'dataAlterado' => $alterado
        );

        if ($this->model->editar('Permissoes', $data, 'idPermissao', $id)) {

            $result = TRUE;
            
        } else {

            $result = FALSE;
        }

        return $result;
    }


    

}
