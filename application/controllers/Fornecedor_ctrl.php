<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/Fornecedores.php');
require_once(APPPATH . 'entidades/Clientes.php');
require_once(APPPATH . 'entidades/Usuario.php');
require_once(APPPATH . 'entidades/FornecedoresClientes.php');

class Fornecedor_ctrl extends CI_Controller {
    //atributo
    
    private $model;
    
    public function __construct() {
        
        parent::__construct();
        
         if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {

            redirect('Principal_ctrl/login');
        }
       
        $this->data['menuprincipal'] = 'principal';
        $this->load->model('Empresa_model','',TRUE);
        //$this->load->model('Usuario_model','',TRUE);
        $this->model = $this->Empresa_model;
        
    }

    public function index(){
        
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'gFornecedores') || !$this->permission->checkPermission($this->session->userdata('permissao'),'gAdministradores') ){
            $this->session->set_flashdata('error','Você não tem permissao para visualizar permissões!');
            redirect(base_url());
        }
        
         $this->gerenciar();
            
    }

    public function gerenciar() {
                
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('Empresa/gerenciar');
        $config['total_rows'] = $this->Empresa_model->count('permissoes');
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
       
        $this->data['fornecedores'] = $this->Empresa_model->buscaFornecedores($limit,$start);        
        
        $this->data['clientes'] = $this->Empresa_model->getDataTable('clientes','idEmpresa, nome, cnpj','idEmpresa');
        
        $this->data['usuarios'] = $this->Empresa_model->buscaUsuarios();
        

        $this->data['view'] = 'empresas/fornecedores_view';  
        
        $this->load->view('principal/tema_view',  $this->data);
        
    }   
    
    public function editarLista(){
           
           $clientes = $this->input->post('clienteLista');
           $qtdClientes = count($clientes);
            
           $fornecedor = new Fornecedores($this->model);
           $fornecedor->setIdEmpresa($this->input->post('idFornecedorLista'));           
           
           
           for($i = 0; $i < $qtdClientes; $i++){
               $cliente[$i] = new Clientes($this->model);
               $cliente[$i]->setIdEmpresa($clientes[$i]);              
           }            
           
           $fornecedorClientes = new FornecedoresClientes($this->model);
           $fornecedorClientes->setIdFornecedor($fornecedor);  
           for($i = 0; $i < $qtdClientes; $i++){                               
               $fornecedorClientes->setIdCliente($cliente[$i]);
           }

           
           if($fornecedorClientes->cadastrarListaClienteClass() == TRUE){
            
             $this->session->set_flashdata('success', 'Lista de cliente(s) atualizada com sucesso!');
            
            }else{

                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
             
           
        redirect(base_url('Fornecedor_ctrl'));
           

    }

    public function buscaClientes(){
        $id = $this->input->post('idFornecedor');
        
        $clientes = $this->Empresa_model->getDataTable('clientes','idEmpresa, nome, cnpj','idEmpresa');
        $clientes_existentes = $this->Empresa_model->getDataTable('fornecedoresclientes','idCliente','idCliente','idFornecedor = '.$id);
        $select_cliente = '';

        if(count($clientes_existentes)>0){
            $i = 0;
            foreach ($clientes_existentes as $ce) {               
                $clienteCompara = $ce->idCliente;                    
                $select_cliente .= '<div id="clienteDinamico">';
                $select_cliente .=  '<div class="col-sm-8 col-md-8 col-lg-8">';
                $select_cliente .=      '<div class="form-group">';
                $select_cliente .=          '<label for="clienteLista[]">Clientes<span class="required" style="color: #EE0000">*</span>: </label>';
                $select_cliente .=          '<select id="clienteLista" class="form-control" name="clienteLista[]" title="Selecione o cliente">';
                $select_cliente .=              '<option value="">Selecione...</option>';
                                                foreach ($clientes as $c) {
                                                    if($c->idEmpresa == $clienteCompara){
                $select_cliente .=                  '<option selected value=' . $c->idEmpresa . '> cnpj: ' . $c->cnpj . ' - nome: '.$c->nome.'</option>';    
                                                    }else{
                $select_cliente .=                   '<option value=' . $c->idEmpresa . '> cnpj: ' . $c->cnpj . ' - nome: '.$c->nome.'</option>';                                        
                                                    }
                                                }
                $select_cliente .=          '</select>';                     
                $select_cliente .=      '</div>';
                $select_cliente .=  '</div>';                        
                $select_cliente .=  '<div class="col-sm-4 col-md-4 col-lg-4">';
                $select_cliente .=     '<div class="form-group">';
                $select_cliente .=          '<label for="addCliente"><br></label>';
                $select_cliente .=          '<br>';
                $select_cliente .=          '<button type="button" id="addCliente" class="btn btn-success" style="margin: 1px;"><i class="fa fa-fw fa-plus"></i></button>'; 
                if($i>0){
                    $select_cliente .=          '<button type="button" id="remCliente" class="btn btn-danger" style="margin: 1px;"><i class="fa fa-fw fa-minus"></i></button>';                
                }
                $select_cliente .=     '</div>';
                $select_cliente .=  '</div>';
                $select_cliente.= '</div>';
                $i++;
            }
        }else{
            $select_cliente .= '<div id="clienteDinamico">';
            $select_cliente .=  '<div class="col-sm-8 col-md-8 col-lg-8">';
            $select_cliente .=      '<div class="form-group">';
            $select_cliente .=          '<label for="clienteLista[]">Clientes<span class="required" style="color: #EE0000">*</span>: </label>';
            $select_cliente .=          '<select id="clienteLista" class="form-control" name="clienteLista[]" title="Selecione o cliente">';
            $select_cliente .=              '<option value="">Selecione...</option>';
                                            foreach ($clientes as $c) {
            $select_cliente .=                  '<option value=' . $c->idEmpresa . '> cnpj: ' . $c->cnpj . ' - nome: '.$c->nome.'</option>';    
                                            }
            $select_cliente .=          '</select>';                     
            $select_cliente .=      '</div>';
            $select_cliente .=  '</div>';                        
            $select_cliente .=  '<div class="col-sm-4 col-md-4 col-lg-4">';
            $select_cliente .=     '<div class="form-group">';
            $select_cliente .=          '<label for="addCliente"><br></label>';
            $select_cliente .=          '<br>';
            $select_cliente .=          '<button type="button" id="addCliente" class="btn btn-success" style="margin: 1px;"><i class="fa fa-fw fa-plus"></i></button>';
            $select_cliente .=     '</div>';
            $select_cliente .=  '</div>';
            $select_cliente.= '</div>';
        }
        echo $select_cliente;

       
    }
    
    public function addClienteLista(){
       
        $clientes = $this->Empresa_model->getDataTable('clientes','idEmpresa, nome, cnpj','idEmpresa');
        
            $select_cliente = '';
            $select_cliente .= '<div id="clienteDinamico">';
            $select_cliente .=  '<div class="col-sm-8 col-md-8 col-lg-8">';
            $select_cliente .=      '<div class="form-group">';
            $select_cliente .=          '<label for="clienteLista[]">Clientes<span class="required" style="color: #EE0000">*</span>: </label>';
            $select_cliente .=          '<select id="clienteLista" class="form-control" name="clienteLista[]" title="Selecione o cliente">';
            $select_cliente .=              '<option value="">Selecione...</option>';
                                            foreach ($clientes as $c) {
            $select_cliente .=                  '<option value=' . $c->idEmpresa . '> cnpj: ' . $c->cnpj . ' - nome: '.$c->nome.'</option>';    
                                            }
            $select_cliente .=          '</select>';                     
            $select_cliente .=      '</div>';
            $select_cliente .=  '</div>';                        
            $select_cliente .=  '<div class="col-sm-4 col-md-4 col-lg-4">';
            $select_cliente .=     '<div class="form-group">';
            $select_cliente .=          '<label for="addCliente"><br></label>';
            $select_cliente .=          '<br>';
            $select_cliente .=          '<button type="button" id="addCliente" class="btn btn-success" style="margin: 1px;"><i class="fa fa-fw fa-plus"></i></button>';
            $select_cliente .=          '<button type="button" id="remCliente" class="btn btn-danger" style="margin: 1px;"><i class="fa fa-fw fa-minus"></i></button>';  
            $select_cliente .=     '</div>';
            $select_cliente .=  '</div>';
            $select_cliente.= '</div>';
            
            echo $select_cliente;
    }

    public function buscaFornecedor() {


        if (!empty($this->input->post('idFornecedor'))) {

            $fornecedor = new Fornecedores($this->model);

            $fornecedor->setIdEmpresa($this->input->post('idFornecedor'));

            $fornecedor->buscaEmpresaClass('fornecedores', 'idEmpresa');

            $dados = array('result' => TRUE,
                'nome' => $fornecedor->getNome(),
                'usuario' => $fornecedor->getUsuario(),
                'nomeFantasia' => $fornecedor->getNomeFantasia(),
                'cnpj' => $fornecedor->getCnpj(),
                'email' => $fornecedor->getEmail(),
                'telefone' => $fornecedor->getTelefone(),
                'inscEstadual' => $fornecedor->getInscEstadual(),
                'areaUtilm2' => $fornecedor->getAreaUtilm2(),
                'cep' => $fornecedor->getCep(),
                'numero' => $fornecedor->getNumero(),
                'logradouro' => $fornecedor->getLogradouro(),
                'complemento' => $fornecedor->getComplemento(),
                'uf' => $fornecedor->getUf(),
                'status' => $fornecedor->getStatus()
            );

            $result = json_encode($dados);
            
        } else {

            $dados = array('result' => FALSE);
            $result = json_encode($dados);
        }

        echo $result;
    }

    public function adicionar() {


        $fornecedor = new Fornecedores($this->model);
        $usuario = new Usuario($this->model);
        $usuario->setId($this->input->post('usuarioCad'));
        
        $fornecedor->setUsuario($usuario->getId());
        $fornecedor->setNome($this->input->post('nomeCad'));
        $fornecedor->setNomeFantasia($this->input->post('nomeFantasiaCad'));
        $fornecedor->setCnpj($this->input->post('cnpjCad'));
        $fornecedor->setEmail($this->input->post('emailCad'));
        $fornecedor->setTelefone($this->input->post('telefoneCad'));
        $fornecedor->setInscEstadual($this->input->post('inscEstadualCad'));
        $fornecedor->setAreaUtilm2($this->input->post('areaUtilm2Cad'));
        $fornecedor->setCep($this->input->post('cepCad'));
        $fornecedor->setNumero($this->input->post('numeroCad'));
        $fornecedor->setLogradouro($this->input->post('logradouroCad'));
        $fornecedor->setComplemento($this->input->post('complementoCad'));
        $fornecedor->setUf($this->input->post('ufCad'));  
        $fornecedor->setStatus($this->input->post('statusCad')); 
        $fornecedor->setDataCadastro(date("Y-m-d H:i:s"));
        $fornecedor->setDataAlterado(date("Y-m-d H:i:s"));


        if ($fornecedor->cadastrarClass('fornecedores') == TRUE) {

            $this->session->set_flashdata('success', 'Fornecedor adicionada com sucesso!');
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }

        redirect(base_url('Fornecedor_ctrl'));
    }

    public function editar() {


        $fornecedor = new Fornecedores($this->model);
        $usuario = new Usuario($this->model);
        $usuario->setId($this->input->post('usuarioEdit'));
        
        $fornecedor->setIdEmpresa($this->input->post('idFornecedor'));
        $fornecedor->setUsuario($usuario->getId());
        $fornecedor->setNome($this->input->post('nomeEdit'));
        $fornecedor->setNomeFantasia($this->input->post('nomeFantasiaEdit'));
        $fornecedor->setCnpj($this->input->post('cnpjEdit'));
        $fornecedor->setEmail($this->input->post('emailEdit'));
        $fornecedor->setTelefone($this->input->post('telefoneEdit'));
        $fornecedor->setInscEstadual($this->input->post('inscEstadualEdit'));
        $fornecedor->setAreaUtilm2($this->input->post('areaUtilm2Edit'));
        $fornecedor->setCep($this->input->post('cepEdit'));
        $fornecedor->setNumero($this->input->post('numeroEdit'));
        $fornecedor->setLogradouro($this->input->post('logradouroEdit'));
        $fornecedor->setComplemento($this->input->post('complementoEdit'));
        $fornecedor->setUf($this->input->post('ufEdit'));  
        $fornecedor->setStatus($this->input->post('statusEdit')); 
        $fornecedor->setDataAlterado(date("Y-m-d H:i:s"));


        if ($fornecedor->editarClass('fornecedores','idEmpresa') == TRUE) {

            $this->session->set_flashdata('success', 'Fornecedor alterado com sucesso!');
            
            
        } else {

            $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
        }
        
        redirect(base_url('Fornecedor_ctrl'));
    }


    //delete virtual
    public function excluir() {
        

        $fornecedor = new Fornecedores($this->model);
        $fornecedor->setIdEmpresa($this->input->post('id'));
        
        if ($fornecedor->getIdEmpresa() == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir Fornecedor.');            

        } else{
            
             if ($fornecedor->deletarEmpresaClass('fornecedores','idEmpresa') == TRUE) {
                
                $this->session->set_flashdata('success', 'Fornecedor excluído com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
         redirect(base_url('Fornecedor_ctrl'));        


    }
    
}
