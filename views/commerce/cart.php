<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Carrito de compra');
?>
<div class="container cover--general">
    <h3 class="text-center my-5">Carrito de compra</h3>
    <!-- row -->
    <div class="row mb-5">
        <div id="item-list" class="col-12 col-md-7 mr-5 py-4 mb-sm-4 mb-md-0 p-4">
            <!-- Item  -->
            <div class="row shadow p-3 mb-3">
                <div class="col-md-4">
                    <img src="../../resources/img/producto/" alt="Imagen del producto" class="w-75">
                </div>
                <div class="col-md-8">
                    <div class="row  mb-3">
                        <div class="col-12">
                            <h4 class="float-left"></h4>
                            <div class="float-right">
                                <i class="fad fa-pen mx-1 text-purple" onclick="openUpdateModal()"></i>
                                <i class="fad fa-trash mx-1 text-danger" onclick="openDeleteDialog()"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row  mb-3">
                        <div class="col-3">
                            <!-- Tallas -->
                            <select class="form-control form-control-sm" id="tallas" disabled>
                            </select>
                        </div>
                        <div class="col-3">
                            <input type="number" class="form-control form-control-sm float-right" placeholder="Cantidad" id="cantidad" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="text-secondary"><small class="text-secondary">Precio unitario</small> $</h6>
                        </div>
                        <div class="col-6">
                            <h6 class="text-secondary"><small class="text-secondary">Subtotal</small> $</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 shadow p-4 py-4 mb-sm-4 mb-md-0">
            <div class="col-12 text-center">
                <h4 class="mb-5">Procesar compra</h4>
                <div class="row">
                    <div class="col-12">
                        <h5 class="float-left">Información de envío</h5>
                    </div>
                </div>
                <select class="form-control" id="categoria_producto"name="categoria_producto">
                </select>
                <div class="d-flex justify-content-between mt-5">
                    <h5>Subtotal:</h5>
                    <h5>$15</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5>Envío:</h5>
                    <h5>$2.5</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5>Total:</h5>
                    <h5>$17.5</h5>
                </div>
                <div class="mb-2 mt-5">
                    <button type="button" class="btn btn-primary custom--button">Procesar compra</button>
                </div>
            </div>
       </div>
    </div>
    <!-- end row -->
</div>
<!-- Modal editar producto -->
<div class="modal fade" id="item-modal" tabindex="-1" role="dialog" aria-labelledby="item-modal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Editar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="post" id="item-form" enctype="">
        <div class="modal-body p-md-4">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="d-none" type="text" id="iddetallecompra" name="iddetallecompra"/>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="talla">Talla</label>
                    <select class="form-control" id="talla" name="talla">
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" placeholder="Cantidad" id="cantidad" name="cantidad" min="1" title="Solo se permiten números naturales">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-purple">Guardar</button>
        </div>
    </form>   
    </div>
</div>
</div>
<?php
Page::footerTemplate('cart.js');
?>
