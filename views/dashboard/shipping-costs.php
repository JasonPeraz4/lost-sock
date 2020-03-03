<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Costos de envio');
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h2>Costos de envio</h2>
        <p class="mx-2 my-auto">4 en total</p>
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <form action="searchAdmin" class="mx-md-2">
            <input type="text" class="form-control" placeholder="Buscar departamento" id="searchAdmin">
        </form>
    </div>       
</div>
<div class="row">
    <div class="col-md-4"> 
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">Ahuachapan</p>
                <p class="my-auto mr-4">$1.50</p>
                <span class="fas fa-edit fa-sm"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">Santa Ana</p>
                <p class="my-auto mr-4">$1.50</p>
                <span class="fas fa-edit fa-sm"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">Sonsonate</p>
                <p class="my-auto mr-4">$1.50</p>
                <span class="fas fa-edit fa-sm"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                <p class="my-auto mr-auto">San Salvador</p>
                <p class="my-auto mr-4">$0.25</p>
                <span class="fas fa-edit fa-sm"></span>
            </a>
        </div>
    </div>
</div>

<?php
Page::footerTemplate();
?>

