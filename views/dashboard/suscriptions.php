<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Suscripciones', null);
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h2>Suscripciones</h2>
        <p class="mx-2 my-auto">3 en total</p>
        
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <!-- Campo de buscar suscripcion -->
        <form action="searchAdmin" class="mx-2">
            <input type="text" class="form-control" placeholder="Buscar" id="searchAdmin">
        </form>
        <!-- ComboBox para filtrar suscripciones -->
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Frecuencia
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Quincenalmente</a>
                <a class="dropdown-item" href="#">Mensualmente</a>
                <a class="dropdown-item" href="#">Bimensualmente</a>
            </div>
        </div>
        <!-- Modal cancelar suscripciòn -->
        <div class="modal fade" id="cancelarSub" tabindex="-1" role="dialog" aria-labelledby="eliminarClienteLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="fas fa-exclamation fa-lg my-auto mx-2"></i>
                        <h5 class="modal-title" id="exampleModalLabel">Cancelar suscripción</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-md-4">
                        <p>¿Estas seguro que deseas cancelar esta suscripción?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-purple">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>
<div class="list-group">
    <!-- listas de suscripciones -->
    <a href="#" class="list-group-item list-group-item-action d-flex flex-wrap flex-row align-items-center justify-content-around">
        <p class="my-auto col-md-2">Medias</p>
        <p class="my-auto col-md-2">Hombres</p>
        <p class="my-auto col-md-1">Talla M</p>
        <p class="my-auto col-md-2">Pedro Ricaldone</p>
        <p class="my-auto col-md-3">Av. Aguilares. Chalatenango Depto. 14</p>
        <div class="d-flex flex-row align-items-center col-md-2">
            <p class="my-auto">Mensualmente</p>
            <span class="fas fa-ban fa-sm mx-3" data-toggle="modal" data-target="#cancelarSub"></span>
        </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action d-flex flex-row flex-wrap align-items-center justify-content-between">
        <p class="my-auto col-md-2">Calcetines deportivos</p>
        <p class="my-auto col-md-2">Hombres</p>
        <p class="my-auto col-md-1">Talla L</p>
        <p class="my-auto col-md-2">Juan Melchor</p>
        <p class="my-auto col-md-3">Av. Aguilares. Chalatenango Depto. 14</p>
        <div class="d-flex flex-row align-items-center col-md-2">
            <p class="my-auto">Bimensualmente</p>
            <span class="fas fa-ban fa-sm mx-3" data-toggle="modal" data-target="#cancelarSub"></span>
        </div>
    </a>
</div>
<?php
Page::footerTemplate(null);
?>

