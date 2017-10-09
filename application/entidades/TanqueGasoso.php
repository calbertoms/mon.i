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
class TanqueGasoso extends Tanque{
    //put your code here
    
    private $pressao;
    private $temperatura;
    
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
