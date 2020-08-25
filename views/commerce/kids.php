<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Calcetines de niños');
?>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid jumbotron-cover cover-general cover-image">
    <div class="container">
        <h2 class="font-weight-normal titulo--cover">Colección para niños</h2>
    </div>
</div>
<!-- Grupo de cards para productos -->
<div class="container">
    <!-- Contenedor con la lista de productos -->
    <div id="productos" class="row">
       
    </div>
    <!-- end row -->
</div>  
<?php
Page::footerTemplate('productos.js');
?>