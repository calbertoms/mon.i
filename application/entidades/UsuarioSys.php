<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioSys
 *
 * @author Suporte
 */
final class UsuarioSys {
    
    
    private $id;
    private $nome;
    private $email;
    private $usuario;
    private $senha;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
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

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
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
    
     /**
     * METODOS
     */

    public function cadastrar() {
        
    }

    public function editar() {
        
    }

    public function desativar() {
        
    }

    public function visualizar() {
        
    }

    public function excluir($p_id) {
        
        
        $id = $this->setId($p_id);
        
        if ($id == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir Permissao.');            

        }
        else{
            
            if ($id == 1){
                $this->session->set_flashdata('error','Não é possível excluir esse Usuário.');
                redirect(base_url('Usuarios'));
            }
                        
            
            if ($this->Usuarios_model->deletar('usuarios', 'idUsuario', $id) == TRUE) {
                $this->session->set_flashdata('success', 'Usuário excluído com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro, favor contatar suporte técnico.');
            }
            
        }
     
        redirect(base_url('Usuarios'));        

    }

    public function logar() {
        
    }

    public function validar() {
        
    }

    public function deslogar() {
        
    }

}
