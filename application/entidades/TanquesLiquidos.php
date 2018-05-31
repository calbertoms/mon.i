<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TanqueLiquido
 *
 * @author Suporte
 */

class TanquesLiquidos extends Tanques{
    //put your code here
    
    private $nivel;
    
    private $model;
  
    
    public function __construct($model) {
        
        $this->model = $model;
    }
    
    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }


    
}
