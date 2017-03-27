<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->paginaSegura();

         $this->load->helper('form');
         $this->load->model('Banda_model', 'banda');
         $this->load->model('UF_model', 'uf');
         $this->load->model('Estilo_model', 'estilo');
    }
    
   
    

    public function banda()
    {
        $scripts = Array('banda.js');
        $this->SetScript($scripts);
        
        $banda = $this->banda->getBandaUsuario($this->getUsuarioId())[0];
        $this->SetDados('banda', $banda);
        $this->SetDados('estilos', $this->estilo->lstEstilos());
        $this->displaySiteAdmin("banda");
    }


    public function contratante()
	{

      echo $usuarioid . ' contratante';


    }
    
    public function sair(){
        $this->deslogar();
        redirect("home");
    }

   
}
