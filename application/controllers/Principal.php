<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/MonitorInteligente.php');

class Principal extends CI_Controller {

    private $model;
    
    public function __construct() {
        parent::__construct();
        
        $this->data['menuprincipal'] = 'principal';
        $this->load->model('Monitor_model','monitor',TRUE);
        $this->model = $this->monitor;
        
    }

    public function index(){
        
        //redirect('Principal/login');
        
        $monitor = new MonitorInteligente($this->model);
                
        $this->data['monitor'] = $monitor->buscaMonitores();
        $this->data['view'] = 'graficos/grafico';
        $this->load->view('principal/tema',  $this->data);
            
    }
    
    public  function login(){
        
        $this->load->view('principal/login');
        
    }
    
    public function verificarLogin() {
        
        $this->load->library('encrypt'); 

        $useremail = $this->input->post('useremail');
        $senha = $this->encrypt->hash($this->input->post('password'));

        $usuario = $this->Principal_model->usuarioSenha($useremail,$senha);

        if (count($usuario) > 0) {
            $dados = array('usuario' => $usuario->usuario, 'email' => $usuario->email, 'id' => $usuario->idUsuario, 'permissao' => $usuario->idPermissao, 'logado' => TRUE);
            $this->session->set_userdata($dados);

            $json = array('result' => true);
            echo json_encode($json);

        } else {
            
            $usuario = $this->Principal_model->emailSenha($useremail,$senha);
            
            if (count($usuario) > 0) {
                $dados = array('usuario' => $usuario->usuario, 'email' => $usuario->email, 'id' => $usuario->idUsuario, 'permissao' => $usuario->idPermissao, 'logado' => TRUE);
                $this->session->set_userdata($dados);

                $json = array('result' => true);
                echo json_encode($json);

            }
            else{
               
                $json = array('result' => false);
                echo json_encode($json);
                
            }
                
        }
        
    }
    
    public function sair() {
        $this->session->sess_destroy();
        redirect('Principal/login');
    }
    
    //metodo usado para alterar a senha
    public function alterarSenha() {
        if((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))){
            redirect('Principal/login');
        }
        
        $this->load->library('encrypt'); 
        
        $url = $this->input->post('url');
        $oldSenha = $this->encrypt->hash($this->input->post('oldSenha'));
        $senha = $this->encrypt->hash($this->input->post('novaSenha'));
        $result = $this->Principal_model->alterarSenha($senha,$oldSenha,$this->session->userdata('id'));
        
        if($result){
            $this->session->set_flashdata('success','Senha Alterada com sucesso!');
            redirect($url);
        }
        else{
            $this->session->set_flashdata('error','Ocorreu um erro ao tentar alterar a senha!');
            redirect($url);
            
        }
        
    }
    
    
    public function geraGrafico(){
        
        $id = $this->input->post('monitor');
        $tipo = $this->input->post('tipoGrafico');
        $dataDe = $this->input->post('dataDe');
        $dataPara = $this->input->post('dataPara');
        
        $monitor = new MonitorInteligente($this->model);
        $result = $monitor->buscaleiturasMonitorPorPeriodo($id, $dataDe, $dataPara);
        
        if (count($result) > 0) {
        
            switch ($tipo) {
                
                case 0:

                    $data= array('labels' => [], 'dados' => []);
                    
                    foreach ($result as $dado) {
                    
	                    array_push($data['labels'], utf8_encode(date('d/m/Y H:i:s',strtotime($dado->dataHora))));
	                    array_push($data['dados'], $dado->nivel);
                    
                    }
                    
                    break;
                    
            }
            
            echo json_encode($data);
            
        }
        else {
            $data= array('labels' => [], 'dados' => []);
            echo json_encode($data);
        }
        
    }

        
}
