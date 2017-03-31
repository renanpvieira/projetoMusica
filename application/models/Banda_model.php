<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banda_model extends CI_Model {

    public function __construct()
    {
           parent::__construct();
    }
    
     public function lstBandas($offset = 0){
         $query = 'select B.BandaId, B.Nome, NumIntegrantes, Estrelas, banda_foto.Nome as foto,  
                   (select group_concat(descricao SEPARATOR " - ") from cidade inner join banda_cidade on banda_cidade.CidadeId = cidade.cidadeid where banda_cidade.BandaId = B.BandaId ) as Cidades, 
                   (select group_concat(descricao SEPARATOR " - ") from estilo inner join banda_estilo on banda_estilo.EstiloId = estilo.EstiloId where banda_estilo.BandaId = B.BandaId ) as Estilos
	               from banda B
                   inner join banda_foto on banda_foto.bandaid = B.bandaid
                   where Capa = 1 
                   LIMIT 10 OFFSET ' . $offset;

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
     
     public function getBandaFotos($bandaid) {
        return $this->db->get_where('banda_foto', array('bandaid' => $bandaid))->result_array();
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
     
     
     
     public function getBandaAgenda($bandaid){
        return $this->db->get_where('banda_agenda', array('bandaid' => $bandaid))->result_array();
     }
     
     public function getBandaVideos($bandaid){
        return $this->db->get_where('banda_youtube', array('bandaid' => $bandaid))->result_array();
     }
     
     public function getBandaComentarios($bandaid){
        return $this->db->get_where('banda_comentario', array('bandaid' => $bandaid))->result_array();
     }
     
     public function VerificaBanda($usuarioid){
       $res = $this->getBandaUsuario($usuarioid);
       return count($res);
     }
          
     public function atualizaBanda($dados, $usuarioid){
        date_default_timezone_set('America/Sao_Paulo');
        $dados['Atualizacao'] = date('Y-m-d h:i:s', time()); 
        $this->db->where('usuarioid', $usuarioid)->update('banda', $dados);
        return $this->db->affected_rows();
    }


}
