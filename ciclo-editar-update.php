<?php
    //Conexión a Base de Datos
$mysqli = include_once "conexion-bd.php";

//Recepción valores formulario
$clave_ciclo = $_POST["clave_ciclo"];
$nombre_ciclo = $_POST["nombre_ciclo"];
$familia_profesional = $_POST["familia_profesional"];
$tipo_ciclo = $_POST["tipo_ciclo"];
$horas_fct = $_POST["horas_fct"];
$horas_fct = intval($horas_fct);
//Actualización en Base de Datos
$sentencia = $mysqli->prepare("UPDATE ciclos SET nombre_ciclo=?, familia_profesional=?, tipo_ciclo=?, horas_fct=?  WHERE clave_ciclo=?");
$sentencia->bind_param("sssis", $nombre_ciclo, $familia_profesional, $tipo_ciclo, $horas_fct, $clave_ciclo);
$sentencia->execute();

$mysqli->close();

header("Location: ciclo-listado.php");