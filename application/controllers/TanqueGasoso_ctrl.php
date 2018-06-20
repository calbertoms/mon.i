<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/TanquesGasosos.php');

class TanqueGasoso_ctrl extends CI_Controller {
    //atributo
    
    private $model;
    
    public function __construct() {
        parent::__construct();
        
         if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {

            redirect('Principal_ctrl/login');
        }
       
        $this->data['menuprincipal'] = 'principal';
        $this->load->model('Tanque_model','',TRUE);
        $this->model = $this->Tanque_model;
    }

    public function index(){
        
         $this->gerenciar();
            
    }

    public function gerenciar() {
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('Permissoes/gerenciar');
        $config['total_rows'] = $this->Tanque_model->count('permissoes');
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
        
        $this->data['fornecedores'] = $this->model->listaFornecedores();
        $this->data['clientes'] = $this->model->listaClientes();
        $this->data['monitores'] = $this->model->listaMonitores();
        $this->data['produtos'] = $this->model->listaProdutos();
        
        if((!$this->permission->checkPermission($this->session->userdata('permissao'),'gAdministradores'))){
            
            $this->data['tanques'] = $this->Tanque_model->buscaTanquesGasosos($limit,$start);
        }else{
            $this->data['tanques'] = $this->Tanque_model->buscaTanquesGasosos($limit,$start,TRUE);
        }
        
        
        $this->data['view'] = 'tanques/tanques_gasosos_view';  
        $this->load->view('principal/tema_view',  $this->data);
        
    } 

    public function buscaTanque() {


        if (!empty($this->input->post('idTanque'))) {

            $tanque = new TanquesGasosos($this->model);

            $tanque->setIdTanque($this->input->post('idTanque'));

            $tanque->buscaTanqueClass();

            $dados = array('result' => TRUE,
                'idFornecedor' => $tanque->getidFornecedor(),
                'idCliente' => $tanque->getidClientes(),
                'idMonitor' => $tanque->getidMonitor(),
                'idProduto' => $tanque->getidProduto(),
                'identificacao' => $tanque->getIdentificacao(),
                'dataFabricacao' => $tanque->getdataFabricacao(),
                'dataInspecao' => $tanque->getdataInspecao(),
                'dataManutencao' => $tanque->getdataManutencao(),
                'capacidade' => $tanque->getCapacidade(),
                'comprimento' => $tanque->getComprimento(),
                'altura' => $tanque->getAltura(),
                'largura' => $tanque->getLargura(),
                'nivel' => $tanque->getNivel(),
                'peso' => $tanque->getPeso(),
                'pressao' => $tanque->getPressao(),
                'temperatura' => $tanque->getTemperatura(),
                'temperatura' => $tanque->getTemperatura(),
                'status' => $tanque->getStatus()
            );

            $result = json_encode($dados);
            
        } else {

            $dados = array('result' => FALSE);
            $result = json_encode($dados);
        }

        echo $result;
        
    }

    public function adicionar() {

        $tanque = new TanquesGasosos($this->model);
        
        $cliente = new Clientes($this->model);
        $fornecedor = new Fornecedores($this->model);
        $produto = new Produtos($this->model);
        $monitor = new MonitorInteligente($this->model);
        
        $cliente->setIdEmpresa($this->input->post('clienteCad'));
        $fornecedor->setIdEmpresa($this->input->post('fornecedorCad'));
        $produto->setIdProduto($this->input->post('produtoCad'));
        $monitor->setId($this->input->post('monitorCad'));

        $tanque->setIdClientes($cliente->getIdEmpresa());
        $tanque->setIdFornecedor($fornecedor->getIdEmpresa());
        $tanque->setIdProduto($produto->getIdProduto());
        $tanque->setIdMonitor($monitor->getId());
  
        $tanque->setIdentificacao($this->input->post('identificacaoCad'));
        $tanque->setDataFabricacao($this->input->post('dataFabricacaoCad'));
        $tanque->setDataInspecao($this->input->post('dataInspecaoCad'));
        $tanque->setDataManutencao($this->input->post('dataManutencaoCad'));
        $tanque->setCapacidade($this->input->post('capacidadeCad'));
        $tanque->setComprimento($this->input->post('comprimentoCad'));
        $tanque->setAltura($this->input->post('alturaCad'));
        $tanque->setLargura($this->input->post('larguraCad'));
        $tanque->setNivel($this->input->post('nivelCad'));
        $tanque->setPeso($this->input->post('pesoCad'));
        $tanque->setPressao($this->input->post('pressaoCad'));
        $tanque->setTemperatura($this->input->post('temperaturaCad'));                
        $tanque->setStatus($this->input->post('statusCad')); 
        $tanque->setDataCadastro(date("Y-m-d"));
        $tanque->setDataAlterado(date("Y-m-d"));


        if ($tanque->cadastrarClass() == TRUE) {

            $this->session->set_flashdata('success', 'Tanque adicionada com sucesso!');
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }

        redirect(base_url('TanqueGasoso_ctrl'));
    }

    public function editar() {


        $tanque = new TanquesGasosos($this->model);
        
        $cliente = new Clientes($this->model);
        $fornecedor = new Fornecedores($this->model);
        $produto = new Produtos($this->model);
        $monitor = new MonitorInteligente($this->model);
        
        $cliente->setIdEmpresa($this->input->post('clienteEdit'));
        $fornecedor->setIdEmpresa($this->input->post('fornecedorEdit'));
        $produto->setIdProduto($this->input->post('produtoEdit'));
        $monitor->setId($this->input->post('monitorEdit'));

        $tanque->setIdClientes($cliente->getIdEmpresa());
        $tanque->setIdFornecedor($fornecedor->getIdEmpresa());
        $tanque->setIdProduto($produto->getIdProduto());
        $tanque->setIdMonitor($monitor->getId());
        
        $tanque->setIdTanque($this->input->post('idTanque'));
        $tanque->setIdentificacao($this->input->post('identificacaoEdit'));
        $tanque->setDataFabricacao($this->input->post('dataFabricacaoEdit'));
        $tanque->setDataInspecao($this->input->post('dataInspecaoEdit'));
        $tanque->setDataManutencao($this->input->post('dataManutencaoEdit'));
        $tanque->setCapacidade($this->input->post('capacidadeEdit'));
        $tanque->setComprimento($this->input->post('comprimentoEdit'));
        $tanque->setAltura($this->input->post('alturaEdit'));
        $tanque->setLargura($this->input->post('larguraEdit'));
        $tanque->setNivel($this->input->post('nivelEdit'));
        $tanque->setPeso($this->input->post('pesoEdit'));
        $tanque->setpressao($this->input->post('pressaoEdit'));
        $tanque->setTemperatura($this->input->post('temperaturaEdit'));
        $tanque->setStatus($this->input->post('statusEdit')); 
        $tanque->setDataAlterado(date("Y-m-d H:i:s"));


        if ($tanque->editarClass() == TRUE) {

            $this->session->set_flashdata('success', 'Tanque alterado com sucesso!');
            
            
        } else {

            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }

        redirect(base_url('TanqueGasoso_ctrl'));
    }

    //delete virtual
    public function excluir() {
        

        $tanque = new TanquesGasosos($this->model);
        $tanque->setIdTanque($this->input->post('id'));
        $tanque->setDataAlterado(date('Y-m-d'));
        
        if ($tanque->getIdTanque() == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir Tanque.');            

        } else{
            
             if ($tanque->deletarTanqueClass() == TRUE) {
                
                $this->session->set_flashdata('success', 'Tanque excluído com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
         redirect(base_url('TanqueGasoso_ctrl'));        

    }
    
    public function restaurar(){
        
        $tanque = new TanquesGasosos($this->model);
        
        $tanque->setIdTanque($this->input->post('id'));
        $tanque->setDataAlterado(date('Y-m-d'));
        
        if($tanque->getIdTanque() == NULL){
             $this->session->set_flashdata('error','Erro ao tentar restaurar Tanque.'); 
        } else{              
                        
            if ($tanque->restaurarTanqueClass() == TRUE) {
                
                $this->session->set_flashdata('success', 'Tanque restaurado com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
        redirect(base_url('TanqueGasoso_ctrl'));     
             
    }    
}
