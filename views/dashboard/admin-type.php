<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('User type management', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">User type</h3>
        <!-- Botón agregar -->
        <button type="button" onclick="openCreateModal()" class="btn btn-purple ml-md-auto my-auto">
            Add
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table id="myTable" class="table table-responsive-sm table-hover">
            <thead>
                <tr>
                    <th class="pl-4">User type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tbody-rows" class="table-bordered">
                
            </tbody>
        </table>
    </div>
</div>
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
            <input class="d-none" type="text" id="idtipousuario" name="idtipousuario"/>
            <div class="form-group">
                <label for="tipo">Enter a user type</label>
                <input type="text" class="form-control" placeholder="User type" id="tipo" name="tipo" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'1','25'}$" title="Solo se permiten letras">
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
Page::footerTemplate( 'tipoUsuario.js' );
?>

