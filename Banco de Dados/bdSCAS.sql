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
-- Table structure for table `amostra`
--

DROP TABLE IF EXISTS `amostra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `amostra` (
  `idamostra` int(11) NOT NULL AUTO_INCREMENT,
  `condicao_armazenamento` varchar(45) DEFAULT NULL,
  `data_implantacao` varchar(10) DEFAULT NULL,
  `amostrador` varchar(45) DEFAULT NULL,
  `renasem_amostrador` varchar(45) DEFAULT NULL,
  `peneira` varchar(45) DEFAULT NULL,
  `representatividade` varchar(45) DEFAULT NULL,
  `loteFK` varchar(13) DEFAULT NULL,
  `situacao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idamostra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amostra`
--

LOCK TABLES `amostra` WRITE;
/*!40000 ALTER TABLE `amostra` DISABLE KEYS */;
INSERT INTO `amostra` VALUES (1,'Câmara Seca','2019-02-04','Mariana','AC-000000','-0-','1,5','LC4','Finalizada'),(3,'Redoma','2019-02-01','Julia','AC-000001','-0-','2,0','LF2','Iniciada');
/*!40000 ALTER TABLE `amostra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arvore`
--

DROP TABLE IF EXISTS `arvore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arvore` (
  `idarvores` int(11) NOT NULL AUTO_INCREMENT,
  `altura_total` float DEFAULT NULL,
  `altura_comercial` float DEFAULT NULL,
  `dap` float DEFAULT NULL,
  `cap` float DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arvore`
--

LOCK TABLES `arvore` WRITE;
/*!40000 ALTER TABLE `arvore` DISABLE KEYS */;
INSERT INTO `arvore` VALUES (1,11,15,1111110000,8931730000,'22222222','22222222','No chao','Arenoso','Ondulado','Terra firme','Floresta primaria','sem arore zinhoa',2,'2018-12-24 17:18:30'),(6,10.05,20,2,2,'3','3','Na arvore','Areno-argiloso','Suave-ondulado','Terra firme','Floresta primaria','pe de maca',1,'2018-12-25 19:19:50');
/*!40000 ALTER TABLE `arvore` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_usuario`
--

DROP TABLE IF EXISTS `categoria_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_usuario` (
  `idcat_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cat_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idcat_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_usuario`
--

LOCK TABLES `categoria_usuario` WRITE;
/*!40000 ALTER TABLE `categoria_usuario` DISABLE KEYS */;
INSERT INTO `categoria_usuario` VALUES (1,'Responsável Técnico'),(2,'Secretária'),(3,'Analista'),(4,'Controle de Qualidade'),(5,'Adminstrador do Sistema');
/*!40000 ALTER TABLE `categoria_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checagem`
--

DROP TABLE IF EXISTS `checagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checagem` (
  `idchecagem` int(11) NOT NULL AUTO_INCREMENT,
  `ndias_semeadura` varchar(45) NOT NULL,
  `data` varchar(45) NOT NULL,
  `germinacaoFK` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idchecagem`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checagem`
--

LOCK TABLES `checagem` WRITE;
/*!40000 ALTER TABLE `checagem` DISABLE KEYS */;
INSERT INTO `checagem` VALUES (1,'1','2019-02-08',1,'2019-02-13 02:26:42'),(2,'2','2019-02-09',1,'2019-02-13 02:29:11'),(3,'3','2019-02-10',1,'2019-02-13 02:29:57');
/*!40000 ALTER TABLE `checagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colheita`
--

DROP TABLE IF EXISTS `colheita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colheita` (
  `idcolheita` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `local` varchar(255) NOT NULL,
  `colhedores` varchar(255) NOT NULL,
  `especieFK` int(11) DEFAULT NULL,
  `observacoes_colheita` varchar(255) DEFAULT '...',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcolheita`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colheita`
--

LOCK TABLES `colheita` WRITE;
/*!40000 ALTER TABLE `colheita` DISABLE KEYS */;
INSERT INTO `colheita` VALUES (1,'2018-09-28','Universidade Federal do Acre','   Mariana e Julia e Luisa',17,'Dia de chuva','2018-09-28 13:46:30'),(2,'2018-09-28','Universidade Federal do Acre','Julia Maria',9,'Sem obs','2018-09-28 13:47:23'),(3,'2018-12-27','Universidade Federal do Acre','Mariana',0,'somente brotos','2018-12-28 02:30:20'),(4,'2018-12-27','Universidade Federal do Acre','Mariana',0,'Somente brotos','2018-12-28 02:31:38'),(5,'2018-12-27','Condominio la reserve','mariana',17,'sem obs','2018-12-28 02:34:55');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (3,'Rodovia BR 364, Km 04','Distrito industrial','Rio Branco','RJ',' 69920-900','2018-08-06 19:16:27'),(4,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','Floresta','Rio Branco','AC','69912-452','2018-08-06 20:27:48'),(5,'Rodovia BR 364, Km 04','Distrito Industrial','Rio Branco','AC','69920-900','2018-08-16 13:03:33'),(6,'Rodovia BR 364, Km 04','Distrito Industrial','Rio Branco','AC','69920-900','2018-08-16 13:42:26'),(10,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','Floresta Sul','Rio Branco','AC','69912-452','2018-08-22 14:26:37'),(11,'Rua São Cristo','Centro','Rio de Janeiro','RJ','2147538593','2018-08-22 14:57:10'),(12,'Rua São Cristo','Centro','Rio de Janeiro','RJ','2147538593','2018-08-22 14:58:25'),(13,'Avenida Rio Branco','Centro','Rio Branco','AC','6912312312','2018-08-23 23:06:44'),(14,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','Floresta Sul','Rio Branco','AC','69912-452','2018-08-24 01:07:12'),(15,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','Floresta','Rio Branco','AC','69912-452','2018-08-24 16:11:22'),(16,'Rua São Cristo','Centro','Rio Branco','AC','2147538593','2018-09-28 03:10:01'),(17,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','Floresta','Rio Branco','RJ','69912-452','2018-10-21 14:08:30'),(18,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','Floresta','Rio Branco','AC','69912-452','2018-12-24 18:35:22'),(19,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','Centro','Rio Branco','AC','69912-452','2018-12-28 02:27:20'),(20,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','Floresta Sul','Rio Branco','AC','69912-452','2018-12-28 02:29:33');
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
  `num_repeticoes` int(1) DEFAULT '4',
  `qtd_repeticoes` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_especie`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especie`
--

LOCK TABLES `especie` WRITE;
/*!40000 ALTER TABLE `especie` DISABLE KEYS */;
INSERT INTO `especie` VALUES (8,'Acacia bonariensis','Unha-de-gato','Fabaceae',4,10,'2018-07-29 14:26:50'),(10,'Bactris gasipaes','Pupunha','Arecaceae',NULL,NULL,'2018-07-29 14:28:43'),(11,'Euterpe oleracea','Açai','Arecaceae',NULL,NULL,'2018-07-29 14:30:31'),(16,'Acacia mearnsis','Acácia-negra','Fabaceae',4,NULL,'2018-08-16 13:40:09');
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
  `enderecoFK` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fornecedor`),
  KEY `fk_endereco` (`enderecoFK`),
  CONSTRAINT `fk_endereco` FOREIGN KEY (`enderecoFK`) REFERENCES `endereco` (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'Sementes & Sementes SA','AC-5455745',NULL,16,'2018-09-28 03:10:01'),(2,'Universidade Federal do Acre','AC-5455745','7992715177',17,'2018-10-21 14:08:30'),(3,'Sementes & Sementes SA','AC-5455745','7992715177',18,'2018-12-24 18:35:22'),(4,'Universidade Federal do Acre','AC-5455745','7992715177',19,'2018-12-28 02:27:21'),(5,'Universidade Federal do Acre','AC-5455745','7992715177',20,'2018-12-28 02:29:33');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `germ_resultado`
--

DROP TABLE IF EXISTS `germ_resultado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `germ_resultado` (
  `idgerm_resultado` int(11) NOT NULL AUTO_INCREMENT,
  `descrepeticao` varchar(3) DEFAULT NULL,
  `porcent_germinacao` varchar(10) DEFAULT NULL,
  `velocidade_germinacao` varchar(10) DEFAULT NULL,
  `plantulas_normais` varchar(10) DEFAULT NULL,
  `plantulas_anormais` varchar(10) DEFAULT NULL,
  `sementes_duras` varchar(10) DEFAULT NULL,
  `semenstes_dormentes` varchar(10) DEFAULT NULL,
  `sementes_mortas` varchar(10) DEFAULT NULL,
  `germinacaoFK` varchar(45) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idgerm_resultado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `germ_resultado`
--

LOCK TABLES `germ_resultado` WRITE;
/*!40000 ALTER TABLE `germ_resultado` DISABLE KEYS */;
INSERT INTO `germ_resultado` VALUES (1,'R1','86','3','3','1','0','1','0','1','2019-02-13 02:32:38'),(2,'R2','89','4','4','0','0','1','1','1','2019-02-13 02:32:38'),(3,'R3','90','5','3','0','0','0','0','1','2019-02-13 02:32:38'),(4,'R4','88','3','2','1','0','0','1','1','2019-02-13 02:32:38');
/*!40000 ALTER TABLE `germ_resultado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `germinacao`
--

DROP TABLE IF EXISTS `germinacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `germinacao` (
  `idgerminacao` int(11) NOT NULL AUTO_INCREMENT,
  `datasemeadura` varchar(10) NOT NULL,
  `analista` varchar(45) NOT NULL,
  `temperatura` varchar(45) NOT NULL,
  `substrato` varchar(45) NOT NULL,
  `numsementes_repeticao` varchar(10) NOT NULL,
  `numrepeticoes` varchar(45) NOT NULL,
  `peso_amostra_germinacao` varchar(45) NOT NULL,
  `tratamento` varchar(45) NOT NULL,
  `obs_germinacao` tinytext,
  `amostraFK` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idgerminacao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `germinacao`
--

LOCK TABLES `germinacao` WRITE;
/*!40000 ALTER TABLE `germinacao` DISABLE KEYS */;
INSERT INTO `germinacao` VALUES (1,'2019-02-07','Leoncio','25','SAL','10','4','200','-N-','',1,'2019-02-13 02:25:52');
/*!40000 ALTER TABLE `germinacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lote`
--

DROP TABLE IF EXISTS `lote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lote` (
  `idlote_sementes` varchar(13) NOT NULL,
  `especie` varchar(45) DEFAULT NULL,
  `data_chegada` varchar(10) NOT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `origemFK` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `especieFK` int(11) DEFAULT NULL,
  PRIMARY KEY (`idlote_sementes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lote`
--

LOCK TABLES `lote` WRITE;
/*!40000 ALTER TABLE `lote` DISABLE KEYS */;
INSERT INTO `lote` VALUES ('LC1',NULL,'2018-09-28','colhido',1,'2018-09-28 13:46:30',17),('LC2',NULL,'2018-09-28','colhido',2,'2018-09-28 13:47:24',9),('LC3',NULL,'2018-12-27','colhido',3,'2018-12-28 02:30:20',11),('LC4',NULL,'2018-12-27','colhido',4,'2018-12-28 02:31:38',11),('LC5',NULL,'2018-12-27','colhido',5,'2018-12-28 02:34:55',17),('LF1','','2018-09-27','fornecido',1,'2018-09-28 03:10:02',11),('LF2','','2018-10-21','fornecido',2,'2018-10-21 14:08:30',8),('LF3','','2018-12-09','fornecido',3,'2018-12-24 18:35:22',17),('LF4','','2018-12-27','fornecido',4,'2018-12-28 02:27:21',11),('LF5','','2018-12-27','fornecido',5,'2018-12-28 02:29:33',17);
/*!40000 ALTER TABLE `lote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `num_sementes`
--

DROP TABLE IF EXISTS `num_sementes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `num_sementes` (
  `idteste_num_sementes` int(11) NOT NULL AUTO_INCREMENT,
  `data_num_sementes` varchar(10) NOT NULL,
  `analista_num_sementes` varchar(45) NOT NULL,
  `qtd_num_sementes` float NOT NULL,
  `peso_amostra` float NOT NULL,
  `kg_num_sementes` float NOT NULL,
  `observacoes_num_sementes` varchar(255) DEFAULT NULL,
  `amostraFK` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idteste_num_sementes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `num_sementes`
--

LOCK TABLES `num_sementes` WRITE;
/*!40000 ALTER TABLE `num_sementes` DISABLE KEYS */;
/*!40000 ALTER TABLE `num_sementes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outras_sementes`
--

DROP TABLE IF EXISTS `outras_sementes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outras_sementes` (
  `idoutras_sementes` int(11) NOT NULL AUTO_INCREMENT,
  `dt_outras_sementes` varchar(10) NOT NULL,
  `analista_outras_sementes` varchar(45) NOT NULL,
  `peso_amostra_os` varchar(45) NOT NULL,
  `outras_especies` varchar(45) NOT NULL,
  `sementes_silvestres` varchar(45) NOT NULL,
  `sementes_toleradas` varchar(45) NOT NULL,
  `sementes_proibidas` varchar(45) NOT NULL,
  `obs_outras_sementes` varchar(45) DEFAULT NULL,
  `amostraFK` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idoutras_sementes`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outras_sementes`
--

LOCK TABLES `outras_sementes` WRITE;
/*!40000 ALTER TABLE `outras_sementes` DISABLE KEYS */;
INSERT INTO `outras_sementes` VALUES (1,'2019-02-12','Mariana','-0-','-0-','-0-','-0-','-0-','',1,'2019-02-13 02:44:12');
/*!40000 ALTER TABLE `outras_sementes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesagem_teor_agua`
--

DROP TABLE IF EXISTS `pesagem_teor_agua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesagem_teor_agua` (
  `idpesagem_teor_agua` int(11) NOT NULL AUTO_INCREMENT,
  `num_cadinho` int(11) NOT NULL,
  `peso_cadinho` varchar(10) NOT NULL,
  `peso_umido` varchar(10) NOT NULL,
  `peso_seco` varchar(10) NOT NULL,
  `umidade` varchar(10) NOT NULL,
  `teor_aguaFK` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpesagem_teor_agua`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesagem_teor_agua`
--

LOCK TABLES `pesagem_teor_agua` WRITE;
/*!40000 ALTER TABLE `pesagem_teor_agua` DISABLE KEYS */;
INSERT INTO `pesagem_teor_agua` VALUES (1,1,'23','65','30','50',1,'2019-02-13 02:25:08'),(2,2,'10','20','10','20',1,'2019-02-13 03:02:12');
/*!40000 ALTER TABLE `pesagem_teor_agua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peso_mil_sementes`
--

DROP TABLE IF EXISTS `peso_mil_sementes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peso_mil_sementes` (
  `idpeso_mil_sementes` int(11) NOT NULL AUTO_INCREMENT,
  `data_ensaio` varchar(10) NOT NULL,
  `analista_mil_sementes` varchar(45) NOT NULL,
  `peso_medio` varchar(45) NOT NULL,
  `desvio_padrao` varchar(45) NOT NULL,
  `variancia` varchar(45) NOT NULL,
  `coeficiente_variacao` varchar(45) NOT NULL,
  `kg_mil_sementes` varchar(45) NOT NULL,
  `kg_num_medio` varchar(45) NOT NULL,
  `peso_amostra` varchar(45) NOT NULL,
  `obs_peso_mil_sementes` tinytext,
  `amostraFK` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpeso_mil_sementes`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peso_mil_sementes`
--

LOCK TABLES `peso_mil_sementes` WRITE;
/*!40000 ALTER TABLE `peso_mil_sementes` DISABLE KEYS */;
INSERT INTO `peso_mil_sementes` VALUES (1,'2019-02-09','Julia Maria','100,5','0,2','10,5','0,6','500','80,14','502,14','',1,'2019-02-13 02:43:32');
/*!40000 ALTER TABLE `peso_mil_sementes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pureza`
--

DROP TABLE IF EXISTS `pureza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pureza` (
  `idpureza` int(11) NOT NULL AUTO_INCREMENT,
  `data_ensaio` varchar(10) NOT NULL,
  `analista` varchar(45) NOT NULL,
  `peso_amostra_media` varchar(10) NOT NULL,
  `peso_amostra_trab` varchar(10) NOT NULL,
  `sementes_puras` varchar(10) NOT NULL,
  `outras_sementes` varchar(10) NOT NULL,
  `material_inerte` varchar(10) NOT NULL,
  `natureza_material_inerte` varchar(45) NOT NULL,
  `outras_cultivares` varchar(10) NOT NULL,
  `obs_pureza` tinytext,
  `amostraFK` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpureza`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pureza`
--

LOCK TABLES `pureza` WRITE;
/*!40000 ALTER TABLE `pureza` DISABLE KEYS */;
INSERT INTO `pureza` VALUES (1,'2019-02-08','Julia Maria','125','100','5','5','-N-','-N-','-N-','',1,'2019-02-13 02:41:53');
/*!40000 ALTER TABLE `pureza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repeticao`
--

DROP TABLE IF EXISTS `repeticao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repeticao` (
  `idrepeticao` int(11) NOT NULL AUTO_INCREMENT,
  `descricaorep` varchar(45) DEFAULT NULL,
  `qtdgerminada` int(11) DEFAULT NULL,
  `checagemFK` int(11) DEFAULT NULL,
  PRIMARY KEY (`idrepeticao`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repeticao`
--

LOCK TABLES `repeticao` WRITE;
/*!40000 ALTER TABLE `repeticao` DISABLE KEYS */;
INSERT INTO `repeticao` VALUES (1,'R1',0,1),(2,'R2',1,1),(3,'R3',2,1),(4,'R4',0,1),(5,'R1',2,2),(6,'R2',1,2),(7,'R3',2,2),(8,'R4',1,2),(9,'R1',3,3),(10,'R2',1,3),(11,'R3',2,3),(12,'R4',3,3);
/*!40000 ALTER TABLE `repeticao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repeticao_mil_sementes`
--

DROP TABLE IF EXISTS `repeticao_mil_sementes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repeticao_mil_sementes` (
  `idrepeticao_mil_sementes` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_rep` varchar(45) NOT NULL,
  `peso_amostra_rep` varchar(10) NOT NULL,
  `peso_mil_sementesFK` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idrepeticao_mil_sementes`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repeticao_mil_sementes`
--

LOCK TABLES `repeticao_mil_sementes` WRITE;
/*!40000 ALTER TABLE `repeticao_mil_sementes` DISABLE KEYS */;
INSERT INTO `repeticao_mil_sementes` VALUES (1,'R1','101',1,'2019-02-13 02:43:32'),(2,'R2','100',1,'2019-02-13 02:43:32'),(3,'R3','101',1,'2019-02-13 02:43:32'),(4,'R4','100',1,'2019-02-13 02:43:32');
/*!40000 ALTER TABLE `repeticao_mil_sementes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teor_agua`
--

DROP TABLE IF EXISTS `teor_agua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teor_agua` (
  `idteor_agua` int(11) NOT NULL AUTO_INCREMENT,
  `data_teor_agua` varchar(10) NOT NULL,
  `analista_teor_agua` varchar(45) NOT NULL,
  `obs_teor_agua` tinytext,
  `umidade_media` varchar(45) DEFAULT NULL,
  `amostraFK` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `peso_amostra_umi` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idteor_agua`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teor_agua`
--

LOCK TABLES `teor_agua` WRITE;
/*!40000 ALTER TABLE `teor_agua` DISABLE KEYS */;
INSERT INTO `teor_agua` VALUES (1,'2019-02-08','Mariana','Sem obs.','48',1,'2019-02-13 02:25:08','125');
/*!40000 ALTER TABLE `teor_agua` ENABLE KEYS */;
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
  `senha` varchar(45) DEFAULT NULL,
  `categoriaUsuarioFK` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusuario`),
  KEY `fk_categoria_usuario` (`categoriaUsuarioFK`),
  CONSTRAINT `fk_categoria_usuario` FOREIGN KEY (`categoriaUsuarioFK`) REFERENCES `categoria_usuario` (`idcat_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (32,'administradora','adm@adm','21232f297a57a5a743894a0e4a801fc3',1,'2018-07-27 01:45:37'),(54,'willy','WILLY@HOTMAIL.COM','25d55ad283aa400af464c76d713c07ad',4,'2018-07-28 15:10:42'),(59,'evandro junior','evandro@gmail.com','25d55ad283aa400af464c76d713c07ad',5,'2018-08-02 14:46:00'),(60,'Mariana Xavier','mariax.a@hotmail.com','123456',3,'2018-08-03 15:15:47');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` int(1) unsigned NOT NULL DEFAULT '1',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoriaUsuarioFK` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nivel` (`nivel`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Usuário Teste','89e495e7941cf9e40e6980d14a16bf023ccd4c91','usuario@demo.com.br',1,1,'2018-12-26 15:25:41',2),(2,'Administrador Teste','d033e22ae348aeb5660fc2140aec35850c4da997','admin@demo.com.br',2,1,'2018-12-26 15:25:41',5),(3,'Mariana Xavier','25d55ad283aa400af464c76d713c07ad','mxa234@gmail.com',2,1,'2019-02-12 20:05:37',5);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'lasfac2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-21 17:04:14
