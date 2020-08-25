<?php

require('../../helpers/database.php');
require('../../helpers/validator.php');
require('../../models/orden.php');
require('../../models/cliente.php');
require('../../../libraries/fpdf181/fpdf.php');


//Se instancia la libreria
$pdf = new FPDF('P','mm','letter');
// Se instancia el módelo Client para obtener los datos.
$cliente = new Cliente;
// Se instancia el módelo CostoEnvio para obtener los datos.
$departamento = new CostoEnvio;
// Se establece la zona horaria a utilizar durante la ejecución del reporte.
ini_set('date.timezone', 'America/El_Salvador');
// Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en las páginas web.
session_start();

// Se verifica si un cliente ha iniciado sesión para generar el documento, de lo contrario se direcciona a main.php
if (isset($_SESSION['idadministrador'])) {   
    $pdf->AliasNbPages();
    $pdf->AddPage(); 
    // Se establecen los margenes del documento (izquierdo, superior y derecho).
    $pdf->setMargins(15, 15, 15);
    //se coloca el logo de la tienda  
    $pdf->Image('../../../resources/img/logos.png',15,15,-305);
    $pdf->SetFont('Arial','B',15);
    //Se le da color al titulo principal
    $pdf->SetTextColor(69, 0, 94);
    //Se establece el encabezado 
    $pdf->Cell(150,30,'LOST SOCK ',0,0, 'C');
    //Se le da color al titulo secundario
    $pdf->SetFont('Arial','',15);
    $pdf->SetTextColor(50);
    //Se establece el titulo secundario
    $pdf->Cell(-137,44,'Reporte de envios ',0,0, 'C');   
    //Se establece el titulo del documento
    $pdf->SetTitle('Ordenes del cliente', true);
    //Datos del día del reporte
    $pdf->SetFont('Arial','',12);
    // Se imprime una celda vacía ficticia como un espaciador vertical
    $pdf->Cell(123,10,'',0,0,'L');//Esta línea sirve para acomodar elementos
    $pdf->Cell(14,20,'San Salvador, El Salvador',0,0,'L');
    $pdf->Cell(40,30,'Fecha: '.date('d-m-Y'),0,1,'L');//final del linea
    $pdf->Cell(0,5,'_______________________________________________________________________________',0,1);//final de linea
    
    if ($dataEnvios = $departamento->readAllCostoEnvio()) {
        // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
        foreach ($dataCategorias as $rowCategoria) {
            // Colores, ancho de línea y fuente en negrita y tamaño de fuente para la categoria
            $pdf->SetFillColor(96,15,218);
            $pdf->SetTextColor(255);
            $pdf->SetDrawColor(232,232,232);
            $pdf->SetLineWidth(.4);
            $pdf->SetFont('Arial','B',12);
            // Se imprime una celda con el nombre de la categoría.
            $pdf->Cell(0, 10, utf8_decode('Categoría: '.$rowCategoria['categoria']), 1, 1, 'C', 1);
            // Se instancia el módelo Productos para obtener los datos.
            $orden = new Orden;
            // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
            if ($orden->setIdDireccion($rowCategoria['iddireccion'])) {
                // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
                if ($dataProductos = $producto->readProductosCategoria()) {
                    // Se establece un color de relleno para los encabezados.
                    $pdf->SetFillColor(146,80,247);
                    // Se establece la fuente para los encabezados.
                    $pdf->SetFont('Arial', 'B', 11);
                    // Se imprimen las celdas con los encabezados.
                    $pdf->Cell(140, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                    $pdf->Cell(46, 10, utf8_decode('Precio'), 1, 1, 'C', 1);
                    // Se establece la fuente y el color para los datos de los productos.
                    $pdf->SetTextColor(0);
                    $pdf->SetFont('Arial', '', 11);
                    // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                    foreach ($dataProductos as $rowProducto) {
                        // Se imprimen las celdas con los datos de los productos.
                        $pdf->Cell(140, 10, utf8_decode($rowProducto['nombre']), 1, 0);
                        $pdf->Cell(46, 10, '$'.$rowProducto['precio'], 1, 1);
                    }
                    // Se imprime una celda vacía ficticia como un espaciador vertical
                    $pdf->Cell(186 ,5,'',0,1);//end of line
                } else {
                    $pdf->Cell(0, 10, utf8_decode('No hay productos para esta categoría'), 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en una categoría'), 1, 1);
            }
        }
    } else {
        $pdf->Cell(0, 10, utf8_decode('No hay categorías para mostrar'), 1, 1);
    }
    
    //Se envia el proyecto al navegador y se manda a llamar el método footer
    $pdf->Output();   
} else {
    header('location:../../../views/dashboard/clients.php');
}



?>