<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuscaAvancada extends MY_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('UF_model', 'uf');
         $this->load->model('Estilo_model', 'estilo');
         $this->load->model('Cidade_model', 'cidade');
         
         $scripts = Array('buscaavancada.js');
         $this->SetScript($scripts);
        
    }
   
    public function index()
    {
      $this->SetDados('estilos', $this->estilo->lstEstilos());
      $this->SetDados('ufs', $this->uf->lstUFs());
      $this->displaySite("BuscaAvancada");
    }
    
    public function cidades() {
        $this->somentePost();
        $post = $this->input->post();
        echo json_encode($this->cidade->lstCidades($post['ufs']));
    }
    
    
    public function testetando() {
        $post = $this->input->post();
        $ufs = json_decode($post['ufs']);  
        $cidades = json_decode($post['cidades']);
        $estilos = json_decode($post['estilos']);
        echo json_encode($ufs) . ' - '  . json_encode($cidades) . ' - ' . json_encode($estilos);
    }
    
    
    



  

   
}
