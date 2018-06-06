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
    private $nome;
    private $tipo;
    private $unidade;
    private $dataCalibracao;
    private $capacidade;
    private $nivelAlarme;
    private $nivelCheio;
    private $tempoColeta;
    private $mac;
    private $sensorTipo;
    private $sensorCalibracao;
    private $sensorDataCalibracao;
    private $dataCadastro;
    private $dataAlterado;

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

    public function getCapacidade() {
        return $this->capacidade;
    }
    
    public function getNivelAlarme() {
        return $this->nivelAlarme;
    }
    
    public function getNivelCheio() {
        return $this->nivelCheio;
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
    
    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getDataAlterado() {
        return $this->dataAlterado;
    }
    
    public function getSensorTipo() {
        return $this->sensorTipo;
    }

    public function getSensorCalibracao() {
        return $this->sensorCalibracao;
    }

    public function getSensorDataCalibracao() {
        return $this->sensorDataCalibracao;
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
    
    public function setCapacidade($capacidade) {
        $this->capacidade = $capacidade;
    }
    public function setNivelAlarme($nivelAlarme) {
        $this->nivelAlarme = $nivelAlarme;
    }
    
    public function setNivelCheio($nivelCheio) {
        $this->nivelCheio = $nivelCheio;
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
    
    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setDataAlterado($dataAlterado) {
        $this->dataAlterado = $dataAlterado;
    }

    public function setSensorTipo($sensorTipo) {
        $this->sensorTipo = $sensorTipo;
    }

    public function setSensorCalibracao($sensorCalibracao) {
        $this->sensorCalibracao = $sensorCalibracao;
    }

    public function setSensorDataCalibracao($sensorDataCalibracao) {
        $this->sensorDataCalibracao = $sensorDataCalibracao;
    }

    private function selecionaMonitor($mac){
        
        $monitor = $this->model->buscaMonitor($mac);
        
        if ($monitor) {
            
            $this->setId($monitor->idMonitor);
            $this->setNome($monitor->nome);
            $this->setTipo($monitor->tipo);
            $this->setUnidade($monitor->unidade);
            $this->setDataCalibracao($monitor->dataCalibracao);
            $this->setCapacidade($monitor->capacidade);
            $this->setNivelAlarme($monitor->nivelAlarme);
            $this->setNivelCheio($monitor->nivelCheio);
            $this->setTempoColeta($monitor->tempoColeta);
            $this->setMac($monitor->mac);
            $this->setSensorTipo($monitor->sensorTipo);
            $this->setSensorCalibracao($monitor->sensorCalibracao);
            $this->setSensorDataCalibracao($monitor->sensorDataCalibracao);
            $this->setDataCadastro($monitor->dataCadastro);
            $this->setDataAlterado($monitor->dataAlterado);
                        
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
            $monitor->setNivelCheio($value->nivelCheio);
            
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
    
    public function verificaRecargaMonitor($medidor){
     
        $recarga = $this->model->buscaRecargaFinalizadaPorMedidor($medidor);
        
        return $recarga;
    }        

    public function calcularRecarga($nivel){                
        
        $recarga =  $this->getCapacidade() - ($this->getCapacidade()*$nivel/100);
        
        return $recarga;
    }
    
    public function verificaTransportesDisponiveisPorTipo($tipo){
        $lista_transportes = $this->model->buscaTransporteDisponivelPorTipo($tipo);
       
        return $lista_transportes;
    }
    
    public function verificaFornecedorCliente($tipo, $monitor){
        $fornecedorCliente = $this->model->buscaFornecedorCliente($tipo,$monitor);
        return $fornecedorCliente;
    }
    
    public function finalizaRecarga($idRecarga){
        $finaliza = $this->model->finalizaRecarga($idRecarga);
        
        return $finaliza;
    }

    public function disponibilizaTransporte($recarga){
        $listaTransporte = $this->model->listaTransporteIndisponivelPorRecarga($recarga);
        
        $result = FALSE;
        $i = 0;
        foreach ($listaTransporte AS $l){            
            $this->model->liberaTransportePorId($l->idTransporte);
            $i++;
        }
        if($i == count($listaTransporte)){
            $result = TRUE;
        }
        return $result;
    }
}
