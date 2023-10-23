<!DOCTYPE html>
<html lang="es" id="html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Empresas</title>
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
                    <td colspan="3"><h2>Listado de Empresas</h2></td>
                    <td></td>
                    <td colspan="3">
                        <a class="btn-listado" href="empresa-alta.php">Nueva empresa</a>
                    </td>
                </tr>
            </table>
        </section>
        <section>
            <table class="listado" id="myTable">
            <thead>
                <tr>
                    <td colspan="7">
                        <input type="search" size="50%" id="search" onkeyup="search()" placeholder="Buscar empresas.." title="Escribe un nombre">
                    </td>
                </tr>
                <tr>
                <th class="cif">CIF</th>
                <th><p align="center">Nombre <span class="sortable">&uarr;</span></p></th>
                <th>Localidad</th>
                <th>Teléfono</th>
                <th colspan=3>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $mysqli = include_once "conexion-bd.php";
                    $resultado = $mysqli->query("SELECT cif, nombre_empresa, ciudad, telefono FROM empresas");
                    $empresas = $resultado->fetch_all(MYSQLI_ASSOC);
                    foreach ($empresas as $empresa)
                    {
                ?>
                <tr>
                <td class="cif"><?php echo $empresa["cif"] ?></td>
                <td><?php echo $empresa["nombre_empresa"] ?></td>
                <td><?php echo $empresa["ciudad"] ?></td>
                <td><?php echo $empresa["telefono"] ?></td>
                <td><a class="btn-listado" href="empresa-ver.php?cif=<?php echo $empresa['cif'] ?>">Visualizar</a></td>
                <td><a class="btn-listado" href="empresa-editar.php?cif=<?php echo $empresa['cif'] ?>">Editar</a></td>
                <td><a class="btn-listado" href="empresa-eliminar.php?cif=<?php echo $empresa['cif'] ?>">Eliminar</a></td>
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