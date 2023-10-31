<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver ciclo</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<header>
<!-- <button onclick="darkMode()">Dark Mode</button> -->
<nav><?php include 'menu.php' ?></nav>
</header>
<body>

    <?php
        $mysqli = include_once("conexion-bd.php");
        $clave_ciclo = $_GET["clave_ciclo"];
        $sentencia = $mysqli->prepare("SELECT * FROM ciclos WHERE clave_ciclo = ?");
        $sentencia->bind_param("s", $clave_ciclo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $ciclo = $resultado->fetch_assoc();
        if (!$ciclo) {
            exit("No hay resultados para esa Clave_ciclo");
        }
        $mysqli->close();
    ?>
<main>

    <article>
        <section>
            <table class="listado">
            <thead>
                <tr>
                    <td colspan=3>
                        <h2><?php echo $ciclo["nombre_ciclo"] ?></h2>
                    </td>
                </tr>     
            </thead>
            <tbody>
                <tr>
                    <th>Clave ciclo</th>
                    <th colspan=2>Familia profesional</th>
                </tr>
                <tr>
                    <td><?php echo $ciclo["clave_ciclo"] ?></td>
                    <td colspan=2><?php echo $ciclo["familia_profesional"] ?></td>
                </tr>
                <tr>
                    <th>Siglas</th>
                    <th>Tipo ciclo</th>
                    <th>Horas FCT</th>
                </tr>
                <tr>
                    <td><?php echo $ciclo["siglas_ciclo"] ?></td>
                    <td><?php echo $ciclo["tipo_ciclo"] ?></td>
                    <td><?php echo $ciclo["horas_fct"] ?></td>
                </tr>
                <tr>
                    <td colspan="3"><a class="btn-listado" href="ciclo-listado.php">Volver</a></td>
                </tr>
            </tbody>
            </table>
        </section>
    </article>
    </main>
</body>
</html>