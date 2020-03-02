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
        <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#modalNewUserType">
            Agregar
        </button>
    </div>       
</div>
<div class="row">
    <div class="col-md-5"> 
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Rojo
                <span class="fas fa-edit fa-sm ml-auto mr-2"></span>
                <span class="fas fa-trash-alt fa-sm"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Azul
                <span class="fas fa-edit fa-sm ml-auto mr-2"></span>
                <span class="fas fa-trash-alt fa-sm"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Amarillo
                <span class="fas fa-edit fa-sm ml-auto mr-2"></span>
                <span class="fas fa-trash-alt fa-sm"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Verde
                <span class="fas fa-edit fa-sm ml-auto mr-2"></span>
                <span class="fas fa-trash-alt fa-sm"></span>
            </a>
        </div>
    </div>
</div>    
<?php
Page::footerTemplate();
?>

