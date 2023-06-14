-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: journal_schema
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `Name` varchar(100) DEFAULT NULL,
  `Beginning` varchar(100) DEFAULT NULL,
  `Category` varchar(100) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `parents`
--

DROP TABLE IF EXISTS `parents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `family` varchar(100) DEFAULT NULL,
  `student_class` varchar(100) DEFAULT NULL,
  `student_class_number` int(11) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `family_name` varchar(45) DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  `class_number` int(11) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
<<<<<<<< HEAD:sql/latest.sql
  `Absences_english` int(11) DEFAULT 0,
  `Absences_math` int(11) NOT NULL DEFAULT 0,
  `Absences_bulgarian` int(11) NOT NULL DEFAULT 0,
  `Absences_programming` int(11) NOT NULL DEFAULT 0,
  `Absences_pe` int(11) NOT NULL DEFAULT 0,
  `Absences_music` int(11) NOT NULL DEFAULT 0,
========
  `Absences_english` int(11) DEFAULT NULL,
  `Absences_math` int(11) NOT NULL,
  `Absences_bulgarian` int(11) NOT NULL,
  `Absences_programming` int(11) NOT NULL,
  `Absences_pe` int(11) NOT NULL,
  `Absences_music` int(11) NOT NULL,
>>>>>>>> 856d563bb724700c97a557cfe46b1efd5cbf60bf:sql/dump-journal_schema-202305302131.sql
  `English` int(11) DEFAULT NULL,
  `Math` int(11) DEFAULT NULL,
  `Bulgarian` int(11) DEFAULT NULL,
  `Programming` int(11) DEFAULT NULL,
  `Physical Education(PE)` int(11) DEFAULT NULL,
  `Music` int(11) DEFAULT NULL,
<<<<<<<< HEAD:sql/latest.sql
  `Database` int(11) DEFAULT NULL,
  `Absences_database` int(11) DEFAULT 0,
  `Software` int(11) DEFAULT NULL,
  `Absences_software` int(11) DEFAULT 0,
  `Web` int(11) DEFAULT NULL,
  `Absences_web` int(11) DEFAULT 0,
  `Systems` int(11) DEFAULT NULL,
  `Absences_systems` int(11) DEFAULT 0,
  `Mop` int(11) DEFAULT NULL,
  `Absences_mop` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
========
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
>>>>>>>> 856d563bb724700c97a557cfe46b1efd5cbf60bf:sql/dump-journal_schema-202305302131.sql
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(100) DEFAULT NULL,
  `English` varchar(100) DEFAULT NULL,
  `Bulgarian` varchar(100) DEFAULT NULL,
  `Math` varchar(100) DEFAULT NULL,
  `Programming` varchar(100) DEFAULT NULL,
  `Physical Education(PE)` varchar(100) DEFAULT NULL,
  `Music` varchar(100) DEFAULT NULL,
  `Database` varchar(100) DEFAULT NULL,
  `Software` varchar(100) DEFAULT NULL,
  `Web` varchar(100) DEFAULT NULL,
  `Systems` varchar(100) DEFAULT NULL,
  `Mop` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `family_name` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `class_teacher` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'journal_schema'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

<<<<<<<< HEAD:sql/latest.sql
-- Dump completed on 2023-06-07  9:28:28
========
-- Dump completed on 2023-05-30 21:31:19
>>>>>>>> 856d563bb724700c97a557cfe46b1efd5cbf60bf:sql/dump-journal_schema-202305302131.sql
