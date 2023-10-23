<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Empresa</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<header>
<!-- <button onclick="darkMode()">Dark Mode</button> -->
<nav><?php include 'menu.php' ?></nav>
</header>
<body>

    <?php
        $mysqli = include_once("conexion-bd.php");
        $dni = $_GET["dni"];
        $sentencia = $mysqli->prepare("SELECT dni,num_expdte,nombre,apellidos,calle,cod_postal,ciudad,provincia,telefono,email FROM alumnos WHERE dni = ?");
        $sentencia->bind_param("s", $dni);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $alumno = $resultado->fetch_assoc();
        if (!$alumno) {
            exit("No hay resultados para ese DNI");
        }
        $mysqli->close();
    ?>
<main>

    <article>
        <section>
            <table class="listado">
            <thead>
                <tr>
                    <td>
                        <h2><?php echo $alumno["nombre"]." ".$alumno["apellidos"] ?></h2>
                    </td>
                    <th>
                       Num. Expediente: <?php echo $alumno["num_expdte"] ?>
                    </th>
                    <th>
                       DNI: <?php echo $alumno["dni"] ?>
                    </th>
                </tr>     
            </thead>
            <tbody>
                <tr>
                    <th>Dirección</th>
                    <th>CP</th>
                    <th>Ciudad</th>
                </tr>
                <tr>
                    <td><?php echo $alumno["calle"] ?></td>
                    <td><?php echo $alumno["cod_postal"] ?></td>
                    <td><?php echo $alumno["ciudad"] ?></td>
                </tr>
                <tr>
                    <th>Provincia</th>
                    <th>Teléfono</th>
                    <th>Email</th>                    
                </tr>
                <tr>
                    <td><?php echo $alumno["provincia"] ?></td>
                    <td><?php echo $alumno["telefono"] ?></td>
                    <td><?php echo $alumno["email"] ?></td>
                </tr>
                <tr>
                    <td colspan="3"><a class="btn-listado" href="alumno-listado.php">Volver</a></td>
                </tr>
            </tbody>
            </table>
        </section>
    </article>
    </main>
</body>
</html>