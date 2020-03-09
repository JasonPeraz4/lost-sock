<?php
require_once('../../core/helpers/admin-template.php');
Page::headerSignIn('Necesitamos comprobar tu identidad')
?>
<p>Ingresa tu correo electrónico asociado a tu cuenta. Te enviaremos un enlace para restablecer tu contraseña.</p>
<form>
    <!-- Formulario de recuperar contraseña -->
    <div class="form-group">
        <label for="exampleInputEmail1">Correo electrónico</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar correo electrónico">
    </div>
    <a class="btn btn-outline-purple" href="index.html" role="button">Cancelar</a>
    <a class="btn btn-purple" href="recover-pass.php" role="button">Enviar</a>
</form>
<?php
Page::footerSignIn();
?>

