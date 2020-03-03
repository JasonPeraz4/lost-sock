<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Frecuencias de suscripción');
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h2>Planes</h2>
        <p class="mx-2 my-auto">4 en total</p>
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <form action="searchAdmin" class="mx-md-2">
            <input type="text" class="form-control" placeholder="Buscar plan" id="searchAdmin">
        </form>
        <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#modalNewUserType">
            Agregar
        </button>
    </div>       
</div>
<div class="row">
    <div class="col-md-4"> 
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">1 pares</p>
                <p class="my-auto mr-4">$3.50</p>
                <span class="fas fa-edit fa-sm"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">2 pares</p>
                <p class="my-auto mr-4">$8.50</p>
                <span class="fas fa-edit fa-sm"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">3 pares</p>
                <p class="my-auto mr-4">$12.50</p>
                <span class="fas fa-edit fa-sm"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">4 pares</p>
                <p class="my-auto mr-4">$16.50</p>
                <span class="fas fa-edit fa-sm"></span>
            </a>
        </div>
    </div>
</div>
<?php
Page::footerTemplate();
?>

