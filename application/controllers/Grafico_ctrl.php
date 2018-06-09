<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafico_ctrl extends CI_Controller {
	
public function __construct() {
        parent::__construct();
        
        if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {
            redirect('Principal/login');
        }
        
        $this->data['menugraficos'] = 'graficos';    
        $this->load->model('Grafico_model','',TRUE);
        $this->data['view'] = 'graficos/graficos_view';
        
    }
    
}