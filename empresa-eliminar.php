<?php
if (!isset($_GET["cif"])) {
    exit("No hay CIF");
}
$mysqli = include_once "conexion-bd.php";
$cif = $_GET["cif"];
$sentencia = $mysqli->prepare("DELETE FROM empresas WHERE cif = ?");
$sentencia->bind_param("s", $cif);
$sentencia->execute();

$mysqli->close();
header("Location: empresa-listado.php");
