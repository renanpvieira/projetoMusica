<br /><br />
  <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 id="nome-banda-conf"><?php echo $banda['Nome']; ?></h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#configuracoes" aria-controls="configuracoes" role="tab" data-toggle="tab">Configurações</a></li>
                        <li role="presentation"><a href="#contatos" aria-controls="contatos" role="tab" data-toggle="tab">Contatos</a></li>
                        <li role="presentation"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Vídeos</a></li>
                        <li role="presentation"><a href="#imagens" aria-controls="imagens" role="tab" data-toggle="tab">Imagens</a></li>
                        <li role="presentation"><a href="#cidades" aria-controls="cidades" role="tab" data-toggle="tab">Cidades</a></li>
                        <li role="presentation"><a href="#estilos" aria-controls="estilos" role="tab" data-toggle="tab">Estilos</a></li>
                        <li role="presentation"><a href="#mensagens" aria-controls="mensagens" role="tab" data-toggle="tab">Mensagens</a></li>
                        <!--<li role="presentation"><a href="#agenda" aria-controls="agenda" role="tab" data-toggle="tab">Agenda</a></li>-->
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="configuracoes">
                            <form name="Configuracao" id="contactForm" novalidate="">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls" id="divlogin">
                                        <label for="name">Login / E-mail</label>
                                        <input type="text" class="form-control" maxlength="255" name="Login" value="<?php echo $bandaLogin;  ?>" placeholder="Digite um E-mail" /> 
                                    </div>
                                </div>

                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls" id="divnomebanda">
                                        <label for="name">Nome da banda</label>
                                        <input type="text" class="form-control" maxlength="50" name="Nome" placeholder="Nome da banda" value="<?php echo $banda['Nome'];  ?>" /> 
                                    </div>
                                </div>

                                <div class="row control-group">
                                    <div class="form-group col-xs-6 floating-label-form-group controls" id="divnumintegrantes">
                                        <label for="name">Número de integrantes</label>
                                        <input type="text" class="form-control" maxlength="2" name="NumIntegrantes" placeholder="Número de integrantes" value="<?php echo $banda['NumIntegrantes'];  ?>" /> 
                                    </div>
                                     <div class="form-group col-xs-6 floating-label-form-group controls" id="divpreco">
                                        <label for="name">Preço (Zero para a combinar)</label>
                                        <input type="text" class="form-control" maxlength="10" name="Preco" placeholder="Preço (Zero para a combinar)" value="<?php echo $banda['Preco'];  ?>" /> 
                                    </div>
                                </div>

                                 <div class="row control-group">
                                     <div class="form-group col-xs-6 floating-label-form-group controls" id="divfacebook">
                                        <label for="name">Facebook</label>
                                        <input type="text" class="form-control" maxlength="255" name="Facebook" placeholder="Digite a url do facebook" value="<?php echo $banda['Facebook'];  ?>" /> 
                                    </div>
                                     <div class="form-group col-xs-6 floating-label-form-group controls" id="divskype">
                                        <label for="name">Skype</label>
                                        <input type="text" class="form-control" maxlength="255" name="Skype" placeholder="Digite o Skype" value="<?php echo $banda['Skype'];  ?>" /> 
                                    </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-6 floating-label-form-group controls" id="divsite" >
                                        <label for="name">Site</label>
                                        <input type="text" class="form-control" maxlength="255" name="Site" placeholder="Digite o endereço do site" value="<?php echo $banda['Site'];  ?>" /> 
                                    </div>
                                     <div class="form-group col-xs-6 floating-label-form-group controls" id="divyoutube">
                                        <label for="name">Canal no youtube</label>
                                        <input type="text" class="form-control" maxlength="255" name="YoutubeCanal" placeholder="Canal no youtube" value="<?php echo $banda['YoutubeCanal'];  ?>" /> 
                                    </div>
                                </div>
                                
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls" id="divsobre" >
                                        <label for="name">Fale sobre a banda</label>
                                        <textarea class="form-control" name="Sobre" placeholder="Fale sobre a banda" ><?php echo $banda['Sobre'];  ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls" id="divexperiencia" >
                                        <label for="name">Fale sobre as experiências da banda</label>
                                        <textarea class="form-control" name="Experiencia" placeholder="Fale sobre as experiencias da banda" ><?php echo $banda['Experiencia'];  ?></textarea>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="form-group col-xs-8">
                                        <input type="button"  class="btn btn-success btn-lg" value="Salvar" name="Configuracao">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12" id="configuracaomsg"></div>
                                </div>
                            </form>
                        </div> <!-- FIM DIV TAB CONFIGURACOES -->
                        <div role="tabpanel" class="tab-pane" id="contatos">
                            <h4>Contatos de e-mail</h4>
                            <form name="form-mail" id="contactForm" novalidate="">
                                <div class="row control-group">
                                    <div class="form-group col-xs-10 floating-label-form-group controls">
                                        <label for="name">E-mail</label>
                                        <input type="text" class="form-control" maxlength="255" name="Email" placeholder="Digite um e-mail de contato" /> 
                                    </div>

                                    <div class="form-group col-xs-2">
                                         <input type="button"  class="btn btn-success btn-lg" value="Salvar" name="adicionaEmail">
                                    </div>
                                     <div class="row">
                                        <div class="form-group col-xs-12" id="adicionamailmsg"></div>
                                    </div>
                                </div>
                            </form>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tabela-mail">
                                <tr>
                                    <td>E-mail</td>
                                    <td></td>
                                </tr>
                                <?php
                                    
                                    if(count($emails) >= 1){
                                        foreach($emails as $mail){
                                          echo '<tr data-mail="' . $mail['BandaEmailId'] . '" ><td>' . $mail['Email'] . '</td><td class="grid-botoes"><input type="button"  data-mail="' . $mail['BandaEmailId'] . '" class="btn btn-success btn-xs" value="Deletar" name="deletemail"></td></tr>';
                                        }
                                    }else{
                                        echo '<tr><td colspan="2">Nenhum e-mail informado!</td></tr>';
                                    }
                                ?>
                                </table>
                            </div>
                            <br />
                            <h4>Contatos telefonicos</h4>
                            <form name="form-fone" id="contactForm" novalidate="">
                                <div class="row control-group">
                                    <div class="form-group col-xs-2 floating-label-form-group controls">
                                        <label for="name">DDD</label>
                                        <input type="text" class="form-control" maxlength="5" name="DDD" placeholder="DDD" /> 
                                    </div>
                                    <div class="form-group col-xs-8 floating-label-form-group controls">
                                        <label for="name">Telefone</label>
                                        <input type="text" class="form-control" maxlength="25" name="Numero" placeholder="Digite o Telefone" /> 
                                    </div>
                                    <div class="form-group col-xs-2">
                                            <input type="button"  class="btn btn-success btn-lg" value="Salvar" name="adicionafone">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-12" id="adicionafonemsg"></div>
                                    </div>
                                </div>
                            </form>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tabela-fone"> 
                                <tr>
                                    <td>DDD</td>
                                    <td>Número</td>
                                    <td></td>
                                </tr>
                                <?php
                                    if(count($telefones) >= 1){
                                        foreach($telefones as $tel){
                                          echo '<tr data-fone="' . $tel['BandaTelefoneId'] . '" ><td>' . $tel['DDD'] . '</td><td>' . $tel['Numero'] . '</td><td class="grid-botoes"><input type="button" data-fone="' . $tel['BandaTelefoneId'] . '" class="btn btn-success btn-xs btn-danger" value="Deletar" name="deletefone"></td></tr>';
                                        }
                                    }else{
                                        echo '<tr><td colspan="3">Nenhum telefone informado!</td></tr>';
                                    }
                                ?>
                                </table>
                            </div>
                        </div> <!-- FIM DIV TAB CONTATOS -->
                        
                        <div role="tabpanel" class="tab-pane" id="videos">
                            <form name="form-video" id="contactForm" novalidate="">
                                <div class="row control-group">
                                    <div class="form-group col-xs-10 floating-label-form-group controls">
                                        <label for="name">URL YOUTUBE</label>
                                        <input type="text" class="form-control" maxlength="255" name="URL" placeholder="Digite uma URL do youtube" /> 
                                    </div>

                                    <div class="form-group col-xs-2">
                                         <input type="button"  class="btn btn-success btn-lg" value="Salvar" name="adicionaVideo">
                                    </div>
                                     <div class="row">
                                        <div class="form-group col-xs-12" id="adicionavideomsg"></div>
                                    </div>
                                </div>
                            </form>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tabela-video">
                                <tr>
                                    <td>URL YOUTUBE</td>
                                    <td></td>
                                </tr>
                                <?php
                                    if(count($bandavideos) >= 1){
                                        foreach($bandavideos as $video){
                                          echo '<tr data-video="' . $video['BandaYoutubeId'] . '" ><td>' . $video['URL'] . '</td><td class="grid-botoes"><input type="button"  data-video="' . $video['BandaYoutubeId'] . '" class="btn btn-success btn-xs" value="Deletar" name="deletevideo"></td></tr>';
                                        }
                                    }else{
                                        echo '<tr><td colspan="2">Nenhum vídeo informado!</td></tr>';
                                    }
                                ?>
                                </table>
                            </div>
                            
                        </div> <!-- FIM DIV TAB VIDEOS -->
                        
                        <div role="tabpanel" class="tab-pane" id="imagens">
                           
                            <form name="form-uploadimg" method="post" id="contactForm" enctype="multipart/form-data" novalidate="" >
                                <div class="row control-group">
                                    <div class="form-group col-xs-10 floating-label-form-group controls">
                                        <input type="file" name="imagemupload" />
                                    </div>
                                    <div class="form-group col-xs-2">
                                       <input type="submit"  class="btn btn-success btn-lg" value="Enviar" name="adicionaimg" />
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-12" id="adicionauploadamsg"></div>
                                    </div>
                                </div>
                            </form>
                            
                            <div class="row grid-foto">
                                <?php
                                    foreach($bandafotos as $foto){
                                       echo '<div class="col-sm-6 col-md-3"  data-foto="' . $foto['FotoId'] . '">
                                                <div class="thumbnail ' . ($foto['Capa'] ? 'fotocapa': '') .  '">
                                                  <img src="' . base_url('content/imgs/bandas/' . $foto['Nome']) . '" alt="...">
                                                  <div class="caption">
                                                      <input type="button" data-foto="' . $foto['FotoId'] . '" class="btn btn-success btn-xs" value="Deletar" name="deletefoto">
                                                      <input type="button" data-foto="' . $foto['FotoId'] . '" class="btn btn-success btn-xs" value="Capa" name="adiconacapa">
                                                  </div>
                                                </div>
                                             </div>';
                                     }
                                ?>
                             </div>
                            
                            
                            
                        </div> <!-- FIM DIV TAB IMAGENS -->
                        <div role="tabpanel" class="tab-pane" id="cidades">
                            <h4>Selecione as cidades</h4>
                            <form name="form-cidade" id="contactForm" novalidate="">
                                <div class="row control-group">
                                    <div class="form-group col-xs-4 floating-label-form-group controls">
                                        <select class="form-control" id="selectuf" name="uf">
                                            <?php
                                               foreach($ufs as $uf){
                                                   echo '<option value="'. $uf['UFId'] .'">'. $uf['Descricao'] .'</option>';
                                               }
                                            ?>
                                        </select>
                                    </div>                                                                       
                                    <div class="form-group col-xs-6 floating-label-form-group controls">
                                        <select class="form-control" id="selectcidade" name="cidade"></select>
                                    </div>
                                    <div class="form-group col-xs-2 controls">
                                         <input type="button"  class="btn btn-success btn-lg" value="Salvar" name="adicionacidade">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-12" id="adicionacidademsg"></div>
                                    </div>
                                </div>
                            </form>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tabela-cidade"> 
                                <tr>
                                    <td>Estado</td>
                                    <td>Cidade</td>
                                    <td></td>
                                </tr>
                                <?php
                                    if(count($bandacidades) >= 1){
                                        foreach($bandacidades as $cit){
                                          echo '<tr data-cidade="' . $cit['BandaCidadeId'] . '" ><td>' . $cit['UFDescricao'] . '</td><td>' . $cit['CidadeDescricao'] . '</td><td class="grid-botoes"><input type="button" data-cidade="' . $cit['BandaCidadeId'] . '" class="btn btn-success btn-xs" value="Deletar" name="deletecidade"></td></tr>';
                                        }
                                    }else{
                                        echo '<tr><td colspan="3">Nenhuma cidade informado!</td></tr>';
                                    }
                                ?>
                                </table>
                            </div>
                        </div> <!-- FIM DIV TAB CIDADES -->
                        <div role="tabpanel" class="tab-pane" id="estilos">
                            <h4>Selecione os estilos que mais representam a sua banda</h4>
                            <form name="estilos" id="contactForm" novalidate="">
                                <div class="row control-group">
                                <?php
                                    foreach($estilos as $estilo){
                                        echo ' <div class="col-lg-3 col-md-4 col-xs-6">
                                                    <div class="checkbox checkboxmenor">
                                                        <label>' .  form_checkbox('estilo[]', $estilo['EstiloId'], $estilo['Checado']) .  $estilo['Descricao'] . '</label>
                                                    </div>
                                                </div>';
                                    }
                                 ?>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="form-group col-xs-8">
                                        <input type="button"  class="btn btn-success btn-lg" value="Salvar" name="estilos">
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="form-group col-xs-12" id="estilomsg"></div>
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
