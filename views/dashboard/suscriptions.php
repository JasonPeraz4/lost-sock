<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Suscripciones');
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h2>Suscripciones</h2>
        <p class="mx-2 my-auto">3 en total</p>
        
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <form action="searchAdmin" class="mx-2">
            <input type="text" class="form-control" placeholder="Buscar" id="searchAdmin">
        </form>
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
    </div>       
</div>
<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action d-flex flex-row align-items-center justify-content-between">
        <p class="my-auto col-md-2">Medias</p>
        <p class="my-auto col-md-2">Hombres</p>
        <p class="my-auto col-md-1">Talla M</p>
        <p class="my-auto col-md-2">Pedro Ricaldone</p>
        <p class="my-auto col-md-3">Av. Aguilares. Chalatenango Depto. 14</p>
        <div class="d-flex flex-row align-items-center col-md-2">
            <p class="my-auto">Mensualmente</p>
            <span class="fas fa-ban fa-sm mx-3"></span>
        </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action d-flex flex-row align-items-center justify-content-between">
        <p class="my-auto col-md-2">Calcetines deportivos</p>
        <p class="my-auto col-md-2">Hombres</p>
        <p class="my-auto col-md-1">Talla L</p>
        <p class="my-auto col-md-2">Juan Melchor</p>
        <p class="my-auto col-md-3">Av. Aguilares. Chalatenango Depto. 14</p>
        <div class="d-flex flex-row align-items-center col-md-2">
            <p class="my-auto">Bimensualmente</p>
            <span class="fas fa-ban fa-sm mx-3"></span>
        </div>
    </a>
</div>
<?php
Page::footerTemplate();
?>

