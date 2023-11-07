<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Empresa</title>
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
        $sentencia = $mysqli->prepare("SELECT * FROM empresas WHERE cif = ?");
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
            <table class="listado">
            <thead>
                <tr>
                    <td colspan=2>
                        <h2><?php echo $empresa["nombre_empresa"] ?></h2>
                    </td>
                    <th>
                       CIF: <?php echo $empresa["cif"] ?>
                    </th>
                </tr>     
            </thead>
            <tbody>
                <tr>
                    <th>Dirección</th>
                    <th>CP</th>
                    <th>Ciudad</th>
                </tr>
                <tr>
                    <td><?php echo $empresa["calle"] ?></td>
                    <td><?php echo $empresa["cod_postal"] ?></td>
                    <td><?php echo $empresa["ciudad"] ?></td>
                </tr>
                <tr>
                    <th>Provincia</th>
                    <th>Teléfono</th>
                    <th>Email</th>                    
                </tr>
                <tr>
                    <td><?php echo $empresa["provincia"] ?></td>
                    <td><?php echo $empresa["telefono"] ?></td>
                    <td><?php echo $empresa["email"] ?></td>
                </tr>
                <tr>
                    <th>Responsable</th>
                    <th>Nº Convenio</th>
                    <th>Responsable DNI</th>   
                </tr>
                <tr>
                    <td><?php echo $empresa["responsable_nombre"] ?></td>
                    <td><?php echo $empresa["num_convenio"] ?></td>
                    <td><?php echo $empresa["responsable_dni"] ?></td>      
                </tr>
                <tr>
                    <th>Tutor</th>
                    <th>Departamento</th>
                    <th>Actividad_productiva</th>
                </tr>
                <tr>
                    <td><?php echo $empresa["tutor"] ?></td>
                    <td><?php echo $empresa["departamento"] ?></td>
                    <td><?php echo $empresa["actividad_productiva"] ?></td>
                </tr>
                <tr>
                    <td colspan="3"><a class="btn-listado" href="empresa-listado.php">Volver</a></td>
                </tr>
            </tbody>
            </table>
        </section>
    </article>
    </main>
</body>
</html>