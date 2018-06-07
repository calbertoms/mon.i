<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/Clientes.php');
require_once(APPPATH . 'entidades/Empresas.php');
require_once(APPPATH . 'entidades/Usuario.php');

class Cliente_ctrl extends CI_Controller {
    //atributo
    
    private $model;
    
    public function __construct() {
        
        parent::__construct();
        
         if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {

            redirect('Principal_ctrl/login');
        }
       
        $this->data['menuprincipal'] = 'principal';
        $this->load->model('Empresa_model','',TRUE);
        $this->load->model('Usuario_model','',TRUE);
        $this->model = $this->Empresa_model;
        
    }

    public function index(){
        
         $this->gerenciar();
            
    }

    public function gerenciar() {
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('Empresa/gerenciar');
        $config['total_rows'] = $this->Empresa_model->count('clientes');
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
       
        $this->data['clientes'] = $this->Empresa_model->buscaClientes($limit,$start);
        
        
        $this->data['usuarios'] = $this->Empresa_model->buscaUsuarios();
        
        $this->data['view'] = 'empresas/clientes_view';  
        
        $this->load->view('principal/tema_view',  $this->data);
        
    }   
    
    public function buscaCliente() {


        if (!empty($this->input->post('idCliente'))) {

            $cliente = new Clientes($this->model);

            $cliente->setIdEmpresa($this->input->post('idCliente'));

            $cliente->buscaEmpresaClass('clientes', 'idEmpresa');

            $dados = array('result' => TRUE,
                'nome' => $cliente->getNome(),
                'usuario' => $cliente->getUsuario(),
                'nomeFantasia' => $cliente->getNomeFantasia(),
                'cnpj' => $cliente->getCnpj(),
                'email' => $cliente->getEmail(),
                'telefone' => $cliente->getTelefone(),
                'inscEstadual' => $cliente->getInscEstadual(),
                'areaUtilm2' => $cliente->getAreaUtilm2(),
                'cep' => $cliente->getCep(),
                'numero' => $cliente->getNumero(),
                'logradouro' => $cliente->getLogradouro(),
                'complemento' => $cliente->getComplemento(),
                'uf' => $cliente->getUf(),
                'status' => $cliente->getStatus()
            );

            $result = json_encode($dados);
            
        } else {

            $dados = array('result' => FALSE);
            $result = json_encode($dados);
        }

        echo $result;
    }

    public function adicionar() {


        $cliente = new Clientes($this->model);
        $usuario = new Usuario($this->model);
        $usuario->setId($this->input->post('usuarioCad'));
        
        $cliente->setUsuario($usuario->getId());
        $cliente->setNome($this->input->post('nomeCad'));
        $cliente->setNomeFantasia($this->input->post('nomeFantasiaCad'));
        $cliente->setCnpj($this->input->post('cnpjCad'));
        $cliente->setEmail($this->input->post('emailCad'));
        $cliente->setTelefone($this->input->post('telefoneCad'));
        $cliente->setInscEstadual($this->input->post('inscEstadualCad'));
        $cliente->setAreaUtilm2($this->input->post('areaUtilm2Cad'));
        $cliente->setCep($this->input->post('cepCad'));
        $cliente->setNumero($this->input->post('numeroCad'));
        $cliente->setLogradouro($this->input->post('logradouroCad'));
        $cliente->setComplemento($this->input->post('complementoCad'));
        $cliente->setUf($this->input->post('ufCad'));  
        $cliente->setStatus($this->input->post('statusCad')); 
        $cliente->setDataCadastro(date("Y-m-d H:i:s"));
        $cliente->setDataAlterado(date("Y-m-d H:i:s"));


        if ($cliente->cadastrarClass('clientes') == TRUE) {

            $this->session->set_flashdata('success', 'Cliente adicionada com sucesso!');
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }

        redirect(base_url('Cliente_ctrl'));
    }

    public function editar() {


        $cliente = new Clientes($this->model);
        $usuario = new Usuario($this->model);
        $usuario->setId($this->input->post('usuarioEdit'));
        
        $cliente->setIdEmpresa($this->input->post('idCliente'));
        $cliente->setUsuario($usuario->getId());
        $cliente->setNome($this->input->post('nomeEdit'));
        $cliente->setNomeFantasia($this->input->post('nomeFantasiaEdit'));
        $cliente->setCnpj($this->input->post('cnpjEdit'));
        $cliente->setEmail($this->input->post('emailEdit'));
        $cliente->setTelefone($this->input->post('telefoneEdit'));
        $cliente->setInscEstadual($this->input->post('inscEstadualEdit'));
        $cliente->setAreaUtilm2($this->input->post('areaUtilm2Edit'));
        $cliente->setCep($this->input->post('cepEdit'));
        $cliente->setNumero($this->input->post('numeroEdit'));
        $cliente->setLogradouro($this->input->post('logradouroEdit'));
        $cliente->setComplemento($this->input->post('complementoEdit'));
        $cliente->setUf($this->input->post('ufEdit'));  
        $cliente->setStatus($this->input->post('statusEdit')); 
        $cliente->setDataAlterado(date("Y-m-d H:i:s"));


        if ($cliente->editarClass('clientes','idEmpresa') == TRUE) {

            $this->session->set_flashdata('success', 'Cliente alterado com sucesso!');
            
            
        } else {

            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
        
        redirect(base_url('Cliente_ctrl'));
    }


    //delete virtual
    public function excluir() {
        

        $cliente = new Clientes($this->model);
        $cliente->setIdEmpresa($this->input->post('id'));
        
        if ($cliente->getIdEmpresa() == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir Cliente.');            

        } else{
            
             if ($cliente->deletarEmpresaClass('clientes','idEmpresa') == TRUE) {
                
                $this->session->set_flashdata('success', 'Cliente excluído com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
         redirect(base_url('Cliente_ctrl'));        


    }
    
}
