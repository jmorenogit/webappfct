<?php
if (!isset($_GET["dni"])) {
    exit("No hay DNI");
}
$mysqli = include_once "conexion-bd.php";
$dni = $_GET["dni"];
$sentencia = $mysqli->prepare("DELETE FROM alumnos WHERE dni = ?");
$sentencia->bind_param("s", $dni);
$sentencia->execute();

$mysqli->close();
header("Location: alumno-listado.php");
