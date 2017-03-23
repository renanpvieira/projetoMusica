<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

    public function __construct()
    {
           parent::__construct();
    }
    
    public function insereCliente($dados){
        $this->db->insert('cliente', $dados);
        if($this->db->affected_rows() == 1){
         return $this->db->insert_id();
       }else{
         return 0; 
       }
    }



}
