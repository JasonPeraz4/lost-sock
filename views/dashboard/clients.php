<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Clientes');
?>
<div class="d-flex flex-row align-items-center mb-4">
    <h2>Clientes</h2>
    <p class="mr-auto ml-2 my-auto">4 en total</p>
    <!-- Modal deshabilitar cliente -->
    <div class="modal fade" id="eliminarCliente" tabindex="-1" role="dialog" aria-labelledby="eliminarClienteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fas fa-exclamation fa-lg my-auto mx-2"></i>
                    <h5 class="modal-title" id="exampleModalLabel">Deshabilitar cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-md-4">
                    <p>¿Estas seguro que deseas deshabilitar el  cliente "Laura Navas"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-purple">Deshabilitar</button>
                </div>
            </div>
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-md-4">
        <!-- Campo para buscar cliente -->
        <form action="searchTypeUser" class="my-4">
            <input type="text" class="form-control" placeholder="Buscar cliente" id="searchUserType">
        </form>
        <!-- lista de clientes -->
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action d-flex align-items-center active" id="list-home-list" data-toggle="list" href="#list-laura" role="tab" aria-controls="home">
                <span class="fas fa-user fa-sm mr-3"></span>
                Laura Navas
                <span class="fas fa-trash-alt fa-sm ml-auto" data-toggle="modal" data-target="#eliminarCliente"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center" id="list-home-list" data-toggle="list" href="#list-rafael" role="tab" aria-controls="home">
                <span class="fas fa-user fa-sm mr-3"></span>
                Rafael Anaya
                <span class="fas fa-trash-alt fa-sm ml-auto" data-toggle="modal" data-target="#eliminarCliente"></span>
            </a>
        </div>
    </div>
    <div class="col-md-8 p-4 bg-light">
        <!-- Paneles con el detalle de información de cada cliente -->
        <div class="tab-content tab-1" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-laura" role="tabpanel" aria-labelledby="list-home-list">
                <div class="about-client px-md-4">
                    <div class="d-flex flow-row ml-4 mb-4">
                        <span class="fas fa-user fa-3x mr-3"></span>
                        <h3 class="my-auto">Laura Navas</h3>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Nombre completo:</strong></p>
                        <p class="col-md-6">Ana Laura Navas</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Correo electrónico:</strong></p>
                        <p class="col-md-6">laura@navas.com</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Dirección:</strong></p>
                        <p class="col-md-6">Milan, Italia. Calle Mirabello Depto. N.14</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Teléfono:</strong></p>
                        <p class="col-md-6">75481236</p>
                    </div>
                </div>
                <div class="px-md-4">
                    <h4>Suscripciones</h4>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action d-flex flex-wrap flex-row align-items-center justify-content-between">
                            <p class="my-auto">Mensualmente</p>
                            <p class="my-auto">Calcetines deportivos</p>
                            <p class="my-auto">Mujer</p>
                            <div class="d-flex flex-row align-items-center">
                                <p class="my-auto">Talla S</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-rafael" role="tabpanel" aria-labelledby="list-home-list">
                <div class="about-client px-md-4">
                    <div class="d-flex flow-row ml-4 mb-4">
                        <span class="fas fa-user fa-3x mr-3"></span>
                        <h3 class="my-auto">Rafael Anaya</h3>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Nombre completo:</strong></p>
                        <p class="col-md-6">Rafael Alejandro Anaya</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Correo electrónico:</strong></p>
                        <p class="col-md-6">rafael@anaya.com</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Dirección:</strong></p>
                        <p class="col-md-6">Milan, Italia. Calle Mirabello Depto. N.14</p>
                    </div>
                    <div class="d-flex flow-row flex-wrap align-items-center mb-md-4">
                        <p class="text-md-right col-md-6"><strong>Teléfono:</strong></p>
                        <p class="col-md-6">75481236</p>
                    </div>
                </div>
                <div class="px-md-4">
                    <h4>Suscripciones</h4>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action d-flex flex-wrap flex-row align-items-center justify-content-between">
                            <p class="my-auto">Mensualmente</p>
                            <p class="my-auto">Calcetines deportivos</p>
                            <p class="my-auto">Hombre</p>
                            <div class="d-flex flex-row align-items-center">
                                <p class="my-auto">Talla S</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
Page::footerTemplate();
?>

