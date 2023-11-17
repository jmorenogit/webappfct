<!DOCTYPE html>
<html lang="es" id="html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Alumnos</title>
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
                    <td colspan="3"><h2>Listado de Alumnos</h2></td>
                    <td colspan="3">
                        <a class="btn-listado" href="alumno-alta.php">Nuevo alumno</a>
                    </td>
                </tr>
            </table>
        </section>
        <section>
            <table class="listado" id="myTable">
            <thead>
                <tr>
                    <td colspan="7">
                        <input type="search" size="50%" id="search" onkeyup="search()" placeholder="Buscar alumnos.." title="Escribe un nombre">
                    </td>
                </tr>
                <tr>
                <th class="cif">DNI</th>
                <th><p>Nombre <span class="sortable">&uarr;</span></p></th>
                <th>Apellidos</th>
                <th>Localidad</th>
                <th>Teléfono</th>
                <th colspan=3>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $mysqli = include_once "conexion-bd.php";
                    $resultado = $mysqli->query("SELECT dni, nombre, apellidos, ciudad, telefono FROM alumnos");
                    $alumnos = $resultado->fetch_all(MYSQLI_ASSOC);
                    foreach ($alumnos as $alumno)
                    {
                ?>
                <tr>
                <td class="cif"><?php echo $alumno["dni"] ?></td>
                <td><?php echo $alumno["nombre"] ?></td>
                <td><?php echo $alumno["apellidos"] ?></td>
                <td><?php echo $alumno["ciudad"] ?></td>
                <td><?php echo $alumno["telefono"] ?></td>
                <td><a class="btn-listado" href="alumno-ver.php?dni=<?php echo $alumno['dni'] ?>">Visualizar</a></td>
                <td><a class="btn-listado" href="alumno-editar.php?dni=<?php echo $alumno['dni'] ?>">Editar</a></td>
                <td><a class="btn-listado" href="alumno-eliminar.php?dni=<?php echo $alumno['dni'] ?>" onclick="return confirm('¿Eliminar registro?')">Eliminar</a></td>
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