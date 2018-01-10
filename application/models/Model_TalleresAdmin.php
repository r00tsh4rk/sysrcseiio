<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    class Model_TalleresAdmin extends CI_Model 
    {
        
        function getTalleres()
        {
        # Funcion que mostrará todos los empleados que se encuentren en la base de datos, mostrandose en automatico
            $consulta = $this -> db -> get('talleres');
            return $consulta -> result();

        }

        function insertar($nombreTaller, $descripcionTaller, $grupo)
        {
            # code...
            $data = array(
                'nombre_taller' => $nombreTaller,
                'descripcion_taller' => $descripcionTaller,
                'grupo' => $grupo
                );
            return $this -> db -> insert('talleres', $data);
        }


        function modificar($id, $nombreTaller, $descripcionTaller, $grupo) {
            $data = array(
                'nombre_taller' => $nombreTaller,
                'descripcion_taller' => $descripcionTaller,
                'grupo' => $grupo
                );
            $this->db->where('id_taller', $id);
            return $this->db->update('talleres', $data);
        }


        function eliminar($id)
        {
            $this->db->where('id_taller',$id);
            return $this->db->delete('talleres');
        }
    }
    
 ?>