<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Configuración', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">Account settings</h3>
    </div>
</div>
<div class="row">
    <!-- Lista de opciones -->
    <div class="col-md-4">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="home">Update profile</a>
            <a class="list-group-item list-group-item-action" id="list-password-list" data-toggle="list" href="#list-password" role="tab" aria-controls="profile">Change password</a>
        </div>
    </div>
    <!-- Pestañas a las que acceden las opciones -->
    <div class="col-md-8 bg-light py-5 px-4 list-group-item">
        <div class="tab-content" id="nav-tabContent">
        <!-- Pestaña de cambiar perfil -->
        <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
            <h4 class="mb-4">General information</h4>
            <form method="post" id="profile-form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombres">Name</label>
                        <input type="text" class="form-control" placeholder="Name" id="nombres" name="nombres" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'1','25'}$" title="Solo se permiten letras">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellidos">Surname</label>
                        <input type="text" class="form-control" placeholder="Surname" id="apellidos" name="apellidos" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'1','25'}$" title="Solo se permiten letras">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Emailo</label>
                        <input type="email" class="form-control" placeholder="Email" id="email" name="email" title="Solo se permiten direcciones de correo válidas">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="usuario">User</label>
                        <input type="text" class="form-control" placeholder="User" id="usuario" name="usuario" pattern="^[a-z0-9_-]{3,15}$" title="Solo se permiten letras, y los caracteres - y _">
                    </div>  
                </div>
                <button type="submit" class="btn btn-purple mt-2">Update</button>
            </form>
        </div>
        <!-- Pestaña de cambiar contraseña -->
        <div class="tab-pane fade" id="list-password" role="tabpanel" aria-labelledby="list-password-list">
            <h4 class="mb-4">Change password</h4>
            <form method="post" id="password-form">           
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="clave">Current password</label>
                        <input type="password" class="form-control" id="clave" name="claveactual" placeholder="Current password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="clave1">New password</label>
                        <input type="password" class="form-control" id="clave1" name="clave1" placeholder="New password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="clave2">Repeat password</label>
                        <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repeat password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                    </div>
                </div>
                <button type="submit" class="btn btn-purple mt-2">Update</button>
            </form>
        </div>
        </div>
    </div>
</div>
<?php
Page::footerTemplate(null);
?>

