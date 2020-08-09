<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Product management', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">Products</h3>
        <!-- Botón agregar -->
        <button type="button" onclick="openCreateModal()" class="btn btn-purple ml-md-auto my-auto">
            Add
        </button>
    </div>
</div>
<table id="myTable" class="table table-responsive-sm table-hover">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Description</th>
            <th>
                <div>Price /</div>
                <div>Discount</div>
            </th>
            <th>Category</th>
            <th>Product type</th>
            <th>Size</th>
            <th>Actions</th>
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
                <label for="nombre">Product name</label>
                <input type="text" class="form-control" placeholder="Product name" id="nombre" name="nombre" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{5,25}$" title="Solo se permiten letras" autocomplete="no" required>
                <div class="valid-feedback">Nice! You got this one!</div>
                <div class="invalid-feedback">Only letters</div>
            </div>
            <div class="form-group">
                <label for="descripcion">Description</label>
                <textarea class="form-control" rows="2" id="descripcion" name="descripcion" pattern="^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s]{1,120}$" title="Solo se permiten letras y números"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="precio">Price</label>
                    <input type="text" class="form-control" placeholder="Price($)" id="precio" name="precio" pattern="^[0-9]+(?:\.[0-9]{1,2})?$" title="Solo se permiten números con dos decimales">
                </div>
                <div class="form-group col-md-6">
                    <label for="descuento">Discount</label>
                    <input type="text" class="form-control" placeholder="Discount Ex: %20" id="descuento" name="descuento" title="Solo se permiten números entre 0 y 99">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="categoria_producto">Category</label>
                    <select class="form-control" id="categoria_producto" name="categoria_producto">
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="tipo_producto">Product type</label>
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
                <label class="custom-file-label" for="imagen">Choose image</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-purple">Save</button>
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

