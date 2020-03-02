<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Administradores');
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h2>Administradores</h2>
        <p class="mx-2 my-auto">4 en total</p>
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tipo
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Superadministrador</a>
                <a class="dropdown-item" href="#">Administrador</a>
                <a class="dropdown-item" href="#">Inhabilitado</a>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <form action="searchAdmin" class="mx-2">
            <input type="text" class="form-control" placeholder="Buscar un administrador" id="searchAdmin">
        </form>
        <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#modalNewUserType">
            Agregar
        </button>
    </div>       
</div>
<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action d-flex flex-row align-items-center justify-content-between">
        <div class="d-flex flex-row my-auto">
            <span class="photo-admin-list mr-3"></span>
            <div class="">
            <p class="my-auto">Jason Anthony Peraza Cruz</p>
            <p class="my-auto">jason@peraza.com</p>
            </div>
        </div>
        <p class="my-auto">jasonperaza</p>
        <p class="my-auto">2525-2525</p>
        <div class="d-flex flex-row align-items-center">
            <p class="my-auto">Superadministrador</p>
            <span class="fas fa-trash-alt fa-sm mx-3"></span>
            <span class="fas fa-edit fa-sm"></span>
        </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action d-flex flex-row align-items-center justify-content-between">
        <div class="d-flex flex-row my-auto">
            <span class="photo-admin-list mr-3"></span>
            <div class="">
            <p class="my-auto">Jason Anthony Peraza Cruz</p>
            <p class="my-auto">jason@peraza.com</p>
            </div>
        </div>
        <p class="my-auto">jasonperaza</p>
        <p class="my-auto">2525-2525</p>
        <div class="d-flex flex-row align-items-center">
            <p class="my-auto">Superadministrador</p>
            <span class="fas fa-trash-alt fa-sm mx-3"></span>
            <span class="fas fa-edit fa-sm"></span>
        </div>
    </a>
</div>
<?php
Page::footerTemplate();
?>

