<?php

//Conexión a Base de Datos
$mysqli = include_once "conexion-bd.php";

//Recepción valores formulario
// $num_matricula = $_POST["num_matricula"];
$curso_academico = $_POST["curso_academico"];
$alumnos = $_POST["alumnos"];
$empresas = $_POST["empresas"];
$profesores = $_POST["profesores"];
$ciclos = $_POST["ciclos"];
$periodo = $_POST["periodo"];

//Inserción en Base de Datos
$sentencia = $mysqli->prepare("INSERT INTO matriculas (curso_academico,alumno,empresa,profesor,ciclo,periodo) VALUES (?,?,?,?,?,?)");
$sentencia->bind_param("ssssss", $curso_academico, $alumnos, $empresas, $profesores, $ciclos, $periodo);
$sentencia->execute();


$mysqli->close();

header("Location: matricula-listado.php");