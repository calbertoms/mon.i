<?php
class Tanque_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function buscaTanquesSolidos($limit,$start,$adm = false){
        if(!$adm){
            $query = 'Select * from tanquessolidos Where status = 1 ORDER BY idTanque ASC LIMIT ? OFFSET ? ';
        }else{
            $query = 'Select * from tanquessolidos ORDER BY idTanque ASC LIMIT ? OFFSET ? ';
        }                    
        return $this->db->query($query, array($limit,$start))->result();
        
    }
       
    public function buscaTanquesLiquidos($limit,$start,$adm = false){
        if(!$adm){
            $query = 'Select * from tanquesliquidos Where status = 1 ORDER BY idTanque ASC LIMIT ? OFFSET ? ';
        }else{
            $query = 'Select * from tanquesliquidos ORDER BY idTanque ASC LIMIT ? OFFSET ? ';
        }                              
        return $this->db->query($query, array($limit,$start))->result();
        
    }
    
    public function buscaTanquesGasosos($limit,$start,$adm = false){
        if(!$adm){
            $query = 'Select * from tanquesgasosos Where status = 1 ORDER BY idTanque ASC LIMIT ? OFFSET ? ';
        }else{
            $query = 'Select * from tanquesgasosos  ORDER BY idTanque ASC LIMIT ? OFFSET ? ';
        }
                                      
        return $this->db->query($query, array($limit,$start))->result();
        
    }
        
    public function buscaMonitor($limit,$start){
        
        $query = 'Select * from monitorinteligente ORDER BY id ASC LIMIT ? OFFSET ? ';
                                      
        return $this->db->query($query, array($limit,$start))->result();
        
    }
    
    public function buscaProduto($limit,$start){
        
        $query = 'Select * from produtos ORDER BY idProduto ASC LIMIT ? OFFSET ? ';
                                      
        return $this->db->query($query, array($limit,$start))->result();
        
    }
        
    public function buscaEmpresaPorId($tb,$idTb,$id) {
        
        $query = 'Select * from '.$tb.' WHERE '.$idTb. ' = ? LIMIT 1';  
        
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