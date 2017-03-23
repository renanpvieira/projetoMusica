<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estilo_model extends CI_Model {

    public function __construct()
    {
           parent::__construct();
    }
    
	 public function lstEstilos()
     {
         return $this->db->get('estilo')->result_array();
     }


}
