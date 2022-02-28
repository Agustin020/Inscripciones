/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.22-MariaDB : Database - inscripciones2.0
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inscripciones2.0` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `inscripciones2.0`;

/*Table structure for table `aniocursado` */

DROP TABLE IF EXISTS `aniocursado`;

CREATE TABLE `aniocursado` (
  `id` int(11) NOT NULL,
  `anio` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `descripcion` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

/*Data for the table `aniocursado` */

insert  into `aniocursado`(`id`,`anio`,`descripcion`) values 
(1,'1er Año','Primer año'),
(2,'2do Año','Segundo año'),
(3,'3er Año','Tercer año');

/*Table structure for table `calificaciones` */

DROP TABLE IF EXISTS `calificaciones`;

CREATE TABLE `calificaciones` (
  `dni` int(11) NOT NULL,
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
  `condicionFinal` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `dniUsuario2` int(11) DEFAULT NULL,
  `codigoMateria2` int(11) DEFAULT NULL,
  PRIMARY KEY (`dni`),
  KEY `fk_codigoMateria2_idx` (`codigoMateria2`),
  KEY `fk_dniUsuario2_idx` (`dniUsuario2`),
  CONSTRAINT `fk_codigoMateria2` FOREIGN KEY (`codigoMateria2`) REFERENCES `materia` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_dniUsuario2` FOREIGN KEY (`dniUsuario2`) REFERENCES `estudiante` (`dniUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

/*Data for the table `calificaciones` */

/*Table structure for table `carrera` */

DROP TABLE IF EXISTS `carrera`;

CREATE TABLE `carrera` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `resolucion` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

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
  `dniUsuario` int(11) NOT NULL,
  `dniInscripcion` int(11) DEFAULT NULL,
  `idAnioCursado3` int(11) DEFAULT NULL,
  PRIMARY KEY (`dniUsuario`),
  KEY `fk_estudiante_usuario1_idx` (`dniUsuario`),
  KEY `fk_dniInscripcion_idx` (`dniInscripcion`),
  KEY `fk_idAnioCursado3` (`idAnioCursado3`),
  CONSTRAINT `fk_dniInscripcion` FOREIGN KEY (`dniInscripcion`) REFERENCES `inscripcion` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_dniUsuario` FOREIGN KEY (`dniUsuario`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idAnioCursado3` FOREIGN KEY (`idAnioCursado3`) REFERENCES `aniocursado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `estudiante` */

insert  into `estudiante`(`dniUsuario`,`dniInscripcion`,`idAnioCursado3`) values 
(41322743,NULL,1),
(42913695,NULL,1);

/*Table structure for table `inscripcion` */

DROP TABLE IF EXISTS `inscripcion`;

CREATE TABLE `inscripcion` (
  `dni` int(11) NOT NULL,
  `apellido/s` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `nombre/s` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `lugarNac` varchar(75) COLLATE utf8_czech_ci DEFAULT NULL,
  `domicilio` varchar(150) COLLATE utf8_czech_ci DEFAULT NULL,
  `codPostal` int(11) DEFAULT NULL,
  `celular` bigint(20) DEFAULT NULL,
  `correo` varchar(75) COLLATE utf8_czech_ci DEFAULT NULL,
  `fechaInscripcion` date DEFAULT NULL,
  `materias` varchar(400) COLLATE utf8_czech_ci DEFAULT NULL,
  `codigoCarrera4` int(11) DEFAULT NULL,
  `codigoSede2` int(11) DEFAULT NULL,
  `idAnioCursado2` int(11) DEFAULT NULL,
  PRIMARY KEY (`dni`),
  KEY `fk_codigoSede2_idx` (`codigoSede2`),
  KEY `fk_idAnioCursado2_idx` (`idAnioCursado2`),
  KEY `fk_codigoCarrera4_idx` (`codigoCarrera4`),
  CONSTRAINT `fk_codigoCarrera4` FOREIGN KEY (`codigoCarrera4`) REFERENCES `carrera` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_codigoSede2` FOREIGN KEY (`codigoSede2`) REFERENCES `sede` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idAnioCursado2` FOREIGN KEY (`idAnioCursado2`) REFERENCES `aniocursado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

/*Data for the table `inscripcion` */

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `estado` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Definir si una materia es con final o promocional',
  `duracion` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Definir si una materia es anual o cuatrimestral',
  `idAnioCursado` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_idAnioCursado_idx` (`idAnioCursado`),
  CONSTRAINT `fk_idAnioCursado` FOREIGN KEY (`idAnioCursado`) REFERENCES `aniocursado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

/*Data for the table `materia` */

/*Table structure for table `materia_carrera` */

DROP TABLE IF EXISTS `materia_carrera`;

CREATE TABLE `materia_carrera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigoMateria` int(11) DEFAULT NULL,
  `codigoCarrera2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_codigoMateria_idx` (`codigoMateria`),
  KEY `fk_codigoCarrera2_idx` (`codigoCarrera2`),
  CONSTRAINT `fk_codigoCarrera2` FOREIGN KEY (`codigoCarrera2`) REFERENCES `carrera` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_codigoMateria` FOREIGN KEY (`codigoMateria`) REFERENCES `materia` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

/*Data for the table `materia_carrera` */

/*Table structure for table `rolusuario` */

DROP TABLE IF EXISTS `rolusuario`;

CREATE TABLE `rolusuario` (
  `id` int(11) NOT NULL,
  `nombreRol` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

/*Data for the table `rolusuario` */

insert  into `rolusuario`(`id`,`nombreRol`) values 
(1,'Estudiante'),
(2,'Preceptor/Encargado'),
(3,'Admin');

/*Table structure for table `sede` */

DROP TABLE IF EXISTS `sede`;

CREATE TABLE `sede` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `domicilio` varchar(150) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

/*Data for the table `sede` */

insert  into `sede`(`codigo`,`nombre`,`domicilio`) values 
(1000,'Esc. Químicos Argentinos ','Rodríguez y Lamadrid'),
(2000,'Esc. Manuel Belgrano','Roque Sáenz Peña 1271'),
(3000,'Esc. Mario Casale','Dr. Moreno y Roca'),
(4000,'Esc. Isidro Maza','Ruta Provincial 50');

/*Table structure for table `sede_carrera` */

DROP TABLE IF EXISTS `sede_carrera`;

CREATE TABLE `sede_carrera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigoSede` int(11) DEFAULT NULL,
  `codigoCarrera3` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_codigoSede_idx` (`codigoSede`),
  KEY `fk_codigoCarrera3_idx` (`codigoCarrera3`),
  CONSTRAINT `fk_codigoCarrera3` FOREIGN KEY (`codigoCarrera3`) REFERENCES `carrera` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_codigoSede` FOREIGN KEY (`codigoSede`) REFERENCES `sede` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

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
  `dni` int(11) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_czech_ci DEFAULT NULL,
  `apellido` varchar(70) COLLATE utf8_czech_ci DEFAULT NULL,
  `correo` varchar(70) COLLATE utf8_czech_ci DEFAULT NULL,
  `usuario` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `contraseña` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `domicilio` varchar(200) COLLATE utf8_czech_ci DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  PRIMARY KEY (`dni`),
  KEY `fk_idRol2_idx` (`idRol`),
  CONSTRAINT `fk_idRol` FOREIGN KEY (`idRol`) REFERENCES `rolusuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`dni`,`nombre`,`apellido`,`correo`,`usuario`,`contraseña`,`domicilio`,`fechaNac`,`celular`,`idRol`) values 
(40999201,'Elias','Lopez','eliasl@gmail.com','eliasss','1234','Santa Blanca','1998-01-22','2612008180',1),
(41322743,'Juan','Rodriguez','juan97@gmail.com','juannn25','1234','Rodeo del Medio','1997-07-01','2612837345',1),
(42913695,'Agustin','Videla','agustinvidela835@gmail.com','agustinvidela','1234','M\'A\' Casa 11 Beltran Norte, Fray Luis Beltran','2000-09-24','2612634082',1),
(42913696,'Fernando','Airoldi','ferairoldi00@gmail.com','fernando21','1234','M\'A\' Casa 11 Beltran Norte, Fray Luis Beltran','2000-09-24','2612634081',1),
(42913697,'Agustin','Videla','agustinvidela835@gmail.com','agustinvidela','12345','Fray Luis Beltran','2000-09-24','2612634082',NULL);

/*Table structure for table `usuario_carrera` */

DROP TABLE IF EXISTS `usuario_carrera`;

CREATE TABLE `usuario_carrera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dniUsuario3` int(11) DEFAULT NULL,
  `codigoCarrera` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dniUsuario_idx` (`dniUsuario3`),
  KEY `fk_codigoCarrera_idx` (`codigoCarrera`),
  CONSTRAINT `fk_codigoCarrera` FOREIGN KEY (`codigoCarrera`) REFERENCES `carrera` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_dniUsuario3` FOREIGN KEY (`dniUsuario3`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

/*Data for the table `usuario_carrera` */

insert  into `usuario_carrera`(`id`,`dniUsuario3`,`codigoCarrera`) values 
(1,42913695,1000),
(2,41322743,1000);

/*Table structure for table `usuario_sede` */

DROP TABLE IF EXISTS `usuario_sede`;

CREATE TABLE `usuario_sede` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dniUsuario4` int(11) DEFAULT NULL,
  `codigoSede3` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_codigoSede3` (`codigoSede3`),
  KEY `fk_dniUsuario4` (`dniUsuario4`),
  CONSTRAINT `fk_codigoSede3` FOREIGN KEY (`codigoSede3`) REFERENCES `sede` (`codigo`),
  CONSTRAINT `fk_dniUsuario4` FOREIGN KEY (`dniUsuario4`) REFERENCES `usuario` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario_sede` */

insert  into `usuario_sede`(`id`,`dniUsuario4`,`codigoSede3`) values 
(1,42913695,4000),
(2,41322743,4000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
