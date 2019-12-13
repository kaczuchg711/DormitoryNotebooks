-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: Dorm
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `Adress`
--

DROP TABLE IF EXISTS `Adress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Adress` (
  `id_adress` int(11) NOT NULL AUTO_INCREMENT,
  `postal_code` varchar(16) DEFAULT NULL,
  `street` varchar(64) DEFAULT NULL,
  `locality` varchar(64) DEFAULT NULL,
  `number` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_adress`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Adress`
--

LOCK TABLES `Adress` WRITE;
/*!40000 ALTER TABLE `Adress` DISABLE KEYS */;
INSERT INTO `Adress` VALUES (1,'42','najlepsza','lepsza','42a');
/*!40000 ALTER TABLE `Adress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Roles`
--

DROP TABLE IF EXISTS `Roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Roles` (
  `id_role` int(6) NOT NULL AUTO_INCREMENT,
  `Role` varchar(32) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Roles`
--

LOCK TABLES `Roles` WRITE;
/*!40000 ALTER TABLE `Roles` DISABLE KEYS */;
INSERT INTO `Roles` VALUES (1,'normal_user');
/*!40000 ALTER TABLE `Roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User_details`
--

DROP TABLE IF EXISTS `User_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User_details` (
  `id_user_details` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `id_address` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user_details`),
  KEY `User_details` (`id_address`),
  CONSTRAINT `User_details_ibfk_1` FOREIGN KEY (`id_address`) REFERENCES `Adress` (`id_adress`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_details`
--

LOCK TABLES `User_details` WRITE;
/*!40000 ALTER TABLE `User_details` DISABLE KEYS */;
INSERT INTO `User_details` VALUES (1,'Cezary','Cezary','+48666888555',1);
/*!40000 ALTER TABLE `User_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `created_at` date NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_user_details` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `Users_Roles_id_role_fk` (`id_role`),
  KEY `id_user_details` (`id_user_details`),
  CONSTRAINT `Users_Roles_id_role_fk` FOREIGN KEY (`id_role`) REFERENCES `Roles` (`id_role`),
  CONSTRAINT `id_user_details` FOREIGN KEY (`id_user_details`) REFERENCES `User_details` (`id_user_details`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'malpa@malpa.pl','malpa','haslo','pieprz','2019-12-12',1,1);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-13 21:51:14
