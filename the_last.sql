-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: gis
-- ------------------------------------------------------
-- Server version	5.1.73-community

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asignaciones`
--

DROP TABLE IF EXISTS `asignaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requerimiento` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `reclutador` int(11) NOT NULL,
  `autoasignado` varchar(1) DEFAULT 'N',
  `autousuario` int(11) DEFAULT NULL,
  `autofecha` datetime DEFAULT NULL,
  `asignado` datetime DEFAULT NULL,
  `visto` datetime DEFAULT NULL,
  `cumplido` datetime DEFAULT NULL,
  `cita1` datetime DEFAULT NULL,
  `cita2` datetime DEFAULT NULL,
  `cita3` datetime DEFAULT NULL,
  `comentarios` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaciones`
--

LOCK TABLES `asignaciones` WRITE;
/*!40000 ALTER TABLE `asignaciones` DISABLE KEYS */;
INSERT INTO `asignaciones` VALUES (24,2,3,2,'N',NULL,NULL,'2018-08-21 16:55:25','2018-08-21 17:47:31',NULL,NULL,NULL,NULL,'ssad'),(26,3,3,2,'N',NULL,NULL,'2018-08-21 17:46:55','2018-08-21 17:47:31',NULL,NULL,NULL,NULL,'jj');
/*!40000 ALTER TABLE `asignaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `ubicacionentrevistas` varchar(255) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `actualizado` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Elektra','Insurgentes Sur 809, Nápoles, Ciudad de México, CDMX, México','Av Ejército Nacional 843, Granada, 11520 Ciudad de México, CDMX, México','2018-07-31 05:38:16','2018-08-13 02:14:19',1),(2,'Actinver','Calle Sócrates 107, Polanco, Polanco II Secc, 11550 Ciudad de México, CDMX, México','Av Ejército Nacional 843, Granada, 11520 Ciudad de México, CDMX, México','2018-08-09 11:17:15','2018-08-13 02:08:04',1),(3,'Panasonic','Av. de los Maestros 87, Agricultura, 11360 Ciudad de México, CDMX, México',NULL,'2018-08-16 02:13:47','2018-08-16 02:13:47',1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cv`
--

DROP TABLE IF EXISTS `cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `perfil` int(11) DEFAULT NULL,
  `generales` text,
  `habilidades` text,
  `cursos` text,
  `ctecnicos` text,
  `experiencia` text,
  `creado` datetime DEFAULT NULL,
  `actualizado` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `archivo` tinytext,
  `video` tinytext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv`
--

LOCK TABLES `cv` WRITE;
/*!40000 ALTER TABLE `cv` DISABLE KEYS */;
INSERT INTO `cv` VALUES (1,5,1,'Nested loops can be difficult to optimize for tracing VMs. Ina na ̈ıve implementation, inner loops would become hot first, andthe VM would start tracing there.','habilidades','cursos','conocimientos tecnicos','experiencia en muchas cosas','2018-08-15 14:38:14','2018-08-15 14:38:14',1,'cv.pdf','cv_video.mp4'),(2,8,1,'asdasd','asdasd','asdasd','asdasd','asdasd','2018-08-15 14:38:14','2018-08-15 14:38:14',1,'pdf.pdf','muestra.mp4');
/*!40000 ALTER TABLE `cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logcorreos`
--

DROP TABLE IF EXISTS `logcorreos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logcorreos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `reclutador` int(11) NOT NULL,
  `correos` text NOT NULL,
  `fecha` datetime NOT NULL,
  `delimitador` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logcorreos`
--

LOCK TABLES `logcorreos` WRITE;
/*!40000 ALTER TABLE `logcorreos` DISABLE KEYS */;
/*!40000 ALTER TABLE `logcorreos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(255) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `actualizado` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` VALUES (1,'Programador Web',1,'2018-08-17 13:19:28','2018-08-21 12:09:40',1),(2,'Account Manager Jr',1,'2018-08-17 13:34:20','2018-08-21 09:34:20',1),(8,'Php SR',3,'2018-08-21 09:34:34','2018-08-21 09:34:34',1),(9,'Programador Front End',1,'2018-08-21 12:09:26','2018-08-21 13:44:05',1);
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postulaciones`
--

DROP TABLE IF EXISTS `postulaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postulaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) DEFAULT NULL,
  `vacante` int(11) DEFAULT NULL,
  `reclutador` int(11) DEFAULT NULL,
  `postulado` datetime DEFAULT NULL,
  `medio` varchar(255) DEFAULT NULL,
  `cita1` datetime DEFAULT NULL,
  `cita2` datetime DEFAULT NULL,
  `cita3` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postulaciones`
--

LOCK TABLES `postulaciones` WRITE;
/*!40000 ALTER TABLE `postulaciones` DISABLE KEYS */;
INSERT INTO `postulaciones` VALUES (3,5,3,2,'2018-08-21 17:28:25','RH',NULL,NULL,NULL,9);
/*!40000 ALTER TABLE `postulaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prioridad`
--

DROP TABLE IF EXISTS `prioridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prioridad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prioridad`
--

LOCK TABLES `prioridad` WRITE;
/*!40000 ALTER TABLE `prioridad` DISABLE KEYS */;
INSERT INTO `prioridad` VALUES (1,'Baja no urgente',1,1),(2,'Baja con urgencia media',2,1),(3,'Baja con urgencia alta',3,1),(4,'Media no urgente',4,1),(5,'Media con urgencia media',5,1),(6,'Media con urgencia alta',6,1),(7,'Alta no urgente',7,1),(8,'Alta con urgencia media',8,1),(9,'Alta con urgencia alta',9,1);
/*!40000 ALTER TABLE `prioridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requerimientos`
--

DROP TABLE IF EXISTS `requerimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requerimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) DEFAULT NULL,
  `puesto` varchar(255) DEFAULT NULL,
  `recursos` int(11) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `lider` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `tituloreporta` varchar(255) DEFAULT NULL,
  `contrato` varchar(1) DEFAULT NULL,
  `prioridad` int(11) DEFAULT NULL,
  `proyecto` varchar(255) DEFAULT NULL,
  `direcciontrabajo` varchar(255) DEFAULT NULL,
  `direccioncliente` varchar(255) DEFAULT NULL,
  `duracion` varchar(255) DEFAULT NULL,
  `ingles` varchar(1) DEFAULT NULL,
  `equipo` varchar(1) DEFAULT NULL,
  `manejopersonal` varchar(1) DEFAULT NULL,
  `horario` varchar(75) DEFAULT NULL,
  `disponibilidadviaje` varchar(1) DEFAULT NULL,
  `objetivo` text,
  `responsabilidades` text,
  `conocimientos` text,
  `cursos` text,
  `tecnologias` text,
  `sueldoneto` double DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `creado` datetime DEFAULT NULL,
  `asignado` datetime DEFAULT NULL,
  `citasrh` varchar(1) DEFAULT NULL,
  `citascliente` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requerimientos`
--

LOCK TABLES `requerimientos` WRITE;
/*!40000 ALTER TABLE `requerimientos` DISABLE KEYS */;
INSERT INTO `requerimientos` VALUES (3,1,'Programador Web',3,'1','el lider','desarrollo','coordinador','N',9,'Modernización','Insurgentes Sur 809, Nápoles, Ciudad de México, CDMX, México','Av Ejército Nacional 843, Granada, 11520 Ciudad de México, CDMX, México','9 meses','N','N','N','9 a 18 hrs','N','prueba para objetivo','las responsabilidades de la vacante','estos son los conocimientos requeridos','los cursos','las tecnologias son, solo frameworks',25000,3,'2018-08-21 17:01:31','2018-08-21 17:46:55',NULL,NULL);
/*!40000 ALTER TABLE `requerimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Activo'),(2,'Asignado'),(3,'Revisado'),(4,'En citas'),(5,'Con cliente'),(6,'Cancelado'),(7,'Contratación'),(8,'Inactivo'),(9,'Postulado');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `elpass` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `appat` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apmat` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `genero` varchar(1) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish2_ci,
  `ultimoacceso` datetime NOT NULL,
  `registro` datetime DEFAULT NULL,
  `IP` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` int(1) NOT NULL DEFAULT '1',
  `link` text COLLATE utf8_spanish2_ci,
  `statuslink` int(11) DEFAULT '1',
  `img` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Admininistrador','contacto@grupois.com','123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-21 15:58:55',NULL,'::1','A',1,NULL,1,'2a1c5bbb55d56e983ff7ba2b09caa556.jpg'),(2,'Rubi Estrada','rubi.estrada@grupois.com','987',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-21 15:54:31',NULL,'::1','OR',1,NULL,1,'2e74b0d28c8ec2bd1c02272739a4fa8b.jpg'),(3,'Aylin Tea Magdaleno','ailyn.tea@grupois.com','1234',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-21 15:55:12',NULL,'::1','AR',1,NULL,1,NULL),(4,'Hassly Castro','Hassly.castro@grupois.com','321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-16 13:12:01',NULL,'::1','OA',1,NULL,1,NULL),(5,'Victor Reyes','victor.reyes@grupois.com','123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-17 13:12:37',NULL,'::1','U',1,NULL,1,NULL),(6,'Rossio Millán','ro@','123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-07-19 15:57:59',NULL,'192.168.100.54','OA',1,NULL,1,NULL),(7,'Maria Miroslava','miros@jsja','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-15 09:54:05',NULL,'::1','OR',1,NULL,1,NULL),(8,'Recurso','recurso@recurso.com','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-12 10:10:10',NULL,NULL,'U',1,NULL,1,NULL),(9,'Lucia Corona','lucia.corona@grupois.com','12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-16 11:51:04',NULL,'::1','OR',1,NULL,1,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacantes`
--

DROP TABLE IF EXISTS `vacantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `perfil` int(11) NOT NULL,
  `ubicacion` varchar(245) DEFAULT NULL,
  `recursos` int(11) DEFAULT NULL,
  `salario` int(11) DEFAULT NULL,
  `descripcion` text,
  `imagen` longtext,
  `archivo` text,
  `status` int(11) DEFAULT '1',
  `creado` datetime DEFAULT NULL,
  `asignado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacantes`
--

LOCK TABLES `vacantes` WRITE;
/*!40000 ALTER TABLE `vacantes` DISABLE KEYS */;
INSERT INTO `vacantes` VALUES (3,1,1,'Insurgentes Sur 809, Nápoles, Ciudad de México, CDMX, México',3,25000,'prueba para objetivo\n\nlas responsabilidades de la vacante\n\nestos son los conocimientos requeridos\n\nlos cursos\n\nlas tecnologias son, solo frameworks','imagen.jpeg',NULL,3,'2018-08-21 17:01:31','2018-08-21 17:46:55');
/*!40000 ALTER TABLE `vacantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gis'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-21 17:47:48
