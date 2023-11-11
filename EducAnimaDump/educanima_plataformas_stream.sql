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
-- Table structure for table `plataformas_stream`
--

DROP TABLE IF EXISTS `plataformas_stream`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plataformas_stream` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `imagem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plataformas_stream`
--

LOCK TABLES `plataformas_stream` WRITE;
/*!40000 ALTER TABLE `plataformas_stream` DISABLE KEYS */;
INSERT INTO `plataformas_stream` VALUES (1,'Netflix','https://images.ctfassets.net/4cd45et68cgf/Rx83JoRDMkYNlMC9MKzcB/2b14d5a59fc3937afd3f03191e19502d/Netflix-Symbol.png?w=700&h=456'),(2,'Amazon Prime Video','https://m.media-amazon.com/images/I/413+SVFO39L.png'),(3,'HBO Max','https://bolavip.com/__export/1622065453345/sites/bolavip/img/2021/05/26/hbomax_crop1622063474281.jpeg_1159711837.jpeg'),(4,'Star+','https://compras-flash.com/wp-content/uploads/2022/07/nota_disney-tiene-luz-verde-para-utilizar-la-marca-star-en-brasil.jpg'),(5,'Globoplay','https://play-lh.googleusercontent.com/7m-KJKFEg4PfpwWedxo__cPIgmvRXfLSxNUtKTDEqLW1CNy2ibR04q_YqQ1cvKlMfV8'),(6,'Disney+','https://m.media-amazon.com/images/I/712ui3rj1RL.png'),(7,'Paramount+','https://m.media-amazon.com/images/I/31T6d13zC6L.png'),(8,'Apple TV+','https://help.apple.com/assets/64274127E825E363734345E5/64274129E825E363734345ED/pt_BR/e37e16d15410d967fdaa53c95fd79ec0.png'),(9,'Mercado Play','https://gluby.com.br/storage/uploads/blog/posts/20230806_03134080039.jpg'),(10,'Discovery+','https://m.media-amazon.com/images/I/61LVJFXYqaL.png'),(11,'Hulu','https://play-lh.googleusercontent.com/4whGAVjZGrrlNxzheKAfBXrxggtyAb4euWLeQI8fDfVfdnFEZjE0DZTJ8DKoh64pqcIa'),(12,'TeleCine play','https://1.bp.blogspot.com/-4n6FN9Gm6Gc/VvG21TFCJMI/AAAAAAAApOs/nfWzpBCybC4_0yIcpxxmPYRn0FkCDxOGACKgB/w1200-h675-p-k-no-nu/telecine-paly.png'),(13,'Youtube','https://t.ctcdn.com.br/lpNQiPz91T38D4yrgNrj7hbnZUk=/400x400/smart/i612632.png'),(14,'Outros','https://wx.mlcdn.com.br/ponzi/production/portaldalu/47148_00.jpg'),(15,'Claro TV+','https://play-lh.googleusercontent.com/OBIm9Q8m0LIXe5ATomGtddgKVb9FhUooInE-XXqdXXgllmqaLmECnvNC9gYgHS_07Ao'),(16,'Não Possui (Websites)','https://www.intel.com.br/content/dam/www/central-libraries/us/en/images/language-icon-lvl-2-abstract-bg.png.rendition.intel.web.864.486.png'),(17,'Crunchyroll','https://play-lh.googleusercontent.com/CjzbMcLbmTswzCGauGQExkFsSHvwjKEeWLbVVJx0B-J9G6OQ-UCl2eOuGBfaIozFqow'),(18,'Funimation','https://play-lh.googleusercontent.com/ZZ8itZF6mpDMlVk8v-PUXTVwQR63ESYz--gNYMkh3bUQ1uRjdpM1Al9X85SRH4-ODpE');
/*!40000 ALTER TABLE `plataformas_stream` ENABLE KEYS */;
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
