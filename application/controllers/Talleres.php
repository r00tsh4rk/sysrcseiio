<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talleres extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this -> load -> model('Model_talleres');
		$this->folder = './ficha_tecnica/';
	}

	public function index()
	{
		if ($this->session->userdata('curp')) {

			$data['titulo'] = 'Panel de Talleres';
			$data['consulta'] = $this-> Model_talleres ->getTalleresA();
			$this->load->view('plantilla/header', $data);
			$this->load->view('talleres/index');
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
