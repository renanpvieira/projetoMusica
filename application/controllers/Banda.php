<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banda extends MY_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('Banda_model', 'banda');
    }
   
    public function index($bandaid)
    {
        try {
            
            if(!is_numeric($bandaid) || strlen($bandaid) > 6){ /* Se deus quiser um dia esse numero vai aumenta */
              redirect('erro');
              die();  
            }
            
            $banda = $this->banda->getBanda($bandaid);
            if(count($banda) != 1){
              redirect('erro');
              die();  
            }
            
            $fotos = $this->banda->getBandaFotos($bandaid);
            $telef = $this->banda->getBandaTelefones($bandaid);
            $email = $this->banda->getBandaEmails($bandaid);
            $agend = $this->banda->getBandaAgenda($bandaid);
            $video = $this->banda->getBandaVideos($bandaid);
            $comen = $this->banda->getBandaComentarios($bandaid);

            $this->SetDados('banda', $banda[0]);
            $this->SetDados('fotos', $fotos);
            $this->SetDados('telefones', $telef);
            $this->SetDados('emails', $email);
            $this->SetDados('agenda', $agend);
            $this->SetDados('videos', $video);
            $this->SetDados('comentarios', $comen);

            $this->displaySite("banda");
            
            
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
        
      
        
       
    }


  

   
}
