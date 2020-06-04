<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Gestión de productos', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">Productos</h3>
        <!-- Grupo de dropdowns -->
        <div class="d-flex flex-row my-2 my-md-0">
            <!-- Dropdown filtrar por estado -->
            <div class="dropdown mx-md-2">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categoría
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Hombre</a>
                    <a class="dropdown-item" href="#">Mujer</a>
                </div>
            </div>
            <!-- Dropdown filtrar por tipo -->
            <div class="dropdown mx-2">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tipo
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Calceta</a>
                    <a class="dropdown-item" href="#">Calcetin deportivo</a>
                </div>
            </div>    
        </div>
        <!-- Botón agregar -->
        <button type="button" onclick="openCreateModal()" class="btn btn-purple ml-md-auto my-auto">
            Agregar
        </button>
    </div>
</div>
<table id="myTable" class="table table-responsive-sm table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>
                <div>Precio /</div>
                <div>Descuento</div>
            </th>
            <th>Categoria</th>
            <th>Tipo</th>
            <th>Tallas</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="tbody-rows" class="table-bordered">
        <tr>
            <td>Calcetines rojos</td>
            <td>Calcetines con estampado rojo</td>
            <td>
                <div>$7.96</div>
                <div>20%</div>
            </td>
            <td>Hombre</td>
            <td>Calcetin deportivo</td>
            <td><a class="text-success" href="#" onclick="openExistModal()">Ver existencias</a></td>
            <td>
                <i class="fas fa-comments" onclick="openCommentsModal()" data-toggle="tooltip" title="Comentarios"></i>
                <i class="fas fa-edit mx-1" onclick="openUpdateModal()" data-toggle="tooltip" title="Editar"></i>
                <i class="fas fa-trash-alt" onclick="openDeleteDialog()" data-toggle="tooltip" title="Eliminar"></i>
            </td>
        </tr>
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
    <form method="post" id="save-form" enctype="">
        <div class="modal-body p-md-4">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="d-none" type="text" id="idproducto" name="idproducto"/>
            <div class="form-group">
                <label for="nombre">Nombre del producto</label>
                <input type="text" class="form-control" placeholder="Nombre del producto" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" rows="2" id="descripcion" name="descripcion"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" placeholder="Precio($)" id="precio" name="precio">
                </div>
                <div class="form-group col-md-6">
                    <label for="descuento">Descuento</label>
                    <input type="text" class="form-control" placeholder="Descuento Ej: %20" id="descuento" name="descuento">
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
            <div class="form-group">
                <label for="test">Nombre del producto</label>
                <input type="file" class="form-control" placeholder="Nombre del producto" id="test" name="test">
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
<!-- Modal agregar producto -->
<div class="modal fade" id="existencias-modal" tabindex="-1" role="dialog" aria-labelledby="existencias-modal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Actualizar existencias del producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="post" id="existencias-form">
        <div class="modal-body p-md-4">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="d-none" type="text" id="idproductoe" name="idproductoe"/>
            <div id="existencias-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                    <input type="text" class="form-control" name="1" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-purple">Actualizar existencias</button>
        </div>
    </form>   
    </div>
</div>
</div>
<?php
Page::footerTemplate( 'producto.js' );
?>

