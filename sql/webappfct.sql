-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-11-2023 a las 10:45:36
-- Versión del servidor: 8.0.31
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webappfct`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `dni` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num_expdte` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `calle` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ciudad` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_postal` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `provincia` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`dni`, `num_expdte`, `nombre`, `apellidos`, `calle`, `ciudad`, `cod_postal`, `provincia`, `telefono`, `email`) VALUES
('12436578D', '32432', 'Felipe', 'Garcia', 'dsfsdf', 'dsfdsf', '12324', 'asdsada', '32432432', 'asdas@fef.es'),
('32423344F', '312423', 'Juan', 'Rodríguez López', 'dsfds   ', 'Zafra', '23432', 'dsfsd', '3324342', 'asdf@sdf.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

DROP TABLE IF EXISTS `centros`;
CREATE TABLE IF NOT EXISTS `centros` (
  `cif_centro` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_centro` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `calle_centro` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_postal_centro` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ciudad_centro` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `provincia_centro` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono_centro` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fax_centro` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_centro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `director_nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `director_dni` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_centro` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cif_centro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `centros`
--

INSERT INTO `centros` (`cif_centro`, `nombre_centro`, `calle_centro`, `cod_postal_centro`, `ciudad_centro`, `provincia_centro`, `telefono_centro`, `fax_centro`, `email_centro`, `director_nombre`, `director_dni`, `codigo_centro`) VALUES
('S0600123D', 'I.E.S. SUÁREZ DE FIGUEROA', 'Avda. Fuente del Maestre, S/N', '06300', 'ZAFRA', 'BADAJOZ', '924029924', '924029927', 'ies.suarezdefigueroa@educarex.es', 'Cristina Ovejero Alonso', '11222333X', '06005111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclos`
--

DROP TABLE IF EXISTS `ciclos`;
CREATE TABLE IF NOT EXISTS `ciclos` (
  `clave_ciclo` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `siglas_ciclo` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_ciclo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `familia_profesional` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_ciclo` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `horas_fct` int NOT NULL,
  PRIMARY KEY (`clave_ciclo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciclos`
--

INSERT INTO `ciclos` (`clave_ciclo`, `siglas_ciclo`, `nombre_ciclo`, `familia_profesional`, `tipo_ciclo`, `horas_fct`) VALUES
('IFC3-1', 'ASIR', 'Administración de Sistemas Informáticos en Red', 'INFORMÁTICA Y COMUNICACIONES', 'Superior   ', 400),
('IFC154-3', 'DAW', 'Desarrollo de aplicaciones con tecnologías Web', 'INFORMÁTICA Y COMUNICACIONES', 'Superior', 400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `cif` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_empresa` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `calle` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_postal` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ciudad` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `provincia` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `responsable_nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `responsable_dni` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tutor` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `departamento` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `actividad_productiva` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num_convenio` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_convenio` date NOT NULL,
  PRIMARY KEY (`cif`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`cif`, `nombre_empresa`, `calle`, `cod_postal`, `ciudad`, `provincia`, `telefono`, `email`, `responsable_nombre`, `responsable_dni`, `tutor`, `departamento`, `actividad_productiva`, `num_convenio`, `fecha_convenio`) VALUES
('123456789', 'Google', 'calle update, 23         ', '12345', 'Menlo Park', 'California', '123456789', 'prueba@correo.com', 'Pepito Pérez Rodríguez', '12345678D', 'asdsadas', 'Desarrollo de buscad', 'I+D', '1111', '2023-11-09'),
('987654321', 'DHL', 'sdasd   ', '32333', 'Bonn', 'asdsad', '333333', 'asdsa@sad.com', 'Lorenzo Pérez Robles', '34435678S', 'asdasd', 'asdasd', 'asdasd', '2222', '2023-11-04'),
('454354354', 'Endesa', 'sdstr     ', '22334', 'Madrid', '312312', '12312321', 'sdash@dfdf.com', 'Lucía Lumens', '88888888S', 'sadqw', 'Soporte Informático', 'qweqw', '3333', '2023-10-17'),
('A23223432', 'Citroen', 'assa       ', '12345', 'Vigo', 'Pontevedra', '324323223', 'sdsad@dede.com', 'dgsdfds', '78656765S', 'dgsegseg', 'sdgsdgsd', 'dsgsdgsdds', '4444', '2023-09-26'),
('S98979557', 'Dell', 'c/ innovación 5  ', '22334', 'Villarta', 'Badajoz', '334455667', 'dell@dell.com', 'Jacinto Robles', '33445566G', 'Jacinto Robles', 'Helpdesk', 'Tecnología', '3344', '2023-11-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
CREATE TABLE IF NOT EXISTS `matriculas` (
  `num_matricula` int NOT NULL AUTO_INCREMENT,
  `curso_academico` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alumno` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `empresa` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profesor` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ciclo` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `periodo` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`num_matricula`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`num_matricula`, `curso_academico`, `alumno`, `empresa`, `profesor`, `ciclo`, `periodo`) VALUES
(1, '2023-24', '12436578D', '987654321', '98325465X', 'IFC3-1', 'ordinario'),
(2, '2023-24', '32423344F', '454354354', '44445555L', 'IFC3-1', 'ordinario'),
(3, '2023-24', '12436578D', '123456789', '44445555L', 'IFC154-3', 'ordinario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE IF NOT EXISTS `profesores` (
  `dni_profesor` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_profesor` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos_profesor` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`dni_profesor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`dni_profesor`, `nombre_profesor`, `apellidos_profesor`) VALUES
('98325465X', 'Gustavo', 'Lozano Merino'),
('44445555L', 'Luis', 'Pachanga');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
