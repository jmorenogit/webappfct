<?php
    //Conexión a Base de Datos
$mysqli = include_once "conexion-bd.php";

//Recepción valores formulario
$cif = $_POST["cif"];
$nombre_empresa = $_POST["nombre_empresa"];
$calle = $_POST["calle"];
$cod_postal = $_POST["cod_postal"];
$ciudad = $_POST["ciudad"];
$provincia = $_POST["provincia"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$responsable_nombre = $_POST["responsable_nombre"];
$responsable_dni = $_POST["responsable_dni"];
$tutor = $_POST["tutor"];
$departamento = $_POST["departamento"];
$actividad_productiva = $_POST["actividad_productiva"];

//Actualización en Base de Datos
$sentencia = $mysqli->prepare("UPDATE empresas SET nombre_empresa=?, calle=?, cod_postal=?, ciudad=?, provincia=?, telefono=?, email=?, responsable_nombre=?, responsable_dni=?, tutor=?, departamento=?, actividad_productiva=? WHERE cif=?");
$sentencia->bind_param("sssssssssssss", $nombre_empresa, $calle, $cod_postal, $ciudad, $provincia, $telefono, $email, $responsable_nombre, $responsable_dni, $tutor, $departamento, $actividad_productiva, $cif);
$sentencia->execute();

$mysqli->close();

header("Location: empresa-listado.php");