<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TanqueGasoso
 *
 * @author Suporte
 */
require_once(APPPATH . 'entidades/Tanques.php');

class TanquesGasosos extends Tanques{
    //put your code here
    
    private $pressao;
    private $temperatura;
    
    
    public function getPressao() {
        return $this->pressao;
    }

    public function getTemperatura() {
        return $this->temperatura;
    }

    public function setPressao($pressao) {
        $this->pressao = $pressao;
    }

    public function setTemperatura($temperatura) {
        $this->temperatura = $temperatura;
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
        $pressao = $this->getPressao();
        $temperatura = $this->getTemperatura();
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
            'pressao' => $pressao,
            'temperatura' => $temperatura,
            'status' => $status,        
            'dataCadastro' => $cadastro,
            'dataAlterado' => $alterado
        );

        if ($this->model->adicionar("tanquesgasosos", $data) == TRUE) {

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
        $pressao = $this->getPressao();
        $temperatura = $this->getTemperatura();
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
            'pressao' => $pressao,
            'temperatura' => $temperatura,
            'status' => $status,        
            'dataAlterado' => $alterado
        );

        
        if ($this->model->editar('tanquesgasosos', $data, 'idTanqueGasoso', $id)) {

            $result = TRUE;
            
        } else {

            $result = FALSE;
        }

        return $result;
    }

    public function buscaTanqueGasosoClass() {
       

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
        $this->setPressao($result->pressao);
        $this->setTemperatura($result->temperatura);
        $this->setStatus($result->status); 
        $this->setDataAlterado($result->dataAlterado);

    }
    
    //delete virtual
    public function deletarTanqueGasosoClass() {

        $id = $this->getIdTanque();
        $alterado = date('Y-m-d H:i:s');


        $data = array(
            'status' => FALSE,
            'dataAlterado' => $alterado
        );

        if ($this->model->editar('tanquesgasosos', $data, 'idTanqueGasoso', $id)) {

            $result = TRUE;
            
        } else {

            $result = FALSE;
        }

        return $result;
    }
    
}
