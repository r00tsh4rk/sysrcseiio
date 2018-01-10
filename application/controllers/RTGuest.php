<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RTGuest extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this -> load -> model('Model_RegTalleresAdmin');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			$data['titulo'] = 'Registros a Talleres';
			$data['consulta'] = $this->Model_RegTalleresAdmin->getRegTalleres();
			$data['talleres'] = $this->Model_RegTalleresAdmin->getTalleres();
			$this->load->view('plantilla/header', $data);
			$this->load->view('dashboardGuest/registroTalleres/index');
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
