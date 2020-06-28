<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Ajustes | Lost Sock');
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
                <h6 class="mt-3 mb-2 text-muted">INFORMACIÓN PERSONAL</h6>
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
                <h6 class="mb-3 text-muted">ACCESO A LA CUENTA</h6>   
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
            <form method="post" class="p-3" id="direcciones-form">
                <h6 class="mb-3 text-muted">INFORMACIÓN DE ENVÍO <small id="lblAgregar" onclick="openCreateModal()" class="ml-auto text-purple"><a href="#">Agregar dirección</a></small> </h6>
                <div id="direcciones-body">
                    <!-- <div class="form-group">
                        <label for="direccion1">Dirección 1</label><i class="fad fa-pen mx-1 text-purple" onclick="openUpdateModal()"></i>
                        <textarea class="form-control" rows="2" id="direccion1" disabled></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="departamento1">Departamento</label>
                            <select class="form-control" id="departamento1" disabled>
                            </select>
                        </div>
                    </div> -->
                    <h6>No hay direcciones agregadas</h6>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal agregar dirección -->
<div class="modal fade" id="save-modal" tabindex="-1" role="dialog" aria-labelledby="save-modal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="post" novalidate="" id="save-form">
        <div class="modal-body p-md-4">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="d-none" type="text" id="iddireccion" name="iddireccion"/>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <textarea class="form-control" rows="2" id="direccion" name="direccion" pattern="^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s]{1,120}$" title="Solo se permiten letras y números"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="departamento_direccion">Departamento</label>
                    <select class="form-control" id="departamento_direccion" name="departamento_direccion">
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-purple">Guardar</button>
        </div>
    </form>   
    </div>
</div>
</div>
<?php
Page::footerTemplate(null);
?>