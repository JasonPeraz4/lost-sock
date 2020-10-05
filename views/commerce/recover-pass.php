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
                                <!-- Formulario para recuperar contraseña -->
                                <h3 class="mb-4 mx-auto">Restablecer contraseña</h3>
                                <p>Ingresa una nueva contraseña segura. Tu contraseña debe tener como mínimo 8 caracteres: Una minúscula, una máyuscula, un número y un signo especial.</p>
                                <form method="post" id="recoverpass-form">
                                    <div class="form-group">
                                        <label for="clave1">Nueva contraseña</label>
                                        <input type="password" class="form-control" id="clave1" placeholder="Nueva contraseña" name="clave1">
                                    </div>
                                    <div class="form-group">
                                        <label for="clave2">Repetir contraseña</label>
                                        <input type="password" class="form-control" id="clave2" placeholder="Repetir contraseña" name="clave2">
                                    </div>
                                    <button type="submit" class="btn btn-primary custom--button float-none w-100 mt-3 text-white">Restablecer contraseña</button>
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

