<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->helper('form');

         $this->load->model('UF_model', 'uf');
         $this->load->model('Cidade_model', 'cidade');
         $this->load->model('Estilo_model', 'estilo');
         $this->load->model('Banda_model', 'banda');
                  
         $scripts = Array('home.js');
         $this->SetScript($scripts);
    }

    public function index()
    {
        //$this->SetDados('ufs', $this->uf->lstUFs());
        //$this->SetDados('estilos', $this->estilo->lstEstilos());
        //$this->SetDados('bandas', $this->banda->lstBandas());
        $this->displaySite('home');
    }
    
    
    public function bandas(){
        $this->somentePost();
        $post = $this->input->post();
        
        if(!array_key_exists("Pagina", $post)){ /* FORÇA A TER Pagina */
            echo json_encode(NULL);
            die();
        }
       
        echo json_encode($this->banda->lstBandas($post['Pagina']));
    }
    
    public function cidades() {
        $post = $this->input->post();
        echo json_encode($this->uf->lstUFs());
    }
    
    
    function arquivos(){
        /*/*
        $path = 'C:\wamp64\www\projetoMusica\content\imgs\bandas';
        $files = array_values(array_filter(scandir($path), function($file) {   return !is_dir($file); }));
        */
        // 3 e 23
        
        //$bandas = $this->banda->todas();
        //$amapa = $this->cidade->lstCidades(3);
        //$roraima = $this->cidade->lstCidades(23);
        

        //foreach($bandas as $banda){
            
            //$qa = rand(1, 3);
            //$qr = rand(1, 3);
          
            /*
            for($i =0; $i<=$qa; $i++){
                 $a = rand(0, (count($amapa) - 1));
                 $dados = array('BandaId' => $banda['BandaId'], 'CidadeId' => $amapa[$a]['CidadeId']);
                 $this->banda->insereCidade($dados);
            }
             * 
             */
             
        /*
            for($i =0; $i<=$qr; $i++){
                $a = rand(0, (count($roraima) - 1));
                $dados = array('BandaId' => $banda['BandaId'], 'CidadeId' => $roraima[$a]['CidadeId']);
                $this->banda->insereCidade($dados); 
            }*/
            
            
            /*echo  $banda['Nome'] . '<br />';
            $q = rand(2, 4);
            $d = array();
            for($i =0; $i<=$q; $i++){
                $r = rand(0, (count($estilos) - 1));
                echo $estilos[$r]['EstiloId'] . '<br />';
                
               
                $d[$i] = array('BandaId' => $banda['BandaId'], 'EstiloId' => $estilos[$r]['EstiloId']);
                //$this->banda->insereEstilos($d);
                 //unset($d);
            }
            $this->banda->insereEstilos($d);
            var_dump($d);
            */
            
            /*
            $r = $this->banda->getBandaFotos($banda['BandaId']);
            $q = rand(0, (count($r) - 1));
            
            $this->banda->atualizaCapa($r[$q]['FotoId'], $banda['BandaId']);
            
            var_dump($r);
            var_dump($r[$q]['FotoId']);
             * 
             */
            
            
       // }
         

        
    }

   
}

