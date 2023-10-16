<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Empresas</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<header>
    <h1>Listado de Empresas</h1>
</header>

<main>

    <article>

        <section>
            <form class="formulario" action="empresa-alta.html" method="POST">
                <input type="submit" value="Nueva empresa">
            </form>
        </section>

        <section>
            <table class="listado">
            <thead>
                <tr>
                <th>CIF</th>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th colspan=3>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $mysqli = include_once "conexion-bd.php";
                    $resultado = $mysqli->query("SELECT cif, nombre_empresa, ciudad, telefono, email FROM empresas");
                    $empresas = $resultado->fetch_all(MYSQLI_ASSOC);
                    foreach ($empresas as $empresa)
                    {
                ?>
                <tr>
                <td><?php echo $empresa["cif"] ?></td>
                <td><?php echo $empresa["nombre_empresa"] ?></td>
                <td><?php echo $empresa["ciudad"] ?></td>
                <td><?php echo $empresa["telefono"] ?></td>
                <td><?php echo $empresa["email"] ?></td>
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

    
</body>
</html>