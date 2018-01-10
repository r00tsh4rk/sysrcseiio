<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ficha extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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

	function generarpdf(){
		$this->load->model('Model_talleres');
		$this->load->model('Model_cursos');
		$this->load->model('Model_EmpleadosAdmin');
		$this->load->library('mydompdf');

		$data['talleres'] = $this-> Model_talleres ->getTalleresInscritos($this->session->userdata('curp'));
		$data['cursos'] = $this-> Model_cursos->getCursosInscritos($this->session->userdata('curp'));
		$data['empleado']	= $this->Model_EmpleadosAdmin->getEmpleadoByCurp($this->session->userdata('curp'));
		$html= $this->load->view('pdf/ficha', $data, true);
		$this->mydompdf->load_html($html);

		date_default_timezone_set('America/Mexico_City');
		$time = time();
		$hoy = date("d-m-Y H:i:s", $time);


		$this->mydompdf->render();
 				$this->mydompdf->set_base_path('./assets/css/dompdf.css'); //agregar de nuevo el css
 				$this->mydompdf->stream("Ficha_de_inscripcion-".$hoy.".pdf", array("Attachment" => 1));
 			}

}

/* End of file Ficha.php */
/* Location: ./application/controllers/Ficha.php */