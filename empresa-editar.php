<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empresa</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/formulario.css">
</head>
<body>

    <?php
        $mysqli = include_once("conexion-bd.php");
        $cif = $_GET["cif"];
        $sentencia = $mysqli->prepare("SELECT cif,nombre_empresa,calle,cod_postal,ciudad,provincia,telefono,email,responsable_nombre,responsable_dni,tutor,departamento,actividad_productiva FROM empresas WHERE cif = ?");
        $sentencia->bind_param("s", $cif);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $empresa = $resultado->fetch_assoc();
        if (!$empresa) {
            exit("No hay resultados para ese CIF");
        }
        $mysqli->close();
    ?>
<main>
    <h1>Editar Empresa</h1>

    <article>
        <section>
            <form class="formulario" action="empresa-editar-update.php" method="post">
                <label for="cif">CIF</label><input type="text" name="cif" id="cif" value="<?php echo $empresa['cif'] ?>">
                <label for="nombre_empresa">Nombre Empresa</label><input type="text" name="nombre_empresa" id="nombre_empresa" value="<?php echo $empresa['nombre_empresa'] ?>">
                <label for="calle">Dirección</label><input type="text" name="calle" id="calle" value="<?php echo $empresa['calle'] ?>">
                <label for="cod_postal">CP</label><input type="text" name="cod_postal" id="cod_postal" value="<?php echo $empresa['cod_postal'] ?>">
                <label for="ciudad">Ciudad</label><input type="text" name="ciudad" id="ciudad" value="<?php echo $empresa['ciudad'] ?>">
                <label for="provincia">Provincia</label><input type="text" name="provincia" id="provincia" value="<?php echo $empresa['provincia'] ?>">
                <label for="telefono">Teléfono</label><input type="text" name="telefono" id="telefono" value="<?php echo $empresa['telefono'] ?>">
                <label for="email">Email</label><input type="email" name="email" id="email" value="<?php echo $empresa['email'] ?>">
                <label for="responsable_nombre">Nombre responsable</label><input type="text" name="responsable_nombre" id="responsable_nombre" value="<?php echo $empresa['responsable_nombre'] ?>">
                <label for="responsable_dni">DNI responsable</label><input type="text" name="responsable_dni" id="responsable_dni" value="<?php echo $empresa['responsable_dni'] ?>">
                <label for="tutor">Tutor empresa</label><input type="text" name="tutor" id="tutor" value="<?php echo $empresa['tutor'] ?>">
                <label for="departamento">Departamento</label><input type="text" name="departamento" id="departamento" value="<?php echo $empresa['departamento'] ?>">
                <label for="actividad_productiva"></label>Actividad Productiva<input type="text" name="actividad_productiva" id="actividad_productiva" value="<?php echo $empresa['actividad_productiva'] ?>">
                <input type="submit" value="Enviar">
            </form>
        </section>
    </article>
    </main>
</body>
</html>