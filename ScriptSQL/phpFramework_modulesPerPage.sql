-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: phpFramework
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

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
-- Table structure for table `modulesPerPage`
--

DROP TABLE IF EXISTS `modulesPerPage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulesPerPage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idModule` varchar(45) DEFAULT NULL,
  `idPage` varchar(45) DEFAULT NULL,
  `orderInPage` varchar(45) DEFAULT NULL,
  `css` varchar(45) DEFAULT NULL,
  `action` varchar(45) NOT NULL DEFAULT 'acaoPadrao',
  `parameters` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulesPerPage`
--

LOCK TABLES `modulesPerPage` WRITE;
/*!40000 ALTER TABLE `modulesPerPage` DISABLE KEYS */;
INSERT INTO `modulesPerPage` VALUES (1,'4','1','1','header','default',NULL),(2,'2','1','2',NULL,'default','{  \"idMenu\": 1}'),(3,'1','1','3',NULL,'default',NULL),(4,'5','1','4','footer','default',NULL),(5,'4','2','1','header','default',NULL),(6,'1','2','2',NULL,'default',NULL),(7,'5','2','3','footer','default',NULL),(8,'4','3','1','header','default',NULL),(9,'2','3','2','menu','default',NULL),(10,'6','3','3','conteudo contacts','default',NULL),(11,'5','3','4','footer','default',NULL);
/*!40000 ALTER TABLE `modulesPerPage` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-10 17:32:49
