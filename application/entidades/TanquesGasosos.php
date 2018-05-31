<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TanqueGasoso
 *
 * @author Suporte
 */

class TanquesGasosos extends Tanques{
    //put your code here
    
    private $pressao;
    private $temperatura;
    
    private $model;
  
    
    public function __construct($model) {
        
        $this->model = $model;
    }
    
    public function getPressao() {
        return $this->pressao;
    }

    public function getTemperatura() {
        return $this->temperatura;
    }

    public function setPressao($pressao) {
        $this->pressao = $pressao;
    }

    public function setTemperatura($temperatura) {
        $this->temperatura = $temperatura;
    }


    
}
