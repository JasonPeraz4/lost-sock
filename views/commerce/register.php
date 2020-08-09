<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Regístrarse | Lost Sock');
?>
<div class="container-fluid">
    <div class="row justify-content-center my-auto">        
        <div class="col-xl-10 col-lg-12 col-md-9 login--container">
            <div class="card o-hidden border-0 shadow-lg mt-4">
                <div class="card-body mt-5">
                    <div class="row">
                        <!--div que contiene la imagen que desaparece -->
                        <div class="col-lg-6 d-none d-lg-block login--image"></div>
                        <!-- Div de la derecha -->
                        <div class="col-lg-6 p-md-5">
                            <div class="d-flex flex-column justify-content-center my-auto">
                                <h3 class="mb-4 mx-auto">Sign in</h3>
                                <form method="post" id="signin-form" class="p-md-4">
                                    <div class="form-group">
                                        <label for="nombre">Name</label>
                                        <input type="text" class="form-control" placeholder="Name" id="nombre" name="nombre" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,25}$" title="Solo se permiten letras">
                                        <div class="invalid-feedback">Solo se permiten letras</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido">Surname</label>
                                        <input type="text" class="form-control" placeholder="Surname" id="apellido" name="Surname" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,25}$" title="Solo se permiten letras">
                                        <div class="invalid-feedback">Solo se permiten letras</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Phone number</label>
                                        <input type="text" class="form-control" placeholder="Phone number" id="telefono" name="telefono" pattern="^[2,6,7]{1}[0-9]{3}[-][0-9]{4}$" title="Solo se permite número tenga el formato 0000-0000 y que inicie con 2, 6 o 7">
                                        <div class="valid-feedback">Número de Phone number válido</div>
                                        <div class="invalid-feedback">Número con formato 0000-0000 e inicie con 2, 6 o 7</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" placeholder="Email" id="email" name="email" title="Solo se permiten direcciones de correo válidas">
                                    </div>
                                    <div class="form-group">
                                        <label for="usuario">User</label>
                                        <input type="text" class="form-control" placeholder="User" id="usuario" name="usuario">
                                        <div class="valid-feedback">Nombre de usuario válido</div>
                                        <div class="invalid-feedback">Solo se permiten letras, y los caracteres - y _</div>
                                    </div>  
                                    <div class="form-group">
                                        <label for="clave1">Password</label>
                                        <input type="password" class="form-control" id="clave1" name="clave1" placeholder="Password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                                        <div class="valid-feedback">Contraseña segura</div>
                                        <div class="invalid-feedback">Mínimo 8 caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="clave2">Repeat password</label>
                                        <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repeat password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="condiciones" name="condiciones">
                                            <label class="custom-control-label" for="condiciones"> <a href="conditions.php">I have read and accept the <span class="text-purple">terms and conditions</span></a></label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn- primary custom--button float-none w-100 mt-3 text-white">Sign in</button>
                                </form>
                                <a class="mx-auto mt-4" href="login.php"><small>Already have an account?  <span class="text-purple">Log in here</span></small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </div>
</div>
<?php
Page::footerTemplate('register.js');
?>

