<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Administradores');
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-wrap flex-row align-items-center mb-2">
        <h2>Administradores</h2>
        <p class="mx-2 my-auto">4 en total</p>
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tipo
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Superadministrador</a>
                <a class="dropdown-item" href="#">Administrador</a>
                <a class="dropdown-item" href="#">Inhabilitado</a>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <form action="searchAdmin" class="mx-2">
            <input type="text" class="form-control" placeholder="Buscar un administrador" id="searchAdmin">
        </form>
        <button type="button" class="btn btn-purple mx-2" data-toggle="modal" data-target="#modalNuevoUsuario">
            Agregar
        </button>
        <!-- Modal agregar usuario -->
        <div class="modal fade" id="modalNuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="nuevoUsuarioLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <i class="fas fa-plus fa-lg my-auto mx-2"></i>
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-md-4">
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
                    <i class="fas fa-exclamation fa-lg my-auto mx-2"></i>
                    <h5 class="modal-title" id="exampleModalLabel">Deshabilitar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-md-4">
                    <p>¿Estas seguro que deseas deshabilitar el  usuario "Jason Peraza"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-purple">Deshabilitar</button>
                </div>
                </div>
            </div>
        </div>
    </div>       
</div>
<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="d-flex flex-row my-auto">
            <i class="fas fa-user-circle fa-3x mr-3 text-purple"></i>
            <div class="">
            <p class="my-auto">Jason Anthony Peraza Cruz</p>
            <p class="my-auto">jason@peraza.com</p>
            </div>
        </div>
        <p class="my-auto">jasonperaza</p>
        <p class="my-auto">2525-2525</p>
        <div class="d-flex flex-row align-items-center">
            <p class="my-auto">Superadministrador</p>
            <span class="fas fa-edit fa-sm mx-3" data-toggle="modal" data-target="#modalNuevoUsuario"></span>
            <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarUsuario"></span>
        </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="d-flex flex-row my-auto">
            <i class="fas fa-user-circle fa-3x mr-3 text-purple"></i>
            <div class="">
            <p class="my-auto">Eduardo David Estrada Rivera</p>
            <p class="my-auto">eduardo@estrada.com</p>
            </div>
        </div>
        <p class="my-auto">eduardoestrada</p>
        <p class="my-auto">2525-2525</p>
        <div class="d-flex flex-row align-items-center">
            <p class="my-auto">Superadministrador</p>
            <span class="fas fa-edit fa-sm mx-3" data-toggle="modal" data-target="#modalNuevoUsuario"></span>
            <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarUsuario"></span>
        </div>
    </a>
</div>
<?php
Page::footerTemplate();
?>

