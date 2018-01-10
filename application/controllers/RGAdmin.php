<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RGAdmin extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this -> load -> model('Model_registrogral');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			$data['titulo'] = 'Registros Generales';
			$data['consulta'] = $this->Model_registrogral->getRegistrosGral();
			$this->load->view('plantilla/header', $data);
			$this->load->view('dashboardAdmin/registroGeneral/index');
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
