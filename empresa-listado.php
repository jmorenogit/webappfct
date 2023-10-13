<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Empresas</title>
</head>
<body>
<h1>Listado de Empresas</h1>

<form action="empresa-alta.html" method="POST">
    <input type="submit" class="btn btn-success" value="Nueva empresa">
</form>

<table class="table">
    <thead>
        <tr>
        <th>CIF</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Elaboración</th>
        <th>Editar</th>
        <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $mysqli = include_once "conexion-bd.php";
        $resultado = $mysqli->query("SELECT cif, nombre_empresa, telefono, email FROM empresas");
        $empresas = $resultado->fetch_all(MYSQLI_ASSOC);
        foreach ($empresas as $empresa)
        {
    ?>
            <tr>
            <td><?php echo $empresa["cif"] ?></td>
            <td><?php echo $empresa["nombre_empresa"] ?></td>
            <td><?php echo $empresa["telefono"] ?></td>
            <td><?php echo $empresa["email"] ?></td>
            <td><a class="btn btn-secondary" href="editar.php?id=<?php echo $empresa['cif'] ?>">Editar</a></td>
            <td><a class="btn btn-danger" href="eliminar.php?id=<?php echo $empresa['cif'] ?>">Eliminar</a></td>
            </tr>

    <?php }
        $mysqli->close();
    ?>
    </tbody>
    </table>
    
</body>
</html>