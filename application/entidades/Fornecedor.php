<?php
include_once '/Empresa.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fornecedor
 *
 * @author Suporte
 */

class Fornecedor implements Empresa {

 
    private $emailAlerta;
    private $contatoAlerta;
    private $telContatoAlerta;
    
    public function getEmailAlerta() {
        return $this->emailAlerta;
    }

    public function getContatoAlerta() {
        return $this->contatoAlerta;
    }

    public function getTelContatoAlerta() {
        return $this->telContatoAlerta;
    }

    public function setEmailAlerta($emailAlerta) {
        $this->emailAlerta = $emailAlerta;
    }

    public function setContatoAlerta($contatoAlerta) {
        $this->contatoAlerta = $contatoAlerta;
    }

    public function setTelContatoAlerta($telContatoAlerta) {
        $this->telContatoAlerta = $telContatoAlerta;
    }

    
     /**
     * METODOS
     */
    
    public function cadastrar() {
        
    }
    
    public function editar() {
        
    }
    
    public function desativar() {
        
    }
    
    public function visualizar() {
        
    }
    
    public function deletar() {
        
    }
    
    
}
