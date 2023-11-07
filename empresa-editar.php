<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empresa</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<header>
<!-- <button onclick="darkMode()">Dark Mode</button> -->
<nav><?php include 'menu.php' ?></nav>
</header>
<body>

    <?php
        $mysqli = include_once("conexion-bd.php");
        $cif = $_GET["cif"];
        $sentencia = $mysqli->prepare("SELECT cif,nombre_empresa,calle,cod_postal,ciudad,provincia,telefono,email,responsable_nombre,responsable_dni,tutor,departamento,actividad_productiva,num_convenio FROM empresas WHERE cif = ?");
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

    <article>
        <section>
            <form class="formulario" action="empresa-editar-update.php" method="post">
                <legend><h2>Editar Empresa</h2></legend>
                <label for="cif">CIF</label><input type="text" name="cif" id="cif" value="<?php echo $empresa['cif'] ?>" readonly>
                <label for="nombre_empresa">Nombre Empresa</label><input type="text" name="nombre_empresa" id="nombre_empresa" value="<?php echo $empresa['nombre_empresa'] ?>" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres">
                <label for="calle">Dirección</label><input type="text" name="calle" id="calle" value="<?php echo $empresa['calle'] ?> "pattern="{30}" title="Máximo 30 caracteres">
                <label for="cod_postal">CP</label><input type="text" name="cod_postal" id="cod_postal" value="<?php echo $empresa['cod_postal'] ?>" pattern="[0-9]{5}" title="Máximo 5 dígitos">
                <label for="ciudad">Ciudad</label><input type="text" name="ciudad" id="ciudad" value="<?php echo $empresa['ciudad'] ?>" pattern="[Aa-Za]{20}" title="Máximo 20 caracteres">
                <label for="provincia">Provincia</label><input type="text" name="provincia" id="provincia" value="<?php echo $empresa['provincia'] ?>" pattern="[Aa-Za]{20}" title="Máximo 20 caracteres">
                <label for="telefono">Teléfono</label><input type="text" name="telefono" id="telefono" value="<?php echo $empresa['telefono'] ?>" pattern="[0-9]{1,15}" title="Sólo dígitos con un máximo de 15" require>
                <label for="email">Email</label><input type="email" name="email" id="email" value="<?php echo $empresa['email'] ?>" require>
                <label for="responsable_nombre">Nombre responsable</label><input type="text" name="responsable_nombre" id="responsable_nombre" value="<?php echo $empresa['responsable_nombre'] ?>" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres">
                <label for="responsable_dni">DNI responsable</label><input type="text" name="responsable_dni" id="responsable_dni" value="<?php echo $empresa['responsable_dni'] ?>" pattern="(([0-9]{8}[ABCDEFGHJKLMNPQRSUVW]{1}))" title="8 dígitos y Letra mayúscula">
                <label for="tutor">Tutor empresa</label><input type="text" name="tutor" id="tutor" value="<?php echo $empresa['tutor'] ?>" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres">
                <label for="departamento">Departamento</label><input type="text" name="departamento" id="departamento" value="<?php echo $empresa['departamento'] ?>" pattern="[Aa-Za]{20}" title="Máximo 20 caracteres">
                <label for="actividad_productiva">Actividad Productiva</label><input type="text" name="actividad_productiva" id="actividad_productiva" value="<?php echo $empresa['actividad_productiva'] ?>" pattern="[Aa-Za]{20}" title="Máximo 20 caracteres">
                <label for="num_convenio">Número de convenio</label><input type="text" name="num_convenio" id="num_convenio" value="<?php echo $empresa['num_convenio'] ?>" pattern="[0-9]{1-8}" title="Máximo 8 dígitos">
                <input type="submit" value="Enviar">
            </form>
        </section>
    </article>
    </main>
</body>
</html>