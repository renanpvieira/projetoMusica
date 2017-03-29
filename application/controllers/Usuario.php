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
         $this->load->model('Cidade_model', 'cidade');
         $this->load->model('Estilo_model', 'estilo');
                 
         
    }
    
   
    

    public function banda()
    {
        $scripts = Array('banda.js');
        $this->SetScript($scripts);
        
        $banda = $this->banda->getBandaUsuario($this->getUsuarioId());
        $this->SetDados('banda', $banda[0]);
        $this->SetDados('estilos', $this->estilo->lstEstilos());
        $this->SetDados('ufs', $this->uf->lstUFs());
        $this->displaySiteAdmin("banda");
    }


    public function contratante()
	{

      echo $usuarioid . ' contratante';


    }
    
    public function cidades()
    {
        $post = $this->input->post();
        echo json_encode($this->cidade->lstCidades($post['uf']));
    }
    
    public function sair(){
        $this->deslogar();
        redirect("home");
    }

   
}
