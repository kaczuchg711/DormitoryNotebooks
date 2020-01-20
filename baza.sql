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
-- Table structure for table `Flats`
--

DROP TABLE IF EXISTS `Flats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Flats` (
  `id_flat` int(5) NOT NULL AUTO_INCREMENT,
  `number` varchar(5) NOT NULL,
  `number_of_people` int(2) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_flat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Flats`
--

LOCK TABLES `Flats` WRITE;
/*!40000 ALTER TABLE `Flats` DISABLE KEYS */;
INSERT INTO `Flats` VALUES (0,'000',NULL,NULL),(3,'306',4,'f'),(4,'206',2,'m'),(5,'102',1,'f'),(6,'002',1,'f'),(7,'208',2,'f');
/*!40000 ALTER TABLE `Flats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `FullUserInfo`
--

DROP TABLE IF EXISTS `FullUserInfo`;
/*!50001 DROP VIEW IF EXISTS `FullUserInfo`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `FullUserInfo` AS SELECT 
 1 AS `id_user`,
 1 AS `login`,
 1 AS `email`,
 1 AS `password`,
 1 AS `name`,
 1 AS `surname`,
 1 AS `number`,
 1 AS `Role`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Laundries`
--

DROP TABLE IF EXISTS `Laundries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Laundries` (
  `id_laundry` int(2) NOT NULL AUTO_INCREMENT,
  `number` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_laundry`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Laundries`
--

LOCK TABLES `Laundries` WRITE;
/*!40000 ALTER TABLE `Laundries` DISABLE KEYS */;
INSERT INTO `Laundries` VALUES (4,1),(5,2),(6,3);
/*!40000 ALTER TABLE `Laundries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Laundries_logs`
--

DROP TABLE IF EXISTS `Laundries_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Laundries_logs` (
  `id_laundries_logs` int(2) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `start_time_occupancy` time DEFAULT NULL,
  `end_time_occupancy` time DEFAULT NULL,
  `id_laundry` int(2) DEFAULT NULL,
  `id_occupying_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_laundries_logs`),
  KEY `id_occupying_user` (`id_occupying_user`),
  KEY `id_laundry` (`id_laundry`),
  CONSTRAINT `id_laundry` FOREIGN KEY (`id_laundry`) REFERENCES `Laundries` (`id_laundry`),
  CONSTRAINT `id_occupying_user` FOREIGN KEY (`id_occupying_user`) REFERENCES `Users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Laundries_logs`
--

LOCK TABLES `Laundries_logs` WRITE;
/*!40000 ALTER TABLE `Laundries_logs` DISABLE KEYS */;
INSERT INTO `Laundries_logs` VALUES (213,'2020-01-19','16:59:44','16:59:45',4,8),(214,'2020-01-19','17:04:22','17:04:22',4,8),(215,'2020-01-19','21:32:28','21:32:38',4,5),(216,'2020-01-20','17:36:53','17:36:54',4,5),(217,'2020-01-20','18:26:47','18:26:51',4,17),(218,'2020-01-20','18:27:12','18:27:12',4,5),(219,'2020-01-20','18:45:46','18:45:46',4,5),(220,'2020-01-20','18:53:07','18:53:07',4,5);
/*!40000 ALTER TABLE `Laundries_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `Laundries_logs_view`
--

DROP TABLE IF EXISTS `Laundries_logs_view`;
/*!50001 DROP VIEW IF EXISTS `Laundries_logs_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `Laundries_logs_view` AS SELECT 
 1 AS `date`,
 1 AS `name`,
 1 AS `surname`,
 1 AS `number`,
 1 AS `start_time_occupancy`,
 1 AS `end_time_occupancy`,
 1 AS `lnumber`*/;
SET character_set_client = @saved_cs_client;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Roles`
--

LOCK TABLES `Roles` WRITE;
/*!40000 ALTER TABLE `Roles` DISABLE KEYS */;
INSERT INTO `Roles` VALUES (1,'normal_user'),(2,'admin');
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
  `name` varchar(64) CHARACTER SET latin1 NOT NULL,
  `surname` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_user_details`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_details`
--

LOCK TABLES `User_details` WRITE;
/*!40000 ALTER TABLE `User_details` DISABLE KEYS */;
INSERT INTO `User_details` VALUES (16,'Kinga','Kawior','+99(32)7654938'),(17,'Tymoteusz','Sikorski','+34 307 739 1296'),(18,'Zofia','Włodarczyk','947016202'),(19,'Zofia','Kaczmarek','+55(76)6725511'),(20,'Malwina','Marciniak','+42 730 748 2492'),(21,'Dominika','Baranowska','054 817 335'),(22,'Weronika','Sobczak','+94 985 145 7600'),(23,'Aleksandra','Kołodziej','084316973'),(24,'Izabela','Kołodziej','(24) 295 05 30'),(25,'Wiktor','Rutkowski','+78(34)0464504'),(26,'Admin',NULL,NULL);
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
  `id_user_flat` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `Users_email_uindex` (`email`),
  UNIQUE KEY `Users_login_uindex` (`login`),
  KEY `Users_Roles_id_role_fk` (`id_role`),
  KEY `id_user_details` (`id_user_details`),
  KEY `id_user_flat` (`id_user_flat`),
  CONSTRAINT `Users_Roles_id_role_fk` FOREIGN KEY (`id_role`) REFERENCES `Roles` (`id_role`),
  CONSTRAINT `id_user_details` FOREIGN KEY (`id_user_details`) REFERENCES `User_details` (`id_user_details`),
  CONSTRAINT `id_user_flat` FOREIGN KEY (`id_user_flat`) REFERENCES `Flats` (`id_flat`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (5,'user1@user1.com','user1','pas1','sfdsf','2020-01-05',1,16,3),(8,'user2@user2.com','user2','pas2','sdfsdfgsdg','2020-01-01',1,17,4),(9,'user3@user3.com','user3','pas3','dgfsdffgsd','2020-01-02',1,18,3),(10,'user4@user4.com','user4','pas4','sdgdsgf','2020-01-03',1,19,3),(11,'user5@user5.com','user5','pas5','dfgdsg','2020-01-02',1,20,3),(12,'user6@user6.com','user6','pas6','dgdsg','2020-01-04',1,21,5),(13,'user7@user7.com','user7','pas7','dsfgdfg','2020-01-02',1,22,6),(14,'user8@user8.com','user8','pas8','sdgsdg','2020-01-03',1,23,7),(15,'user9@user9.com','user9','pas9','sdgdsgf','2020-01-01',1,24,7),(16,'user10@user10.com','user10','pas10','sdgfdg','2020-01-05',1,25,4),(17,'admin@admin.com','admin','admin','sdgfdsg','2020-01-01',2,26,0);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`tkacza`@`localhost`*/ /*!50003 TRIGGER clear_log_befor_user_del
    Before DELETE
    ON Users
    FOR EACH ROW
BEGIN
    UPDATE Laundries_logs
    set Laundries_logs.id_occupying_user = null
    where Laundries_logs.id_occupying_user = old.id_user;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`tkacza`@`localhost`*/ /*!50003 TRIGGER clear_userdetails_after_user_del
    after DELETE
    ON Users
    FOR EACH ROW
BEGIN
    DELETE FROM User_details
    WHERE (Old.id_user_details = User_details.id_user_details);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `FullUserInfo`
--

/*!50001 DROP VIEW IF EXISTS `FullUserInfo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`tkacza`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `FullUserInfo` AS select `Users`.`id_user` AS `id_user`,`Users`.`login` AS `login`,`Users`.`email` AS `email`,`Users`.`password` AS `password`,`User_details`.`name` AS `name`,`User_details`.`surname` AS `surname`,`Flats`.`number` AS `number`,`Roles`.`Role` AS `Role` from (((`Users` join `User_details`) join `Flats`) join `Roles`) where ((`Users`.`id_user_details` = `User_details`.`id_user_details`) and (`Users`.`id_user_flat` = `Flats`.`id_flat`) and (`Users`.`id_role` = `Roles`.`id_role`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Laundries_logs_view`
--

/*!50001 DROP VIEW IF EXISTS `Laundries_logs_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`tkacza`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `Laundries_logs_view` AS select `Laundries_logs`.`date` AS `date`,`User_details`.`name` AS `name`,`User_details`.`surname` AS `surname`,`Flats`.`number` AS `number`,`Laundries_logs`.`start_time_occupancy` AS `start_time_occupancy`,`Laundries_logs`.`end_time_occupancy` AS `end_time_occupancy`,`Laundries`.`number` AS `lnumber` from ((((`Laundries_logs` join `User_details`) join `Flats`) join `Laundries`) join `Users`) where ((`Laundries_logs`.`id_laundry` = `Laundries`.`id_laundry`) and (`Laundries_logs`.`id_occupying_user` = `Users`.`id_user`) and (`Users`.`id_user_details` = `User_details`.`id_user_details`) and (`Users`.`id_user_flat` = `Flats`.`id_flat`)) order by `Laundries_logs`.`id_laundries_logs` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-20 21:48:10
