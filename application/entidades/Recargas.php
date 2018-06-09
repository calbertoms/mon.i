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
require_once(APPPATH . 'entidades/Transportes.php');
require_once(APPPATH . 'entidades/Fornecedores.php');
require_once(APPPATH . 'entidades/Clientes.php');
require_once(APPPATH . 'entidades/MonitorInteligente.php');

class Recargas {
    //put your code here
    
    private $id;
    private $idClientes;
    private $idFornecedores;
    private $idMonitor;
    private $transporte;
    private $data;
    private $volumeRecarga;
    private $situacaoRecarga;
    private $status;



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

    public function getData() {
        return $this->data;
    }

    public function getVolumeRecarga() {
        return $this->volumeRecarga;
    }

    public function getSituacaoRecarga() {
        return $this->situacaoRecarga;
    }

    public function getStatus() {
        return $this->status;
    }

        
    public function getTransporte() {
        return $this->transporte;
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

    public function setData($data) {
        $this->data = $data;
    }

    public function setVolumeRecarga($volumeRecarga) {
        $this->volumeRecarga = $volumeRecarga;
    }

    public function setSituacaoRecarga($situacaoRecarga) {
        $this->situacaoRecarga = $situacaoRecarga;
    }

    public function setStatus($status) {
        $this->status = $status;
    }       

    /*
     * Metodos da Agregação
     * Requesito solicitado pela banca
     */    
    public function adicionaTransporte(Transportes $transporte){
        $this->transporte[] = $transporte;
    }
    

    public function cadastrarClass(){
        
        $data = array(
                        'idCliente'         => $this->getIdClientes()->getIdEmpresa(),
                        'idFornecedor'       => $this->getIdFornecedores()->getIdEmpresa(),
                        'idMonitor'         => $this->getIdMonitor()->getId(),
                        'data'              => $this->getData(),
                        'volumeRecarga'     => $this->getVolumeRecarga(),
                        'situacaoRecarga'   => $this->getSituacaoRecarga(),
                        'status'            => $this->getStatus()
        );
        
        if($id = $this->model->adicionar('recargas',$data) == TRUE){
            $i = 0;
            $id = $this->model->lastIdUsuario();
            $this->setId($id->idRecarga);
            foreach ($this->getTransporte() AS $t){
                $data2[$i] = array(
                                'idRecarga'     => $this->getId(),
                                'idTransporte'  => $t->getIdTransporte()
                );
                $i++;
            }
            for($j = 0; $j < $i; $j++){
                $this->model->adicionar('recargatransporte',$data2[$j]);
                $data3 = array ('disponibilidade' => 1);
                $this->model->editar('transportes',$data3,'idTransporte',$data2[$j]['idTransporte']);
            }
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
