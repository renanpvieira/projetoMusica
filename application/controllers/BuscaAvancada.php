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
        
        $ufs[count($ufs)] = 0; //hack para o like
        $cidades[count($cidades)] = 0;
        $estilos[count($estilos)] = 0;
                
        $uf_query = (count($ufs) > 1? 'cidade.ufid in (' . implode(',', $ufs) . ')' : '');
        $ci_query = (count($cidades) > 1? 'banda_cidade.cidadeid in (' . implode(',', $cidades) . ')' : '');
        $es_query = (count($estilos) > 1? 'banda_estilo.estiloid in (' . implode(',', $estilos) . ')' : '');
        
        $query = $es_query . ' and (' . $uf_query . ' or ' . $ci_query . ' )';
               
        if(count($estilos) == 1){
          $query = str_replace(' and ', ' ', $query);    
        }
        
        if(count($cidades) == 1 or count($ufs) == 1){
          $query = str_replace('or', '', $query);    
        }
        
        //$query = str_replace('NADA', '', $query);
        
        
        
        /*
        $query = (count($estilos) > 1 ? $es_query : '');
        
        if(count($ufs) > 1 || count($cidades) > 1){
           $es_query = ' and ' . $es_query;     
        }else{
           $es_query = '';
        }
        
        if(count($ufs) == 1 || count($cidades) > 1){
           $query = $ci_query . $es_query;     
        }
        
        if(count($ufs) > 1 || count($cidades) == 1){
           $query = $uf_query . $es_query;     
        }
        
        if(count($ufs) > 1 && count($cidades) > 1){
           $query = '(' . $uf_query . ' or ' . $ci_query . ') ' . $es_query;     
        }
        */
        echo $query;
        
        
        
        
        //echo json_encode($ufs) . ' - '  . json_encode($cidades) . ' - ' . json_encode($estilos);
    }
    
    
    



  

   
}
