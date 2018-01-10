<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardGuest extends CI_Controller {

function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			$data['titulo'] = 'Panel Administrativo';
			$this->load->view('plantilla/header', $data);
			$this->load->view('dashboardGuest/index');
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
