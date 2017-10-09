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
class Transporte {
    //put your code here
    
    private $id;
    private $status;
    private $placa;
    private $antt;
    private $modelo;
    private $tara;
    private $bruto;
    private $dataManutencao;
    private $tipo;
    
    public function getId() {
        return $this->id;
    }

    public function getStatus() {
        return $this->status;
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

    public function setId($id) {
        $this->id = $id;
    }

    public function setStatus($status) {
        $this->status = $status;
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
    
}
