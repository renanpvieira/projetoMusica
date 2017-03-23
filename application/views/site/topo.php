<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Toca pra mim</title>
    <script  src="https://code.jquery.com/jquery-3.1.1.min.js"  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="  crossorigin="anonymous"></script>
    <script  src="<?php echo base_url('content/js/script.js'); ?>"  ></script>

	<style type="text/css">
    
	</style>

    <script>
 
        function GeraSecurityForm(form){
             form[form.length] = { name: "<?php echo $this->security->get_csrf_token_name() ;?>", value: getCookie("<?php echo $this->security->get_csrf_cookie_name() ;?>") };
             return form;
         }

         function Site_Url(url){  return '<?php echo site_url(); ?>' + url; }


       
    </script>

</head>
<body>
<a href="<?php echo site_url('login'); ?>">Login</a>
<a href="<?php echo site_url('cadastro'); ?>">Cadastro</a>
<br />