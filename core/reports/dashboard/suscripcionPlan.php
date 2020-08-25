<?php
require('../../helpers/report.php');
require('../../models/planSuscripcion.php');
require('../../models/suscripcion.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Suscripciones por plan');

// Se instancia el módelo PlanSuscripcion para obtener los datos.
$plan = new PlanSuscripcion;
// Se verifica si existen registros (planes) para mostrar, de lo contrario se imprime un mensaje.
if ($dataPlanes = $plan->readAllPlanSuscripcion()) {
    // Se recorren los registros ($dataPlanes) fila por fila ($rowPlan).
    foreach ($dataPlanes as $rowPlan) {
        // Colores, ancho de línea y fuente en negrita y tamaño de fuente para el encabezado con los planes
        $pdf->SetFillColor(96,15,218);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(232,232,232);
        $pdf->SetLineWidth(.4);
        $pdf->SetFont('Arial','B',12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Plan de: '.$rowPlan['cantidadpares'].' pares'), 1, 1, 'C', 1);
        // Se instancia el módelo Suscripcion para obtener los datos.
        $suscripcion = new Suscripcion;
        // Se establece el plan para obtener sus suscripciones, de lo contrario se imprime un mensaje de error.
        if ($suscripcion->setIdPlanSuscripcion($rowPlan['idplansuscripcion'])) {
            // Se verifica si existen registros (suscripciones) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataSuscripciones = $suscripcion->readSuscripcionPlan()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(146,80,247);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Arial', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(60, 10, utf8_decode('Cliente'), 1, 0, 'C', 1);
                $pdf->Cell(10, 10, utf8_decode('Talla'), 1, 0, 'C', 1);
                $pdf->Cell(29, 10, utf8_decode('Categoria'), 1, 0, 'C', 1);
                $pdf->Cell(21, 10, utf8_decode('Tipo'), 1, 0, 'C', 1);
                $pdf->Cell(29, 10, utf8_decode('Frecuencia'), 1, 0, 'C', 1);
                $pdf->Cell(22, 10, utf8_decode('Fecha'), 1, 0, 'C', 1);
                $pdf->Cell(15, 10, utf8_decode('Estado'), 1, 1, 'C', 1);
                // Se establece la fuente y el color para los datos de los productos.
                $pdf->SetTextColor(0);
                $pdf->SetFont('Arial', '', 11);
                // Se recorren los registros ($dataSuscripcioness) fila por fila ($rowSuscripcion).
                foreach ($dataSuscripciones as $rowSuscripcion) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(60, 10, utf8_decode($rowSuscripcion['cliente']), 1, 0, 'L', 0);
                    $pdf->Cell(10, 10, utf8_decode($rowSuscripcion['talla']), 1, 0, 'L', 0);
                    $pdf->Cell(29, 10, utf8_decode($rowSuscripcion['categoria']), 1, 0, 'L', 0);
                    $pdf->Cell(21, 10, utf8_decode($rowSuscripcion['tipo']), 1, 0, 'L', 0);
                    $pdf->Cell(29, 10, utf8_decode($rowSuscripcion['frecuencia']), 1, 0, 'L', 0);
                    $pdf->Cell(22, 10, utf8_decode($rowSuscripcion['fecha']), 1, 0, 'L', 0);
                    $pdf->Cell(15, 10, utf8_decode($rowSuscripcion['estado']), 1, 1, 'L', 0);
                }
                // Se imprime una celda vacía ficticia como un espaciador vertical
                $pdf->Cell(186 ,5,'',0,1);//end of line
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay suscripciones en este plan'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en el plan'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay planes para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>