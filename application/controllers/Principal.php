<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/MonitorInteligente.php');

class Principal extends CI_Controller {

    private $model;
    
    public function __construct() {
        parent::__construct();
        
        $this->data['menuprincipal'] = 'principal';
        $this->load->model('Monitor_model','monitor',TRUE);
        $this->model = $this->monitor;
        
    }

    public function index(){
        
        //redirect('Principal/login');
        
        $monitor = new MonitorInteligente($this->model);
                
        $this->data['monitor'] = $monitor->buscaMonitores();
        $this->data['view'] = 'graficos/grafico';
        $this->load->view('principal/tema',  $this->data);
            
    }
    
    public  function login(){
        
        $this->load->view('principal/login');
        
    }
    
    public function geraGrafico(){
        
        $id = $this->input->post('monitor');
        $tipo = $this->input->post('tipoGrafico');
        $dataDe = $this->input->post('dataDe');
        $dataPara = $this->input->post('dataPara');
        
        $monitor = new MonitorInteligente($this->model);
        $result = $monitor->buscaleiturasMonitorPorPeriodo($id, $dataDe, $dataPara);
        
        if (count($result) > 0) {
        
            switch ($tipo) {
                
                case 0:

                    $data= array('labels' => [], 'dados' => []);
                    
                    foreach ($result as $dado) {
                    
	                    array_push($data['labels'], utf8_encode(date('d/m/Y H:i:s',strtotime($dado->dataHora))));
	                    array_push($data['dados'], $dado->nivel);
                    
                    }
                    
                    break;
                    
            }
            
            echo json_encode($data);
            
        }
        else {
            $data= array('labels' => [], 'dados' => []);
            echo json_encode($data);
        }
        
    }

        
}
