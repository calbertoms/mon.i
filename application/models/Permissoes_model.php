<?php
class Permissoes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function buscaPermissoes($limit,$start){
        
        $query = 'Select * from permissoes ORDER BY idPermissao ASC LIMIT ? OFFSET ? ';
                                      
        return $this->db->query($query, array($limit,$start))->result();
        
    }
    
    public function buscaUsuariosPorId($id) {
        
        $query = 'Select * from usuario WHERE idUsuario = ? ';
                                      
        return $this->db->query($query, array($id))->row();
        
    }
    
    public function buscaPermissaoPorNome($permissao) {
        
        $query = 'Select * from permissoes WHERE permissao = ? ';
                                      
        return $this->db->query($query, array($permissao))->row();
        
    }
    
    public function buscaPermissaoPorId($id) {
        
        $query = 'Select * from permissoes WHERE idPermissao = ? ';
                                      
        return $this->db->query($query, array($id))->row();
        
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
    
    
}