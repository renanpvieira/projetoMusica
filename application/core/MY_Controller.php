<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
   
    
    private $dados = Array();
    	
    public function SetScript($s){
        $this->dados['scriptsJs'] = $s;
    }

    public function SetDados($key, $d){
       $this->dados[$key] = $d;
    }

    public function paginaSegura(){
       if(!$this->session->has_userdata('musica_proj')){
           $url = site_url('login');
           redirect($url);
       }
       
       /* FORÇANDO O USUARIO A TROCAR A SENHA */
       if(strpos(strtolower($_SERVER['REQUEST_URI']), 'trocasenha') == false){
           $sessao = json_decode($this->encryption->decrypt($this->session->userdata('musica_proj')), True);
           if($sessao['Estatus'] == 0){
               $url = site_url('trocasenha');
               redirect($url);
           }
       }
    }
    
     public function estaLogado(){
         return $this->session->has_userdata('musica_proj');
     }
    
    public function getUsuarioId(){
       $url = site_url('login');
       if(!$this->session->has_userdata('musica_proj')){
           redirect($url);
       }else{
           $sessao = json_decode($this->encryption->decrypt($this->session->userdata('musica_proj')), True);
           return $sessao['UsuarioId'];
       }
    }
    
    public function getUsuarioLogin(){
       $url = site_url('login');
       if(!$this->session->has_userdata('musica_proj')){
           redirect($url);
       }else{
           $sessao = json_decode($this->encryption->decrypt($this->session->userdata('musica_proj')), True);
           return $sessao['Login'];
       }
    }
    
    public function atualizaUsuarioSessao($campo, $valor){
       $url = site_url('login');
       if(!$this->session->has_userdata('musica_proj')){
           redirect($url);
       }else{
           $sessao = json_decode($this->encryption->decrypt($this->session->userdata('musica_proj')), True);
           $sessao[$campo] = $valor;
           $this->session->set_userdata('musica_proj', $this->encryption->encrypt(json_encode($sessao)));
       }
    }
    
    
    

    /*
    public function verificaUsuario($usuarioid){
       $url = site_url('login');
       if(!$this->session->has_userdata('musica_proj')){
           redirect($url);
       }else{
           $sessao = json_decode($this->encryption->decrypt($this->session->userdata('musica_proj')), True);
           if($sessao['UsuarioId'] != $usuarioid){
              $this->session->unset_userdata('musica_proj');
              redirect($url);
           }
       }
    }
     
     */
        
    public function displaySite($view, $path = 'site/'){
                
        //print_r($this->dados);
        //die();
        $this->dados['logado'] = $this->estaLogado();
                
        $this->load->view('site/topo', $this->dados);
        $this->load->view($path . $view);
        $this->load->view('site/base');
        
    }
    
    public function displaySiteAdmin($view){
        $this->displaySite($view, 'admin/');
    }
    
    public function deslogar(){
       $this->session->unset_userdata('musica_proj');
    }


    public function postResult($formValidate, $msg, $url = NULL){
       echo json_encode(array('formValidate' => $formValidate, 'msg' => $msg, 'url' => $url));
    }

    /*
    public function normalizaPost($post){
       $ret = Array();

       foreach($post as $p){
          $ret[$p['name']] = $p['value'];
       }

       return $ret;
    }
    */
    
  
}
