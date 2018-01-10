<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidacionSysUsers extends CI_Controller {

function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
			if (!isset($_POST['txt_password'])) {

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
		
		        $this -> form_validation -> set_rules('txt_user','Usuario','trim|required|xss_clean');
		        $this -> form_validation -> set_rules('txt_password','Contraseña','trim|required|xss_clean');

				if($this->form_validation->run() == FALSE)
				{
					$data['titulo'] = 'Accseso Administrativo';
					$this->load->view('plantilla/header', $data);
					$this->load->view('loginAdmin/index');
					$this->load->view('plantilla/footer');	
				}
				else
				{
					$this->load->model('Model_loginAdmin');
					$user = $_POST['txt_user'];
					$password = $_POST['txt_password'];

					if($this->Model_loginAdmin->loginAdmin($user, $password))
					{
						$consulta = $this->Model_loginAdmin->getDatosUser($user);
						$datos_usuario = array(
							'username' => $user,
							'nombre' => $consulta->nombre,
							'nivel' => $consulta->nivel,
							'logueado' => TRUE
							);
							
							$this->session->set_userdata($datos_usuario);
							if ($this->session->userdata('nivel') == 3) {
                            redirect('DashboardAdmin');
                        }
                        else
                            if($this->session->userdata('nivel') == 2)
                            {
                              redirect('DashboardGuest');
                            }
					}
					else
					{
						$this->session->set_flashdata('invalido', 'El usuario:  "'.$user.'", no tiene acceso, verifique su información.');
						redirect('LoginAdmin');

					}
				
				}

			}
	}

	public function salir()
	{
		$this->session->sess_destroy();
		$this->session->set_userdata(array('username' => '', 'nombre' => '', 'logueado' => FALSE));
		$this->clear_cache();
		redirect('LoginAdmin','refresh');
	}
	
	 function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }	
}
