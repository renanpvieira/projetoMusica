<form name="login" >
   <label>Login</label>
   <input type="text" maxlength="12" name="Login" />
   <label>Senha</label>
   <input type="password" maxlength="12" name="Senha" />
   <!-- <a href="#">Enviar</a> -->
   <input type="button" value="Enviar" name="Enviar">
</form>
<a href="<?php echo site_url('esquecisenha');?>">esqueci a senha</a>
<div id="login"></div>