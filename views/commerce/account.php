<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Lost Sock');
?>
            <!-- Jumbotron -->
        <div class="jumbotron jumbotron-fluid jumbotron-cover cover-general bg--light-blue">
        </div>
        <div class="container cover--account">
            <div class="row">
                <div class="col-12 col-md-5 border mr-5 bg-white py-4 mb-sm-4 mb-md-0">
                    <div class="row d-flex justify-content-center">
                        <div class="sm-12 md-2 lg-2 columns">
                            <div class="circle position-relative mb-3 mx-auto">
                                <!-- Imagen de perfil del usuario -->
                                <img class="profile--pic d-flex justify-content rounded-circle mx-auto" src="../../resources/img/user.png">
                                <div class="image-upload p-image">
                                    <label for="file-input">
                                        <i class="fad fa-camera-alt camera--button"></i>
                                    </label>
                                    <input id="file-input" class="file-upload" type="file" accept="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="post" id="profile-form" class="p-3">
                        <h6 class="my-3 text-muted">INFORMACIÓN PERSONAL</h6>
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" placeholder="Nombres" id="nombres" name="nombres" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,25}$" title="Solo se permiten letras">
                            <div class="invalid-feedback">Solo se permiten letras</div>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,25}$" title="Solo se permiten letras">
                            <div class="invalid-feedback">Solo se permiten letras</div>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" placeholder="Teléfono" id="telefono" name="telefono" pattern="^[2,6,7]{1}[0-9]{3}[-][0-9]{4}$" title="Solo se permite número tenga el formato 0000-0000 y que inicie con 2, 6 o 7">
                            <div class="valid-feedback">Número de teléfono válido</div>
                            <div class="invalid-feedback">Número con formato 0000-0000 e inicie con 2, 6 o 7</div>
                        </div>
                        <h6 class="my-3 text-muted">INFORMACIÓN DE LA CUENTA</h6>
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" class="form-control" placeholder="Correo electrónico" id="email" name="email" title="Solo se permiten direcciones de correo válidas">
                        </div>
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" pattern="^[a-z0-9_-]{3,15}$" title="Solo se permiten letras, y los caracteres - y _">
                            <div class="valid-feedback">Nombre de usuario válido</div>
                            <div class="invalid-feedback">Solo se permiten letras, y los caracteres - y _</div>
                        </div> 
                        <button type="submit" class="btn custom--button text-white d-flex justify-content-center mx-auto">Actualizar</button>
                    </form>
                    <form method="post" id="password-form" class="p-3">
                        <h6 class="my-3 text-muted">ACCESO A LA CUENTA</h6>   
                        <div class="form-group">
                            <label for="clave">Contraseña actual</label>
                            <input type="password" class="form-control" id="clave" name="claveactual" placeholder="Contraseña actual" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                        </div>
                        <div class="form-group">
                            <label for="clave1">Nueva contraseña</label>
                            <input type="password" class="form-control" id="clave1" name="clave1" placeholder="Nueva contraseña" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                            <div class="valid-feedback">Contraseña segura</div>
                            <div class="invalid-feedback">Mínimo 8 caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial</div>
                        </div>
                        <div class="form-group">
                            <label for="clave2">Repetir contraseña</label>
                            <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repetir contraseña" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                        </div>
                        <button type="submit" class="btn custom--button text-white d-flex justify-content-center mx-auto">Actualizar</button>
                    </form>
                    
                </div>
                <div class="col-12 col-md-6 border bg-white py-4">
                    <form class="p-3">
                        <h6 class="my-3 text-muted">INFORMACIÓN DE ENVÍO</h6>
                        <!-- Input de direccion-->
                        <div class="form-group my-4 ">
                            <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección 1">
                        </div>
                        <!-- Input de departamento-->
                        <label for="inputCity" class="text-secondary">Departamento</label>
                        <select id="inputCity" class="form-control col-9 col-sm-7 col-md-6">
                            <option selected>San Salvador</option>
                            <option selected>San Miguel</option>
                        </select>
                        <!-- Input de direccion -->
                        <div class="form-group my-4">
                            <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección 2">
                        </div>
                        <!-- Input de departamento -->
                        <label for="inputCity" class="text-secondary">Departamento</label>
                        <select id="inputCity" class="form-control col-9 col-sm-7 col-md-6">
                            <option selected>San Salvador</option>
                            <option selected>San Miguel</option>
                        </select>
                        <!-- Input de direccion -->
                        <div class="form-group my-4">
                            <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección 3">
                        </div>
                        <!-- Input de departamento -->
                        <label for="inputCity" class="text-secondary">Departamento</label>
                        <select id="inputCity" class="form-control col-9 col-sm-7 col-md-6">
                            <option selected>San Salvador</option>
                            <option selected>San Miguel</option>
                        </select>
                        <!-- Input de direccion -->
                        <div class="form-group my-4">
                            <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección 4">
                        </div>
                        <!-- Input de departamento -->
                        <label for="inputCity" class="text-secondary">Departamento</label>
                        <select id="inputCity" class="form-control col-9 col-sm-7 col-md-6 mb-5">
                            <option selected>San Salvador</option>
                            <option selected>San Miguel</option>
                        </select>
                        <button type="submit" class="btn custom--button text-white d-flex justify-content-center mx-auto">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
<?php
Page::footerTemplate(null);
?>