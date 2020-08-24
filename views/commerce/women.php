<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Calcetines de mujeres');
?>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid jumbotron-cover cover-general cover-image">
    <div class="container">
        <h2 class="font-weight-normal titulo--cover">Colección para mujeres</h2>
    </div>
</div>
<!-- Grupo de cards para productos -->
<div class="container">
    <!-- Contenedor con la lista de productos -->
    <div id="productos" class="row">
        <!-- Card del producto -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
            <div class="card product--detail custom--card">
                
            </div>
        </div>
        <!-- End card del producto -->
    </div>
    <!-- end row -->
</div>  
<?php
Page::footerTemplate('productos.js');
?>