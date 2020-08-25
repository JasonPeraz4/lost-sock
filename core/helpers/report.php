<?php
require('../../helpers/database.php');
require('../../helpers/validator.php');
require('../../../libraries/fpdf181/fpdf.php');

/**
*   Clase para definir las plantillas de los reportes del sitio privado. Para más información http://www.fpdf.org/
*/
class Report extends FPDF
{
    // Propiedad para guardar el título del reporte.
    private $title = null;

    /*
    *   Método para iniciar el reporte con el encabezado del documento.
    *
    *   Parámetros: $title (título del reporte).
    *
    *   Retorno: ninguno.
    */
    public function startReport($title)
    {
        // Se establece la zona horaria a utilizar durante la ejecución del reporte.
        ini_set('date.timezone', 'America/El_Salvador');
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en los reportes.
        session_start();
        // Se verifica si un administrador ha iniciado sesión para generar el documento, de lo contrario se direcciona a main.php
        if (isset($_SESSION['idadministrador'])) {
            // Se asigna el título del documento a la propiedad de la clase.
            $this->title = $title;
            // Se establece el título del documento (true = utf-8).
            $this->SetTitle($this->title, true);
            // Se establecen los margenes del documento (izquierdo, superior y derecho).
            $this->setMargins(15, 15, 15);
            // Se añade una nueva página al documento (orientación vertical y formato carta) y se llama al método Header()
            $this->AddPage('p', 'letter');
            // Se define un alias para el número total de páginas que se muestra en el pie del documento.
            $this->AliasNbPages();
        } else {
            header('location: ../../views/dashboard/product-inventory.php');
        }
    }

    /*
    *   Se sobrescribe el método de la librería para establecer la plantilla del encabezado de los reportes.
    *   Se llama automáticamente en el método AddPage()
    */
    public function Header()
    {
        //se coloca el logo de la tienda  
        $this->Image('../../../resources/img/logos.png',15,15,-305);
        $this->SetFont('Arial','B',15);
        //Se le da color al titulo principal
        $this->SetTextColor(69, 0, 94);
        //Se establece el encabezado 
        $this->Cell(150,30,'LOST SOCK ',0,0, 'C');
        //Se le da color al titulo secundario
        $this->SetFont('Arial','',15);
        $this->SetTextColor(50);
        //Se establece el titulo secundario
        $this->Cell(-137,44,($this->$title),0,0, 'C');   
        //Se establece el titulo del documento
        $this->SetTitle('Ordenes del cliente', true);
        //Datos del día del reporte
        $this->SetFont('Arial','',12);
        // Se imprime una celda vacía ficticia como un espaciador vertical
        $this->Cell(123,10,'',0,0,'L');//Esta línea sirve para acomodar elementos
        $this->Cell(14,20,'San Salvador, El Salvador',0,0,'L');
        $this->Cell(40,30,'Fecha: '.date('d-m-Y'),0,1,'L');//final del linea
        $this->Cell(0,5,'_______________________________________________________________________________',0,1);//final de linea
        $this->Cell(0,5,'',0,1);//espaciado

    }

    /*
    *   Se sobrescribe el método de la librería para establecer la plantilla del pie de los reportes.
    *   Se llama automáticamente en el método Output()
    */
    public function Footer()
    {
        // Se establece la posición para el número de página (a 15 milimetros del final).
        $this->SetY(-15);
        // Se establece la fuente para el número de página.
        $this->SetFont('Arial', 'I', 8);
        //Se le da color a la fuente del pie 
        $this->SetTextColor(40);
        // Se imprime una celda con el número de página.
        $this->Cell(0, 10, utf8_decode('Página ').$this->PageNo().'/{nb}', 0, 0, 'C');
    }
}
?>