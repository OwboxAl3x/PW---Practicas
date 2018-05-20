<?php

//Llamada al modelo
require("models/foroModel.php");

// Listar hilos
$hilos=new foroModel();

// Obtener creador del hilo
$creador=new foroModel();

// Obtener respuestas
$respuestas=new foroModel();

// Crear nuevo hilo
$nuevoHilo=new foroModel();

// Hilo por ID
$hilo=new foroModel();

// Respuestas por DNI
$respuestasUser=new foroModel();

// Obtener creador de la respuesta
$creadorResp=new foroModel();

// Crear nueva respuesta
$nuevaResp=new foroModel();

// Hilos por DNI
$hilosUser=new foroModel();

?>