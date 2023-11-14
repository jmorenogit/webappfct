<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta empresa</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<header>
<!-- <button onclick="darkMode()">Dark Mode</button> -->
<nav><?php include 'menu.php' ?></nav>
</header>
<body>
    <main>

        <article>
            <section>
                <form class="formulario" action="empresa-alta-proc.php" method="post">
                    <legend><h2>Alta nueva empresa</h2></legend>
                    <input type="text" name="cif" id="cif" placeholder="CIF" pattern="([ABCDEFGHJKLMNPQRSUVW]{1})([0-9]{8})" title="Letra mayúscula y 8 dígitos" required>
                    <input type="text" name="nombre_empresa" id="nombre_empresa" placeholder="Nombre Empresa" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres" required>
                    <input type="text" name="calle" id="calle" placeholder="Dirección" pattern="{30}" title="Máximo 30 caracteres">
                    <input type="text" name="cod_postal" id="cod_postal" placeholder="CP" pattern="[0-9]{5}" title="Máximo 5 dígitos">
                    <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad" pattern="[Aa-Za]{20}" title="Máximo 20 caracteres">
                    <input type="text" name="provincia" id="provincia" placeholder="Provincia" pattern="[Aa-Za]{20}" title="Máximo 20 caracteres">
                    <input type="text" name="telefono" id="telefono" placeholder="Teléfono" pattern="[0-9]{1,15}" title="Sólo dígitos con un máximo de 15" required>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <input type="text" name="responsable_nombre" id="responsable_nombre" placeholder="Nombre responsable" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres">
                    <input type="text" name="responsable_dni" id="responsable_dni" placeholder="DNI responsable" pattern="(([0-9]{8}[ABCDEFGHJKLMNPQRSUVW]{1}))" title="8 dígitos y Letra mayúscula">
                    <input type="text" name="tutor" id="tutor" placeholder="Tutor empresa" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres">
                    <input type="text" name="departamento" id="departamento" placeholder="Departamento" pattern="[Aa-Za]{20}" title="Máximo 20 caracteres">
                    <input type="text" name="actividad_productiva" id="actividad_productiva" placeholder="Actividad Productiva" pattern="[Aa-Za]{20}" title="Máximo 20 caracteres">
                    <input type="text" name="num_convenio" id="num_convenio" placeholder="Número de convenio" pattern="[0-9]{1-8}" title="Máximo 8 dígitos">
                    <input type="date" name="fecha_convenio" id="fecha_convenio" placeholder="Fecha de convenio">
                    <input type="submit" value="Enviar">
                </form>
            </section>
        </article>
    </main>
</body>
</html>