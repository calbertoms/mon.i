<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/Usuario.php');

class Usuario_ctrl extends CI_Controller {

    private $model;
    
    public function __construct() {
        
        parent::__construct();
    
        $this->data['menuconfiguracao'] = 'menuconfiguracao';
        $this->load->model('Usuario_model','',TRUE);
        $this->model = $this->Usuario_model;
    }
    
    public function index(){
        
       $this->gerenciar(); 
            
    }

       public function gerenciar() {
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('Usuario/gerenciar');
        $config['total_rows'] = $this->Usuario_model->count('usuario');
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
        
        $this->data['usuarios'] = $this->Usuario_model->buscaUsuarios($limit,$start);
        
        $this->data['permissoes'] = $this->Usuario_model->buscaPermissoes();
        
        $this->data['view'] = 'usuarios/usuarios_view';  
        $this->load->view('principal/tema_view',  $this->data);
        
        
    }
    
    public function adicionar() {
        
        $this->load->library('encrypt');
        
        $usuario = new Usuario($this->model);
        
        $usuario->setNomeCompleto($this->input->post('nomeCompletoCad'));
        $usuario->setUsuario($this->input->post('usuarioCad'));
        $usuario->setEmail($this->input->post('emailCad'));
        $usuario->setPermissao($this->input->post('permissaoCad'));
        $usuario->setSenha($this->encrypt->hash($this->input->post('senhaCad')));
        $usuario->setSituacao($this->input->post('situacaoCad'));
        
        if($usuario->cadastrar() == TRUE){
            $this->session->set_flashdata('success', 'Usuário adicionado  com sucesso!');
        }else{
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
                
        redirect(base_url('Usuario_ctrl'));
    }
}

