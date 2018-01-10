<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    class Model_loginTalleres extends CI_Model 
    {
        
        public function loginTalleres($curp, $password)
        {
  
            // Valida si el usuario existe en la base de datos
            //// Valida si registro =  0 es decir que no tiene un registro previo
             // Valida si es profesor

             $this->db->where('curp',$curp);
             $this->db->where('password',$password);

             $busqueda = $this->db->get('ficha_registro');
            
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

        public function getDatosUsuario($curp)
        {
   
            $this->db->select("*");
            $this->db->from('ficha_registro');
            $this->db->where('curp',$curp);
            $seleccion = $this->db->get();
            $resultado = $seleccion->row();
            return $resultado;
        }

        
    }
    
 ?>