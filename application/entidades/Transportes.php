<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transporte
 *
 * @author Suporte
 */
class Transportes {
    //put your code here
    
    private $idTransporte;
    private $disponibilidade;
    private $placa;
    private $antt;
    private $modelo;
    private $cor;
    private $anoFabricacao;
    private $tara;
    private $bruto;
    private $dataManutencao;
    private $tipo;
    private $status;
    private $dataCadastro;
    private $dataAlterado;
    
    private $model;
  
    
    public function __construct($model) {
        
        $this->model = $model;
    }
    
    public function getIdTransporte() {
        return $this->idTransporte;
    }

    public function getDisponibilidade() {
        return $this->disponibilidade;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function getAntt() {
        return $this->antt;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getCor() {
        return $this->cor;
    }

    public function getAnoFabricacao() {
        return $this->anoFabricacao;
    }

    public function getTara() {
        return $this->tara;
    }

    public function getBruto() {
        return $this->bruto;
    }

    public function getDataManutencao() {
        return $this->dataManutencao;
    }

    public function getTipo() {
        return $this->tipo;
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

    public function setIdTransporte($idTransporte) {
        $this->idTransporte = $idTransporte;
    }

    public function setDisponibilidade($disponibilidade) {
        $this->disponibilidade = $disponibilidade;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function setAntt($antt) {
        $this->antt = $antt;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }

    public function setAnoFabricacao($anoFabricacao) {
        $this->anoFabricacao = $anoFabricacao;
    }

    public function setTara($tara) {
        $this->tara = $tara;
    }

    public function setBruto($bruto) {
        $this->bruto = $bruto;
    }

    public function setDataManutencao($dataManutencao) {
        $this->dataManutencao = $dataManutencao;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
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

     public function cadastrarClass() {
     
        
        $disponibilidade = $this->getDisponibilidade();
        $placa = $this->getPlaca();
        $antt = $this->getAntt();
        $modelo = $this->getModelo();
        $cor = $this->getCor();
        $anoFabricacao = $this->getAnoFabricacao();
        $tara = $this->getTara();
        $bruto = $this->getBruto(); 
        $dataManutencao = $this->getDataManutencao();
        $tipo = $this->getTipo();
        $status =$this->getStatus();
        $cadastro = $this->getDataCadastro();
        $alterado = $this->getDataAlterado();
        
        $data = array(
            
            "disponibilidade" => $disponibilidade,
            'placa' => $placa,
            'antt' => $antt,
            'modelo' => $modelo,
            'cor' => $cor,
            'anoFabricacao' => $anoFabricacao,
            'tara' => $tara,
            'bruto' => $bruto,
            'dataManutencao' => $dataManutencao,
            'tipo' => $tipo,  
            'status' => $status,
            'dataCadastro' => $cadastro,
            'dataAlterado' => $alterado
        );

        if ($this->model->adicionar("transportes", $data) == TRUE) {

            $result = TRUE;
        } else {

            $result = FALSE;
        }

        return $result;
    }
    
    public function editarClass() {

        $id = $this->getIdTransporte();
        $disponibilidade = $this->getDisponibilidade();
        $placa = $this->getPlaca();
        $antt = $this->getAntt();
        $modelo = $this->getModelo();
        $cor = $this->getCor();
        $anoFabricacao = $this->getAnoFabricacao();
        $tara = $this->getTara();
        $bruto = $this->getBruto(); 
        $dataManutencao = $this->getDataManutencao();
        $tipo = $this->getTipo();
        $status =$this->getStatus();
        $alterado = $this->getDataAlterado();
        
        $data = array(
            
            "disponibilidade" => $disponibilidade,
            'placa' => $placa,
            'antt' => $antt,
            'modelo' => $modelo,
            'cor' => $cor,
            'anoFabricacao' => $anoFabricacao,
            'tara' => $tara,
            'bruto' => $bruto,
            'dataManutencao' => $dataManutencao,
            'tipo' => $tipo,  
            'status' => $status,
            'dataAlterado' => $alterado
        );

        
        if ($this->model->editar('transportes', $data, 'idTransporte', $id)) {

            $result = TRUE;
            
        } else {

            $result = FALSE;
        }

        return $result;
    }

    
    public function buscaTransporteClass() {
       

        $result = $this->model->buscaTransportePorId($this->getIdTransporte());
        
        $this->setDisponibilidade($result->disponibilidade);
        $this->setPlaca($result->placa);
        $this->setAntt($result->antt);
        $this->setModelo($result->modelo);
        $this->setCor($result->cor);
        $this->setAnoFabricacao($result->anoFabricacao);
        $this->setTara($result->tara);
        $this->setBruto($result->bruto);
        $this->setDataManutencao($result->dataManutencao);
        $this->setStatus($result->status);
        $this->setDataCadastro($result->dataCadastro);
        $this->setDataAlterado($result->dataAlterado);
    }
    
    //delete virtual
    public function deletarTransporteClass() {

        $id = $this->getIdTransporte();
        $alterado = date('Y-m-d H:i:s');


        $data = array(
            'status' => FALSE,
            'dataAlterado' => $alterado
        );

        if ($this->model->editar('transportes', $data, 'idTransporte', $id)) {

            $result = TRUE;
            
        } else {

            $result = FALSE;
        }

        return $result;
    }
    

}
