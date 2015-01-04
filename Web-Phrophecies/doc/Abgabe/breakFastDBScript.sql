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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.address: ~3 rows (ungefähr)
DELETE FROM `address`;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` (`Address_ID`, `Address1`, `Address2`, `Zip`, `City`, `Country`) VALUES
	(1, 'Wankdorffeldstrasse 102', ' ', '3000', 'Bern', 'CH'),
	(2, 'Wankdorffeldstrasse 102', ' ', '3000', 'Bern', 'CH'),
	(3, 'Wankdorffeldstrasse 102', ' ', '3000', 'Bern', 'CH');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.article
CREATE TABLE IF NOT EXISTS `article` (
  `Article_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ArticleName` varchar(45) NOT NULL,
  `ArticleDescription` text NOT NULL,
  `ArticlePrice` double NOT NULL,
  `ArticleImage` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`Article_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.article: ~8 rows (ungefähr)
DELETE FROM `article`;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`Article_ID`, `ArticleName`, `ArticleDescription`, `ArticlePrice`, `ArticleImage`) VALUES
	(1, 'croissant', 'croissant description', 1.5, '/shop/food/croissant.jpg'),
	(2, 'bun', 'bun  description', 1.5, '/shop/food/buns.jpg'),
	(3, 'bread', 'bread  description', 2, '/shop/food/bread.jpg'),
	(4, 'braid', 'braid  description', 2, '/shop/food/braid.jpg'),
	(5, 'ham sandwich', 'ham sandwich description', 5, '/shop/food/sandwich.jpg'),
	(6, 'salami sandwich', 'salami sandwich description', 5, '/shop/food/sandwich.jpg'),
	(7, 'cheese sandwich', 'cheese sandwich description', 5, '/shop/food/sandwich.jpg'),
	(8, 'eggs', 'eggs description', 2, '/shop/food/egg.jpg'),
	(9, 'ham', 'ham description', 3, '/shop/food/ham.jpg'),
	(10, 'cheese', 'cheese description', 3.5, '/shop/food/cheese.jpg'),
	(11, 'cereals', 'cereals description', 2, '/shop/food/cereals.jpg'),
	(12, 'espresso', 'espreso description', 2.5, '/shop/beverage/espresso.jpg'),
	(13, 'coffee', 'coffee description', 3, '/shop/beverage/coffee.jpg'),
	(14, 'macciato', 'macciato description', 4, '/shop/beverage/lattemacchiato.jpg'),
	(15, 'cappuccino', 'cappuccino description', 3.5, '/shop/beverage/cappuccino.jpg'),
	(16, 'tea', 'tea description', 3, '/shop/beverage/tea.jpg'),
	(17, 'chai latte', 'chai latte description', 3, '/shop/beverage/chailatte.jpg'),
	(18, 'chocolate', 'chocolate description', 3.5, '/shop/beverage/hotchocolate.jpg'),
	(19, 'ovomaltine', 'ovomaltine description', 3.5, '/shop/beverage/ovomaltine.jpg'),
	(20, 'orange juice', 'orange juice description', 3.5, '/shop/beverage/juice.jpg'),
	(21, 'pineapple juice', 'pineapple juice description', 3.5, '/shop/beverage/juice.jpg'),
	(22, 'tropical juice', 'tropical juice', 3.5, '/shop/beverage/juice.jpg'),
	(23, 'bircher muesli', 'bircher muesli description', 6.5, '/shop/menu/birchermuesli.jpg'),
	(24, 'eggs benedict', 'eggs benedict description', 8.5, '/shop/menu/eggsbenedict.jpg'),
	(25, 'the BreakFast menu', 'the Breakfast Menu description', 10, '/shop/menu/breakfast.jpg');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.articletranslation
CREATE TABLE IF NOT EXISTS `articletranslation` (
  `Article_ID` int(11) NOT NULL,
  `Language_ID` varchar(2) NOT NULL,
  `TranslatedName` varchar(45) NOT NULL,
  `TranslatedDescription` text NOT NULL,
  PRIMARY KEY (`Article_ID`,`Language_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.articletranslation: ~75 rows (ungefähr)
DELETE FROM `articletranslation`;
/*!40000 ALTER TABLE `articletranslation` DISABLE KEYS */;
INSERT INTO `articletranslation` (`Article_ID`, `Language_ID`, `TranslatedName`, `TranslatedDescription`) VALUES
	(1, 'de', 'Gipfeli', 'Hausgemachte Gipfeli. Jeden Morgen frisch gebacken.'),
	(1, 'en', 'Croissant', 'Homemade croissants. Freshly baked each morning.'),
	(1, 'fr', 'Croissant', 'Croissants faits maison. Chaque matin fra&icirc;chement cuit.'),
	(2, 'de', 'Br&ouml;tchen', 'Hausgemachte Br&ouml;tchen. Jeden Morgen frisch gebacken.'),
	(2, 'en', 'Bun', 'Homemade buns. Freshly baked each morning.'),
	(2, 'fr', 'Petits pains', 'Petits pains faits maison. Chaque matin fra&icirc;chement cuit.'),
	(3, 'de', 'Brot', 'Hausgemachtes Brot. Jeden Morgen frisch gebacken.'),
	(3, 'en', 'Bread', 'Homemade bread. Freshly baked each morning.'),
	(3, 'fr', 'Pain', 'Pain faits maison. Chaque matin fra&icirc;chmement cuit.'),
	(4, 'de', 'Z&uuml;pfe', 'Hausgemachte Z&uuml;pfe. Jeden Morgen frisch gebacken.'),
	(4, 'en', 'Braid', 'Homemade braid. Freshly baked each morning.'),
	(4, 'fr', 'Tresse', 'Tresse faits maison. Chaque matin fra&icirc;chement cuit.'),
	(5, 'de', 'Schinken-Sandwich', 'Sandwich mit Schinken und wahlweise mit oder ohne Gurken und Tomaten.'),
	(5, 'en', 'Ham-Sandwich', 'Sandwich with ham and tomatos and cucumber if you choose.'),
	(5, 'fr', 'Sandwich au jambon', 'Sandwich au jambon au choix avec ou sans cocombres et tomates.'),
	(6, 'de', 'Salami-Sandwich', 'Sandwich mit Salami und wahlweise mit oder ohne Gurken und Tomaten.'),
	(6, 'en', 'Salami-Sandwich', 'Sandwich with salami and tomatos and cucumber if you choose.'),
	(6, 'fr', 'Sandwich au salami', 'Sandwich au salami au choix avec ou sans cocombres et tomates.'),
	(7, 'de', 'K&auml;se-Sandwich', 'Sandwich mit K&auml;se und wahlweise mit oder ohne Gurken und Tomaten.'),
	(7, 'en', 'Cheese-Sandwich', 'Sandwich with cheese and tomatos and cucumber if you choose.'),
	(7, 'fr', 'Sandwich au fromage', 'Sandwich au fromage au choix avec ou sans cocombres et tomates.'),
	(8, 'de', 'Eier', 'Zubereitete Eierspeisen nach Ihrer Wahl.'),
	(8, 'en', 'Eggs', 'Prepared egg dishes of your choice.'),
	(8, 'fr', '&OElig;ufs', 'Plats aux &oelig;ufs pr&eacute;par&eacute;s de votre choix.'),
	(9, 'de', 'Schinken', 'Schinkenscheiben kalt oder warm.'),
	(9, 'en', 'Ham', 'Slices of ham served cold or warm.'),
	(9, 'fr', 'Jambon', 'Tranches de jambon froid ou chaud.'),
	(10, 'de', 'K&auml;se', 'Jede Woche stellen wir eine andere K&auml;sesorte f&uuml;r Sie bereit.'),
	(10, 'en', 'Cheese', 'We provide you with a diffrent kind of cheese each week.'),
	(10, 'fr', 'Fromage', 'Chaque semaine, nous demander un type de fromage diff&eacute;rent pour vous.'),
	(11, 'de', 'M&uuml;esli', 'Probieren Sie unser BreakFast-M&uuml;esli. F&uuml;r ein idealen Start in den Tag.'),
	(11, 'en', 'Cereals', 'Start your day with our very own BreakFast-Cereals.'),
	(11, 'fr', 'C&eacute;r&eacute;ales', 'Essayez notre BreakFast-c&eacute;r&eacute;ales. Pour bien commencer la journ&eacute;e.'),
	(12, 'de', 'Espresso', 'Unser Espresso versorgt Sie mit der n&ouml;tigen Energie f&uuml;r Ihren Tag. '),
	(12, 'en', 'Espresso', ''),
	(12, 'fr', 'Espresso', ''),
	(13, 'de', 'Kaffee', ''),
	(13, 'en', 'Coffee', ''),
	(13, 'fr', 'Caf&eacute;', ''),
	(14, 'de', 'Latte Macchiato', ''),
	(14, 'en', 'Latte Macchiato', ''),
	(14, 'fr', 'Latte Macchiato', ''),
	(15, 'de', 'Capuccino', ''),
	(15, 'en', 'Capuccino', ''),
	(15, 'fr', 'Capuccino', ''),
	(16, 'de', 'Tee', 'W&auml;hlen Sie Ihr Lieblingstee aus unserem reichhaltigen Teesortiment und geniessen Sie die erstklassige Qualit&auml;t.'),
	(16, 'en', 'Tea', 'Choose your favorite tea from our wide selection of teas and enjoy the first-class quality.'),
	(16, 'fr', 'Tea', 'Choisissez votre th&eacute; pr&eacute;f&eacute;r&eacute; parmi notre vaste s&eacute;lection de th&eacute;s et de profiter de la qualit&eacute; de premi&egrave;re classe.'),
	(17, 'de', 'Chai Latte', 'Beleben Sie Ihr K&ouml;rper und Geist. Chai Latte &uuml;berzeugt mit seinen orientalischen Gew&uuml;rzen, feinen Aroma und der dezenten S&uuml;sse.'),
	(17, 'en', 'Chai Latte', 'Detox your body and mind. Chai Latte convinces with its oriental spices, delicate flavor and subtle sweetness.'),
	(17, 'fr', 'Chai Latte', 'D&eacute;sintoxication de votre corps et l&rsquo;esprit. Chai Latte convainc avec ses &eacute;pices orientales, saveur d&eacute;licate et subtile douceur.'),
	(18, 'de', 'Schokolade', ''),
	(18, 'en', 'Hot chocolate', ''),
	(18, 'fr', 'Chocolat chaud', ''),
	(19, 'de', 'Ovomaltine', ''),
	(19, 'en', 'Ovomaltine', ''),
	(19, 'fr', 'Ovomaltine', ''),
	(20, 'de', 'Orangensaft', ''),
	(20, 'en', 'Orange Juice', ''),
	(20, 'fr', 'Jus d&rsquo;orange', ''),
	(21, 'de', 'Ananassaft ', ''),
	(21, 'en', 'Pineapple Juice', ''),
	(21, 'fr', 'Jus d&rsquo;ananas', ''),
	(22, 'de', 'Tropical-Saft', ''),
	(22, 'en', 'Tropical Juice', ''),
	(22, 'fr', 'Jus tropical', ''),
	(23, 'de', 'Bircherm&uuml;esli', ''),
	(23, 'en', 'Bircherm&uuml;esli', ''),
	(23, 'fr', 'Bircherm&uuml;esli', ''),
	(24, 'de', 'Eier Benedikt', ''),
	(24, 'en', 'Eggs Benedict', ''),
	(24, 'fr', 'Eggs Benedict', ''),
	(25, 'de', 'Das BreakFast Menu', 'Lassen Sie sich jede Woche neu von einem f&uuml;r Sie speziell zusammengestelltes, k&ouml;stliches Fr&uuml;hst&uuml;ck &uuml;berraschen.'),
	(25, 'en', 'The BreakFast Menu', 'We will surprise you every week with a specially compiled and delicious breakfast.'),
	(25, 'fr', 'The BreakFast Menu', 'Nous voulons suprendre chaque semaine avec un sp&eacute;cialement pour vous compil&eacute; petit d&eacute;jeuner.');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.costumer: ~0 rows (ungefähr)
DELETE FROM `costumer`;
/*!40000 ALTER TABLE `costumer` DISABLE KEYS */;
INSERT INTO `costumer` (`Costumer_ID`, `CostumerRegistration`, `Gender`, `Title`, `FirstName`, `LastName`, `Birthday`, `PhoneNumber`, `MobileNumber`, `EMail`, `BillingAddress`, `ShippingAddress`) VALUES
	(1, '2014-12-28 16:33:51', 'male', NULL, 'Sandro', 'Sample', '2014-12-28', '031 000 00', '', 's.sample@sample.ch', 1, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.role: ~0 rows (ungefähr)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`Role_ID`, `RoleName`, `RoleDescription`) VALUES
	(1, 'User', 'User role'),
	(2, 'Admin', 'Systemadmin role');
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
INSERT INTO `user` (`Username`, `RegistrationDate`, `Password`, `Role_ID`, `Costumer_ID`) VALUES
	('sampleadmin', '2015-01-04 09:40:52', 'sample', 2, 1),
	('sampleuser', '2014-12-31 14:30:42', 'sample', 1, 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.variation
CREATE TABLE IF NOT EXISTS `variation` (
  `Variation_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Article_ID` int(11) NOT NULL,
  `VariationName` varchar(45) NOT NULL,
  `VariationDescription` text NOT NULL,
  `VariationPrice` double NOT NULL,
  PRIMARY KEY (`Variation_ID`,`Article_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.variation: ~0 rows (ungefähr)
DELETE FROM `variation`;
/*!40000 ALTER TABLE `variation` DISABLE KEYS */;
INSERT INTO `variation` (`Variation_ID`, `Article_ID`, `VariationName`, `VariationDescription`, `VariationPrice`) VALUES
	(1, 1, 'butter', 'butterdescription', 0),
	(2, 1, 'whole-grain', 'description', 0),
	(3, 2, 'butter', 'description', 0),
	(4, 2, 'whole-grain', 'description', 0),
	(5, 2, 'bacon', 'description', 0.5),
	(6, 3, 'butter', 'description', 0),
	(7, 3, 'whole-grain', 'description', 0),
	(8, 4, 'butter', 'description', 0),
	(9, 5, 'cucumber', 'description', -0.5),
	(10, 5, 'tomato', 'description', -0.5),
	(11, 5, 'cucumber_tomato', 'description', -1),
	(12, 6, 'cucumber', 'description', -0.5),
	(13, 6, 'tomato', 'description', -0.5),
	(14, 6, 'cucumber_tomato', 'description', -1),
	(15, 7, 'cucumber', 'description', -0.5),
	(16, 7, 'tomato', 'description', -0.5),
	(17, 7, 'cucumber_tomato', 'description', -1),
	(18, 8, '3minutes', 'description', 0),
	(19, 8, 'soft-boiled', 'description', 0.2),
	(20, 8, 'hard-boiled', 'description', 0.5),
	(21, 8, 'scrambled', 'description', 1.5),
	(22, 8, 'sunny-side up', 'description', 1.5),
	(23, 9, 'warm', 'description', 1),
	(24, 12, 'asugrin', 'description', 0),
	(25, 13, 'asugrin', 'description', 0),
	(26, 14, 'lactosefree', 'description', 0.5),
	(27, 15, 'lactosefree', 'description', 0.5),
	(28, 17, 'lactosefree', 'description', 1),
	(29, 18, 'lactosefree', 'description', 1.5),
	(30, 19, 'lactosefree', 'description', 1.5);
/*!40000 ALTER TABLE `variation` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle webshop.variationtranslation
CREATE TABLE IF NOT EXISTS `variationtranslation` (
  `Variation_ID` int(11) NOT NULL,
  `Language_ID` varchar(2) NOT NULL,
  `TranslatedName` varchar(45) NOT NULL,
  `TranslatedDescription` text NOT NULL,
  PRIMARY KEY (`Variation_ID`,`Language_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle webshop.variationtranslation: ~90 rows (ungefähr)
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
	(6, 'de', 'mit Butter', 'Beschreibung'),
	(6, 'en', 'butter', 'description'),
	(6, 'fr', 'butter', 'description'),
	(7, 'de', 'Vollkorn', 'Beschreibung'),
	(7, 'en', 'whole-grain', 'description'),
	(7, 'fr', 'whole-grain', 'description'),
	(8, 'de', 'mit Butter', 'Beschreibung'),
	(8, 'en', 'butter', 'description'),
	(8, 'fr', 'butter', 'description'),
	(9, 'de', 'ohne Gurken', 'Beschreibung'),
	(9, 'en', 'without cucumber', 'description'),
	(9, 'fr', 'sans concombres', 'description'),
	(10, 'de', 'ohne Tomaten', 'Beschreibung'),
	(10, 'en', 'without tomatoes', 'description'),
	(10, 'fr', 'sans tomates', 'description'),
	(11, 'de', 'ohne Gurken und Tomaten', 'Beschreibung'),
	(11, 'en', 'without cucumber and tomatoes', 'description'),
	(11, 'fr', 'sans concombres et tomates', 'description'),
	(12, 'de', 'ohne Gurken', 'Beschreibung'),
	(12, 'en', 'without cucumber', 'description'),
	(12, 'fr', 'sans concombres', 'description'),
	(13, 'de', 'ohne Tomaten', 'Beschreibung'),
	(13, 'en', 'without tomatoes', 'description'),
	(13, 'fr', 'sans tomates', 'description'),
	(14, 'de', 'ohne Gurken und Tomaten', 'Beschreibung'),
	(14, 'en', 'without cucumber and tomatoes', 'description'),
	(14, 'fr', 'sans concombres et tomates', 'description'),
	(15, 'de', 'ohne Gurken', 'Beschreibung'),
	(15, 'en', 'without cucumber', 'description'),
	(15, 'fr', 'sans concombres', 'description'),
	(16, 'de', 'ohne Tomaten', 'Beschreibung'),
	(16, 'en', 'without tomatoes', 'description'),
	(16, 'fr', 'sans tomates', 'description'),
	(17, 'de', 'ohne Gurken und Tomaten', 'Beschreibung'),
	(17, 'en', 'without cucumber and tomatoes', 'description'),
	(17, 'fr', 'sans concombres et tomates', 'description'),
	(18, 'de', '3-Minuten-Ei', 'Beschreibung'),
	(18, 'en', '3-minute egg', 'description'),
	(18, 'fr', '&OElig;uf &agrave; 3 minutes', 'description'),
	(19, 'de', 'Wachsei', 'Beschreibung'),
	(19, 'en', 'Soft-boiled egg', 'description'),
	(19, 'fr', '&OElig;uf &agrave; la coque', 'description'),
	(20, 'de', 'Hart gekocht', 'Beschreibung'),
	(20, 'en', 'Hard-boiled', 'description'),
	(20, 'fr', '&OElig;uf dur', 'description'),
	(21, 'de', 'R&uuml;hrei', 'Beschreibung'),
	(21, 'en', 'Scrambled-eggs', 'description'),
	(21, 'fr', '&OElig;uf brouill&eacute;s', 'description'),
	(22, 'de', 'Spiegelei', 'Beschreibung'),
	(22, 'en', 'Egg sunny-side up', 'description'),
	(22, 'fr', '&OElig;uf au plat', 'description'),
	(23, 'de', 'warm', 'Beschreibung'),
	(23, 'en', 'warm', 'description'),
	(23, 'fr', 'chaud', 'description'),
	(24, 'de', 'mit Asugrin', 'Beschreibung'),
	(24, 'en', 'with Asugrin', 'description'),
	(24, 'fr', 'avec Asugrin', 'description'),
	(25, 'de', 'mit Asugrin', 'Beschreibung'),
	(25, 'en', 'with Asugrin', 'description'),
	(25, 'fr', 'avec Asugrin', 'description'),
	(26, 'de', 'Laktosefrei', 'Beschreibung'),
	(26, 'en', 'lactose-free', 'description'),
	(26, 'fr', 'sans lactose', 'description'),
	(27, 'de', 'Laktosefrei', 'Beschreibung'),
	(27, 'en', 'lactose-free', 'description'),
	(27, 'fr', 'sans lactose', 'description'),
	(28, 'de', 'Laktosefrei', 'Beschreibung'),
	(28, 'en', 'lactose-free', 'description'),
	(28, 'fr', 'sans lactose', 'description'),
	(29, 'de', 'Laktosefrei', 'Beschreibung'),
	(29, 'en', 'lactose-free', 'description'),
	(29, 'fr', 'sans lactose', 'description'),
	(30, 'de', 'Laktosefrei', 'Beschreibung'),
	(30, 'en', 'lactose-free', 'description'),
	(30, 'fr', 'sans lactose', 'description');
/*!40000 ALTER TABLE `variationtranslation` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
