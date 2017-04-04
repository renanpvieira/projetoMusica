<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!-- saved from url=(0061)https://blackrockdigital.github.io/startbootstrap-freelancer/ -->
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php 
           if(isset($facebook)){
               echo '<meta name="og:description" content="'. $facebook['Descricao'] .'">
                     <meta property="og:image" content="'. $facebook['Imagem'] .'">
                     <meta property="og:image:type" content="image/jpeg">
                     <meta property="og:image:width" content="350"> 
                     <meta property="og:image:height" content="350"> 
                     <title>' . $facebook['Titulo'] . '</title>';
           }else{
               echo '<title>Toca pra mim</title>';
           }
           
        ?>
        
        
        

    

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('content/template/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo base_url('content/template/css/freelancer.min.css'); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('content/template/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
        
        header { 
           /* background-image: url("../..//..//content/css/imgs/01.jpg") no-repeat !important; */
           
           background-image: url("<?php echo base_url('content/css/imgs/02.jpg'); ?>") !important;
           background-position: center; 
           
        }
        
        .grid-botoes {text-align: right;}
        
        //hr.star-primary:after{content: "\f001" !important; }
        
        #loginmsg {color:red;}
        
        /* PAG BANDA */
        p.banda-sobre {font-size: 17px; color:#8c8c8c; text-align: center;   }
        p.banda-experiencia {font-size: 17px; color:#8c8c8c; text-align: justify;   }
        div.banda_detalhe p {font-size: 15px; margin-bottom: 4px;}
        div.banda_detalhe h5 {color: #337ab7;}
                
        div.checkboxmenor { margin-top: 2px !important; margin-bottom: 2px !important;}
        
        /* TABS */
        .nav-tabs { border-bottom: 2px solid #DDD; }
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
        .nav-tabs > li > a { border: none; color: #18BC9C; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #128f76 !important; background: transparent; }
        .nav-tabs > li > a::after { content: ""; background: #128f76; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
        .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
        .tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
        .tab-pane { padding: 15px 0; }
        .tab-content{padding:20px}
        
        select, option {border: none !important; outline: none !important;}
        
        .fotocapa {  background-color: #455c73 !important;}
        /* input busca */
        .noborder {border:none !important;}
        .input-buscar {border: 1px solid #eee; padding-left:10px;}
        .verde {background-color: #18BC9C; }
        .verde:hover {background-color: #128F76; }
        
    </style>

</head>

<body id="page-top" class="index">
    <div id="skipnav">
        <a href="https://blackrockdigital.github.io/startbootstrap-freelancer/#maincontent">Skip to main content</a>
    </div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom affix">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('home'); ?>">TOCA PRA MIM</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                       if($logado){
                         echo '<li class="page-scroll"><a href="' . site_url('usuario/banda/'). '">Painel</a></li>';
                         echo '<li class="page-scroll"><a href="#">Mensagens  <span class="badge">3</span></a></li>';        
                         echo '<li class="page-scroll"><a href="' . site_url('trocasenha'). '">Trocar senha</a></li>';
                         echo '<li class="page-scroll"><a href="' . site_url('contato'). '">Contato</a></li>';
                         echo '<li class="page-scroll"><a href="' . site_url('usuario/sair'). '">Sair</a></li>';
                       }else{
                         echo '<li class="page-scroll"><a href="' . site_url('login'). '">Login</a></li>';        
                         echo '<li class="page-scroll"><a href="' . site_url('cadastro'). '">Cadastre-se</a></li>';
                         echo '<li class="page-scroll"><a href="' . site_url('contato'). '">Contato</a></li>';
                       }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>