<?php
require('../../helpers/report.php');
require('../../models/cliente.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Ganancias por cliente');

// Se instancia el módelo Cliente para obtener los datos.
$cliente = new Cliente;
// Se verifica si existen registros (compras) para mostrar, de lo contrario se imprime un mensaje.

if ($dataClientes = $cliente->gananciasCliente()) {
    // Colores, ancho de línea y fuente en negrita y tamaño de fuente el encabezado
    $pdf->SetFillColor(146,80,247);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(232,232,232);
    $pdf->SetLineWidth(.4);
    $pdf->SetFont('Arial','B',12);
    // Se imprime las celdas con los encabezados.
    $pdf->Cell(120, 10, utf8_decode('Nombre completo'), 1, 0, 'C', 1);
    $pdf->Cell(41, 10, utf8_decode('Cant. de productos'), 1, 0, 'C', 1);
    $pdf->Cell(25, 10, utf8_decode('Ganancias'), 1, 1, 'C', 1);
    // Se establece la fuente y el color para los datos de los clientes.
    $pdf->SetTextColor(0);
    $pdf->SetFont('Arial', '', 11);
    // Se recorren los registros ($dataClientes) fila por fila ($rowClientes).
    foreach ($dataClientes as $rowCliente) {
        // Se imprimen las celdas con los datos de los clientes.
        $pdf->Cell(120, 10, utf8_decode($rowCliente['nombre']), 1, 0);
        $pdf->Cell(41, 10, utf8_decode($rowCliente['cantidad']), 1, 0);
        $pdf->Cell(25, 10, '$'.$rowCliente['total'], 1, 1);
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('Ningún cliente ha realizado una compra'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>