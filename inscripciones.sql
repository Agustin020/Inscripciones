/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 8.0.27 : Database - inscripciones2.0
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inscripciones2.0` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `inscripciones2.0`;

/*Table structure for table `aniocursado` */

DROP TABLE IF EXISTS `aniocursado`;

CREATE TABLE `aniocursado` (
  `id` int NOT NULL,
  `anio` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `descripcion` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

/*Data for the table `aniocursado` */

insert  into `aniocursado`(`id`,`anio`,`descripcion`) values 
(1,'1er Año','Primer año'),
(2,'2do Año','Segundo año'),
(3,'3er Año','Tercer año');

/*Table structure for table `calificaciones` */

DROP TABLE IF EXISTS `calificaciones`;

CREATE TABLE `calificaciones` (
  `dniEstudiante2` int NOT NULL,
  `codigoMateria2` int NOT NULL,
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
  `condicionFinal` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`dniEstudiante2`,`codigoMateria2`),
  KEY `fk_codigoMateria2` (`codigoMateria2`),
  CONSTRAINT `fk_codigoMateria2` FOREIGN KEY (`codigoMateria2`) REFERENCES `materia` (`codigo`),
  CONSTRAINT `fk_dniEstudiante2` FOREIGN KEY (`dniEstudiante2`) REFERENCES `estudiante` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

/*Data for the table `calificaciones` */

insert  into `calificaciones`(`dniEstudiante2`,`codigoMateria2`,`califParcial`,`califRecuperatorio`,`calificacionParcial2`,`califRecuperatorio2`,`califGlobal`,`califFinal`,`fechaFinal`,`califFinal2`,`fechaFinal2`,`califFinal3`,`fechaFinal3`,`condicionFinal`) values 
(42913695,1300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42913695,1301,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42913695,1302,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42913695,1303,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42913695,1304,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42913695,1305,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42913695,1306,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42913695,1307,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42913695,1308,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42913695,1309,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42913695,1310,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `carrera` */

DROP TABLE IF EXISTS `carrera`;

CREATE TABLE `carrera` (
  `codigo` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `resolucion` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `duracion` int DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

/*Data for the table `carrera` */

insert  into `carrera`(`codigo`,`nombre`,`resolucion`,`duracion`) values 
(1000,'Tecnicatura Superior en Desarrollo de Software',NULL,NULL),
(2000,'Tecnicatura Superior en Computacion y Redes',NULL,NULL),
(3000,'Tecnicatura Superior en Diseño Grafico',NULL,NULL),
(4000,'Tecnicatura Superior en Diseño Multimedial',NULL,NULL),
(5000,'Tecnicatura Superior en Fotografia Creativa y Diseño Fotografico',NULL,NULL),
(6000,'Tecnicatura Superior en Indumentaria, Textil y Accesorios',NULL,NULL);

/*Table structure for table `estudiante` */

DROP TABLE IF EXISTS `estudiante`;

CREATE TABLE `estudiante` (
  `dni` int NOT NULL,
  `dniInscripcion` int DEFAULT NULL,
  `idAnioCursado3` int DEFAULT NULL,
  PRIMARY KEY (`dni`),
  KEY `fk_dniInscripcion` (`dniInscripcion`),
  KEY `fk_anioCursado3` (`idAnioCursado3`),
  CONSTRAINT `fk_anioCursado3` FOREIGN KEY (`idAnioCursado3`) REFERENCES `aniocursado` (`id`),
  CONSTRAINT `fk_dniEstudiante` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`),
  CONSTRAINT `fk_dniInscripcion` FOREIGN KEY (`dniInscripcion`) REFERENCES `inscripcion` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `estudiante` */

insert  into `estudiante`(`dni`,`dniInscripcion`,`idAnioCursado3`) values 
(42913695,NULL,3);

/*Table structure for table `inscripcion` */

DROP TABLE IF EXISTS `inscripcion`;

CREATE TABLE `inscripcion` (
  `dni` int NOT NULL,
  `apellido/s` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nombre/s` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `lugarNac` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `domicilio` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `codPostal` int DEFAULT NULL,
  `celular` bigint DEFAULT NULL,
  `correo` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fechaInscripcion` date DEFAULT NULL,
  `materias` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `codigoCarrera4` int DEFAULT NULL,
  `codigoSede2` int DEFAULT NULL,
  `idAnioCursado2` int DEFAULT NULL,
  PRIMARY KEY (`dni`),
  KEY `fk_codigoSede2_idx` (`codigoSede2`),
  KEY `fk_idAnioCursado2_idx` (`idAnioCursado2`),
  KEY `fk_codigoCarrera4_idx` (`codigoCarrera4`),
  CONSTRAINT `fk_codigoCarrera4` FOREIGN KEY (`codigoCarrera4`) REFERENCES `carrera` (`codigo`),
  CONSTRAINT `fk_codigoSede2` FOREIGN KEY (`codigoSede2`) REFERENCES `sede` (`codigo`),
  CONSTRAINT `fk_idAnioCursado2` FOREIGN KEY (`idAnioCursado2`) REFERENCES `aniocursado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

/*Data for the table `inscripcion` */

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `codigo` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `estado` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Definir si una materia es con final o promocional',
  `duracion` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Definir si una materia es anual o cuatrimestral',
  `idAnioCursado` int DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_idAnioCursado_idx` (`idAnioCursado`),
  CONSTRAINT `fk_idAnioCursado` FOREIGN KEY (`idAnioCursado`) REFERENCES `aniocursado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

/*Data for the table `materia` */

insert  into `materia`(`codigo`,`nombre`,`estado`,`duracion`,`idAnioCursado`) values 
(1100,'Programación I','Regular','Anual',1),
(1101,'Arquitectura de Computadoras',NULL,NULL,1),
(1102,'Requerimientos de Software',NULL,NULL,1),
(1103,'Álgebra',NULL,NULL,1),
(1104,'Inglés Técnico I',NULL,NULL,1),
(1105,'Comprensión y Producción de Textos',NULL,NULL,1),
(1106,'Lógica Computacional',NULL,NULL,1),
(1107,'Problemática Sociocultural y del Trabajo',NULL,NULL,1),
(1108,'Sistemas Administrativos Aplicados',NULL,NULL,1),
(1109,'Práctica Profesionalizante I',NULL,NULL,1),
(1200,'Programación II',NULL,NULL,2),
(1201,'Comunicaciones y redes',NULL,NULL,2),
(1202,'Matemática Discreta',NULL,NULL,2),
(1203,'Análisis Matemático',NULL,NULL,2),
(1204,'Inglés Técnico II',NULL,NULL,2),
(1205,'Modelado de Software',NULL,NULL,2),
(1206,'Bases de Datos I',NULL,NULL,2),
(1207,'Sistemas Operativos',NULL,NULL,2),
(1208,'Práctica Profesionalizante II',NULL,NULL,2),
(1300,'Programación III\r\n',NULL,NULL,3),
(1301,'Arquitectura y Diseño de Interfaces',NULL,NULL,3),
(1302,'Auditoría y Calidad de Sistemas',NULL,NULL,3),
(1303,'Seguridad Informática',NULL,NULL,3),
(1304,'Inglés Técnico III',NULL,NULL,3),
(1305,'Bases de Datos II',NULL,NULL,3),
(1306,'Probabilidad y Estadística',NULL,NULL,3),
(1307,'Legislación Informática',NULL,NULL,3),
(1308,'Ética Profesional',NULL,NULL,3),
(1309,'Gestión de Proyectos de Software',NULL,NULL,3),
(1310,'Práctica Profesionalizante III',NULL,NULL,3),
(2100,'Inglés Técnico I',NULL,NULL,1),
(2101,'Matemática I',NULL,NULL,1),
(2102,'Tecnología de la Información',NULL,NULL,1),
(2103,'Sistemas Operativos I',NULL,NULL,1),
(2104,'Lógica Computacional',NULL,NULL,1),
(2105,'Comprensión y Producción de Textos',NULL,NULL,1),
(2106,'Fundamentos de Electrónica',NULL,NULL,1),
(2107,'Arquitectura de Computadoras',NULL,NULL,1),
(2108,'Problemática Sociocultural y del Contexto',NULL,NULL,1),
(2109,'Electrónica Aplicada',NULL,NULL,1),
(2110,'Práctica profesionalizante I',NULL,NULL,1),
(2200,'Inglés Técnico II',NULL,NULL,2),
(2201,'Matemática II',NULL,NULL,2),
(2202,'Sistemas Operativos II',NULL,NULL,2),
(2203,'Fundamentos de Programación',NULL,NULL,2),
(2204,'Ética Profesional',NULL,NULL,2),
(2205,'Soporte de Infraestructura I',NULL,NULL,2),
(2206,'Comunicaciones y Redes',NULL,NULL,2),
(2207,'Sistemas Administrativos Aplicados',NULL,NULL,2),
(2208,'Redes Aplicadas I',NULL,NULL,2),
(2209,'Práctica profesionalizante II',NULL,NULL,2),
(2300,'Estadística Aplicada',NULL,NULL,3),
(2301,'Soporte de Infraestructura II',NULL,NULL,3),
(2302,'Sistemas de Telefonía y Video Seguridad',NULL,NULL,3),
(2303,'Gestión de Bases de Datos',NULL,NULL,3),
(2304,'Legislación Informática',NULL,NULL,3),
(2305,'Seguridad en Redes',NULL,NULL,3),
(2306,'Programación de Scripts y Embebidos',NULL,NULL,3),
(2307,'Gestión de Emprendimientos',NULL,NULL,3),
(2308,'Redes Aplicadas II',NULL,NULL,3),
(2309,'Práctica profesionalizante III',NULL,NULL,3);

/*Table structure for table `materia_carrera` */

DROP TABLE IF EXISTS `materia_carrera`;

CREATE TABLE `materia_carrera` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigoMateria` int DEFAULT NULL,
  `codigoCarrera2` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_codigoMateria_idx` (`codigoMateria`),
  KEY `fk_codigoCarrera2_idx` (`codigoCarrera2`),
  CONSTRAINT `fk_codigoCarrera2` FOREIGN KEY (`codigoCarrera2`) REFERENCES `carrera` (`codigo`),
  CONSTRAINT `fk_codigoMateria` FOREIGN KEY (`codigoMateria`) REFERENCES `materia` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

/*Data for the table `materia_carrera` */

insert  into `materia_carrera`(`id`,`codigoMateria`,`codigoCarrera2`) values 
(1,1100,1000),
(2,1101,1000),
(3,1102,1000),
(4,1103,1000),
(5,1104,1000),
(6,1105,1000),
(7,1106,1000),
(8,1107,1000),
(9,1108,1000),
(10,1109,1000),
(11,1200,1000),
(12,1201,1000),
(13,1202,1000),
(14,1203,1000),
(15,1204,1000),
(16,1205,1000),
(17,1206,1000),
(18,1207,1000),
(19,1208,1000),
(20,1300,1000),
(21,1301,1000),
(22,1302,1000),
(23,1303,1000),
(24,1304,1000),
(25,1305,1000),
(26,1306,1000),
(27,1307,1000),
(28,1308,1000),
(29,1309,1000),
(30,1310,1000),
(31,2100,2000),
(32,2101,2000),
(33,2102,2000),
(34,2103,2000),
(35,2104,2000),
(36,2105,2000),
(37,2106,2000),
(38,2107,2000),
(39,2108,2000),
(40,2109,2000),
(41,2110,2000),
(42,2200,2000),
(43,2201,2000),
(44,2202,2000),
(45,2203,2000),
(46,2204,2000),
(47,2205,2000),
(48,2206,2000),
(49,2207,2000),
(50,2208,2000),
(51,2209,2000),
(52,2300,2000),
(53,2301,2000),
(54,2302,2000),
(55,2303,2000),
(56,2304,2000),
(57,2305,2000),
(58,2306,2000),
(59,2307,2000),
(60,2308,2000),
(61,2309,2000);

/*Table structure for table `rolusuario` */

DROP TABLE IF EXISTS `rolusuario`;

CREATE TABLE `rolusuario` (
  `id` int NOT NULL,
  `nombreRol` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

/*Data for the table `rolusuario` */

insert  into `rolusuario`(`id`,`nombreRol`) values 
(1,'Estudiante'),
(2,'Preceptor/Encargado'),
(3,'Admin');

/*Table structure for table `sede` */

DROP TABLE IF EXISTS `sede`;

CREATE TABLE `sede` (
  `codigo` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `domicilio` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

/*Data for the table `sede` */

insert  into `sede`(`codigo`,`nombre`,`domicilio`) values 
(1000,'Esc. Químicos Argentinos ','Rodríguez y Lamadrid'),
(2000,'Esc. Manuel Belgrano','Roque Sáenz Peña 1271'),
(3000,'Esc. Mario Casale','Dr. Moreno y Roca'),
(4000,'Esc. Isidro Maza','Ruta Provincial 50');

/*Table structure for table `sede_carrera` */

DROP TABLE IF EXISTS `sede_carrera`;

CREATE TABLE `sede_carrera` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigoSede` int DEFAULT NULL,
  `codigoCarrera3` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_codigoSede_idx` (`codigoSede`),
  KEY `fk_codigoCarrera3_idx` (`codigoCarrera3`),
  CONSTRAINT `fk_codigoCarrera3` FOREIGN KEY (`codigoCarrera3`) REFERENCES `carrera` (`codigo`),
  CONSTRAINT `fk_codigoSede` FOREIGN KEY (`codigoSede`) REFERENCES `sede` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

/*Data for the table `sede_carrera` */

insert  into `sede_carrera`(`id`,`codigoSede`,`codigoCarrera3`) values 
(1,1000,1000),
(2,1000,2000),
(3,1000,5000),
(4,2000,3000),
(5,2000,4000),
(6,2000,6000),
(7,3000,1000),
(8,3000,2000),
(9,3000,5000),
(10,3000,6000),
(11,4000,1000),
(12,4000,2000);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `dni` int NOT NULL,
  `nombre` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `apellido` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `correo` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `usuario` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `contraseña` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `domicilio` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `codigoPostal` int DEFAULT NULL,
  `lugarNac` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `celular` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `idRol` int DEFAULT NULL,
  PRIMARY KEY (`dni`),
  KEY `fk_idRol2_idx` (`idRol`),
  CONSTRAINT `fk_idRol` FOREIGN KEY (`idRol`) REFERENCES `rolusuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`dni`,`nombre`,`apellido`,`correo`,`usuario`,`contraseña`,`domicilio`,`codigoPostal`,`lugarNac`,`fechaNac`,`celular`,`idRol`) values 
(20444696,'Leandro','Diaz','lean@gmail.com','lean45','1234','Rodeo Del Medio',5529,'Capital','1980-05-22','2612634080',2),
(38414378,'Fernando','Airoldi','fernando@gmail.com','fer95','1234','Fray Luis Beltran',5531,'Godoy Cruz','1995-09-24','2612634081',2),
(42913695,'Agustin','Videla','agustinvidela835@gmail.com','agustinvidela','1234','Fray Luis Beltran',5531,'Godoy Cruz','2000-09-24','2612634082',1);

/*Table structure for table `usuario_carrera` */

DROP TABLE IF EXISTS `usuario_carrera`;

CREATE TABLE `usuario_carrera` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dniUsuario3` int DEFAULT NULL,
  `codigoCarrera` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dniUsuario_idx` (`dniUsuario3`),
  KEY `fk_codigoCarrera_idx` (`codigoCarrera`),
  CONSTRAINT `fk_codigoCarrera` FOREIGN KEY (`codigoCarrera`) REFERENCES `carrera` (`codigo`),
  CONSTRAINT `fk_dniUsuario3` FOREIGN KEY (`dniUsuario3`) REFERENCES `usuario` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

/*Data for the table `usuario_carrera` */

insert  into `usuario_carrera`(`id`,`dniUsuario3`,`codigoCarrera`) values 
(5,42913695,1000);

/*Table structure for table `usuario_sede` */

DROP TABLE IF EXISTS `usuario_sede`;

CREATE TABLE `usuario_sede` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dniUsuario4` int DEFAULT NULL,
  `codigoSede3` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_codigoSede3` (`codigoSede3`),
  KEY `fk_dniUsuario4` (`dniUsuario4`),
  CONSTRAINT `fk_codigoSede3` FOREIGN KEY (`codigoSede3`) REFERENCES `sede` (`codigo`),
  CONSTRAINT `fk_dniUsuario4` FOREIGN KEY (`dniUsuario4`) REFERENCES `usuario` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuario_sede` */

insert  into `usuario_sede`(`id`,`dniUsuario4`,`codigoSede3`) values 
(4,42913695,4000),
(5,38414378,4000),
(6,20444696,3000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
