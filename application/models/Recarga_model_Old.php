<?php
class Recarga_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function adicionar($table,$data,$returnId = false){
        if ($this->db->insert($table, $data)) {
            if($returnId == true){
                return $this->db->insert_id($table);
            }
            return TRUE;
        }
        return FALSE;  
    }
    
    public function editar($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        if ($this->db->update($table, $data)){
           return TRUE; 
        }
        return FALSE;
     
    }
    
    public function deletar($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        if($this->db->delete($table)) {

        return TRUE;
        }
		
        return FALSE;        
    }   
	
    public function count($table){
        return $this->db->count_all($table);
    }
    
    public function listaRecargas(){
        $query = 'SELECT t2.nomeFantasia AS fornecedor, t3.nomeFantasia AS cliente, t4.nome, t1.* FROM recargas AS t1 '
                . 'INNER JOIN fornecedores AS t2 ON (t1.idFornecedor = t2.idFornecedor) '
                . 'INNER JOIN clientes AS t3 ON (t1.idCliente = t3.idCliente) '
                . 'INNER JOIN monitorinteligente AS t4 ON (t1.idMonitor = t4.idMonitor)';
        return $this->db->query($query)->result();
    }
    
}