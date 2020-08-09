<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Recover password','We have to verify your identity')
?>
<p>Enter your email</p>
<form method="post" id="login-form" class="mb-4">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
    </div>
    <a class="btn btn-outline-purple btn-block" href="index.php" role="button">Cancel</a>
    <button type="submit" class="btn btn-purple btn-block">Send code</button>
</form>
<?php
Page::footerSignIn('recoverpass.js');
?>

