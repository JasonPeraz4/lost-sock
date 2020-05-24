<?php
class Page {
    public static function headerTemplate($title){
        print('<!DOCTYPE html>
        <html lang="es">
        <head>
            <!-- Se especifica la codificación de caracteres para el documento -->
            <meta charset="utf-8">
            <!-- Se indica al navegador que la página web está optimizada para dispositivos móviles -->
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Título del documento -->
            <title>'.$title.'</title>
            <!-- Importación de archivos CSS -->
            <link rel="stylesheet" href="../../resources/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="../../resources/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/style.css" type="text/css">
            <!-- Llamada a un archivo tipo icono -->
            <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
        </head>
        <body>
            <div class="wrapper">
                <!-- Sidebar Holder -->
                <nav id="sidebar">
                    <!-- Sidebar Header -->
                    <div class="sidebar-header">
                        <h3>Lost Sock</h3>
                    </div>
                    <!-- Sidebar elements -->
                    <ul class="list-unstyled components pb-3">
                        <li class="active">
                            <a href="dashboard.php">
                                <i class="fas fa-chart-line"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#productoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-socks"></i>
                                <span class="menu-title">Productos</span>
                            </a>
                            <ul class="collapse list-unstyled" id="productoSubmenu">
                                <li>
                                    <a href="product-inventoy.php">Inventario</a>
                                </li>
                                <li>
                                    <a href="product-category.php">Categorias</a>
                                </li>
                                <li>
                                    <a href="product-colors.php">Colores</a>
                                </li>
                                <li>
                                    <a href="product-sizes.php">Tallas</a>
                                </li>
                                <li>
                                    <a href="product-type.php">Tipos</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="orders.php">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="menu-title">Pedidos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#suscripcionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-shipping-fast"></i>
                                <span class="menu-title">Suscripciones</span>
                            </a>
                            <ul class="collapse list-unstyled" id="suscripcionSubmenu">
                                <li>
                                    <a href="suscriptions.php">Listado</a>
                                </li>
                                <li>
                                    <a href="suscription-frecuency.php">Frecuencia</a>
                                </li>
                                <li>
                                    <a href="suscription-plans.php">Planes</a>
                                </li>
                                <li>
                                    <a href="shipping-costs.php">Costo de envio</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="clients.php">
                                <i class="fas fa-user"></i>
                                <span class="menu-title">Clientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-user-shield"></i>
                                <span class="menu-title">Administradores</span>
                            </a>
                            <ul class="collapse list-unstyled" id="adminSubmenu">
                                <li>
                                    <a href="admin-list.php">Listado</a>
                                </li>
                                <li>
                                    <a href="admin-type.php">Tipo de usuario</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
        
                <!-- Contenido principal de la página -->
                <div id="content">
                    <!-- Topbar -->
                    
                    <nav class="navbar sticky-top navbar-expand-lg navbar-light top-bar">
                        <!-- Left Toogle-->
                        <button type="button" id="sidebarCollapse" class="navbar-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <button class="navbar-toggler toggle" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav ml-auto">         
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Jason Anthony
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="admin-settings.php">Ajustes</a>
                                    <a class="dropdown-item" href="index.php">Cerrar sesión</a>
                                </div>
                                </li>
                            </ul>
                        </div>
                      </nav>
                    <!-- Contenido principal -->
                    <div class="container-fluid px-md-5 pb-md-5 mt-5">');
    }

    public static function footerTemplate(){
        print('     </div>
                </div>
            </div>
            <!-- Modals -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <!-- Importación de archivos JavaScript al final del documento para una carga optimizada -->
            <script src="../../resources/js/jquery-3.4.1.min.js" type="text/javascript"></script>
            <script src="../../resources/js/popper.min.js" type="text/javascript"></script>
            <script src="../../resources/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="../../resources/js/Chart.bundle.min.js" type="text/javascript"></script>
            <script src="../../resources/js/script.js" type="text/javascript"></script>
        </body>
        </html>');
    }

    public static function headerSignIn($title, $cardTitle){
        print('<!doctype html>
        <html lang="es">
        <head>
            <!-- Se especifica la codificación de caracteres para el documento -->
            <meta charset="utf-8">
            <!-- Se indica al navegador que la página web está optimizada para dispositivos móviles -->
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Título del documento -->
            <title>'.$title.' | Lost Sock</title>
            <!-- Importación de archivos CSS -->
            <link rel="stylesheet" href="../../resources/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/style.css" type="text/css">
            <!-- Llamada a un archivo tipo icono -->
            <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
        </head>
        <body>
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="#" width="30" height="30" class="d-inline-block align-top" alt="">
                    Lost Sock
                </a>
                <p class="my-auto ml-auto">Ir al <a href="../commerce/index.php">sitio público</a></p>
            </nav>
            <div class="sign-in-bg d-flex align-items-center">       
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-5 col-md-7 col-sm-4">
                            <div class="card">
                                <div class="card-body m-3 m-md-4 m-xs-2">
                                    <h3 class="card-title">'.$cardTitle.'</h3>');
    }

    public static function footerSignIn(){
        print('         </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Modals -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- Importación de archivos JavaScript al final del documento para una carga optimizada -->
        <script src="../../resources/js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../../resources/js/popper.min.js" type="text/javascript"></script>
        <script src="../../resources/js/bootstrap.min.js" type="text/javascript"></script>
        </body>
        </html>');
    }
}
?>