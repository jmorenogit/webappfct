<!DOCTYPE html>
<html lang="es" id="html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Ciclos</title>
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
                    <td colspan="3"><h2>Listado de ciclos formativos</h2></td>
                    <td></td>
                    <td colspan="3">
                        <a class="btn-listado" href="ciclo-alta.php">Nuevo ciclo</a>
                    </td>
                </tr>
            </table>
        </section>
        <section>
            <table class="listado" id="myTable">
            <thead>
                <tr>
                    <td colspan="7">
                        <input type="search" size="50%" id="search" onkeyup="search()" placeholder="Buscar ciclos.." title="Escribe un nombre">
                    </td>
                </tr>
                <tr>
                <th class="cif">Clave ciclo</th>
                <th><p align="center">Nombre <span class="sortable">&uarr;</span></p></th>
                <th>Siglas</th>
                <th>Tipo</th>
                <th>Horas FCT</th>
                <th colspan=3>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $mysqli = include_once "conexion-bd.php";
                    $resultado = $mysqli->query("SELECT clave_ciclo, siglas_ciclo, nombre_ciclo, tipo_ciclo, horas_fct FROM ciclos");
                    $ciclos = $resultado->fetch_all(MYSQLI_ASSOC);
                    foreach ($ciclos as $ciclo)
                    {
                ?>
                <tr>
                <td class="cif"><?php echo $ciclo["clave_ciclo"] ?></td>
                <td><?php echo $ciclo["nombre_ciclo"] ?></td>
                <td><?php echo $ciclo["siglas_ciclo"] ?></td>
                <td><?php echo $ciclo["tipo_ciclo"] ?></td>
                <td><?php echo $ciclo["horas_fct"] ?></td>
                <td><a class="btn-listado" href="ciclo-ver.php?clave_ciclo=<?php echo $ciclo['clave_ciclo'] ?>">Visualizar</a></td>
                <td><a class="btn-listado" href="ciclo-editar.php?clave_ciclo=<?php echo $ciclo['clave_ciclo'] ?>">Editar</a></td>
                <td><a class="btn-listado" href="ciclo-eliminar.php?clave_ciclo=<?php echo $ciclo['clave_ciclo'] ?>" onclick="return confirm('¿Eliminar registro?')">Eliminar</a></td>
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