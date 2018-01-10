<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    class Model_RegTalleresAdmin extends CI_Model 
    {
        
        function getRegTalleres()
        {
            $this->db->select('*');
            $this->db->from('registro_taller');
            $this->db->join('empleados', 'registro_taller.curp = empleados.curp');
            $this->db->join('talleres', 'registro_taller.id_taller = talleres.id_taller');
            $consulta = $this->db->get();
            return $consulta -> result();
        }

         function getTalleres()
        {
            $consulta = $this -> db -> get('talleres');
            return $consulta -> result();       

             }

          function getRegTalleresByID($tallerSeleccionado)
             {
                $this->db->select('*');
                $this->db->from('registro_taller');
                $this->db->join('empleados', 'registro_taller.curp = empleados.curp');
                $this->db->join('talleres', 'registro_taller.id_taller = talleres.id_taller');
                $this->db->where('talleres.id_taller',$tallerSeleccionado);
                $consulta = $this->db->get();
                return $consulta -> result(); 
             }

    }
    
 ?>