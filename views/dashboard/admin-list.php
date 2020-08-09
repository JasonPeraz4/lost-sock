<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Management', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">Managers</h3>
        <!-- Botón agregar -->
        <button type="button" onclick="openCreateModal()" class="btn btn-purple ml-md-auto my-auto">
            Add
        </button>
    </div>
</div>
<table id="myTable" class="table table-responsive-sm table-hover">
    <thead>
        <tr>
            <th>Personal information</th>
            <th>User</th>
            <th>User type</th>
            <th>User status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="tbody-rows" class="table-bordered">
    </tbody>
</table>
<!-- Modal agregar usuario -->
<div class="modal fade" id="save-modal" tabindex="-1" role="dialog" aria-labelledby="save-modal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="post" id="save-form" enctype="">
        <div class="modal-body p-md-4">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="d-none" type="text" id="idadministrador" name="idadministrador"/>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombres">Name</label>
                    <input type="text" class="form-control" placeholder="Name" id="nombres" name="nombres" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'1','25'}$" title="Solo se permiten letras">
                </div>
                <div class="form-group col-md-6">
                    <label for="apellidos">Surname</label>
                    <input type="text" class="form-control" placeholder="Surname" id="apellidos" name="apellidos" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'1','25'}$" title="Solo se permiten letras">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" title="Solo se permiten direcciones de correo válidas">
                </div>
                <div class="form-group col-md-6">
                    <label for="usuario">User</label>
                    <input type="text" class="form-control" placeholder="User" id="usuario" name="usuario" pattern="^[a-z0-9_-]{3,15}$" title="Solo se permiten letras, y los caracteres - y _">
                </div>   
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tipo_administrador">User type</label>
                    <select class="form-control" id="tipo_administrador" name="tipo_administrador">
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label id="lblE" for="estado">User status</label>
                    <select class="form-control" id="estado" name="estado">
                    </select>
                </div>               
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-purple">Save</button>
        </div>
    </form>   
    </div>
</div>
</div>
<?php
Page::footerTemplate('administrador.js');
?>

