<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    class Model_talleres extends CI_Model 
    {
        
        function getTalleres()
        {
        # Funcion que mostrará todos los empleados que se encuentren en la base de datos, mostrandose en automatico
            $consulta = $this -> db -> get('talleres');
            return $consulta -> result();
        }

          function getTalleresA()
        {
        # Funcion que mostrará todos los empleados que se encuentren en la base de datos, mostrandose en automatico
            $this->db->where('grupo','A');
            $this->db->where('cupo != ', 0);
            $consulta = $this -> db -> get('talleres');
            return $consulta -> result();
        }

        function getTalleresB()
        {
        # Funcion que mostrará todos los empleados que se encuentren en la base de datos, mostrandose en automatico
            $this->db->where('grupo','B');
            $this->db->where('cupo != ', 0);
            $consulta = $this -> db -> get('talleres');
            return $consulta -> result();
        }

        function agregarRegistro($curp, $idtaller)
        {
            # Arreglo que guarda todos los datos recibidos por el usarios
            $data = array(
                'curp' => $curp,
                'id_taller' => $idtaller

                );
            return $this -> db -> insert('registro_taller', $data);
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
             $busqueda = $this->db->get('registro_taller');
             return $busqueda->num_rows();
        }

        public function numRegistrosPorUsarioyFolio($curp, $folio)
        {     
             $this->db->where('curp',$curp);    
             $this->db->where('id_taller',$folio);  
             $busqueda = $this->db->get('registro_taller');
             return $busqueda->num_rows();
        }

        public function actualizarCupo($folioTaller, $nuevoCupo)
        {     
             $data = array(
                'cupo' => $nuevoCupo
                );

             $this->db->where('id_taller',$folioTaller);    
             return $this->db->update('talleres', $data);
        }


        public function getCupo($idtaller)
        {
   
            $this->db->select("cupo");
            $this->db->from('talleres');
            $this->db->where('id_taller',$idtaller);
            $seleccion = $this->db->get();
            $resultado = $seleccion->row();
            return $resultado;
        }

        
          function getTalleresInscritos($curp)
        {
            $this->db->select('*');
            $this->db->from('registro_taller');
            $this->db->join('empleados', 'registro_taller.curp = empleados.curp');
            $this->db->join('talleres', 'registro_taller.id_taller = talleres.id_taller');
            $this->db->where('registro_taller.curp',$curp);
            $consulta = $this->db->get();
            return $consulta -> result();
        }


              public function ValidaMismosCursosyDifGrupo($curp)
        {     
             $this->db->select('talleres.clave_taller as t');
             $this->db->from('registro_taller');
             $this->db->join('talleres', 'registro_taller.id_taller = talleres.id_taller');
             $this->db->where('registro_taller.curp',$curp);    
             $consulta = $this->db->get();
             return $consulta -> result();
        }


        public function ValidaMismoGrupo($curp)
        {     
             $this->db->select('talleres.grupo as grupo');
             $this->db->from('registro_taller');
             $this->db->join('talleres', 'registro_taller.id_taller = talleres.id_taller');
             $this->db->where('registro_taller.curp',$curp);    
             $consulta = $this->db->get();
             return $consulta -> result();
        }

    }
    
 ?>