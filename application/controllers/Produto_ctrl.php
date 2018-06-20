<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/Produtos.php');
class Produto_ctrl extends CI_Controller {
    //atributo
    
    private $model;
    
    public function __construct() {
        parent::__construct();
        
         if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {

            redirect('Principal_ctrl/login');
        }
       
        $this->data['menuprincipal'] = 'principal';
        $this->load->model('Produto_model','',TRUE);
        $this->model = $this->Produto_model;
    }

    public function index(){
        
         $this->gerenciar();
            
    }

    public function gerenciar() {
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('Permissoes/gerenciar');
        $config['total_rows'] = $this->Produto_model->count('permissoes');
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
            
           $this->data['produtos'] = $this->model->buscaProdutos($limit,$start);
        }else{
            $this->data['produtos'] = $this->model->buscaProdutos($limit,$start,TRUE);
        }
        
        $this->data['view'] = 'produtos/produtos_view';  
        $this->load->view('principal/tema_view',  $this->data);
        
    }
    
    public function adicionar(){
     
        $produto = new Produtos($this->model);
        
        $produto->setNome($this->input->post('nomeCad'));
        $produto->setCodigo($this->input->post('codigoCad'));
        $produto->setTipo($this->input->post('tipoCad'));
        $produto->setUnidade($this->input->post('unidadeCad'));
        $produto->setTipoTransporte($this->input->post('tipoTransporteCad'));
        $produto->setStatus(1);
        $produto->setTemperatura($this->input->post('temperaturaCad'));
        $produto->setDensidade($this->input->post('densidadeCad'));
        $produto->setInflamavel($this->input->post('inflamavelCad'));
        $produto->setDescricao($this->input->post('descricaoCad'));
        $produto->setDataCadastro(date("Y-m-d H:i:s"));       
        $produto->setDataAlterado(date("Y-m-d H:i:s"));
        
        if($produto->cadastrarClass() == TRUE){
            $this->session->set_flashdata('success', 'Produto adicionado  com sucesso!');
        }else{
            
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
        redirect(base_url('Produto_ctrl'));
    }

    public function buscaProduto(){
        if(!empty($this->input->post('idProduto'))){
            $produto = new Produtos($this->model);

            $produto->setIdProduto($this->input->post('idProduto'));

            $produto->buscaProdutoClass();

                $dados = array('result'         => TRUE,
                               'nome'           => $produto->getNome(),
                               'codigo'         => $produto->getCodigo(),
                               'tipo'           => $produto->getTipo(),
                               'unidade'        => $produto->getUnidade(),
                               'tipoTransporte' => $produto->getTipoTransporte(),
                               'status'         => $produto->getStatus(),
                               'temperatura'    => $produto->getTemperatura(),
                               'densidade'      => $produto->getDensidade(),
                               'inflamavel'     => $produto->getInflamavel(),
                               'descricao'      => $produto->getDescricao()
                        );
                $result = json_encode($dados);
        }else{
            $dados = array('result' => FALSE);
            $result = json_encode($dados);
        }
        echo $result;
        
    }
    
    public function editar(){
    
        $produto = new Produtos($this->model);
        
        $produto->setIdProduto($this->input->post('idProduto'));
        $produto->setNome($this->input->post('nomeEdit'));
        $produto->setCodigo($this->input->post('codigoEdit'));
        $produto->setTipo($this->input->post('tipoEdit'));
        $produto->setUnidade($this->input->post('unidadeEdit'));
        $produto->setTipoTransporte($this->input->post('tipoTransporteEdit'));
        $produto->setTemperatura($this->input->post('temperaturaEdit'));
        $produto->setDensidade($this->input->post('densidadeEdit'));
        $produto->setInflamavel($this->input->post('inflamavelEdit'));
        $produto->setDescricao($this->input->post('descricaoEdit'));
        $produto->setDataAlterado(date('Y-m-d H:i:s'));
        
        if($produto->editarClass() == TRUE){
            $this->session->set_flashdata('success', 'Produto alterado com sucesso!');
        }else{
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
        redirect(base_url('Produto_ctrl'));
    }

    public function excluir(){
        
        $produto = new Produtos($this->model);
        $produto->setIdProduto($this->input->post('id'));
        
        if($produto->getIdProduto() == NULL){
             $this->session->set_flashdata('error','Erro ao tentar excluir Produto.'); 
        } else{              
                        
            if ($produto->deletarProdutoClass() == TRUE) {
                
                $this->session->set_flashdata('success', 'Produto excluído com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
        redirect(base_url('Produto_ctrl'));     
             
    }
    
    public function restaurar(){
        
        $produto = new Produtos($this->model);
        $produto->setIdProduto($this->input->post('id'));
        
        if($produto->getIdProduto() == NULL){
             $this->session->set_flashdata('error','Erro ao tentar restaurar Produto.'); 
        } else{              
                        
            if ($produto->restaurarProdutoClass() == TRUE) {
                
                $this->session->set_flashdata('success', 'Produto restaurado com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
        redirect(base_url('Produto_ctrl'));     
             
    }
}
