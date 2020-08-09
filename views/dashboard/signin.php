<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Sign in', 'Sign in')
?>
<!-- Formulario de inicio de sesión -->
<form method="post" id="signin-form">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nombres">Name</label>
            <input type="text" class="form-control" placeholder="Name" id="nombres" name="nombres" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'1','25'}$" title="Solo se permiten letras">
        </div>
        <div class="form-group col-md-6">
            <label for="apellidos">Surname</label>
            <input type="text" class="form-control" placeholder="Surname" id="apellidos" name="apellidos" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'1','25'}$" title="Solo se permiten letras">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" placeholder="Email" id="email" name="email" title="Solo se permiten direcciones de correo válidas">
        </div>
        <div class="form-group col-md-6">
            <label for="usuario">User</label>
            <input type="text" class="form-control" placeholder="User" id="usuario" name="usuario" pattern="^[a-z0-9_-]{3,15}$" title="Solo se permiten letras, y los caracteres - y _">
        </div>  
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="clave1">New password</label>
            <input type="password" class="form-control" id="clave1" name="clave1" placeholder="New password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
        </div>
        <div class="form-group col-md-6">
            <label for="clave2">Repeat password</label>
            <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repeat password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
        </div>
    </div>
    <button type="submit" class="btn btn-purple btn-block mt-2">Sign in</button>
</form>
<?php
Page::footerSignIn('signin.js');
?>

