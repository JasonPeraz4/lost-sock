<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Productos');
?>
<div class="d-flex flex-row align-items-center mb-4">
    <h2>Productos</h2>
    <p class="mr-auto ml-2 my-auto">4 en total</p>    
</div>
<div class="row">
    <div class="col-md-4">
        <form action="searchTypeUser" class="my-4">
            <input type="text" class="form-control" placeholder="Buscar producto" id="searchUserType">
        </form>
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action d-flex align-items-center active" id="list-home-list" data-toggle="list" href="#list-detalle1" role="tab" aria-controls="home">
                Calcetines navideños
                <span class="fas fa-edit fa-sm ml-auto"></span>
                <span class="fas fa-trash-alt fa-sm mx-3"></span>
            </a>
        </div>
    </div>
    <div class="col-md-8 p-4">
        <div class="tab-content tab-1" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-detalle1" role="tabpanel" aria-labelledby="list-home-list">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#detalle1">Detalle</a></li>
                    <li><a data-toggle="tab" href="#comentarios1">Comentarios</a></li>
                </ul>
                <div class="tab-content">
                    <div id="detalle1" class="tab-pane fade in active p-md-4">
                        <h2>Calcetines navideños</h2>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="fas fa-image fa-9x"></span>
                                </div>
                                <div class="col-md-8 p-md-4">
                                    <div class="row">
                                        <div class="col">
                                            <strong>Precio</strong>
                                            <p>$4.50</p>
                                        </div>
                                        <div class="col">
                                            <strong>Descuento</strong>
                                            <p>$4.50</p>
                                        </div>
                                    </div>
                                    
                                    <strong>Descripción</strong>
                                    <p>Brewed sit, a americano, cultivar coffee steamed in cappuccino. Galão affogato aroma, black est medium single origin cream. Mug cultivar kopi-luwak lungo beans blue mountain barista wings trifecta black.</p>
                                    <div class="row">
                                        <div class="col">
                                            <strong>Categoria</strong>
                                            <div class="dropdown">
                                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Categoria
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Hombre</a>
                                                    <a class="dropdown-item" href="#">Mujer</a>
                                                    <a class="dropdown-item" href="#">Niño</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <strong>Tipo</strong>
                                            <div class="dropdown">
                                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Tipo
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Calcetin deportivo</a>
                                                    <a class="dropdown-item" href="#">Media</a>
                                                    <a class="dropdown-item" href="#">Calceta</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <strong>Talla</strong>
                                    <p>Talla S 14<span class="fas fa-edit fa-sm mx-1"></span></p>
                                    <p>Talla M 10<span class="fas fa-edit fa-sm mx-1"></span></p>
                                    <strong>Agregar existencia</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between m-md-4">
                                    <span class="fas fa-image fa-5x"></span>
                                    <span class="fas fa-image fa-5x"></span>
                                    <span class="fas fa-image fa-5x"></span>
                                    <span class="fas fa-image fa-5x"></span>
                                    <span class="fas fa-image fa-5x"></span>
                                </div>
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-outline-primary ml-auto mx-2">Cancelar</button>
                                <button type="button" class="btn btn-primary mx-2">Guardar</button>
                            </div>  
                        </div>
                    </div>
                    <div id="comentarios1" class="tab-pane fade p-md-4">
                        <h4>Valoración promedio</h4>
                        <div class="d-flex flex-row my-auto">
                            <h3 class="my-auto">4.0</h3>
                            <div class="valoracion d-flex flex-row">
                                <i class="fas fa-star fa-lg my-auto mx-2"></i>
                                <i class="fas fa-star fa-lg my-auto mx-2"></i>
                                <i class="fas fa-star fa-lg my-auto mx-2"></i>
                                <i class="fas fa-star fa-lg my-auto mx-2"></i>
                                <i class="far fa-star fa-lg my-auto mx-2"></i>
                            </div>
                        </div>
                        <div class="comentario d-flex flex-row shadow m-md-4">
                            <div class="d-flex flex-column my-auto">
                                <span class="fas fa-user fa-3x mx-auto"></span>
                                <h5 class="mx-auto">Laura Navas</h53>
                            </div>
                            <div class="d-flex flex-column m-md-3 my-auto">
                                <div class="valoracion d-flex flex-row">
                                    <i class="fas fa-star my-auto mx-2"></i>
                                    <i class="far fa-star my-auto mx-2"></i>
                                    <i class="far fa-star my-auto mx-2"></i>
                                    <i class="far fa-star my-auto mx-2"></i>
                                    <i class="far fa-star my-auto mx-2"></i>
                                </div>
                                <p class="m-md-3">No hay de mi talla. Pésimo servicio.</p>
                            </div>
                        </div>
                        <div class="comentario d-flex flex-row shadow m-md-4">
                            <div class="d-flex flex-column my-auto">
                                <span class="fas fa-user fa-3x mx-auto"></span>
                                <h5 class="mx-auto">Laura Navas</h53>
                            </div>
                            <div class="d-flex flex-column m-md-3 my-auto">
                                <div class="valoracion d-flex flex-row">
                                    <i class="fas fa-star my-auto mx-2"></i>
                                    <i class="far fa-star my-auto mx-2"></i>
                                    <i class="far fa-star my-auto mx-2"></i>
                                    <i class="far fa-star my-auto mx-2"></i>
                                    <i class="far fa-star my-auto mx-2"></i>
                                </div>
                                <p class="m-md-3">No hay de mi talla. Pésimo servicio.</p>
                            </div>
                        </div>
                        <div class="comentario d-flex flex-row shadow m-md-4">
                            <div class="d-flex flex-column my-auto">
                                <span class="fas fa-user fa-3x mx-auto"></span>
                                <h5 class="mx-auto">Laura Navas</h53>
                            </div>
                            <div class="d-flex flex-column m-md-3 my-auto">
                                <div class="valoracion d-flex flex-row">
                                    <i class="fas fa-star my-auto mx-2"></i>
                                    <i class="far fa-star my-auto mx-2"></i>
                                    <i class="far fa-star my-auto mx-2"></i>
                                    <i class="far fa-star my-auto mx-2"></i>
                                    <i class="far fa-star my-auto mx-2"></i>
                                </div>
                                <p class="m-md-3">No hay de mi talla. Pésimo servicio.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
Page::footerTemplate();
?>

