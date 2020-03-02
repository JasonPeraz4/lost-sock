<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Configuración');
?>
<h2>Configuración de la cuenta</h2>
<p>Cambia tu foto de perfil y ajustes de la cuenta</p>

<form class="mt-4 mb-4">
    <div class="d-flex flex-row align-items-center">
        <h4 class="">Información general</h4>
        <div class="profile-photo-settings ml-auto"></div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputNombres">Nombres</label>
            <input type="text" class="form-control" placeholder="Nombres" id="inputNombres">
        </div>
        <div class="form-group col-md-6">
            <label for="inputApellidos">Apellidos</label>
            <input type="text" class="form-control" placeholder="Apellidos" id="inputApellidos">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail">Correo electrónico</label>
            <input type="email" class="form-control" placeholder="Correo electrónico" id="inputEmail">
        </div>
        <div class="form-group col-md-6">
            <label for="inputUsuario">Usuario</label>
            <input type="text" class="form-control" placeholder="Usuario" id="inputUsuario">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
<form action="cambiarClave" class="mt-4 mb-4">
    <h4>Contraseña</h4>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputClave">Contraseña</label>
            <input type="password" class="form-control" placeholder="Contraseña" id="inputClave">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputClave2">Nueva contraseña</label>
            <input type="password" class="form-control" placeholder="Nueva contraseña" id="inputClave2">
        </div>
        <div class="form-group col-md-6">
        <label for="inputClave3">Confirmar contraseña</label>
            <input type="password" class="form-control" placeholder="Repetir contraseña" id="inputClave3">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
<?php
Page::footerTemplate();
?>

