<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    class Model_registrogral extends CI_Model 
    {
        function getRegistrosGral()
        {
            $this->db->select('*');
            $this->db->from('ficha_registro');
            $this->db->join('bic', 'bic = clave_bic');
            $consulta = $this->db->get();
            return $consulta -> result();
        }
        
       function agregar($curp, $nombre, $perfil, $especialidad, $telefono, $email, $bic, $idioma, $automovil, $password, $p1, $p2, $p3, $p4, $p5, $p6, $comentario)
        {
            # Arreglo que guarda todos los datos recibidos por el usarios
            $data = array(

                'curp' => $curp,
                'nombre' => $nombre,
                'perfil' => $perfil,
                'especialidad' => $especialidad,
                'telefono' => $telefono,
                'email' => $email,
                'bic' => $bic,
                'idioma' => $idioma,
                'automovil' => $automovil,
                'password' => $password,
                'opcion1' => $p1,
                'opcion2' => $p2,
                'opcion3' => $p3,
                'opcion4' => $p4,
                'opcion5' => $p5,
                'opcion6' => $p6,
                'comentario' => $comentario
                );

            return $this -> db -> insert('ficha_registro', $data);
        }

        function modificarBanderaRegistro($curp) {
            $data = array(

                'registrado' => 1
                );

            $this->db->where('curp', $curp);
            return $this->db->update('empleados', $data);
        }

        
    }
    
 ?>