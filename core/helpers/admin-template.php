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
            <link rel="stylesheet" href="../../resources/css/material-icons.css">
            <link rel="stylesheet" href="../../resources/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/style.css" type="text/css">
            <!-- Llamada a un archivo tipo icono -->
            <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
        </head>
        <body>
            <div class="wrapper">
                <!-- Sidebar Holder -->
                <nav id="sidebar">
                    <div class="sidebar-header">
                        <h3>Lost Sock</h3>
                    </div>
        
                    <ul class="list-unstyled components">
                        <li class="active">
                            <a href="#">
                                <i class="fas fa-image"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#productoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-home"></i>
                                <span class="menu-title">Productos</span>
                            </a>
                            <ul class="collapse list-unstyled" id="productoSubmenu">
                                <li>
                                    <a href="#">Inventario</a>
                                </li>
                                <li>
                                    <a href="#">Categorias</a>
                                </li>
                                <li>
                                    <a href="#">Tallas</a>
                                </li>
                                <li>
                                    <a href="#">Tipos</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-image"></i>
                                <span class="menu-title">Pedidos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#suscripcionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-home"></i>
                                <span class="menu-title">Suscripciones</span>
                            </a>
                            <ul class="collapse list-unstyled" id="suscripcionSubmenu">
                                <li>
                                    <a href="#">Listado</a>
                                </li>
                                <li>
                                    <a href="#">Frecuencia</a>
                                </li>
                                <li>
                                    <a href="#">Costo de envio</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-image"></i>
                                <span class="menu-title">Clientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-home"></i>
                                <span class="menu-title">Administradores</span>
                            </a>
                            <ul class="collapse list-unstyled" id="adminSubmenu">
                                <li>
                                    <a href="#">Listado</a>
                                </li>
                                <li>
                                    <a href="#">Tipo de usuario</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
        
                    <ul class="list-unstyled CTAs">
                        <li>
                            <a href="#" class="download">Ajustes</a>
                        </li>
                        <li>
                            <a href="#" class="article">Cerrar sesión</a>
                        </li>
                    </ul>
                </nav>
        
                <!-- Page Content Holder -->
                <div id="content">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <!-- Left Toogle-->
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <!-- Left Toggle-->
                            <!-- <button class="btn btn-light d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-align-justify"></i>
                            </button>-->
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                      Dropdown link
                                    </a>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="#">Ajustes</a>
                                      <a class="dropdown-item" href="#">Cerrar sesión</a>
                                    </div>
                                  </li>
                            </ul>                   
                            <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="nav navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Page</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Page</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Page</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Page</a>
                                    </li>
                                </ul>
                            </div> --> 
                        </div>
                    </nav>');
    }

    public static function footerTemplate(){
        print('</div>
        </div>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- Importación de archivos JavaScript al final del documento para una carga optimizada -->
        <script src="../../resources/js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../../resources/js/popper.min.js" type="text/javascript"></script>
        <script src="../../resources/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../resources/js/script.js" type="text/javascript"></script>
    </body>
    </html>');
    }
}
?>