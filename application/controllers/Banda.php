<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('Banda_model', 'banda');
    }
    
   
    

    public function index()
    {
        /*
        $scripts = Array('banda.js');
        $this->SetScript($scripts);
        
        $banda = $this->banda->getBandaUsuario($this->getUsuarioId())[0];
        $this->SetDados('banda', $banda);
        $this->SetDados('estilos', $this->estilo->lstEstilos());
        $this->displaySiteAdmin("banda");
         * 
         */
    }


  

   
}
