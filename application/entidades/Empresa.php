<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empresa
 *
 * @author Suporte
 */
abstract class Empresa {
    
    /**
     *ATRIBUTOS
     */
    
    protected $id;
    protected $nome;
    protected $nomeFantasia;
    protected $cnpj;
    protected $email;
    protected $telefone;
    protected $inscEstadual;
    protected $contatoEmail;
    protected $contatoNome;
    protected $contatoTel;

    //geters e settes
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getInscEstadual() {
        return $this->inscEstadual;
    }

    public function getContatoEmail() {
        return $this->contatoEmail;
    }

    public function getContatoNome() {
        return $this->contatoNome;
    }

    public function getContatoTel() {
        return $this->contatoTel;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setNomeFantasia($nomeFantasia) {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setInscEstadual($inscEstadual) {
        $this->inscEstadual = $inscEstadual;
    }

    public function setContatoEmail($contatoEmail) {
        $this->contatoEmail = $contatoEmail;
    }

    public function setContatoNome($contatoNome) {
        $this->contatoNome = $contatoNome;
    }

    public function setContatoTel($contatoTel) {
        $this->contatoTel = $contatoTel;
    }

    
        
    /**
     * METODOS
     */
    
    public function cadastrar(){
    ;    
    }
     
    public function editar(){
    ;
    }

    public function desativar(){
    ;   
    }
    
    public function visualizar(){
    ;    
    }
    
    public function deletar() {
    ;    
    }
    
}