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
    
    public function lastIdUsuario(){
        $query = 'SELECT * FROM recargas ORDER BY idRecarga DESC LIMIT 1';
        return $this->db->query($query)->row();
    }


    public function buscaMonitor($mac) {
        
        $query = 'SELECT * FROM monitorinteligente WHERE mac = ? ';
                                      
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
    
    public function buscaUltimaLeitura($mac){
        
        $query = 'SELECT t1.*, t2.mac FROM leitura AS t1 INNER JOIN monitorinteligente AS t2 ON (t1.idMonitor = t2.idMonitor) WHERE t2.mac = ? ORDER BY t1.idLeitura DESC LIMIT 1';
        
         return $this->db->query($query, array($mac))->row();
        
    }
    
    public function buscaRecargaFinalizadaPorMedidor($mac){
        
        $query = 'SELECT t1.*, t2.idRecarga FROM monitorinteligente AS t1 INNER JOIN recargas AS t2 ON (t1.idMonitor = t2.idMonitor) WHERE t1.mac = ? AND t2.situacaoRecarga != 2';
        
        return $this->db->query($query, array($mac))->row();
    }    
    
    public function buscaTransporteDisponivelPorTipo($tipo){
        $query = 'SELECT * FROM transportes WHERE disponibilidade = 0 AND tipo = ?';
        return $this->db->query($query, array($tipo))->result();
    }

    public function buscaFornecedorCliente($tipo, $monitor){
        $query = '';
        switch ($tipo) {
            case 0:
                
                $query = 'SELECT t2.idFornecedor, t3.idCliente FROM tanquesgasosos AS t1 '
                    . 'INNER JOIN fornecedores AS t2 ON (t1.idFornecedor = t2.idFornecedor) '
                    . 'INNER JOIN clientes AS t3 ON (t1.idCliente = t3.idCliente) '
                    . 'WHERE t1.idMonitor = ?';
                
                break;            
            case 1:
                
                $query = 'SELECT t2.idFornecedor, t3.idCliente FROM tanquesliquidos AS t1 '
                    . 'INNER JOIN fornecedores AS t2 ON (t1.idFornecedor = t2.idFornecedor) '
                    . 'INNER JOIN clientes AS t3 ON (t1.idCliente = t3.idCliente) '
                    . 'WHERE t1.idMonitor = ?';
                
                break;
            case 2:
                
                $query = 'SELECT t2.idFornecedor, t3.idCliente FROM tanquessolidos AS t1 '
                    . 'INNER JOIN fornecedores AS t2 ON (t1.idFornecedor = t2.idFornecedor) '
                    . 'INNER JOIN clientes AS t3 ON (t1.idCliente = t3.idCliente) '
                    . 'WHERE t1.idMonitor = ?';
                
                break;
        }
        return $this->db->query($query, array($monitor))->row();
    }
    
    public function listaTransporteIndisponivelPorRecarga($recarga){
        $query = 'SELECT t1.idTransporte FROM transportes AS t1 INNER JOIN recargatransporte AS t2 ON (t1.idTransporte = t2.idTransporte) WHERE t2.idRecarga = ?';
        return $this->db->query($query, array($recarga))->result();    
    }
    
    public function finalizaRecarga($idRecarga){
        $query = 'UPDATE recargas SET situacaoRecarga = 2 WHERE idRecarga = ?';
        return $this->db->query($query, array($idRecarga));
    }
    
    public function liberaTransportePorId($idTransporte){
        $query = 'UPDATE transportes SET disponibilidade = 0 WHERE idTransporte = ?';
        return $this->db->query($query, array($idTransporte));
    }
}