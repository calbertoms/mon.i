<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Suporte
 */
require_once(APPPATH . 'entidades/Permissoes.php');

class Usuario {

    private $id;
    private $nomeCompleto;
    private $email;
    private $usuario;
    private $telefone;
    private $cpf;
    private $rg;
    private $senha;
    private $tipo;
    private $situacao;
    private $permissao;
    private $dataCadastro;
    private $dataAlterado;
    
    private $model;

    public function __construct($model) {

        $this->model = $model;
    }

    public function getId() {
        return $this->id;
    }

    public function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getTelefone() {
        return $this->telefone;
    }
    
    public function getCpf() {
        return $this->cpf;
    }
    
    public function getRg() {
        return $this->rg;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function getPermissao() {
        return $this->permissao;
    }

    public function getdataCadastro() {
        return $this->dataCadastro;
    }

    public function getdataAlterado() {
        return $this->dataAlterado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    
    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    public function setPermissao(Permissoes $permissao) {
        $this->permissao = $permissao;
    }

    public function setdataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setdataAlterado($dataAlterado) {
        $this->dataAlterado = $dataAlterado;
    }

    public function cadastrarClass() {

        $nomeCompleto = $this->getNomeCompleto();
        $usuario = $this->getUsuario();
        $telefone = $this->getTelefone();
        $cpf = $this->getCpf();
        $rg = $this->getRg();
        $email = $this->getEmail();
        $permissao = $this->getPermissao()->getIdPermissao();
        $senha = $this->getSenha();
        $situacao = $this->getSituacao();
        $cadastro = $this->getdataCadastro();
        $alterado = $this->getdataAlterado();
        
        $data = array(
            'idPermissao' => $permissao,
            'nomeCompleto' => $nomeCompleto,
            'usuario' => $usuario,
            'telefone' => $telefone,
            'cpf' => $cpf,
            'rg' => $rg,
            'email' => $email,
            'senha' => $senha,
            'situacao' => $situacao,
            'dataCadastro' => $cadastro,
            'dataAlterado' => $alterado
        );

        if ($this->model->adicionar('usuario', $data) == TRUE) {

            $result = TRUE;
        } else {

            $result = FALSE;
        }

        return $result;
    }

    public function editarClass() {

        $id = $this->getId();
        $nomeCompleto = $this->getNomeCompleto();
        $usuario = $this->getUsuario();
        $telefone = $this->getTelefone();
        $cpf = $this->getCpf();
        $rg = $this->getRg();
        $email = $this->getEmail();
        $permissao = $this->getPermissao()->getIdPermissao();
        $senha = $this->getSenha();
        $situacao = $this->getSituacao();
        $alterado = date('Y-m-d H:i:s');

        if ($senha != '') {

            $data = array(
                'idPermissao' => $permissao,
                'nomeCompleto' => $nomeCompleto,
                'usuario' => $usuario,
                'telefone' => $telefone,
                'cpf' => $cpf,
                'rg' => $rg,
                'email' => $email,
                'senha' => $senha,
                'situacao' => $situacao,
                'dataAlterado' => $alterado
            );
        } else {
            $data = array(
                'idPermissao' => $permissao,
                'nomeCompleto' => $nomeCompleto,
                'usuario' => $usuario,
                'telefone' => $telefone,
                'cpf' => $cpf,
                'rg' => $rg,
                'email' => $email,
                'situacao' => $situacao,
                'dataAlterado' => $alterado
            );
        }

        if ($this->model->editar('usuario', $data, 'idUsuario', $id)) {

            $result = TRUE;
        } else {

            $result = FALSE;
        }

        return $result;
    }
    
    public function alterarSenha(){
        $data = array('senha'=> $this->getSenha());
        
        if($this->model->editar('usuario',$data,'idUsuario', $this->getId())){
            $result = TRUE;
        }else{
            $result = FALSE;
        }
        return $result;
    }

    public function buscaUsuarioClass() {

        $result = $this->model->buscaUsuarioPorId($this->getId());
        
        $permissao = new Permissoes($this->model);
        $permissao->setIdPermissao($result->idPermissao);
        
        $this->setPermissao($permissao);
        $this->setNomeCompleto($result->nomeCompleto);
        $this->setUsuario($result->usuario);
        $this->setTelefone($result->telefone);
        $this->setCpf($result->cpf);
        $this->setRg($result->rg);
        $this->setEmail($result->email);
        $this->setSituacao($result->situacao);
    }

    public function logarClass() {
        
    }

    public function deslogarClass() {
        
    }

    public function verificarLoginClass() {

        $email = $this->getEmail();
        $usuario = $this->getUsuario();
        $senha = $this->getSenha();

        $logando = $this->model->usuarioSenha($usuario, $senha);
        
        if (count($logando) > 0) {
            $dados = array('usuario' => $logando->usuario, 'email' => $logando->email, 'id' => $logando->idUsuario, 'permissao' => $logando->idPermissao, 'logado' => TRUE);
      
        } else {
            
            $logando = $this->model->usuarioSenha($email, $senha);
            
            if (count($logando) > 0) {
                $dados = array('usuario' => $logando->usuario, 'email' => $logando->email, 'id' => $logando->idUsuario, 'permissao' => $logando->idPermissao, 'logado' => TRUE);
    
            } else {
                $dados = NULL;
             
            }
            
        }
         return $dados;
    }

    
    //delete virtual
    public function deletarUsuarioClass() {

        $id = $this->getId();
        $alterado = date('Y-m-d H:i:s');


        $data = array(
            'situacao' => FALSE,
            'dataAlterado' => $alterado
        );

        if ($this->model->editar('usuario', $data, 'idUsuario', $id)) {

            $result = TRUE;
        } else {

            $result = FALSE;
        }

        return $result;
    }

}
