<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Restablecer contraseña','Restablece tu contraseña')
?>
<!-- Formulario para recuperar contraseña -->
<p>Enter a new safe password</p>
<form method="post" id="recoverpass-form">
    <div class="form-group">
        <label for="clave1">New password</label>
        <input type="password" class="form-control" id="clave1" placeholder="New password" name="clave1">
    </div>
    <div class="form-group">
        <label for="clave2">Repeat password</label>
        <input type="password" class="form-control" id="clave2" placeholder="Repeat password" name="clave2">
    </div>
    <a class="btn btn-outline-purple btn-block" href="index.php" role="button">Cancel</a>
    <button type="submit" class="btn btn-purple btn-block mt-2">Save</button>
</form>
<?php
Page::footerSignIn('recoverpass.js');
?>

