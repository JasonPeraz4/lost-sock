<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Tipos de usuario');
?>
<div class="d-flex flex-row align-items-center mb-4">
    <h2>Tipo de usuario</h2>
    <p class="mr-auto ml-2 my-auto">4 en total</p>
    <button type="button" class="btn btn-purple" data-toggle="modal" data-target="#nuevoTipoU">
        Agregar
    </button>
    <!-- Modal agregar tipo de usuario -->
    <div class="modal fade" id="nuevoTipoU" tabindex="-1" role="dialog" aria-labelledby="nuevoTIpoUlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-plus fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="exampleModalLabel">Nuevo tipo de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <p>Ingresa el nombre del nuevo tipo de usuario</p>
                <form action="addUser">
                    <div class="form-group">
                        
                        <input type="text" class="form-control" placeholder="Tipo de usuario" id="inputUsuario">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-purple">Agregar</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal eliminar tipo de usuario -->
    <div class="modal fade" id="eliminarTipoU" tabindex="-1" role="dialog" aria-labelledby="eliminarTIpoUlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-trash fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="exampleModalLabel">Eliminar tipo de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <p>¿Estas seguro que deseas eliminar el tipo de usuario "Administrador"?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-purple">Eliminar</button>
            </div>
            </div>
        </div>
    </div>     
</div>
<div class="row">
    <div class="col-md-4">
        <form action="searchTypeUser" class="my-4">
            <input type="text" class="form-control" placeholder="Buscar un tipo" id="searchUserType">
        </form>
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active" id="list-home-list" data-toggle="list" href="#list-superadministrador" role="tab" aria-controls="home">
                Superadministrador
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarTipoU"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" id="list-profile-list" data-toggle="list" href="#list-administrador" role="tab" aria-controls="profile">
                Administrador
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarTipoU"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" id="list-messages-list" data-toggle="list" href="#list-gerente" role="tab" aria-controls="messages">
                Gerente
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarTipoU"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" id="list-settings-list" data-toggle="list" href="#list-empleado" role="tab" aria-controls="settings">
                Empleado
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarTipoU"></span>
            </a>
        </div>
    </div>
    <div class="col-md-8 p-4">
        <div class="tab-content tab-1" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-superadministrador" role="tabpanel" aria-labelledby="list-home-list">
                <div class="d-flex flex-row align-items-center">
                    <h4 class="my-auto mx-2">Superadministrador</h4>
                    <span class="fas fa-edit fa-lg mx-2" data-toggle="modal" data-target="#nuevoTipoU"></span>
                    <span class="fas fa-user fa-3x mx-1 mx-md-4"></span>
                </div>
                <h5 class="my-4 p-1">Permisos</h5>
                <div class="my-2 p-1">
                    <ul class="list-group checked-list-box">
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultChecked1" checked>
                                <label class="custom-control-label" for="defaultChecked1">Dashboard</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked1">
                                <label class="custom-control-label" for="defaultUnchecked1">Pedidos</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked2">
                                <label class="custom-control-label" for="defaultUnchecked2">Suscripciones</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked3">
                                <label class="custom-control-label" for="defaultUnchecked3">Clientes</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked4">
                                <label class="custom-control-label" for="defaultUnchecked4">Administradores</label>
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="btn btn-purple my-3">Guardar</button>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-administrador" role="tabpanel" aria-labelledby="list-home-list">
                <div class="d-flex flex-row align-items-center">
                    <h4 class="my-auto mx-2">Administrador</h4>
                    <span class="fas fa-edit fa-lg mx-2" data-toggle="modal" data-target="#nuevoTipoU"></span>
                    <span class="fas fa-user fa-3x mx-4"></span>
                </div>
                <h5 class="my-4 p-1">Permisos</h5>
                <div class="my-2 p-1">
                    <ul class="list-group checked-list-box">
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultChecked1" checked>
                                <label class="custom-control-label" for="defaultChecked1">Dashboard</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked1">
                                <label class="custom-control-label" for="defaultUnchecked1">Pedidos</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked2">
                                <label class="custom-control-label" for="defaultUnchecked2">Suscripciones</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked3">
                                <label class="custom-control-label" for="defaultUnchecked3">Clientes</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked4">
                                <label class="custom-control-label" for="defaultUnchecked4">Administradores</label>
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="btn btn-purple my-3">Guardar</button>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-gerente" role="tabpanel" aria-labelledby="list-home-list">
                <div class="d-flex flex-row align-items-center">
                    <h4 class="my-auto mx-2">Gerente</h4>
                    <span class="fas fa-edit fa-lg mx-2" data-toggle="modal" data-target="#nuevoTipoU"></span>
                    <span class="fas fa-user fa-3x mx-4"></span>
                </div>
                <h5 class="my-4 p-1">Permisos</h5>
                <div class="my-2 p-1">
                    <ul class="list-group checked-list-box">
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultChecked1" checked>
                                <label class="custom-control-label" for="defaultChecked1">Dashboard</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked1">
                                <label class="custom-control-label" for="defaultUnchecked1">Pedidos</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked2">
                                <label class="custom-control-label" for="defaultUnchecked2">Suscripciones</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked3">
                                <label class="custom-control-label" for="defaultUnchecked3">Clientes</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked4">
                                <label class="custom-control-label" for="defaultUnchecked4">Administradores</label>
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="btn btn-purple my-3">Guardar</button>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-empleado" role="tabpanel" aria-labelledby="list-home-list">
                <div class="d-flex flex-row align-items-center">
                    <h4 class="my-auto mx-2">Empleado</h4>
                    <span class="fas fa-edit fa-lg mx-2" data-toggle="modal" data-target="#nuevoTipoU"></span>
                    <span class="fas fa-user fa-3x mx-4"></span>
                </div>
                <h5 class="my-4 p-1">Permisos</h5>
                <div class="my-2 p-1">
                    <ul class="list-group checked-list-box">
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultChecked1" checked>
                                <label class="custom-control-label" for="defaultChecked1">Dashboard</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked1">
                                <label class="custom-control-label" for="defaultUnchecked1">Pedidos</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked2">
                                <label class="custom-control-label" for="defaultUnchecked2">Suscripciones</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked3">
                                <label class="custom-control-label" for="defaultUnchecked3">Clientes</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked4">
                                <label class="custom-control-label" for="defaultUnchecked4">Administradores</label>
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="btn btn-purple my-3">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
Page::footerTemplate();
?>

