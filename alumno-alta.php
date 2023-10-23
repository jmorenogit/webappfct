<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta alumno</title>
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
                <form class="formulario" action="alumno-alta-proc.php" method="post">
                    <legend><h2>Alta nueva empresa</h2></legend>
                    <input type="text" name="dni" id="dni" placeholder="DNI alumno" pattern="(([0-9]{8}[ABCDEFGHJKLMNPQRSUVW]{1}))" title="8 dígitos y Letra mayúscula" required>
                    <input type="text" name="num_expdte" id="num_expdte" placeholder="Num. expediente" pattern="[0-9]{1,15}" title="Sólo dígitos con un máximo de 15" required>
                    <input type="text" name="nombre_alumno" id="nombre_alumno" placeholder="Nombre alumno" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres" required>
                    <input type="text" name="apellidos_alumno" id="apellidos_alumno" placeholder="Apellidos alumno" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres" required>
                    <input type="text" name="calle" id="calle" placeholder="Dirección" pattern="{30}" title="Máximo 30 caracteres">
                    <input type="text" name="cod_postal" id="cod_postal" placeholder="CP" pattern="[0-9]{5}" title="Máximo 5 dígitos">
                    <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad" pattern="[Aa-Za]{20}" title="Máximo 20 caracteres" required>
                    <input type="text" name="provincia" id="provincia" placeholder="Provincia" pattern="[Aa-Za]{20}" title="Máximo 20 caracteres">
                    <input type="text" name="telefono" id="telefono" placeholder="Teléfono" pattern="[0-9]{1,15}" title="Sólo dígitos con un máximo de 15" required>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <input type="submit" value="Enviar">
                </form>
            </section>
        </article>
    </main>
</body>
</html>