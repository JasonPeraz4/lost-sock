<?php

require('../../helpers/database.php');
require('../../helpers/validator.php');
require('../../models/direccion.php');
require('../../models/orden.php');
require('../../models/costoEnvio.php');
require('../../../libraries/fpdf181/fpdf.php');


//Se instancia la libreria
$pdf = new FPDF('P','mm','letter');

// Se instancia el modelo CostoEnvio para obtener los datos.
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
    $pdf->Cell(0,5,'',0,1);//espaciado
    
    if ($dataEnvio = $departamento->readAllDepartamento()) {
        // Se recorren los registros ($dataEnvio) fila por fila ($rowEnvio).
        foreach ($dataEnvio as $rowEnvio) {
            // Colores, ancho de línea y fuente en negrita y tamaño de fuente para el encabezado con el tipo
            $pdf->SetFillColor(96,15,218);
            $pdf->SetTextColor(255);
            $pdf->SetDrawColor(232,232,232);
            $pdf->SetLineWidth(.4);
            $pdf->SetFont('Arial','B',12);
            // Se imprime una celda con el nombre de la categoría.
            $pdf->Cell(0, 10, utf8_decode($rowEnvio['departamento']), 1, 1, 'C', 1);
            // Se instancia el módelo Productos para obtener los datos.
            //$producto = new Producto;
            // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
            if ($departamento->setIdDepartamento($rowEnvio['iddepartamento'])) {
                // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
                if ($dataOrden = $departamento->readEnviosDepartamento()) {
                    // Se establece un color de relleno para los encabezados.
                    $pdf->SetFillColor(146,80,247);
                    // Se establece la fuente para los encabezados.
                    $pdf->SetFont('Arial', 'B', 11);
                    // Se imprimen las celdas con los encabezados.
                    $pdf->Cell(20, 10, utf8_decode('No. Orden'), 1, 0, 'C', 1);
                    $pdf->Cell(55, 10, utf8_decode('Cliente'), 1, 0, 'C', 1);
                    //$pdf->Cell(25, 10, utf8_decode('Costo de envio'), 1, 0, 'C', 1);
                    $pdf->Cell(89, 10, utf8_decode('Dirección'), 1, 0, 'C', 1);
                    $pdf->Cell(22, 10, utf8_decode('Fecha'), 1, 1, 'C', 1);
                    // Se establece la fuente y el color para los datos de los productos.
                    $pdf->SetTextColor(0);
                    $pdf->SetFont('Arial', '', 11);
                    // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                    foreach ($dataOrden as $rowOrden) {
                        // Se imprimen las celdas con los datos de los productos.
                        $pdf->Cell(20, 10, utf8_decode($rowOrden['idcompra']), 1, 0);
                        $pdf->Cell(55, 10, utf8_decode($rowOrden['nombre']), 1, 0);
                        //$pdf->Cell(25, 10, utf8_decode($rowOrden['costoenvio']), 1, 0);
                        $pdf->Cell(89, 10, utf8_decode($rowOrden['detalledireccion']), 1, 0);
                        $pdf->Cell(22, 10, utf8_decode($rowOrden['fechaenvio']), 1, 1);
                    }
                    // Se imprime una celda vacía ficticia como un espaciador vertical
                    $pdf->Cell(186 ,5,'',0,1);//end of line
                } else {
                    $pdf->Cell(0, 10, utf8_decode('No hay productos para este tipo'), 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en tipo'), 1, 1);
            }
        }
    } else {
        $pdf->Cell(0, 10, utf8_decode('No hay tipos para mostrar'), 1, 1);
    }
    

    //Se envia el proyecto al navegador y se manda a llamar el método footer
    $pdf->Output();   
} else {
    header('location:../../../views/dashboard/clients.php');
}



?>