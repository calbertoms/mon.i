<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MonitorInteligente
 *
 * @author Suporte
 */
class MonitorInteligente {
    //put your code here
    
    private $id;
    private $tipo;
    private $sensor;
    private $dataCalibracao;
    private $nivelAlarme;
    private $tempoColeta;
    private $mac;
    
    public function getId() {
        return $this->id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getSensor() {
        return $this->sensor;
    }

    public function getDataCalibracao() {
        return $this->dataCalibracao;
    }

    public function getNivelAlarme() {
        return $this->nivelAlarme;
    }

    public function getTempoColeta() {
        return $this->tempoColeta;
    }

    public function getMac() {
        return $this->mac;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setSensor($sensor) {
        $this->sensor = $sensor;
    }

    public function setDataCalibracao($dataCalibracao) {
        $this->dataCalibracao = $dataCalibracao;
    }

    public function setNivelAlarme($nivelAlarme) {
        $this->nivelAlarme = $nivelAlarme;
    }

    public function setTempoColeta($tempoColeta) {
        $this->tempoColeta = $tempoColeta;
    }

    public function setMac($mac) {
        $this->mac = $mac;
    }

    
}
