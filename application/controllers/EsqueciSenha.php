<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EsqueciSenha extends MY_Controller {
    
    
    private $capt = Array(
        1 => array('95inb' => 'img001.jpg'),        2 => array('zonwj' => 'img002.jpg'),
        3 => array('qa8uf' => 'img003.jpg'),        4 => array('eduzt' => 'img004.jpg'),
        5 => array('jnjd5' => 'img005.jpg'),        6 => array('ndtf9' => 'img006.jpg'),
        7 => array('tza3p' => 'img007.jpg'),        8 => array('8i3qs' => 'img008.jpg'),
        9 => array('bdpkr' => 'img009.jpg'),        10 => array('9lup6' => 'img010.jpg'),
        11 => array('ihpkh' => 'img011.jpg'),        12 => array('cijjx' => 'img012.jpg'),
        13 => array('qqnlp' => 'img013.jpg'),        14 => array('nk7d4' => 'img014.jpg'),
        15 => array('xt17y' => 'img015.jpg'),        16 => array('748em' => 'img016.jpg'),
        17 => array('ak8lw' => 'img017.jpg'),        18 => array('7pfq7' => 'img018.jpg'),
        16 => array('m2vkl' => 'img019.jpg'),        20 => array('iulit' => 'img020.jpg'),
        21 => array('fs9md' => 'img021.jpg'),        22 => array('8hvir' => 'img022.jpg'),
        23 => array('7uvw2' => 'img023.jpg'),        24 => array('p3qzb' => 'img024.jpg'),
        25 => array('unptd' => 'img025.jpg'),        26 => array('c594n' => 'img026.jpg'),
        27 => array('r3bm8' => 'img027.jpg'),        28 => array('xp8x2' => 'img028.jpg'),
        29 => array('jbc5z' => 'img029.jpg'),        30 => array('6g275' => 'img030.jpg'),
        31 => array('ka9n7' => 'img031.jpg'),        32 => array('qk98h' => 'img032.jpg'),
        33 => array('kbfdk' => 'img033.jpg'),        34 => array('lg8qu' => 'img034.jpg'),
        35 => array('5xxmp' => 'img035.jpg'),        36 => array('qldvp' => 'img036.jpg'),        
        37 => array('s3izw' => 'img037.jpg'),        38 => array('945lb' => 'img038.jpg'),
        39 => array('468l3' => 'img039.jpg'),        40 => array('7f2m3' => 'img040.jpg')
    );
    
    public function __construct()
    {
         parent::__construct();
         $this->load->helper('form');
         $this->load->library('session');
         $this->load->model('Usuario_model', 'usuario');
         //$this->load->model('Banda_model', 'banda');
         //$this->load->library('email');
         

         $scripts = Array('esquecisenha.js');
         $this->SetScript($scripts);
    }
    
    public function teste()
    {
        //$this->session->set_tempdata('recuperasenha', 'dddd', 10800);
       // $this->session->unset_tempdata('recuperasenha');
        
        //$d = array("BandaId" => 1, "DDD" => "21", "Numero" => "0000");
        //echo $this->banda->adicionaTelefone($d);
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
    
    public function kkkkk()
    {
        //$this->session->set_tempdata('recuperasenha', 'dddd', 10800);
       // $this->session->unset_tempdata('recuperasenha');
        echo base64_encode($this->encryption->encrypt('t@t.com'));
    }
    
    public function novasenha($mail)
    {
        $rec = $this->session->tempdata('recuperasenha');
        
        if(isset($rec)){
         
            echo 'ff';
        }else{
            
            echo 'dd';
        }
        
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
                    
                                        
                    
                    /* GERANDO A MINI SESSAO */
                    $this->session->set_tempdata('recuperasenha', $this->encryption->encrypt($post['Login']), 10800); /*3 horas*/
                    
                    
                    /* ENVIANDO EMAIL*/ /*
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
