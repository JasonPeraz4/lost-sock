<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Calcetines de hombres');
?>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid jumbotron-cover cover-general cover-image">
    <div class="container">
        <h2 class="font-weight-normal titulo--cover">Colección para hombres</h2>
    </div>
</div>
<!-- Grupo de cards para productos -->
<div class="container">
    <!-- Contenedor con la lista de productos -->
    <div id="productos" class="row">
        <!-- Card del producto -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
            <div class="card product--detail custom--card">
                <img class="card-img-top" src="../../resources/img/socks.jpg" alt="Card image cap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <!-- Título de la card -->
                            <a href="product-detail.php">
                                <h5 class="card-title"></h5>    
                            </a>
                        </div>
                        <div class="col-4">
                            <p class="float-right text-purple font-weight-bold">$0.00</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <span class="dot product--color bg--purple"></span>
                            <!-- Colores -->
                        </div>
                        <div class="col-8">
                            <!-- Valoración -->
                            <div class="star--card float-right">
                                <span class="fa fa-star text-secondary" id="product--star"></span>
                                <span class="fa fa-star text-secondary" id="product--star"></span>
                                <span class="fa fa-star text-secondary" id="product--star"></span>
                                <span class="fa fa-star text-secondary" id="product--star"></span>
                                <span class="fa fa-star text-secondary" id="product--star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 text-center">
                            <!-- Tallas -->
                            <select class="form-control form-control-sm" id="talla" name="talla">
                            </select>
                        </div>
                        <div class="col-6 text-center">
                            <input type="number" class="form-control form-control-sm float-right" placeholder="Cantidad" id="cantidad" name="cantidad" pattern="^[0-9]+$" title="Solo se permiten números naturales">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center mb-3">
                        <button type="button" class="btn btn-primary btn-add custom--button" href="dashboard.php">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End card del producto -->
    </div>
    <!-- end row -->
</div>  
<?php
Page::footerTemplate('productos.js');
?>