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
    }

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
        
    public function displaySite($view){
        $this->load->view('site/topo', $this->dados);
        $this->load->view('site/' . $view);
        $this->load->view('site/base');
    }

    public function displayAdmin($view, $data = null){
        $this->load->view('admin/topo', $data);
        $this->load->view('admin/' . $view);
        $this->load->view('admin/base');
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
