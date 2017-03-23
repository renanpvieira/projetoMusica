<?php
    
 
    

    foreach($ufs as $v){
        

        echo form_checkbox('uf[]', $v['UFid'], False, 'data="uf"' );
        echo form_label($v['Descricao']);
    }

    foreach($estilos as $v){
        echo form_checkbox('estilo[]', $v['EstiloId'], False);   
        echo form_label($v['Descricao']);
    }
    
   
   echo '<ul>';
   foreach($bandas as $v){
        echo '<li> 
                  <p>Nome: ' . $v['Nome'] . '</p>
                  <p>Integrantes: ' . $v['NumIntegrantes'] . '</p>
                  <p>Estrelas: ' . $v['Estrelas'] . '</p>
                  <p>Foto: ' . $v['foto'] . '</p>
                  <p>Cidades: ' . $v['cidades'] . '</p>
                  <p>Estilos: ' . $v['estilos'] . '</p>
              </li>';
    }
    echo '</ul>';




?>

  <div id="cidade">
     

  </div>
