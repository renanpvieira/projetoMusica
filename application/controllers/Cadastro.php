<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');

        $this->load->model('Usuario_model', 'usuario');
        $this->load->model('Banda_model', 'banda');
	        
        $scripts = Array('cadastroBasico.js');
	$this->SetScript($scripts);
    }
       

    public function index()
    {
      $this->displaySite('cadastroBasico');
    }
    
    public function cadastroBasico(){
        $post = $this->input->post();
        $this->form_validation->set_rules('Login', 'E-mail', 'trim|required|min_length[6]|max_length[255]|valid_email');
        $this->form_validation->set_rules('Nome', 'Nome', 'trim|required|min_length[6]|max_length[255]|alpha_numeric_spaces');

        if ($this->form_validation->run())
        {
            $res = $this->usuario->VerificaUsuario($post['Login']);
            if(count($res) >= 1){
                 /*
                 * Enviar e-mail para troca de senha
                 *                  
                 */
               $this->postResult(FALSE, "<p>Esse e-mail jÃ¡ esta cadastrado! Acabamos de enviar uma mensagem com as instruÃ§Ãµes para troca de senha!</p>");
            }else{
                $dados = array('Login' => $post['Login'], 'Senha' => 'n0v0c@dastro');
                $res = $this->usuario->insereUsuario($dados);
                unset($dados);
                if($res >= 1){
                    $dados = array('Nome' => $post['Nome'], 'UsuarioId' => $res, 'Estatus' => 0);
                    $res = $this->banda->insereBandaBasico($dados);
                    if($res >= 1){
                        /*  
                         * Envia E-mail
                         *  
                         */
                        $this->postResult(FALSE, "<p>Em instantes enviaremos um e-mail para " . $post['Login'] . " com as instruÃ§Ãµes para finalizar seu cadasto.</p>");
                        
                    }else{
                        $this->postResult(FALSE, "<p>Houve um problema ao fazer seu cadastro! Tente mais tarde!</p>");   
                    }
                }else{
                  $this->postResult(FALSE, "<p>Houve um problema ao fazer seu cadastro! Tente mais tarde!</p>");   
                }
            }
        }else{
           $this->postResult(FALSE, validation_errors());
        }
        
        
    }

    /* DESCONTINUADO */
    public function cadastroBanda()
    {
      $this->load->model('Banda_model', 'banda');
        
      $scripts = Array('cadastroBanda.js');
      $this->SetScript($scripts);
		
      $this->displaySite('cadastroBanda');
    }
    
    /* DESCONTINUADO */
    public function cadastrarBanda()
    {
		
        $post = $this->input->post();

        $this->form_validation->set_rules('Login', 'Login','trim|required|min_length[6]|max_length[255]|valid_email');
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
                $res = $this->usuario->VerificaUsuario($post['Login']); 
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
                            $dados['Nome'] = $post['Nome'];
                            $dados['NumIntegrantes'] = $post['NumIntegrantes'];
                            $dados['Preco'] = $post['Preco'];
                            $dados['Sobre'] = $post['Sobre'];
                            $dados['Experiencia'] = $post['Experiencia'];
                            $dados['Facebook'] = $post['Facebook'];
                            $dados['Skype'] = $post['Skype'];
                            $dados['YoutubeCanal'] = $post['YoutubeCanal'];
							
                            $res_banda = $this->banda->insereBanda($dados);

                            if($res_banda!=0)
                            {
                                unset($res_banda);
                                $res = $this->usuario->VerificaUsuario($post['Login']);
                                $this->session->set_userdata('musica_proj', $this->encryption->	encrypt(json_encode($res[0])));

                            }else{
                                $this->usuario->deletaUsuario($res); 
                                $this->postResult(FALSE, "<p>N�o foi possivel fazer o cadastro, tente mais tarde!</p>"); 
                                                                 }
							
                        }else{ //InsereUsuario
                           $this->postResult(FALSE, "<p>N�o foi possivel fazer o cadastro, tente mais tarde!</p>"); 
                        }
						
                 }else{ //Senhas iguais
	                $this->postResult(FALSE, "<p>Voce precisa digitar senhas iguais!</p>"); 
				 }
				 
              }else{ //VerificaUsuario
                $this->postResult(FALSE, "<p>Usuario ja esta cadastrado!</p>");
			  }

            }else{ //Form_Validation
                $this->postResult(FALSE, validation_errors());
            }       
    }
    
    /* DESCONTINUADO */
    public function cadastroCliente()
	{
         $scripts = Array('cadastroCliente.js');
         $this->SetScript($scripts);

         $this->displaySite('cadastroCliente');
    }

    /* DESCONTINUADO */
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
            if(count($res) == 0)
			{
                if($post['Senha'] == $post['SenhaRepete'])
				{

                     unset($dados);
                     $dados['Login'] = $post['Login'];
                     $dados['Senha'] = $this->encryption->encrypt($post['Senha']);
                     $res = $this->usuario->insereUsuario($dados);     
                     if($res != 0)
					 {

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
