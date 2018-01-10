<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAdmin extends CI_Controller {

function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
			$data['titulo'] = 'Acceso Administrativo';
			$this->load->view('plantilla/header', $data);
			$this->load->view('loginAdmin/index');
			$this->load->view('plantilla/footer');		
	}
}
