<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TanqueLiquido
 *
 * @author Suporte
 */
require_once(APPPATH . 'entidades/Tanques.php');

class TanquesLiquidos extends Tanques{
    //put your code here
    
    private $viscosidade;
    
    public function getViscosidade() {
        return $this->viscosidade;
    }

    public function setViscosidade($nivel) {
        $this->viscosidade = $viscosidade;
    }

    public function cadastrarClass() {
     
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
        $viscosidade = $this->getViscosidade();
        $status = $this->getStatus(); 
        $cadastro = $this->getDataCadastro();
        $alterado = $this->getDataAlterado();
        
        
        $data = array(
            
            "identificacao" => $identificacao,
            'dataFabricacao' => $dataFabricacao,
            'dataInspecao' => $dataInspecao,
            'dataManutencao' => $dataManutencao,
            'capacidade' => $capacidade,
            'comprimento' => $comprimento,
            'altura' => $altura,
            'largura' => $largura,
            'nivel' => $nivel,
            'peso' => $peso,
            'viscosidade' => $viscosidade,
            'status' => $status,        
            'dataCadastro' => $cadastro,
            'dataAlterado' => $alterado
        );

        if ($this->model->adicionar("tanquesliquidos", $data) == TRUE) {

            $result = TRUE;
        } else {

            $result = FALSE;
        }

        return $result;
    }
    
    public function editarClass() {

        $id = $this->getIdTanque();

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
        $viscosidade = $this->getViscosidade();
        $status = $this->getStatus(); 
        $alterado = $this->getDataAlterado();
        
        
        $data = array(
            
            "identificacao" => $identificacao,
            'dataFabricacao' => $dataFabricacao,
            'dataInspecao' => $dataInspecao,
            'dataManutencao' => $dataManutencao,
            'capacidade' => $capacidade,
            'comprimento' => $comprimento,
            'altura' => $altura,
            'largura' => $largura,
            'nivel' => $nivel,
            'peso' => $peso,
            'viscosidade' => $viscosidade,
            'status' => $status,        
            'dataAlterado' => $alterado
        );

        
        if ($this->model->editar('tanquesliquidos', $data, 'idTanqueliquido', $id)) {

            $result = TRUE;
            
        } else {

            $result = FALSE;
        }

        return $result;
    }

    public function buscaTanqueLiquidoClass() {
       

        $result = $this->model->buscaTanqueGasosoPorId($this->getIdTanque());
        
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
        $this->setViscosidade($result->viscosidade);
        $this->setStatus($result->status); 
        $this->setDataAlterado($result->dataAlterado);

    }
    
    //delete virtual
    public function deletarTanqueLiquidosClass() {

        $id = $this->getIdTanque();
        $alterado = date('Y-m-d H:i:s');


        $data = array(
            'status' => FALSE,
            'dataAlterado' => $alterado
        );

        if ($this->model->editar('tanquesliquidos', $data, 'idTanqueliquido', $id)) {

            $result = TRUE;
            
        } else {

            $result = FALSE;
        }

        return $result;
    }
    
    
}
