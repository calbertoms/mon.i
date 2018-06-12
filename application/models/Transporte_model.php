<?php
class Transporte_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function buscaTransportes($limit,$start,$adm = false){
        if(!$adm){
            $query = 'SELECT * FROM transportes WHERE status = 1  ORDER BY idTransporte ASC LIMIT ? OFFSET ? ';
        }else{
            $query = 'SELECT * FROM transportes ORDER BY idTransporte ASC LIMIT ? OFFSET ? ';
        }
                                      
        return $this->db->query($query, array($limit,$start))->result();
        
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