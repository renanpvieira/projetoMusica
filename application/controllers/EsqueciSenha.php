<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EsqueciSenha extends MY_Controller {
    
    
    private $capt = Array(
        1 => array('95inb' => 'img001.jpg'), 
        2 => array('zonwj' => 'img002.jpg'),
        3 => array('qa8uf' => 'img003.jpg'),
        4 => array('eduzt' => 'img004.jpg'),
        5 => array('jnjd5' => 'img005.jpg'),
        6 => array('95inb' => 'img005.jpg')
    );
    
    public function __construct()
    {
         parent::__construct();
         $this->load->helper('form');
         $this->load->model('Usuario_model', 'usuario');
         //$this->load->library('email');
         

         $scripts = Array('esquecisenha.js');
         $this->SetScript($scripts);
    }
      

    public function index()
    {
        $rand = rand (1, count($this->capt));
        $chave = key($this->capt[$rand]);
        $imagedata = 'data:image/jpg;base64,' . base64_encode(file_get_contents(base_url('content/captcha/' . $this->capt[$rand][$chave])));
                       
        $this->SetDados('chave', $this->encryption->encrypt($chave));
        $this->SetDados('image', $imagedata);
        $this->displaySite('esquecisenha');
    }

    public function enviar()
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('Login', 'Login', 'trim|required|min_length[6]|max_length[255]|valid_email');
        $this->form_validation->set_rules('Imagem', 'Imagem', 'trim|required|min_length[3]|max_length[8]|alpha_numeric');
        if ($this->form_validation->run())
        {
            if($post['Imagem'] == $this->encryption->decrypt($post['Chave']))
            {
                $res = $this->usuario->VerificaUsuario($post['Login']);
                if(count($res) == 1){
                    
                    /*
                    $config['protocol'] = 'smtp';
                    $config['charset'] = 'iso-8859-1';
                    $config['smtp_host'] = 'smtp.gmail.com';
                    $config['smtp_port'] = '25';
                    $config['smtp_user'] = 'renanvieira@id.uff.br';
                    $config['smtp_pass'] = 'z9d3n7s9';
                    $this->email->initialize($config);
                                        
                    $this->email->from('renanvieira@id.uff.br', 'Renan Vieira');
                    $this->email->to('renanpvieira25@hotmail.com');
                    $this->email->subject('XXXX');
                    $this->email->message('YYYY');
                    $ret = $this->email->send();*/
                    
                    if(TRUE){
                      $this->postResult(TRUE, "<p>Foi enviado uma mensagem com instrucoes para o e-mail " . $post['Login'] . "</p>");  
                    }else{
                      $this->postResult(FALSE, "<p>Ops! tvemos um problema ao enviar o e-mail, tente mais tarde!</p>"); 
                    }
                }else{
                    $this->postResult(FALSE, "<p>Usuario nao encontrado!</p>"); // sem acento por causa do json
                }
            }else{
               $this->postResult(FALSE, "<p>voce precisa digitar o texto que esta na imagem corretamente!</p>");
            }
        }else{
          $this->postResult(FALSE, validation_errors(), 'esquecisenha');
        }
  }

   
}
