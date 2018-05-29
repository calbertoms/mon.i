<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/MonitorInteligente.php');
require_once(APPPATH . 'entidades/Usuario.php');

class Principal_ctrl extends CI_Controller {

    private $model;
    private $model2;

    public function __construct() {
        parent::__construct();

        $this->data['menuprincipal'] = 'principal';
        $this->load->model('Monitor_model', 'monitor', TRUE);
        $this->load->model('Usuario_model', 'usuario', TRUE);
        $this->model = $this->monitor;
        $this->model2 = $this->usuario;
    }

    public function index() {

        if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {

            redirect('Principal_ctrl/login');
        }

        $monitor = new MonitorInteligente($this->model);

        $this->data['monitor'] = $monitor->buscaMonitores();
        $this->data['view'] = 'graficos/graficos_view';
        $this->load->view('principal/tema_view', $this->data);
    }

    public function login() {

        $this->load->view('principal/login_view');
    }

    public function verificarLogin() {

        $this->load->library('encrypt');

        $usuario = new Usuario($this->model2);

        $usuario->setEmail($this->input->post('useremail'));
        $usuario->setUsuario($this->input->post('useremail'));
        $usuario->setSenha($this->encrypt->hash($this->input->post('password')));

        $result = $usuario->verificarLoginClass();

        if (count($result) > 0) {
            $this->session->set_userdata($result);
            echo json_encode(TRUE);
        } else {
            echo json_encode(FALSE);
        }
    }

    public function sair() {

        $this->session->sess_destroy();
        redirect('Principal_ctrl/login');
    }

    //metodo usado para alterar a senha
    public function alterarSenha() {
        if ((!$this->session->userdata('id')) || (!$this->session->userdata('logado'))) {
            redirect('Principal/login_view');
        }

        $this->load->library('encrypt');

        $url = $this->input->post('url');
        $oldSenha = $this->encrypt->hash($this->input->post('oldSenha'));
        $senha = $this->encrypt->hash($this->input->post('novaSenha'));
        $result = $this->Principal_model->alterarSenha($senha, $oldSenha, $this->session->userdata('id'));

        if ($result) {
            $this->session->set_flashdata('success', 'Senha Alterada com sucesso!');
            redirect($url);
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar alterar a senha!');
            redirect($url);
        }
    }

    public function geraGrafico() {

        $id = $this->input->post('monitor');
        $tipo = $this->input->post('tipoGrafico');
        $dataDe = $this->input->post('dataDe');
        $dataPara = $this->input->post('dataPara');

        $monitor = new MonitorInteligente($this->model);
        $result = $monitor->buscaleiturasMonitorPorPeriodo($id, $dataDe, $dataPara);

        if (count($result) > 0) {

            switch ($tipo) {

                case 0:

                    $data = array('labels' => [], 'dados' => []);

                    foreach ($result as $dado) {

                        array_push($data['labels'], utf8_encode(date('d/m/Y H:i:s', strtotime($dado->dataHora))));
                        array_push($data['dados'], $dado->nivel);
                    }

                    break;
            }

            echo json_encode($data);
        } else {
            $data = array('labels' => [], 'dados' => []);
            echo json_encode($data);
        }
    }

}
