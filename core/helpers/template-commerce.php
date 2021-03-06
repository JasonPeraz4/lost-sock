<?php
class Page {
    public static function headerTemplate($title){
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en las páginas web.
        session_start();
        // Se imprime el código HTML de la cabecera del documento.
        print('<!DOCTYPE html>
    <html lang="es">
        <head>
            <!-- Se especifica la codificación de caracteres para el documento -->
            <meta charset="utf-8">
            <!-- Se indica al navegador que la página web está optimizada para dispositivos móviles -->
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Título del documento -->
            <title>'.$title.' | Lost Sock</title>
            <!-- Importación de archivos CSS -->
            <link rel="stylesheet" href="../../resources/css/all.min.css">
            <link rel="stylesheet" href="../../resources/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/owl.carousel.min.css">
            <link rel="stylesheet" href="../../resources/css/owl.theme.default.min.css">
            <link rel="stylesheet" href="../../resources/css/publicstyle.css" type="text/css">
            <link rel="shortcut icon" href="../../resources/img/favicon.svg" type="image/x-icon"> 
        </head>
        <body>
            <!--Encabezado del documento-->
            <header class="">
                <!-- Toggle button -->
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <!-- Toggle button -->
                <div class="overlay"></div>
                <!-- Menú/nav -->
                <nav class="navegation fixed-top custom--card">
                    <div class="close">
                    <i class="fas fa-times close-icon"></i>
                    </div>
                    <!-- Logo del menú -->
                    <div class="logo">
                        <a href="index.php">
                            <img src="../../resources/img/logos.svg" alt="logo">
                        </a>
                    </div>
                    <!-- Logo del menú -->
                    <!-- Parte central del nav -->
                    <div class="nav-middle">
                        <ul>
                            <li>
                                <a href="index.php">Inicio</a>
                            </li>
                            <li>
                                <a href="women.php?id=1">Mujeres</a>
                            </li>
                            <li>
                                <a href="men.php?id=2">Hombres</a>
                            </li>
                            <li>
                                <a href="kids.php?id=3">Niños</a>
                            </li>
                            <li>
                                <a href="exclusive.php?id=4">Exclusivo</a>
                            </li>

                        </ul>
                    </div>
                    <!-- /Parte central del nav -->
                    
            ');
            // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de cliente para mostrar el menú de opciones, de lo contrario se muestra otro menú.
        if (isset($_SESSION['idcliente'])) {
            // Se verifica si la página web actual es diferente a login.php y register.php, de lo contrario se direcciona a index.php
            if ($filename != 'login.php' && $filename != 'register.php') {
                print('
                    <!-- Parte derecha del nav -->
                    <div class="nav-right">
                        <ul>
                            <li>
                                <a href="account.php"><i class="fad fa-user text-purple"></i></a>
                            </li>
                            <li>
                                <a href="cart.php"><i class="fad fa-shopping-cart text-purple"></i></a>
                            </li>
                            <li>
                                <a href="#" onclick="logOut()"><i class="fad fa-sign-out-alt text-purple"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Parte derecha del nav -->
                </nav>
                <!-- Menú/nav -->
            </header>
            <main>
            <!-- Contenido principal -->
                ');
            } else {
                header('location: index.php');
            }
        } else {
            // Se verifica si la página web actual es diferente a cart.php (Carrito) y a account.php (Ajustes del cliente) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ($filename != 'cart.php' && $filename != 'account.php' && $filename != 'recover-pass.php') {
                print('
                    <!-- Parte derecha del nav -->
                    <div class="nav-right">
                        <ul>
                            <li>
                                <a href="login.php"><i class="fad fa-sign-in-alt text-purple"></i></a>
                            </li>
                            <li>
                                <a href="cart.php"><i class="fad fa-shopping-cart text-purple"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Parte derecha del nav -->
                </nav>
                <!-- Menú/nav -->
            </header>
            <main>
            <!-- Contenido principal -->
                ');
            } else {
                header('location: login.php');
            }
        }
            // Se llama al método que contiene el código de las cajas de dialogo (modals).
            self::modals();
        }
        public static function footerTemplate($controller){
            print('            </main>
            <hr>
            <!-- Pie del documento -->
            <footer class="page-footer font-small pt-4 px-md-5">
                <!-- Footer Links -->
                <div class="container-fluid text-center text-md-left">
                    <!-- Grid row -->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 mb-md-0">
                            <!-- Links -->
                            <p class="text-uppercase font-weight-bold">CATEGORÍAS</hp>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="men.php">Hombres</a>
                                </li>
                                <li>
                                    <a href="women.php">Mujeres</a>
                                </li>
                                <li>
                                    <a href="kids.php">Niños</a>
                                </li>
                                <li>
                                    <a href="exclusive.php">Exclusivos</a>
                                </li>
                                <li>
                                    <a href="suscription.php">Suscripción</a>
                                </li>
                            </ul>
                            <!-- Links -->
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-3 mb-md-0">
                            <!-- Links -->
                            <p class="text-uppercase font-weight-bold">NAVEGAR</hp>
                            <ul class="list-unstyled">
                                <li>
                                    <a data-toggle="modal" data-target="#modalAbout">Sobre nosotros</a>
                                </li>
                                <li>
                                    <a data-toggle="modal" data-target="#modalTerms">Condiciones de envío</a>
                                </li>
                            </ul>
                            <!-- Links -->
                        </div>
                        <!-- Grid column -->
                        <hr class="clearfix w-100 d-md-none pb-3">
                        <!-- Grid column -->
                        <div class="col-md-6 mt-md-0 mt-3 text-md-right text-center">
                            <!-- Content -->
                            <p>
                                <a href="https://instagram.com/" class="mx-3">
                                    <i class="fab fa-instagram text-purple"></i>
                                </a>
                                <a href="https://facebook.com/" class="mx-3">
                                    <i class="fab fa-facebook text-purple"></i>
                                </a>
                                <a href="https://twitter.com/" class="mx-3">
                                    <i class="fab fa-twitter text-purple"></i>
                                </a>
                            </p>
                            <p><a href="https://gmail.com/"><span class="fad fa-envelope text-purple mx-3"></span>hello@lostsocksociety.com</a></p>
                            <div class="logo">
                                <a href="index.php">
                                    <img src="../../resources/img/logos.svg" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
                <!-- Footer Links -->
                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">©2020 Copyright Lost Sock. Todos los derechos reservados.</div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
                <!-- Archivos JavaScript -->
                <!-- jQuery primero, luego Popper.js y Bootstrap JS -->
                <!-- Importación de archivos JavaScript al final del documento para una carga optimizada -->
                <script src="../../resources/js/jquery-3.4.1.min.js" type="text/javascript"></script>
                <script src="../../resources/js/popper.min.js" type="text/javascript"></script>
                <script src="../../resources/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="../../resources/js/all.min.js" type="text/javascript"></script>
                <script src="../../resources/js/owl.carousel.min.js"></script>
                <script src="../../resources/js/publicmain.js" type="text/javascript"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script src="../../core/helpers/components.js" type="text/javascript"></script>
                <script src="../../core/controllers/commerce/account.js" type="text/javascript"></script>
                ');
        if ( $controller != null ) {
            print('
                <script src="../../core/controllers/commerce/'.$controller.'" type="text/javascript"></script>
                <!-- Latest compiled and minified CSS -->
            </body>
        </html>
            ');
        } else {
            print('
                <!-- Latest compiled and minified CSS -->
            </body>
        </html>
        ');
        }
    }

    /*
    *   Método para imprimir las cajas de dialogo (modals).
    */
    private static function modals()
    {
        // Se imprime el código HTML de las cajas de dialogo (modals).
        print('
        <!-- Modal -->
        <div class="modal fade" id="modalAbout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="jumbotron jumbotron-fluid cover--about">
                                    <div class="container">
                                        <h2 class="display-4 text-muted">Nuestra historia</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="container">
                                    <p class="lead">
                                        Calcetines con su respectivo par desaparecido ¿a quién no le ha
                                        sucedido esto más de alguna vez? A todos. Y aún cuando esto
                                        sucede constantemente, nadie realmente se detiene a pensar en
                                        esta pieza tan esencial, con muchas funciones, desde proteger
                                        tus pies de aquellos molestos zapatos nuevos, hasta mantenerlos
                                        calientes en aquellos días de invierno. Lost Sock nace como una
                                        atrevida idea de negocio que busca innovar el diseño de estos,
                                        convirtiéndolos en una pieza representativa de la identidad creativa de cada quien.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End modal -->
        <!-- Modal -->
        <div class="modal fade" id="modalTerms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="card text-center custom--card">
                                    <div class="card-body">
                                        <div class="fad fa-box mb-5 fa-5x text-purple"></div>
                                        <h4 class="card-title mb-4 text-secondary font-weight-light">Devoluciones</h2>
                                            <p class="card-text mx-auto text-secondary">Si después de recibir tu pedido te
                                                encuentras
                                                insatisfecho con nuestros productos, tienes 5 días para solicitar un reembolso
                                                de tu dinero, siempre
                                                y cuando el producto se encuentre en el empaque orginal y en buen estado.
                                            </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card text-center custom--card">
                                    <div class="card-body">
                                        <div class="fad fa-money-bill-wave mb-5 fa-5x text-purple"></div>
                                        <h4 class="card-title mb-4 text-secondary font-weight-light">Precios</h2>
                                            <p class="card-text mx-auto text-secondary">Los precios dependen del lugar donde te
                                                encuentres. Para el área metropolitana de San Salvador los envíos son gratuitos,
                                                entregados
                                                por el personal de Lost Sock, en caso contrario, los envíos son realizados por
                                                Correos de El Salvador.
                                            </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card text-center custom--card">
                                    <div class="card-body">
                                        <div class="fad fa-box-fragile mb-5 fa-5x text-purple"></div>
                                        <h4 class="card-title mb-4 text-secondary font-weight-light">Daños</h2>
                                            <p class="card-text mx-auto text-secondary">Si el producto se encuentra dañado
                                                debido
                                                a mal manejo del servicio de correos, tienes un plazo de 15 días a partir de la
                                                fecha
                                                en la que recibiste el paquete para realizar tu reclamos y solicitar un cambio o
                                                una
                                                devolución.
                                            </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End modal -->
        ');
    }
}
?>