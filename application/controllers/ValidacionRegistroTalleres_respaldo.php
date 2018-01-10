<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidacionRegistroTalleres extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this->load->model('Model_talleres');
	}

	public function index()
	{
		# code...
		$curp = $_POST['txt_usuario'];
		$idtaller = $_POST['txt_folioTaller'];
		$cupo = $_POST['txt_cupo'];

		if ($this->Model_talleres->isDesComunitario($curp)) {

			if ($this->Model_talleres->numRegistrosPorUsario($curp) == 1) {

				$this->session->set_flashdata('userDesComunitario', 'El usuario:  "'.$curp.'", Corresponde a la academia de Desarrollo Comunitario, solo tiene acceso a un taller, ha alcanzado el máximo de registros');

				redirect('Talleres');
			}
			elseif ($this->Model_talleres->getCupo($idtaller) > 0) {

				$add=$this->Model_talleres->agregarRegistro($curp, $idtaller);

				if($add==true){
            //Si la insercion se ejecuto con exito, se actualiza el cupo
					$nuevo_cupo =  $cupo - 1;
					$this->Model_talleres->actualizarCupo($idtaller, $nuevo_cupo);
						
						$datos_usuario = array(
							'idtaller' => $idtaller
							);
						$this->session->set_userdata($datos_usuario);

					$this->session->set_flashdata('valido', 'Se ha completado tu registro al taller');

					redirect('TalleresB');

				}
				else
				{
					$this->session->set_flashdata('invalido', 'No se realizó tu registro al taller, verifica con el adminsitrador del sistema');
              		redirect('Talleres');
				}
			}
			
		}

		else
			if ($this->Model_talleres->numRegistrosPorUsario($curp) == 2) {

				$this->session->set_flashdata('userNormal', 'El usuario:  "'.$curp.'", ha alcanzado el máximo de dos registros a talleres');

				redirect('TalleresB');
			}
			
			elseif ($this->Model_talleres->numRegistrosPorUsarioyFolio($curp, $idtaller) == 1) {
				$this->session->set_flashdata('yaInscrito', 'El usuario:  "'.$curp.'", ya esta inscrito a este taller');

				redirect('Talleres');
			}

			elseif ($this->Model_talleres->getCupo($idtaller) > 0) {

				$add=$this->Model_talleres->agregarRegistro($curp, $idtaller);

				if($add==true){
            //Si la insercion se ejecuto con exito, se actualiza el cupo
					$nuevo_cupo =  $cupo - 1;
					$this->Model_talleres->actualizarCupo($idtaller, $nuevo_cupo);

					$this->session->set_flashdata('valido', 'Se ha completado con éxito tu registro al taller');

					redirect('TalleresB');

				}
				else
				{
					$this->session->set_flashdata('invalido', 'No se realizó tu registro al taller, verifica con el adminsitrador del sistema');
              		redirect('TalleresB');
				}
			
			}

	}
}
