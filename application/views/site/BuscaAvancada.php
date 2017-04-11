<br />
<br />
<!-- Contact Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form name="form-buscaavancada" role="form">  
                        <div class="row">
                            <div class="col-xs-4">
                            <div class="input-group input-group-lg">
                              <select class="form-control" name="ufs" id="selectuf">
                                    <?php
                                        foreach($ufs as $uf){
                                             echo '<option value="'. $uf['UFId'] .'">'. $uf['Descricao'] .'</option>';
                                        }
                                    ?>
                              </select>
                              <div class="input-group-btn">
                                <input type="button"  class="btn btn-success" value="Adicionar" name="btn-uf">
                              </div><!-- /btn-group -->
                            </div><!-- /input-group -->
                          </div><!-- /.col-xs-12 -->
                          
                          <div class="col-xs-4">
                            <div class="input-group input-group-lg">
                               <select class="form-control" name="cidades" id="selectcidade"></select>
                              <div class="input-group-btn">
                                  <input type="button"  class="btn btn-success" value="Adicionar" name="btn-cidade">
                              </div><!-- /btn-group -->
                            </div><!-- /input-group -->
                          </div><!-- /.col-xs-12 -->
                          
                           <div class="col-xs-4">
                            <div class="input-group input-group-lg">
                                <select class="form-control" name="estilos">
                                   <?php
                                        foreach($estilos as $est){
                                             echo '<option value="'. $est['EstiloId'] .'">'. $est['Descricao'] .'</option>';
                                        }
                                    ?>
                                  </select>
                              <div class="input-group-btn">
                                <input type="button"  class="btn btn-success" value="Adicionar" name="btn-estilo">
                              </div><!-- /btn-group -->
                            </div><!-- /input-group -->
                          </div><!-- /.col-xs-12 -->
                        </div><!-- /.row -->
                    </form>
                    <div class="row filtros" id="filtros"></div>
                    <br />
                    <br />
                    <div class="row" id="listabandas"></div>
                    <span id="load" class="col-lg-12 text-center"></span> 
                    
                    
                </div>
            </div>
        </div>
    </section>
