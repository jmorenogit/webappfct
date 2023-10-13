<?php
$host = "localhost";
$usuario = "root";
$contrasenia = "";
$baseDatos = "webappfct";
$mysqli = new mysqli($host, $usuario, $contrasenia, $baseDatos);

// connect_errno devuelve el error, connect_error la descripción del error
if ($mysqli->connect_errno){
    echo "Fallo la conexión a MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
}

return $mysqli;