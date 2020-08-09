<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Categories management', null);
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h3 class="mr-md-3">Categories</h3>
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <!-- Boton para llamar modal de agregar categoría -->
        <button type="button" class="btn btn-purple mx-2" data-toggle="modal" onclick="openCreateModal()">
            Add
        </button>
    </div>
    <!-- Modal agregar cateogria de producto -->
    <div class="modal fade" id="categoria-modal" tabindex="-1" role="dialog" aria-labelledby="categoria-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="categoria-form" enctype="">
                    <div class="modal-body p-md-6">
                        <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                        <input class="d-none" type="text" id="idcategoria" name="idcategoria" />
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="categoria">Enter a category name</label>
                                <input type="text" class="form-control" placeholder="Category" id="categoria" name="categoria" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,25}" required>
                            </div>
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
</div>
<div class="row">
    <div class="col-md-12">
        <table id="categoria-table" class="table table-responsive-sm table-hover">
            <thead>
                <tr>
                    <th class="pl-4">Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tbody-rows" class="table-bordered">
            </tbody>
        </table>
    </div>
</div>
<?php
Page::footerTemplate('categoria.js');
?>

