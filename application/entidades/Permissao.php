<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Permissao
 *
 * @author Suporte
 */
class Permissao {
    //atributos
    
    private $idPermissao;
    
    //atributos especiais
    
    public function getIdPermissao() {
        
        return $this->idPermissao;
    }
    
    public function setIdPermissao($idPermissao){
        $this->idPermissao = $idPermissao;
    }
}
