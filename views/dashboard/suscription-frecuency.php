<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Frecuencias de suscripción', null);
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h2>Frecuencia</h2>
        <p class="mx-2 my-auto">4 en total</p>
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <!-- Campo para buscar frecuencias -->
        <form action="searchAdmin" class="mx-md-2">
            <input type="text" class="form-control" placeholder="Buscar frecuencia" id="searchAdmin">
        </form>
        <!-- Bton para llamar modal de agregar frecuencia -->
        <button type="button" class="btn btn-purple mx-2" data-toggle="modal" data-target="#nuevaFrecuencia">
            Agregar
        </button>
    </div>
    <!-- Modal agregar frecuencia -->
    <div class="modal fade" id="nuevaFrecuencia" tabindex="-1" role="dialog" aria-labelledby="nuevoTIpoUlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-plus fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="exampleModalLabel">Nueva frecuencia de envio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <p>Ingresa el nombre de la nueva frecuencia de envio</p>
                <form action="addUser">
                    <div class="form-group">
                        
                        <input type="text" class="form-control" placeholder="Frecuencia de envio" id="inputUsuario">
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
    <!-- Modal agregar frecuencia -->
    <div class="modal fade" id="eliminarFrecuencia" tabindex="-1" role="dialog" aria-labelledby="eliminarTIpoUlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-trash fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="exampleModalLabel">Eliminar frecuencia de envio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <p>¿Estas seguro que deseas eliminar la frecuencia "Quincenalmente"?</p>
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
            <!-- Lista de frecuencias -->
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Bimensualmente
                <span class="fas fa-edit fa-sm ml-auto mr-2" data-toggle="modal" data-target="#nuevaFrecuencia"></span>
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarFrecuencia"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Quincenalmente
                <span class="fas fa-edit fa-sm ml-auto mr-2" data-toggle="modal" data-target="#nuevaFrecuencia"></span>
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarFrecuencia"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Mensualmente
                <span class="fas fa-edit fa-sm ml-auto mr-2" data-toggle="modal" data-target="#nuevaFrecuencia"></span>
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarFrecuencia"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Cuaternalmente
                <span class="fas fa-edit fa-sm ml-auto mr-2" data-toggle="modal" data-target="#nuevaFrecuencia"></span>
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarFrecuencia"></span>
            </a>
        </div>
    </div>
</div>
<?php
Page::footerTemplate();
?>

