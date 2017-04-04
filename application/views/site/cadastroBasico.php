<br />
<br />
<!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Cadasto bÃ¡sico</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="cadastroBasico" id="contactForm" novalidate="">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="name">E-mail</label>
                                <input type="text" class="form-control" maxlength="255" name="Login" placeholder="E-mail de cadastro" /> 
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" maxlength="255" name="Nome" placeholder="Nome da banda ou mÃºsico" /> 
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="form-group col-xs-8">
                                <input type="submit"  class="btn btn-success btn-lg" value="Salvar" name="Enviar">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12" id="cadastrobasicomsg"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>