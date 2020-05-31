<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Gestión de categorías', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex align-items-end pb-md-3 pb-2">
        <!-- Encabezado -->
        <h3>Categorías</h3>
        <p class="mb-2 mx-2">10 en total</p>
    </div>
    <div class="d-flex flex-wrap">
        <!-- Boton para llamar modal agregar nueva categoria -->
        <button type="button" class="btn btn-purple ml-md-auto my-auto" data-toggle="modal" onclick="openCreateModal()">
            Agregar
        </button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="categoria-table" class="table table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="pl-4">Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-rows" class="table-bordered">
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal agregar cateogria de producto -->
    <div class="modal fade" id="categoria-modal" tabindex="-1" role="dialog" aria-labelledby="categoria-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-plus fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Formulario -->
            <form method="post" id="categoria-form" enctype="">
                <div class="modal-body p-md-4">
                    <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                    <input class="d-none" type="text" id="idcategoria" name="idcategoria"/>
                    <div class="form-group">
                        <label for="categoria">Ingresa el nombre de la categoría</label>
                        <input type="text" class="form-control" placeholder="Categoría" id="categoria"  name="categoria">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-purple">Guardar</button>
                    </div>
                </div>
            </form> 
            <!-- Formulario -->
            </div>
        </div>
    </div>     
</div>
<?php
Page::footerTemplate('categoria.js');
?>

