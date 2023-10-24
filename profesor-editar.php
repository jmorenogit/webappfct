<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
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
            <form class="formulario" action="profesor-editar-update.php" method="post">
                <legend><h2>Editar Profesor</h2></legend>
                <label for="dni_profesor">DNI</label><input type="text" name="dni_profesor" id="dni_profesor" value="<?php echo $profesor['dni_profesor'] ?>" readonly>
                <label for="nombre_profesor">Nombre profesor</label><input type="text" name="nombre_profesor" id="nombre_profesor" value="<?php echo $profesor['nombre_profesor'] ?>" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres">
                <label for="apellidos_profesor">Apellidos profesor</label><input type="text" name="apellidos_profesor" id="apellidos_profesor" value="<?php echo $profesor['apellidos_profesor'] ?>" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres">
                <input type="submit" value="Enviar">
            </form>
        </section>
    </article>
    </main>
</body>
</html>