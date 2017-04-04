<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato_model extends CI_Model {

    public function __construct()    {
           parent::__construct();
    }
    
     public function adicionaContato($dados)    
     {
         $this->db->insert('contato', $dados);
         return (($this->db->affected_rows() > 0) ? $this->db->insert_id() : 0);
     }


}
