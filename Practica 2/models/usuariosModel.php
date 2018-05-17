<?php

    class usuariosModel{

        private $db;
        private $usuarios;

        public function __construct(){

            $this->db = Conectar::conexion();
            $this->usuarios = array();

        }

        public function actualizar($usernameAnt, $username, $password, $dni, $nombre, $apellidos, $telefono, $direccion, $ciudad, $pais, $fechacreacion, $email) {
            
            $result = $this->db->query("UPDATE Users SET Seudonimo='".$username."', Contrasenia='".$password."', 
            DNI='".$dni."', Nombre='".$nombre."', Apellidos='".$apellidos."', Telefono='".$telefono."', 
            Direccion='".$direccion."', Ciudad='".$ciudad."', Pais='".$pais."', Fecha_Creacion='".$fechacreacion."', 
            Email='".$email."' WHERE Seudonimo='".$usernameAnt."'");

            if(!$result){
                return false;
            }
            
            return true;

        }

        public function getUsuario($username){

            $consulta=$this->db->query("SELECT * FROM Users WHERE Seudonimo = '".$username."';");
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->usuarios[]=$filas;
            }
            return $this->usuarios;

        }

        public function registrar($username, $password, $dni, $nombre, $apellidos, $telefono, $direccion, $ciudad, $pais, $fechacreacion, $email) {
        
            $consulta = $this->db->query("SELECT * FROM Users WHERE Seudonimo='".$username."';");

            if(!$consulta){
                return false;
            }
            
            if($consulta->rowCount()>0){
                return false;
            }
            
            $consulta = $this->db->query("INSERT INTO Users (DNI, Nombre, Apellidos, Telefono, Direccion, Ciudad, Pais, Fecha_Creacion, 
            Email, Seudonimo, Contrasenia) VALUES ('".$dni."', '".$nombre."', '".$apellidos."', '".$telefono."', '".$direccion."', 
            '".$ciudad."', '".$pais."', '".$fechacreacion."', '".$email."', '".$username."', '".$password."');");
            
            if(!$consulta){
                return false;
            }
            
            return true;

        }
        
        public function buscar($username, $password) {
            
            $result = $this->db->query("SELECT * FROM Users WHERE (Seudonimo='".$username."') && (Contrasenia='".$password."');");

            if(!$result){
                return false;
            }
            
            if($result->rowCount()<1){
                return false;
            }
            
            return true;

        }

    }

?>