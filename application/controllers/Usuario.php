<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->paginaSegura();

         $this->load->helper('form');
         $this->load->model('Banda_model', 'banda');
         $this->load->model('UF_model', 'uf');
         $this->load->model('Usuario_model', 'usuario');
         $this->load->model('Cidade_model', 'cidade');
         $this->load->model('Estilo_model', 'estilo');
         
         $scripts = Array('bandaConfiguracao.js', 'bandaContato.js', 'bandaEstilo.js', 'bandaCidade.js');
         $this->SetScript($scripts);
    }
    
   
    

    public function banda()    {
               
        $banda = $this->banda->getBandaUsuario($this->getUsuarioId());
        $login = $this->getUsuarioLogin();
        
        $estilo = $this->estilo->lstEstilos();
        $bandaestilo = $this->banda->getBandaEstilos($banda[0]['BandaId']);
        
        /* MONTANDO O ARRAY DE ESTILOS */
        for($i=0; $i<count($estilo); $i++){
            $estilo[$i]['Checado'] = false;
            for($j=0; $j<count($bandaestilo); $j++){
               if($bandaestilo[$j]['EstiloId'] == $estilo[$i]['EstiloId']){
                 $estilo[$i]['Checado'] = true;    
               }
            }
        }
                
        $this->SetDados('bandaLogin', $login);
        $this->SetDados('banda', $banda[0]);
        $this->SetDados('estilos', $estilo);
        $this->SetDados('emails', $this->banda->getBandaEmails($banda[0]['BandaId']));
        $this->SetDados('telefones', $this->banda->getBandaTelefones($banda[0]['BandaId']));
        $this->SetDados('ufs', $this->uf->lstUFs());
        $this->SetDados('bandacidades', $this->banda->getBandaCidades($banda[0]['BandaId']));
        
        $this->displaySiteAdmin("banda");
    }
  
    
    public function configuracao(){
        
        /* VALID_URL NÂO FUNCIONA! FAZER UMA FUNCAO NO CORE */
        
        $usuarioid = $this->getUsuarioId();
        $post = $this->input->post();
                
        $this->form_validation->set_rules('Login', 'Login', 'trim|required|min_length[6]|max_length[255]|valid_email');
        $this->form_validation->set_rules('Nome', 'Nome da Banda', 'trim|required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('Facebook', 'Facebook', 'trim|max_length[255]|valid_url');
        $this->form_validation->set_rules('NumIntegrantes', 'Número de Integrantes', 'trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('Preco', 'Preço', 'trim');
        $this->form_validation->set_rules('Site', 'Site', 'trim|max_length[255]|valid_url');
        $this->form_validation->set_rules('Skype', 'Skype', 'trim|max_length[255]');
        $this->form_validation->set_rules('YoutubeCanal', 'Canal no Youtube', 'trim|max_length[255]|valid_url');
        $this->form_validation->set_rules('Experiencia', 'Sobre a Banda', 'trim|max_length[1255]');
        $this->form_validation->set_rules('Sobre', 'Sobre as experiencias da Banda', 'trim|max_length[1255]');
        
        if ($this->form_validation->run())
        {
            $dados = array('Login' => $post['Login']);
            $ret = $this->usuario->atualizaUsuario($dados, $usuarioid);
            if($ret == 1){
                   unset($dados);
                   unset($post['Login']);
                   $ret = 0;
                   $ret = $this->banda->atualizaBanda($post, $usuarioid);
                   if($ret == 1){
                       $this->postResult(TRUE, "<p>Atualização salva com sucesso!</p>");
                   }else{
                       $this->postResult(FALSE, "<p>Erro ao atualizar seus dados! Tente mais tarde! 1</p>");
                   }
            }else{
                $this->postResult(FALSE, "<p>Erro ao atualizar seus dados! Tente mais tarde! 2</p>");
            }
        }else{
             $this->postResult(FALSE, validation_errors());
        }
    }
    
    
    public function deletaFone() {
        $usuarioid = $this->getUsuarioId();
        $post = $this->input->post();
        $banda = $this->banda->getBandaUsuario($usuarioid); // SOMENTE PARA NAO CORRER O RISCO DE DELETE UM REGISTRO ERRADO
        echo $this->banda->DeleteTelefone($post['BandaTelefoneId'], $banda[0]['BandaId']);
    }
    
    public function adicionaFone() {
        //$this->postResult(True, "10");
        
        $usuarioid = $this->getUsuarioId();
        $post = $this->input->post();
        
        $this->form_validation->set_rules('DDD', 'DDD', 'trim|required|min_length[2]|max_length[5]');
        $this->form_validation->set_rules('Numero', 'Telefone', 'trim|required|min_length[5]|max_length[25]');
        if ($this->form_validation->run())
        {
            $banda = $this->banda->getBandaUsuario($usuarioid);
            $post['BandaId'] = $banda[0]['BandaId'];
            $ret = $this->banda->adicionaTelefone($post);
            if($ret >= 1){
                $this->postResult(TRUE, $ret);
            } else {
                $this->postResult(FALSE, "<p>Houve um problema ao adicionar esse novo telefone! Tente mais tarde!</p>");
            }
        }else{
            $this->postResult(FALSE, validation_errors());
        }
     }
     
     public function deletaEmail() {
        $usuarioid = $this->getUsuarioId();
        $post = $this->input->post();
        $banda = $this->banda->getBandaUsuario($usuarioid); // SOMENTE PARA NAO CORRER O RISCO DE DELETE UM REGISTRO ERRADO
        echo $this->banda->DeleteEmail($post['BandaEmailId'], $banda[0]['BandaId']);
    }
    
    public function adicionaEmail() {
        $usuarioid = $this->getUsuarioId();
        $post = $this->input->post();
        
        $this->form_validation->set_rules('Email', 'E-mail', 'trim|required|min_length[5]|max_length[255]|valid_email');
        if ($this->form_validation->run())
        {
            $banda = $this->banda->getBandaUsuario($usuarioid);
            $post['BandaId'] = $banda[0]['BandaId'];
            $ret = $this->banda->adicionaEmail($post);
            if($ret >= 1){
                $this->postResult(TRUE, $ret);
            } else {
                $this->postResult(FALSE, "<p>Houve um problema ao adicionar esse novo e-mail! Tente mais tarde!</p>");
            }
        }else{
            $this->postResult(FALSE, validation_errors());
        }
     }
       
     
     
    public function deletaCidade() {
        $usuarioid = $this->getUsuarioId();
        $post = $this->input->post();
        $banda = $this->banda->getBandaUsuario($usuarioid); // SOMENTE PARA NAO CORRER O RISCO DE DELETE UM REGISTRO ERRADO
        echo $this->banda->deletaCidade($post['BandaCidadeId'], $banda[0]['BandaId']);
    }
     
    public function adicionaCidade() {
        $usuarioid = $this->getUsuarioId();
        $cidadeid = $this->input->post("cidade");
        if(is_numeric($cidadeid)){
            $banda = $this->banda->getBandaUsuario($usuarioid);
            $dados = array('BandaId' => $banda[0]['BandaId'], 'CidadeId' => $cidadeid);
            $ret = $this->banda->insereCidade($dados);
            if($ret >= 1){
                $this->postResult(TRUE, $ret);
            } else {
                $this->postResult(FALSE, "<p>Houve um problema ao adicionar essa cidade! Tente mais tarde!</p>");
            }
        }else{
           $this->postResult(FALSE, "<p>Erro ao salvar a cidade!</p>");
        }
    }
    
     public function estilos(){
         $usuarioid = $this->getUsuarioId();  
         $post = $this->input->post();
         $dados = Array();
         $banda = $this->banda->getBandaUsuario($usuarioid);
         
         $this->banda->deleteEstilos($banda[0]['BandaId']);
         if(count($post['estilo']) >= 1){
            for($i=0;$i < count($post['estilo']); $i++){
              $dados[$i] = Array('BandaId' => $banda[0]['BandaId'], 'EstiloId' => $post['estilo'][$i]);
            }
         }
         $ret = $this->banda->insereEstilos($dados);
         if(count($post['estilo']) == $ret){
             $this->postResult(TRUE, "");
         }else{
             $this->postResult(FALSE, "Não foi possível atualizar esses dados, favor tentar mais tarde!");
         }
     }




     public function cidades() {
        $post = $this->input->post();
        echo json_encode($this->cidade->lstCidades($post['uf']));
    }
    
    public function sair(){
        $this->deslogar();
        redirect("home");
    }

   
}
