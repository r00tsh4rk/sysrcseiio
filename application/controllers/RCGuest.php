<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RCGuest extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this -> load -> model('Model_RegCursosAdmin');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			$data['titulo'] = 'Registros a Cursos';
			$data['consulta'] = $this->Model_RegCursosAdmin->getRegCursos();
			$data['cursos'] = $this->Model_RegCursosAdmin->getCursos();
			$this->load->view('plantilla/header', $data);
			$this->load->view('dashboardGuest/registroCursos/index');
			$this->load->view('plantilla/footer');	

						}
		else {
			$data['titulo'] = 'Acceso Administrativo';
			$this->load->view('plantilla/header', $data);
			$this->load->view('loginAdmin/index');
			$this->load->view('plantilla/footer');		
		}	
	}
}
