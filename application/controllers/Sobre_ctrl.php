<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sobre_ctrl extends CI_Controller {
	
     
public function __construct() {
        parent::__construct();
        
    //    if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {
    //        redirect('Principal/login');
    //    }
        
        $this->data['menusobre'] = 'menusobre';
        
    }
    
    public function index(){
        
        $this->detalhes();
        
    }
    
    public function detalhes() {
        
        $this->data['view'] = 'sobre/sobre_view';  
        $this->load->view('principal/tema_view',  $this->data);
        
    }

}