<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Gestión de colores', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex align-items-end pb-md-3 pb-2">
        <h2>Colores</h2>
        <p class="mb-2 mx-2">4 en total</p>
    </div>
    <div class="d-flex flex-wrap">
        <!-- Botòn para llamar modal de agregar color -->
        <button type="button" class="btn btn-purple ml-md-auto my-auto" data-toggle="modal" onclick="openCreateModal()">
            Agregar
        </button>
    </div>
    <!-- Modal agregar color -->
    <div class="modal fade" id="color-modal" tabindex="-1" role="dialog" aria-labelledby="color-modal" aria-hidden="true">
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
            <form method="post" id="color-form" enctype="">
                <div class="modal-body p-md-4">
                    <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                    <input class="d-none" type="text" id="idcolor" name="idcolor" />
                    <div class="form-group">
                        <label for="color">Ingresa el nombre del nuevo color</label>
                        <input type="text" class="form-control" placeholder="Color" id="color" name="color">
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
    <div class="row">
        <div class="col-md-12">
            <table id="color-table" class="table table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="pl-4">Color</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-rows" class="table-bordered">
                </tbody>
            </table>
        </div>
    </div>
</div>    
<?php
Page::footerTemplate('color.js');
?>

