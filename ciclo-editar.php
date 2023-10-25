<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ciclo</title>
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
            exit("No hay resultados para la Clave de Ciclo");
        }
        $mysqli->close();
    ?>
<main>

    <article>
        <section>
            <form class="formulario" action="ciclo-editar-update.php" method="post">
                <legend><h2>Editar ciclo</h2></legend>
                <label for="clave_ciclo">Clave ciclo</label><input type="text" name="clave_ciclo" id="clave_ciclo" value="<?php echo $ciclo['clave_ciclo'] ?>" readonly>
                <label for="nombre_ciclo">Nombre ciclo</label><input type="text" name="nombre_ciclo" id="nombre_ciclo" value="<?php echo $ciclo['nombre_ciclo'] ?>" pattern="[Aa-Za]{50}" title="Máximo 50 caracteres">
                <label for="familia_profesional">Familia profesional</label><input type="text" name="familia_profesional" id="familia_profesional" value="<?php echo $ciclo['familia_profesional'] ?>" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres">
                <label for="tipo_ciclo">Tipo ciclo</label><input type="text" name="tipo_ciclo" id="tipo_ciclo" value="<?php echo $ciclo['tipo_ciclo'] ?> "pattern="{30}" title="Máximo 30 caracteres">
                <label for="horas_fct">Horas FCT</label><input type="text" name="horas_fct" id="horas_fct" value="<?php echo $ciclo['horas_fct'] ?>" pattern="[0-9]{1-4}" title="Máximo 4 dígitos">
                <input type="submit" value="Enviar">
            </form>
        </section>
    </article>
    </main>
</body>
</html>