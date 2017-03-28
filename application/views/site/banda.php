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
                    <div class="col-xs-12">
                        <p class="banda-sobre"><?php echo $banda['Sobre']; ?></p>
                        <br />
                    </div>
                   
                    <div class="col-xs-12 banda_detalhe">
                        <div class="col-xs-4 banda_detalhe">
                            <h5>Site</h5>    
                            <p><?php echo ((is_null($banda['Site']))? 'Não informado': $banda['Site']); ?></p>    
                            <br />
                            <h5>Facebook</h5>    
                            <p><?php echo ((is_null($banda['Facebook']))? 'Não informado': $banda['Facebook']); ?></p>    
                            <br />
                            <h5>Canal no youtube</h5>    
                            <p><?php echo ((is_null($banda['YoutubeCanal']))? 'Não informado': $banda['YoutubeCanal']); ?></p>
                            <br />
                            <h5>Skype</h5>    
                            <p><?php echo ((is_null($banda['Skype']))? 'Não informado': $banda['Skype']); ?></p>
                        </div>

                        <div class="col-xs-4 banda_detalhe">
                            <h5>Estilos</h5>    
                            <p><?php echo ((is_null($banda['Estilos']))? 'Não informado': $banda['Estilos']); ?></p>   
                            <br />
                            <h5>Cidades</h5>    
                            <p><?php echo ((is_null($banda['Cidades']))? 'Não informado': $banda['Cidades']); ?></p> 
                            <br />
                            <h5>Preço</h5>    
                            <p><?php echo (($banda['Preco'] == 0)? 'A combinar': $banda['Preco']); ?></p>    
                        </div>

                        <div class="col-xs-4 banda_detalhe">
                            <h5>Telefones</h5>
                            <?php
                               if(count($telefones) >= 1){
                                   foreach($telefones as $tel){
                                     echo '<p>(' . $tel['DDD'] . ') ' . $tel['Numero'] . '</p>';
                                   }
                               }else{
                                   echo '<p>Nenhum telefone informado!</p>';
                               }
                            ?>
                            <br />
                            <h5>E-mails</h5>
                            <?php
                               if(count($emails) >= 1){
                                   foreach($emails as $tel){
                                     echo '<p>' . $tel['Email'] . '</p>';
                                   }
                               }else{
                                   echo '<p>Nenhum e-mail informado!</p>';
                               }
                            ?>
                        </div>
                    </div>               

                    <div class="col-xs-12 banda_detalhe">
                       <br />
                       <br />
                       <h5>Experiência</h5>  
                       <p class="banda-experiencia"><?php echo $banda['Experiencia']; ?></p>
                       
                       <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.globo.com&width=141&layout=button&action=like&show_faces=true&share=true&height=65&appId" width="141" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                   </div>
                    
                    <?php 
                   
                        if(count($videos) >= 1 ){
                           echo '<div class="col-xs-12 banda_detalhe">
                                    <br />
                                    <br />
                                    <h5>GALERIA DE Vídeos</h5> ';
                           
                                foreach ($videos as $v){
                                    echo '<div class="col-lg-4 col-md-3 col-xs-6 thumb"> <iframe width="100%" src="'. $v['URL'] .'"> </iframe> </div>';
                                }
                           echo '</div>';
                       }
                   
                       if(count($fotos) >= 1 ){
                           echo '<div class="col-xs-12 banda_detalhe">
                                    <br />
                                    <br />
                                    <h5>GALERIA DE FOTOS</h5> ';
                                foreach ($fotos as $f){
                                    echo ' <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                              <a class="thumbnail" href="#"> <img class="img-responsive" src="' . base_url('content/imgs/' . $f['Nome']) . '" alt=""></a>
                                           </div>';
                                }
                           echo '</div>';
                       }
                       
                        if(count($comentarios) >= 1 ){
                           echo '<div class="col-xs-12 banda_detalhe">
                                    <br />
                                    <br />
                                    <h5>O que estão falando sobre '. $banda['Nome'] .'</h5> ';
                                foreach ($comentarios as $c){
                                    echo '<p>"<i>' . $c['Texto'] . '</i>"<br /><b>'. $c['FromNome'] .'</b></p><br />';
                                }
                           echo '</div>';
                       }
                    ?>
                    
                </div> 
            </div> <!-- FIM DIV ROW FORM-->
            
            

            
        </div><!-- FIM DIV CONTAINER-->
    </section>

