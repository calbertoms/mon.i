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
    
    public function usuarioSenha($user, $password) {
        $this->db->select('t1.*,t2.permissao');
        $this->db->from('usuario t1');
        $this->db->join('permissoes t2', 't1.idPermissao = t2.idPermissao', 'inner');
        $this->db->where('t1.usuario', $user);
        $this->db->where('t1.senha', $password);
        $this->db->where('t1.situacao', 1);
        $this->db->limit(1);
        
        $usuario = $this->db->get()->row();
        return $usuario;
    }
    
    public function emailSenha($email, $password) {
        $this->db->select('t1.*,t2.permissao');
        $this->db->from('usuario t1');
        $this->db->join('permissoes t2', 't1.idPermissao = t2.idPermissao', 'inner');
        $this->db->where('t1.email', $email);
        $this->db->where('t1.senha', $password);
        $this->db->where('t1.situacao', 1);
        $this->db->limit(1);
        
        $usuario = $this->db->get()->row();
        return $usuario;
    }
    
    public function alterarSenha($senha,$oldSenha,$id){

        $this->db->where('idUsuario', $id);
        $this->db->limit(1);
        $usuario = $this->db->get('usuario')->row();

        if($usuario->senha != $oldSenha){
            return false;
        }
        else{
            $this->db->set('senha',$senha);
            $this->db->where('idUsuario',$id);
            return $this->db->update('usuario');    
        }       
    }
    
}