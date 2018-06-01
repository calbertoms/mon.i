<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/Usuario.php');
require_once(APPPATH . 'entidades/Permissoes.php');

class Usuario_ctrl extends CI_Controller {

    private $model;

        
    public function __construct() {
        
        parent::__construct();
    
        $this->data['menuconfiguracao'] = 'menuconfiguracao';
        $this->load->model('Usuario_model','',TRUE);
        $this->load->model('Permissoes_model','',TRUE);
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
        
        $permissao = new Permissoes($this->model);
        $permissao->setIdPermissao($this->input->post('permissaoCad'));
        
        
        $usuario = new Usuario($this->model);
        
        $usuario->setNomeCompleto($this->input->post('nomeCompletoCad'));
        $usuario->setUsuario($this->input->post('usuarioCad'));
        $usuario->setTelefone($this->input->post('telefoneCad'));
        $usuario->setCpf($this->input->post('cpfCad'));
        $usuario->setRg($this->input->post('rgCad'));
        $usuario->setEmail($this->input->post('emailCad'));
        $usuario->setPermissao($permissao);
        $usuario->setSenha($this->encrypt->hash($this->input->post('senhaCad')));
        $usuario->setSituacao($this->input->post('situacaoCad'));
        $usuario->setDataCadastro(date("Y-m-d H:i:s"));       
        $usuario->setDataAlterado(date("Y-m-d H:i:s"));

        if($usuario->cadastrarClass() == TRUE){
            
            $this->session->set_flashdata('success', 'Usuário adicionado  com sucesso!');
            
        }else{
            
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
                
        redirect(base_url('Usuario_ctrl'));
    }
    
    public function buscaUsuario() {
        
        if(!empty($this->input->post('idUsuario'))){
            
            $usuario = new Usuario($this->model);

            $usuario->setId($this->input->post('idUsuario'));

            $usuario->buscaUsuarioClass();


                $dados = array('result'      => TRUE,
                               'nomeCompleto'=> $usuario->getNomeCompleto(),
                               'usuario'     => $usuario->getUsuario(),
                               'telefone'    => $usuario->getTelefone(),
                               'cpf'         => $usuario->getCpf(),
                               'rg'          => $usuario->getRg(),
                               'email'       => $usuario->getEmail(),
                               'situacao'    => $usuario->getSituacao(),
                               'permissao'   => $usuario->getPermissao()->getIdPermissao()
                                );
            $result = json_encode($dados);
        }
        else{
            
            $dados = array('result' => FALSE);
            $result = json_encode($dados);
        }
        echo $result;
    }
    
    public function editar() {
        
        $this->load->library('encrypt');
        
        $usuario = new Usuario($this->model);
        $permissao = new Permissoes($this->model);
        $permissao->setIdPermissao($this->input->post('permissaoEdit'));
        
        $usuario->setId($this->input->post('idUsuario'));
        $usuario->setNomeCompleto($this->input->post('nomeCompletoEdit'));
        $usuario->setUsuario($this->input->post('usuarioEdit'));
        $usuario->setTelefone($this->input->post('telefoneEdit'));
        $usuario->setCpf($this->input->post('cpfEdit'));
        $usuario->setRg($this->input->post('rgEdit'));
        $usuario->setEmail($this->input->post('emailEdit'));
        $usuario->setPermissao($permissao);
        
        if ($this->input->post('senhaEdit')!=''){
           
            $usuario->setSenha($this->encrypt->hash($this->input->post('senhaEdit'))); 
            
        }
        
            $usuario->setSituacao($this->input->post('situacaoEdit'));
        
        if($usuario->editarClass() == TRUE){
            
            $this->session->set_flashdata('success', 'Usuário alterado com sucesso!');
            
        }else{
            
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
             

        redirect(base_url('Usuario_ctrl'));
    }
    
    public function excluir() {
        
        $usuario = new Usuario($this->model);
        $usuario->setId($this->input->post('id'));
        
        if ($usuario->getId() == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir Permissao.');            

        } else{
            if ($usuario->getId() == 1){

                    $this->session->set_flashdata('error','Não é possível excluir esse Usuário.');

                    redirect(base_url('Usuario_ctrl'));
            }

        
      //  $usuario->setId($this->input->post('idUsuario'));
                  
                        
            if ($usuario->deletarUsuarioClass() == TRUE) {
                
                $this->session->set_flashdata('success', 'Usuário excluído com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
        redirect(base_url('Usuario_ctrl'));        

        
    }
}

