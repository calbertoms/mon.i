<?php
class Usuario_model extends CI_Model {

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
	
    function count($table){
        return $this->db->count_all($table);
    }
    
    public function buscaPermissoes() {
        
        $query = 'Select * from permissoes ORDER BY idPermissao ';
                                      
        return $this->db->query($query, array())->result();
        
    }
    
    public function buscaUsuarios($limit,$start){
        
        $query = 'Select t1.*,t2.permissao from usuario t1, permissoes t2 WHERE t1.idPermissao = t2.idPermissao ORDER BY t1.idUsuario ASC LIMIT ? OFFSET ? ';
                                      
        return $this->db->query($query, array($limit,$start))->result();
        
    }
    
    public function buscaUsuarioPorId($id) {
        
        $query = 'Select * from usuario WHERE idUsuario = ? LIMIT 1 ';
                                      
        return $this->db->query($query, array($id))->row();
        
    }
}