<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginGral extends CI_Controller {

function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
			$data['titulo'] = 'Registro General';
			$this->load->view('plantilla/header', $data);
			$this->load->view('loginGral/index');
			$this->load->view('plantilla/footer');		
	}
}
