<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Carrito de compra');
?>
<div class="container cover--general">
    <h3 class="text-center my-5">Carrito de compra</h3>
    <!-- row -->
    <div class="row mb-5">
        <div class="col-12 col-md-7 mr-5 py-4 mb-sm-4 mb-md-0 p-4">
            <div class="row shadow p-3 mb-3">
                <div class="col-4">
                    <img src="../../resources/img/socks.jpg" alt="" class="w-75">
                </div>
                <div class="col-8">
                    <div class="row  mb-3">
                        <div class="col-12">
                            <h4>Penguin sock</h4>
                        </div>
                    </div>
                    <div class="row  mb-3">
                        <div class="col-3">
                            <!-- Tallas -->
                            <div class="dropdown">
                                <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Talla
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="talla-producto">
                                    <a class="dropdown-item" href="#">S</a>
                                    <a class="dropdown-item" href="#">M</a>
                                    <a class="dropdown-item" href="#">L</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                                <input class="form-control form-control-sm float-right" type="number" id="cantidad-producto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Precio unitario: $5</p>
                        </div>
                        <div class="col-6">
                                <p>Subtotal: $10</p>
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
<?php
Page::footerTemplate(null);
?>
