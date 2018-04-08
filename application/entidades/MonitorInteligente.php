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

require_once(APPPATH . 'entidades/Leitura.php');

class MonitorInteligente{
    //put your code here
    
    private $id;
    private $tipo;
    private $unidade;
    private $dataCalibracao;
    private $nivelAlarme;
    private $tempoColeta;
    private $mac;
    private $nome;
    private $leitura;

    private $model;


    public function __construct($model) {
        
        $this->model = $model;
        
    }
        
    public function getId() {
        return $this->id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getUnidade() {
        return $this->unidade;
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
    
    public function getNome() {
        return $this->nome;
    }
    
    public function getLeitura() {
        return $this->leitura;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setUnidade($unidade) {
        $this->unidade = $unidade;
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
   
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function setLeitura(Leitura $leitura) {
        $this->leitura = $leitura;
    }
    
    private function selecionaMonitor($mac){
        
        $monitor = $this->model->buscaMonitor($mac);
        
        if ($monitor) {
            
            $this->setId($monitor->idMonitor);
            $this->setMac($monitor->mac);
            $this->setNome($monitor->nome);
            $this->setTipo($monitor->tipo);
            $this->setUnidade($monitor->unidade);
            $this->setTempoColeta($monitor->tempoColeta);
            $this->setDataCalibracao($monitor->dataCalibracao);
            $this->setNivelAlarme($monitor->nivelAlarme);
            
            return TRUE;
            
        }
        else{
            return FALSE;
        }
        
    }
    
    public function monitorExiste($mac){
        
        return $this->selecionaMonitor($mac);
        
    }
    
    public function insereLeitura(){
        
        $data = array(
            'idMonitor' => $this->getId(),
            'nivel' => $this->getLeitura()->getNivel(),
            'dataHora' => $this->getLeitura()->getDataHora()
        );
        
        if ($this->model->adicionar('leitura', $data) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function buscaMonitores(){
        
        $monitores = array();
        
        $result = $this->model->buscaMonitorores();
        
        $i=0;
        
        foreach ($result as $value) {
            
            $monitor = new MonitorInteligente($this->model);
            
            $monitor->setId($value->idMonitor);
            $monitor->setMac($value->mac);
            $monitor->setNome($value->nome);
            $monitor->setTipo($value->tipo);
            $monitor->setUnidade($value->unidade);
            $monitor->setTempoColeta($value->tempoColeta);
            $monitor->setDataCalibracao($value->dataCalibracao);
            $monitor->setNivelAlarme($value->nivelAlarme);
            
            $monitores[$i] = $monitor;
            
            $i++;
            
        }
        
        return $monitores;
        
    }
    
    public function buscaleiturasMonitorPorPeriodo($id,$dataDe,$dataPara){
        
        $dataDe .= ' 00:00:00';
        $dataPara .= ' 23:59:59';
        
        $result = $this->model->buscaleiturasMonitorPorPeriodo($id,$dataDe,$dataPara);
        
        return $result;
        
    }
    
    public function toString() {
        
        return 'id = '.$this->getId().' nome= '.$this->getNome().' mac= '.$this->getMac();
        
    }


    
}
