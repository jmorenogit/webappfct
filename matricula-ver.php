<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Matrícula</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<header>
<!-- <button onclick="darkMode()">Dark Mode</button> -->
<nav><?php include 'menu.php' ?></nav>
</header>
<body>

    <?php
        $mysqli = include_once("conexion-bd.php");
        $num_matricula = $_GET["num_matricula"];
        $sentencia = $mysqli->prepare("SELECT * FROM alumnos A JOIN matriculas M ON A.dni = M.alumno JOIN empresas E ON E.cif = M.empresa JOIN ciclos C ON C.clave_ciclo = M.ciclo JOIN profesores P ON P.dni_profesor = M.profesor WHERE num_matricula=?");
        $sentencia->bind_param("s", $num_matricula);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $matricula = $resultado->fetch_assoc();
        if (!$matricula) {
            exit("No hay resultados para ese num_matricula");
        }
        $mysqli->close();
    ?>
<main>

    <article>
        <section>
            <table class="listado">
            <thead>
                <tr>
                    <td colspan=2>
                        <h2><?php echo $matricula["nombre"]." ".$matricula["apellidos"] ?></h2>
                    </td>
                    <th>
                       Número matrícula: <?php echo $matricula["num_matricula"] ?>
                    </th>
                </tr>     
            </thead>
            <tbody>
                <tr>
                    <th>Curso Académico</th>
                    <th>Empresa</th>
                    <th>Ciclo</th>
                </tr>
                <tr>
                    <td><?php echo $matricula["curso_academico"] ?></td>
                    <td><?php echo $matricula["nombre_empresa"] ?></td>
                    <td><?php echo $matricula["nombre_ciclo"] ?></td>
                </tr>
                <tr>
                    <th colspan=2>Profesor</th>
                    <th>Período</th>
                </tr>
                <tr>
                    <td colspan=2><?php echo $matricula["nombre_profesor"]." ".$matricula["apellidos_profesor"]?></td>
                    <td><?php echo $matricula["periodo"]?></td>
                </tr>
                <tr>
                    <td colspan=3><a class="btn-listado" href="matricula-listado.php">Volver</a></td>
                </tr>
            </tbody>
            </table>
        </section>
    </article>
    </main>

</body>
</html>