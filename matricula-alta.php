<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta matrícula</title>
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
                <form class="formulario" action="matricula-alta-proc.php" method="post">
                    <legend><h2>Alta nueva matrícula</h2></legend>
                    <!-- <label for="num_matricula"><b>Número matrícula</b></label>
                    <input type="text" name="num_matricula" id="num_matricula" required> -->
                    <label for="curso_academico"><b>Curso Academico</b></label>
                    <?php $anioProx=date("y")+1 ;?>
                    <input type="text" name="curso_academico" id="curso_academico" value="<?php echo date("Y").'-'. $anioProx ?>" readonly>
                    <label for="alumnos"><b>Alumno</b></label>
                    <select name="alumnos" id="alumnos">
                        <?php 
                        $mysqli = include_once "conexion-bd.php";
                        $resultado = $mysqli->query("SELECT dni, nombre, apellidos FROM alumnos");
                        $alumnos = $resultado->fetch_all(MYSQLI_ASSOC);
                        foreach ($alumnos as $alumno)
                        {
                        ?>
                
                        <option value=<?php echo $alumno["dni"]?>>
                            <?php echo "DNI: ".$alumno["dni"]." - Nombre: ".$alumno["nombre"]." ".$alumno["apellidos"] ?>
                        </option>
                

                        <?php } ?>
                    </select>

                    <label for="empresas"><b>Empresa</b></label>
                    <select name="empresas" id="empresas">
                        <?php 
                        $resultado = $mysqli->query("SELECT cif, nombre_empresa, ciudad FROM empresas");
                        $empresas = $resultado->fetch_all(MYSQLI_ASSOC);
                        foreach ($empresas as $empresa)
                        {
                        ?>
                
                        <option value=<?php echo $empresa["cif"]?>>
                            <?php echo "CIF: ".$empresa["cif"]." - Empresa: ".$empresa["nombre_empresa"]." - Localidad: ".$empresa["ciudad"] ?>
                        </option>
                

                        <?php } ?>
                    </select>
                    
                    <label for="profesores"><b>Profesor</b></label>
                    <select name="profesores" id="profesores">
                        <?php 
                        $resultado = $mysqli->query("SELECT dni_profesor, nombre_profesor, apellidos_profesor FROM profesores");
                        $profesores = $resultado->fetch_all(MYSQLI_ASSOC);
                        foreach ($profesores as $profesor)
                        {
                        ?>
                
                        <option value=<?php echo $profesor["dni_profesor"]?>>
                            <?php echo "DNI: ".$profesor["dni_profesor"]." - Nombre: ".$profesor["nombre_profesor"]." Apellidos: ".$profesor["apellidos_profesor"] ?>
                        </option>
                

                        <?php } ?>
                    </select>

                    <label for="ciclos"><b>Ciclos</b></label>
                    <select name="ciclos" id="ciclos">
                        <?php 
                        $resultado = $mysqli->query("SELECT * FROM ciclos");
                        $ciclos = $resultado->fetch_all(MYSQLI_ASSOC);
                        foreach ($ciclos as $ciclo)
                        {
                        ?>
                
                        <option value=<?php echo $ciclo["clave_ciclo"]?>>
                            <?php echo "Clave ciclo: ".$ciclo["clave_ciclo"]." - Nombre: ".$ciclo["nombre_ciclo"] ?>
                        </option>
                

                        <?php } ?>
                    </select>
                        <?php 
                            $mysqli->close();
                        ?>
                    <label for="periodo"><b>Periodo</b></label>
                    <select name="periodo" id="periodo">
                        <option value="ordinario">Ordinario</option>
                        <option value="extraordinario">Extraordinario</option>
                    </select>
                    <input type="submit" value="Enviar">
                </form>
            </section>
        </article>
    </main>
</body>
</html>