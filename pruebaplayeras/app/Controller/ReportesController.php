<?php
require_once("app/Model/ReportesModel.php");

include_once ("app/LibreriaFPDF/fpdf.php");
//en esta clase definimos el controlador por default, este se llama cunado no indicamos 
//a que controlador queremos llamar 
class ReportesController{

    //nuestro controlador por default tendra una variable llamada vista que llmara a la 
    //ventana espesifica que yo quiero mostrar en la plantilla

    //metodo por default este metodo es el encargado de cargar la plnatilla en pantalla
    //junto con la vista que quiero mostrar
    public function index(){
        session_start();
        if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
        {
        $vista="app/View/admin/Reportes/ReportesView.php";
        $vista2="app/View/admin/Reportes/Ejemplo1View.php";
        $vista3="app/View/admin/Reportes/Ejemplo2View.php";
        $vista4="app/View/admin/Reportes/Ejemplo3View.php";
        include_once("app/View/admin/PlantillaInicioAdminView.php");
        }else{
        $vista="app/View/InicioView.php";
        include_once("app/View/PlantillaInicioView.php");
        }  
    }

    public function reporteProductos()
	{	
        require_once("app/Model/PrendaModel.php");
		$modelo=new PrendaModel();
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            // Crear el objeto FPDF
		    $pdf = new FPDF();
		
		    // Agregar una página
		    $pdf->AddPage();
		    $pdf->Cell(190,30,$pdf->Image('app/src/img/index/logo.jpeg',130,12,60,30),0,1,'R');
		
		    // Establecer la fuente y el tamaño del título
		    $pdf->SetFont('Arial', 'B', 14);
		    $pdf->Cell(0, 10,utf8_decode('Reporte de todas las prendas existentes'), 0, 1, 'C');

		    // Consulta a la base de datos
            
            $prendas=$modelo->getAll(); 
		    //Centrar la tabla
            $pdf->SetLeftMargin(10);
            if (isset($prendas))
            {
        
                // Establecer la fuente y el tamaño del encabezado de la tabla
                $pdf->SetFont('Arial', 'B', 10);

                // Imprimir los encabezados de la tabla
                $pdf->Cell(25, 10, 'Modelo', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Genero', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Precio', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Material', 1, 0, 'C');
                $pdf->Cell(15, 10, 'Talla', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Corte', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Color', 1, 0, 'C');
                $pdf->Cell(25, 10, 'stock', 1, 1, 'C');
            
                // Establecer la fuente y el tamaño del contenido de la tabla
                $pdf->SetFont('Arial', '', 9);

                // Imprimir los datos de la tabla
                foreach ($prendas as $prenda) {
                    $pdf->Cell(25, 10, $prenda['Modelo'], 1, 0, 'L');
                    $pdf->Cell(25, 10, $prenda['Genero'], 1, 0, 'C');
                    $pdf->Cell(25, 10, $prenda['Precio_venta'], 1, 0, 'C');
                    $pdf->Cell(25, 10, $prenda['Material'], 1, 0, 'C');
                    $pdf->Cell(15, 10, $prenda['talla'], 1, 0, 'L');
                    $pdf->Cell(25, 10, $prenda['Corte'], 1, 0, 'C');
                    $pdf->Cell(25, 10, $prenda['nomColor'], 1, 0, 'C');
                    $pdf->Cell(25, 10, $prenda['Existencia'], 1, 1, 'C');
                   
                }

                // Salto de línea después de la tabla
                $pdf->Ln(10);

                
                // Mostrar el PDF
                $pdf->Output();
            } else {
                echo "No se encontraron registros.";
            }
            //******************	
      
        }else
        {
            $vista="app/View/admin/Reportes/ReportesView.php";
            include_once("app/View/admin/PlantillaInicioAdminView.php");
        }

    }
    public function reporteProductosXmaterial()
	{	
        require_once("app/Model/PrendaModel.php");
		$modelo=new PrendaModel();
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $material=$_POST['nomMaterial'];
            // Crear el objeto FPDF
		    $pdf = new FPDF();
		
		    // Agregar una página
		    $pdf->AddPage();
		    $pdf->Cell(190,30,$pdf->Image('app/src/img/index/logo.jpeg',130,12,60,30),0,1,'R');
		
		    // Establecer la fuente y el tamaño del título
		    $pdf->SetFont('Arial', 'B', 14);
		    $pdf->Cell(0, 10,utf8_decode('Reporte de prendas de acuerdo al material'), 0, 1, 'C');

		    // Consulta a la base de datos
            
            $prendas=$modelo->consuPrendaMaterial($material); 
		    //Centrar la tabla
            $pdf->SetLeftMargin(10);
            if (isset($prendas))
            {
        
                // Establecer la fuente y el tamaño del encabezado de la tabla
                $pdf->SetFont('Arial', 'B', 10);

                // Imprimir los encabezados de la tabla
                $pdf->Cell(25, 10, 'Modelo', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Genero', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Precio', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Material', 1, 0, 'C');
                $pdf->Cell(15, 10, 'Talla', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Corte', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Color', 1, 0, 'C');
                $pdf->Cell(25, 10, 'stock', 1, 1, 'C');
            
                // Establecer la fuente y el tamaño del contenido de la tabla
                $pdf->SetFont('Arial', '', 9);

                // Imprimir los datos de la tabla
                foreach($prendas as $prenda) {
                    $pdf->Cell(25, 10, $prenda['Modelo'], 1, 0, 'L');
                    $pdf->Cell(25, 10, $prenda['Genero'], 1, 0, 'C');
                    $pdf->Cell(25, 10, $prenda['Precio_venta'], 1, 0, 'C');
                    $pdf->Cell(25, 10, $prenda['Material'], 1, 0, 'C');
                    $pdf->Cell(15, 10, $prenda['talla'], 1, 0, 'L');
                    $pdf->Cell(25, 10, $prenda['Corte'], 1, 0, 'C');
                    $pdf->Cell(25, 10, $prenda['nomColor'], 1, 0, 'C');
                    $pdf->Cell(25, 10, $prenda['Existencia'], 1, 1, 'C');
                   
                }

                // Salto de línea después de la tabla
                $pdf->Ln(10);

                
                // Mostrar el PDF
                $pdf->Output();
            } else {
                echo "No se encontraron registros.";
            }
            //******************	
      
        }else
        {
            $vista="app/View/admin/Reportes/ReportesView.php";
            include_once("app/View/admin/PlantillaInicioAdminView.php");
        }

    }
    public function reporteProductosXcorte()
	{	
        require_once("app/Model/PrendaModel.php");
		$modelo=new PrendaModel();
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $corte=$_POST['nomCorte'];
            // Crear el objeto FPDF
		    $pdf = new FPDF();
		
		    // Agregar una página
		    $pdf->AddPage();
		    $pdf->Cell(100,40,$pdf->Image('app/src/img/index/logo.jpeg',130,12,60,30),0,1,'C');
		
		    // Establecer la fuente y el tamaño del título
		    $pdf->SetFont('Arial', 'B', 14);
		    $pdf->Cell(0, 10,utf8_decode('Reporte de prendas de acuerdo al material'), 0, 1, 'C');

		    // Consulta a la base de datos
            
            $prendas=$modelo->consuPrendaCorte($corte); 
		    //Centrar la tabla
            $pdf->SetLeftMargin(10);
            if (isset($prendas))
            {
        
                // Establecer la fuente y el tamaño del encabezado de la tabla
                $pdf->SetFont('Arial', 'B', 10);

                // Imprimir los encabezados de la tabla
                $pdf->Cell(25, 10, 'Modelo', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Genero', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Precio', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Material', 1, 0, 'C');
                $pdf->Cell(15, 10, 'Talla', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Corte', 1, 0, 'C');
                $pdf->Cell(25, 10, 'Color', 1, 0, 'C');
                $pdf->Cell(25, 10, 'stock', 1, 1, 'C');
            
                // Establecer la fuente y el tamaño del contenido de la tabla
                $pdf->SetFont('Arial', '', 9);

                // Imprimir los datos de la tabla
                foreach($prendas as $prenda) {
                    $pdf->Cell(25, 10, $prenda['Modelo'], 1, 0, 'L');
                    $pdf->Cell(25, 10, $prenda['Genero'], 1, 0, 'C');
                    $pdf->Cell(25, 10, $prenda['Precio_venta'], 1, 0, 'C');
                    $pdf->Cell(25, 10, $prenda['Material'], 1, 0, 'C');
                    $pdf->Cell(15, 10, $prenda['talla'], 1, 0, 'L');
                    $pdf->Cell(25, 10, $prenda['Corte'], 1, 0, 'C');
                    $pdf->Cell(25, 10, $prenda['nomColor'], 1, 0, 'C');
                    $pdf->Cell(25, 10, $prenda['Existencia'], 1, 1, 'C');
                   
                }

                // Salto de línea después de la tabla
                $pdf->Ln(10);

                
                // Mostrar el PDF
                $pdf->Output();
            } else {
                echo "No se encontraron registros.";
            }
            //******************	
      
        }else
        {
            $vista="app/View/admin/Reportes/ReportesView.php";
            include_once("app/View/admin/PlantillaInicioAdminView.php");
        }

    }
   
}
?>