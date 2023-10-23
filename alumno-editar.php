<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
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
            <form class="formulario" action="alumno-editar-update.php" method="post">
                <legend><h2>Editar Alumno</h2></legend>
                <label for="dni">DNI</label><input type="text" name="dni" id="dni" value="<?php echo $alumno['dni'] ?>" readonly>
                <label for="num_expdte">Num Expediente</label><input type="text" name="num_expdte" id="num_expdte" value="<?php echo $alumno['num_expdte'] ?>" pattern="[0-9]{1,15}" title="Sólo dígitos con un máximo de 15" require>
                <label for="nombre_alumno">Nombre alumno</label><input type="text" name="nombre_alumno" id="nombre_alumno" value="<?php echo $alumno['nombre'] ?>" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres">
                <label for="apellido_alumno">Apellido alumno</label><input type="text" name="apellido_alumno" id="apellido_alumno" value="<?php echo $alumno['apellidos'] ?>" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres">
                <label for="calle">Dirección</label><input type="text" name="calle" id="calle" value="<?php echo $alumno['calle'] ?> "pattern="{30}" title="Máximo 30 caracteres">
                <label for="cod_postal">CP</label><input type="text" name="cod_postal" id="cod_postal" value="<?php echo $alumno['cod_postal'] ?>" pattern="[0-9]{5}" title="Máximo 5 dígitos">
                <label for="ciudad">Ciudad</label><input type="text" name="ciudad" id="ciudad" value="<?php echo $alumno['ciudad'] ?>" pattern="[Aa-Za]{20}" title="Máximo 20 caracteres">
                <label for="provincia">Provincia</label><input type="text" name="provincia" id="provincia" value="<?php echo $alumno['provincia'] ?>" pattern="[Aa-Za]{20}" title="Máximo 20 caracteres">
                <label for="telefono">Teléfono</label><input type="text" name="telefono" id="telefono" value="<?php echo $alumno['telefono'] ?>" pattern="[0-9]{1,15}" title="Sólo dígitos con un máximo de 15" require>
                <label for="email">Email</label><input type="email" name="email" id="email" value="<?php echo $alumno['email'] ?>" require>
                <input type="submit" value="Enviar">
            </form>
        </section>
    </article>
    </main>
</body>
</html>