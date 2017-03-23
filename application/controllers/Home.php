<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->helper('form');

         $this->load->model('UF_model', 'uf');
         $this->load->model('Estilo_model', 'estilo');
         $this->load->model('Banda_model', 'banda');
                  
         $scripts = Array('home.js');
         $this->SetScript($scripts);
         
    }

   

	public function index()
	{
        $this->SetDados('ufs', $this->uf->lstUFs());
        $this->SetDados('estilos', $this->estilo->lstEstilos());
        $this->SetDados('bandas', $this->banda->lstBandas());
        $this->displaySite('home');
	}

    public function getJsonCidades()
	{
         $c = $this->input->get();
         echo  json_encode($c);
    }
}

