<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidacionGral extends CI_Controller {

function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
			if (!isset($_POST['txt_curpGral'])) {

				if ($this->session->userdata('logueado') == FALSE) {
					$data['titulo'] = 'Registro General';
					$this->load->view('plantilla/header', $data);
					$this->load->view('loginGral/index');
					$this->load->view('plantilla/footer');		
				}
				else
				{
					redirect('Inicio');
				}

			}
			else{
		
		        $this -> form_validation -> set_rules('txt_curpGral','CURP','trim|required|xss_clean');
				if($this->form_validation->run() == FALSE)
				{
					$data['titulo'] = 'Registro General';
					$this->load->view('plantilla/header', $data);
					$this->load->view('loginGral/index');
					$this->load->view('plantilla/footer');	
				}
				else
				{
					$this->load->model('Model_logingral');
					$curp = $_POST['txt_curpGral'];
				
					if ($this->Model_logingral->validaAcceso($curp)) {
						
						if($this->Model_logingral->loginGral($curp))
						{
							$consulta = $this->Model_logingral->getDatosEmpleado($curp);
							$datos_usuario = array(
								'curp' => $curp,
								'nombre' => $consulta->nombre,
								'bic' => $consulta->bic,
								'categoria' => $consulta->categoria,
								'logueado' => TRUE
								);
							$this->session->set_userdata($datos_usuario);
							redirect('RegGeneral');

						}
						else
						{
							$this->session->set_flashdata('invalido', 'El usuario:  "'.$curp.'", no pertenece a la plantilla de usuarios o ya se encuentra registrado');
							redirect('LoginGral');

						}
					}

					else
					{
						$this->session->set_flashdata('invalido', 'El acceso al sistema de registro se abrirá del <strong>17 y 18 de Julio del 2017</strong> para las academias: <strong>FDC, CIENCIAS NATURALES Y MATEMÁTICAS</strong> y <strong>del 19 y 20 de Julio del 2017</strong> para las académias: <strong>LENGUAJE Y COMUNICACIÓN, LENGUA INDIGENA, CIENCIAS SOCIALES Y TECNOLOGÍA Y COMUNICACIÓN</strong>');
							redirect('LoginGral');
					}
					

				}

			}
	}

	public function salir()
	{
		$this->session->sess_destroy();
		$this->session->set_userdata(array('curp' => '', 'logueado' => FALSE));
		$this->clear_cache();
		redirect('Inicio','refresh');
	}
	
	 function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }	
}
