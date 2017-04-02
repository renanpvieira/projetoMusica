<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banda_model extends CI_Model {

    public function __construct()
    {
           parent::__construct();
    }
    
     public function lstBandas($offset = 0){
         $query = 'select B.BandaId, B.Nome, NumIntegrantes, Estrelas, IFNULL(banda_foto.Nome,"bandaBase.jpg") as foto,  
                   (select group_concat(descricao SEPARATOR " - ") from cidade inner join banda_cidade on banda_cidade.CidadeId = cidade.cidadeid where banda_cidade.BandaId = B.BandaId ) as Cidades, 
                   (select group_concat(descricao SEPARATOR " - ") from estilo inner join banda_estilo on banda_estilo.EstiloId = estilo.EstiloId where banda_estilo.BandaId = B.BandaId ) as Estilos
	           from banda B
                   left join banda_foto on banda_foto.FotoId = B.FotoCapaId';
                   

         return $this->db->query($query)->result_array();
     }
     
     public function getBandaUsuario($usuarioid){
        return $this->db->get_where('banda', array('usuarioid' => $usuarioid))->result_array();
     }
     
     public function getBanda($bandaid){
         $query = 'select B.*,  
                   (select group_concat(descricao SEPARATOR ", ") from cidade inner join banda_cidade on banda_cidade.CidadeId = cidade.cidadeid where banda_cidade.BandaId = B.BandaId ) as Cidades, 
                   (select group_concat(descricao SEPARATOR ", ") from estilo inner join banda_estilo on banda_estilo.EstiloId = estilo.EstiloId where banda_estilo.BandaId = B.BandaId ) as Estilos
	           from banda B where bandaid = ' . $bandaid; 
         
         return $this->db->query($query)->result_array(); 
        
     }
     
    
     
     /* TELEFONE */
     public function adicionaTelefone($dados){
          $this->db->insert('banda_telefone', $dados);
          return (($this->db->affected_rows() > 0) ? $this->db->insert_id() : 0);
     }
     
     public function DeleteTelefone($telefoneid, $bandaid){
        $this->db->delete('banda_telefone', array('BandaTelefoneId' => $telefoneid, 'BandaId' => $bandaid));
        return $this->db->affected_rows();
     }
     
     public function getBandaTelefones($bandaid){
        return $this->db->get_where('banda_telefone', array('bandaid' => $bandaid))->result_array();
     }
     
     
     /* EMAILS */
     public function adicionaEmail($dados){
          $this->db->insert('banda_email', $dados);
          return (($this->db->affected_rows() > 0) ? $this->db->insert_id() : 0);
     }
     
     public function DeleteEmail($emailid, $bandaid){
        $this->db->delete('banda_email', array('BandaEmailId' => $emailid, 'BandaId' => $bandaid));
        return $this->db->affected_rows();
     }
          
     public function getBandaEmails($bandaid){
        return $this->db->get_where('banda_email', array('bandaid' => $bandaid))->result_array();
     }
     
     
     /*ESTILOS */
     public function getBandaEstilos($bandaid){
        return $this->db->get_where('banda_estilo', array('bandaid' => $bandaid))->result_array();
     }
     
     public function deleteEstilos($bandaid){
        $this->db->delete('banda_estilo', array('BandaId' => $bandaid));
        return $this->db->affected_rows();
     }
     
     public function insereEstilos($dados){
        $this->db->insert_batch('banda_estilo', $dados);
        return $this->db->affected_rows();
     }
     
     
     /*CIDADES */
     public function getBandaCidades($bandaid){
         return $this->db->select('BandaCidadeId,  cidade.descricao as CidadeDescricao, uf.descricao as UFDescricao')
                            ->from('banda_cidade')
                            ->join('cidade', 'cidade.cidadeid = banda_cidade.cidadeid')
                            ->join('uf', 'cidade.ufid = uf.ufid')
                            ->where('banda_cidade.bandaid', $bandaid)
                            ->get()
                            ->result_array();
     }
     
     public function insereCidade($dados){
        $this->db->insert('banda_cidade', $dados);
        return (($this->db->affected_rows() > 0) ? $this->db->insert_id() : 0);
     }
     
     public function deletaCidade($bandacidadeid, $bandaid){
        $this->db->delete('banda_cidade', array('BandaId' => $bandaid, 'BandaCidadeId' => $bandacidadeid));
        return $this->db->affected_rows();
     }
     
     
     /* FOTOS */
     public function insereFoto($dados){
        $this->db->insert('banda_foto', $dados);
        return (($this->db->affected_rows() > 0) ? $this->db->insert_id() : 0);
     }
     
     public function getBandaFotos($bandaid) {
        return $this->db->get_where('banda_foto', array('bandaid' => $bandaid))->result_array();
     }
     
     public function DeleteFoto($fotoid, $bandaid){
        $this->db->delete('banda_foto', array('FotoId' => $fotoid, 'BandaId' => $bandaid));
        return $this->db->affected_rows();
     }
     
     public function  atualizaCapa($fotoid, $bandaid){
        $dados = array('FotoCapaId' => $fotoid); 
        $this->db->where('BandaId', $bandaid)->update('banda', $dados);
        return $this->db->affected_rows();
         
     }


     
     
     
     /*public function getBandaAgenda($bandaid){
        return $this->db->get_where('banda_agenda', array('BandaId' => $bandaid))->result_array();
     }
     */
     
     /* VIDEOS */
     public function getBandaVideos($bandaid){
        return $this->db->get_where('banda_youtube', array('BandaId' => $bandaid))->result_array();
     }
     
     public function DeleteVideo($id, $bandaid){
        $this->db->delete('banda_youtube', array('BandaYoutubeId' => $id, 'BandaId' => $bandaid));
        return $this->db->affected_rows();
     }
     
      public function insereVideo($dados){
        $this->db->insert('banda_youtube', $dados);
        return (($this->db->affected_rows() > 0) ? $this->db->insert_id() : 0);
     }
     
     
     
     
     
     public function getBandaComentarios($bandaid){
        return $this->db->get_where('banda_comentario', array('BandaId' => $bandaid))->result_array();
     }
        
     
     public function VerificaBanda($usuarioid){
       $res = $this->getBandaUsuario($usuarioid);
       return count($res);
     }
          
     public function atualizaBanda($dados, $usuarioid){
        date_default_timezone_set('America/Sao_Paulo');
        $dados['Atualizacao'] = date('Y-m-d H:i:s', time()); 
        $this->db->where('UsuarioId', $usuarioid)->update('banda', $dados);
        return $this->db->affected_rows();
    }


}
