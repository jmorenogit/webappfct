<!DOCTYPE html>
<html lang="es" id="html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Matrículas</title>
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
                    <td colspan="3"><h2>Listado de Matrículas</h2></td>
                    <td></td>
                    <td colspan="3">
                        <a class="btn-listado" href="matricula-alta.php">Nueva Matrícula</a>
                    </td>
                </tr>
            </table>
        </section>
        <section>
            <table class="listado" id="myTable">
            <thead>
                <tr>
                    <td colspan="7">
                        <input type="search" size="50%" id="search" onkeyup="search()" placeholder="Buscar alumno.." title="Escribe un nombre">
                    </td>
                </tr>
                <tr>
                <th class="cif">Número matrícula</th>
                <th><p align="center">Alumno<span class="sortable">&uarr;</span></p></th>
                <th>Curso académico<span class="sortable">&uarr;</span></th>   
                <th>Empresa</th>
                <th>Ciclo</th>
                <th colspan=3>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $mysqli = include_once "conexion-bd.php";
                    $resultado = $mysqli->query("SELECT * FROM alumnos A JOIN matriculas M ON A.dni = M.alumno JOIN empresas E ON E.cif = M.empresa JOIN ciclos C ON C.clave_ciclo = M.ciclo");
                    $matriculas = $resultado->fetch_all(MYSQLI_ASSOC);
                    foreach ($matriculas as $matricula)
                    {
                ?>
                <tr>
                <td class="cif"><?php echo $matricula["num_matricula"] ?></td>
                <td><?php echo $matricula["nombre"]." ".$matricula["apellidos"] ?></td>
                <td><?php echo $matricula["curso_academico"] ?></td>
                <td><?php echo $matricula["nombre_empresa"] ?></td>
                <td><?php echo $matricula["siglas_ciclo"] ?></td>
                <td><a class="btn-listado" href="matricula-ver.php?num_matricula=<?php echo $matricula['num_matricula'] ?>">Visualizar</a></td>
                <td><a class="btn-listado" href="matricula-eliminar.php?num_matricula=<?php echo $matricula['num_matricula'] ?>">Eliminar</a></td>
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