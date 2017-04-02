<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

    public function __construct(){
         parent::__construct();
         $this->paginaSegura();

         $this->load->helper('form');
                           
         $this->load->model('Banda_model', 'banda');
         $this->load->model('UF_model', 'uf');
         $this->load->model('Usuario_model', 'usuario');
         $this->load->model('Cidade_model', 'cidade');
         $this->load->model('Estilo_model', 'estilo');
         
         $scripts = Array('bandaConfiguracao.js', 'bandaContato.js', 'bandaEstilo.js', 'bandaCidade.js', 'bandaUpload.js', 'bandaYoutube.js');
         $this->SetScript($scripts);
    }
    
   
    

    public function banda()    {
               
        $banda = $this->banda->getBandaUsuario($this->getUsuarioId());
        $login = $this->getUsuarioLogin();
        
        $estilo = $this->estilo->lstEstilos();
        $bandaestilo = $this->banda->getBandaEstilos($banda[0]['BandaId']);
        $bandafoto = $this->banda->getBandaFotos($banda[0]['BandaId']);
        
        /* MONTANDO O ARRAY DE ESTILOS */
        for($i=0; $i<count($estilo); $i++){
            $estilo[$i]['Checado'] = false;
            for($j=0; $j<count($bandaestilo); $j++){
               if($bandaestilo[$j]['EstiloId'] == $estilo[$i]['EstiloId']){
                 $estilo[$i]['Checado'] = true;    
               }
            }
        }
        
        /* VERIFICANDO FOTO CAPA */
        for($i=0; $i<count($bandafoto); $i++){
            $bandafoto[$i]['Capa'] = ($bandafoto[$i]['FotoId'] == $banda[0]['FotoCapaId']);    
        }
                
        $this->SetDados('bandaLogin', $login);
        $this->SetDados('banda', $banda[0]);
        $this->SetDados('estilos', $estilo);
        $this->SetDados('emails', $this->banda->getBandaEmails($banda[0]['BandaId']));
        $this->SetDados('telefones', $this->banda->getBandaTelefones($banda[0]['BandaId']));
        $this->SetDados('ufs', $this->uf->lstUFs());
        $this->SetDados('bandacidades', $this->banda->getBandaCidades($banda[0]['BandaId']));
        $this->SetDados('bandafotos', $bandafoto);
        $this->SetDados('bandavideos', $this->banda->getBandaVideos($banda[0]['BandaId']));
        
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
    
    /* SALVAR ESTILOS */
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

    /* USADO NO AUTO COMPLETE DO SELECT-OPTION */
    public function cidades() {
        $post = $this->input->post();
        echo json_encode($this->cidade->lstCidades($post['uf']));
    }
    
    public function sair(){
        $this->deslogar();
        redirect("home");
    }

    
    public function uploadImagem(){
        
        //sleep(5);
        /* 600 x 433 */
        $usuarioid = $this->getUsuarioId();
                
        date_default_timezone_set('America/Sao_Paulo');
        $nome = date('ymdHis', time()) . '-' . $this->getUsuarioId();

        $up['upload_path'] = '.\content\imgs\temp';
        $up['allowed_types'] = 'jpg|jpeg';
        $up['max_size']     = '5120'; // EM KB (1MB = 1024 KB / 5 = 5120)
        $up['max_width'] = '5000';
        $up['max_height'] = '5000';
        $up['file_name'] = $nome;
        $this->load->library('upload', $up);
        
        $ret = $this->upload->do_upload('imagemupload');
        if($ret){
            $dados = $this->upload->data();
            $ma['image_library'] = 'gd2';
            $ma['source_image'] = $dados['full_path'];
            $ma['create_thumb'] = FALSE;
            $ma['maintain_ratio'] = FALSE;
            $ma['quality'] = 100;
   
            
            $this->load->library('image_lib', $ma);
            if($dados['image_width'] < $dados['image_height']){
               $ma['y_axis'] = intval(($dados['image_height'] - intval((($dados['image_width'] * 433) / 600))) / 2);
               $ma['height'] = intval((($dados['image_width'] * 433) / 600));
               $ma['width'] = $dados['image_width'];
               $this->image_lib->initialize($ma);
               $ret = $this->image_lib->crop();
               if(!$ret){
                   $this->postResult(FALSE, $this->image_lib->display_errors());
                   die(); /* nao sei se é certo */
               }
            }
            
            $ma['y_axis'] = 0;
            $ma['quality'] = 65;
            $ma['new_image']  = '.\content\imgs\bandas';
            $ma['width']   = 600;
            $ma['height']  = 433;
            $this->image_lib->initialize($ma);
            $ret = $this->image_lib->resize();
            if($ret){
                $banda = $this->banda->getBandaUsuario($usuarioid);
                $insert = array('BandaId' => $banda[0]['BandaId'], 'Nome' => $dados['orig_name']);
                $ret = $this->banda->insereFoto($insert);
                if($ret >= 1){
                    $img = base_url('content/imgs/bandas/' . $dados['orig_name']);
                    $this->postResult(TRUE, $ret, $img);
                } else {
                    $this->postResult(FALSE, "<p>Houve um problema ao adicionar essa cidade! Tente mais tarde!</p>");
                }
            }else{
                $this->postResult(FALSE, $this->image_lib->display_errors());
            }
        }else{
            $this->postResult(FALSE, $this->upload->display_errors());
        }
    }
       
    public function deletaFoto() {
        $usuarioid = $this->getUsuarioId();
        $post = $this->input->post();
        $banda = $this->banda->getBandaUsuario($usuarioid); // SOMENTE PARA NAO CORRER O RISCO DE DELETE UM REGISTRO ERRADO
        echo $this->banda->DeleteFoto($post['FotoId'], $banda[0]['BandaId']);
    }
    
    public function adiconaCapa() {
       $usuarioid = $this->getUsuarioId();
       $post = $this->input->post();
       $banda = $this->banda->getBandaUsuario($usuarioid); // SOMENTE PARA NAO CORRER O RISCO DE DELETE UM REGISTRO ERRADO
       echo $this->banda->atualizaCapa($post['FotoId'], $banda[0]['BandaId']);
    }
        
    public function deletaVideo() {
        $usuarioid = $this->getUsuarioId();
        $post = $this->input->post();
        $banda = $this->banda->getBandaUsuario($usuarioid); // SOMENTE PARA NAO CORRER O RISCO DE DELETE UM REGISTRO ERRADO
        echo $this->banda->DeleteVideo($post['BandaYoutubeId'], $banda[0]['BandaId']);
    }
    
    public function adicionaVideo() {
        $usuarioid = $this->getUsuarioId();
        $post = $this->input->post();
        
        $this->form_validation->set_rules('URL', 'URL', 'trim|required|min_length[10]|max_length[255]');
        if ($this->form_validation->run())
        {
            $post['URL'] = str_replace("watch?v=", "embed/", $post['URL']);  
            $banda = $this->banda->getBandaUsuario($usuarioid);
            $post['BandaId'] = $banda[0]['BandaId'];
            $ret = $this->banda->insereVideo($post);
            if($ret >= 1){
                $this->postResult(TRUE, $ret);
            } else {
                $this->postResult(FALSE, "<p>Houve um problema ao adicionar esse novo telefone! Tente mais tarde!</p>");
            }
        }else{
            $this->postResult(FALSE, validation_errors());
        }
    }
    
}


/*
 * {"file_name":"170331224219-1.jpg",
 * "file_type":"image\/jpeg",
 * "file_path":"C:\/wamp64\/www\/projetoMusica\/content\/imgs\/temp\/",
 * "full_path":"C:\/wamp64\/www\/projetoMusica\/content\/imgs\/temp\/170331224219-1.jpg",
 * "raw_name":"170331224219-1",
 * "orig_name":"170331224219-1.jpg",
 * "client_name":"teste.jpg",
 * "file_ext":".jpg",
 * "file_size":200.05,
 * "is_image":true,
 * "image_width":1080,
 * "image_height":800,
 * "image_type":"jpeg",
 * "image_size_str":"width=\"1080\" height=\"800\""}
 */

