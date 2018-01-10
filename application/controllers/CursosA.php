<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CursosA extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> model('Model_cursos');
		$this->folder = './ficha_tecnica/';
	}

	public function index()
	{
		if ($this->session->userdata('curp')) {

			$data['titulo'] = 'Panel de Cursos A';
			$data['consulta'] = $this-> Model_cursos ->getCursosA();
			$this->load->view('plantilla/header', $data);
			$this->load->view('cursosa/index');
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

	public function Descargar($name)
   {
   		$data = file_get_contents($this->folder.$name); 
   	 	force_download($name,$data); 
   }

}

/* End of file CursosA.php */
/* Location: ./application/controllers/CursosA.php */