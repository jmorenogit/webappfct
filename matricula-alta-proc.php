<?php

//Conexión a Base de Datos
$mysqli = include_once "conexion-bd.php";

//Recepción valores formulario
$num_matricula = $_POST["num_matricula"];
$fecha = $_POST["fecha"];
$alumnos = $_POST["alumnos"];
$empresas = $_POST["empresas"];
$profesores = $_POST["profesores"];
$ciclos = $_POST["ciclos"];

//Inserción en Base de Datos
$sentencia = $mysqli->prepare("INSERT INTO matriculas VALUES (?,?,?,?,?,?)");
$sentencia->bind_param("ssssss", $num_matricula, $fecha, $alumnos, $empresas, $profesores, $ciclos);
$sentencia->execute();


$mysqli->close();

header("Location: matricula-listado.php");