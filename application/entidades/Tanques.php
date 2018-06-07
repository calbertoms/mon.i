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
    
    
     public function cadastrarClass($tb) {
     
        $fornecedor = $this->getIdFornecedor();
        $cliente = $this->getIdClientes();
        $monitor = $this->getIdMonitor();
        $produto = $this->getIdProduto();
        $identificacao = $this->getIdentificacao();
        $dataFabricacao = $this->getDataFabricacao();
        $dataInspecao = $this->getDataInspecaoa();
        $dataManutencao = $this->getDataManutencao();
        $capacidade = $this->getCapacidade();
        $comprimento = $this->getComprimento();
        $altura = $this->getAltura();
        $largura = $this->getLargura();
        $nivel = $this->getNivel();
        $peso = $this->getPeso();
        $status = $this->getStatus(); 
        $cadastro = $this->getDataCadastro();
        $alterado = $this->getDataAlterado();
        
        
        $data = array(

            'idfornecedor' => $fornecedor,
            'idcliente' => $cliente,
            'idmonitor' => $monitor,
            'idproduto' => $produto,
            'identificacao' => $identificacao,
            'dataFabricacao' => $dataFabricacao,
            'dataInspecao' => $dataInspecao,
            'dataManutencao' => $dataManutencao,
            'capacidade' => $capacidade,
            'comprimento' => $comprimento,
            'altura' => $altura,
            'largura' => $largura,
            'nivel' => $nivel,
            'peso' => $peso,
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

        $id = $this->getIdTanque();

        $fornecedor = $this->getIdFornecedor();
        $cliente = $this->getIdClientes();
        $monitor = $this->getIdMonitor();
        $produto = $this->getIdProduto();
        $identificacao = $this->getIdentificacao();
        $dataFabricacao = $this->getDataFabricacao();
        $dataInspecao = $this->getDataInspecaoa();
        $dataManutencao = $this->getDataManutencao();
        $capacidade = $this->getCapacidade();
        $comprimento = $this->getComprimento();
        $altura = $this->getAltura();
        $largura = $this->getLargura();
        $nivel = $this->getNivel();
        $peso = $this->getPeso();
        $status = $this->getStatus(); 
        $alterado = date('Y-m-d H:i:s');
        
        
        $data = array(
            
            
            'idfornecedor' => $fornecedor,
            'idcliente' => $cliente,
            'idmonitor' => $monitor,
            'idproduto' => $produto,
            'identificacao' => $identificacao,
            'dataFabricacao' => $dataFabricacao,
            'dataInspecao' => $dataInspecao,
            'dataManutencao' => $dataManutencao,
            'capacidade' => $capacidade,
            'comprimento' => $comprimento,
            'altura' => $altura,
            'largura' => $largura,
            'nivel' => $nivel,
            'peso' => $peso,
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

    public function buscaTanqueClass($tb,$idTb) {
       

        $result = $this->model->buscaTanquePorId($tb,$idTb,$this->getIdTanque());

        $this->setIdFornecedor($result->idfornecedor);
        $this->setIdClientes($result->idcliente);
        $this->setIdMonitor($result->idmonitor);
        $this->setIdProduto($result->idproduto); 
        $this->setIdentificacao($result->identificacao);
        $this->setDataFabricacao($result->dataFabricacao);
        $this->setDataInspecaoa($result->dataInspecao);
        $this->setDataManutencao($result->dataManutencao);
        $this->setCapacidade($result->capacidade);
        $this->setComprimento($result->comprimento);
        $this->setAltura($result->altura);
        $this->setLargura($result->largura);
        $this->setNivel($result->nivel);
        $this->setPeso($result->peso);
        $this->setStatus($result->status); 
        $this->setDataAlterado($result->dataAlterado);

    }
    
    //delete virtual
    public function deletarTanqueClass($tb,$idTb) {

        $id = $this->getIdTanque();
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
