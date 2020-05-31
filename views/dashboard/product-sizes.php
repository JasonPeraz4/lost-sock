<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Gestión de tallas', null);
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h2>Tallas</h2>
        <p class="mx-2 my-auto">3 en total</p>
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <!-- Boton para llamar modal de agregar talla -->
        <button type="button" class="btn btn-purple mx-2" data-toggle="modal" onclick="openCreateModal()">
            Agregar
        </button>
    </div>
    <!-- Modal agregar talla -->
    <div class="modal fade" id="talla-modal" tabindex="-1" role="dialog" aria-labelledby="talla-modal"
        aria-hidden="true">
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
                <form method="post" id="talla-form" enctype="">
                    <div class="modal-body p-md-4">
                        <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                        <input class="d-none" type="text" id="idtalla" name="idtalla" />
                        <div class="form-group">
                            <label for="talla">Ingresa la talla</label>
                            <input type="text" class="form-control" placeholder="Talla" id="talla" name="talla">
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
            <table id="talla-table" class="table table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="pl-4">Talla</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-rows" class="table-bordered">
                </tbody>
            </table>
        </div>
    </div>
<?php
Page::footerTemplate('talla.js');
?>

