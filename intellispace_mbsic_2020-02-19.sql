# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: intellispace_mbsic
# Generation Time: 2020-02-19 23:09:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table classes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `teacher` varchar(512) DEFAULT NULL,
  `class` varchar(512) DEFAULT NULL,
  `period` varchar(32) DEFAULT NULL,
  `description` text,
  `time` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;

INSERT INTO `classes` (`id`, `teacher`, `class`, `period`, `description`, `time`)
VALUES
	(9,'Mr. Roberts','Physics','Period 4','Hollywood physics projects','07:42 AM');

/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table setup
# ------------------------------------------------------------

DROP TABLE IF EXISTS `setup`;

CREATE TABLE `setup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system_name` varchar(512) DEFAULT NULL,
  `system_theme` varchar(8) DEFAULT NULL,
  `system_pages` varchar(512) DEFAULT NULL,
  `system_version` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `setup` WRITE;
/*!40000 ALTER TABLE `setup` DISABLE KEYS */;

INSERT INTO `setup` (`id`, `system_name`, `system_theme`, `system_pages`, `system_version`)
VALUES
	(1,'Mt. Blue Success & Innovation Center','dark','students, classes, tools','2.0');

/*!40000 ALTER TABLE `setup` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table students
# ------------------------------------------------------------

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `grade` varchar(32) DEFAULT NULL,
  `class` varchar(512) DEFAULT NULL,
  `teacher` varchar(512) DEFAULT NULL,
  `period` varchar(32) DEFAULT NULL,
  `time` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;

INSERT INTO `students` (`id`, `name`, `grade`, `class`, `teacher`, `period`, `time`)
VALUES
	(21,'Matthew Gallant','Senior','Physics','Mr. Roberts','Period 5','12/29/2019 20:20 PM'),
	(22,'Matt Gallant','Senior','English','Mr Roberto','Period 3','12/29/2019 20:24 PM'),
	(23,'Jacob Mealey','Junior','Algebra II','Ms. Arnold','Period 3','01/03/2020 17:45 PM'),
	(24,'Test','Freshman','Tes','Tes','Period 1','01/03/2020 17:46 PM'),
	(25,'Johnny Boy','Sophomore','Yup','Mr. Taylor','Period 2','01/17/2020 10:32 AM');

/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table toolout
# ------------------------------------------------------------

DROP TABLE IF EXISTS `toolout`;

CREATE TABLE `toolout` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `asset` int(6) DEFAULT NULL,
  `time` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

LOCK TABLES `toolout` WRITE;
/*!40000 ALTER TABLE `toolout` DISABLE KEYS */;

INSERT INTO `toolout` (`id`, `name`, `asset`, `time`)
VALUES
	(29,'Matthew Gallant',111222,'12/27/2019 10:27 AM'),
	(30,'Jacob Mealey',333444,'12/27/2019 10:28 AM'),
	(31,'Matthew Gallant',111222,'12/29/2019 20:22 PM'),
	(32,'Matt Gallant',111222,'12/29/2019 20:23 PM'),
	(33,'Matt G',111222,'01/03/2020 18:43 PM');

/*!40000 ALTER TABLE `toolout` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tools
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tools`;

CREATE TABLE `tools` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `asset` int(6) DEFAULT NULL,
  `possesion` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

LOCK TABLES `tools` WRITE;
/*!40000 ALTER TABLE `tools` DISABLE KEYS */;

INSERT INTO `tools` (`id`, `name`, `asset`, `possesion`)
VALUES
	(1,'Dremel Kit',111222,'Matt G'),
	(13,'Raspberry Pi 4',333444,NULL);

/*!40000 ALTER TABLE `tools` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
