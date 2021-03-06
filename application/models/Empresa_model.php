<?php
class Empresa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    function getDataTable($table,$fields,$order,$where=''){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by($order,'asc');
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result = $query->result();
        return $result;
    }
    
    public function buscaUsuarios() {
        
        $query = 'Select * from usuario ORDER BY idUsuario ';
                                      
        return $this->db->query($query, array())->result();
        
    }
    
    public function buscaClientes($limit,$start){
        
        $query = 'Select * from clientes ORDER BY idEmpresa ASC LIMIT ? OFFSET ? ';
                                      
        return $this->db->query($query, array($limit,$start))->result();
        
    }
    
    public function buscaClientePorId($id) {
        
        $query = 'Select * from clientes WHERE idEmpresa = ? ';
                                      
        return $this->db->query($query, array($id))->row();
        
    }
    
    public function buscaFornecedores($limit,$start){
        
        $query = 'Select * from fornecedores ORDER BY idEmpresa ASC LIMIT ? OFFSET ? ';
                                      
        return $this->db->query($query, array($limit,$start))->result();
        
    }
    
    public function buscaFornecedorPorId($id) {
        
        $query = 'Select * from fornecedores WHERE idEmpresa = ? ';
                                      
        return $this->db->query($query, array($id))->row();
        
    }
    
    public function buscaEmpresa($limit,$start){
        
        $query = 'Select * from fornecedores ORDER BY idEmpresa ASC LIMIT ? OFFSET ? ';
                                      
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