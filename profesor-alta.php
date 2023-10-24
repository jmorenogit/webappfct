<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta profesor</title>
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
                <form class="formulario" action="profesor-alta-proc.php" method="post">
                    <legend><h2>Alta nuevo profesor</h2></legend>
                    <input type="text" name="dni_profesor" id="dni_profesor" placeholder="DNI profesor" pattern="(([0-9]{8}[A-Z]{1}))" title="8 dígitos y Letra mayúscula" required>
                    <input type="text" name="nombre_profesor" id="nombre_profesor" placeholder="Nombre profesor" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres" required>
                    <input type="text" name="apellidos_profesor" id="apellidos_profesor" placeholder="Apellidos profesor" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres" required>
                    <input type="submit" value="Enviar">
                </form>
            </section>
        </article>
    </main>
</body>
</html>