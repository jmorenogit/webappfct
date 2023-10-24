<?php
if (!isset($_GET["dni_profesor"])) {
    exit("No hay DNI");
}
$mysqli = include_once "conexion-bd.php";
$dni = $_GET["dni_profesor"];
$sentencia = $mysqli->prepare("DELETE FROM profesores WHERE dni_profesor = ?");
$sentencia->bind_param("s", $dni);
$sentencia->execute();

$mysqli->close();
header("Location: profesor-listado.php");
