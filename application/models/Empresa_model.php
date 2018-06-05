<?php
class Empresa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function buscaPermissoes() {
        
        $query = 'Select * from permissoes ORDER BY idPermissao ';
                                      
        return $this->db->query($query, array())->result();
        
    }
    
     public function buscaUsuarios() {
        
        $query = 'Select * from usuario ORDER BY idUsuario ';
                                      
        return $this->db->query($query, array())->result();
        
    }
    
    public function buscaClientes($limit,$start){
        
        $query = 'Select * from clientes ORDER BY idCliente ASC LIMIT ? OFFSET ? ';
                                      
        return $this->db->query($query, array($limit,$start))->result();
        
    }
    
    public function buscaClientePorId($id) {
        
        $query = 'Select * from clientes WHERE idCliente = ? ';
                                      
        return $this->db->query($query, array($id))->row();
        
    }
    
    public function buscaFornecedores($limit,$start){
        
        $query = 'Select * from fornecedores ORDER BY idFornecedor ASC LIMIT ? OFFSET ? ';
                                      
        return $this->db->query($query, array($limit,$start))->result();
        
    }
    
    public function buscaFornecedorPorId($id) {
        
        $query = 'Select * from fornecedores WHERE idFornecedor = ? ';
                                      
        return $this->db->query($query, array($id))->row();
        
    }
    
    public function buscaEmpresa($limit,$start){
        
        $query = 'Select * from fornecedores ORDER BY idFornecedor ASC LIMIT ? OFFSET ? ';
                                      
        return $this->db->query($query, array($limit,$start))->result();
        
    }
    
    public function buscaEmpresaPorId($tb,$idTb,$id) {
        
        $query = "Select *"." ";
        $query .= "from ".$tb ." ";
        $query .= "WHERE ".$idTb ."=".$id." ";
        $query .= "LIMIT 1";
                             
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