<?php
class Conectar{
    public static function conexion(){

        $dsn = "mysql:host=localhost;dbname=db15433464_pw1718";
        $usuario = "x15433464";
        $password = "15433464";

        try {

            $conexion = new PDO( $dsn, $usuario, $password );
            $conexion->query("SET NAMES 'utf8'");
           
        } catch ( PDOException $e ) { echo "Conexión fallida"; }
        
        return $conexion;
    }
}
?>