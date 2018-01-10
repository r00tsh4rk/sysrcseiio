<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    class Model_RegCursosAdmin extends CI_Model 
    {
        
        function getRegCursos()
        {
            $this->db->select('*');
            $this->db->from('registro_curso');
            $this->db->join('empleados', 'registro_curso.curp = empleados.curp');
            $this->db->join('cursos', 'registro_curso.id_curso = cursos.id_curso');
            $consulta = $this->db->get();
            return $consulta -> result();
        }

         function getCursos()
        {
            $consulta = $this -> db -> get('cursos');
            return $consulta -> result();       

             }

          function getRegCursosByID($tallerSeleccionado)
             {
                $this->db->select('*');
                $this->db->from('registro_curso');
                $this->db->join('empleados', 'registro_curso.curp = empleados.curp');
                $this->db->join('cursos', 'registro_curso.id_curso = cursos.id_curso');
                $this->db->where('cursos.id_curso',$tallerSeleccionado);
                $consulta = $this->db->get();
                return $consulta -> result(); 
             }

    }
    
 ?>