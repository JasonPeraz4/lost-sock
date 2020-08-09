<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Recuperar contraseña','Necesitamos comprobar tu identidad')
?>
<p>Enter code</p>
<form method="post" id="login-form" class="mb-4">
    <div class="form-group">
        <label for="codigo">Recovery code</label>
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código de recuperación">
    </div>
    <a class="btn btn-outline-purple btn-block" href="recover-email.php" role="button">Back</a>
    <button type="submit" class="btn btn-purple btn-block">Verify code</button>
</form>
<?php
Page::footerSignIn('recoverpass.js');
?>

