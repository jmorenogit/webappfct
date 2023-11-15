<!DOCTYPE html>
<html lang="es" id="html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Profesores</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<header>
<!-- <button onclick="darkMode()">Dark Mode</button> -->
<nav><?php include 'menu.php' ?></nav>
</header>

<main>

    <article>
        <section>
            <table class="listado">
                <tr>
                    <td colspan="3"><h2>Listado de Profesores</h2></td>
                    <td></td>
                    <td colspan="3">
                        <a class="btn-listado" href="profesor-alta.php">Nuevo Profesor</a>
                    </td>
                </tr>
            </table>
        </section>
        <section>
            <table class="listado" id="myTable">
            <thead>
                <tr>
                    <td colspan="7">
                        <input type="search" size="50%" id="search" onkeyup="search()" placeholder="Buscar profesores.." title="Escribe un nombre">
                    </td>
                </tr>
                <tr>
                <th class="cif">DNI</th>
                <th><p align="center">Nombre <span class="sortable">&uarr;</span></p></th>
                <th>Apellidos</th>
                <th colspan=3>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $mysqli = include_once "conexion-bd.php";
                    $resultado = $mysqli->query("SELECT dni_profesor, nombre_profesor, apellidos_profesor FROM profesores");
                    $profesores = $resultado->fetch_all(MYSQLI_ASSOC);
                    foreach ($profesores as $profesor)
                    {
                ?>
                <tr>
                <td class="cif"><?php echo $profesor["dni_profesor"] ?></td>
                <td><?php echo $profesor["nombre_profesor"] ?></td>
                <td><?php echo $profesor["apellidos_profesor"] ?></td>
                <td><a class="btn-listado" href="profesor-ver.php?dni_profesor=<?php echo $profesor['dni_profesor'] ?>">Visualizar</a></td>
                <td><a class="btn-listado" href="profesor-editar.php?dni_profesor=<?php echo $profesor['dni_profesor'] ?>">Editar</a></td>
                <td><a class="btn-listado eliminar" href="profesor-eliminar.php?dni_profesor=<?php echo $profesor['dni_profesor'] ?>" onclick="return confirm('¿Eliminar registro?')">Eliminar</a></td>
                </tr>

                <?php }
                    $mysqli->close();
                ?>
            </tbody>
            </table>
        </section>    
    </article>
</main>
<script src="js/script.js"></script>  
</body>
</html>