<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ReportesRegGral extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_registrogral');
    }

    public function index()
    {
       $data['titulo'] = 'Registros Generales';
            $data['consulta'] = $this->Model_registrogral->getRegistrosGral();
            $this->load->view('plantilla/header', $data);
            $this->load->view('dashboardAdmin/registroGeneral/index');
            $this->load->view('plantilla/footer');  
       
    }


    public function generarExcel() {

        $this->load->library('Excel');
        $objPHPExcel = new PHPExcel();

        date_default_timezone_set('America/Mexico_City');
        $time = time();
        $hoy = date("d-m-Y H:i:s", $time);
        //$hoy = date("F j, Y, g:i a");

        // DIBUJANDO EL LOGO DEL CSEIIO
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('Logo');
        $objDrawing->setDescription('Logo');
        $objDrawing->setPath('./assets/img/apple-touch-icon.png');

        $objDrawing->setCoordinates('A1');
        $objDrawing->setHeight(100);
        $objDrawing->setWidth(100);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());


        // DIBUJANDO EL LOGO DEL GOBIERNO DEL ESTADO
        $objDrawingGob = new PHPExcel_Worksheet_Drawing();
        $objDrawingGob->setName('LogoIPN');
        $objDrawingGob->setDescription('Logo');
        $objDrawingGob->setPath('./assets/img/ipn.png');

        $objDrawingGob->setCoordinates('N1');
        $objDrawingGob->setHeight(100);
        $objDrawingGob->setWidth(100);
        $objDrawingGob->setWorksheet($objPHPExcel->getActiveSheet());

    $objPHPExcel->getProperties()->setCreator("CSEIIO")
    ->setLastModifiedBy("CSEIIO")
    ->setTitle("Reporte de Registros Generales")
    ->setSubject("Reporte de Registros Generales")
    ->setDescription("Este documento contiene el reporte de registros generales que se han generado para el curso de capacitación docente del CSEIIO.")
    ->setKeywords("cseiio reporte ciidir talleres")
    ->setCategory("Reporte");

        $tituloReporte = "Reporte de Registros Generales del 1er Congreso de Actualización Docente CSEIIO-CIIDIR 2017";
        $tituloCseiio = "Colegio Superior Para la Educación Integral e Intercultural de Oaxaca - CIIDIR";
        $titulosColumnas = array('CURP', 'NOMBRE DE ASESOR', 'PERFIL','ESPECIALIDAD','TELEFONO', 'EMAIL','BIC','IDIOMA', '¿USARÁ AUTOMOVIL?', 'RESPUESTA 1', 'RESPUESTA 2', 'RESPUESTA 3', 'RESPUESTA 4', 'RESPUESTA 5', 'RESPUESTA 6', 'COMENTARIO');

        // Se combinan las celdas A1 hasta F1, para colocar ahí el titulo del reporte
        $objPHPExcel->setActiveSheetIndex(0)
        ->mergeCells('A1:P1');
// Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('F3',  $tituloReporte) // Titulo del Reporte
    ->setCellValue('G4',  $tituloCseiio) // Titulo del Colegio
    ->setCellValue('A6',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B6',  $titulosColumnas[1])
    ->setCellValue('C6',  $titulosColumnas[2])
    ->setCellValue('D6',  $titulosColumnas[3])
    ->setCellValue('E6',  $titulosColumnas[4])
    ->setCellValue('F6',  $titulosColumnas[5])
    ->setCellValue('G6',  $titulosColumnas[6])
    ->setCellValue('H6',  $titulosColumnas[7])
    ->setCellValue('I6',  $titulosColumnas[8])
    ->setCellValue('J6',  $titulosColumnas[9])
    ->setCellValue('K6',  $titulosColumnas[10])
    ->setCellValue('L6',  $titulosColumnas[11])
    ->setCellValue('M6',  $titulosColumnas[12])
    ->setCellValue('N6',  $titulosColumnas[13])
    ->setCellValue('O6',  $titulosColumnas[14])
    ->setCellValue('P6',  $titulosColumnas[15]);


       $objPHPExcel->getActiveSheet()->getStyle('A6:P6')->getFill()
             ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
             ->getStartColor()->setRGB('cfa23f');

    //Rellenar el documento 
    //
            $consultaDatos = $this->Model_registrogral->getRegistrosGral();
             $i = 7;

             foreach ($consultaDatos as $fila) {
                 # code...
                 # $objPHPExcel->setActiveSheetIndex(0)
                $objPHPExcel->setActiveSheetIndex(0)
               ->setCellValue('A'.$i, $fila->curp)
               ->setCellValue('B'.$i, $fila->nombre)
               ->setCellValue('C'.$i, $fila->perfil)
               ->setCellValue('D'.$i, $fila->especialidad)
               ->setCellValue('E'.$i, $fila->telefono)
               ->setCellValue('F'.$i, $fila->email)
               ->setCellValue('G'.$i, $fila->nombre_bic)
               ->setCellValue('H'.$i, $fila->idioma)
               ->setCellValue('I'.$i, $fila->automovil)
               ->setCellValue('J'.$i, $fila->opcion1)
               ->setCellValue('K'.$i, $fila->opcion2)
               ->setCellValue('L'.$i, $fila->opcion3)
               ->setCellValue('M'.$i, $fila->opcion4)
               ->setCellValue('N'.$i, $fila->opcion5)
               ->setCellValue('O'.$i, $fila->opcion6)
               ->setCellValue('P'.$i, $fila->comentario);
               $i++;
             }

              // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Reporte de Registros Generales');

// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
         $objPHPExcel->setActiveSheetIndex(0);

// Inmovilizar paneles
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
         $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,6);
            // Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment;filename="Reporte_de_registros_generales:'.$hoy.'.xlsx"');
         header('Cache-Control: max-age=0');

         $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
         $objWriter->save('php://output');
         exit;

      

    }

}
