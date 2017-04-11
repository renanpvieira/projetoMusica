<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuscaAvancada extends MY_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('UF_model', 'uf');
         $this->load->model('Estilo_model', 'estilo');
         $this->load->model('Cidade_model', 'cidade');
         $this->load->model('Banda_model', 'banda');
         
         $scripts = Array('fncBusca.js', 'fncCarregaCidade.js', 'buscaavancada.js');
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
    
    /*
    public function bandas(){
        sleep(5);
        
        $this->somentePost();
        $post = $this->input->post();
        
        if(!array_key_exists("pagina", $post)){ 
            echo json_encode(NULL);
            die();
        }
       
        echo json_encode($this->banda->lstBandas($post['pagina']));
    }
    */
    
    public function bandas() {
        
        
        
        $post = $this->input->post();
        
        if(!array_key_exists("pagina", $post)){ 
            echo json_encode(NULL);
            die();
        }
                
        $ufs = json_decode($post['ufs']);  
        $cidades = json_decode($post['cidades']);
        $estilos = json_decode($post['estilos']);
        
        $ufs[count($ufs)] = 0; //hack para o like
        $cidades[count($cidades)] = 0;
        $estilos[count($estilos)] = 0;
                
        $uf_query = (count($ufs) > 1? 'cidade.ufid in [' . implode(',', $ufs) . '] ' : '');
        $ci_query = (count($cidades) > 1? 'banda_cidade.cidadeid in [' . implode(',', $cidades) . '] ' : '');
        $es_query = (count($estilos) > 1? 'banda_estilo.estiloid in [' . implode(',', $estilos) . '] ' : '');
        
        $query = $es_query . ' and (' . $uf_query . ' or ' . $ci_query . ' ) ';
               
        if(count($estilos) == 1){
          $query = str_replace(' and ', ' ', $query);    
          $query = str_replace('(', '', $query);
          $query = str_replace(')', '', $query);
        }
        
        
        
        if(count($cidades) == 1 or count($ufs) == 1){
          $query = str_replace('or', '', $query);    
        }
        
        if(count($cidades) == 1 and count($ufs) == 1 and count($estilos) == 1){
          $query = NULL;    
        }
        
        $query = str_replace('[', '(', $query);
        $query = str_replace(']', ')', $query);
              
                
        echo json_encode($this->banda->lstBandas($post['pagina'], $query));
        //echo $this->banda->lstBandas($post['pagina'], $query);
        
    }
    
    
    



  

   
}
