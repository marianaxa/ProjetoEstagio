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
INSERT INTO `amostra` VALUES (1,'Câmara Seca','2018-08-22','Mariana','LC1','Finalizada'),(2,'Redoma','2018-08-23','Julia','LC2','iniciada'),(3,'Câmara Seca','2018-09-16','Mariana','LC2','iniciada');
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
  `data` varchar(45) DEFAULT NULL,
  `germinacaoFK` int(11) DEFAULT NULL,
  PRIMARY KEY (`idchecagem`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checagem`
--

LOCK TABLES `checagem` WRITE;
/*!40000 ALTER TABLE `checagem` DISABLE KEYS */;
INSERT INTO `checagem` VALUES (1,'2018-09-25',1),(2,'2018-09-27',1),(3,'',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colheita`
--

LOCK TABLES `colheita` WRITE;
/*!40000 ALTER TABLE `colheita` DISABLE KEYS */;
INSERT INTO `colheita` VALUES (1,'2018-08-21','Universidade Federal do Acre','Mariana e Julia',10,'Dia chuvoso','2018-08-23 23:07:31'),(2,'2018-08-23','Reserva Parque Chico Mendes','Mara  e Julia',10,'sem observacao','2018-08-24 01:38:31');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (3,'Rodovia BR 364, Km 04','Distrito industrial','Rio Branco','RJ',' 69920-900','2018-08-06 19:16:27'),(4,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','Floresta','Rio Branco','AC','69912-452','2018-08-06 20:27:48'),(5,'Rodovia BR 364, Km 04','Distrito Industrial','Rio Branco','AC','69920-900','2018-08-16 13:03:33'),(6,'Rodovia BR 364, Km 04','Distrito Industrial','Rio Branco','AC','69920-900','2018-08-16 13:42:26'),(10,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','Floresta Sul','Rio Branco','AC','69912-452','2018-08-22 14:26:37'),(11,'Rua São Cristo','Centro','Rio de Janeiro','RJ','2147538593','2018-08-22 14:57:10'),(12,'Rua São Cristo','Centro','Rio de Janeiro','RJ','2147538593','2018-08-22 14:58:25'),(13,'Avenida Rio Branco','Centro','Rio Branco','AC','6912312312','2018-08-23 23:06:44'),(14,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','Floresta Sul','Rio Branco','AC','69912-452','2018-08-24 01:07:12'),(15,'Estrada da Floresta n1893 condominio via parque bl vl3 t3','Floresta','Rio Branco','AC','69912-452','2018-08-24 16:11:22');
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
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_especie`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especie`
--

LOCK TABLES `especie` WRITE;
/*!40000 ALTER TABLE `especie` DISABLE KEYS */;
INSERT INTO `especie` VALUES (8,'Acacia bonariensis','Unha-de-gato','Fabaceae',NULL,'2018-07-29 14:26:50'),(9,'Vigna unguiculata','feijão de corda','Fabaceae',NULL,'2018-07-29 14:27:47'),(10,'Bactris gasipaes','Pupunha','Arecaceae',NULL,'2018-07-29 14:28:43'),(11,'Euterpe oleracea','Açai','Arecaceae',NULL,'2018-07-29 14:30:31'),(16,'Acacia mearnsis','Acácia-negra','Fabaceae',4,'2018-08-16 13:40:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'Aldeira Arara','AC-5455745',NULL,13,'2018-08-23 23:06:44');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `germinacao`
--

DROP TABLE IF EXISTS `germinacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `germinacao` (
  `idgerminacao` int(11) NOT NULL AUTO_INCREMENT,
  `datasemeadura` varchar(10) DEFAULT NULL,
  `analista` varchar(45) DEFAULT NULL,
  `temperatura` varchar(45) DEFAULT NULL,
  `substrato` varchar(45) DEFAULT NULL,
  `numsementes_repeticao` varchar(10) DEFAULT NULL,
  `tratamento` varchar(45) DEFAULT NULL,
  `totalplantulas` varchar(10) DEFAULT NULL,
  `plantulasanormais` varchar(10) DEFAULT NULL,
  `sementesfirmes` varchar(10) DEFAULT NULL,
  `sementesmortas` varchar(10) DEFAULT NULL,
  `sementeschocas` varchar(10) DEFAULT NULL,
  `amostraFK` int(11) DEFAULT NULL,
  PRIMARY KEY (`idgerminacao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `germinacao`
--

LOCK TABLES `germinacao` WRITE;
/*!40000 ALTER TABLE `germinacao` DISABLE KEYS */;
INSERT INTO `germinacao` VALUES (1,'2018-09-24','Mariana','','EP','10x4','especial','72','1','27','0','-N-',1);
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
INSERT INTO `lote` VALUES ('LC1',NULL,'2018-08-21','colhido',1,'2018-08-23 23:07:31',10),('LC2',NULL,'2018-08-23','colhido',2,'2018-08-24 01:38:31',10),('LF1','','2018-08-20','fornecido',1,'2018-08-23 23:06:45',16);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `num_sementes`
--

LOCK TABLES `num_sementes` WRITE;
/*!40000 ALTER TABLE `num_sementes` DISABLE KEYS */;
INSERT INTO `num_sementes` VALUES (1,'2018-09-26','Mariana',100,200,0.45,'',1,'2018-09-27 01:06:00');
/*!40000 ALTER TABLE `num_sementes` ENABLE KEYS */;
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
  `umidade_media` varchar(10) NOT NULL,
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
INSERT INTO `pesagem_teor_agua` VALUES (1,1,'23','56,67','30,80','69','65',1,'2018-09-27 19:08:43'),(2,2,'23','46,67','40,80','67','65',1,'2018-09-27 19:08:43');
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
  `kg_mil_sementes` float NOT NULL,
  `kg_num_medio` float NOT NULL,
  `obs_peso_mil_sementes` tinytext NOT NULL,
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
INSERT INTO `peso_mil_sementes` VALUES (1,'2018-09-27','Julia',45.01,10.01,'',1,'2018-09-27 22:31:28');
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
  `outras_cultivares` varchar(10) NOT NULL,
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
INSERT INTO `pureza` VALUES (1,'2018-09-26','Mariana','30,23','20,21','10','5','2','-N-',1,'2018-09-27 00:01:19');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repeticao`
--

LOCK TABLES `repeticao` WRITE;
/*!40000 ALTER TABLE `repeticao` DISABLE KEYS */;
INSERT INTO `repeticao` VALUES (1,'R1',2,1),(2,'R2',4,1),(3,'R3',1,1),(4,'R4',2,1),(5,'R1',3,2),(6,'R2',2,2),(7,'R3',1,2),(8,'R4',2,2);
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
  `num_sementes` varchar(10) NOT NULL,
  `peso_amostra` varchar(10) NOT NULL,
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
INSERT INTO `repeticao_mil_sementes` VALUES (1,'R1','10','3,45',1,'2018-09-27 23:26:47'),(2,'R2','10','3,27',1,'2018-09-27 23:26:47'),(3,'R3','10','3,09',1,'2018-09-27 23:26:47'),(4,'R4','10','3,43',1,'2018-09-27 23:26:47');
/*!40000 ALTER TABLE `repeticao_mil_sementes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requerente`
--

DROP TABLE IF EXISTS `requerente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requerente` (
  `idrequerente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_requerente` varchar(45) DEFAULT NULL,
  `num_renasem` varchar(45) DEFAULT NULL,
  `enderecoFK` int(11) DEFAULT NULL,
  `amostraFK` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idrequerente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requerente`
--

LOCK TABLES `requerente` WRITE;
/*!40000 ALTER TABLE `requerente` DISABLE KEYS */;
INSERT INTO `requerente` VALUES (1,'Mariana Xavier','AC-5455745',14,1,'2018-08-24 01:07:12'),(2,'Laura','AC-5455745',15,1,'2018-08-24 16:11:22');
/*!40000 ALTER TABLE `requerente` ENABLE KEYS */;
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
  `amostraFK` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idteor_agua`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teor_agua`
--

LOCK TABLES `teor_agua` WRITE;
/*!40000 ALTER TABLE `teor_agua` DISABLE KEYS */;
INSERT INTO `teor_agua` VALUES (1,'2018-09-27','Mariana','Sem obs',1,'2018-09-27 15:46:58');
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

-- Dump completed on 2018-09-27 19:47:08
