<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpleadosAdmin extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this -> load -> model('Model_EmpleadosAdmin');
	}

	public function index()
	{
			$data['titulo'] = 'Empleados';
			$data['consulta'] = $this->Model_EmpleadosAdmin->getEmpleados();
			$this->load->view('plantilla/header', $data);
			$this->load->view('dashboardAdmin/empleados/index');
			$this->load->view('plantilla/footer');		
	}
}
