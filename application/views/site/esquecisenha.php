<br />
<br />
<!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>ESQUECI MINHA SENHA</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="esquecisenha" id="contactForm" novalidate="">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input type="hidden" name="Chave" value="<?php echo $chave; ?>" /> 
                                <label for="name">Login ou E-mail</label>
                                <input type="text" class="form-control" maxlength="255" name="Login" placeholder="Login / E-mail" /> 
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-5 floating-label-form-group controls">
                                <label for="email">Digite o texto na imagem</label>
                                <input type="text" class="form-control" maxlength="12" name="Imagem" placeholder="Digite o texto na imagem" /> 
                            </div>
                            <div class="form-group col-xs-7">
                                <img src="<?php  echo $image; ?>" />
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="form-group col-xs-8">
                                <input type="button"  class="btn btn-success btn-lg" value="Entrar" name="Enviar">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12" id="esquecisenha"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>