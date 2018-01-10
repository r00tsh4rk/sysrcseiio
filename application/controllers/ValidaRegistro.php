<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidaRegistro extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this ->load->model('Model_registrogral');
	}

	   public function index()
	{
		if ($this->session->userdata('curp')) {
			
			$data['titulo'] = 'Registro General';
			$this->load->view('plantilla/header', $data);
			$this->load->view('registroGral/index');
			$this->load->view('plantilla/footer');	

		}
    else
		{
			redirect('LoginGral');
		}
		
    }

    public function Agregar()
 	{
           # code..
           # $this -> form_validation -> set_rules('txt_nombre','nombre','trim|required');
      
          $this -> form_validation -> set_rules('txt_nombre','nombre','trim|required');
          $this -> form_validation -> set_rules('txt_bic','bic','trim');
          $this -> form_validation -> set_rules('txt_perfil','perfil académico','trim|required');
          $this -> form_validation -> set_rules('txt_especialidad','especialidad','trim|required');
          $this -> form_validation -> set_rules('txt_telefono','telefono','trim');
          $this -> form_validation -> set_rules('txt_email','email','trim|required|valid_email');
          $this -> form_validation -> set_rules('txt_idioma','idioma','trim');
          $this -> form_validation -> set_rules('automovil_radio','auto','trim');
          $this -> form_validation -> set_rules('txt_password','password','trim|required');
          $this -> form_validation -> set_rules('txt_comentario','comentario','trim'); 
		//$this -> form_validation -> set_rules('txt_password','password','trim|required');

          if ($this ->form_validation->run() == FALSE) {
              # code...
           	$data['titulo'] = 'Registro General';
			$this->load->view('plantilla/header', $data);
			$this->load->view('index');
			$this->load->view('plantilla/footer');	
          }
          else
          {
            //llamo al metodo add
            $add=$this->Model_registrogral->agregar(
              $this->input->post("txt_curp"),
              $this->input->post("txt_nombre"),
              $this->input->post("txt_perfil"),
              $this->input->post("txt_especialidad"),
              $this->input->post("txt_telefono"),
              $this->input->post("txt_email"),
              $this->input->post("txt_bic"),
              $this->input->post("txt_idioma"),
              $this->input->post("automovil_radio"),
              $this->input->post("txt_password"),
              $this->input->post("p1"),
              $this->input->post("p2"),
              $this->input->post("p3"),
              $this->input->post("p4"),
              $this->input->post("p5"),
              $this->input->post("p6"),
              $this->input->post("txt_comentario")
              );

            if($add==true){
            //Si la insercion se ejecuto con exito, enviar la variable de sesion con el mensaje exitoso
            // Si se inserto el registro, actualizar la tabla de empleados con el curp y la bandera cambiarla a 1
              $this->Model_registrogral->modificarBanderaRegistro($this->input->post("txt_curp"));

             // Destuye la sesión del empledo loguado para realizar registro
               $this->session->set_flashdata('valido', 'Se ha completado con éxito tu registro al sistema. Accede con tu CURP y Contraseña a esta sección, para ingresar a los talleres.');
              //$this->session->sess_destroy();
              $this->session->set_userdata(array('curp' => '', 'nombre' => '', 'bic' => '', 'categoria' => '', 'logueado' => FALSE));
          
              //Envia el Flasdata
            
              //Reedirecciona 
              redirect(base_url() . 'LoginTalleres/');

            }else{
            	// Si no se ejecuto la insercion a la base de datos, enviar un variable de sesion a LoginGral, indicando el mensaje de error 
            	//  $this->session->sess_destroy();
              //$this->session->sess_destroy();
              $this->session->set_userdata(array('curp' => '', 'nombre' => '', 'bic' => '', 'categoria' => '', 'logueado' => FALSE));
              $this->session->set_flashdata('noRegistro', 'No se realizó tu registro al sistema, ingresa al apartado "Registro General" para intentar nuevamente.');
              redirect(base_url() . 'LoginGral/');
            }

          }
    
   }
	
}
