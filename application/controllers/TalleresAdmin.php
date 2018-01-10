<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalleresAdmin extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this -> load -> model('Model_TalleresAdmin');
		$this->folder = './ficha_tecnica/';
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			$data['titulo'] = 'Talleres';
			$data['consulta'] = $this->Model_TalleresAdmin->getTalleres();
			$this->load->view('plantilla/header', $data);
			$this->load->view('dashboardAdmin/talleres/index');
			$this->load->view('plantilla/footer');	

			}
		else {
			$data['titulo'] = 'Acceso Administrativo';
			$this->load->view('plantilla/header', $data);
			$this->load->view('loginAdmin/index');
			$this->load->view('plantilla/footer');		
		}		
	}

	public function agregarTaller()
	{
		# code..
		$this -> form_validation -> set_rules('txt_nombreTaller','Nombre Taller','trim|required');
		$this -> form_validation -> set_rules('txt_descripcionTaller','Descripción Taller','trim|required');
		$this -> form_validation -> set_rules('txt_grupoTaller','Grupo Taller','trim');
		
		if ($this -> form_validation -> run() == FALSE) {
			# code...
			$data['titulo'] = 'Talleres';
			$data['consulta'] = $this->Model_TalleresAdmin->getTalleres();
			$this->load->view('plantilla/header', $data);
			$this->load->view('dashboardAdmin/talleres/index');
			$this->load->view('plantilla/footer');			

		}
		else
		{
			    $nombreTaller = $this -> input -> post('txt_nombreTaller');
				$descripcion = $this -> input -> post('txt_descripcionTaller');
				$grupo = $this -> input -> post('txt_grupoTaller');

				$agregar= $this->Model_TalleresAdmin->insertar($nombreTaller,$descripcion,$grupo);
               //si la actualización ha sido correcta creamos una sesión flashdata para decirlo
               	if($agregar)
               	{ 	
               	 	$this->session->set_flashdata('insertado', 'El Taller:  '.$nombreTaller.' se ha agregado correctamente');
               	 	redirect('TalleresAdmin');
               }
		}

	 
    }

    public function editarTaller()
	{
		
		$this -> form_validation -> set_rules('txt_nombreTallerA','Nombre Taller','trim|required');
		$this -> form_validation -> set_rules('txt_descripcionTallerA','Descripción Taller','trim|required');
		$this -> form_validation -> set_rules('txt_grupoTallerA','Grupo Taller','trim');
		
		
		if ($this -> form_validation -> run() == FALSE) {
			# code...
			$data['titulo'] = 'Talleres';
			$data['consulta'] = $this->Model_TalleresAdmin->getTalleres();
			$this->load->view('plantilla/header', $data);
			$this->load->view('dashboardAdmin/talleres/index');
			$this->load->view('plantilla/footer');		

		}
		else
		{
				$id = $this -> input -> post('txt_IDTallerA');
				$nombreTaller = $this -> input -> post('txt_nombreTallerA');
				$descripcion = $this -> input -> post('txt_descripcionTallerA');
				$grupo = $this -> input -> post('txt_grupoTallerA');
		
			  $actualizar = $this->Model_TalleresAdmin->modificar($id,$nombreTaller,$descripcion,$grupo);
               //si la actualización ha sido correcta creamos una sesión flashdata para decirlo
               if($actualizar)
               { 	
                $this->session->set_flashdata('actualizado', 'El Taller:  '.$nombreTaller.' se ha actualizado correctamente');
                redirect('TalleresAdmin');
               }		
           }

	}

	function eliminarTaller()
	{
			
			$id = $this->uri->segment(3);
			$delete = $this->Model_TalleresAdmin->eliminar($id);

			if($delete)
			{ 	
				$this->session->set_flashdata('eliminado', 'La taller se ha eliminado correctamente');
				redirect('TalleresAdmin');
			}	
	}

	 public function Descargar($name)
   {
   	$data = file_get_contents($this->folder.$name); 
   	force_download($name,$data); 
   }
}
