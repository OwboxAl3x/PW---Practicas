<?php

    class foroModel{

        private $db;
        private $hilos;
        public $creador;
        public $respuestas;

        public function __construct(){

            $this->db = Conectar::conexion();
            $this->hilos = array();
            $this->respuestas = array();
            $this->creador = array();
            $this->rxh = array();

        }

        public function getHilos(){

            $consulta=$this->db->query("SELECT * FROM Hilos;");
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->hilos[]=$filas;
            }
            return $this->hilos;

        }

        public function getHiloPorID($id){

            $consulta=$this->db->query("SELECT * FROM Hilos WHERE ID = '".$id."';");
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->hilos[]=$filas;
            }
            return $this->hilos;

        }        

        public function getCreadorHilo($dni){

            $consulta=$this->db->query("SELECT * FROM Users WHERE DNI = '".$dni."';");
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->creador[]=$filas;
            }
            return $this->creador;

        }

        public function getRespuestas($idHilo){

            $consulta=$this->db->query("SELECT * FROM Respuestas WHERE ID_Hilo = ".$idHilo.";");
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->respuestas[]=$filas;
            }
            return $this->respuestas;

        }

        public function getCreadorRespuesta($dni){

            $consulta=$this->db->query("SELECT * FROM Users WHERE DNI = '".$dni."';");
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->creador[]=$filas;
            }
            return $this->creador;

        }

        public function nuevoHilo($titulo, $descripcion, $seudonimoCreador) {

            $result = $this->db->query("SELECT DNI FROM Users WHERE Seudonimo = '".$seudonimoCreador."';");

            if(!$result){
                return false;
            }

            while($filas=$result->fetch(PDO::FETCH_ASSOC)){
                $user[]=$filas;
            }
            
            $result2 = $this->db->query("INSERT INTO Hilos (Titulo, Descripcion, DNI) VALUES ('".$titulo."', '".$descripcion."', ".$user[0]['DNI'].");");

            if(!$result2){
                return false;
            }

            $result3 = $this->db->query("SELECT ID FROM Hilos WHERE Titulo = '".$titulo."' and Descripcion = '".$descripcion."';");
            
            while($filas=$result3->fetch(PDO::FETCH_ASSOC)){
                $this->respuestas[]=$filas;
            }
            return $this->respuestas;

        }

        public function getRespuestasUser($dni){

            $consulta=$this->db->query("SELECT * FROM Respuestas WHERE DNI = ".$dni.";");
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->respuestas[]=$filas;
            }
            return $this->respuestas;

        }

        public function nuevaRespuesta($idHilo, $texto, $seudonimoCreador) {

            $result = $this->db->query("SELECT DNI FROM Users WHERE Seudonimo = '".$seudonimoCreador."';");

            if(!$result){
                return false;
            }

            while($filas=$result->fetch(PDO::FETCH_ASSOC)){
                $user[]=$filas;
            }
            
            $result2 = $this->db->query("INSERT INTO Respuestas (ID_Hilo, Texto, DNI) VALUES (".$idHilo.", '".$texto."', ".$user[0]['DNI'].");");

            if(!$result2){
                return false;
            }

            return true;

        }

        public function getHilosUser($dni){

            $consulta=$this->db->query("SELECT * FROM Hilos WHERE DNI = ".$dni.";");
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->respuestas[]=$filas;
            }
            return $this->respuestas;

        }

    }

?>