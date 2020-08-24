<?php

//POR QUE ESTE ARCHIVO ESTA EN LA CARPTETA reports/dashboard? 

require('../../helpers/database.php');
require('../../helpers/validator.php');
require('../../models/orden.php');
require('../../models/cliente.php');
require('../../../libraries/fpdf181/fpdf.php');

//Ancho de formato de carta: 216mm
//Espaciuo horizontal : 216-(15*2)=186mm

//Se instancia la libreria
$pdf = new FPDF('P','mm','A4'); //POR QUE MANDAS A LLAMAR UN A4?

// Se instancia el módelo Client para obtener los datos.
$cliente = new Cliente;
// Se instancia el módelo Orden para obtener los datos.
$compra = new Orden;

// Se establece la zona horaria a utilizar durante la ejecución del reporte.
ini_set('date.timezone', 'America/El_Salvador');
// Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en los reportes.
session_start();
// Se verifica si un administrador ha iniciado sesión para generar el documento, de lo contrario se direcciona a main.php
if (isset($_SESSION['idcompra'])) {
    // Se establece el título del documento (true = utf-8).
    $pdf->SetTitle('Comprobante de compra', true);
    // Se establecen los margenes del documento (izquierdo, superior y derecho).
    $pdf->setMargins(15, 15, 15);
    // Se añade una nueva página al documento (orientación vertical y formato carta).
    $pdf->AddPage('p', 'letter');
    //set font to arial, bold, 14pt
    $pdf->SetFont('Arial','B',14);
    // Se establece el id de la compra actual para obtener el detalle
    $compra->setIdCompra($_SESSION['idcompra']);
    // Se obtiene el detalle de la compra
    $dataCompra = $compra->readCompraDetail();
    
    //Cell(width , height , text , border , end line , [align] )
    // Se imprimen los encabezados
    $pdf->Cell(130 ,5,'LOST SOCK',0,0);
    $pdf->Cell(55 ,5,'COMPROBANTE',0,1, 'R');//end of line
    //set font to arial, regular, 12pt
    $pdf->SetFont('Arial','',12);
    // Se imprime una celda vacía ficticia como un espaciador vertical
    $pdf->Cell(189 ,7,'',0,1);//end of line
    //SE imrpime el detalle de la compra
    $pdf->Cell(130 ,7,'San Salvador, El Salvador',0,0);
    $pdf->Cell(55 ,7,'Fecha: '.date('d-m-Y'),0,1, 'R');

    $pdf->Cell(130 ,7,utf8_decode('Teléfono: 2525-2525'),0,0);
    $pdf->Cell(55 ,7,'Compra #'.$_SESSION['idcompra'],0,1, 'R');//end of line

    $pdf->Cell(130 ,7,'Correo: hello@lostsocksociety.com',0,0);//end of line
    // Se imprime una celda vacía ficticia como un espaciador vertical
    $pdf->Cell(189 ,10,'',0,1);//end of line

    $cliente->setIdCliente($_SESSION['idcliente']);
    $dataCliente = $cliente->readOneCliente();

    // Colores, ancho de línea y fuente en negrita y tamaño de fuente
    $pdf->SetFillColor(146,80,247);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(128,0,0);
    $pdf->SetLineWidth(.3);
    $pdf->SetFont('Arial','B',14);
    //billing address
    $pdf->Cell(189 ,10,'Cliente',0,1,'L',true);//end of line
    // Restauración de colores y fuentes
    $pdf->SetFillColor(224,235,255);
    $pdf->SetDrawColor(0);
    $pdf->SetTextColor(0);
    $pdf->SetFont('Arial','',12);
    // Se imprime una celda vacía ficticia como un espaciador vertical
    $pdf->Cell(189 ,2,'',0,1);//end of line
    //Se agrega una celda ficticia al principio de cada linea para indentar
    $pdf->Cell(10 ,7,'',0,0);
    $pdf->Cell(90 ,7,utf8_decode($dataCliente['nombres'].' '.$dataCliente['apellidos']),0,1);//end of line

    $pdf->Cell(10 ,7,'',0,0);
    $pdf->Cell(90 ,7,utf8_decode($dataCliente['telefono']),0,1);//end of line

    $pdf->Cell(10 ,7,'',0,0);
    $pdf->Cell(90 ,7,utf8_decode($dataCliente['email']),0,1);//end of line

    // Se imprime una celda vacía ficticia como un espaciador vertical
    $pdf->Cell(189 ,10,'',0,1);//end of line
    // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
    if ($dataDetalle = $compra->readCart()) {
        // Colores, ancho de línea y fuente en negrita y tamaño de fuente
        $pdf->SetFillColor(146,80,247);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(232,232,232);
        $pdf->SetLineWidth(.4);
        $pdf->SetFont('Arial','B',12);
        // Se imprimen las celdas con los encabezados.
        $pdf->Cell(105, 10, utf8_decode('Descripción'), 1, 0, 'L', true);
        $pdf->Cell(25, 10, utf8_decode('Cantidad'), 1, 0, 'L', true);
        $pdf->Cell(25, 10, utf8_decode('Precio'), 1, 0, 'L', true);
        $pdf->Cell(34, 10, utf8_decode('Subtotal'), 1, 1, 'L', true);//end of line
        // Se establece la fuente para los datos de los productos.
        $pdf->SetTextColor(0);
        $pdf->SetFont('Arial', '', 11);
        // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
        foreach ($dataDetalle as $rowProducto) {
            
            // Se imprimen las celdas con los datos de los productos.
            $pdf->Cell(105, 10, utf8_decode($rowProducto['nombre']).', talla '.$rowProducto['talla'], 1, 0);
            $pdf->Cell(25, 10, utf8_decode($rowProducto['cantidad']), 1, 0);
            $pdf->Cell(25, 10, utf8_decode('$'.$rowProducto['precio']), 1, 0);
            $pdf->Cell(34, 10, utf8_decode('$'.$rowProducto['subtotal']), 1, 1);//end of line
        }
    } else {
        $pdf->Cell(0, 10, utf8_decode('No hay productos en esta compra'), 1, 1);
    }
    // Se imprime el resumen de la compra y se agrega una celda ficticia para indentar
    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,10,'Subtotal',0,0);
    $pdf->Cell(34 ,10,'$'.$dataCompra['subtotal'],1,1,'R');//end of line

    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,10,'Envio',0,0);
    $pdf->Cell(34 ,10,'$'.$dataCompra['costoenvio'],1,1,'R');//end of line

    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,10,'Total',0,0);
    $pdf->Cell(34 ,10,'$'.$dataCompra['total'],1,1,'R');//end of line
} else {
    header('location: ../../views/dashboard/index.php'); // PORQUE LO ESTAS REDIRIGIENDO A UNA DE LAS VISTAS DEL DASHBOARD?
}

//output the result
$pdf->Output();

?>