<?php

//Conexión a Base de Datos
$mysqli = include_once "conexion-bd.php";

//Recepción valores formulario
$dni = $_POST["dni_profesor"];
$nombre_profesor = $_POST["nombre_profesor"];
$apellidos_profesor = $_POST["apellidos_profesor"];


//Inserción en Base de Datos
$sentencia = $mysqli->prepare("INSERT INTO profesores VALUES (?,?,?)");
$sentencia->bind_param("sss", $dni, $nombre_profesor, $apellidos_profesor);
$sentencia->execute();


$mysqli->close();

header("Location: profesor-listado.php");