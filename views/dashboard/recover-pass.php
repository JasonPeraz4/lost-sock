<?php
require_once('../../core/helpers/admin-template.php');
Page::headerSignIn('Restablece tu contraseña')
?>
<!-- Formulario para recuperar contraseña -->
<p>Ingresa una nueva contraseña segura. Tu contraseña debe tener minimo 8 carácteres: Una minuscula, una máyuscula, un número y un signo especial.</p>
<form>
    <div class="form-group">
        <label for="exampleInputPassword1">Nueva contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nueva contraseña">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword2">Repetir contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Repetir contraseña">
    </div>
    <a class="btn btn-outline-purple" href="index.html" role="button">Cancelar</a>
    <a class="btn btn-purple" href="index.html" role="button">Establecer</a>
</form>
<?php
Page::footerSignIn();
?>

