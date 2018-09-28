-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lasfac2
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `arvore`
--

DROP TABLE IF EXISTS `arvore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arvore` (
  `idarvores` int(11) NOT NULL AUTO_INCREMENT,
  `altura_total` decimal(5,0) DEFAULT NULL,
  `altura_comercial` decimal(5,0) DEFAULT NULL,
  `dap` decimal(10,0) DEFAULT NULL,
  `cap` decimal(10,0) DEFAULT NULL,
  `gpsX` varchar(45) DEFAULT NULL,
  `gpsY` varchar(45) DEFAULT NULL,
  `tipo_colheita` varchar(45) DEFAULT NULL,
  `tipo_solo` varchar(45) DEFAULT NULL,
  `tipo_terreno` varchar(45) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `tipo_vegetacao` varchar(45) DEFAULT NULL,
  `arvores_vizinhas` tinytext,
  `colheitaFK` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idarvores`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arvore`
--

LOCK TABLES `arvore` WRITE;
/*!40000 ALTER TABLE `arvore` DISABLE KEYS */;
INSERT INTO `arvore` VALUES (1,2,3,555555,55555555,'34444434343','-2347234727','Na arvore','Arenoso','Ondulado','Terra firme','Capoeira','',1,'2018-08-24 01:37:24'),(2,2,4,1111111111,222222222,'3333333333','-444444444','No chao','Arenoso','Suave-ondulado','Terra firme','Capoeira','',2,'2018-08-24 01:40:23'),(3,3,4,1111111111,2222222222,'44444444444','-55555555555','No chao','Arenoso','Ondulado','Terra firme','Floresta primaria','',2,'2018-08-24 01:40:51');
/*!40000 ALTER TABLE `arvore` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-27 19:46:15
