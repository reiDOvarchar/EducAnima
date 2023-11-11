CREATE DATABASE  IF NOT EXISTS `educanima` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `educanima`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: educanima
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Aventura','Azul'),(2,'Drama','Azul'),(3,'Suspense','Azul'),(4,'Literatura','Laranja'),(5,'Biologia','Vermelho'),(6,'Química','Vermelho'),(7,'Física','Vermelho'),(8,'Matemática','Vermelho'),(9,'Letras','Laranja'),(10,'Infantil','Verde'),(11,'Línguas Estrangeiras','Laranja'),(12,'Fantasia','Azul'),(13,'Artes','Vermelho'),(14,'História','Vermelho'),(15,'Geografia','Vermelho'),(16,'Ciências','Vermelho'),(17,'Comédia','Azul'),(18,'Terror','Azul'),(19,'Ação','Azul'),(20,'Culinária','Laranja'),(21,'Costura','Laranja'),(22,'Programação','Laranja'),(23,'Informática','Laranja'),(24,'Engenharia','Laranja'),(25,'Astronomia','Laranja'),(26,'Educação Física','Vermelho'),(27,'Nutrição','Laranja'),(28,'Filosofia','Vermelho'),(29,'Sociologia','Vermelho'),(30,'Psicologia','Laranja'),(31,'Economia','Laranja'),(32,'Ecologia','Laranja'),(33,'Dança','Laranja'),(34,'Música','Laranja'),(35,'Design','Laranja'),(36,'Jornalismo','Laranja'),(37,'Arquitetura','Laranja'),(38,'Publicidade','Laranja'),(39,'Religião','Laranja'),(40,'Amizade','Verde'),(41,'Companheirismo','Verde'),(42,'Altruísmo','Verde'),(43,'Amor','Verde'),(44,'Solidariedade','Verde'),(45,'Ética','Verde'),(46,'LGBTQIA+','Verde'),(47,'Ficção Ciêntifica','Azul'),(48,'Romance','Azul'),(49,'Documentário','Azul'),(50,'Vida Cotidiana','Verde');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-11 20:25:44
