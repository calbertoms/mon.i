<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recarga_ctrl extends CI_Controller {

    //atributo
    
    private $model;


    //Contrutor
    public function __construct() {
        parent::__construct();
        
        if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {

            redirect('Principal_ctrl/login');
        }
       
        $this->data['menuprincipal'] = 'principal';
        $this->load->model('Recarga_model','',TRUE);
        $this->model = $this->Recarga_model;
 
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
        $config['total_rows'] = $this->Recarga_model->count('permissoes');
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
        
        
        $this->data['recargas'] = $this->Recarga_model->listaRecargas();
        
        $this->data['view'] = 'recargas/recargas_view';  
        $this->load->view('principal/tema_view',  $this->data);
        
    }
}
