<?php
class Monitor_model extends CI_Model {

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
    
    public function buscaMonitor($mac) {
        
        $query = 'Select * from monitorinteligente WHERE mac = ? ';
                                      
        return $this->db->query($query, array($mac))->row();
        
    }
    
    public function buscaMonitorores() {
        
        $query = 'Select * from monitorinteligente order by nome';
                                      
        return $this->db->query($query, array())->result();
        
    }
    
    public function buscaleiturasMonitorPorPeriodo($id,$dataDe,$dataPara) {
        
        $query = 'Select t1.*,t2.* from monitorinteligente t1 inner join leitura t2 on (t1.idMonitor = t2.idMonitor) WHERE t1.idMonitor = ? AND t2.dataHora >=? AND dataHora <=? order by dataHora ';
                                      
        return $this->db->query($query, array($id,$dataDe,$dataPara))->result();
        
    }
    
    
}