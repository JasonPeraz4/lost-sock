<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Frecuencias de suscripción', null);
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h2>Planes</h2>
        <p class="mx-2 my-auto">4 en total</p>
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <!-- Campo para buscar planes -->
        <form action="searchAdmin" class="mx-md-2">
            <input type="text" class="form-control" placeholder="Buscar plan" id="searchAdmin">
        </form>
        <!-- Boton para llamar modal de agregar un plan -->
        <button type="button" class="btn btn-purple mx-2" data-toggle="modal" data-target="#nuevoPlan">
            Agregar
        </button>
    </div>
        <!-- Modal agregar departamento -->
        <div class="modal fade" id="nuevoPlan" tabindex="-1" role="dialog" aria-labelledby="nuevoTIpoUlLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <i class="fas fa-plus fa-lg my-auto mx-2"></i>
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-md-4">
                    <p>Ingresa la cantidad de pares del calcetines y el costo</p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPlan">Cantidad de pares</label>
                            <input type="text" class="form-control" placeholder="x pares" id="inputNombres">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputApellidos">Cost de envio</label>
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
    <!-- Modal eliminar plan -->
    <div class="modal fade" id="eliminarPlan" tabindex="-1" role="dialog" aria-labelledby="eliminarDeptoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-trash fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="exampleModalLabel">Eliminar plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <p>¿Estas seguro que deseas eliminar el plan de 1 par de calcetines?</p>
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
        <div class="list-group" id="list-tab" role="tablist">
            <!-- Lista de planes -->
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">1 pares</p>
                <p class="my-auto mr-4">$3.50</p>
                <span class="fas fa-edit fa-sm" data-toggle="modal" data-target="#nuevoPlan"></span>
                <span class="fas fa-trash-alt fa-sm ml-3" data-toggle="modal" data-target="#eliminarPlan"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">2 pares</p>
                <p class="my-auto mr-4">$8.50</p>
                <span class="fas fa-edit fa-sm" data-toggle="modal" data-target="#nuevoPlan"></span>
                <span class="fas fa-trash-alt fa-sm ml-3" data-toggle="modal" data-target="#eliminarPlan"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">3 pares</p>
                <p class="my-auto mr-4">$12.50</p>
                <span class="fas fa-edit fa-sm" data-toggle="modal" data-target="#nuevoPlan"></span>
                <span class="fas fa-trash-alt fa-sm ml-3" data-toggle="modal" data-target="#eliminarPlan"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">4 pares</p>
                <p class="my-auto mr-4">$16.50</p>
                <span class="fas fa-edit fa-sm" data-toggle="modal" data-target="#nuevoPlan"></span>
                <span class="fas fa-trash-alt fa-sm ml-3" data-toggle="modal" data-target="#eliminarPlan"></span>
            </a>
        </div>
    </div>
</div>
<?php
Page::footerTemplate();
?>

