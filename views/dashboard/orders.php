<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Orders', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">Orders</h3>
    </div>
</div>
<table id="orden-table" class="table table-responsive-sm table-hover">
    <thead>
        <tr>
            <th>N.°</th>
            <th>Detail</th>
            <th>
                <div>Purchase date /</div>
                <div>Delivery date</div>
            </th>
            <th>Total</th>
            <th>Status</th>
            <th>Client</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="tbody-rows" class="table-bordered">
    </tbody>
</table>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="suscripcion-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="suscripcion-form" enctype="">
                <div class="modal-body p-md-4">
                    <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                    <input class="d-none" type="text" id="idsuscripcion" name="idsuscripcion" />
                    <!-- <p class="text-secondary">INFORMACIÓN PERSONAL</p> -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombres">Name</label>
                            <input readonly type="text" class="form-control" placeholder="Name" id="nombres"
                                name="nombres">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidos">Surname</label>
                            <input readonly type="text" class="form-control" placeholder="Surname" id="apellidos"
                                name="apellidos">
                        </div>
                    </div>
                    <!-- <p class="text-secondary">INFORMACIÓN DE ENVÍO</p> -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="direccion">Shipping address</label>
                            <input readonly type="direccion" class="form-control" placeholder="Shipping address"
                                id="detalledireccion" name="detalledireccion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="departamento">Department</label>
                            <input readonly type="text" class="form-control" placeholder="Department"
                                id="detalledepartamentoo" name="detalledepartamento">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="frecuencia">Frecuency</label>
                            <input readonly type="text" class="form-control" placeholder="Frecuency" id="frecuencia"
                                name="frecuencia">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="costoenvio">Shipping cost</label>
                            <input readonly type="text" class="form-control" placeholder="Shipping cost"
                                id="costoenvio" name="costoenvio">
                        </div>
                    </div>
                    <!-- <p class="text-secondary">INFORMACIÓN DEL PLAN DE SUSCRIPCIÓN</p> -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tipoproducto">Product type</label>
                            <input readonly type="text" class="form-control" placeholder="Product type"
                                id="tipoproducto" name="tipoproducto">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="categoria">Categories</label>
                            <input readonly type="text" class="form-control" placeholder="Categories" id="categoria"
                                name="categoria">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="estado">Status</label>
                            <input readonly type="text" class="form-control" id="estado" name="estado"></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="talla">Size</label>
                            <input readonly type="text" class="form-control" placeholder="Size" id="talla"
                                name="talla">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cantidad">Quantity</label>
                            <input readonly type="text" class="form-control" placeholder="Quantity" id="cantidad"
                                name="cantidad">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="precio">Price</label>
                            <input readonly type="text" class="form-control" placeholder="Price ($)" id="precio"
                                name="precio">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="total">Payment total</label>
                            <input readonly type="text" class="form-control" placeholder="Payment total ($)" id="total"
                                name="total">
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
Page::footerTemplate('orden.js');
?>

