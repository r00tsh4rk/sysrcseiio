<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ReportesRegTalleres extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_RegTalleresAdmin');
    }

    public function index()
    {
       $data['titulo'] = 'Registros a Talleres';
            $data['consulta'] = $this->Model_RegTalleresAdmin->getRegTalleres();
            $data['talleres'] = $this->Model_RegTalleresAdmin->getTalleres();
            $this->load->view('plantilla/header', $data);
            $this->load->view('dashboardAdmin/registroTalleres/index');
            $this->load->view('plantilla/footer');    
       
    }


    public function generarExcel() {

        $this->load->library('Excel');
        $objPHPExcel = new PHPExcel();

        date_default_timezone_set('America/Mexico_City');
        $time = time();
        $hoy = date("d-m-Y H:i:s", $time);
        //$hoy = date("F j, Y, g:i a");
         $tallerSeleccionado = $this->input->post('txt_talleres');
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

        $objDrawingGob->setCoordinates('C1');
        $objDrawingGob->setHeight(100);
        $objDrawingGob->setWidth(100);
        $objDrawingGob->setWorksheet($objPHPExcel->getActiveSheet());

    $objPHPExcel->getProperties()->setCreator("CSEIIO")
    ->setLastModifiedBy("CSEIIO")
    ->setTitle("Reporte de Registros a Talleres ")
    ->setSubject("Reporte de Registros a Talleres ")
    ->setDescription("Este documento contiene los Registros a Talleres que se han generado para el curso de capacitación docente del CSEIIO.")
    ->setKeywords("cseiio reporte ciidir talleres")
    ->setCategory("Reporte");

        $tituloReporte = "Reporte de Registros a Talleres del 1er Congreso de Actualización Docente CSEIIO-CIIDIR 2017";
        $tituloCseiio = "Colegio Superior Para la Educación Integral e Intercultural de Oaxaca - CIIDIR";
        $titulosColumnas = array('FOLIO DE REGISTRO', 'ASESOR QUE SE REGISTRÓ', 'TALLER AL QUE SE INCRIBIÓ');

        // Se combinan las celdas A1 hasta F1, para colocar ahí el titulo del reporte
        $objPHPExcel->setActiveSheetIndex(0)
        ->mergeCells('A1:C1');
// Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('B3',  $tituloReporte) // Titulo del Reporte
    ->setCellValue('B4',  $tituloCseiio) // Titulo del Colegio
    ->setCellValue('A6',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B6',  $titulosColumnas[1])
    ->setCellValue('C6',  $titulosColumnas[2]);


       $objPHPExcel->getActiveSheet()->getStyle('A6:C6')->getFill()
             ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
             ->getStartColor()->setRGB('cfa23f');

    //Rellenar el documento 
    //
            $consultaDatos = $this->Model_RegTalleresAdmin->getRegTalleresByID($tallerSeleccionado);
             $i = 7;

             foreach ($consultaDatos as $fila) {
                 # code...
                 # $objPHPExcel->setActiveSheetIndex(0)
                $objPHPExcel->setActiveSheetIndex(0)
               ->setCellValue('A'.$i, $fila->id_regtaller)
               ->setCellValue('B'.$i, $fila->nombre)
               ->setCellValue('C'.$i, $fila->nombre_taller);
               $i++;
             }

              // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Reporte de Registros a talleres');

// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
         $objPHPExcel->setActiveSheetIndex(0);

// Inmovilizar paneles
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
         $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,6);
            // Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment;filename="Reporte_de_registros_a_talleres:'.$hoy.'.xlsx"');
         header('Cache-Control: max-age=0');

         $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
         $objWriter->save('php://output');
         exit;

      

    }

}
