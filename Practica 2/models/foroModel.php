<?php

    class foroModel{

        private $db;
        private $hilos;
        private $respuestas;

        public function __construct(){

            $this->db = Conectar::conexion();
            $this->hilos = array();
            $this->respuestas = array();

        }

    }

?>