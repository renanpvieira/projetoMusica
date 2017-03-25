<!-- Header -->
<header>
    <div class="container" id="maincontent" tabindex="-1">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="<?php echo base_url('content/imgs/profile.png'); ?>" alt="">
                <div class="intro-text">
                    <h1 class="name">Start Bootstrap</h1>
                    <hr class="star-light">
                    <span class="skills">Encontre o som que você precisa</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form name="login" id="contactForm" novalidate="">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="name">Login ou E-mail</label>
                            <input type="text" class="form-control" maxlength="255" name="Login" placeholder="Login / E-mail" /> 
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-group col-xs-8">
                            <input type="button"  class="btn btn-success btn-lg" value="Entrar" name="Enviar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
    
 
    
/*
    foreach($ufs as $v){
        

        echo form_checkbox('uf[]', $v['UFid'], False, 'data="uf"' );
        echo form_label($v['Descricao']);
    }

    foreach($estilos as $v){
        echo form_checkbox('estilo[]', $v['EstiloId'], False);   
        echo form_label($v['Descricao']);
    }
  */  

?>

 <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Bandas</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php 
                   foreach($bandas as $v){
                     echo   '<div class="col-sm-4 portfolio-item">
                                <a href="#" class="portfolio-link" data-toggle="modal">
                                    <div class="caption">
                                        <div class="caption-content">
                                            <p>' . $v['Nome'] . '</p>
                                            <i class="fa fa-search-plus fa-3x"></i>
                                        </div>
                                    </div>
                                    <img src="' . base_url('content/imgs/' . $v['foto']) . '" class="img-responsive" alt="Cabin">
                                </a>
                            </div>';
                   }
                ?>
            </div>
        </div>
    </section>