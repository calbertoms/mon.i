<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissoes extends CI_Controller {
	
public function __construct() {
        parent::__construct();
        
       /* if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {
            redirect('Principal/login');
        }
        */
        $this->data['menuconfiguracao'] = 'menuconfiguracao';
        $this->data['conf_permissoes'] = 'conf_permissoes';
        $this->load->model('Permissoes_model','',TRUE);
        
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
        
        $this->data['view'] = 'permissoes/permissoes';  
        $this->load->view('principal/tema',  $this->data);
        
    }
    
    public function buscaPermissao(){
        
        //pega os dados passados por parametros via post ajax
        $id =$this->input->post("idPermissao");
        
        //verifica se algum veio nulo, caso aconteça sai da função retornando nulo
        if($id == null){
            
            $json = array('result'=>  false);
            echo json_encode($json);

    	}
        
    	else{

            $result = $this->Permissoes_model->buscaPermissaoPorId($id);
            if(count($result) > 0 ){
                
                $permissoes = unserialize($result->permissoes);  
                
                $json = array('result'=>  TRUE,
                              'permissao'=> $result->permissao,
                              'permissoes'=> $permissoes);
                echo json_encode($json);


            }
            else{
                
                $json = array('result'=>  false);
                echo json_encode($json);
                
            }
            
    		
    	}
        
        
    }
    
    public function adicionar() {
        
        $permissao = $this->input->post('permissaoCad');
        
        $permissoes = array(
            
            'gGestaoDispositivos' => $this->input->post('gGestaoDispositivosCad'),
            'gGraficos' => $this->input->post('gGraficosCad'),
            'gConfiguracoes' => $this->input->post('gConfiguracoesCad')            
            
        );
        
        $permissoes = serialize($permissoes);
        $usuario = $this->session->userdata('usuario');
        $dataCadastro = date("Y-m-d H:i:s");
        $dataAlterado = date("Y-m-d H:i:s");
        
        $data = array(
            'permissao' => $permissao,
            'permissoes' => $permissoes,
            'usuario' => $usuario,
            'dataCadastro' => $dataCadastro,
            'dataAlterado' => $dataAlterado
        );

        if ($this->Permissoes_model->adicionar('permissoes', $data) == TRUE) {

            $this->session->set_flashdata('success', 'Permissão adicionada com sucesso!');
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
        
        redirect(base_url('Permissoes'));
        
    }
    
    public function editar() {
        
        $idPermissao = $this->input->post('idPermissao');
        $permissao = $this->input->post('permissaoEdit');
        
        $permissoes = array(
            
            'gGestaoDispositivos' => $this->input->post('gGestaoDispositivosEdit'),
            'gGraficos' => $this->input->post('gGraficosEdit'),
            'gConfiguracoes' => $this->input->post('gConfiguracoesEdit')            
            
        );
        
        $permissoes = serialize($permissoes);
        $usuario = $this->session->userdata('usuario');
        $dataAlterado = date("Y-m-d H:i:s");
        
        $data = array(
            'permissao' => $permissao,
            'permissoes' => $permissoes,
            'usuario' => $usuario,
            'dataAlterado' => $dataAlterado
        );
        
        if ($this->Permissoes_model->editar('permissoes', $data, 'idPermissao', $idPermissao) == TRUE) {
            $this->session->set_flashdata('success', 'Permissão editada com sucesso!');
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
        
        redirect(base_url('Permissoes'));
        
    }
    
    
    public function verificaPermissao() {
        
        $permissao = $this->input->get("permissaoCad");
        
        if($permissao == null){
            
            echo 'true';

    	}
    	else{

    		$result = $this->Permissoes_model->buscaPermissaoPorNome($permissao);
    		if(count($result) > 0 ){
                    
    			echo 'false';
    		}
    		else{
                        echo 'true';
    		}
    		
    	}
    		
        
    }
    
    public function excluir() {
        
        $id =  $this->input->post('id');
        
        if ($id == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir Permissao.');            

        }
        else{
            
            $result = $this->Permissoes_model->buscaUsuariosPorId($id);
            
            if(count($result) > 0 ){
                
                $this->session->set_flashdata('error','Não é possível excluir a Permissão, pois existe usuários associados, Tenha certeza de editá-los ou excluí-los antes.');
                redirect(base_url('Permissoes'));
                
            }
                        
            
            if ($this->Permissoes_model->deletar('permissoes', 'idPermissao', $id) == TRUE) {
                $this->session->set_flashdata('success', 'Permissão excluída com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
        redirect(base_url('Permissoes'));        

        
    }
    

}