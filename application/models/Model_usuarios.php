<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    class Model_usuarios extends CI_Model 
    {
        
        function getUsuarios()
        {

           $consulta = $this -> db -> get('usuarios');
            return $consulta -> result();
        }

       function insertar($username, $password, $nombre, $nivel)
		{
			# code...
			$data = array(
				'username' => $username,
				'password' => $password,
				'nombre' => $nombre,
				'nivel' => $nivel
				);
			return $this -> db -> insert('usuarios', $data);
		}


		function modificar($id, $username, $password, $nombre, $nivel) {
			$data = array(
				'username' => $username,
				'password' => $password,
				'nombre' => $nombre,
				'nivel' => $nivel
				);
			$this->db->where('id_usuario', $id);
			return $this->db->update('usuarios', $data);
		}


		function eliminar($id)
		{
			$this->db->where('id_usuario',$id);
			return $this->db->delete('usuarios');
		}
    }
    
 ?>