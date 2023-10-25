<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Ciclo</title>
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
                <form class="formulario" action="ciclo-alta-proc.php" method="post">
                    <legend><h2>Alta nuevo ciclo formativo</h2></legend>
                    <input type="text" name="clave_ciclo" id="clave_ciclo" placeholder="Clave ciclo" required>
                    <input type="text" name="nombre_ciclo" id="nombre_ciclo" placeholder="Nombre ciclo" pattern="[Aa-Za]{50}" title="Máximo 50 caracteres" required>
                    <input type="text" name="familia_profesional" id="familia_profesional" placeholder="Familia profesional" pattern="[Aa-Za]{30}" title="Máximo 30 caracteres" required>
                    <input type="text" name="tipo_ciclo" id="tipo_ciclo" placeholder="Tipo de ciclo" pattern="{30}" title="Máximo 30 caracteres" required>
                    <input type="text" name="horas_fct" id="horas_fct" placeholder="Horas FCT" pattern="[0-9]{1-4}" title="Máximo 4 dígitos" required>
                    <input type="submit" value="Enviar">
                </form>
            </section>
        </article>
    </main>
</body>
</html>