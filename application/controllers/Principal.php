<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        
        $this->data['menuprincipal'] = 'principal';
        
    }

    public function index(){
        
        //redirect('Principal/login');
        $this->load->view('principal/tema',  $this->data);
            
    }
    
    public  function login(){
        
        $this->load->view('principal/login');
        
    }

        
}
