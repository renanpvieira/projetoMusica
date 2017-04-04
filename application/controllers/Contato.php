<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends MY_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->helper('form');

         $this->load->model('Contato_model', 'contato');
         

         $scripts = Array('contato.js');
         $this->SetScript($scripts);
    }
      

    public function index()
    {
        $this->displaySite('contato');
    }

    public function salvar()
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('Email', 'E-mail', 'trim|required|min_length[6]|max_length[255]|valid_email');
        $this->form_validation->set_rules('Nome', 'Nome', 'trim|max_length[255]');
        $this->form_validation->set_rules('Mensagem', 'Mensagem', 'trim|required|min_length[1]|max_length[2500]');
        if ($this->form_validation->run())
        {
            $res = $this->contato->adicionaContato($post);
            if($res >= 1){
                $this->postResult(TRUE, "<p>Mensagem enviada com sucesso!</p>");
            }else{
                $this->postResult(FALSE, "<p>Nao foi possivel enviar sua mensagem! tente novamente mais tarde!</p>");
            }
        }else{
          $this->postResult(FALSE, validation_errors());
        }
  }

   
}
