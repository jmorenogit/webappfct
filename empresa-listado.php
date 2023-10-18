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

</header>

<main>

    <article>
        <section>
            <table class="listado">
            <thead>
                <tr>
                    <td colspan=3><h2>Listado de Empresas</h2></td>
                    <td></td>
                    <td colspan=3>
                        <a class="btn-listado" href="empresa-alta.html">Nueva empresa</a>
                    </td>
                </tr>
                <tr>
                <th>CIF</th>
                <th>Nombre</th>
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