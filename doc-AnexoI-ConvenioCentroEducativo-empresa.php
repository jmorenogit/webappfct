<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/anexo.css">
    <title>AnexoI</title>
</head>

<?php
        $mysqli = include_once("conexion-bd.php");
        $cif = $_GET["cif"];
        $sentencia = $mysqli->prepare("SELECT * FROM empresas E JOIN matriculas M ON E.cif = M.empresa JOIN alumnos A ON A.dni = M.alumno JOIN ciclos C ON C.clave_ciclo = M.ciclo JOIN profesores P ON P.dni_profesor = M.profesor WHERE empresa=?");
        $sentencia->bind_param("s", $cif);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $empresa = $resultado->fetch_assoc();
        if (!$empresa) {
            exit("No hay ninguna matrícula para esa empresa");
        }
    ?>

<body>

    <p class='pCentrado'>
        <button id='btnCrearPdf' class='btnCrearPdf'>PDF Anexo I</button>
    </p>
    
    <div class="contentToPdf">

        <p class="p2columnas">
            <span>
                <img class="cabeceraImg" alt="Junta de Extremadura" src="images/junta.jpg" title="Junta de Extremadura">
            </span>
            <span>
                <img class="cabeceraImg" alt="Unión Europea" src="images/ue.png" title="Unión Europea">
            </span> 
        </p>

        <p class="pCentrado">
            <span>
                DIRECCI&Oacute;N GENERAL DE FORMACI&Oacute;N PROFESIONAL, INNOVACI&Oacute;NE INCLUSI&Oacute;N EDUCATIVA
            </span>
        </p>
        <p class="p2columnas">
            <span><b>FORMACIÓN EN CENTROS DE TRABAJO <br> CONVENIO CENTRO EDUCATIVO-EMPRESA</b></span>
            <span><b>ANEXO I. RELACIÓN DE ALUMNOS <br> Hoja___/____</b></span>
        </p>
        <p class="pCentrado borde">
            <span>
                Relación de alumnos acogidos al CONVENIO específico número <?php echo $empresa['num_convenio'] ?>
                suscrito con fecha <?php echo date('d', strtotime($empresa['fecha_convenio']))?> de <?php echo date('m', strtotime($empresa['fecha_convenio']))?> de <?php echo date('Y', strtotime($empresa['fecha_convenio']))?> entre
                <br>
                el Centro educativo I.E.S. Suarez de Figueroa y la empresa <?php echo $empresa['nombre_empresa'] ?> localidad <?php echo $empresa['ciudad'] ?>
                que realizarán Formación en Centros de Trabajo (FCT)
                <br>
                durante el periodo abajo indicado.
            </span>
        </p>
        <p class="pCentrado">
            <span><b>CICLO FORMATIVO</b></span>
            <span>&nbsp;<?php echo $empresa['nombre_ciclo'] ?> <b>Clave</b> <?php echo $empresa['clave_ciclo'] ?>
            </span>
        </p>
        <p class="pCentrado">
            <span>
                <b>OTRAS ENSE&Ntilde;ANZAS</b>
            </span>
            <span>&nbsp;_____________________________________ </span>
            <span><b>Curso acad&eacute;mico</b></span>
            <span>&nbsp;<?php echo $empresa['curso_academico'] ?></span>
        </p>
        <div class="pCentrado">
            <table>
                <thead class="borde">
                    <tr>
                    <th class="borde">
                        APELLIDOS Y NOMBRE
                    </th>
                    <th class="borde">
                        D.N.I.
                    </th>
                    <th class="borde">
                        N&Uacute;MERO HORAS
                    </th>
                    <th class="borde">
                        PERIODO DE REALIZACI&Oacute;N
                    </th>
                </tr>
                </thead>
                

                <?php
                    $resultado2 = $mysqli->query("SELECT * FROM empresas E JOIN matriculas M ON E.cif = M.empresa JOIN alumnos A ON A.dni = M.alumno JOIN ciclos C ON C.clave_ciclo = M.ciclo JOIN profesores P ON P.dni_profesor = M.profesor WHERE empresa='$cif'");
                    $alumnos = $resultado2->fetch_all(MYSQLI_ASSOC);
                    foreach ($alumnos as $alumno)
                    {
                        
                    
                    ?>

                <tbody class="borde">
                    <tr>
                        <td class="borde">
                                <?php echo $alumno['apellidos'] .' '. $alumno['nombre'] ?>
                        </td>
                        <td class="borde">
                                <?php echo $alumno['dni'] ?>
                        </td>
                        <td class="borde">
                                <?php echo $alumno['horas_fct'] ?>
                        </td>
                        <td class="borde">
                            <?php 
                                if($alumno['periodo']==="ordinario"){
                                    echo "<span>Del 20 de marzo de ". substr($empresa["curso_academico"],0,4) ." al 20 de junio de " . substr($empresa["curso_academico"],0,2) . substr($empresa["curso_academico"],-2) ."</span>";
                                }else{
                                    echo "<span>Del 20 de septiembre de ". substr($empresa["curso_academico"],0,4) ." al 20 de diciembre de " . substr($empresa["curso_academico"],0,2) . substr($empresa["curso_academico"],-2) ."</span>";
                                }
                                ?>
                        </td>
                    </tr>
                <?php
                    }
                     $mysqli->close();
                    ?>
                </tbody>
            </table>
        </div>

    <p class="pCentrado">
        En cumplimiento de la Cl&aacute;usula Cuarta del CONVENIO&nbsp;espec&iacute;fico de colaboraci&oacute;n se &nbsp;procede a designar al Profesor/a- Tutor/a
        <br>
        del Centro educativo, que ser&aacute; D./D&ntilde;a. <?php echo $empresa['nombre_profesor']." ".$empresa['apellidos_profesor'] ?> y
        al responsable de la Empresa, que ser&aacute;
        &nbsp;D/D&ntilde;a. <?php echo $empresa['responsable_nombre']?>
        </span>
    </p>

    <br>
    <div class="pCentrado firma">
            <table>
                <tr>
                    <td class="borde">
                        <p>V&ordm; B&ordm;
                        <br>    
                        El/La Delegado/a Provincial
                        <br>
                        de Educaci&oacute;n</span></p>
                        <br><br><br>
                        <p class="c6"><span class="c2">Fdo.: __________________</span></p>
                        <p class="c6"><span class="c2">Fecha: ________________</span></p>
                    </td>
                    <td class="borde">
                        <p>Conforme
                        <br>
                        La Inspecci&oacute;n Educativa</p>
                        <br><br><br>
                        <p class="c6"><span class="c2">Fdo.: ___________________</span></p>
                        <p class="c6"><span class="c2">Fecha: ________________</span></p>
                    </td>
                    <td class="borde">
                        <p>En ____________ a _____ de ___________20___</p>
                        <p>El/La director/a
                                del&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;El/La
                                Representante</p>
                        <p>Centro
                                educativo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de
                                la Empresa
                        </p>
                        <br><br><br>
                        <p>Fdo.: _______________ Fdo.: ___________________</p>
                    </td>
                </tr>
            </table>
        </div>

    </div>

    <script src="js/html2pdf.bundle.min.js"></script>
    <script src="js/generar-pdf.js"></script>
</body>
</html>