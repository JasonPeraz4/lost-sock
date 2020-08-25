<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Gestión de productos', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">Productos</h3>
        <!-- Botón agregar -->
        <div class="btn-group ml-md-auto">
            <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Reportes">
                <i class="fad fa-file-chart-line text-purple"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header">Reporte</h6>
                <a class="dropdown-item"  href="../../core/reports/dashboard/productosCategoria.php" target="_blank">Productos por categoria</a>
                <a class="dropdown-item" href="../../core/reports/dashboard/productosTipo.php" target="_blank">Productos por tipo</a>
            </div>
        </div>
        <button type="button" onclick="openCreateModal()" class="btn btn-purple ml-md-3 my-auto">
            Agregar
        </button>
    </div>
</div>
<table id="myTable" class="table table-responsive-sm table-hover">
    <thead>
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>
                <div>Precio /</div>
                <div>Descuento</div>
            </th>
            <th>Categoría</th>
            <th>Tipo</th>
            <th>Tallas</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="tbody-rows" class="table-bordered">
        
    </tbody>
</table>
<!-- Modal agregar producto -->
<div class="modal fade" id="save-modal" tabindex="-1" role="dialog" aria-labelledby="save-modal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="post" novalidate="" id="save-form" enctype="multipart/form-data">
        <div class="modal-body p-md-4">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="d-none" type="text" id="idproducto" name="idproducto"/>
            <div class="form-group">
                <label for="nombre">Nombre del producto</label>
                <input type="text" class="form-control" placeholder="Nombre del producto" id="nombre" name="nombre" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{5,25}$" title="Solo se permiten letras" autocomplete="no" required>
                <div class="valid-feedback">Nice! You got this one!</div>
                <div class="invalid-feedback">Solo se permiten letras</div>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" rows="2" id="descripcion" name="descripcion" pattern="^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s]{1,120}$" title="Solo se permiten letras y números"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" placeholder="Precio($)" id="precio" name="precio" pattern="^[0-9]+(?:\.[0-9]{1,2})?$" title="Solo se permiten números con dos decimales">
                </div>
                <div class="form-group col-md-6">
                    <label for="descuento">Descuento</label>
                    <input type="text" class="form-control" placeholder="Descuento Ej: %20" id="descuento" name="descuento" title="Solo se permiten números entre 0 y 99">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="categoria_producto">Categoria</label>
                    <select class="form-control" id="categoria_producto" name="categoria_producto">
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="tipo_producto">Tipo</label>
                    <select class="form-control" id="tipo_producto" name="tipo_producto">
                    </select>
                </div>             
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="color_producto">Color</label>
                    <select class="form-control" id="color_producto" name="color_producto">
                    </select>
                </div>            
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="imagen" name="imagen" accept=".gif, .jpg, .png"/>
                <label class="custom-file-label" for="imagen">Selecccionar imagen</label>
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
<!-- Modal agregar existencia producto -->
<div class="modal fade" id="existencias-modal" tabindex="-1" role="dialog" aria-labelledby="existencias-modal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Existencias del producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body p-md-4">
        <div id="existencias-body" class="mb-2"></div>
        <form method="post" id="existencias-form">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="d-none" type="text" id="idproductoe" name="idproductoe"/>
            <div class="form-row px-auto">
                <div class="form-group col-md-5">
                    <label for="talla">Talla</label>
                    <select class="form-control" id="talla" name="talla">
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="camtidad">Cantidad</label>
                    <input type="number" class="form-control" placeholder="Cantidad" id="cantidad" name="cantidad" pattern="^[0-9]+$" title="Solo se permiten números naturales">
                </div>
                <button type="submit" class="btn btn-purple mt-auto mb-3 ml-2">Agregar</button>
            </div>
        </form>            
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>   
    </div>
</div>
</div>
<?php
Page::footerTemplate( 'producto.js' );
?>

