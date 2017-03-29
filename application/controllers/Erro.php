<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Erro extends MY_Controller {
    
    PRIVATE $msg = array();  
    
    public function __construct()
    {
        parent::__construct();
        $this->msg['Titulo'] = 'Erro Genérico';
        $this->msg['Msg'] = 'Desculpe! Ocorreu um erro genério, favor tentar mais tarde!';
    }
      

    public function index()
    {
       $this->load->view('site/erro', $this->msg);
    }
    
    public function bandaInexistente()
    {
       $this->msg['Titulo'] = 'Banda Inexistente!';
       $this->msg['Msg'] = 'Desculpe! A banda selecionada não se encontra mais em nosso cadastro!'; 
       $this->load->view('site/erro', $this->msg);
    }
   
}
