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
class Recarga {
    //put your code here
    
    private $id;
    private $data;
    
    public function getId() {
        return $this->id;
    }

    public function getData() {
        return $this->data;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setData($data) {
        $this->data = $data;
    }
    
}
