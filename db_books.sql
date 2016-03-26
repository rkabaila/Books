-- MySQL dump 10.14  Distrib 5.5.48-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: books
-- ------------------------------------------------------
-- Server version	5.5.48-MariaDB-1~trusty

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
-- Table structure for table `Authors`
--

DROP TABLE IF EXISTS `Authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Authors` (
  `authorId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`authorId`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Authors`
--

LOCK TABLES `Authors` WRITE;
/*!40000 ALTER TABLE `Authors` DISABLE KEYS */;
INSERT INTO `Authors` VALUES (1,'Chris Smith'),(2,'Steven Levithan'),(3,'Jan Goyvaerts'),(4,'Ryan Benedetti'),(5,'Al Anderson'),(6,'Clay Breshears'),(7,'Kevlin Henney'),(8,'Džekas Londonas'),(9,'Leo Angart'),(10,'Edmondo de Amicis'),(11,'A.Eidintas'),(12,'A.Andrijanova'),(13,'S.Vilkienė'),(14,'Jay Greenspan'),(15,'Brad Bulger'),(16,'Salomėja Nėris');
/*!40000 ALTER TABLE `Authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Authors_Books`
--

DROP TABLE IF EXISTS `Authors_Books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Authors_Books` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `authorId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Authors_Books`
--

LOCK TABLES `Authors_Books` WRITE;
/*!40000 ALTER TABLE `Authors_Books` DISABLE KEYS */;
INSERT INTO `Authors_Books` VALUES (1,1,1),(2,2,2),(3,4,3),(4,6,4),(5,7,5),(6,8,6),(7,9,7),(8,10,8),(9,11,9),(10,12,10),(11,13,10),(12,14,11),(13,15,11),(14,16,12),(15,16,13);
/*!40000 ALTER TABLE `Authors_Books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Books`
--

DROP TABLE IF EXISTS `Books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Books` (
  `bookId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `year` year(4) DEFAULT NULL,
  `genreId` int(11) DEFAULT NULL,
  PRIMARY KEY (`bookId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Books`
--

LOCK TABLES `Books` WRITE;
/*!40000 ALTER TABLE `Books` DISABLE KEYS */;
INSERT INTO `Books` VALUES (1,'Programming F# 3.0, 2nd Edition',2012,1),(2,'Regular Expressions Cookbook, 2nd Edition',2012,1),(3,'Head First Networking',2009,1),(4,'The Art of Concurrency',2009,1),(5,'97 Things Every Programmer Should Know',2010,1),(6,'Baltoji Iltis',1992,2),(7,'Tausok sveikatą dirbdamas kompiuteriu',2006,3),(8,'Širdis',2011,2),(9,'Antanas Smetona',1990,4),(10,'Garsų tarimas',1990,1),(11,'MySQL/PHP Database Applications',2001,1),(12,'Kaip žydėjimas vyšnios',1978,5),(13,'Prie didelio kelio',1995,5);
/*!40000 ALTER TABLE `Books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Genres`
--

DROP TABLE IF EXISTS `Genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Genres` (
  `genreId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`genreId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Genres`
--

LOCK TABLES `Genres` WRITE;
/*!40000 ALTER TABLE `Genres` DISABLE KEYS */;
INSERT INTO `Genres` VALUES (1,'Scientific literature'),(2,'Novel'),(3,'Health'),(4,'Biography'),(5,'Poetry');
/*!40000 ALTER TABLE `Genres` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-26 14:13:04
