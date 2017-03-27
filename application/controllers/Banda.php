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
        
      
        $banda = $this->banda->getBanda($bandaid);
        $fotos = $this->banda->getBandaFotos($bandaid);
        
        $telef = $this->banda->getBandaTelefones($bandaid);
        $email = $this->banda->getBandaEmails($bandaid);
        $agend = $this->banda->getBandaAgenda($bandaid);
        $video = $this->banda->getBandaVideos($bandaid);
        
        $this->SetDados('banda', $banda[0]);
        
        /*
        $fotos = ((count($fotos) > 0) ? $fotos : NULL);
        $telef = ((count($telef) > 0) ? $telef : NULL);
        $email = ((count($email) > 0) ? $email : NULL);
        $agend = ((count($agend) > 0) ? $agend : NULL);
        $video = ((count($video) > 0) ? $video : NULL);
        */
        
        $this->SetDados('fotos', $fotos);
        $this->SetDados('telefones', $telef);
        $this->SetDados('emails', $email);
        $this->SetDados('agenda', $agend);
        $this->SetDados('videos', $video);
       
        
        
        
        
        $this->displaySite("banda");
        
        
        
    }


  

   
}
