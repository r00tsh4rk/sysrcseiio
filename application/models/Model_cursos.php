<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cursos extends CI_Model {

	public $variable;

		public function __construct()
		{
			parent::__construct();
		}

		function getAllCursos()
        {
        # Funcion que mostrará todos los empleados que se encuentren en la base de datos, mostrandose en automatico
            $consulta = $this -> db -> get('cursos');
            return $consulta -> result();
        }

          function getCursosA()
        {
        # Funcion que mostrará todos los empleados que se encuentren en la base de datos, mostrandose en automatico
            $this->db->where('grupo','A');
            $this->db->where('cupo != ', 0);
            $consulta = $this -> db -> get('cursos');
            return $consulta -> result();
        }

        function getCursosB()
        {
        # Funcion que mostrará todos los empleados que se encuentren en la base de datos, mostrandose en automatico
            $this->db->where('grupo','B');
            $this->db->where('cupo != ', 0);
            $consulta = $this -> db -> get('cursos');
            return $consulta -> result();
        }

        function agregarRegistro($curp, $idtaller)
        {
            # Arreglo que guarda todos los datos recibidos por el usarios
            $data = array(
                'curp' => $curp,
                'id_curso' => $idtaller

                );
            return $this -> db -> insert('registro_curso', $data);
        }

        public function isDesComunitarioX($curp)
        {
   
            $this->db->select("academia");
            $this->db->from('empleados');
            $this->db->where('curp',$curp);
            $seleccion = $this->db->get();
            $resultado = $seleccion->row();
            return $resultado;
        }

        public function isDesComunitario($curp)
        {
  
            // Valida si el usuario existe en la base de datos
            //// Valida si registro =  0 es decir que no tiene un registro previo
             // Valida si es profesor

             $this->db->where('curp',$curp);
             $this->db->where('academia', 'DESARROLLO COMUNITARIO');
             
             $busqueda = $this->db->get('empleados');
            
             if ($busqueda->num_rows()>0) {
                return true;
             }
             else
             {
                return false;
             }
        }

        public function numRegistrosPorUsario($curp)
        {     
             $this->db->where('curp',$curp);    
             $busqueda = $this->db->get('registro_curso');
             return $busqueda->num_rows();
        }

        public function numRegistrosPorUsarioyFolio($curp, $folio)
        {     
             $this->db->where('curp',$curp);    
             $this->db->where('id_curso',$folio);  
             $busqueda = $this->db->get('registro_curso');
             return $busqueda->num_rows();
        }

        public function actualizarCupo($folioTaller, $nuevoCupo)
        {     
             $data = array(
                'cupo' => $nuevoCupo
                );

             $this->db->where('id_curso',$folioTaller);    
             return $this->db->update('cursos', $data);
        }

        public function getCupo($idtaller)
        {
   
            $this->db->select("cupo");
            $this->db->from('cursos');
            $this->db->where('id_curso',$idtaller);
            $seleccion = $this->db->get();
            $resultado = $seleccion->row();
            return $resultado;
        }
     
          function getCursosInscritos($curp)
        {
            $this->db->select('*');
            $this->db->from('registro_curso');
            $this->db->join('empleados', 'registro_curso.curp = empleados.curp');
            $this->db->join('cursos', 'registro_curso.id_curso = cursos.id_curso');
            $this->db->where('registro_curso.curp',$curp);
            $consulta = $this->db->get();
            return $consulta -> result();
        }


              public function ValidaMismosCursosyDifGrupo($curp)
        {     
             $this->db->select('cursos.clave_curso as t');
             $this->db->from('registro_curso');
             $this->db->join('cursos', 'registro_curso.id_curso = cursos.id_curso');
             $this->db->where('registro_curso.curp',$curp);    
             $consulta = $this->db->get();
             return $consulta -> result();
        }

        public function ValidaMismoGrupoCurso($curp)
        {     
             $this->db->select('cursos.grupo as grupo');
             $this->db->from('registro_curso');
             $this->db->join('cursos', 'registro_curso.id_curso = cursos.id_curso');
             $this->db->where('registro_curso.curp',$curp);    
             $consulta = $this->db->get();
             return $consulta -> result();
        }


          public function ValidaMismoGrupo($curp)
        {     
             $this->db->select('cursos.grupo as grupo');
             $this->db->from('registro_curso');
             $this->db->join('cursos', 'registro_curso.id_curso = cursos.id_curso');
             $this->db->where('registro_curso.curp',$curp);    
             $consulta = $this->db->get();
             return $consulta -> result();
        }

    }



/* End of file Model_cursos.php */
/* Location: ./application/models/Model_cursos.php */