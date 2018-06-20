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
    
    private $idProduto;
    private $nome;
    private $codigo;
    private $tipo;
    private $unidade;
    private $tipoTransporte;
    private $status;
    private $temperatura;
    private $densidade;
    private $inflamavel;
    private $descricao;
    private $dataCadastro;
    private $dataAlterado;
    
    private $model;
  
    
    public function __construct($model) {
        
        $this->model = $model;
    }
    
    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getUnidade() {
        return $this->unidade;
    }

    public function getTipoTransporte() {
        return $this->tipoTransporte;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getTemperatura() {
        return $this->temperatura;
    }

    public function getDensidade() {
        return $this->densidade;
    }

    public function getInflamavel() {
        return $this->inflamavel;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getDataAlterado() {
        return $this->dataAlterado;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

    public function setTipoTransporte($tipoTransporte) {
        $this->tipoTransporte = $tipoTransporte;
    }

    public function setStatus($tipoArmazenagem) {
        $this->status = $status;
    }

    public function setTemperatura($temperatura) {
        $this->temperatura = $temperatura;
    }

    public function setDensidade($densidade) {
        $this->densidade = $densidade;
    }

    public function setInflamavel($inflamavel) {
        $this->inflamavel = $inflamavel;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setDataAlterado($dataAlterado) {
        $this->dataAlterado = $dataAlterado;
    }

    

    public function cadastrarClass() {
     
        
        $nome = $this->getNome();
        $codigo = $this->getCodigo();
        $tipo = $this->getTipo();
        $unidade = $this->getUnidadea();
        $tipoTransporte = $this->getTipoTransporteo();
        $status = $this->getStatus();
        $temperatura = $this->getTemperatura();
        $densidade = $this->getDensidade(); 
        $inflamavel = $this->getInflamavel();
        $descricao = $this->getDescricao();
        $cadastro = $this->getDataCadastro();
        $alterado = $this->getDataAlterado();
        
        
        
        $data = array(
            
            "nome" => $nome,
            'codigo' => $codigo,
            'tipo' => $tipo,
            'unidade' => $unidade,
            'tipoTransporte' => $tipoTransporte,
            'status' => $status,
            'temperatura' => $temperatura,
            'densidade' => $densidade,
            'inflamavel' => $inflamavel,
            'descricao' => $descricao,        
            'dataCadastro' => $cadastro,
            'dataAlterado' => $alterado
        );

        if ($this->model->adicionar("produtos", $data) == TRUE) {

            $result = TRUE;
        } else {

            $result = FALSE;
        }

        return $result;
    }
    
    public function editarClass() {

        $id = $this->getIdProduto();
        $nome = $this->getNome();
        $codigo = $this->getCodigo();
        $tipo = $this->getTipo();
        $unidade = $this->getUnidadea();
        $tipoTransporte = $this->getTipoTransporteo();
        $status = $this->getStatus();
        $temperatura = $this->getTemperatura();
        $densidade = $this->getDensidade(); 
        $inflamavel = $this->getInflamavel();
        $descricao = $this->getDescricao();
        $alterado = $this->getDataAlterado();
       

        $data = array(
            "nome" => $nome,
            'codigo' => $codigo,
            'tipo' => $tipo,
            'unidade' => $unidade,
            'tipoTransporte' => $tipoTransporte,
            'status' => $status,
            'temperatura' => $temperatura,
            'densidade' => $densidade,
            'inflamavel' => $inflamavel,
            'descricao' => $descricao,        
            'dataAlterado' => $alterado
        );

        
        if ($this->model->editar('produtos', $data, 'idProduto', $id)) {

            $result = TRUE;
            
        } else {

            $result = FALSE;
        }

        return $result;
    }

    
    public function buscaProdutoClass() {
       

        $result = $this->model->buscaProdutoPorId($this->getIdProduto());
        
        $this->setNome($result->nome);
        $this->setCodigo($result->codigo);
        $this->setTipo($result->tipo);
        $this->setUnidade($result->unidade);
        $this->setTipoTransporte($result->tipoTransporte);
        $this->setStatus($result->status);
        $this->setTemperatura($result->temperatura);
        $this->setInflamavel($result->inflamavel);
        $this->setDescricao($result->descricao);
        $this->setDataCadastro($result->dataCadastro);
        $this->setDataAlterado($result->dataAlterado);
    }
    
    //delete virtual
    public function deletarProdutoClass() {

        $id = $this->getIdProduto();
        $alterado = date('Y-m-d H:i:s');


        $data = array(
            'status' => FALSE,
            'dataAlterado' => $alterado
        );

        if ($this->model->editar('produtos', $data, 'idProduto', $id)) {

            $result = TRUE;
            
        } else {

            $result = FALSE;
        }

        return $result;
    }
    
}
