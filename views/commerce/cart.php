<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Hombres');
?>

    <div class="container cover-general">
        <h3 class="text-center my-5 text-secondary">Shopping cart</h3>
        <!-- row -->
        <div class="row">
            <div class="col-12 col-md-7 mr-5 py-4 mb-sm-4 mb-md-0 p-4">
                <div class="row shadow p-3 mb-3">
                    <div class="col-4">
                        <img src="../../resources/img/socks.jpg" alt="" class="w-75">
                    </div>
                    <div class="col-8">
                        <div class="row  mb-3">
                            <div class="col-12">
                                <h4>Penguin sock</h4>
                            </div>
                        </div>
                        <div class="row  mb-3">
                            <div class="col-12 col-md-3">
                                <!-- Sizes -->
                                <div class="dropdown">
                                    <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Size
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="Size-producto">
                                        <a class="dropdown-item" href="#">S</a>
                                        <a class="dropdown-item" href="#">M</a>
                                        <a class="dropdown-item" href="#">L</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <input class="form-control form-control-sm float-right" type="number" id="cantidad-producto">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Price: $5</p>
                            </div>
                            <div class="col-6">
                                <p>Subtotal: $10</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row shadow p-3  mb-3"">
                <div class=" col-4">
                    <img src="../../resources/img/socks.jpg" alt="" class="w-75">
                </div>
                <div class="col-8">
                    <div class="row  mb-3">
                        <div class="col-12">
                            <h4>Penguin sock</h4>
                        </div>
                    </div>
                    <div class="row  mb-3">
                        <div class="col-3">
                            <!-- Sizes -->
                            <div class="dropdown">
                                <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Size
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="Size-producto">
                                    <a class="dropdown-item" href="#">S</a>
                                    <a class="dropdown-item" href="#">M</a>
                                    <a class="dropdown-item" href="#">L</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <input class="form-control form-control-sm float-right" type="number" id="cantidad-producto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Price: $5</p>
                        </div>
                        <div class="col-6">
                            <p>Subtotal: $10</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row shadow p-3  mb-3">
                <div class="col-4">
                    <img src="../../resources/img/socks.jpg" alt="" class="w-75">
                </div>
                <div class="col-8">
                    <div class="row  mb-3">
                        <div class="col-12">
                            <h4>Penguin sock</h4>
                        </div>
                    </div>
                    <div class="row  mb-3">
                        <div class="col-3">
                            <!-- Sizes -->
                            <div class="dropdown">
                                <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Size
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="Size-producto">
                                    <a class="dropdown-item" href="#">S</a>
                                    <a class="dropdown-item" href="#">M</a>
                                    <a class="dropdown-item" href="#">L</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <input class="form-control form-control-sm float-right" type="number" id="cantidad-producto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Price: $5</p>
                        </div>
                        <div class="col-6">
                            <p>Subtotal: $10</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 border py-4 mb-sm-4 mb-md-0">
            <div class="col-12 text-center">
                <h4 class="mb-5">Process purchase</h4>
                <div class="mx-5 d-flex justify-content-between">
                    <h5>Subtotal:</h5>
                    <h5>$15</h5>
                </div>
                <div class="mx-5 d-flex justify-content-between">
                    <h5>Shipment:</h5>
                    <h5>$2.5</h5>
                </div>
                <div class="mx-5 d-flex justify-content-between">
                    <h5>Total:</h5>
                    <h5>$17.5</h5>
                </div>
                <div class="mb-2 mt-5">
                    <button type="button" class="btn btn-primary custom--button">Process purchase</button>
                </div>
            </div>
        </div>

        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <h4 class="text-secondary">Personal information</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <form method="post" id="" class="">
                    <div class="form-group">
                        <label for="nombres">Name</label>
                        <input type="text" class="form-control" placeholder="Name" id="nombres" name="nombres"
                            pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,25}$" title="Solo se permiten letras">
                        <div class="invalid-feedback">Solo se permiten letras</div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <form method="post" id="" class="">
                    <div class="form-group">
                        <label for="apellidos">Surname</label>
                        <input type="text" class="form-control" placeholder="Surname" id="apellidos" name="apellidos"
                            pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,25}$" title="Solo se permiten letras">
                        <div class="invalid-feedback">Solo se permiten letras</div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <form method="post" id="" class="">
                    <div class="form-group">
                        <label for="telefono">Phone number</label>
                        <input type="text" class="form-control" placeholder="Phone number" id="telefono" name="telefono"
                            pattern="^[2,6,7]{1}[0-9]{3}[-][0-9]{4}$"
                            title="Solo se permite número tenga el formato 0000-0000 y que inicie con 2, 6 o 7">
                        <div class="valid-feedback">Número de teléfono válido</div>
                        <div class="invalid-feedback">Número con formato 0000-0000 e inicie con 2, 6 o 7</div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <form method="post" id="" class="">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Email" id="email" name="email"
                            title="Solo se permiten direcciones de correo válidas">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <h4 class="text-secondary">Shipping information</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="form-group">
                    <label for="direccion">Address</label>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <select class="form-control" id="direccion" name="direccion">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="direccion">Department</label>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <select class="form-control" id="direccion" name="direccion">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
Page::footerTemplate(null);
?>
