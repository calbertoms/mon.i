<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'entidades/Permissoes.php');

class Permissoes_ctrl extends CI_Controller {

     private $model;
     
public function __construct() {
        parent::__construct();
        
       /* if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {
            redirect('Principal_ctrl/login');
        }
        */
        $this->data['menuconfiguracao'] = 'menuconfiguracao';
        $this->data['conf_permissoes'] = 'conf_permissoes';
        $this->load->model('Permissoes_model','',TRUE);
        
        $this->model = $this->Permissoes_model;
        
    }
    
    public function index(){
        
        $this->gerenciar();
        
    }
    
    public function gerenciar() {
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('Permissoes/gerenciar');
        $config['total_rows'] = $this->Permissoes_model->count('permissoes');
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
        
        $this->data['permissoes'] = $this->Permissoes_model->buscaPermissoes($limit,$start);
        
        $this->data['view'] = 'permissoes/permissoes_view';  
        $this->load->view('principal/tema_view',  $this->data);
        
    }
    
    public function buscaPermissao() {


        if (!empty($this->input->post('idPermissao'))) {

            $permissao = new Permissoes($this->model);

            $permissao->setIdPermissao($this->input->post('idPermissao'));

            $permissao->buscaPermissaoClass();

            $permissoesUnserialized = unserialize($permissao->getPermissoes());


            $dados = array('result' => TRUE,
                'permissao' => $permissao->getPermissao(),
                'codigo' => $permissao->getCodigo(),
                'sigla' => $permissao->getSigla(),
                'setor' => $permissao->getSetor(),
                'categoria' => $permissao->getCategoria(),
                'efetivo' => $permissao->getEfetivo(),
                'descricao' => $permissao->getDescricao(),
                'observacao' => $permissao->getObservacao(),
                'status' => $permissao->getStatus(),
                'permissoes' => $permissoesUnserialized
            );

            $result = json_encode($dados);
        } else {

            $dados = array('result' => FALSE);
            $result = json_encode($dados);
        }
        echo $result;
    }

    public function adicionar() {


        $permissao = new Permissoes($this->model);
        $permissao->setPermissao($this->input->post('permissaoCad'));
        $permissao->setCodigo($this->input->post('codigoCad'));
        $permissao->setSigla($this->input->post('siglaCad'));
        $permissao->setSetor($this->input->post('setorCad'));
        $permissao->setCategoria($this->input->post('categoriaCad'));
        $permissao->setEfetivo($this->input->post('efetivoCad'));
        $permissao->setDescricao($this->input->post('descricaoCad'));
        $permissao->setObservacao($this->input->post('observacaoCad'));
        $permissao->setStatus($this->input->post('statusCad'));

        $permissoes = array(
            'gGestaoDispositivos' => $this->input->post('gGestaoDispositivosCad'),
            'gGraficos' => $this->input->post('gGraficosCad'),
            'gConfiguracoes' => $this->input->post('gConfiguracoesCad')
        );

        $permissao->setPermissoes(serialize($permissoes));
        $permissao->setUsuario($this->session->userdata('usuario'));
        $permissao->setDataCadastro(date("Y-m-d H:i:s"));
        $permissao->setDataAlterado(date("Y-m-d H:i:s"));



        if ($permissao->cadastrarClass() == TRUE) {

            $this->session->set_flashdata('success', 'Permissão adicionada com sucesso!');
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }

        redirect(base_url('Permissoes_ctrl'));
    }

    public function editar() {


        $permissao = new Permissoes($this->model);
        $permissao->setIdPermissao($this->input->post('idPermissao'));

        $permissao->setPermissao($this->input->post('permissaoEdit'));
        $permissao->setCodigo($this->input->post('codigoEdit'));
        $permissao->setSigla($this->input->post('siglaEdit'));
        $permissao->setSetor($this->input->post('setorEdit'));
        $permissao->setCategoria($this->input->post('categoriaEdit'));
        $permissao->setEfetivo($this->input->post('efetivoEdit'));
        $permissao->setDescricao($this->input->post('descricaoEdit'));
        $permissao->setObservacao($this->input->post('observacaoEdit'));
        $permissao->setStatus($this->input->post('statusEdit'));

        $permissoes = array(
            'gGestaoDispositivos' => $this->input->post('gGestaoDispositivosEdit'),
            'gGraficos' => $this->input->post('gGraficosEdit'),
            'gConfiguracoes' => $this->input->post('gConfiguracoesEdit')
        );

        $permissao->setPermissoes(serialize($permissoes));
        //$permissao->setUsuario($this->session->userdata('usuario'));
        $permissao->setDataAlterado(date("Y-m-d H:i:s"));



        if ($permissao->editarClass() == TRUE) {

            $this->session->set_flashdata('success', 'Permisão alterada com sucesso!');
            
            
        } else {

            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
        
        redirect(base_url('Permissoes_ctrl'));
    }

    public function verificaPermissao() {

        $permissao = $this->input->get("permissaoCad");

        if ($permissao == null) {

            echo 'true';
        } else {

            $result = $this->Permissoes_model->buscaPermissaoPorNome($permissao);
            if (count($result) > 0) {

                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    //delete virtual
    public function excluir() {
        

        $permissao = new Permissoes($this->model);
        $permissao->setIdPermissao($this->input->post('id'));
        
        if ($permissao->getIdPermissao() == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir Permissao.');            

        } else{
            if ($permissao->getIdPermissao() == 1){

                    $this->session->set_flashdata('error','Não é possível excluir essa Permissão.');

                    redirect(base_url('Permissoes_ctrl'));
            }
                  
                        
            if ($permissao->deletarPermissaoClass() == TRUE) {
                
                $this->session->set_flashdata('success', 'Permissão excluído com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
         redirect(base_url('Permissoes_ctrl'));        


    }
    

}