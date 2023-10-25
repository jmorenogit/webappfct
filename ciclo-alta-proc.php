<?php

//Conexión a Base de Datos
$mysqli = include_once "conexion-bd.php";

//Recepción valores formulario
$clave_ciclo = $_POST["clave_ciclo"];
$nombre_ciclo = $_POST["nombre_ciclo"];
$familia_profesional = $_POST["familia_profesional"];
$tipo_ciclo = $_POST["tipo_ciclo"];
$horas_fct = $_POST["horas_fct"];


//Inserción en Base de Datos
$sentencia = $mysqli->prepare("INSERT INTO ciclos VALUES (?,?,?,?,?)");
$sentencia->bind_param("sssss", $clave_ciclo, $nombre_ciclo, $familia_profesional, $tipo_ciclo, $horas_fct);
$sentencia->execute();


$mysqli->close();

// header("Location: ciclo-listado.php");