<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Recuperar contraseña');
?>
<div class="container-fluid">
    <div class="row justify-content-center my-auto">        
        <div class="col-xl-10 col-lg-12 col-md-9 login--container">
            <div class="card o-hidden border-0 shadow-lg mt-5 mb-n5">
                <div class="card-body mt-5">
                    <div class="row m-5">
                        <!--div que contiene la imagen que desaparece -->
                        <div class="col-lg-6 d-none d-lg-block login--image"></div>
                        <!-- Div de la derecha -->
                        <div class="col-lg-6 p-5">
                            <div class="d-flex flex-column justify-content-center my-auto">
                                <h3 class="mb-4 mx-auto">Recuperar contraseña</h3>
                                <p>Ingresa el código que recibiste en tu correo electrónico para poder restablecer tu contraseña.</p>
                                <form method="post" id="token-form" class="mb-4">
                                    <div class="form-group">
                                        <label for="token">Código de recuperación</label>
                                        <input type="text" class="form-control" id="token" name="token" placeholder="Código de recuperación">
                                    </div>
                                    <button type="submit" class="btn btn-primary custom--button float-none w-100 mt-3 text-white">Verificar código</button>
                                </form>
                                <a class="mx-auto mt-4" href="login.php"><small>Volver al <span class="text-purple">inicio de sesión</span></small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </div>
</div>
<?php
Page::footerTemplate('recoverpass.js');
?>

