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

    
    public function cadastrarListaClienteClass(){
        
        $clientes = $this->model->getDataTable('fornecedoresclientes','*','idCliente','idFornecedor ='.$this->getIdFornecedor()[0]->getIdEmpresa());        
        if($clientes == NULL){               
            for($i = 0; $i < count($this->getIdCliente()); $i++){
                $data[$i] = array(
                        'idFornecedor' => $this->getIdFornecedor()[0]->getIdEmpresa(),
                        'idCliente'    => $this->getIdCliente()[$i]->getIdEmpresa()
                );
                if($this->getIdCliente()[$i]->getIdEmpresa()!= ''){
                    if($this->model->adicionar('fornecedoresclientes',$data[$i]) == TRUE){
                        $result = TRUE;
                    }else{
                        $result = FALSE;
                        break(1);
                    }
                }else{
                    $result =  TRUE;
                }
            }

        }else{
            if($this->model->deletar('fornecedoresclientes','idFornecedor', $this->getIdFornecedor()[0]->getIdEmpresa()) == TRUE){                   
                for($i = 0; $i < count($this->getIdCliente()); $i++){
                    $data[$i] = array(
                            'idFornecedor' => $this->getIdFornecedor()[0]->getIdEmpresa(),
                            'idCliente'    => $this->getIdCliente()[$i]->getIdEmpresa()
                    );
                    if($this->getIdCliente()[$i]->getIdEmpresa()!= ''){
                        if($this->model->adicionar('fornecedoresclientes',$data[$i]) == TRUE){
                            $result = TRUE;
                        }else{               
                            $result = FALSE;
                            break;
                        }
                    }else{
                        $result =  TRUE;
                    }         
                }
            }else{
                $result = FALSE;
            }
        }

        return $result;
        
    }

 public function cadastrarListaFornecedorClass(){

        $fornecedores = $this->model->getDataTable('fornecedoresclientes','*','idFornecedor','idCliente ='.$this->getIdCliente()[0]->getIdEmpresa());        
        $result =$fornecedores;
        if($fornecedores == NULL){               
                for($i = 0; $i < count($this->getIdFornecedor()); $i++){
                    $data[$i] = array(
                            'idCliente' => $this->getIdCliente()[0]->getIdEmpresa(),
                            'idFornecedor'    => $this->getIdFornecedor()[$i]->getIdEmpresa()
                    );
                    if($this->getIdFornecedor()[$i]->getIdEmpresa()!= ''){
                        if($this->model->adicionar('fornecedoresclientes',$data[$i]) == TRUE){
                            $result = TRUE;
                        }else{
                            $result = FALSE;
                            break(1);
                        }
                    }else{
                        $result =  TRUE;
                    }
                }

        }else{
            if($this->model->deletar('fornecedoresclientes','idCliente', $this->getIdCliente()[0]->getIdEmpresa()) == TRUE){                   
                for($i = 0; $i < count($this->getIdFornecedor()); $i++){
                    $data[$i] = array(
                            'idCliente' => $this->getIdCliente()[0]->getIdEmpresa(),
                            'idFornecedor'    => $this->getIdFornecedor()[$i]->getIdEmpresa()
                    );
                    if($this->getIdFornecedor()[$i]->getIdEmpresa()!= ''){
                        if($this->model->adicionar('fornecedoresclientes',$data[$i]) == TRUE){
                            $result = TRUE;
                        }else{               
                            $result = FALSE;
                            break;
                        }
                    }else{
                        $result =  TRUE;
                    }         
                }
            }else{
                $result = FALSE;
            }
        }

        return $result;
        
    }
    
    
    
}
