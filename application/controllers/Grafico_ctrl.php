<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'entidades/MonitorInteligente.php');
class Grafico_ctrl extends CI_Controller {
	 private $model;
         
public function __construct() {
        parent::__construct();
        
        
        $this->load->model('Monitor_model', 'monitor', TRUE);
        $this->model = $this->monitor;
     
        
    }
    public function index(){
        
        $monitor = new MonitorInteligente($this->model);
        $this->data['monitor'] = $monitor->buscaMonitores();
        $this->data['view'] = 'graficos/graficos_view';
        $this->load->view('principal/tema_view', $this->data);

    }
    
}