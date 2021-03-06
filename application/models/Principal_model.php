<?php
class Principal_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    function adicionar($table,$data,$returnId = false){
        if ($this->db->insert($table, $data)) {
            if($returnId == true){
                return $this->db->insert_id($table);
            }
            return TRUE;
        }
        return FALSE;  
    }
    
    function editar($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        if ($this->db->update($table, $data)){
           return TRUE; 
        }
        return FALSE;
     
    }
    
    function deletar($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        if($this->db->delete($table)) {

        return TRUE;
        }
		
        return FALSE;        
    }   
    
    public function alterarSenha($senha,$oldSenha,$id){

        $this->db->where('idUsuario', $id);
        $this->db->limit(1);
        $usuario = $this->db->get('usuarios')->row();

        if($usuario->senha != $oldSenha){
            return false;
        }
        else{
            $this->db->set('senha',$senha);
            $this->db->where('idUsuario',$id);
            return $this->db->update('usuarios');    
        }       
    }
	
    function count($table){
        return $this->db->count_all($table);
    }
    
    
}