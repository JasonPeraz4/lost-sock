<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Colores');
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h2>Colores</h2>
        <p class="mx-2 my-auto">4 en total</p>
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <form action="searchAdmin" class="mx-md-2">
            <input type="text" class="form-control" placeholder="Buscar color" id="searchAdmin">
        </form>
        <button type="button" class="btn btn-purple mx-2" data-toggle="modal" data-target="#nuevoColor">
            Agregar
        </button>
    </div>
    <!-- Modal agregar tipo de producto -->
    <div class="modal fade" id="nuevoColor" tabindex="-1" role="dialog" aria-labelledby="nuevoTIpoUlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-plus fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="exampleModalLabel">Nuevo color de producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <p>Ingresa el nombre del nuevo color</p>
                <form action="addUser">
                    <div class="form-group">
                        
                        <input type="text" class="form-control" placeholder="Color" id="inputUsuario">
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
    <!-- Modal eliminar color de producto -->
    <div class="modal fade" id="eliminarColor" tabindex="-1" role="dialog" aria-labelledby="eliminarTIpoUlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-trash fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="exampleModalLabel">Eliminar color de producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <p>¿Estas seguro que deseas eliminar el color "Rojo"?</p>
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
    <div class="col-md-5"> 
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Rojo
                <span class="fas fa-edit fa-sm ml-auto mr-2" data-toggle="modal" data-target="#nuevoColor"></span>
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarColor"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Azul
                <span class="fas fa-edit fa-sm ml-auto mr-2" data-toggle="modal" data-target="#nuevoColor"></span>
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarColor"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Amarillo
                <span class="fas fa-edit fa-sm ml-auto mr-2" data-toggle="modal" data-target="#nuevoColor"></span>
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarColor"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Verde
                <span class="fas fa-edit fa-sm ml-auto mr-2" data-toggle="modal" data-target="#nuevoColor"></span>
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarColor"></span>
            </a>
        </div>
    </div>
</div>    
<?php
Page::footerTemplate();
?>

