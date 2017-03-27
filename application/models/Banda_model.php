<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banda_model extends CI_Model {

    public function __construct()
    {
           parent::__construct();
    }
    
	 public function lstBandas($offset = 0)
     {
         $query = 'select B.BandaId, B.Nome, NumIntegrantes, Estrelas, banda_foto.Nome as foto,  
                   (select group_concat(descricao) from cidade inner join banda_cidade on banda_cidade.CidadeId = cidade.cidadeid where banda_cidade.BandaId = B.BandaId ) as cidades, 
                   (select group_concat(descricao) from estilo inner join banda_estilo on banda_estilo.EstiloId = estilo.EstiloId where banda_estilo.BandaId = B.BandaId ) as estilos
	               from banda B
                   inner join banda_foto on banda_foto.bandaid = B.bandaid
                   where Capa = 1 
                   LIMIT 10 OFFSET ' . $offset;

         return $this->db->query($query)->result_array();
     }
     
     public function getBandaUsuario($usuarioid)
     {
        return $this->db->get_where('banda', array('usuarioid' => $usuarioid))->result_array();
     }
     
     
     

     public function VerificaBanda($usuarioid){
       $res = $this->getBandaUsuario($usuarioid);
       return count($res);
     }


}
