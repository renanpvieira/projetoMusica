<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');

        $this->load->model('Banda_model', 'banda');
        $this->load->model('Usuario_model', 'usuario');
        $this->load->model('Cliente_model', 'cliente');
    }
       

    public function index()
    {
     $this->displaySite('cadastroSelecioneTipo');
    }

    public function cadastroBanda()
    {
      $scripts = Array('cadastroBanda.js');
      $this->SetScript($scripts);
		
      $this->displaySite('cadastroBanda');
    }
    
    
    public function cadastrarBanda()
    {
        $post = $this->input->post();

        $this->form_validation->set_rules('Login', 'Login', 'trim|required|min_length[6]|max_length[255]|valid_email');
        $this->form_validation->set_rules('Senha', 'Senha', 'trim|required|min_length[6]|max_length[12]|alpha_numeric');
        $this->form_validation->set_rules('SenhaRepete', 'Repita a senha', 'trim|required|min_length[6]|max_length[12]|alpha_numeric');
        $this->form_validation->set_rules('Nome', 'Nome da banda', 'trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('NumIntegrantes', 'Numero de integrantes', 'trim|required|min_length[1]|max_length[3]|numeric');
        $this->form_validation->set_rules('Preco', 'Preco', 'trim|required|min_length[2]|max_length[4]|numeric');
        $this->form_validation->set_rules('Experiencia', 'Experiencia', 'trim|required|min_length[10]|max_length[255]|alpha_numeric_spaces');
        $this->form_validation->set_rules('Sobre', 'Sobre', 'trim|required|min_length[10]|max_length[255]|alpha_numeric_spaces');
        $this->form_validation->set_rules('Facebook', 'Facebook', 'trim|required|min_length[10]|max_length[255]|alpha_numeric_spaces');
        $this->form_validation->set_rules('Skype', 'Skype', 'trim|required|min_length[10]|max_length[255]|alpha_numeric_spaces');
        $this->form_validation->set_rules('YoutubeCanal', 'Canal do youtube', 'trim|required|min_length[10]|max_length[255]|alpha_numeric_spaces');
            /*$this->form_validation->set_rules('Estrelas', 'Estrelas', 'trim|required|min_length[10]|max_length[255]|alpha_numeric_spaces');*/


            if($this->form_validation->run())
            {

                $res = $this->usuario->VerificaUsuario($post['Login']); // antes de cadastra verifica se o usuario ja existe
                if(count($res) == 0)
                {
                    if($post['Senha'] == $post['SenhaRepete'])
                    {
                        unset($dados);
                        $dados['Login'] = $post['Login']; 
                        $dados['Senha'] = $this->encryption->encrypt($post['Senha']);

                        $res = $this->usuarios->insereUsuario($dados);

                        if($res != 0)
                        {
                            unset($dados);
                            $dados['UsuarioId'] = $res;
                            $dados['Nome'];
                            $dados['NumIntegrantes'];
                            $dados['Preco'];
                            $dados['Sobre'];
                            $dados['Experiencia'];
                            $dados['Facebook'];
                            $dados['Skype'];
                            $dados['YoutubeCanal'];

                        }
                }
                }

            }else{
                $this->postResult(FALSE, validation_errors());
            }       
    }
    
    
    
    
    
    
    
    
    
    
    
    

    public function cadastroCliente()
	{
         $scripts = Array('cadastroCliente.js');
         $this->SetScript($scripts);

         $this->displaySite('cadastroCliente');
    }

    
    public function cadastrarCliente()
	{
        
  
        $post = $this->input->post();
        $this->form_validation->set_rules('Login', 'Login', 'trim|required|min_length[6]|max_length[255]|valid_email');
        $this->form_validation->set_rules('Senha', 'Senha', 'trim|required|min_length[6]|max_length[12]|alpha_numeric');
        $this->form_validation->set_rules('SenhaRepete', 'Repita a senha', 'trim|required|min_length[6]|max_length[12]|alpha_numeric');
        $this->form_validation->set_rules('Nome', 'Nome', 'trim|required|min_length[6]|max_length[255]|alpha_numeric_spaces');

        if ($this->form_validation->run())
        {
            $res = $this->usuario->VerificaUsuario($post['Login']);
            if(count($res) == 0){
                if($post['Senha'] == $post['SenhaRepete']){

                     unset($dados);
                     $dados['Login'] = $post['Login'];
                     $dados['Senha'] = $this->encryption->encrypt($post['Senha']);
                     $res = $this->usuario->insereUsuario($dados);     
                     if($res != 0){

                        unset($dados); // Limpando o array de dados !impostatnte
                        $dados['UsuarioId'] = $res;
                        $dados['Nome'] = $post['Nome'];   
                        $res_a = $this->cliente->insereCliente($dados);
                        if($res_a != 0){
                           unset($res);
                           $res = $this->usuario->VerificaUsuario($post['Login']);
                           $this->session->set_userdata('musica_proj', $this->encryption->encrypt(json_encode($res[0])));
                           $this->postResult(TRUE, "", site_url("/usuario/contratante/" . $res[0]['UsuarioId']));
                        }else{
                           $this->usuario->deletaUsuario($res); 
                           $this->postResult(FALSE, "<p>N�o foi possivel fazer o cadastro, tente mais tarde!</p>");    
                        }
                     }else{
                        $this->postResult(FALSE, "<p>N�o foi possivel fazer o cadastro, tente mais tarde!</p>"); 
                     }
                }else{
                   $this->postResult(FALSE, "<p>Voce precisa digitar senhas iguais!</p>"); 
                }
            }else{
                $this->postResult(FALSE, "<p>Usuario ja esta cadastrado!</p>"); // sem acento por causa do json
            }
       }else{
            $this->postResult(FALSE, validation_errors());
        }
    }
   
}
