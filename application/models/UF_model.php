<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UF_model extends CI_Model {

    public function __construct()
    {
           parent::__construct();
    }
    
	 public function lstUFs()
     {
         return $this->db->get('UF')->result_array();
     }


}
