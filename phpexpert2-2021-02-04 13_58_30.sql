-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for phpexpert2
CREATE DATABASE IF NOT EXISTS `phpexpert2` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `phpexpert2`;

-- Dumping structure for table phpexpert2.fietsen
CREATE TABLE IF NOT EXISTS `fietsen` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `merk` text NOT NULL,
  `model` text NOT NULL,
  `type` text NOT NULL,
  `kleur` text NOT NULL,
  `soortRem` text NOT NULL,
  `klantid` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_fietsen_klanten` (`klantid`),
  CONSTRAINT `FK_fietsen_klanten` FOREIGN KEY (`klantid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table phpexpert2.fietsen: ~0 rows (approximately)
/*!40000 ALTER TABLE `fietsen` DISABLE KEYS */;
/*!40000 ALTER TABLE `fietsen` ENABLE KEYS */;

-- Dumping structure for table phpexpert2.medewerkers --old
CREATE TABLE IF NOT EXISTS `medewerkers --old` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `voornaam` text NOT NULL,
  `achternaam` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefoonnummer` varchar(10) NOT NULL,
  `wachtwoord` varchar(50) NOT NULL,
  `rol` int(1) NOT NULL DEFAULT 2 COMMENT '1=Klant\r\n2=Medewerker',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table phpexpert2.medewerkers --old: ~2 rows (approximately)
/*!40000 ALTER TABLE `medewerkers --old` DISABLE KEYS */;
INSERT INTO `medewerkers --old` (`id`, `voornaam`, `achternaam`, `email`, `telefoonnummer`, `wachtwoord`, `rol`) VALUES
	(1, 'Snelle', 'Jelle', 'snelle@jelle.nl', '0612345678', 'SnelleJelle1', 2),
	(2, 'Hallo', 'Coinmerce', 'info@coinmerce.nl', '0687654321', 'coinmerce456', 2);
/*!40000 ALTER TABLE `medewerkers --old` ENABLE KEYS */;

-- Dumping structure for table phpexpert2.reparaties
CREATE TABLE IF NOT EXISTS `reparaties` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `titel` text NOT NULL,
  `datum` date NOT NULL,
  `tijdstip` text NOT NULL,
  `opmerkingen` text NOT NULL,
  `kosten` varchar(10) NOT NULL DEFAULT '0',
  `fietsid` int(3) DEFAULT NULL,
  `klantid` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_reparaties_fietsen` (`fietsid`),
  KEY `FK_reparaties_klanten` (`klantid`),
  CONSTRAINT `FK_reparaties_fietsen` FOREIGN KEY (`fietsid`) REFERENCES `fietsen` (`id`),
  CONSTRAINT `FK_reparaties_klanten` FOREIGN KEY (`klantid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table phpexpert2.reparaties: ~0 rows (approximately)
/*!40000 ALTER TABLE `reparaties` DISABLE KEYS */;
/*!40000 ALTER TABLE `reparaties` ENABLE KEYS */;

-- Dumping structure for table phpexpert2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `voornaam` text NOT NULL,
  `achternaam` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefoonnummer` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` int(1) NOT NULL DEFAULT 1 COMMENT '1=Klant\r\n2=Medewerker',
  `contact` tinytext NOT NULL COMMENT 'SMS of Whatsapp',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table phpexpert2.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `email`, `telefoonnummer`, `password`, `rol`, `contact`) VALUES
	(1, 'Rien', 'Post', 'rien@rienpost.nl', '0612345678', '$2y$12$TUv1ktvuV1xUDSKD33nSv.1j5hUlmvB2iCQIEzQgr27gOLsuqQiWS', 1, 'SMS'),
	(2, 'Max', 'Middendorp', 'max.middendorp@outlook.com', '0612345678', '$2y$12$Yud1vJI7/goQrPyI8iW8p.j0JIEld1dWRRb5gOcqjB4x3a6KjXcsC', 2, 'Whatsapp');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
