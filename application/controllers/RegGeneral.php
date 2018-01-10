<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegGeneral extends CI_Controller {

function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('curp')) {
			$data['titulo'] = 'Registro General';
			$this->load->view('plantilla/header', $data);
			$this->load->view('registroGral/index');
			$this->load->view('plantilla/footer');	
		}
		else
		{
			$data['titulo'] = 'Registro General';
			$this->load->view('plantilla/header', $data);
			$this->load->view('loginGral/index');
			$this->load->view('plantilla/footer');	
		}		
	}
}
