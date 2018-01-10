<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ImprimirFicha extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model('Model_talleres');
		$this -> load -> model('Model_cursos');
		$this -> load -> model('Model_EmpleadosAdmin');
		
	}

	public function index()
	{
		if ($this->session->userdata('curp')) {

			$data['titulo'] = 'Panel de Talleres';
			$data['talleres'] = $this-> Model_talleres ->getTalleresInscritos($this->session->userdata('curp'));
			$data['cursos'] = $this-> Model_cursos->getCursosInscritos($this->session->userdata('curp'));
			$this->load->view('plantilla/header', $data);
			$this->load->view('verregistros/index');
			$this->load->view('plantilla/footer');	
		}
		else
		{
			$data['titulo'] = 'Acceso a Talleres';
			$this->load->view('plantilla/header', $data);
			$this->load->view('loginTalleres/index');
			$this->load->view('plantilla/footer');		
		}	 
		
	}

	public function generarPDF() {

		$this->load->library('Pdf');
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);

		     $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Depto. Tecnologías y Comunicación del CSEIIO');
        $pdf->SetTitle('Ficha de registro para el curso de actualización CSEIIO');
        $pdf->SetSubject('Ficha de registro');
        $pdf->SetKeywords('CSEIIO, PDF, Reporte');
		$pdf->SetDisplayMode('real', 'default');

		// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);

// Establecer el tipo de letra

//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('helvetica', '', 11, '', true);

// Añadir una página

		$pdf->AddPage();

		$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Set some content to print
        $informacion = $this->Model_EmpleadosAdmin->getEmpleadoByCurp($this->session->userdata('curp'));

        foreach ($informacion as $key) {
        	$nombre = $key->nombre;
        	$academia = $key->academia;
        	$bic = $key->bic;
        }

        date_default_timezone_set('America/Mexico_City');
		$time = time();
		$hoy = date("d-m-Y H:i:s", $time);

		$html = '';
        $html .= "<style type=text/css>";  
        $html .= "th{color: #fff; text-aling:center; background-color: #FF7F7F;}";
        $html .= "td{background-color:  #E6E6E6; color: #000000;}";
        $html .= "#titulo{color: #0B8BC1;}";
        $html .= "</style>";
		$html .= "<h4 id='titulo'>Nombre del Asesor: </h4> ".$nombre;
		$html .= "<h4 id='titulo'>Area de Conocimiento: </h4>".$academia;
		$html .= "<h4 id='titulo'>BIC de Procedencia: </h4>".$bic;
		$html .= "<h4>Fecha y hora de impresión: </h4>".$hoy;
		$html .= "<br>";
		$html .= "<h2>Talleres</h2>";
		$html .= "<table>";
		$html .= "<tr><th>Folio de Taller</th><th>Nombre de Taller</th><th>Grupo</th><th>Días</th><th>Horario</th><th>Ponente</th><th>Aula</th></tr>";

		$talleres = $this->Model_talleres->getTalleresInscritos($this->session->userdata('curp'));

		foreach($talleres as $row)
		{
			$folio = $row->id_taller;
			$nombre = $row->nombre_taller;
			$grupo =  $row->grupo;
			$dia = $row->dia;
			$hora= $row->hora;
			$ponente = $row->instructor;
			$aula = $row->aula;

			$html .= "<tr><td>" . $folio . "</td><td>" . $nombre . "</td><td>" . $grupo . "</td><td>" . $dia . "</td><td>" . $hora . "</td><td>" . $ponente . "</td><td>" . $aula . "</td></tr>";
		}

		$html .= "</table>";

		$html .= "<hr>";

		$html .= "<style type=text/css>";
        $html .= "th{color: #fff; text-aling:center; background-color: #FF7F7F;}";
        $html .= "td{background-color:  #E6E6E6; color: #000000;}";
        $html .= "</style>";
		$html .= "<h2>Cursos</h2>";

		$html .= "<table width='100%'>";
		$html .= "<tr style='border: 1px solid black;'><th>Folio del Curso</th><th>Nombre del Curso</th><th>Grupo</th><th>Días</th><th>Horario</th><th>Ponente</th><th>Aula</th></tr>";

		$cursos = $this-> Model_cursos->getCursosInscritos($this->session->userdata('curp'));

		foreach($cursos as $row)
		{
			$folio = $row->id_curso;
			$nombre = $row->nombre_curso;
			$grupo =  $row->grupo;
			$dia = $row->dia;
			$hora= $row->hora;
			$ponente = $row->instructor;
			$aula = $row->aula;

			$html .= "<tr><td>" . $folio . "</td><td>" . $nombre . "</td><td>" . $grupo . "</td><td>" . $dia . "</td><td>" . $hora . "</td><td>" . $ponente . "</td><td>" . $aula . "</td></tr>";
		}
		$html .= "</table>";
		$html .= "<br><br><br>";
		date_default_timezone_set('America/Mexico_City');
		$time = time();
		$hoy = date("d-m-Y H:i:s", $time);
		

		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


		

		$nombre_archivo = utf8_decode("Ficha_de_inscripcion-".$hoy.".pdf");

		$pdf->Output($nombre_archivo, 'D');
 }




 	public function generarPDF2() {

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Depto. Tecnologías y Comunicación del CSEIIO');
        $pdf->SetTitle('Ficha de registro para el curso de actualización CSEIIO');
        $pdf->SetSubject('Ficha de registro');
        $pdf->SetKeywords('CSEIIO, PDF, Reporte');

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);

// Establecer el tipo de letra

//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('helvetica', '', 12, '', true);

// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();

//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Establecemos el contenido para imprimir
     
        $talleres = $this-> Model_talleres ->getTalleresInscritos($this->session->userdata('curp'));
		$cursos = $this-> Model_cursos->getCursosInscritos($this->session->userdata('curp'));

       
        //preparamos y maquetamos el contenido a crear
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{color: #fff; text-aling:center; background-color: #00cca3}";
        $html .= "td{background-color:  #BF0A0A; color: #000000}";
        $html .= "</style>";
        $html .= "<img src='<?php echo base_url();  ?>/assets/img/android-chrome-72x72.png' alt='LogoCSEIIO'>";
        $html .= "<h2>Ficha de registro</h2><h4>Talleres y Cursos</h4>";
        $html .= "<table width='100%'>";
        $html .= "<tr><th>Folio de Taller</th><th>Nombre de Taller</th><th>Grupo</th><th>Días</th><th>Horario</th><th>Ponente</th><th>Aula</th></tr>";

        //dato es la respuesta de la función getdatoSeleccionadas($provincia) del modelo
     
   
        foreach($talleres as $row)
        {
        	$folio = $row->id_taller;
        	$nombre = $row->nombre_taller;
        	$grupo =  $row->grupo;
        	$dia = $row->dia;
        	$hora= $row->hora;
        	$ponente = $row->instructor;
        	$aula = $row->aula;

             $html .= "<tr><td>" . $folio . "</td><td>" . $nombre . "</td><td>" . $grupo . "</td><td>" . $dia . "</td><td>" . $hora . "</td><td>" . $ponente . "</td><td>" . $aula . "</td></tr>";
           
       
      }

        $html .= "</table>";
 

// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

	// ---------------------------------------------------------
	// Cerrar el documento PDF y preparamos la salida
	// Este método tiene varias opciones, consulte la documentación para más información.
        date_default_timezone_set('America/Mexico_City');
        $time = time();
        $hoy = date("d-m-Y H:i:s", $time);

        $nombre_archivo = utf8_decode("Ficha_de_inscripcion-".$hoy.".pdf");
        ob_end_clean();
        $pdf->Output($nombre_archivo, 'D');
 }
}

/* End of file ImprimirFicha.php */
/* Location: ./application/controllers/ImprimirFicha.php */