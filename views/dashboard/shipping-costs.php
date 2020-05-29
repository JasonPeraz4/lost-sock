<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Costos de envio', null);
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h2>Costos de envio</h2>
        <p class="mx-2 my-auto">4 en total</p>
        <!-- Modal agregar departamento -->
        <div class="modal fade" id="nuevoDepto" tabindex="-1" role="dialog" aria-labelledby="nuevoTIpoUlLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <i class="fas fa-plus fa-lg my-auto mx-2"></i>
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo departamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-md-4">
                    <p>Ingresa el nombre y costo del departamento</p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNombres">Departamento</label>
                            <input type="text" class="form-control" placeholder="Departamento" id="inputNombres">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputApellidos">Costo de envio</label>
                            <input type="text" class="form-control" placeholder="Costo($)" id="inputApellidos">
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
    </div>
    <!-- Modal eliminar departamento -->
    <div class="modal fade" id="eliminarDepto" tabindex="-1" role="dialog" aria-labelledby="eliminarDeptoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-trash fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="exampleModalLabel">Eliminar departamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <p>¿Estas seguro que deseas eliminar el departamento "Sonsonate"?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-purple">Eliminar</button>
            </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <!-- Campo para buscar departamento -->
        <form action="searchAdmin" class="mx-md-2">
            <input type="text" class="form-control" placeholder="Buscar departamento" id="searchAdmin">
        </form>
    </div>
    <!-- Boton para llamar modal nuevo departamento -->
    <button type="button" class="btn btn-purple" data-toggle="modal" data-target="#nuevoDepto">
        Agregar
    </button>       
</div>
<div class="row">
    <div class="col-md-4"> 
        <div class="list-group" id="list-tab" role="tablist">
            <!-- lista de costes de envio -->
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">Ahuachapan</p>
                <p class="my-auto mr-4">$1.50</p>
                <span class="fas fa-edit fa-sm" data-toggle="modal" data-target="#nuevoDepto"></span>
                <span class="fas fa-trash-alt fa-sm ml-3" data-toggle="modal" data-target="#eliminarDepto"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">Santa Ana</p>
                <p class="my-auto mr-4">$1.50</p>
                <span class="fas fa-edit fa-sm" data-toggle="modal" data-target="#nuevoDepto"></span>
                <span class="fas fa-trash-alt fa-sm ml-3" data-toggle="modal" data-target="#eliminarDepto"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">Sonsonate</p>
                <p class="my-auto mr-4">$1.50</p>
                <span class="fas fa-edit fa-sm" data-toggle="modal" data-target="#nuevoDepto"></span>
                <span class="fas fa-trash-alt fa-sm ml-3" data-toggle="modal" data-target="#eliminarDepto"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">San Salvador</p>
                <p class="my-auto mr-4">$0.25</p>
                <span class="fas fa-edit fa-sm" data-toggle="modal" data-target="#nuevoDepto"></span>
                <span class="fas fa-trash-alt fa-sm ml-3" data-toggle="modal" data-target="#eliminarDepto"></span>
            </a>
        </div>
    </div>
</div>

<?php
Page::footerTemplate(null);
?>

