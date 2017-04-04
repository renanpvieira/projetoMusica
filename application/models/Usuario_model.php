<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct()
    {
           parent::__construct();
    }
    
    public function getUsuario($id){
       return $this->db->get_where('usuario', array('UsuarioId' => $id))->result_array();
    }


    public function VerificaUsuario($login){
       return $this->db->get_where('usuario', array('login' => $login))->result_array();
    }
    
    public function VerificaChaveUsuario($chave){
       return $this->db->get_where('recupera_senha', array('Chave' => $chave))->result_array();
    }
    
    public function DeleteChaveUsuario($chave, $id){
       $this->db->delete('recupera_senha', array('Chave'=> $chave, 'UsuarioId' => $id));
    }
    
    public function getRecupera($id){
        $time = time() - 10800;
        return $this->db->get_where('recupera_senha', array('UsuarioId' => $id, 'DataHora >' => $time))->result_array();
    }
    
    /*public function VerificaRecupera($login){
       return $this->db->get_where('usuario', array('login' => $login))->result_array();
    }*/
    
    public function insereRecupera($dados){
        $this->db->insert('recupera_senha', $dados);
        if($this->db->affected_rows() == 1){
         return $this->db->insert_id();
       }else{
         return 0; 
       }
    }
    
    
      

    public function insereUsuario($dados){
        $this->db->insert('usuario', $dados);
        if($this->db->affected_rows() == 1){
         return $this->db->insert_id();
       }else{
         return 0; 
       }
    }
    
    public function atualizaUsuario($dados, $usuarioid){
        date_default_timezone_set('America/Sao_Paulo');
        $dados['Atualizacao'] = date('Y-m-d H:i:s', time());
        $this->db->where('usuarioid', $usuarioid)->update('usuario', $dados);
        return $this->db->affected_rows();
    }

    public function deletaUsuario($usuarioid){
       $this->db->delete('usuario', array('UsuarioId' => $usuarioid));
    }
    
    public function atualizaSenhaUsuario($novasenha, $usuarioid){
       date_default_timezone_set('America/Sao_Paulo');
       $dados['Atualizacao'] = date('Y-m-d H:i:s', time());
       $dados['Senha'] = $novasenha;
       $this->db->where('usuarioid', $usuarioid)->update('usuario', $dados);
       return $this->db->affected_rows();
    }


    


    
    
	 


}
