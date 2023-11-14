<?php
if (!isset($_GET["clave_ciclo"])) {
    exit("No hay clave_ciclo");
}
$mysqli = include_once "conexion-bd.php";
$clave_ciclo = $_GET["clave_ciclo"];
$sentencia = $mysqli->prepare("DELETE FROM ciclos WHERE clave_ciclo = ?");
$sentencia->bind_param("s", $clave_ciclo);
$sentencia->execute();

$mysqli->close();
header("Location: ciclo-listado.php");