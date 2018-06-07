<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/Tanques.php');

class TanqueSolido_ctrl extends CI_Controller {
    //atributo
    
    private $model;
    
    public function __construct() {
        parent::__construct();
        
         if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {

            redirect('Principal_ctrl/login');
        }
       
        $this->data['menuprincipal'] = 'principal';
        
        $this->load->model('Tanque_model','',TRUE);
        $this->load->model('Empresa_model','',TRUE);
        $this->load->model('Produto_model','',TRUE); 
        $this->load->model('Monitor_model','',TRUE);
        
        $this->model = $this->Tanque_model;
    }

    public function index(){
        
         $this->gerenciar();
            
    }

    public function gerenciar() {
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('Tanque/gerenciar');
        $config['total_rows'] = $this->Tanque_model->count('tanquessolidos');
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
                
        $this->data['TanqueSolidos'] = $this->Tanque_model->buscaTanques($limit,$start);
        
        //$this->data['monitor'] = $this->Tanque_model->buscaMonitor();
        
        //$this->data['produto'] = $this->Tanque_model->buscaProduto();
        
        //$this->data['cliente'] = $this->Tanque_model->buscaEmpresaPorId($tb,$idTb,$id);
        
        $this->data['view'] = 'tanques/tanques_solidos_view';  
        
        $this->load->view('principal/tema_view',  $this->data);
        
    } 
    
    public function buscaTanque() {


        if (!empty($this->input->post('idTanque'))) {

            $tanque = new TanquesSolidos($this->model);

            $tanque->setIdTanque($this->input->post('idTanque'));

            $tanque->buscaTanqueClass('tanquessolidos', 'idtanque');

            $dados = array('result' => TRUE,
                'idFornecedor' => $tanque->getidFornecedor(),
                'idClientes' => $tanque->getidClientes(),
                'idMonitor' => $tanque->getidMonitor(),
                'idProduto' => $tanque->getidProduto(),
                'identificacao' => $tanque->getidentificacao(),
                'dataFabricacao' => $tanque->getdataFabricacao(),
                'dataInspecao' => $tanque->getdataInspecao(),
                'dataManutencao' => $tanque->getdataManutencao(),
                'capacidade' => $tanque->getcapacidade(),
                'comprimento' => $tanque->getcomprimento(),
                'altura' => $tanque->getaltura(),
                'largura' => $tanque->getlargura(),
                'nivel' => $tanque->getnivel(),
                'peso' => $tanque->getpeso(),
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

        $tanque = new TanquesSolidos($this->model);
        
        $cliente = new Clientes($this->model);
        $fornecedor = new Fornecedores($this->model);
        $produto = new Produtos($this->model);
        $monitor = new MonitorInteligente($this->model);
        
        $cliente->getIdEmpresa($this->input->post('clienteCad'));
        $fornecedor->getIdEmpresa($this->input->post('empresaCad'));
        $produto->getIdProduto($this->input->post('produtoCad'));
        $monitor->getId($this->input->post('monitorCad'));

        $tanque->setIdClientes($cliente->getIdEmpresa());
        $tanque->setIdFornecedor($fornecedor->getIdEmpresa());
        $tanque->setIdProduto($produto->getIdProduto());
        $tanque->setIdMonitor($monitor->getId());
  
        $tanque->setIdentificacao($this->input->post('identificacaoCad'));
        $tanque->setDataFabricacao($this->input->post('dataFabricacaoCad'));
        $tanque->setDataInspecao($this->input->post('dataInspecaoCad'));
        $tanque->setDataManutencaol($this->input->post('dataManutencaoCad'));
        $tanque->setCapacidade($this->input->post('capacidadeCad'));
        $tanque->setComprimento($this->input->post('comprimentoCad'));
        $tanque->setAltura($this->input->post('alturaCad'));
        $tanque->setLargura($this->input->post('larguraCad'));
        $tanque->setNivel($this->input->post('nivelCad'));
        $tanque->setPeso($this->input->post('pesoCad'));
        $tanque->setStatus($this->input->post('statusCad')); 
        $tanque->setDataCadastro(date("Y-m-d H:i:s"));
        $tanque->setDataAlterado(date("Y-m-d H:i:s"));


        if ($tanque->cadastrarClass('tanquessolidos') == TRUE) {

            $this->session->set_flashdata('success', 'Tanque adicionada com sucesso!');
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }

        redirect(base_url('TanqueSolido_ctrl'));
    }

    public function editar() {


        $tanque = new TanquesSolidos($this->model);
        
        $cliente = new Clientes($this->model);
        $fornecedor = new Fornecedores($this->model);
        $produto = new Produtos($this->model);
        $monitor = new MonitorInteligente($this->model);
        
        $cliente->getIdEmpresa($this->input->post('clienteCad'));
        $fornecedor->getIdEmpresa($this->input->post('empresaCad'));
        $produto->getIdProduto($this->input->post('produtoCad'));
        $monitor->getId($this->input->post('monitorCad'));

        $tanque->setIdClientes($cliente->getIdEmpresa());
        $tanque->setIdFornecedor($fornecedor->getIdEmpresa());
        $tanque->setIdProduto($produto->getIdProduto());
        $tanque->setIdMonitor($monitor->getId());
  
        $tanque->setIdentificacao($this->input->post('identificacaoCad'));
        $tanque->setDataFabricacao($this->input->post('dataFabricacaoCad'));
        $tanque->setDataInspecao($this->input->post('dataInspecaoCad'));
        $tanque->setDataManutencaol($this->input->post('dataManutencaoCad'));
        $tanque->setCapacidade($this->input->post('capacidadeCad'));
        $tanque->setComprimento($this->input->post('comprimentoCad'));
        $tanque->setAltura($this->input->post('alturaCad'));
        $tanque->setLargura($this->input->post('larguraCad'));
        $tanque->setNivel($this->input->post('nivelCad'));
        $tanque->setPeso($this->input->post('pesoCad'));
        $tanque->setStatus($this->input->post('statusCad')); 
        $tanque->setDataAlterado(date("Y-m-d H:i:s"));


        if ($cliente->editarClass('tanquessolidos','idTanque') == TRUE) {

            $this->session->set_flashdata('success', 'Tanque alterado com sucesso!');
            
            
        } else {

            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
        
        redirect(base_url('TanqueSolido_ctrl'));
    }

    //delete virtual
    public function excluir() {
        

        $tanque = new TanquesSolidos($this->model);
        $tanque->setIdTanque($this->input->post('id'));
        
        if ($tanque->getIdTanque() == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir Tanque.');            

        } else{
            
             if ($cliente->deletarTanqueClass('tanquessolidos','idTanque') == TRUE) {
                
                $this->session->set_flashdata('success', 'Tanque excluído com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
         redirect(base_url('TanqueSolido_ctrl'));        


    }
}
