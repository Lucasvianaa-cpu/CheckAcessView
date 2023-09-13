-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: checkacessview
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `categoria_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Categorias_Cargo_idx` (`categoria_id`),
  CONSTRAINT `categoria_cargo` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'N1','BBBB',2),(2,'Supervisor','Supervisor de T.I',3),(3,'Gerente','Gerente',2),(4,'b','A',3);
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `is_active` tinyint DEFAULT '1',
  `is_trash` tinyint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (2,'Suporte','AAAAAAAAAAAAAA',1,1),(3,'A','A',1,0);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidades`
--

DROP TABLE IF EXISTS `cidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `cod_ibge` int NOT NULL,
  `estado_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `estado_cidade_idx` (`estado_id`),
  CONSTRAINT `cidade_estado` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidades`
--

LOCK TABLES `cidades` WRITE;
/*!40000 ALTER TABLE `cidades` DISABLE KEYS */;
INSERT INTO `cidades` VALUES (1,'Birigui',1,1),(2,'Araçatuba',1,1),(3,'AAAA',2856185,1);
/*!40000 ALTER TABLE `cidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(200) NOT NULL,
  `nome_fantasia` varchar(200) NOT NULL,
  `cnpj` varchar(15) NOT NULL,
  `ie` varchar(15) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `qtd_funcionarios` int NOT NULL,
  `desc_empresa` varchar(200) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint DEFAULT '1',
  `caminho_foto` varchar(245) DEFAULT NULL,
  `is_trash` tinyint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'emp teste','emp teste','1111111111111','11','11','a','a','1','1',1,'a','2023-08-01 19:28:13',1,'',0),(2,'Luquinha','Empresa Luquinha','2525252525','25','25','a','a','1','1',1,'a','2023-08-16 21:35:25',1,NULL,0);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enderecos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rua` varchar(200) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `cidade_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cidade_endereço_idx` (`cidade_id`),
  KEY `endereco_user_idx` (`user_id`),
  CONSTRAINT `endereco_cidade` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`),
  CONSTRAINT `endereco_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` VALUES (7,'Rua São Benedito','Jd. Klayton','1270','16203039',1,3),(8,'RUA X','X','7','16203039',1,10),(9,'262161216','262161216','26216121','262161216',2,26),(10,'sadas','sadas','1','1',1,9);
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipamentos`
--

DROP TABLE IF EXISTS `equipamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_patrimonio` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `is_active` tinyint DEFAULT '1',
  `created` varchar(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  `funcionario_id` int NOT NULL,
  `is_trash` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `equipamento_funcionario_idx` (`funcionario_id`),
  CONSTRAINT `equipamento_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipamentos`
--

LOCK TABLES `equipamentos` WRITE;
/*!40000 ALTER TABLE `equipamentos` DISABLE KEYS */;
INSERT INTO `equipamentos` VALUES (3,'1515','AAA',1,'8/1/23, 11:53 PM',5,0);
/*!40000 ALTER TABLE `equipamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sigla` char(2) NOT NULL,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'SP','São Paulo');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `salario` decimal(12,2) NOT NULL,
  `cargo_id` int NOT NULL,
  `is_active` tinyint DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `plano_saude_id` int DEFAULT NULL,
  `empresa_id` int NOT NULL,
  `user_id` int NOT NULL,
  `is_trash` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `funcionario_cargo_idx` (`cargo_id`),
  KEY `funcionario_plano_idx` (`plano_saude_id`),
  KEY `funcionarios_empresa_idx` (`empresa_id`),
  KEY `funcionarios_id_idx` (`user_id`),
  CONSTRAINT `funcionario_cargo` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`),
  CONSTRAINT `funcionarios_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
  CONSTRAINT `funcionarios_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `funcionarios_plano` FOREIGN KEY (`plano_saude_id`) REFERENCES `planos_saudes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES (5,120.00,2,1,'2023-01-01 00:00:00',1,1,3,0),(6,1000.00,2,1,'2023-02-01 00:00:00',1,1,7,0),(7,1200.00,2,1,'2023-02-02 00:00:00',1,1,8,0),(8,1200.00,2,1,'2023-03-01 00:00:00',1,1,9,0),(9,1000.00,1,1,'2023-04-01 00:00:00',1,1,10,0),(10,1000.00,1,1,'2023-05-01 00:00:00',1,1,11,0),(11,1000.00,1,1,'2023-05-01 00:00:00',1,1,14,0),(12,200.00,1,1,'2023-06-01 00:00:00',1,2,6,0),(13,1.00,1,1,'2023-07-01 00:00:00',1,2,6,0),(14,2050.00,1,1,'2023-08-07 00:00:00',1,2,6,0),(15,2050.00,1,1,'2023-09-01 00:00:00',1,2,6,0),(16,5000.00,1,0,'2023-10-01 00:00:00',1,2,6,0),(17,25.00,3,1,'2023-11-01 00:00:00',1,1,21,0),(18,1000.00,1,1,'2023-12-01 00:00:00',1,2,23,0);
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios_plantoes`
--

DROP TABLE IF EXISTS `funcionarios_plantoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionarios_plantoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `funcionario_id` int NOT NULL,
  `plantao_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `funcionario_plantao_idx` (`funcionario_id`),
  KEY `funcionario_plantao_1_idx` (`plantao_id`),
  CONSTRAINT `funcionario_plantao` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`),
  CONSTRAINT `plantao_plantao` FOREIGN KEY (`plantao_id`) REFERENCES `plantoes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios_plantoes`
--

LOCK TABLES `funcionarios_plantoes` WRITE;
/*!40000 ALTER TABLE `funcionarios_plantoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionarios_plantoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historicos_pontos`
--

DROP TABLE IF EXISTS `historicos_pontos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historicos_pontos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` varchar(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  `funcionario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `funcionario_ponto_idx` (`funcionario_id`),
  CONSTRAINT `historico_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historicos_pontos`
--

LOCK TABLES `historicos_pontos` WRITE;
/*!40000 ALTER TABLE `historicos_pontos` DISABLE KEYS */;
/*!40000 ALTER TABLE `historicos_pontos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holerites`
--

DROP TABLE IF EXISTS `holerites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `holerites` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_holerite` date NOT NULL,
  `mes` varchar(45) NOT NULL,
  `data_admissao` date NOT NULL,
  `salario_base` decimal(12,2) NOT NULL,
  `base_fgts` decimal(12,2) NOT NULL,
  `base_inss` decimal(12,2) DEFAULT NULL,
  `inss` decimal(12,2) DEFAULT NULL,
  `fgts` decimal(12,2) DEFAULT NULL,
  `ir` decimal(12,2) DEFAULT NULL,
  `total_descontos` decimal(12,2) NOT NULL,
  `total_vencimentos` decimal(12,2) NOT NULL,
  `liquido` decimal(12,2) NOT NULL,
  `created` varchar(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  `funcionario_id` int NOT NULL,
  `salario_checkbox` tinyint DEFAULT NULL,
  `dsr_checkbox` tinyint DEFAULT NULL,
  `adc_sobre_checkbox` tinyint DEFAULT NULL,
  `hr50_checkbox` tinyint DEFAULT NULL,
  `hr80_checkbox` tinyint DEFAULT NULL,
  `hr100_checkbox` tinyint DEFAULT NULL,
  `ferias_checkbox` tinyint DEFAULT NULL,
  `vale_alimentacao_checkbox` tinyint DEFAULT NULL,
  `adiantamento_checkbox` tinyint DEFAULT NULL,
  `salario_codigo` varchar(45) DEFAULT NULL,
  `salario_descricao` varchar(45) DEFAULT NULL,
  `salario_referencia` varchar(45) DEFAULT NULL,
  `salario_vencimento` decimal(12,2) DEFAULT NULL,
  `salario_desconto` decimal(12,2) DEFAULT NULL,
  `dsr_codigo` varchar(45) DEFAULT NULL,
  `dsr_descricao` varchar(45) DEFAULT NULL,
  `dsr_referencia` varchar(45) DEFAULT NULL,
  `dsr_vencimento` decimal(12,2) DEFAULT NULL,
  `dsr_desconto` decimal(12,2) DEFAULT NULL,
  `adc_sobre_codigo` varchar(45) DEFAULT NULL,
  `adc_sobre_descricao` varchar(45) DEFAULT NULL,
  `adc_sobre_referencia` varchar(45) DEFAULT NULL,
  `adc_sobre_vencimento` decimal(12,2) DEFAULT NULL,
  `adc_sobre_desconto` decimal(12,2) DEFAULT NULL,
  `hr50_codigo` varchar(45) DEFAULT NULL,
  `hr50_descricao` varchar(45) DEFAULT NULL,
  `hr50_referencia` varchar(45) DEFAULT NULL,
  `hr50_vencimento` decimal(12,2) DEFAULT NULL,
  `hr50_desconto` decimal(12,2) DEFAULT NULL,
  `hr80_codigo` varchar(45) DEFAULT NULL,
  `hr80_descricao` varchar(45) DEFAULT NULL,
  `hr80_referencia` varchar(45) DEFAULT NULL,
  `hr80_vencimento` decimal(12,2) DEFAULT NULL,
  `hr80_desconto` decimal(12,2) DEFAULT NULL,
  `hr100_codigo` varchar(45) DEFAULT NULL,
  `hr100_descricao` varchar(45) DEFAULT NULL,
  `hr100_referencia` varchar(45) DEFAULT NULL,
  `hr100_vencimento` varchar(45) DEFAULT NULL,
  `hr100_desconto` varchar(45) DEFAULT NULL,
  `ferias_codigo` varchar(45) DEFAULT NULL,
  `ferias_descricao` varchar(45) DEFAULT NULL,
  `ferias_referencia` varchar(45) DEFAULT NULL,
  `ferias_vencimento` decimal(12,2) DEFAULT NULL,
  `ferias_desconto` decimal(12,2) DEFAULT NULL,
  `vale_alimentacao_codigo` varchar(45) DEFAULT NULL,
  `vale_alimentacao_descricao` varchar(45) DEFAULT NULL,
  `vale_alimentacao_referencia` varchar(45) DEFAULT NULL,
  `vale_alimentacao_vencimento` decimal(12,2) DEFAULT NULL,
  `vale_alimentacao_desconto` decimal(12,2) DEFAULT NULL,
  `adiantamento_codigo` varchar(45) DEFAULT NULL,
  `adiantamento_descricao` varchar(45) DEFAULT NULL,
  `adiantamento_referencia` varchar(45) DEFAULT NULL,
  `adiantamento_vencimento` decimal(12,2) DEFAULT NULL,
  `adiantamento_desconto` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `holerite_funcionario_idx` (`funcionario_id`),
  CONSTRAINT `holerite_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holerites`
--

LOCK TABLES `holerites` WRITE;
/*!40000 ALTER TABLE `holerites` DISABLE KEYS */;
INSERT INTO `holerites` VALUES (1,'2023-08-29','','2023-08-01',1000.00,1000.00,1000.00,100.00,100.00,0.00,0.00,0.00,800.00,'9/1/23, 8:18 PM',14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'2023-08-30','','2023-09-01',100.00,100.00,100.00,100.00,100.00,100.00,0.00,0.00,100.00,'9/6/23, 4:52 PM',5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `holerites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planos_saudes`
--

DROP TABLE IF EXISTS `planos_saudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `planos_saudes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `registro` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint DEFAULT '1',
  `is_trash` tinyint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planos_saudes`
--

LOCK TABLES `planos_saudes` WRITE;
/*!40000 ALTER TABLE `planos_saudes` DISABLE KEYS */;
INSERT INTO `planos_saudes` VALUES (1,'111','Unimed','Plano Unimed','1836440000','18988888888','2023-07-31 23:07:56',1,0);
/*!40000 ALTER TABLE `planos_saudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plantoes`
--

DROP TABLE IF EXISTS `plantoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plantoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora_total` time NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_termino` time NOT NULL,
  `funcionario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plantao_funcionario_idx` (`funcionario_id`),
  CONSTRAINT `funcionario_plantoes` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plantoes`
--

LOCK TABLES `plantoes` WRITE;
/*!40000 ALTER TABLE `plantoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `plantoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pontos_horas`
--

DROP TABLE IF EXISTS `pontos_horas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pontos_horas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_ponto` date NOT NULL,
  `hora` time NOT NULL,
  `historico_ponto_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pontohora_historico_idx` (`historico_ponto_id`),
  CONSTRAINT `ponto_historicoponto` FOREIGN KEY (`historico_ponto_id`) REFERENCES `historicos_pontos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pontos_horas`
--

LOCK TABLES `pontos_horas` WRITE;
/*!40000 ALTER TABLE `pontos_horas` DISABLE KEYS */;
/*!40000 ALTER TABLE `pontos_horas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `is_active` tinyint DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descricao` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,1,'2023-07-12 01:25:50','Admin'),(2,1,'2023-07-12 01:26:57','RH'),(3,1,'2023-07-12 21:35:39','Funcionário'),(4,1,'2023-07-12 21:35:39','Convidado');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `is_active` tinyint DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `salario` decimal(12,2) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `tipo_sanguineo` char(3) DEFAULT NULL,
  `exp_profissional` varchar(250) DEFAULT NULL,
  `agencia` varchar(8) DEFAULT NULL,
  `conta` varchar(25) DEFAULT NULL,
  `codigo_banco` varchar(5) DEFAULT NULL,
  `pix` varchar(120) DEFAULT NULL,
  `role_id` int NOT NULL,
  `uid_rfid` varchar(255) DEFAULT NULL,
  `email_empresarial` varchar(120) DEFAULT NULL,
  `n_carteira_trabalho` varchar(45) NOT NULL,
  `realiza_plantao` tinyint DEFAULT NULL,
  `caminho_foto` varchar(256) DEFAULT NULL,
  `is_trash` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `role_user_idx` (`role_id`),
  CONSTRAINT `users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,1,'2023-07-13 00:02:36','Lucas RH','$2y$10$7asiu7.HZQpBM9a3zOk1D.FjOEuS6RaToxBGEzjddU5CXIfovpX76','Viana','4638378323','521218275','lucas1042@live.com','18996666724',1199.99,'2023-07-13','0+','hbfdhgdf','0025','15165','16315','61265269',1,'adadsad','lucas@live.com','adsass',0,'fotos/RH -Viana-1206403349-perfil.png',0),(6,1,'2023-07-19 23:09:10','inutilizavel','$2y$10$CfvCN9v1ADK8mckdhBjH4elrKlU21x.BwO4Fb4uQ1brirlP6yJ/h6',NULL,NULL,NULL,'lucas10422@live.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,'',NULL,NULL,0),(7,1,'2023-08-04 23:08:48','inutilizavel','$2y$10$kEIGrZ6bJ3JZdDh5uEoELum7ZkddRz3YErRbQoD9UK6iJQZMI1MOC',NULL,NULL,NULL,'loise@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,'',NULL,NULL,0),(8,1,'2023-08-10 20:08:05','Admin','$2y$10$B99.THkKuD8s34WSJOvQWejG6USKibD5t9XvLLNF6Fdrzh9vcjwwi','Empresa',NULL,NULL,'admin@admin.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,'',NULL,NULL,0),(9,1,'2023-08-10 20:08:30','Rh','$2y$10$yerdRGxP/Fl5UWj5rRWcie8v.Fi69x2MNCPUbLHjZrdXPy8bW0O/K','Empresa','31515110515','2052100125','rh@rh.com','02236203',NULL,'2001-08-07','O','aa','aa','a','a','aa',2,'aa','aa@aa.com','aaa',0,'',0),(10,1,'2023-08-10 20:08:45','Funcionario','$2y$10$9LKk/GZ0ooh42nPteKkV/uo5wBiNHe74GwaM4CvtbaGfQzNBuR4/.','Empresa','1151515','05215221','funcionario@funcionario.com','185185415841',NULL,NULL,'O','aa','5424','42424','24254','4245',3,'4524','funcionario@funcionario.com','102',1,'fotos/Funcionario-Empresa-358696198-perfil.png',0),(11,1,'2023-08-10 20:09:07','Convidado','$2y$10$B7KZo5c7lE4IdcbcgppbOeiIuSal3HkUSX0JAXibnfOAYGu5KO2jC','Convidado',NULL,NULL,'convidado@convidado.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,'',NULL,NULL,0),(14,1,'2023-08-16 23:21:05','Lucas','$2y$10$chTAQclujbgIBtrPJpYefev0s2GKw/aJoCfqAIIXs/MH5fJOcHKBS','Heideric',NULL,NULL,'lucasrochaheideric@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,'',NULL,NULL,0),(20,1,'2023-08-16 23:47:06','Teste','$2y$10$im2fBK3mlTVcBNZDmAvfeeOml9A.PnE4ANZJVddxXLPptlo9l4qQK','teste1',NULL,NULL,'luckvrodrigues.77@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,'',NULL,NULL,0),(21,1,'2023-08-17 00:46:07','novo','$2y$10$Dk0.KpdGBKFN7ppF/dj9LuEeTYmf8Zdd4HesCd/nxVy7o.630E/IC','novo',NULL,NULL,'novo@novo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,'',NULL,NULL,0),(22,1,'2023-08-21 22:31:58','CONVIDADO','$2y$10$XexAwrQ3TR0WH.4XsKviN.yeX0WN3ckaisujJf2F/d5u1pclLTkWC','NOVO',NULL,NULL,'convidadonovo@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,'',NULL,NULL,0),(23,1,'2023-08-22 18:26:12','Novo','$2y$10$Dgpv9AWON3lPNyVhrEK3HO.FG8l4zgHjBzS0EqjYeqIrWiTHEy/Im','Novinho',NULL,NULL,'novo1@novo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,'',NULL,NULL,0),(24,1,'2023-08-28 16:51:09','Lucas','$2y$10$zDRj2afiyC9d3JMG1DsCf.kwUtUA7U8kUGYuMw0vLOdh1DyiSPUkG','Viana',NULL,NULL,'luskas7@oulook.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL,'',NULL,NULL,0),(25,1,'2023-08-28 17:18:24','Teste','$2y$10$28qaCOrbHFEmVpYSZ89LVObLden87fyG8jZ.iDPxrS5KU1WorN3dS','teste',NULL,NULL,'lvrodrigues7@outlook.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL,'',NULL,NULL,0),(26,1,'2023-08-28 17:43:39','loise','$2y$10$9MFO.sWA.NxTMgf7Nmz9Xu5Umi9ajZXsmSRR2sk49J4glZeWM0n2e','cardoso','6262161216','262161216','loise-cardoso@hotmail.com','262161216',NULL,NULL,'262','262161216','26216121','262161216','26216','262161216',4,'262161216','loise-cardoso@hotmail.com','262161216',0,'fotos/loise-cardoso-597916517-perfil.png',0),(27,1,'2023-09-08 15:08:51','Teste','$2y$10$N.ix5QyZd3j0Jp6cC4E0HuSBJtapX/5nd4p4uwd6W2PZGQi2uvQ6a','1',NULL,NULL,'viana.rodrigues@aluno.ifsp.edu.br',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL,'',NULL,NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `veiculos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `placa` varchar(10) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `cor` varchar(45) NOT NULL,
  `veiculoscol` varchar(45) DEFAULT NULL,
  `created` varchar(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  `is_active` tinyint DEFAULT '1',
  `user_id` int NOT NULL,
  `is_trash` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_veiculo_idx` (`user_id`),
  CONSTRAINT `veiculo_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veiculos`
--

LOCK TABLES `veiculos` WRITE;
/*!40000 ALTER TABLE `veiculos` DISABLE KEYS */;
INSERT INTO `veiculos` VALUES (2,'ERT4787','Classic Chevrolet','Prata',NULL,'8/22/23, 7:24 PM',1,3,0);
/*!40000 ALTER TABLE `veiculos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-13  8:29:23
