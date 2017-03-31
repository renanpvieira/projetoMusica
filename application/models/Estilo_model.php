<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estilo_model extends CI_Model {

    public function __construct()
    {
           parent::__construct();
    }
    
	 public function lstEstilos()
     {
         return $this->db->order_by('Descricao', 'ASC')->get('estilo')->result_array();
         //    return $this->db->get('estilo')->result_array();
     }


}

/*
 * 
INSERT INTO estilo (Descricao) values ('Axé');
INSERT INTO estilo (Descricao) values ('Black Music');
INSERT INTO estilo (Descricao) values ('Blues');
INSERT INTO estilo (Descricao) values ('Bossa Nova');
INSERT INTO estilo (Descricao) values ('Chilloté');
INSERT INTO estilo (Descricao) values ('Classic Rock');
INSERT INTO estilo (Descricao) values ('Clássico');
INSERT INTO estilo (Descricao) values ('Country');
INSERT INTO estilo (Descricao) values ('Dance');
INSERT INTO estilo (Descricao) values ('Disco');
INSERT INTO estilo (Descricao) values ('Electro Swing');
INSERT INTO estilo (Descricao) values ('Electronica');
INSERT INTO estilo (Descricao) values ('Emocore');
INSERT INTO estilo (Descricao) values ('Fado');
INSERT INTO estilo (Descricao) values ('Folk');
INSERT INTO estilo (Descricao) values ('Forró');
INSERT INTO estilo (Descricao) values ('Funk');
INSERT INTO estilo (Descricao) values ('Funk Carioca');
INSERT INTO estilo (Descricao) values ('Gospel');
INSERT INTO estilo (Descricao) values ('Gótico');
INSERT INTO estilo (Descricao) values ('Grunge');
INSERT INTO estilo (Descricao) values ('Hard Rock');
INSERT INTO estilo (Descricao) values ('Heavy Metal');
INSERT INTO estilo (Descricao) values ('Black Metal');
INSERT INTO estilo (Descricao) values ('Hip Hop');
INSERT INTO estilo (Descricao) values ('House');
INSERT INTO estilo (Descricao) values ('Trance');
INSERT INTO estilo (Descricao) values ('Indie');
INSERT INTO estilo (Descricao) values ('Industrial');
INSERT INTO estilo (Descricao) values ('Infantil');
INSERT INTO estilo (Descricao) values ('Instrumental');
INSERT INTO estilo (Descricao) values ('J-Pop / J-Rock');
INSERT INTO estilo (Descricao) values ('Jazz');
INSERT INTO estilo (Descricao) values ('Jovem Guarda');
INSERT INTO estilo (Descricao) values ('k-Pop / K-Rock');
INSERT INTO estilo (Descricao) values ('Kizomba');
INSERT INTO estilo (Descricao) values ('Metal');
INSERT INTO estilo (Descricao) values ('MPB');
INSERT INTO estilo (Descricao) values ('New Age');
INSERT INTO estilo (Descricao) values ('New Wave');
INSERT INTO estilo (Descricao) values ('Piano Rock');
INSERT INTO estilo (Descricao) values ('Pop');
INSERT INTO estilo (Descricao) values ('Pop-Punk');
INSERT INTO estilo (Descricao) values ('Pop-Punk');
INSERT INTO estilo (Descricao) values ('Pós-Punk');
INSERT INTO estilo (Descricao) values ('Post-Rock');
INSERT INTO estilo (Descricao) values ('Power-Pop');
INSERT INTO estilo (Descricao) values ('Progressivo');
INSERT INTO estilo (Descricao) values ('Psicodelia');
INSERT INTO estilo (Descricao) values ('Punk Rock');
INSERT INTO estilo (Descricao) values ('R&B');
INSERT INTO estilo (Descricao) values ('Rap');
INSERT INTO estilo (Descricao) values ('Reggae');
INSERT INTO estilo (Descricao) values ('Reggaeton');
INSERT INTO estilo (Descricao) values ('Sertanejo');
INSERT INTO estilo (Descricao) values ('Sertanejo Universitário');
INSERT INTO estilo (Descricao) values ('Rock');
INSERT INTO estilo (Descricao) values ('Rock Alternativo');
INSERT INTO estilo (Descricao) values ('Rockability');
INSERT INTO estilo (Descricao) values ('Romântico');
INSERT INTO estilo (Descricao) values ('Samba');
INSERT INTO estilo (Descricao) values ('Samba Enredo');
INSERT INTO estilo (Descricao) values ('SKA');
INSERT INTO estilo (Descricao) values ('Soft Rock');
INSERT INTO estilo (Descricao) values ('Soul Music');
INSERT INTO estilo (Descricao) values ('Surf Music');
INSERT INTO estilo (Descricao) values ('Tecnopop');
INSERT INTO estilo (Descricao) values ('Trip-Hop');
INSERT INTO estilo (Descricao) values ('Tropical House');
INSERT INTO estilo (Descricao) values ('Velha Guarda');
INSERT INTO estilo (Descricao) values ('World Music');



 * 
 */