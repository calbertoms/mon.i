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
class Usuario {
    //put your code here
    
    private $id;
    private $nomeCompleto;
    private $email;
    private $usuario;
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

    public function setSenha($senha) {
        $this->senha = $senha;
    }
    
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }
    
    public function setPermissao($permissao) {
        $this->permissao = $permissao;
    }
    
    public function setdataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }
   
    public function setdataAlterado($dataAlterado) {
        $this->dataAlterado = $dataAlterado;
    }    
    
    public function cadastrar() {
        
                
        $nomeCompleto = $this->getNomeCompleto();
        $usuario = $this->getUsuario();
        $email = $this->getEmail();
        $permissao = $this->getPermissao();
        $senha = $this->getSenha();
        $situacao = $this->getSituacao();
        
        $cadastro = date('Y-m-d H:i:s');
        $alterado = date('Y-m-d H:i:s');
        
        $data = array(
            
            'idPermissao' => $permissao,
            'nomeCompleto' => $nomeCompleto,
            'usuario'  => $usuario,
            'email'   => $email,
            'senha'     => $senha,
            'situacao'       => $situacao,
            'dataCadastro'  => $cadastro,
            'dataAlterado'=> $alterado
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
        $email = $this->getEmail();
        $permissao = $this->getPermissao();
        $senha = $this->getSenha();
        $situacao = $this->getSituacao();
        
        $alterado = date('Y-m-d H:i:s');
        
        if($senha != ''){
        
        $data = array(
            'idPermissao' => $permissao,
            'nomeCompleto'=> $nomeCompleto,
            'usuario'     => $usuario,
            'email'       => $email,
            'senha'       => $senha,
            'situacao'    => $situacao,
            'dataAlterado'=> $alterado
        );
        }
        else
        {
            $data = array(
            'idPermissao' => $permissao,
            'nomeCompleto'=> $nomeCompleto,
            'usuario'      => $usuario,
            'email'        => $email,
            'situacao'    => $situacao,
            'dataAlterado'=> $alterado
        );
        }

       if ($this->model->editar('usuario', $data,'idUsuario',$id)) {
  
            $result = TRUE;
     
        } else {
 
            $result = FALSE;
           
        }
        
        return $result;
        
    }

    public function visualizar() {
        
    }

    public function logar() {
        
    }

    public function deslogar() {
        
    }

     public function buscaUsuario(){
        
        //pega os dados passados por parametros via post ajax
        $id =$this->getId();
        
        //verifica se algum veio nulo, caso aconteça sai da função retornando nulo
        if($id == null){
            
            $json = array('result'=>  false);
            echo json_encode($json);

    	}
        
    	else{

            $result = $this->model->buscaUsuarioPorId($id);
            
            if(count($result) > 0 ){
                
                
                $json = array('result'=>  TRUE,
                              'permissao'=> $result->idPermissao,
                              'nomeCompleto' => $result->nomeCompleto,
                              'usuario'=> $result->usuario,
                              'email'=> $result->email, 
                              'situacao'=> $result->situacao);
                $dados = json_encode($json);


            }
            
            else{
                
                $json = array('result'=>  false);
                $dados = json_encode($json);
                
            }
            
            return $dados;
    	}
        
        
    }

}
