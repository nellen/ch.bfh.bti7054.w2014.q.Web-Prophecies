-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               5.6.20 - MySQL Community Server (GPL)
-- Server Betriebssystem:        Win32
-- HeidiSQL Version:             8.2.0.4675
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Exportiere Datenbank Struktur für webshop
CREATE DATABASE IF NOT EXISTS `webshop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `webshop`;


-- Exportiere Struktur von Tabelle webshop.address
CREATE TABLE IF NOT EXISTS `address` (
  `Address_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Address1` varchar(45) NOT NULL,
  `Address2` varchar(45) DEFAULT NULL,
  `Zip` varchar(10) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Country` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Address_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.address: ~0 rows (ungefähr)
DELETE FROM `address`;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
/*!40000 ALTER TABLE `address` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.article
CREATE TABLE IF NOT EXISTS `article` (
  `Article_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ArticleName` varchar(45) NOT NULL,
  `ArticleDescription` text NOT NULL,
  `ArticlePrice` double NOT NULL,
  `ArticleImage` binary(1) DEFAULT NULL,
  PRIMARY KEY (`Article_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.article: ~25 rows (ungefähr)
DELETE FROM `article`;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`Article_ID`, `ArticleName`, `ArticleDescription`, `ArticlePrice`, `ArticleImage`) VALUES
	(1, 'croissant', 'croissant description', 1.5, NULL),
	(2, 'bun', 'bun  description', 1.5, NULL),
	(3, 'bread', 'bread  description', 2, NULL),
	(4, 'braid', 'braid  description', 2, NULL),
	(5, 'ham sandwich', 'ham sandwich description', 5, NULL),
	(6, 'salami sandwich', 'salami sandwich description', 5, NULL),
	(7, 'cheese sandwich', 'cheese sandwich description', 5, NULL),
	(8, 'eggs', 'eggs description', 4, NULL),
	(9, 'ham', 'ham description', 3, NULL),
	(10, 'cheese', 'cheese description', 3.5, NULL),
	(11, 'cereals', 'cereals description', 2, NULL),
	(12, 'espresso', 'espreso description', 2.5, NULL),
	(13, 'coffee', 'coffee description', 3, NULL),
	(14, 'macciato', 'macciato description', 4, NULL),
	(15, 'capucchino', 'capucchino description', 3.5, NULL),
	(16, 'tea', 'tea description', 3, NULL),
	(17, 'chai latte', 'chai latte description', 3, NULL),
	(18, 'chocolate', 'chocolate description', 3.5, NULL),
	(19, 'ovomaltine', 'ovomaltine description', 3.5, NULL),
	(20, 'orange juice', 'orange juice description', 3.5, NULL),
	(21, 'pineapple juice', 'pineapple juice description', 3.5, NULL),
	(22, 'tropical juice', 'tropical juice', 3.5, NULL),
	(23, 'bircher muesli', 'bircher mueli description', 6.5, NULL),
	(24, 'eggs benedict', 'eggs benedict description', 8.5, NULL),
	(25, 'the BreakFast menu', 'the Breakfast Menu description', 10, NULL);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.articletranslation
CREATE TABLE IF NOT EXISTS `articletranslation` (
  `Article_ID` int(11) NOT NULL,
  `Language_ID` varchar(2) NOT NULL,
  `TranslatedName` varchar(45) NOT NULL,
  `TranslatedDescription` text NOT NULL,
  PRIMARY KEY (`Article_ID`,`Language_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.articletranslation: ~9 rows (ungefähr)
DELETE FROM `articletranslation`;
/*!40000 ALTER TABLE `articletranslation` DISABLE KEYS */;
INSERT INTO `articletranslation` (`Article_ID`, `Language_ID`, `TranslatedName`, `TranslatedDescription`) VALUES
	(1, 'de', 'Gipfeli', 'Hausgemachte Gipfeli. Jeden Morgen frisch gebacken.'),
	(1, 'en', 'Croissant', 'Homemade croissants. Freshly baked each morning.'),
	(1, 'fr', 'Croissant', 'description fr'),
	(2, 'de', 'Brötchen', 'Hausgemachte Brötchen. Jeden Morgen frisch gebacken.'),
	(2, 'en', 'Bun', 'Homemade buns. Freshly baked each morning.'),
	(2, 'fr', 'Bun', 'description fr'),
	(3, 'de', 'Brot', 'Hausgemachtes Brot. Jeden Morgen frisch gebacken.'),
	(3, 'en', 'Bread', 'Homemade bread. Freshly baked each morning.'),
	(3, 'fr', 'Bread', 'description fr');
/*!40000 ALTER TABLE `articletranslation` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.category
CREATE TABLE IF NOT EXISTS `category` (
  `Category_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(45) NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.category: ~4 rows (ungefähr)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`Category_ID`, `CategoryName`) VALUES
	(1, 'food'),
	(2, 'beverage'),
	(3, 'menu'),
	(4, 'specials');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.categoryarticle
CREATE TABLE IF NOT EXISTS `categoryarticle` (
  `categoryId` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  PRIMARY KEY (`categoryId`,`articleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Verbindungstabelle';

-- Exportiere Daten aus Tabelle webshop.categoryarticle: ~25 rows (ungefähr)
DELETE FROM `categoryarticle`;
/*!40000 ALTER TABLE `categoryarticle` DISABLE KEYS */;
INSERT INTO `categoryarticle` (`categoryId`, `articleId`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 4),
	(1, 5),
	(1, 6),
	(1, 7),
	(1, 8),
	(1, 9),
	(1, 10),
	(1, 11),
	(2, 12),
	(2, 13),
	(2, 14),
	(2, 15),
	(2, 16),
	(2, 17),
	(2, 18),
	(2, 19),
	(2, 20),
	(2, 21),
	(2, 22),
	(3, 23),
	(3, 24),
	(3, 25);
/*!40000 ALTER TABLE `categoryarticle` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.categorytranslation
CREATE TABLE IF NOT EXISTS `categorytranslation` (
  `Category_ID` int(11) NOT NULL,
  `Language_ID` varchar(2) NOT NULL,
  `TranslatedName` varchar(45) NOT NULL,
  PRIMARY KEY (`Category_ID`,`Language_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.categorytranslation: ~12 rows (ungefähr)
DELETE FROM `categorytranslation`;
/*!40000 ALTER TABLE `categorytranslation` DISABLE KEYS */;
INSERT INTO `categorytranslation` (`Category_ID`, `Language_ID`, `TranslatedName`) VALUES
	(1, 'de', 'Essen'),
	(1, 'en', 'Food'),
	(1, 'fr', 'Manger'),
	(2, 'de', 'Getränke'),
	(2, 'en', 'Beverage'),
	(2, 'fr', 'Boissons'),
	(3, 'de', 'Menu'),
	(3, 'en', 'Menu'),
	(3, 'fr', 'Menu'),
	(4, 'de', 'Specials'),
	(4, 'en', 'Specials'),
	(4, 'fr', 'Formule');
/*!40000 ALTER TABLE `categorytranslation` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.costumer
CREATE TABLE IF NOT EXISTS `costumer` (
  `Costumer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CostumerRegistration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Gender` enum('male','female') NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Birthday` date NOT NULL,
  `PhoneNumber` varchar(10) DEFAULT NULL,
  `MobileNumber` varchar(10) NOT NULL,
  `EMail` varchar(45) NOT NULL,
  `BillingAddress` int(11) NOT NULL,
  `ShippingAddress` int(11) NOT NULL,
  PRIMARY KEY (`Costumer_ID`),
  KEY `BillingAddress_idx` (`BillingAddress`),
  KEY `ShippingAddress_idx` (`ShippingAddress`),
  CONSTRAINT `BillingAddress` FOREIGN KEY (`BillingAddress`) REFERENCES `address` (`Address_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ShippingAddress` FOREIGN KEY (`ShippingAddress`) REFERENCES `address` (`Address_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.costumer: ~0 rows (ungefähr)
DELETE FROM `costumer`;
/*!40000 ALTER TABLE `costumer` DISABLE KEYS */;
/*!40000 ALTER TABLE `costumer` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.language
CREATE TABLE IF NOT EXISTS `language` (
  `Language_ID` varchar(2) NOT NULL,
  `localizedName` varchar(45) NOT NULL,
  `EnglishName` varchar(45) NOT NULL,
  PRIMARY KEY (`Language_ID`),
  UNIQUE KEY `Language_ID_UNIQUE` (`Language_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.language: ~3 rows (ungefähr)
DELETE FROM `language`;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` (`Language_ID`, `localizedName`, `EnglishName`) VALUES
	('de', 'Deutsch', 'German'),
	('en', 'Englisch', 'English'),
	('fr', 'Französisch', 'French');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.role
CREATE TABLE IF NOT EXISTS `role` (
  `Role_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(20) NOT NULL,
  `RoleDescription` text NOT NULL,
  PRIMARY KEY (`Role_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.role: ~0 rows (ungefähr)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.user
CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(20) NOT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Password` varchar(12) NOT NULL,
  `Role_ID` int(11) NOT NULL,
  `Costumer_ID` int(11) NOT NULL,
  PRIMARY KEY (`Username`),
  UNIQUE KEY `Username_UNIQUE` (`Username`),
  KEY `Role_ID_idx` (`Role_ID`),
  KEY `Costumer_ID_idx` (`Costumer_ID`),
  CONSTRAINT `Costumer_ID` FOREIGN KEY (`Costumer_ID`) REFERENCES `costumer` (`Costumer_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Role_ID` FOREIGN KEY (`Role_ID`) REFERENCES `role` (`Role_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.user: ~0 rows (ungefähr)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.variation
CREATE TABLE IF NOT EXISTS `variation` (
  `Variation_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Article_ID` int(11) NOT NULL,
  `VariationName` varchar(45) NOT NULL,
  `VariationDescription` text NOT NULL,
  `VariationPrice` double NOT NULL,
  PRIMARY KEY (`Variation_ID`,`Article_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.variation: ~7 rows (ungefähr)
DELETE FROM `variation`;
/*!40000 ALTER TABLE `variation` DISABLE KEYS */;
INSERT INTO `variation` (`Variation_ID`, `Article_ID`, `VariationName`, `VariationDescription`, `VariationPrice`) VALUES
	(1, 1, 'butter', 'butterdescription', 0),
	(2, 1, 'whole-grain', 'description', 0),
	(3, 2, 'butter', 'description', 0),
	(4, 2, 'whole-grain', 'description', 0),
	(5, 2, 'bacon', 'description', 0.5),
	(6, 3, 'butter', 'description', 0),
	(7, 3, 'whole-grain', 'description', 0);
/*!40000 ALTER TABLE `variation` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.variationtranslation
CREATE TABLE IF NOT EXISTS `variationtranslation` (
  `Variation_ID` int(11) NOT NULL,
  `Language_ID` varchar(2) NOT NULL,
  `TranslatedName` varchar(45) NOT NULL,
  `TranslatedDescription` text NOT NULL,
  PRIMARY KEY (`Variation_ID`,`Language_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.variationtranslation: ~21 rows (ungefähr)
DELETE FROM `variationtranslation`;
/*!40000 ALTER TABLE `variationtranslation` DISABLE KEYS */;
INSERT INTO `variationtranslation` (`Variation_ID`, `Language_ID`, `TranslatedName`, `TranslatedDescription`) VALUES
	(1, 'de', 'mit Butter', 'Beschreibung'),
	(1, 'en', 'butter', 'description'),
	(1, 'fr', 'butter', 'description'),
	(2, 'de', 'Vollkorn', 'Beschreibung'),
	(2, 'en', 'whole-grain', 'description'),
	(2, 'fr', 'whole-grain', 'description'),
	(3, 'de', 'mit Butter', 'Beschreibung'),
	(3, 'en', 'butter', 'description'),
	(3, 'fr', 'butter', 'description'),
	(4, 'de', 'Vollkorn', 'Beschreibung'),
	(4, 'en', 'whole-grain', 'description'),
	(4, 'fr', 'whole-grain', 'description'),
	(5, 'de', 'Speck', 'description'),
	(5, 'en', 'bacon', 'description'),
	(5, 'fr', 'bacon', 'description'),
	(6, 'de', 'butter', 'description'),
	(6, 'en', 'butter', 'description'),
	(6, 'fr', 'butter', 'description'),
	(7, 'de', 'Vollkorn', 'Beschreibung'),
	(7, 'en', 'whole-grain', 'description'),
	(7, 'fr', 'whole-grain', 'description');
/*!40000 ALTER TABLE `variationtranslation` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
