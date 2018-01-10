<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    class Model_loginGral extends CI_Model 
    {
        
        public function loginGral($curp)
        {
  
            // Valida si el usuario existe en la base de datos
            //// Valida si registro =  0 es decir que no tiene un registro previo
             // Valida si es profesor

             $this->db->where('curp',$curp);
             $this->db->where('registrado', 0);
             $this->db->like('categoria', 'Profesor', 'after');    
             
             $busqueda = $this->db->get('empleados');
            
             if ($busqueda->num_rows()>0) {
                return true;
             }
             else
             {
                return false;
             }
        }

         public function validaAcceso($curp)
        {
  
            // Valida si el usuario existe en la base de datos
            //// Valida si registro =  0 es decir que no tiene un registro previo
             // Valida si es profesor

             $this->db->where('curp',$curp);
             $this->db->where('registro_activo', 1);
             $this->db->like('categoria', 'Profesor', 'after');    
             
             $busqueda = $this->db->get('empleados');
            
             if ($busqueda->num_rows()>0) {
                return true;
             }
             else
             {
                return false;
             }
        }

         public function validaUserDesCom($curp)
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

        public function getDatosEmpleado($curp)
        {
   
            $this->db->select("*");
            $this->db->from('empleados');
            $this->db->where('curp',$curp);
            $seleccion = $this->db->get();
            $resultado = $seleccion->row();
            return $resultado;
        }

        
    }
    
 ?>