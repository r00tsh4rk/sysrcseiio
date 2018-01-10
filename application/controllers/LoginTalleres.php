<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginTalleres extends CI_Controller {

function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
			$data['titulo'] = 'Acceso a Talleres';
			$this->load->view('plantilla/header', $data);
			$this->load->view('loginTalleres/index');
			$this->load->view('plantilla/footer');		
	}
}
