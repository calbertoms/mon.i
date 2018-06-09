<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FornecedoresClientes
 *
 * @author Suporte
 */

require_once(APPPATH . 'entidades/Clientes.php');
require_once(APPPATH . 'entidades/Fornecedores.php');

class FornecedoresClientes {
    //put your code here
    
    private $idFornecedor;
    private $idCliente;
    

    private $model;
  
    
    public function __construct($model) {
        
        $this->model = $model;
    }
    
    public function getIdFornecedor() {
        return $this->idFornecedor;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdFornecedor(Fornecedores $idFornecedor) {
        $this->idFornecedor[] = $idFornecedor;
    }

    public function setIdCliente(Clientes $idCliente) {
        $this->idCliente[] = $idCliente;
    }




    
    
    
}
