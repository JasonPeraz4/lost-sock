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
        <div class="form-group col-md-12">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" placeholder="Correo electrónico" id="email" name="email">
        </div>  
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputUsuario">Usuario</label>
            <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario">
        </div>
        <div class="form-group col-md-6">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" placeholder="Teléfono" id="telefono" name="telefono">
        </div>
    </div>
    <button type="submit" class="btn btn-purple btn-block mt-2">Registrarse</button>
</form>
<?php
Page::footerSignIn('signin.js');
?>

