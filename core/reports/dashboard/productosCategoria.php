<?php
require('../../helpers/report.php');
require('../../models/categoria.php');
require('../../models/producto.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Productos por categoría');

// Se instancia el módelo Categorías para obtener los datos.
$categoria = new Categoria;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataCategorias = $categoria->readAllCategoria()) {
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
        $producto = new Producto;
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($producto->setIdCategoria($rowCategoria['idcategoria'])) {
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

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>