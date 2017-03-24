<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct()
    {
           parent::__construct();
    }


    public function VerificaUsuario($login){
       return $this->db->get_where('usuario', array('login' => $login))->result_array();
    }
      

    public function insereUsuario($dados){
        $this->db->insert('usuario', $dados);
        if($this->db->affected_rows() == 1){
         return $this->db->insert_id();
       }else{
         return 0; 
       }
    }

    public function deletaUsuario($usuarioid){
       $this->db->delete('usuario', array('UsuarioId' => $usuarioid));
    }


    


    
    
	 


}