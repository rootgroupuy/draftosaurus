<?php

    # DATOS DE LA CONEXION
    $host = "localhost";
    $port = "4306";
    $db = "draftosaurusDB";
    $user = "root";
    $pass = "";

    function getConexion() {
        global $host, $port, $db, $user, $pass;
        try {
            $conexion = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
?>