<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Recuperar contraseña','Necesitamos comprobar tu identidad')
?>
<p>Ingresa tu correo electrónico asociado a tu cuenta. Te enviaremos un enlace para restablecer tu contraseña.</p>
<form>
    <!-- Formulario de recuperar contraseña -->
    <div class="form-group">
        <label for="exampleInputEmail1">Correo electrónico</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo electrónico">
    </div>
    <a class="btn btn-outline-purple btn-block" href="index.php" role="button">Cancelar</a>
    <a class="btn btn-purple btn-block" href="recover-pass.php" role="button">Enviar</a>
</form>
<?php
Page::footerSignIn('recoverpass.js');
?>

