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
		$clave_t= $_POST['txt_clave_taller'];
		$grupo= $_POST['txt_grupo'];

		$consulta = $this->Model_talleres->ValidaMismosCursosyDifGrupo($curp);
			foreach ($consulta as $key) {
				$clave = $key->t;
			}
			//echo "CURP: ".$curp." CONSULTA: ".$clave. " VARIABLE DE TABLA POR POST: ".$clave_t;
			//
		$mismo_grupo = $this->Model_talleres->ValidaMismoGrupo($curp);
		foreach ($mismo_grupo as $key) {
				$grupo_consultado = $key->grupo;
			}

	if ($this->Model_talleres->numRegistrosPorUsario($curp) == 2) {

				$this->session->set_flashdata('userNormal', 'El usuario:  "'.$curp.'", ha alcanzado el máximo de dos registros a talleres');

				redirect('TalleresB');
			}

	else
		if ($grupo_consultado == $grupo) {
				$this->session->set_flashdata('yaInscrito', 'El usuario:  "'.$curp.'", esta tratando de elegir dos talleres en el mismo grupo');

				redirect('Talleres');
			}

			else
				if ($clave == $clave_t) {
				$this->session->set_flashdata('yaInscrito', 'El usuario:  "'.$curp.'", ya esta inscrito a este taller pero en diferente grupo');

				redirect('TalleresB');
			}

			else
				if ($this->Model_talleres->getCupo($idtaller) > 0) {

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
			
	

		else
			if ($this->Model_talleres->numRegistrosPorUsario($curp) == 2) {

				$this->session->set_flashdata('userNormal', 'El usuario:  "'.$curp.'", ha alcanzado el máximo de dos registros a talleres');

				redirect('TalleresB');
			}

			else
				if ($grupo_consultado == $grupo) {
				$this->session->set_flashdata('yaInscrito', 'El usuario:  "'.$curp.'", esta tratando de elegir dos talleres en el mismo grupo');

				redirect('TalleresB');
			}

			else
				if ($clave == $clave_t) {
				$this->session->set_flashdata('yaInscrito', 'El usuario:  "'.$curp.'", ya esta inscrito a este taller pero en diferente grupo');

				redirect('TalleresB');
			}

			else
				if ($this->Model_talleres->getCupo($idtaller) > 0) {

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
