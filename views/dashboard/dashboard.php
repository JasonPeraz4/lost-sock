<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Dashboard');
?>
<div class="row p-md-4 m-md-4 m-2 p-1">
    <h3>Dashboard</h3>
    <div class="card-deck w-100">
        <div class="card card-dashboard border-primary mb-3 w-md-50">
            <div class="card-header text-primary border-primary">Hoy</div>
            <div class="card-body text-primary">
                <h5 class="card-title">$54.5</h5>
                <p class="card-text">15 pedidos</p>
            </div>
        </div>
        <div class="card card-dashboard border-success mb-3 w-md-50">
            <div class="card-header text-success border-success">Semanalmente</div>
            <div class="card-body text-success">
                <h5 class="card-title">$54.5</h5>
                <p class="card-text">15 pedidos</p>
            </div>
        </div>
        <div class="card card-dashboard border-info mb-3 w-md-50">
            <div class="card-header text-info border-info">Mensualmente</div>
            <div class="card-body text-info">
                <h5 class="card-title">$54.5</h5>
                <p class="card-text">15 pedidos</p>
            </div>
        </div>
        <div class="card card-dashboard border-warning mb-3 w-md-50">
            <div class="card-header text-warning border-warning">Anualmente</div>
            <div class="card-body text-warning">
                <h5 class="card-title">$54.5</h5>
                <p class="card-text">15 pedidos</p>
            </div>
        </div>
    </div>
</div>
<div class="row p-md-4 m-md-4">    
    <div class="col-md-8 h-100">
        <h5>Ingresos semanales</h5>
        <div class="card">
            <div class="card-body">
                <canvas id="chLine"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4 mt-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Producto más vendido</h6>
                <span class="fas fa-image fa-9x"></span>
                <h6>Calcetines navideños</h6>
            </div>
        </div>
    </div>
</div>
<div class="row p-md-4 m-md-4 m-2 p-1">
    <div class="col-md-8 table-responsive">
        <h5>Ultimos pedidos</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Nº pedido</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Nº 14</td>
                    <td>01-01-2020</td>
                    <td>$14.25</td>
                    <td><i class="fas fa-ellipsis-v"></i></td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Nº 14</td>
                    <td>01-01-2020</td>
                    <td>$14.25</td>
                    <td><i class="fas fa-ellipsis-v"></i></td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Nº 14</td>
                    <td>01-01-2020</td>
                    <td>$14.25</td>
                    <td><i class="fas fa-ellipsis-v"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4 table-responsive">
        <h5>Ultimas suscripciones</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Frecuencia</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Mensualmente</td>
                    <td><i class="fas fa-ellipsis-v"></i></td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Quincenalmente</td>
                    <td><i class="fas fa-ellipsis-v"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
Page::footerTemplate();
?>

