<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Categorias', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex align-items-end pb-md-3 pb-2">
        <!-- Encabezado -->
        <h3>Categorías</h3>
        <p class="mb-2 mx-2">10 en total</p>
    </div>
    <div class="d-flex flex-wrap">
        <!-- Campo para buscar categoria -->
        <form action="searchCategoria" class="mr-md-3">
            <input type="text" class="form-control" id="searchCategoria" placeholder="Buscar categoría">
        </form>

        <!-- Campo para buscar categoria -->
        <!-- <form action="searchAdmin" class="mx-md-2">
            <input type="text" class="form-control" placeholder="Buscar categoria" id="searchAdmin">
        </form> -->

        <!-- Boton para llamar modal agregar nueva categoria -->
        <button type="button" class="btn btn-purple ml-md-auto my-auto" data-toggle="modal" data-target="#nuevaCategoria">
            Agregar
        </button>
    </div>
    <!-- Modal agregar cateogria de producto -->
    <div class="modal fade" id="nuevaCategoria" tabindex="-1" role="dialog" aria-labelledby="nuevoTIpoUlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-plus fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="exampleModalLabel">Nueva categoria de producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <p>Ingresa el nombre de la nueva categoria de producto</p>
                <form action="addUser">
                    <div class="form-group">
                        
                        <input type="text" class="form-control" placeholder="Categoria" id="inputUsuario">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-purple">Agregar</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal eliminar cateogria de producto -->
    <div class="modal fade" id="eliminarCategoria" tabindex="-1" role="dialog" aria-labelledby="eliminarTIpoUlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-trash fa-lg my-auto mx-2"></i>
                <h5 class="modal-title" id="exampleModalLabel">Eliminar categoria de producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <p>¿Estas seguro que deseas eliminar la categoria "Hombres"?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-purple" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-purple">Eliminar</button>
            </div>
            </div>
        </div>
    </div>       
</div>

<table class="table table-responsive-sm table-hover">
    <thead>
        <tr>
            <th>Categoría</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody class="table-bordered" id="tbody-rows">
        <tr>
            <td>Hombres</td>
            <td>
                <a class="fas fa-edit mx-1" data-toggle="modal" data-target="#nuevaCategoria"></a>
                <a class="fas fa-trash-alt" data-toggle="modal" data-target="#eliminarCategoria"></a>
            </td>
        </tr>
    </tbody>
</table> 
<?php
Page::footerTemplate();
?>

