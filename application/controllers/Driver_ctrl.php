<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/MonitorInteligente.php');
require_once(APPPATH . 'entidades/Leitura.php');

class Driver_ctrl extends CI_Controller {
    
    private $model;

    public function __construct() {
        parent::__construct();
        $this->load->model('Monitor_model','monitor',TRUE);
        $this->model = $this->monitor;
    }
    
    public function index(){
       
        $this->inseriLeituras();
        
    }
    
    private function inseriLeituras(){
       
       //pega dados do arduino via post 
       $mac = $this->input->post("mac");
       //cria um novo monitor
       $monitor = new MonitorInteligente($this->model);
       //verifica se existe monitor no banco com o mac passado pelo arduino
       if($monitor->monitorExiste($mac)) {
           //pega informações do arduino como o nivel do tanque
           //cria uma nova leitura
           $leitura = new Leitura();
           //guarda a data e hora da leitura
           $leitura->setDataHora(date('Y-m-d H:i:s'));
           //guarda o nível
           $leitura->setNivel($this->input->post("nivel"));
           
           //guarda a leitura do monitor
           $monitor->setLeitura($leitura);
           
           //salva a leitura no banco de dados
           if ($monitor->insereLeitura()) {
               echo 'tudo certo, leitura cadastrada com sucesso.';
           }
           else{
               echo 'houve um erro no cadastro';
           }
           
       }
       else{
           echo 'Não existe esse monitor no sistema';
       }
        
    }

        
}
