<?php

    # DATOS DE LA CONEXION
    $host = "localhost";
    $db = "draftosaurus";
    $user = "root";
    $pass = "";

    # CONECTAR A LA BASE DE DATOS
    try 
    {
        $conexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
     
    # EN CASO DE ERROR
    catch (PDOException $e) 
    {
        die("Error de conexión: " . $e->getMessage());
    }
?>