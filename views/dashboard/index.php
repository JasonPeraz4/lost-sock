<?php
require_once('../../core/helpers/admin-template.php');
Page::headerSignIn('Iniciar sesión', 'Iniciar sesión')
?>
<!-- Formulario de inicio de sesión -->
<form class="mb-4">
    <div class="form-group">
        <label for="exampleInputEmail1">Correo electrónico</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo electrónico">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
    </div>
    <a class="btn btn-purple btn-block" href="dashboard.php" role="button">Iniciar sesión</a>
</form>
<a href="recover-email.php">¿Has olvidado tu contraseña?</a>
<?php
Page::footerSignIn();
?>

