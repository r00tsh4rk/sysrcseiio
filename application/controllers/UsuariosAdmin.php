<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosAdmin extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this -> load -> model('Model_usuarios');
	}

	public function index()
	{
			if ($this->session->userdata('username')) {
			$data['titulo'] = 'Usuarios';
			$data['consulta'] = $this->Model_usuarios->getUsuarios();
			$this->load->view('plantilla/header', $data);
			$this->load->view('dashboardAdmin/usuarios/index');
			$this->load->view('plantilla/footer');	

						}
		else {
			$data['titulo'] = 'Acceso Administrativo';
			$this->load->view('plantilla/header', $data);
			$this->load->view('loginAdmin/index');
			$this->load->view('plantilla/footer');		
		}	
	}

	public function agregarUsuario()
	{
		# code..
		$this -> form_validation -> set_rules('txt_nombreUsuario','Nombre Usuario','trim|required');
		$this -> form_validation -> set_rules('txt_passUsuario','Password','trim|required');
		$this -> form_validation -> set_rules('txt_nombre','Nombre Completo','trim|required');
		$this -> form_validation -> set_rules('list_nivel','Nivel','required');
		
		if ($this -> form_validation -> run() == FALSE) {
			# code...
			$data['titulo'] = 'Usuarios';
			$data['consulta'] = $this->Model_usuarios->getUsuarios();
			$this->load->view('plantilla/header', $data);
			$this->load->view('dashboardAdmin/usuarios/index');
			$this->load->view('plantilla/footer');		

		}
		else
		{
			    $username = $this -> input -> post('txt_nombreUsuario');
				$password = $this -> input -> post('txt_passUsuario');
				$nombre = $this -> input -> post('txt_nombre');
				$nivel = $this -> input -> post('list_nivel');

				$agregar= $this->Model_usuarios->insertar($username,$password,$nombre,$nivel);
               //si la actualización ha sido correcta creamos una sesión flashdata para decirlo
               	if($agregar)
               	{ 	
               	 	$this->session->set_flashdata('insertado', 'El empleado:  '.$nombre.' se ha agregado correctamente');
               	 	redirect('UsuariosAdmin');
               }
		}

	 
    }

    public function editarUsuario()
	{
		
		$this -> form_validation -> set_rules('txt_nombreUsuarioA','Nombre Usuario','trim|required');
		$this -> form_validation -> set_rules('txt_passUsuarioA','Password','trim|required');
		$this -> form_validation -> set_rules('txt_nombreA','Nombre Completo','trim|required');
		$this -> form_validation -> set_rules('list_nivelA','Nivel','required');	
		
		if ($this -> form_validation -> run() == FALSE) {
			# code...
			$data['titulo'] = 'Usuarios';
			$data['consulta'] = $this->Model_usuarios->getUsuarios();
			$this->load->view('plantilla/header', $data);
			$this->load->view('dashboardAdmin/usuarios/index');
			$this->load->view('plantilla/footer');		

		}
		else
		{
				$id = $this -> input -> post('txt_IDUsuarioA');
				$username = $this -> input -> post('txt_nombreUsuarioA');
				$password = $this -> input -> post('txt_passUsuarioA');
				$nombre = $this -> input -> post('txt_nombreA');
				$nivel = $this -> input -> post('list_nivelA');
		
			  $actualizar = $this->Model_usuarios->modificar($id,$username,$password,$nombre,$nivel);
               //si la actualización ha sido correcta creamos una sesión flashdata para decirlo
               if($actualizar)
               { 	
                $this->session->set_flashdata('actualizado', 'El empleado:  '.$nombre.' se ha actualizado correctamente');
                redirect('UsuariosAdmin');
               }		
           }

	}

	function eliminarUsuario()
	{
			
			$id = $this->uri->segment(3);
			$delete = $this->Model_usuarios->eliminar($id);

			if($delete)
			{ 	
				$this->session->set_flashdata('eliminado', 'La el empleado se ha eliminado correctamente');
				redirect('UsuariosAdmin');
			}	
	}
}
