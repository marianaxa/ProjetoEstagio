CREATE DATABASE  IF NOT EXISTS `lasfac2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `lasfac2`;
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
-- Table structure for table `arvores`
--

DROP TABLE IF EXISTS `arvores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arvores` (
  `idarvores` int(11) NOT NULL,
  `altura_total` decimal(5,0) DEFAULT NULL,
  `altura_comercial` decimal(5,0) DEFAULT NULL,
  `dap` decimal(10,0) DEFAULT NULL,
  `cap` decimal(10,0) DEFAULT NULL,
  `gpsX` decimal(10,0) DEFAULT NULL,
  `gpsY` decimal(10,0) DEFAULT NULL,
  `tipo_colheita` varchar(45) DEFAULT NULL,
  `tipo_solo` varchar(45) DEFAULT NULL,
  `tipo_terreno` varchar(45) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `tipo_vegetacao` varchar(45) DEFAULT NULL,
  `arvores_vizinhas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idarvores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arvores`
--

LOCK TABLES `arvores` WRITE;
/*!40000 ALTER TABLE `arvores` DISABLE KEYS */;
/*!40000 ALTER TABLE `arvores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_usuario`
--

DROP TABLE IF EXISTS `categoria_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_usuario` (
  `idcat_usuario` int(11) NOT NULL,
  `nome_cat_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idcat_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_usuario`
--

LOCK TABLES `categoria_usuario` WRITE;
/*!40000 ALTER TABLE `categoria_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colheita`
--

DROP TABLE IF EXISTS `colheita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colheita` (
  `idcolheita` int(11) NOT NULL,
  `data` varchar(10) NOT NULL,
  `local` varchar(255) NOT NULL,
  `colhedores` varchar(255) NOT NULL,
  `arvore_colheitaFK` int(11) NOT NULL,
  `observacoes_colheita` varchar(255) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcolheita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colheita`
--

LOCK TABLES `colheita` WRITE;
/*!40000 ALTER TABLE `colheita` DISABLE KEYS */;
/*!40000 ALTER TABLE `colheita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','2222','Rio Branco','AC','69912-452','2018-07-25 20:21:58');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especie`
--

DROP TABLE IF EXISTS `especie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especie` (
  `id_especie` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cientifico` varchar(45) NOT NULL,
  `nome_vulgar` varchar(45) NOT NULL,
  `familia` varchar(45) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_especie`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especie`
--

LOCK TABLES `especie` WRITE;
/*!40000 ALTER TABLE `especie` DISABLE KEYS */;
INSERT INTO `especie` VALUES (1,'teste','teste','teste','2018-07-25 20:18:07');
/*!40000 ALTER TABLE `especie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(225) NOT NULL,
  `renasem` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `enderecoFK` int(11) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fornecedor`),
  KEY `fk_endereco` (`enderecoFK`),
  CONSTRAINT `fk_endereco` FOREIGN KEY (`enderecoFK`) REFERENCES `endereco` (`id_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lote`
--

DROP TABLE IF EXISTS `lote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lote` (
  `idlote_sementes` int(11) NOT NULL,
  `idespecieFK` int(11) NOT NULL,
  `data_chegada` varchar(10) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `origemFK` int(11) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idlote_sementes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lote`
--

LOCK TABLES `lote` WRITE;
/*!40000 ALTER TABLE `lote` DISABLE KEYS */;
/*!40000 ALTER TABLE `lote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `categoriaUsuarioFK` int(11) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'mariana','mxa234@gmail.com','e10adc3949ba59abbe56e057f20f883e',1,'2018-07-26 12:59:41'),(2,'administrador','adm@adm','21232f297a57a5a743894a0e4a801fc3',1,'2018-07-26 17:59:38');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-26 13:41:51
