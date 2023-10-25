<?php
if (!isset($_GET["num_matricula"])) {
    exit("No hay num_matricula");
}
$mysqli = include_once "conexion-bd.php";
$num_matricula = $_GET["num_matricula"];
$sentencia = $mysqli->prepare("DELETE FROM matriculas WHERE num_matricula = ?");
$sentencia->bind_param("s", $num_matricula);
$sentencia->execute();

$mysqli->close();
header("Location: matricula-listado.php");
