<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/MonitorInteligente.php');

class Monitor_ctrl extends CI_Controller {

    //atributo
    
    private $model;


    //Contrutor
    public function __construct() {
        parent::__construct();
        
        if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {

            redirect('Principal_ctrl/login');
        }
       
        $this->data['menuprincipal'] = 'principal';
        $this->load->model('Monitor_model','',TRUE);
        $this->model = $this->Monitor_model;
 
    }
    
    public function index(){                
        
        $this->gerenciar();
 
    }

    public function login() {

        $this->load->view('principal/login_view');
    }
          
    
    public function gerenciar() {
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('Permissoes/gerenciar');
        $config['total_rows'] = $this->Monitor_model->count('permissoes');
        $config['per_page'] = 10;
        $config['next_link'] = '&raquo';
        $config['prev_link'] = '&laquo';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $limit = $config['per_page'];
        $start = ($this->uri->segment(3) == NULL) ? 0 : intval($this->uri->segment(3));

        $this->pagination->initialize($config);
        
        
        if((!$this->permission->checkPermission($this->session->userdata('permissao'),'gAdministradores'))){
            
            $this->data['monitores'] = $this->model->buscaMonitores($limit,$start);
        }else{
            $this->data['monitores'] = $this->model->buscaMonitores($limit,$start,TRUE);
        }
        
        
        
        $this->data['view'] = 'monitores/monitores_view';  
        $this->load->view('principal/tema_view',  $this->data);
        
    }
    
    public function adicionar() {
        $monitor = new MonitorInteligente($this->model);
        $monitor->setNome($this->input->post('nomeCad'));
        $monitor->setMac($this->input->post('macCad'));
        $monitor->setCapacidade($this->input->post('capacidadeCad'));
        $monitor->setTipo($this->input->post('tipoCad'));
        $monitor->setUnidade($this->input->post('unidadeCad'));
        $monitor->setNivelAlarme($this->input->post('nivelAlarmeCad'));
        $monitor->setNivelCheio($this->input->post('nivelCheioCad'));
        $monitor->setTempoColeta($this->input->post('tempoColetaCad'));
        $monitor->setSensorCalibracao($this->input->post('sensorCalibracaoCad'));
        $monitor->setSensorTipo($this->input->post('tipoSensorCad'));
        $monitor->setDataCalibracao($this->input->post('dataCalibracaoCad'));
        $monitor->setStatus(1);
        $monitor->setDataCadastro(date('Y-m-d'));
        $monitor->setDataAlterado(date('Y-m-d'));
        
        
        if($monitor->cadastrarClass() == TRUE){
            $this->session->set_flashdata('success', 'Monitor adicionado  com sucesso!');
        }else{
            
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
        redirect(base_url('Monitor_ctrl'));
    }
    
    public function buscaMonitor(){
        
         if(!empty($this->input->post('idMonitor'))){
            $monitor = new MonitorInteligente($this->model);

            $monitor->setId($this->input->post('idMonitor'));

            $monitor->buscaMonitorClass();

                $dados = array('result'             => TRUE,
                               'nome'               => $monitor->getNome(),
                               'mac'                => $monitor->getMac(),
                               'capacidade'         => $monitor->getCapacidade(),
                               'tipo'               => $monitor->getTipo(),
                               'unidade'            => $monitor->getUnidade(),
                               'nivelAlarme'        => $monitor->getNivelAlarme(),
                               'nivelCheio'         => $monitor->getNivelCheio(),
                               'tempoColeta'        => $monitor->getTempoColeta(),
                               'sensorCalibracao'   => $monitor->getSensorCalibracao(),
                               'sensorTipo'         => $monitor->getSensorTipo(),
                               'dataCalibracao'     => $monitor->getDataCalibracao()                               
                              );
                $result = json_encode($dados);
        }else{
            $dados = array('result' => FALSE);
            $result = json_encode($dados);
        }
        echo $result;
    }
    
    public function editar() {
        
        $monitor = new MonitorInteligente($this->model);
        $monitor->setId($this->input->post('idMonitor'));
        $monitor->setNome($this->input->post('nomeEdit'));
        $monitor->setMac($this->input->post('macEdit'));
        $monitor->setCapacidade($this->input->post('capacidadeEdit'));
        $monitor->setTipo($this->input->post('tipoEdit'));
        $monitor->setUnidade($this->input->post('unidadeEdit'));
        $monitor->setNivelAlarme($this->input->post('nivelAlarmeEdit'));
        $monitor->setNivelCheio($this->input->post('nivelCheioEdit'));
        $monitor->setTempoColeta($this->input->post('tempoColetaEdit'));
        $monitor->setSensorCalibracao($this->input->post('sensorCalibracaoEdit'));
        $monitor->setSensorTipo($this->input->post('tipoSensorEdit'));
        $monitor->setDataCalibracao($this->input->post('dataCalibracaoEdit'));                
        $monitor->setDataAlterado(date('Y-m-d'));
        
        if($monitor->editarClass()==TRUE){
            $this->session->set_flashdata('success', 'Monitor alterado com sucesso!');
        }else{
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
        redirect(base_url('Monitor_ctrl'));
        
    }
    
    public function excluir(){
        
        $monitor = new MonitorInteligente($this->model);
        $monitor->setId($this->input->post('id'));
        
        if($monitor->getId() == NULL){
             $this->session->set_flashdata('error','Erro ao tentar excluir Monitor.'); 
        } else{              
                        
            if ($monitor->deletarClass() == TRUE) {
                
                $this->session->set_flashdata('success', 'Monitor excluído com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
        redirect(base_url('Monitor_ctrl'));     
             
    }
    
    public function restaurar(){
        
        $monitor = new MonitorInteligente($this->model);
        $monitor->setId($this->input->post('id'));
        
        if($monitor->getId() == NULL){
             $this->session->set_flashdata('error','Erro ao tentar restaurar monitor.'); 
        } else{              
                        
            if ($monitor->restaurarClass() == TRUE) {
                
                $this->session->set_flashdata('success', 'Monitor restaurado com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
        redirect(base_url('Monitor_ctrl'));     
             
    }
}
