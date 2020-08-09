<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Login', 'Login')
?>
<!-- Formulario de inicio de sesión -->
<form method="post" id="login-form" class="mb-4">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" title="Solo se permiten direcciones de correo válidas">
    </div>
    <div class="form-group">
        <label for="clave">Password</label>
        <input type="password" class="form-control" id="clave" name="clave" placeholder="Password"  pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
    </div>
    <button type="submit" class="btn btn-purple btn-block">Login</button>
</form>
<a href="recover-email.php">Forgot your password?</a>
<?php
Page::footerSignIn('index.js');
?>

