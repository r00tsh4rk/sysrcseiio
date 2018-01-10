<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidacionRegistroCursos extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this->load->model('Model_cursos');
	}

	public function index()
	{
		# code...
		$curp = $_POST['txt_usuario'];
		$idtaller = $_POST['txt_folioTaller'];
		$cupo = $_POST['txt_cupo'];
		$clave_t= $_POST['txt_clave_taller'];
		$grupo= $_POST['txt_grupo'];

		$consulta = $this->Model_cursos->ValidaMismosCursosyDifGrupo($curp);
			foreach ($consulta as $key) {
				$clave = $key->t;
			}
			//echo "CURP: ".$curp." CONSULTA: ".$clave. " VARIABLE DE TABLA POR POST: ".$clave_t;
			//
		$mismo_grupo = $this->Model_cursos->ValidaMismoGrupo($curp);
		foreach ($mismo_grupo as $key) {
				$grupo_consultado = $key->grupo;
			}

				if ($this->Model_cursos->numRegistrosPorUsario($curp) == 2) {

				$this->session->set_flashdata('userNormal', 'El usuario:  "'.$curp.'", ha alcanzado el máximo de dos registros a cursos');

				redirect('CursosB');
			}


			else
				if ($grupo_consultado == $grupo) {
				$this->session->set_flashdata('yaInscrito', 'El usuario:  "'.$curp.'", esta tratando de elegir dos cursos en el mismo grupo');

				redirect('CursosA');
			}

			else
				if ($clave == $clave_t) {
				$this->session->set_flashdata('yaInscrito', 'El usuario:  "'.$curp.'", ya esta inscrito a este curso pero en diferente grupo');

				redirect('CursosB');
			}


			else
				if ($this->Model_cursos->getCupo($idtaller) > 0) {

				$add=$this->Model_cursos->agregarRegistro($curp, $idtaller);

				if($add==true){
            //Si la insercion se ejecuto con exito, se actualiza el cupo
					$nuevo_cupo =  $cupo - 1;
					$this->Model_cursos->actualizarCupo($idtaller, $nuevo_cupo);
						
						$datos_usuario = array(
							'idtaller' => $idtaller
							);
						$this->session->set_userdata($datos_usuario);

					$this->session->set_flashdata('valido', 'Se ha completado tu registro al curso');

					redirect('CursosB');

				}
				else
				{
					$this->session->set_flashdata('invalido', 'No se realizó tu registro al curso, verifica con el adminsitrador del sistema');
              		redirect('CursosA');
				}
			}
			
	
		else
			if ($this->Model_cursos->numRegistrosPorUsario($curp) == 2) {

				$this->session->set_flashdata('userNormal', 'El usuario:  "'.$curp.'", ha alcanzado el máximo de dos registros a cursos');

				redirect('CursosB');
			}

			else
				if ($grupo_consultado == $grupo) {
				$this->session->set_flashdata('yaInscrito', 'El usuario:  "'.$curp.'", esta tratando de elegir dos cursos en el mismo grupo');

				redirect('CursosB');
			}

			else
				if ($clave == $clave_t) {
				$this->session->set_flashdata('yaInscrito', 'El usuario:  "'.$curp.'", ya esta inscrito a este curso pero en diferente grupo');

				redirect('CursosB');
			}

			else
				if ($this->Model_cursos->getCupo($idtaller) > 0) {

				$add=$this->Model_cursos->agregarRegistro($curp, $idtaller);

				if($add==true){
           		//Si la insercion se ejecuto con exito, se actualiza el cupo
					$nuevo_cupo =  $cupo - 1;
					$this->Model_cursos->actualizarCupo($idtaller, $nuevo_cupo);

					$this->session->set_flashdata('valido', 'Se ha completado con éxito tu registro al curso');

					redirect('CursosB');

				}
				else
				{
					$this->session->set_flashdata('invalido', 'No se realizó tu registro al curso, verifica con el adminsitrador del sistema');
              		redirect('CursosB');
				}

			}

	}
}
