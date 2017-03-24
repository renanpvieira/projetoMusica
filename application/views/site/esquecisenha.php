<form name="esquecisenha" >
   <input type="hidden" name="Chave" value="<?php echo $chave; ?>" /> 
    
   <label>Login</label>
   <input type="text" maxlength="12" name="Login" />
   
   <label>Digite o texto na imagem</label>
   <input type="text" maxlength="12" name="Imagem" />
   
   <input type="button" value="Enviar" name="Enviar">
   <img src="<?php  echo $image; ?>" />
   
</form>
<div id="esquecisenha"></div>