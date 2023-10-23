<?php
    //Conexión a Base de Datos
$mysqli = include_once "conexion-bd.php";

//Recepción valores formulario
$dni = $_POST["dni"];
$num_expdte = $_POST["num_expdte"];
$nombre_alumno = $_POST["nombre_alumno"];
$apellidos_alumno = $_POST["apellidos_alumno"];
$calle = $_POST["calle"];
$cod_postal = $_POST["cod_postal"];
$ciudad = $_POST["ciudad"];
$provincia = $_POST["provincia"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];

//Actualización en Base de Datos
$sentencia = $mysqli->prepare("UPDATE alumnos SET nombre=?, apellidos=?, calle=?, cod_postal=?, ciudad=?, provincia=?, telefono=?, email=? WHERE dni=?");
$sentencia->bind_param("sssssssss", $nombre_alumno, $apellidos_alumno, $calle, $cod_postal, $ciudad, $provincia, $telefono, $email, $dni);
$sentencia->execute();

$mysqli->close();

header("Location: alumno-listado.php");