<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade_model extends CI_Model {

    public function __construct()
    {
           parent::__construct();
    }
    
	 public function lstCidades($uf)
     {
         return $this->db->get('Cidade')->result_array();
     }


}
