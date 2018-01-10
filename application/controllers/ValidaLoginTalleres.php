<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidaLoginTalleres extends CI_Controller {

function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
			if (!isset($_POST['txt_curpTalleres'])) {

				if ($this->session->userdata('logueado') == FALSE) {
					$data['titulo'] = 'Acceso a Talleres';
					$this->load->view('plantilla/header', $data);
					$this->load->view('loginTalleres/index');
					$this->load->view('plantilla/footer');		
				}
				else
				{
					redirect('Inicio');
				}

			}
			else{
		
		        $this -> form_validation -> set_rules('txt_curpTalleres','CURP','trim|required|xss_clean');
				if($this->form_validation->run() == FALSE)
				{
					$data['titulo'] = 'Acceso a Talleres';
					$this->load->view('plantilla/header', $data);
					$this->load->view('loginTalleres/index');
					$this->load->view('plantilla/footer');	
				}
				else
				{
					$this->load->model('Model_loginTalleres');
					$curp = $_POST['txt_curpTalleres'];
					$password = $_POST['txt_passwordTalleres'];
				
				

					if($this->Model_loginTalleres->loginTalleres($curp, $password))
					{
						$consulta = $this->Model_loginTalleres->getDatosUsuario($curp);
						$datos_usuario = array(
							'curp' => $curp,
							'nombre' => $consulta->nombre,
							'bic' => $consulta->bic,
							'logueado' => TRUE
							);
						$this->session->set_userdata($datos_usuario);
						 redirect('PanelRegistro');
						
					}
					else
					{
						$this->session->set_flashdata('invalido', 'El usuario:  "'.$curp.'", no esta registrado o sus datos de acceso son incorrectos.');
						redirect('LoginTalleres');
					}
					
				}

			}
	}

	public function salir()
	{
		$this->session->sess_destroy();
		$this->session->set_userdata(array('curp' => '', 'nombre' => '', 'bic' => '', 'logueado' => FALSE));
		$this->clear_cache();
		redirect('LoginTalleres','refresh');
	}
	
	 function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }	
}
