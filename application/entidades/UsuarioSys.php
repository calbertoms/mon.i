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

    public function deletar() {
        
    }

    public function logar() {
        
    }

    public function validar() {
        
    }

    public function deslogar() {
        
    }

}
