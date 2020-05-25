<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Categorias', null);
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h2>Categorias</h2>
        <p class="mx-2 my-auto">4 en total</p>
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <!-- Campo para buscar categoria -->
        <form action="searchAdmin" class="mx-md-2">
            <input type="text" class="form-control" placeholder="Buscar categoria" id="searchAdmin">
        </form>
        <!-- Boton para llamar modal agregar nueva categoria -->
        <button type="button" class="btn btn-purple mx-2" data-toggle="modal" data-target="#nuevaCategoria">
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
<div class="row">
    <div class="col-md-5"> 
        <div class="list-group" id="list-tab" role="tablist">
            <!-- Lista de categorias -->
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Hombre
                <span class="fas fa-edit fa-sm ml-auto mr-2" data-toggle="modal" data-target="#nuevaCategoria"></span>
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarCategoria"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Mujer
                <span class="fas fa-edit fa-sm ml-auto mr-2" data-toggle="modal" data-target="#nuevaCategoria"></span>
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarCategoria"></span>
            </a>
            <a class="list-group-item list-group-item-action d-flex align-items-center">
                Niños
                <span class="fas fa-edit fa-sm ml-auto mr-2" data-toggle="modal" data-target="#nuevaCategoria"></span>
                <span class="fas fa-trash-alt fa-sm" data-toggle="modal" data-target="#eliminarCategoria"></span>
            </a>
        </div>
    </div>
</div>    
<?php
Page::footerTemplate();
?>

