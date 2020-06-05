<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Registrarse', 'Registrarse')
?>
<!-- Formulario de inicio de sesión -->
<form method="post" id="signin-form">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control" placeholder="Nombres" id="nombres" name="nombres">
        </div>
        <div class="form-group col-md-6">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" placeholder="Correo electrónico" id="email" name="email">
        </div>
        <div class="form-group col-md-6">
            <label for="inputUsuario">Usuario</label>
            <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario">
        </div>  
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="clave1">Nueva contraseña</label>
            <input type="password" class="form-control" id="clave1" name="clave1" placeholder="Nueva contraseña">
        </div>
        <div class="form-group col-md-6">
            <label for="clave2">Repetir contraseña</label>
            <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repetir contraseña">
        </div>
    </div>
    <button type="submit" class="btn btn-purple btn-block mt-2">Registrarse</button>
</form>
<?php
Page::footerSignIn('signin.js');
?>

