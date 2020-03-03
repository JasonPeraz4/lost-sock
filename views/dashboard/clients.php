<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Clientes');
?>
<div class="d-flex flex-row align-items-center mb-4">
    <h2>Clientes</h2>
    <p class="mr-auto ml-2 my-auto">4 en total</p>    
</div>
<div class="row">
    <div class="col-md-4">
        <form action="searchTypeUser" class="my-4">
            <input type="text" class="form-control" placeholder="Buscar cliente" id="searchUserType">
        </form>
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action d-flex align-items-center active" id="list-home-list" data-toggle="list" href="#list-superadministrador" role="tab" aria-controls="home">
                <span class="fas fa-user fa-sm mr-3"></span>
                Laura Navas
                <span class="fas fa-trash-alt fa-sm ml-auto"></span>
            </a>
        </div>
    </div>
    <div class="col-md-8 p-4">
        <div class="tab-content tab-1" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-superadministrador" role="tabpanel" aria-labelledby="list-home-list">
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
                                <span class="fas fa-ban fa-sm mx-3"></span>
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

