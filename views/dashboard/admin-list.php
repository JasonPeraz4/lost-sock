<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Administradores');
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex align-items-end pb-md-3 pb-2">
        <!-- Encabezado -->
        <h3>Administradores</h3>
        <p class="mb-2 mx-2">10 en total</p>
    </div>
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <form action="#"class="mr-md-3">
            <input type="search" name="" class="form-control" id="buscarAdministrador" placeholder="Buscar administrador">
        </form>
        <!-- Grupo de dropdowns -->
        <div class="d-flex flex-row my-2 my-md-0">
            <!-- Dropdown filtrar por estado -->
            <div class="dropdown mx-md-2">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Estado
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Habilitado</a>
                    <a class="dropdown-item" href="#">Deshabilitado</a>
                </div>
            </div>
            <!-- Dropdown filtrar por tipo -->
            <div class="dropdown mx-2">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tipo
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Superadministrador</a>
                    <a class="dropdown-item" href="#">Administrador</a>
                </div>
            </div>    
        </div>
        <!-- Botón agregar -->
        <button type="button" class="btn btn-purple ml-md-auto my-auto" data-toggle="modal" data-target="#nuevoUsuario">
            Agregar
        </button>
    </div>
</div>
<table class="table table-responsive-sm table-hover">
    <thead>
        <tr>
            <th></th>
            <th>Información general</th>
            <th>Usuario</th>
            <th>Teléfono</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody class="table-bordered">
        <tr>
            <td><i class="fas fa-user-circle fa-3x mr-3 text-purple"></i></td>
            <td>
                <div>Jason Anthony Peraza Cruz</div>
                <div>jason@peraza.com</div>
            </td>
            <td>jasonperaza</td>
            <td>25252525</td>
            <td>Administrador</td>
            <td>
                <i class="fas fa-edit mx-1" data-toggle="modal" data-target="#nuevoUsuario"></i>
                <i class="fas fa-trash-alt" data-toggle="modal" data-target="#eliminarUsuario"></i>
            </td>
        </tr>
    </tbody>
</table>
<!-- Modal agregar usuario -->
<div class="modal fade" id="nuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="nuevoUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <!-- Titulo del modal -->
            <i class="fas fa-plus fa-lg my-auto mx-2"></i>
            <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body p-md-4">
            <!-- Formulario -->
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
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputTelefono">Teléfono</label>
                    <input type="text" class="form-control" placeholder="Telefono" id="inputEmail">
                </div>
                <div class="col-md-6 col-4 my-auto">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tipo
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Superadministrador</a>
                            <a class="dropdown-item" href="#">Administrador</a>
                            <a class="dropdown-item" href="#">Inhabilitado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-purple">Agregar</button>
        </div>
        </div>
    </div>
</div>
<!-- Modal deshabilitar usuario -->
<div class="modal fade" id="eliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="eliminarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <!-- Titulo del modal -->
            <i class="fas fa-exclamation fa-lg my-auto mx-2"></i>
            <h5 class="modal-title" id="exampleModalLabel">Deshabilitar usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body p-md-4">
            <!-- Mensaje de confirmación -->
            <p>¿Estas seguro que deseas deshabilitar el  usuario "Jason Peraza"?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-purple">Deshabilitar</button>
        </div>
        </div>
    </div>
</div>
<?php
Page::footerTemplate();
?>

