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
// Se instancia el módelo Orden para obtener los datos.
$compra = new Orden;
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
    $pdf->Cell(-134,44,'Reporte de ordenes ',0,0, 'C');   
    //Se establece el titulo del documento
    $pdf->SetTitle('Ordenes del cliente', true);
    //Datos del día del reporte
    $pdf->SetFont('Arial','',12);
    // Se imprime una celda vacía ficticia como un espaciador vertical
    $pdf->Cell(123,10,'',0,0,'L');//Esta línea sirve para acomodar elementos
    $pdf->Cell(14,20,'San Salvador, El Salvador',0,0,'L');
    $pdf->Cell(40,30,'Fecha: '.date('d-m-Y'),0,1,'L');//final del linea
    $pdf->Cell(0,5,'_______________________________________________________________________________',0,1);//final de linea
    
    /*
    //Se leen los datos del cliente
    $cliente->setIdCliente('');
    $dataCliente = $cliente->readOneCliente();
    //Se imprime el nombre y el apellido del cliente
    $pdf->Cell(10,15,utf8_decode('Nombre del cliente: '.$dataCliente['nombres'].' '.$dataCliente['apellidos']),0,0);//end of line
    */
    
    //Se consultan las ordenes relacionadas a este cliente
    /*$compra->setIdCliente($_SESSION['idcliente']);
    if ($dataOrdenes = $compra->readOrdenesCliente()) {
        // Se recorren los registros ($dataOrdenes) fila por fila ($rowOrden).
        foreach ($dataOrdenes as $rowOrden) {       
            // Se imprimen las celdas con los datos de los productos.
            $pdf->Cell(105, 10, utf8_decode($rowOrden['nombres']), 1, 0);   //prueba        
        }
    } else {
        $pdf->Cell(0, 10, utf8_decode('No hay ordenes hechas por este usuario'), 1, 1);
    }
    */

    $pdf->Output();   
} else {
    header('location:../../../views/dashboard/clients.php');
}



?>