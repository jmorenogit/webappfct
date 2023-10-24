<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Profesor</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<header>
<!-- <button onclick="darkMode()">Dark Mode</button> -->
<nav><?php include 'menu.php' ?></nav>
</header>
<body>

    <?php
        $mysqli = include_once("conexion-bd.php");
        $dni = $_GET["dni_profesor"];
        $sentencia = $mysqli->prepare("SELECT dni_profesor,nombre_profesor,apellidos_profesor FROM profesores WHERE dni_profesor = ?");
        $sentencia->bind_param("s", $dni);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $profesor = $resultado->fetch_assoc();
        if (!$profesor) {
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
                        <h2><?php echo $profesor["nombre_profesor"]." ".$profesor["apellidos_profesor"] ?></h2>
                    </td>
                    <th>
                       DNI: <?php echo $profesor["dni_profesor"] ?>
                    </th>
                </tr>     
            </thead>
            <tbody>
                <tr>
                    <td colspan="3"><a class="btn-listado" href="profesor-listado.php">Volver</a></td>
                </tr>
            </tbody>
            </table>
        </section>
    </article>
    </main>
</body>
</html>