-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: tecwebdb
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `parId` int(11) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (100,'Auto',0),(200,'Informatica',0),(300,'Elettronica',0),(400,'Abbigliamento',0),(500,'Alimentari',0);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `companyid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `img` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`companyid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'BMW','bmw@gmail.com','www.bmw.it','10000222','','Auto','aaaaaa',NULL),(2,'Audi','bmw@gmail.com','www.bmw.it','10000222','','Auto','aaaaaa',NULL),(3,'Fiat','bmw@gmail.com','www.bmw.it','10000222','','Auto','aaaaaa',NULL),(4,'Microsoft','bmw@gmail.com','www.bmw.it','10000222','','Informatica','aaaaaa',NULL),(5,'Google','bmw@gmail.com','www.bmw.it','10000222','','Informatica','aaaaaa',NULL),(6,'Samsung','bmw@gmail.com','www.bmw.it','10000222','','Elettronica','aaaaaa',NULL),(7,'LG','bmw@gmail.com','www.bmw.it','10000222','','Elettronica','aaaaaa',NULL),(8,'D&G','bmw@gmail.com','www.bmw.it','10000222','','Abbigliamento','aaaaaa',NULL),(9,'Armani Jeans','bmw@gmail.com','www.bmw.it','10000222','','Abbigliamento','aaaaaa',NULL),(10,'Nike','bmw@gmail.com','www.bmw.it','10000222','','Abbigliamento','aaaaaa',NULL),(11,'Supermercato Si','bmw@gmail.com','www.bmw.it','10000222','','Alimentari','aaaaaa',NULL),(12,'Coop','bmw@gmail.com','www.bmw.it','10000222','','Alimentari','aaaaaa',NULL);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupon` (
  `couponId` int(11) NOT NULL,
  `promoId` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`couponId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon`
--

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promotion` (
  `promoid` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(30) NOT NULL,
  `datebegin` date DEFAULT NULL,
  `datefine` date NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`promoid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotion`
--

LOCK TABLES `promotion` WRITE;
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
INSERT INTO `promotion` VALUES (1,'BMW','2008-11-11','2008-12-11','Auto','OLOLOLOLOLOLO',12,'Promotions/Auto/Bmw/img1.jpg'),(2,'BMW','2008-11-11','2008-12-11','Auto','OLOLOLOLOLOLO',12,'Promotions/Auto/Bmw/img2.jpg'),(3,'BMW','2008-11-11','2008-12-11','Auto','OLOLOLOLOLOLO',12,'Promotions/Auto/Bmw/img3.jpg'),(4,'Audi','2008-11-11','2008-12-11','Auto','OLOLOLOLOLOLO',12,'Promotions/Auto/Audi/img1.jpg'),(5,'Audi','2008-11-11','2008-12-11','Auto','OLOLOLOLOLOLO',12,'Promotions/Auto/Audi/img2.jpg'),(6,'Audi','2008-11-11','2008-12-11','Auto','OLOLOLOLOLOLO',12,'Promotions/Auto/Audi/img3.jpg');
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin0','admin0',0,'','','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-06 15:27:54
