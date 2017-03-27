<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->helper('form');

         $this->load->model('Usuario_model', 'usuario');
         $this->load->model('Banda_model', 'banda');

         $scripts = Array('login.js');
         $this->SetScript($scripts);
    }
      

    public function index()
    {
        $this->displaySite('login');
    }

    public function logar()
	{
        $post = $this->input->post();
        $this->form_validation->set_rules('Login', 'Login', 'trim|required|min_length[6]|max_length[255]|valid_email');
        $this->form_validation->set_rules('Senha', 'Senha', 'trim|required|min_length[6]|max_length[12]');

        if ($this->form_validation->run())
        {
            $res = $this->usuario->VerificaUsuario($post['Login']);
            if(count($res) == 1){
                if($post['Senha'] == $this->encryption->decrypt($res[0]['Senha'])){ // Digito a senha certa
                      $this->session->set_userdata('musica_proj', $this->encryption->encrypt(json_encode($res[0])));
                      if($this->banda->VerificaBanda($res[0]['UsuarioId']) == 1){
                         $this->postResult(TRUE, "", site_url("/usuario/banda/"));
                      }else{
                         $this->postResult(TRUE, "", site_url("/usuario/contratante/"));
                      }
                }else{
                   $this->postResult(FALSE, "<p>Senha incorreta!</p>");
                }
            }else{
                $this->postResult(FALSE, "<p>Usuario nao encontrado!</p>"); // sem acento por causa do json
            }
        }else{
          $this->postResult(FALSE, validation_errors());
        }
  }

   
}
