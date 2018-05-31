<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Recarga
 *
 * @author Suporte
 */
class Recargas {
    //put your code here
    
    private $id;
    private $idClientes;
    private $idFornecedores;
    private $idMonitor;
    private $idTransportes;
    private $data;
    private $volumeRecarga;
    private $statusRecarga;
    

    private $model;
  
    
    public function __construct($model) {
        
        $this->model = $model;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getIdClientes() {
        return $this->idClientes;
    }

    public function getIdFornecedores() {
        return $this->idFornecedores;
    }

    public function getIdMonitor() {
        return $this->idMonitor;
    }

    public function getIdTransportes() {
        return $this->idTransportes;
    }

    public function getData() {
        return $this->data;
    }

    public function getVolumeRecarga() {
        return $this->volumeRecarga;
    }

    public function getStatusRecarga() {
        return $this->statusRecarga;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdClientes(Clientes $idClientes) {
        $this->idClientes = $idClientes;
    }

    public function setIdFornecedores(Fornecedores $idFornecedores) {
        $this->idFornecedores = $idFornecedores;
    }

    public function setIdMonitor(MonitorInteligente $idMonitor) {
        $this->idMonitor = $idMonitor;
    }

    public function setIdTransportes(Transportes $idTransportes) {
        $this->idTransportes = $idTransportes;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setVolumeRecarga($volumeRecarga) {
        $this->volumeRecarga = $volumeRecarga;
    }

    public function setStatusRecarga($statusRecarga) {
        $this->statusRecarga = $statusRecarga;
    }

    public function cadastrarClass(Transportes $trasnporte) {
        
        $this->idTransportes[] = $trasnporte;
                
    }
    
    public function editarClass() {
        
    }
    
    public function desativarClass() {
        
    }
    
    public function buscarRecargaClass() {
        
    }
    
    
    
}
