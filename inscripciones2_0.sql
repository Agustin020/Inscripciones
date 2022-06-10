-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2022 a las 19:29:05
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inscripciones2.0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aniocursado`
--

CREATE TABLE `aniocursado` (
  `id` int(11) NOT NULL,
  `anio` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aniocursado`
--

INSERT INTO `aniocursado` (`id`, `anio`, `descripcion`) VALUES
(1, '1er Año', 'Primer año'),
(2, '2do Año', 'Segundo año'),
(3, '3er Año', 'Tercer año');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `dniEstudiante2` int(11) NOT NULL,
  `codigoMateria2` int(11) NOT NULL,
  `califParcial` decimal(10,0) DEFAULT NULL,
  `califRecuperatorio` decimal(10,0) DEFAULT NULL,
  `calificacionParcial2` decimal(10,0) DEFAULT NULL,
  `califRecuperatorio2` decimal(10,0) DEFAULT NULL,
  `califGlobal` decimal(10,0) DEFAULT NULL,
  `califFinal` decimal(10,0) DEFAULT NULL,
  `fechaFinal` date DEFAULT NULL,
  `califFinal2` decimal(10,0) DEFAULT NULL,
  `fechaFinal2` date DEFAULT NULL,
  `califFinal3` decimal(10,0) DEFAULT NULL,
  `fechaFinal3` date DEFAULT NULL,
  `condicionFinal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`dniEstudiante2`, `codigoMateria2`, `califParcial`, `califRecuperatorio`, `calificacionParcial2`, `califRecuperatorio2`, `califGlobal`, `califFinal`, `fechaFinal`, `califFinal2`, `fechaFinal2`, `califFinal3`, `fechaFinal3`, `condicionFinal`) VALUES
(12345678, 1300, '8', NULL, '10', NULL, NULL, '9', '2022-05-11', NULL, NULL, NULL, NULL, 'Regular'),
(12345678, 1301, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12345678, 1302, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12345678, 1303, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12345678, 1304, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12345678, 1305, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12345678, 1306, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12345678, 1307, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12345678, 1308, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12345678, 1309, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12345678, 1310, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42900600, 2300, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42900600, 2301, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42900600, 2302, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42900600, 2303, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42900600, 2304, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42900600, 2305, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42900600, 2306, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42900600, 2307, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42900600, 2308, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42900600, 2309, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1102, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1201, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1202, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1203, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1204, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1205, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1206, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1207, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913100, 1208, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913695, 1300, '8', NULL, '10', NULL, NULL, '9', '2022-05-11', NULL, NULL, NULL, NULL, 'Regular'),
(42913695, 1301, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913695, 1302, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913695, 1303, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913695, 1304, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913695, 1305, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913695, 1306, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913695, 1307, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913695, 1308, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913695, 1309, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42913695, 1310, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87654321, 1100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87654321, 1101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87654321, 1102, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87654321, 1103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87654321, 1104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87654321, 1105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87654321, 1106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87654321, 1107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87654321, 1108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87654321, 1109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `resolucion` varchar(45) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`codigo`, `nombre`, `resolucion`, `duracion`) VALUES
(1000, 'Tecnicatura Superior en Desarrollo de Software', NULL, NULL),
(2000, 'Tecnicatura Superior en Computacion y Redes', NULL, NULL),
(3000, 'Tecnicatura Superior en Diseño Grafico', NULL, NULL),
(4000, 'Tecnicatura Superior en Diseño Multimedial', NULL, NULL),
(5000, 'Tecnicatura Superior en Fotografia Creativa y Diseño Fotografico', NULL, NULL),
(6000, 'Tecnicatura Superior en Indumentaria, Textil y Accesorios', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `codPostal` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`codPostal`, `nombre`) VALUES
(5500, 'Capital'),
(5501, 'Godoy Cruz'),
(5507, 'Luján de Cuyo'),
(5515, 'Maipú'),
(5519, 'Guaymallén'),
(5533, 'Lavalle'),
(5539, 'Las Heras'),
(5560, 'Tunuyán'),
(5561, 'Tupungato'),
(5569, 'San Carlos'),
(5570, 'San Martín'),
(5573, 'Junin'),
(5577, 'Rivadavia'),
(5590, 'La Paz'),
(5596, 'Santa Rosa'),
(5600, 'San Rafael'),
(5613, 'Malargue'),
(5620, 'Gral Alvear');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `dni` int(11) NOT NULL,
  `idInscripcion` int(11) DEFAULT NULL,
  `idAnioCursado3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`dni`, `idInscripcion`, `idAnioCursado3`) VALUES
(12345678, NULL, 3),
(42900600, NULL, 3),
(42913100, NULL, 2),
(42913695, NULL, 3),
(87654321, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `dni` int(11) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `lugarNac` varchar(75) DEFAULT NULL,
  `domicilio` varchar(150) DEFAULT NULL,
  `codPostal` int(11) DEFAULT NULL,
  `celular` bigint(20) DEFAULT NULL,
  `correo` varchar(75) DEFAULT NULL,
  `fechaInscripcion` date DEFAULT NULL,
  `materias` varchar(500) DEFAULT NULL,
  `codigoCarrera4` int(11) DEFAULT NULL,
  `codigoSede2` int(11) DEFAULT NULL,
  `idAnioCursado2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `dni`, `apellidos`, `nombres`, `fechaNac`, `lugarNac`, `domicilio`, `codPostal`, `celular`, `correo`, `fechaInscripcion`, `materias`, `codigoCarrera4`, `codigoSede2`, `idAnioCursado2`) VALUES
(23, 42913695, 'Videla', 'Agustin', '2000-09-24', 'Godoy Cruz', 'Beltrán Norte, Manzana \"A\", Casa 11', 5531, 2612634082, 'agustinvidela835@gmail.com', '2022-06-07', 'Programación II, Comunicaciones y redes, Matemática Discreta, Análisis Matemático, Inglés Técnico II, Modelado de Software, Bases de Datos I, Sistemas Operativos, Práctica Profesionalizante II, ', 1000, 4000, 2),
(25, 12345678, 'Airoldi', 'Fernando', '2000-09-24', 'Capital', 'Fray Luis Beltrán', 5531, 2612634090, 'alguien@gmail.com', '2022-06-07', 'jkadnwidniwoadpbwqiudbqwdbvam,swm,dalñjaowdihwo', 1000, 3000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL COMMENT 'Definir si una materia es con final o promocional',
  `duracion` varchar(45) DEFAULT NULL COMMENT 'Definir si una materia es anual o cuatrimestral',
  `idAnioCursado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`codigo`, `nombre`, `estado`, `duracion`, `idAnioCursado`) VALUES
(1100, 'Programación I', 'Regular', 'Anual', 1),
(1101, 'Arquitectura de Computadoras', NULL, NULL, 1),
(1102, 'Requerimientos de Software', NULL, NULL, 1),
(1103, 'Álgebra', NULL, NULL, 1),
(1104, 'Inglés Técnico I', NULL, NULL, 1),
(1105, 'Comprensión y Producción de Textos', NULL, NULL, 1),
(1106, 'Lógica Computacional', NULL, NULL, 1),
(1107, 'Problemática Sociocultural y del Trabajo', NULL, NULL, 1),
(1108, 'Sistemas Administrativos Aplicados', NULL, NULL, 1),
(1109, 'Práctica Profesionalizante I', NULL, NULL, 1),
(1200, 'Programación II', NULL, NULL, 2),
(1201, 'Comunicaciones y redes', NULL, NULL, 2),
(1202, 'Matemática Discreta', NULL, NULL, 2),
(1203, 'Análisis Matemático', NULL, NULL, 2),
(1204, 'Inglés Técnico II', NULL, NULL, 2),
(1205, 'Modelado de Software', NULL, NULL, 2),
(1206, 'Bases de Datos I', NULL, NULL, 2),
(1207, 'Sistemas Operativos', NULL, NULL, 2),
(1208, 'Práctica Profesionalizante II', NULL, NULL, 2),
(1300, 'Programación III\r\n', NULL, NULL, 3),
(1301, 'Arquitectura y Diseño de Interfaces', NULL, NULL, 3),
(1302, 'Auditoría y Calidad de Sistemas', NULL, NULL, 3),
(1303, 'Seguridad Informática', NULL, NULL, 3),
(1304, 'Inglés Técnico III', NULL, NULL, 3),
(1305, 'Bases de Datos II', NULL, NULL, 3),
(1306, 'Probabilidad y Estadística', NULL, NULL, 3),
(1307, 'Legislación Informática', NULL, NULL, 3),
(1308, 'Ética Profesional', NULL, NULL, 3),
(1309, 'Gestión de Proyectos de Software', NULL, NULL, 3),
(1310, 'Práctica Profesionalizante III', NULL, NULL, 3),
(2100, 'Inglés Técnico I', NULL, NULL, 1),
(2101, 'Matemática I', NULL, NULL, 1),
(2102, 'Tecnología de la Información', NULL, NULL, 1),
(2103, 'Sistemas Operativos I', NULL, NULL, 1),
(2104, 'Lógica Computacional', NULL, NULL, 1),
(2105, 'Comprensión y Producción de Textos', NULL, NULL, 1),
(2106, 'Fundamentos de Electrónica', NULL, NULL, 1),
(2107, 'Arquitectura de Computadoras', NULL, NULL, 1),
(2108, 'Problemática Sociocultural y del Contexto', NULL, NULL, 1),
(2109, 'Electrónica Aplicada', NULL, NULL, 1),
(2110, 'Práctica profesionalizante I', NULL, NULL, 1),
(2200, 'Inglés Técnico II', NULL, NULL, 2),
(2201, 'Matemática II', NULL, NULL, 2),
(2202, 'Sistemas Operativos II', NULL, NULL, 2),
(2203, 'Fundamentos de Programación', NULL, NULL, 2),
(2204, 'Ética Profesional', NULL, NULL, 2),
(2205, 'Soporte de Infraestructura I', NULL, NULL, 2),
(2206, 'Comunicaciones y Redes', NULL, NULL, 2),
(2207, 'Sistemas Administrativos Aplicados', NULL, NULL, 2),
(2208, 'Redes Aplicadas I', NULL, NULL, 2),
(2209, 'Práctica profesionalizante II', NULL, NULL, 2),
(2300, 'Estadística Aplicada', NULL, NULL, 3),
(2301, 'Soporte de Infraestructura II', NULL, NULL, 3),
(2302, 'Sistemas de Telefonía y Video Seguridad', NULL, NULL, 3),
(2303, 'Gestión de Bases de Datos', NULL, NULL, 3),
(2304, 'Legislación Informática', NULL, NULL, 3),
(2305, 'Seguridad en Redes', NULL, NULL, 3),
(2306, 'Programación de Scripts y Embebidos', NULL, NULL, 3),
(2307, 'Gestión de Emprendimientos', NULL, NULL, 3),
(2308, 'Redes Aplicadas II', NULL, NULL, 3),
(2309, 'Práctica profesionalizante III', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_carrera`
--

CREATE TABLE `materia_carrera` (
  `id` int(11) NOT NULL,
  `codigoMateria` int(11) DEFAULT NULL,
  `codigoCarrera2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia_carrera`
--

INSERT INTO `materia_carrera` (`id`, `codigoMateria`, `codigoCarrera2`) VALUES
(1, 1100, 1000),
(2, 1101, 1000),
(3, 1102, 1000),
(4, 1103, 1000),
(5, 1104, 1000),
(6, 1105, 1000),
(7, 1106, 1000),
(8, 1107, 1000),
(9, 1108, 1000),
(10, 1109, 1000),
(11, 1200, 1000),
(12, 1201, 1000),
(13, 1202, 1000),
(14, 1203, 1000),
(15, 1204, 1000),
(16, 1205, 1000),
(17, 1206, 1000),
(18, 1207, 1000),
(19, 1208, 1000),
(20, 1300, 1000),
(21, 1301, 1000),
(22, 1302, 1000),
(23, 1303, 1000),
(24, 1304, 1000),
(25, 1305, 1000),
(26, 1306, 1000),
(27, 1307, 1000),
(28, 1308, 1000),
(29, 1309, 1000),
(30, 1310, 1000),
(31, 2100, 2000),
(32, 2101, 2000),
(33, 2102, 2000),
(34, 2103, 2000),
(35, 2104, 2000),
(36, 2105, 2000),
(37, 2106, 2000),
(38, 2107, 2000),
(39, 2108, 2000),
(40, 2109, 2000),
(41, 2110, 2000),
(42, 2200, 2000),
(43, 2201, 2000),
(44, 2202, 2000),
(45, 2203, 2000),
(46, 2204, 2000),
(47, 2205, 2000),
(48, 2206, 2000),
(49, 2207, 2000),
(50, 2208, 2000),
(51, 2209, 2000),
(52, 2300, 2000),
(53, 2301, 2000),
(54, 2302, 2000),
(55, 2303, 2000),
(56, 2304, 2000),
(57, 2305, 2000),
(58, 2306, 2000),
(59, 2307, 2000),
(60, 2308, 2000),
(61, 2309, 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolusuario`
--

CREATE TABLE `rolusuario` (
  `id` int(11) NOT NULL,
  `nombreRol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rolusuario`
--

INSERT INTO `rolusuario` (`id`, `nombreRol`) VALUES
(1, 'Estudiante'),
(2, 'Preceptor/Encargado'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `domicilio` varchar(150) DEFAULT NULL,
  `codPostal3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`codigo`, `nombre`, `domicilio`, `codPostal3`) VALUES
(1000, 'Esc. Químicos Argentinos ', 'Rodríguez y Lamadrid', 5500),
(2000, 'Esc. Manuel Belgrano', 'Roque Sáenz Peña 1271', 5501),
(3000, 'Esc. Mario Casale', 'Dr. Moreno y Roca', 5539),
(4000, 'Esc. Isidro Maza', 'Ruta Provincial 50', 5515);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede_carrera`
--

CREATE TABLE `sede_carrera` (
  `id` int(11) NOT NULL,
  `codigoSede` int(11) DEFAULT NULL,
  `codigoCarrera3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede_carrera`
--

INSERT INTO `sede_carrera` (`id`, `codigoSede`, `codigoCarrera3`) VALUES
(1, 1000, 1000),
(2, 1000, 2000),
(3, 1000, 5000),
(4, 2000, 3000),
(5, 2000, 4000),
(6, 2000, 6000),
(7, 3000, 1000),
(8, 3000, 2000),
(9, 3000, 5000),
(10, 3000, 6000),
(11, 4000, 1000),
(12, 4000, 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `apellido` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `correo` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `usuario` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `contraseña` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `domicilio` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `codigoPostal` int(11) DEFAULT NULL,
  `lugarNac` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `celular` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `codPostal2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellido`, `correo`, `usuario`, `contraseña`, `domicilio`, `codigoPostal`, `lugarNac`, `fechaNac`, `celular`, `idRol`, `codPostal2`) VALUES
(3, 'Admin', 'Ad', NULL, 'admin', '1234', NULL, NULL, NULL, NULL, NULL, 3, NULL),
(12345678, 'Ejemplo', 'Ejemplo', 'alguien@gmail.com', 'ejemplo', '1234', 'Fray Luis Beltrán', 5531, 'Capital', '2000-09-24', '2612634091', 1, 5515),
(20444696, 'Leandro', 'Diaz', 'lean@gmail.com', 'lean45', '1234', 'Rodeo Del Medio', 5529, 'Capital', '1980-05-22', '2612634080', 2, 5515),
(38414378, 'Fernando', 'Airoldi', 'fernando@gmail.com', 'fer95', '1234', 'Fray Luis Beltran', 5531, 'Godoy Cruz', '1995-09-24', '2612634081', 2, 5515),
(42900600, 'Gonzalo', 'Lozano', 'gonzalozano@gmail.com', 'gonzalozano', '1234', 'Fray Luis Beltrán', 5531, 'Capital', '2000-04-24', '2612634090', 1, 5515),
(42913100, 'Ejemplo', 'Ejemplo', 'ejemplo@gmail.com', 'usuario', '1234', NULL, NULL, NULL, NULL, '2612634070', 1, NULL),
(42913695, 'Agustin', 'Videla', 'agustinvidela835@gmail.com', 'agustinvidela', '1234', 'Fray Luis Beltran', 5531, 'Godoy Cruz', '2000-09-24', '2612634082', 1, 5515),
(87654321, 'Nombre', 'Apellido', 'alguien@gmail.com', 'username', '1234', 'Fray Luis Beltrán', 5531, 'Godoy Cruz', '2000-09-24', '2612634070', 1, 5515);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_carrera`
--

CREATE TABLE `usuario_carrera` (
  `id` int(11) NOT NULL,
  `dniUsuario3` int(11) DEFAULT NULL,
  `codigoCarrera` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_carrera`
--

INSERT INTO `usuario_carrera` (`id`, `dniUsuario3`, `codigoCarrera`) VALUES
(5, 42913695, 1000),
(6, 42900600, 2000),
(7, 12345678, 1000),
(8, 87654321, 1000),
(11, 42913100, 1000),
(12, 3, 1000),
(13, 3, 2000),
(14, 3, 3000),
(15, 3, 4000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_sede`
--

CREATE TABLE `usuario_sede` (
  `id` int(11) NOT NULL,
  `dniUsuario4` int(11) DEFAULT NULL,
  `codigoSede3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_sede`
--

INSERT INTO `usuario_sede` (`id`, `dniUsuario4`, `codigoSede3`) VALUES
(4, 42913695, 4000),
(5, 38414378, 4000),
(6, 20444696, 3000),
(7, 42900600, 4000),
(8, 12345678, 3000),
(9, 87654321, 3000),
(12, 42913100, 4000),
(13, 3, 1000),
(14, 3, 2000),
(15, 3, 3000),
(16, 3, 4000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aniocursado`
--
ALTER TABLE `aniocursado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`dniEstudiante2`,`codigoMateria2`),
  ADD KEY `fk_codigoMateria2` (`codigoMateria2`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`codPostal`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `fk_anioCursado3` (`idAnioCursado3`),
  ADD KEY `fk_dniInscripcion` (`idInscripcion`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_codigoSede2_idx` (`codigoSede2`),
  ADD KEY `fk_idAnioCursado2_idx` (`idAnioCursado2`),
  ADD KEY `fk_codigoCarrera4_idx` (`codigoCarrera4`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_idAnioCursado_idx` (`idAnioCursado`);

--
-- Indices de la tabla `materia_carrera`
--
ALTER TABLE `materia_carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_codigoMateria_idx` (`codigoMateria`),
  ADD KEY `fk_codigoCarrera2_idx` (`codigoCarrera2`);

--
-- Indices de la tabla `rolusuario`
--
ALTER TABLE `rolusuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_codPostal3` (`codPostal3`);

--
-- Indices de la tabla `sede_carrera`
--
ALTER TABLE `sede_carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_codigoSede_idx` (`codigoSede`),
  ADD KEY `fk_codigoCarrera3_idx` (`codigoCarrera3`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `fk_idRol2_idx` (`idRol`),
  ADD KEY `fk_codPostal2` (`codPostal2`);

--
-- Indices de la tabla `usuario_carrera`
--
ALTER TABLE `usuario_carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dniUsuario_idx` (`dniUsuario3`),
  ADD KEY `fk_codigoCarrera_idx` (`codigoCarrera`);

--
-- Indices de la tabla `usuario_sede`
--
ALTER TABLE `usuario_sede`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_codigoSede3` (`codigoSede3`),
  ADD KEY `fk_dniUsuario4` (`dniUsuario4`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `materia_carrera`
--
ALTER TABLE `materia_carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `sede_carrera`
--
ALTER TABLE `sede_carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario_carrera`
--
ALTER TABLE `usuario_carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario_sede`
--
ALTER TABLE `usuario_sede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `fk_codigoMateria2` FOREIGN KEY (`codigoMateria2`) REFERENCES `materia` (`codigo`),
  ADD CONSTRAINT `fk_dniEstudiante2` FOREIGN KEY (`dniEstudiante2`) REFERENCES `estudiante` (`dni`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_anioCursado3` FOREIGN KEY (`idAnioCursado3`) REFERENCES `aniocursado` (`id`),
  ADD CONSTRAINT `fk_dniEstudiante` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`),
  ADD CONSTRAINT `fk_idInscripcion` FOREIGN KEY (`idInscripcion`) REFERENCES `inscripcion` (`id`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_codigoCarrera4` FOREIGN KEY (`codigoCarrera4`) REFERENCES `carrera` (`codigo`),
  ADD CONSTRAINT `fk_codigoSede2` FOREIGN KEY (`codigoSede2`) REFERENCES `sede` (`codigo`),
  ADD CONSTRAINT `fk_idAnioCursado2` FOREIGN KEY (`idAnioCursado2`) REFERENCES `aniocursado` (`id`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_idAnioCursado` FOREIGN KEY (`idAnioCursado`) REFERENCES `aniocursado` (`id`);

--
-- Filtros para la tabla `materia_carrera`
--
ALTER TABLE `materia_carrera`
  ADD CONSTRAINT `fk_codigoCarrera2` FOREIGN KEY (`codigoCarrera2`) REFERENCES `carrera` (`codigo`),
  ADD CONSTRAINT `fk_codigoMateria` FOREIGN KEY (`codigoMateria`) REFERENCES `materia` (`codigo`);

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `fk_codPostal3` FOREIGN KEY (`codPostal3`) REFERENCES `departamentos` (`codPostal`);

--
-- Filtros para la tabla `sede_carrera`
--
ALTER TABLE `sede_carrera`
  ADD CONSTRAINT `fk_codigoCarrera3` FOREIGN KEY (`codigoCarrera3`) REFERENCES `carrera` (`codigo`),
  ADD CONSTRAINT `fk_codigoSede` FOREIGN KEY (`codigoSede`) REFERENCES `sede` (`codigo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_codPostal2` FOREIGN KEY (`codPostal2`) REFERENCES `departamentos` (`codPostal`),
  ADD CONSTRAINT `fk_idRol` FOREIGN KEY (`idRol`) REFERENCES `rolusuario` (`id`);

--
-- Filtros para la tabla `usuario_carrera`
--
ALTER TABLE `usuario_carrera`
  ADD CONSTRAINT `fk_codigoCarrera` FOREIGN KEY (`codigoCarrera`) REFERENCES `carrera` (`codigo`),
  ADD CONSTRAINT `fk_dniUsuario3` FOREIGN KEY (`dniUsuario3`) REFERENCES `usuario` (`dni`);

--
-- Filtros para la tabla `usuario_sede`
--
ALTER TABLE `usuario_sede`
  ADD CONSTRAINT `fk_codigoSede3` FOREIGN KEY (`codigoSede3`) REFERENCES `sede` (`codigo`),
  ADD CONSTRAINT `fk_dniUsuario4` FOREIGN KEY (`dniUsuario4`) REFERENCES `usuario` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
