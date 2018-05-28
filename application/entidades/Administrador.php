<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrador
 *
 * @author Suporte
 */
class Administrador extends Usuario {
    //put your code here
    
    
     public function cadastrar() {
        
    }
    
    public function desativar() {
        
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
}
