<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TanqueSolido
 *
 * @author Suporte
 */

class TanquesSolidos extends Tanques{
    //put your code here
    private $model;
  
    
    public function __construct($model) {
        
        $this->model = $model;
    }
    
    
}
