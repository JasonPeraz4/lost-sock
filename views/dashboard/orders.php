<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Pedidos');
?>
<div class="d-flex flex-row align-items-center mb-4">
    <h2>Pedidos</h2>
    <p class="mr-auto ml-2 my-auto">4 en total</p>
    <!-- Modal deshabilitar cliente -->
    <div class="modal fade" id="cancelarPedido" tabindex="-1" role="dialog" aria-labelledby="eliminarClienteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fas fa-exclamation fa-lg my-auto mx-2"></i>
                    <h5 class="modal-title" id="exampleModalLabel">Cancelar pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-md-4">
                    <p>¿Estas seguro que deseas cancelar este pedido?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-purple">Aceptar</button>
                </div>
            </div>
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-md-4">
        <form action="searchTypeUser" class="my-4">
            <input type="text" class="form-control" placeholder="Buscar pedido" id="searchUserType">
        </form>
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action d-flex align-items-center active" id="list-home-list" data-toggle="list" href="#list-pedido1" role="tab" aria-controls="home">
                <div class="d-flex flex-column w-100">
                    <div class="d-flex align-items-center m-md-1">
                        <span class="fas fa-image fa-sm mr-4"></span>
                        Calcetines navideños
                    </div>
                    <div class="d-flex align-items-center m-md-1">
                        <span class="fas fa-image fa-sm mr-4"></span>
                        Calcetines de corazones
                    </div>
                    <div class="my-3 d-flex align-items-center justify-content-between">
                        <p class="my-auto">Cliente</p>
                        <h5 class="my-auto">Juan Melchor</h5>
                        <span class="fas fa-user fa-lg"></span> 
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="my-auto text-uppercase">Enviada</p>
                        <p class="my-auto">01-01-2020</p>
                    </div>                     
                </div>                              
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center" id="list-home-list" data-toggle="list" href="#list-pedido2" role="tab" aria-controls="home">
                <div class="d-flex flex-column w-100">
                    <div class="d-flex align-items-center m-md-1">
                        <span class="fas fa-image fa-sm mr-4"></span>
                        Calcetines navideños
                    </div>
                    <div class="d-flex align-items-center m-md-1">
                        <span class="fas fa-image fa-sm mr-4"></span>
                        Calcetines de corazones
                    </div>
                    <div class="d-flex align-items-center m-md-1">
                        <span class="fas fa-image fa-sm mr-4"></span>
                        Calcetines de corazones azules
                    </div>
                    <div class="my-3 d-flex align-items-center justify-content-between">
                        <p class="my-auto">Cliente</p>
                        <h5 class="my-auto">Pedro Ricaldone</h5>
                        <span class="fas fa-user fa-lg"></span> 
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="my-auto text-uppercase">Enviada</p>
                        <p class="my-auto">02-02-2020</p>
                    </div>                     
                </div>                              
            </a>
        </div>
    </div>
    <div class="col-md-8 p-4">
        <div class="tab-content tab-1" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-pedido1" role="tabpanel" aria-labelledby="list-home-list">
                <div class="about-client px-md-4">
                    <div class="d-flex flow-row justify-content-around align-items-center mx-4">
                        <h3 class="my-auto">Juan Melchor</h3>
                        <span class="fas fa-user fa-3x mr-3"></span>
                    </div>
                    <div class="d-flex flow-row justify-content-between align-items-center m-4">
                        <div class="custom-control custom-checkbox d-flex flex-column">
                            <input type="checkbox" class="custom-control-input" id="defaultChecked1" checked>
                            <label class="custom-control-label" for="defaultChecked1">Enviada</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex flex-column">
                            <input type="checkbox" class="custom-control-input" id="defaultChecked2" checked>
                            <label class="custom-control-label" for="defaultChecked2">Recibida</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex flex-column">
                            <input type="checkbox" class="custom-control-input" id="defaultChecked3" checked>
                            <label class="custom-control-label" for="defaultChecked3">Entregada</label>
                        </div>
                        <span class="fas fa-ban fa-lg mr-3" data-toggle="modal" data-target="#cancelarPedido"></span>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Fecha:</strong></p>
                        <p class="col-md-6">02-02-2020</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Dirección:</strong></p>
                        <p class="col-md-6">Milan, Italia. Calle Mirabello Depto. N.14</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Detalle:</strong></p>
                        <div class="col-md-6 d-flex align-items-center">
                            <span class="fas fa-image fa-sm mb-3"></span>
                            <p class="mx-3">Calcetines navideños</p>
                            <p class="mx-3">$4.60</p>
                            <p class="">2</p>
                        </div>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Costo de envio:</strong></p>
                        <p class="col-md-6">$1.50</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Costo de total:</strong></p>
                        <p class="col-md-6">$9.70</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Comentario:</strong></p>
                        <p class="col-md-6">No ha agregado ningún comentario.</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-pedido2" role="tabpanel" aria-labelledby="list-home-list">
                <div class="about-client px-md-4">
                    <div class="d-flex flow-row justify-content-around align-items-center mx-4">
                        <h3 class="my-auto">Pedro Ricaldone</h3>
                        <span class="fas fa-user fa-3x mr-3"></span>
                    </div>
                    <div class="d-flex flow-row justify-content-between align-items-center m-4">
                        <div class="custom-control custom-checkbox d-flex flex-column">
                            <input type="checkbox" class="custom-control-input" id="defaultChecked1" checked>
                            <label class="custom-control-label" for="defaultChecked1">Enviada</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex flex-column">
                            <input type="checkbox" class="custom-control-input" id="defaultChecked2" checked>
                            <label class="custom-control-label" for="defaultChecked2">Recibida</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex flex-column">
                            <input type="checkbox" class="custom-control-input" id="defaultChecked3" checked>
                            <label class="custom-control-label" for="defaultChecked3">Entregada</label>
                        </div>
                        <span class="fas fa-ban fa-lg mr-3" data-toggle="modal" data-target="#cancelarPedido"></span>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Fecha:</strong></p>
                        <p class="col-md-6">02-02-2020</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Dirección:</strong></p>
                        <p class="col-md-6">Milan, Italia. Calle Mirabello Depto. N.14</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Detalle:</strong></p>
                        <div class="col-md-6 d-flex align-items-center">
                            <span class="fas fa-image fa-sm mb-3"></span>
                            <p class="mx-3">Calcetines navideños</p>
                            <p class="mx-3">$4.60</p>
                            <p class="">2</p>
                        </div>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Costo de envio:</strong></p>
                        <p class="col-md-6">$1.50</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Costo de total:</strong></p>
                        <p class="col-md-6">$9.70</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Comentario:</strong></p>
                        <p class="col-md-6">No ha agregado ningún comentario.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
Page::footerTemplate();
?>

