<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Información del producto');
?>
<!-- Grupo de cards para productos -->
<div class="container cover-general">
    <!-- row -->
    <div class="row">
        <div class="col-12 col-md-6 mr-5 py-4 mb-sm-4 mb-md-0 mt-5">
            <img id="imagen" class="w-75 h-75 d-flex justify-content-center mx-auto" src="" alt="Imagen del producto">
        </div>
        <div class="col-12 col-md-5 py-4 mt-5">
            <!-- Detalles de los productos -->
            <div class="col-12">
                <h3 id="precio_producto" class="mb-2 text-purple">$0.00</h3>
                <h2 id="nombre" class="mb-2"></h2>
                <div id="valoracion" class="rating mb-2">
                    <span class="fa fa-star text-yellow"></span>
                    <span class="fa fa-star text-yellow"></span>
                    <span class="fa fa-star text-yellow"></span>
                    <span class="fa fa-star text-yellow"></span>
                    <span class="fa fa-star text-yellow"></span>
                </div>
                <!-- Descripción de producto -->
                <p id="descripcion" class="text-muted mb-3">
                </p>
                <h6 class="text-secondary mb-3"><small class="text-secondary">Tipo</small> <span id="tipo"></span></h6>
                <!-- Colores -->
                <div class="mb-3">
                    <span id="color" class="dot"></span>
                </div>
                <form method="post" id="shopping-form" enctype="">
                    <input class="d-none" type="text" id="idproducto" name="idproducto"/>
                    <input class="d-none" type="text" id="precio" name="precio"/>
                    <div class="row mb-4">
                        <div class="col-3 text-center">
                            <!-- Tallas -->
                            <select class="form-control form-control-sm" id="tallas" name="talla">
                            </select>
                        </div>
                        <div class="col-4 text-center">
                            <input type="number" class="form-control form-control-sm float-right" placeholder="Cantidad" id="cantidad" name="cantidad"  min="1" title="Solo se permiten números naturales">
                        </div>
                    </div>
                    <!-- Botón de añadir a la cesta -->
                    <div class="action-button mb-5">
                        <button class="btn text-white custom--button" type="submit">Añadir a la cesta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>  
<?php
Page::footerTemplate('detalle.js');
?>
