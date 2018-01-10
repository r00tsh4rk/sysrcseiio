<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PanelRegistro extends CI_Controller {

	public function index()
	{
		
		if ($this->session->userdata('curp')) {

			$data['titulo'] = 'Panel de Inscripción';
			$this->load->view('plantilla/header', $data);
			$this->load->view('panelinscripcion/index');
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
}

/* End of file PanelRegistro.php */
/* Location: ./application/controllers/PanelRegistro.php */