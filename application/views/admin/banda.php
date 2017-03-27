<br /><br />
  <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo $banda['Nome']; ?></h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#configuracoes" aria-controls="configuracoes" role="tab" data-toggle="tab">Configuções</a></li>
                        <li role="presentation"><a href="#contatos" aria-controls="contatos" role="tab" data-toggle="tab">Contatos</a></li>
                        <li role="presentation"><a href="#imagens" aria-controls="imagens" role="tab" data-toggle="tab">Imagens</a></li>
                        <li role="presentation"><a href="#cidades" aria-controls="cidades" role="tab" data-toggle="tab">Cidades</a></li>
                        <li role="presentation"><a href="#estilos" aria-controls="estilos" role="tab" data-toggle="tab">Estilos</a></li>
                        <li role="presentation"><a href="#mensagens" aria-controls="mensagens" role="tab" data-toggle="tab">Mensagens</a></li>
                        <li role="presentation"><a href="#agenda" aria-controls="agenda" role="tab" data-toggle="tab">Agenda</a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="configuracoes">
                            <form name="login" id="contactForm" novalidate="">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls" id="divlogin">
                                        <label for="name">Login / E-mail</label>
                                        <input type="text" class="form-control" maxlength="255" name="Login" placeholder="Digite um E-mail" /> 
                                    </div>
                                </div>

                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls" id="divnomebanda">
                                        <label for="name">Nome da banda</label>
                                        <input type="text" class="form-control" maxlength="255" name="Nome" placeholder="Nome da banda" value="<?php echo $banda['Nome'];  ?>" /> 
                                    </div>
                                </div>

                                <div class="row control-group">
                                    <div class="form-group col-xs-6 floating-label-form-group controls" id="divnumintegrantes">
                                        <label for="name">Número de integrantes</label>
                                        <input type="text" class="form-control" maxlength="4" name="NumIntegrantes" placeholder="Número de integrantes" value="<?php echo $banda['NumIntegrantes'];  ?>" /> 
                                    </div>
                                     <div class="form-group col-xs-6 floating-label-form-group controls" id="divpreco">
                                        <label for="name">Preço (Zero para a combinar)</label>
                                        <input type="text" class="form-control" maxlength="4" name="Preco" placeholder="Preço (Zero para a combinar)" value="<?php echo $banda['Preco'];  ?>" /> 
                                    </div>
                                </div>

                                 <div class="row control-group">
                                     <div class="form-group col-xs-6 floating-label-form-group controls" id="divfacebook">
                                        <label for="name">Facebook</label>
                                        <input type="text" class="form-control" maxlength="4" name="Facebook" placeholder="Digite a url do facebook" value="<?php echo $banda['Facebook'];  ?>" /> 
                                    </div>
                                     <div class="form-group col-xs-6 floating-label-form-group controls" id="divskype">
                                        <label for="name">Skype</label>
                                        <input type="text" class="form-control" maxlength="4" name="Skype" placeholder="Digite o Skype" value="<?php echo $banda['Skype'];  ?>" /> 
                                    </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-6 floating-label-form-group controls" id="divsite" >
                                        <label for="name">Site</label>
                                        <input type="text" class="form-control" maxlength="4" name="Site" placeholder="Digite o endereço do site" value="<?php echo $banda['Site'];  ?>" /> 
                                    </div>
                                     <div class="form-group col-xs-6 floating-label-form-group controls" id="divyoutube">
                                        <label for="name">Canal no youtube</label>
                                        <input type="text" class="form-control" maxlength="4" name="YoutubeCanal" placeholder="Canal no youtube" value="<?php echo $banda['YoutubeCanal'];  ?>" /> 
                                    </div>
                                </div>

                                <br />
                                <div class="row">
                                    <div class="form-group col-xs-8">
                                        <input type="button"  class="btn btn-success btn-lg" value="Salvar" name="Enviar">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12" id="loginmsg"></div>
                                </div>
                            </form>
                        </div> <!-- FIM DIV TAB CONFIGURACOES -->
                        <div role="tabpanel" class="tab-pane" id="contatos">
                            <h4>Contatos de e-mail</h4>
                            <form name="login" id="contactForm" novalidate="">
                                <div class="row control-group">
                                    <div class="form-group col-xs-10 floating-label-form-group controls">
                                        <label for="name">E-mail</label>
                                        <input type="text" class="form-control" maxlength="4" name="email" placeholder="Digite um e-mail de contato" /> 
                                    </div>

                                    <div class="form-group col-xs-2">
                                            <input type="button"  class="btn btn-success btn-lg" value="Salvar" name="Enviar">
                                    </div>
                                </div>
                            </form>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <td>..</td>
                                        <td>..</td>
                                        <td>..</td>
                                        <td>..</td>
                                    </tr>
                                    <tr>
                                        <td>..</td>
                                        <td>..</td>
                                        <td>..</td>
                                        <td>..</td>
                                      
                                    </tr>
                                </table>
                            </div>
                            
                            
                            
                            <h4>Contatos telefonicos</h4>
                            <form name="login" id="contactForm" novalidate="">
                                <div class="row control-group">
                                    <div class="form-group col-xs-2 floating-label-form-group controls">
                                        <label for="name">DDD</label>
                                        <input type="text" class="form-control" maxlength="4" name="ddd" placeholder="DDD" /> 
                                    </div>
                                    <div class="form-group col-xs-8 floating-label-form-group controls">
                                        <label for="name">Telefone</label>
                                        <input type="text" class="form-control" maxlength="4" name="telefone" placeholder="Digite o Telefone" /> 
                                    </div>

                                    <div class="form-group col-xs-2">
                                            <input type="button"  class="btn btn-success btn-lg" value="Salvar" name="Enviar">
                                    </div>
                                </div>
                            </form>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <td>..</td>
                                        <td>..</td>
                                        <td>..</td>
                                        <td>..</td>
                                    </tr>
                                    <tr>
                                        <td>..</td>
                                        <td>..</td>
                                        <td>..</td>
                                        <td>..</td>
                                      
                                    </tr>
                                </table>
                            </div>
                        </div> <!-- FIM  -->
                        <div role="tabpanel" class="tab-pane" id="imagens"></div>
                        <div role="tabpanel" class="tab-pane" id="cidades"></div>
                        <div role="tabpanel" class="tab-pane" id="estilos">
                            <h4>Selecione os estilos que mais representam a sua banda</h4>
                            <form name="login" id="contactForm" novalidate="">
                                <div class="row control-group">
                                <?php
                                
                                
                                    $qtdcoluna = (int)(count($estilos) / 4);
                                    $qtdprimeiracoluna = count($estilos) - (((int)(count($estilos) / 4)) * 3);
                                    echo '<div class="form-group col-xs-3">';
                                    for($i = 0; $i < $qtdprimeiracoluna; $i++){
                                        echo '<div class="checkbox">
                                                <label>
                                                  ' . form_checkbox('estilo[]', $estilos[$i]['EstiloId'], False) . $estilos[$i]['Descricao'] .
                                                '</label>
                                               </div>'; 
                                    }
                                    echo '</div>';
                                    echo '<div class="form-group col-xs-3">';
                                    for($i = $qtdprimeiracoluna; $i < ($qtdprimeiracoluna + $qtdcoluna); $i++){
                                       echo '<div class="checkbox">
                                                <label>
                                                  ' . form_checkbox('estilo[]', $estilos[$i]['EstiloId'], False) . $estilos[$i]['Descricao'] .
                                                '</label>
                                               </div>';
                                    }
                                    echo '</div>';
                                    echo '<div class="form-group col-xs-3">';
                                    for($i = ($qtdprimeiracoluna + $qtdcoluna); $i < ($qtdprimeiracoluna + ($qtdcoluna * 2)); $i++){
                                      echo '<div class="checkbox">
                                                <label>
                                                  ' . form_checkbox('estilo[]', $estilos[$i]['EstiloId'], False) . $estilos[$i]['Descricao'] .
                                                '</label>
                                               </div>';
                                    }
                                    echo '</div>';
                                    echo '<div class="form-group col-xs-3">';
                                    for($i = ($qtdprimeiracoluna + ($qtdcoluna * 2)); $i < ($qtdprimeiracoluna + ($qtdcoluna * 3)); $i++){
                                       echo '<div class="checkbox">
                                                <label>
                                                  ' . form_checkbox('estilo[]', $estilos[$i]['EstiloId'], False) . $estilos[$i]['Descricao'] .
                                                '</label>
                                               </div>';
                                    }
                                    echo '</div>';
                                 ?>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-8">
                                        <input type="button"  class="btn btn-success btn-lg" value="Salvar" name="Enviar">
                                    </div>
                                </div>
                            </form>
                        </div> <!-- FIM DIV TAB ESTILOS -->
                        <div role="tabpanel" class="tab-pane" id="mensagens"></div>
                        <div role="tabpanel" class="tab-pane" id="agenda"></div>
                    </div> <!-- FIM DIV TAB CONTENTE -->
                </div>
            </div> <!-- FIM DIV ROW FORM-->
            
            

            
        </div><!-- FIM DIV CONTAINER-->
    </section>
