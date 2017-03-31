<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrocaSenha extends MY_Controller {

    public function __construct()
    {
         parent::__construct();
         
         $this->paginaSegura();
         $this->load->helper('form');
         $this->load->model('Usuario_model', 'usuario');
         $scripts = Array('trocasenha.js');
         $this->SetScript($scripts);
    }
      

    public function index()
    {
        $this->displaySite('trocasenha');
    }

    public function salvar()
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('Senha', 'Senha', 'trim|required|min_length[6]|max_length[12]');

        if ($this->form_validation->run())
        {
            $usuarioid = $this->getUsuarioId();
            $novasenha =  $this->encryption->encrypt($post['Senha']);
           
            $res = $this->usuario->atualizaSenhaUsuario($novasenha, $usuarioid);
            if($res == 1){
                $this->postResult(TRUE, "<p>Senha alterada com sucesso!</p>"); 
            }else{
                $this->postResult(FALSE, "<p>Não foi possível realizar essa operação! Tente mais tarde!</p>"); 
            }
        }else{
          $this->postResult(FALSE, validation_errors());
        }
    }

   
}
