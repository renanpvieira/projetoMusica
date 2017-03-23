<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

    public function __construct()
    {
         parent::__construct();

         $this->paginaSegura();

         $this->load->helper('form');
         $this->load->model('Usuario_model', 'usuario');
       
    }
    

    public function banda($usuarioid)
	{
         $this->verificaUsuario($usuarioid);
         echo 'foi';
      


    }


    public function contratante($usuarioid)
	{
      $this->verificaUsuario($usuarioid);
      echo $usuarioid . ' contratante';


    }

   
}
