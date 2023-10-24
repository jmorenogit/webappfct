<?php
    //Conexión a Base de Datos
$mysqli = include_once "conexion-bd.php";

//Recepción valores formulario
$dni = $_POST["dni_profesor"];
$nombre_profesor = $_POST["nombre_profesor"];
$apellidos_profesor = $_POST["apellidos_profesor"];

//Actualización en Base de Datos
$sentencia = $mysqli->prepare("UPDATE profesores SET nombre_profesor=?, apellidos_profesor=? WHERE dni_profesor=?");
$sentencia->bind_param("sss", $nombre_profesor, $apellidos_profesor, $dni);
$sentencia->execute();

$mysqli->close();

header("Location: profesor-listado.php");