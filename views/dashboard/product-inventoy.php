<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Productos');
?>
<div class="d-flex flex-row align-items-center mb-4">
    <h2>Productos</h2>
    <p class="mr-auto ml-2 my-auto">4 en total</p>
    <!-- Modal deshabilitar usuario -->
    <div class="modal fade" id="eliminarComentario" tabindex="-1" role="dialog" aria-labelledby="eliminarUsuarioLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <i class="fas fa-exclamation fa-lg my-auto mx-2"></i>
                    <h5 class="modal-title" id="exampleModalLabel">Deshabilitar comentario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-md-4">
                    <p>¿Estas seguro que deseas deshabilitar este comentario?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-purple">Deshabilitar</button>
                </div>
                </div>
            </div>
        </div>
    <!-- Modal agregar producto -->
    <div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="nuevoTIpoUlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-plus fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <div>
                    <form action="">
                        <div class="form-group">  
                            <input type="text" class="form-control" placeholder="Nombre de producto" id="inputUsuario">
                        </div>
                    </form>
                    <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="fas fa-plus fa-5x"></span>
                                </div>
                                <div class="col-md-8 p-md-4">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputNombres">Precio</label>
                                            <input type="text" class="form-control" placeholder="Precio" id="inputNombres">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputApellidos">Descuento</label>
                                            <input type="text" class="form-control" placeholder="Descuento" id="inputApellidos">
                                        </div>
                                    </div>
                                    <form action="">
                                        <div class="form-group">
                                            <label for="inputDescripcion">Descuento</label>  
                                            <input type="text" class="form-control" placeholder="Descripción de producto" id="inputDescripción">
                                        </div>
                                    </form>
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
                                    <strong>Talla </strong>
                                    <strong><span class="fas fa-plus fa-sm"></span>Agregar existencia</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 d-flex flex-column justify-content-center">
                                    <span class="fas fa-plus fa-3x"></span>
                                    Agregar imagen
                                </div>
                            </div> 
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-purple">Agregar</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal eliminar producto -->
    <div class="modal fade" id="eliminarProducto" tabindex="-1" role="dialog" aria-labelledby="eliminarTIpoUlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-trash fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <p>¿Estas seguro que deseas eliminar el producto "Calcetin navideño"?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-purple">Eliminar</button>
            </div>
            </div>
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-md-4">
        <div class="d-flex flex-row align-items-center my-4 ">
            <form action="searchAdmin" class="">
                <input type="text" class="form-control" placeholder="Buscar producto" id="searchAdmin">
            </form>
            <button type="button" class="btn btn-purple mx-2" data-toggle="modal" data-target="#nuevoProducto">
                Agregar
            </button>
        </div>
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action d-flex align-items-center active" id="list-home-list" data-toggle="list" href="#list-detalle1" role="tab" aria-controls="home">
                Calcetines navideños
                <span class="fas fa-trash-alt fa-sm mx-3 ml-auto" data-toggle="modal" data-target="#eliminarProducto"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center" id="list-home-list" data-toggle="list" href="#list-detalle2" role="tab" aria-controls="home">
                Calcetines de corazones
                <span class="fas fa-trash-alt fa-sm mx-3 ml-auto"></span>
            </a>
        </div>
    </div>
    <div class="col-md-8 p-4">
        <div class="tab-content tab-1" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-detalle1" role="tabpanel" aria-labelledby="list-home-list">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#detalle1" class="btn btn-purple">Detalle</a></li>
                    <li><a data-toggle="tab" href="#comentarios1" class="btn btn-purple">Comentarios</a></li>
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
                            <div>
                                <span class="fas fa-ban fa-lg" data-toggle="modal" data-target="#eliminarComentario"></span>
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
                            <div>
                                <span class="fas fa-ban fa-lg" data-toggle="modal" data-target="#eliminarComentario"></span>
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
            <div class="tab-pane fade show" id="list-detalle2" role="tabpanel" aria-labelledby="list-home-list">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#detalle2" class="btn btn-purple">Detalle</a></li>
                    <li><a data-toggle="tab" href="#comentarios2" class="btn btn-purple">Comentarios</a></li>
                </ul>
                <div class="tab-content">
                    <div id="detalle2" class="tab-pane fade in active p-md-4">
                        <h2>Calcetines de corazones</h2>
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
                    <div id="comentarios2" class="tab-pane fade p-md-4">
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

