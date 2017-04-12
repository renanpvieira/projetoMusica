<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['nome'] = 'Nome do Site';

/* E-mail config */
$config['email'] = array('protocol' => 'smtp', 'charset' => 'iso-8859-1', 'smtp_host' => 'ssl://smtp.googlemail.com', 'smtp_port' => '465', 'smtp_user' => 'renanvieira@id.uff.br', 'smtp_pass' => 'z9d3n7s9', 'mailtype' => 'html');
$config['emailfrom'] = 'renanvieira@id.uff.br';
$config['emailfromnome'] = 'Nome';

/* E-mail cadastro msg */
$config['mailCadastroAssunto'] = 'Nome';
$config['emailfromnome'] = 'Nome';

$config['background'] = 'content/css/imgs/0' . rand(1, 5) . '.jpg';


