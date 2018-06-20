<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/Transportes.php');
class Transporte_ctrl extends CI_Controller {
    //atributo
    
    private $model;
    
    public function __construct() {
        parent::__construct();
        
         if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {

            redirect('Principal_ctrl/login');
        }
       
        $this->data['menuprincipal'] = 'principal';
        $this->load->model('Transporte_model','',TRUE);
        $this->model = $this->Transporte_model;
    }

    public function index(){
        
         $this->gerenciar();
            
    }

    public function gerenciar() {
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('Permissoes/gerenciar');
        $config['total_rows'] = $this->Transporte_model->count('permissoes');
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
            
           $this->data['transportes'] = $this->model->buscaTransportes($limit,$start);
       }else{
           $this->data['transportes'] = $this->model->buscaTransportes($limit,$start,TRUE);
       }
        
        
        
        $this->data['view'] = 'transportes/transportes_view';  
        $this->load->view('principal/tema_view',  $this->data);
        
    }
    
    public function adicionar(){
     
        $transporte = new Transportes($this->model);
        
        $transporte->setDisponibilidade($this->input->post('disponibilidadeCad'));
        $transporte->setPlaca($this->input->post('placaCad'));
        $transporte->setAntt($this->input->post('anttCad'));
        $transporte->setModelo($this->input->post('modeloCad'));
        $transporte->setCor($this->input->post('corCad'));
        $transporte->setStatus(1);
        $transporte->setAnoFabricacao($this->input->post('anoFabricacaoCad'));
        $transporte->setTara($this->input->post('taraCad'));
        $transporte->setBruto($this->input->post('brutoCad'));
        $transporte->setDataManutencao($this->input->post('dataManutCad'));
        $transporte->setTipo($this->input->post('tipoCad'));
        $transporte->setDataCadastro(date("Y-m-d H:i:s"));       
        $transporte->setDataAlterado(date("Y-m-d H:i:s"));
        
        if($transporte->cadastrarClass() == TRUE){
            $this->session->set_flashdata('success', 'Transporte adicionado  com sucesso!');
        }else{
            
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
        redirect(base_url('Transporte_ctrl'));
    }
    
    public function buscaTransporte() {
        
        if(!empty($this->input->post('idTransporte'))){
            
            $transporte = new Transportes($this->model);

            $transporte->setIdTransporte($this->input->post('idTransporte'));

            $transporte->buscaTransporteClass();


                $dados = array('result'      => TRUE,
                               'disponibilidade'    => $transporte->getDisponibilidade(),
                               'placa'              => $transporte->getPlaca(),
                               'antt'               => $transporte->getAntt(),
                               'modelo'             => $transporte->getModelo(),
                               'cor'                => $transporte->getCor(),
                               'anoFabricacao'      => $transporte->getAnoFabricacao(),
                               'tara'               => $transporte->getTara(),
                               'bruto'              => $transporte->getBruto(),
                               'dataManutencao'     => $transporte->getDataManutencao(),
                               'tipo'               => $transporte->getTipo()
                                );
            $result = json_encode($dados);
        }
        else{
            
            $dados = array('result' => FALSE);
            $result = json_encode($dados);
        }
        echo $result;
    }
    
    public function editar(){
    
        $transporte = new Transportes($this->model);
        
        $transporte->setIdTransporte($this->input->post('idTransporte'));
        $transporte->setDisponibilidade($this->input->post('disponibilidadeEdit'));
        $transporte->setPlaca($this->input->post('placaEdit'));
        $transporte->setAntt($this->input->post('anttEdit'));
        $transporte->setModelo($this->input->post('modeloEdit'));
        $transporte->setCor($this->input->post('corEdit'));
        $transporte->setAnoFabricacao($this->input->post('anoFabricacaoEdit'));
        $transporte->setTara($this->input->post('taraEdit'));
        $transporte->setBruto($this->input->post('brutoEdit'));
        $transporte->setDataManutencao($this->input->post('dataManutEdit'));
        $transporte->setTipo($this->input->post('tipoEdit'));
        $transporte->setDataAlterado(date('Y-m-d H:i:s'));
        
        if($transporte->editarClass() == TRUE){
            $this->session->set_flashdata('success', 'Transporte alterado com sucesso!');
        }else{
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
        redirect(base_url('Transporte_ctrl'));
    }
    
     public function excluir(){
        
        $transporte = new Transportes($this->model);
        $transporte->setIdTransporte($this->input->post('id'));
        
        if($transporte->getIdTransporte() == NULL){
             $this->session->set_flashdata('error','Erro ao tentar excluir Transporte.'); 
        } else{              
                        
            if ($transporte->deletarTransporteClass() == TRUE) {
                
                $this->session->set_flashdata('success', 'Transporte excluído com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
        redirect(base_url('Transporte_ctrl'));     
             
    }
    
    public function restaurar(){
        
        $transporte = new Transportes($this->model);
        $transporte->setIdTransporte($this->input->post('id'));
        
        if($transporte->getIdTransporte() == NULL){
             $this->session->set_flashdata('error','Erro ao tentar restaurar Produto.'); 
        } else{              
                        
            if ($transporte->restaurarTransporteClass() == TRUE) {
                
                $this->session->set_flashdata('success', 'Produto restaurado com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
        redirect(base_url('Transporte_ctrl'));     
             
    }
}
