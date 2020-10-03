<?php
require('../../helpers/report.php');
require('../../models/tipoProducto.php');
require('../../models/producto.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Productos por tipo');

// Se instancia el módelo Tipos para obtener los datos.
$tipo = new TipoProducto;
// Se verifica si existen registros (tipos) para mostrar, de lo contrario se imprime un mensaje.
if ($dataTipos = $tipo->readAllTipoProducto()) {
    // Se recorren los registros ($dataTipos) fila por fila ($rowTipo).
    foreach ($dataTipos as $rowTipo) {
        // Colores, ancho de línea y fuente en negrita y tamaño de fuente para el encabezado con el tipo
        $pdf->SetFillColor(96,15,218);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(232,232,232);
        $pdf->SetLineWidth(.4);
        $pdf->SetFont('Arial','B',12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Tipo: '.$rowTipo['tipo']), 1, 1, 'C', 1);
        // Se instancia el módelo Productos para obtener los datos.
        $producto = new Producto;
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($producto->setIdTipoProducto($rowTipo['idtipoproducto'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataProductos = $producto->readProductosTipo()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(146,80,247);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Arial', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(126, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Precio'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Ganancia'), 1, 1, 'C', 1);
                // Se establece la fuente y el color para los datos de los productos.
                $pdf->SetTextColor(0);
                $pdf->SetFont('Arial', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataProductos as $rowProducto) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(126, 10, utf8_decode($rowProducto['nombre']), 1, 0);
                    $pdf->Cell(30, 10, '$'.$rowProducto['precio'], 1, 0);
                    $pdf->Cell(30, 10, '$'.$rowProducto['ganancia'], 1, 1);
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

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>