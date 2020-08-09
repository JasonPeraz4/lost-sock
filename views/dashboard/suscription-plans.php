<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Suscription plans management', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">Suscription plans</h3>
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
                    <th class="pl-4">Number of pairs</th>
                    <th>Cost</th>
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
                <input class="d-none" type="text" id="idplansuscripcion" name="idplansuscripcion"/>
                <p>Enter the number of pairs of socks and the shipping price</p>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cantidadpares">Number of pairs</label>
                        <input type="text" class="form-control" placeholder="x pairs" id="cantidadpares" name="cantidadpares" title="Solo se permiten números">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="precio">Shipping cost</label>
                        <input type="text" class="form-control" placeholder="Shipping cost($)" id="precio" name="precio" pattern="^[0-9]+(?:\.[0-9]{1,2})?$" title="Solo se permiten números con dos decimales">
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
Page::footerTemplate( 'planSuscripcion.js' );
?>

