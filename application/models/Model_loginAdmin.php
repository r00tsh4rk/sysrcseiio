<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    class Model_loginAdmin extends CI_Model 
    {
        
        public function loginAdmin($user, $password)
        {
  
            // Valida si el usuario existe en la base de datos
            //// Valida si registro =  0 es decir que no tiene un registro previo
             // Valida si es profesor

             $this->db->where('username',$user);
             $this->db->where('password', $password);
              
             $busqueda = $this->db->get('usuarios');
            
             if ($busqueda->num_rows()>0) {
                return true;
             }
             else
             {
                return false;
             }
        }

        public function getDatosUser($user)
        {
   
            $this->db->select("nombre, nivel", FALSE);
            $this->db->from('usuarios');
            $this->db->where('username',$user);
            $seleccion = $this->db->get();
            $resultado = $seleccion->row();
            return $resultado;
        }

        
    }
    
 ?>