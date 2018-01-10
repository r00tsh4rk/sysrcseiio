<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    class Model_EmpleadosAdmin extends CI_Model 
    {
        
        function getEmpleados()
        {
        # Funcion que mostrará todos los empleados que se encuentren en la base de datos, mostrandose en automatico
            $consulta = $this -> db -> get('empleados');
            return $consulta -> result();
        }

        function getEmpleadoByCurp($curp)
        {
        # Funcion que mostrará todos los empleados que se encuentren en la base de datos, mostrandose en automatico
             $this->db->select('*');
             $this->db->from('empleados');
             $this->db->join('bic', 'empleados.bic = bic.clave_bic');
             $this->db->where('curp', $curp);
             $consulta = $this -> db -> get();
             return $consulta -> result();
        }
    }
    
 ?>