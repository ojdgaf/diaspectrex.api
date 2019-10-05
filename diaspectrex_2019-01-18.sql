# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.7.21)
# Схема: diaspectrex
# Время создания: 2019-01-18 13:43:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы activity_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activity_log`;

CREATE TABLE `activity_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы addresses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `addresses`;

CREATE TABLE `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned DEFAULT NULL,
  `region_id` int(10) unsigned DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `street_id` int(10) unsigned NOT NULL,
  `building` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat` smallint(5) unsigned DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_country_id_foreign` (`country_id`),
  KEY `addresses_region_id_foreign` (`region_id`),
  KEY `addresses_city_id_foreign` (`city_id`),
  KEY `addresses_street_id_foreign` (`street_id`),
  CONSTRAINT `addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `addresses_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `addresses_street_id_foreign` FOREIGN KEY (`street_id`) REFERENCES `streets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;

INSERT INTO `addresses` (`id`, `country_id`, `region_id`, `city_id`, `street_id`, `building`, `flat`, `postal_code`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,233,15,12,19,'1',NULL,'65044','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL);

/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы cities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_region_id_foreign` (`region_id`),
  CONSTRAINT `cities_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;

INSERT INTO `cities` (`id`, `region_id`, `name`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,15,'Ananyiv','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(2,15,'Artsyz','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(3,15,'Balta','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(4,15,'Berezivka','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(5,15,'Bilhorod-Dnistrovskyi','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(6,15,'Bilyayivka','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(7,15,'Bolhrad','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(8,15,'Chornomorsk','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(9,15,'Izmail','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(10,15,'Kiliya','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(11,15,'Kodyma','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(12,15,'Odessa','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(13,15,'Podilsk','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(14,15,'Reni','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(15,15,'Rozdilna','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(16,15,'Tatarbunary','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(17,15,'Teplodar','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(18,15,'Vylkove','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(19,15,'Yuzhne','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL);

/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы classifiers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `classifiers`;

CREATE TABLE `classifiers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_type_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classifiers_patient_type_id_foreign` (`patient_type_id`),
  CONSTRAINT `classifiers_patient_type_id_foreign` FOREIGN KEY (`patient_type_id`) REFERENCES `patient_types` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `classifiers` WRITE;
/*!40000 ALTER TABLE `classifiers` DISABLE KEYS */;

INSERT INTO `classifiers` (`id`, `patient_type_id`, `name`, `display_name`, `description`, `deleted_at`)
VALUES
	(1,1,'doctor','Doctor','Classification made by a doctor manually for adults.',NULL),
	(2,2,'doctor','Doctor','Classification made by a doctor manually for children.',NULL),
	(3,1,'aws machine learning','AWS Machine Learning','Remote neural network with high level of preciseness. Adjusted for adults.',NULL),
	(4,2,'aws machine learning','AWS Machine Learning','Remote neural network with high level of preciseness. Adjusted for children.',NULL),
	(5,1,'discriminant analysis','Discriminant Analysis','Math statistical method. Adjusted for adults.',NULL),
	(6,2,'discriminant analysis','Discriminant Analysis','Math statistical method. Adjusted for children.',NULL),
	(7,1,'k-nearest neighbors','K-nearest neighbors','Math non-parametric method. Adjusted for adults.',NULL),
	(8,2,'k-nearest neighbors','K-nearest neighbors','Math non-parametric method. Adjusted for children.',NULL);

/*!40000 ALTER TABLE `classifiers` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countries_name_unique` (`name`),
  UNIQUE KEY `countries_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Afghanistan','AF','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(2,'Åland Islands','AX','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(3,'Albania','AL','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(4,'Algeria','DZ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(5,'American Samoa','AS','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(6,'Andorra','AD','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(7,'Angola','AO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(8,'Anguilla','AI','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(9,'Antarctica','AQ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(10,'Antigua and Barbuda','AG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(11,'Argentina','AR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(12,'Armenia','AM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(13,'Aruba','AW','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(14,'Australia','AU','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(15,'Austria','AT','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(16,'Azerbaijan','AZ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(17,'Bahamas','BS','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(18,'Bahrain','BH','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(19,'Bangladesh','BD','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(20,'Barbados','BB','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(21,'Belarus','BY','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(22,'Belgium','BE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(23,'Belize','BZ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(24,'Benin','BJ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(25,'Bermuda','BM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(26,'Bhutan','BT','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(27,'Bolivia, Plurinational State of','BO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(28,'Bonaire, Sint Eustatius and Saba','BQ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(29,'Bosnia and Herzegovina','BA','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(30,'Botswana','BW','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(31,'Bouvet Island','BV','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(32,'Brazil','BR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(33,'British Indian Ocean Territory','IO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(34,'Brunei Darussalam','BN','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(35,'Bulgaria','BG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(36,'Burkina Faso','BF','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(37,'Burundi','BI','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(38,'Cambodia','KH','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(39,'Cameroon','CM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(40,'Canada','CA','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(41,'Cape Verde','CV','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(42,'Cayman Islands','KY','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(43,'Central African Republic','CF','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(44,'Chad','TD','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(45,'Chile','CL','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(46,'China','CN','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(47,'Christmas Island','CX','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(48,'Cocos (Keeling) Islands','CC','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(49,'Colombia','CO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(50,'Comoros','KM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(51,'Congo','CG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(52,'Congo, the Democratic Republic of the','CD','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(53,'Cook Islands','CK','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(54,'Costa Rica','CR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(55,'Côte d\'Ivoire','CI','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(56,'Croatia','HR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(57,'Cuba','CU','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(58,'Curaçao','CW','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(59,'Cyprus','CY','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(60,'Czech Republic','CZ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(61,'Denmark','DK','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(62,'Djibouti','DJ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(63,'Dominica','DM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(64,'Dominican Republic','DO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(65,'Ecuador','EC','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(66,'Egypt','EG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(67,'El Salvador','SV','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(68,'Equatorial Guinea','GQ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(69,'Eritrea','ER','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(70,'Estonia','EE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(71,'Ethiopia','ET','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(72,'Falkland Islands (Malvinas)','FK','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(73,'Faroe Islands','FO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(74,'Fiji','FJ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(75,'Finland','FI','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(76,'France','FR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(77,'French Guiana','GF','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(78,'French Polynesia','PF','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(79,'French Southern Territories','TF','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(80,'Gabon','GA','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(81,'Gambia','GM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(82,'Georgia','GE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(83,'Germany','DE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(84,'Ghana','GH','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(85,'Gibraltar','GI','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(86,'Greece','GR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(87,'Greenland','GL','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(88,'Grenada','GD','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(89,'Guadeloupe','GP','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(90,'Guam','GU','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(91,'Guatemala','GT','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(92,'Guernsey','GG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(93,'Guinea','GN','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(94,'Guinea-Bissau','GW','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(95,'Guyana','GY','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(96,'Haiti','HT','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(97,'Heard Island and McDonald Mcdonald Islands','HM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(98,'Holy See (Vatican City State)','VA','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(99,'Honduras','HN','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(100,'Hong Kong','HK','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(101,'Hungary','HU','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(102,'Iceland','IS','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(103,'India','IN','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(104,'Indonesia','ID','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(105,'Iran, Islamic Republic of','IR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(106,'Iraq','IQ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(107,'Ireland','IE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(108,'Isle of Man','IM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(109,'Israel','IL','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(110,'Italy','IT','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(111,'Jamaica','JM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(112,'Japan','JP','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(113,'Jersey','JE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(114,'Jordan','JO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(115,'Kazakhstan','KZ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(116,'Kenya','KE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(117,'Kiribati','KI','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(118,'Korea, Democratic People\'s Republic of','KP','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(119,'Korea, Republic of','KR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(120,'Kuwait','KW','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(121,'Kyrgyzstan','KG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(122,'Lao People\'s Democratic Republic','LA','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(123,'Latvia','LV','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(124,'Lebanon','LB','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(125,'Lesotho','LS','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(126,'Liberia','LR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(127,'Libya','LY','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(128,'Liechtenstein','LI','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(129,'Lithuania','LT','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(130,'Luxembourg','LU','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(131,'Macao','MO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(132,'Macedonia, the Former Yugoslav Republic of','MK','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(133,'Madagascar','MG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(134,'Malawi','MW','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(135,'Malaysia','MY','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(136,'Maldives','MV','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(137,'Mali','ML','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(138,'Malta','MT','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(139,'Marshall Islands','MH','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(140,'Martinique','MQ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(141,'Mauritania','MR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(142,'Mauritius','MU','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(143,'Mayotte','YT','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(144,'Mexico','MX','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(145,'Micronesia, Federated States of','FM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(146,'Moldova, Republic of','MD','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(147,'Monaco','MC','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(148,'Mongolia','MN','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(149,'Montenegro','ME','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(150,'Montserrat','MS','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(151,'Morocco','MA','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(152,'Mozambique','MZ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(153,'Myanmar','MM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(154,'Namibia','NA','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(155,'Nauru','NR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(156,'Nepal','NP','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(157,'Netherlands','NL','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(158,'New Caledonia','NC','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(159,'New Zealand','NZ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(160,'Nicaragua','NI','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(161,'Niger','NE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(162,'Nigeria','NG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(163,'Niue','NU','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(164,'Norfolk Island','NF','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(165,'Northern Mariana Islands','MP','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(166,'Norway','NO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(167,'Oman','OM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(168,'Pakistan','PK','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(169,'Palau','PW','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(170,'Palestine, State of','PS','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(171,'Panama','PA','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(172,'Papua New Guinea','PG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(173,'Paraguay','PY','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(174,'Peru','PE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(175,'Philippines','PH','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(176,'Pitcairn','PN','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(177,'Poland','PL','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(178,'Portugal','PT','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(179,'Puerto Rico','PR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(180,'Qatar','QA','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(181,'Réunion','RE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(182,'Romania','RO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(183,'Russian Federation','RU','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(184,'Rwanda','RW','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(185,'Saint Barthélemy','BL','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(186,'Saint Helena, Ascension and Tristan da Cunha','SH','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(187,'Saint Kitts and Nevis','KN','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(188,'Saint Lucia','LC','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(189,'Saint Martin (French part)','MF','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(190,'Saint Pierre and Miquelon','PM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(191,'Saint Vincent and the Grenadines','VC','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(192,'Samoa','WS','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(193,'San Marino','SM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(194,'Sao Tome and Principe','ST','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(195,'Saudi Arabia','SA','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(196,'Senegal','SN','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(197,'Serbia','RS','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(198,'Seychelles','SC','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(199,'Sierra Leone','SL','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(200,'Singapore','SG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(201,'Sint Maarten (Dutch part)','SX','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(202,'Slovakia','SK','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(203,'Slovenia','SI','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(204,'Solomon Islands','SB','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(205,'Somalia','SO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(206,'South Africa','ZA','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(207,'South Georgia and the South Sandwich Islands','GS','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(208,'South Sudan','SS','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(209,'Spain','ES','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(210,'Sri Lanka','LK','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(211,'Sudan','SD','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(212,'Suriname','SR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(213,'Svalbard and Jan Mayen','SJ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(214,'Swaziland','SZ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(215,'Sweden','SE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(216,'Switzerland','CH','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(217,'Syrian Arab Republic','SY','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(218,'Taiwan','TW','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(219,'Tajikistan','TJ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(220,'Tanzania, United Republic of','TZ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(221,'Thailand','TH','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(222,'Timor-Leste','TL','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(223,'Togo','TG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(224,'Tokelau','TK','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(225,'Tonga','TO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(226,'Trinidad and Tobago','TT','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(227,'Tunisia','TN','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(228,'Turkey','TR','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(229,'Turkmenistan','TM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(230,'Turks and Caicos Islands','TC','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(231,'Tuvalu','TV','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(232,'Uganda','UG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(233,'Ukraine','UA','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(234,'United Arab Emirates','AE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(235,'United Kingdom','GB','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(236,'United States','US','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(237,'United States Minor Outlying Islands','UM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(238,'Uruguay','UY','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(239,'Uzbekistan','UZ','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(240,'Vanuatu','VU','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(241,'Venezuela, Bolivarian Republic of','VE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(242,'Viet Nam','VN','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(243,'Virgin Islands, British','VG','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(244,'Virgin Islands, U.S.','VI','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(245,'Wallis and Futuna','WF','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(246,'Western Sahara','EH','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(247,'Yemen','YE','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(248,'Zambia','ZM','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(249,'Zimbabwe','ZW','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL);

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы diagnostic_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `diagnostic_groups`;

CREATE TABLE `diagnostic_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_type_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `diagnostic_groups_patient_type_id_foreign` (`patient_type_id`),
  CONSTRAINT `diagnostic_groups_patient_type_id_foreign` FOREIGN KEY (`patient_type_id`) REFERENCES `patient_types` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `diagnostic_groups` WRITE;
/*!40000 ALTER TABLE `diagnostic_groups` DISABLE KEYS */;

INSERT INTO `diagnostic_groups` (`id`, `patient_type_id`, `name`, `display_name`, `description`, `deleted_at`)
VALUES
	(1,1,'standard','Standard (healthy)','Adults without any identified diseases.',NULL),
	(2,2,'standard','Standard (healthy)','Children without any identified diseases.',NULL),
	(3,1,'chronic obstructive pulmonary disease','Chronic Obstructive Pulmonary Disease','Adults who have chronic obstructive pulmonary disease.',NULL),
	(4,1,'tuberculosis','Tuberculosis','Adults who have tuberculosis.',NULL),
	(5,2,'asthma','Asthma','Children who have asthma.',NULL),
	(6,2,'bronchitis','Bronchitis','Children who have bronchitis.',NULL),
	(7,2,'pneumonia','Pneumonia','Children who have pneumonia.',NULL),
	(8,2,'somatoform autonomic dysfunction','Somatoform Autonomic Dysfunction','Children who have somatoform autonomic dysfunction.',NULL);

/*!40000 ALTER TABLE `diagnostic_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы examinations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `examinations`;

CREATE TABLE `examinations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_card_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conclusion` text COLLATE utf8mb4_unicode_ci,
  `started_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ended_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `examinations_patient_card_id_foreign` (`patient_card_id`),
  CONSTRAINT `examinations_patient_card_id_foreign` FOREIGN KEY (`patient_card_id`) REFERENCES `patient_cards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `examinations` WRITE;
/*!40000 ALTER TABLE `examinations` DISABLE KEYS */;

INSERT INTO `examinations` (`id`, `patient_card_id`, `name`, `conclusion`, `started_at`, `ended_at`, `deleted_at`)
VALUES
	(1,1,'Database seeding',NULL,'2000-01-01 00:00:00','2000-01-01 01:00:00',NULL),
	(2,2,'Database seeding',NULL,'2018-01-01 00:00:00','2018-01-01 01:00:00',NULL);

/*!40000 ALTER TABLE `examinations` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы hospitals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hospitals`;

CREATE TABLE `hospitals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hospitals_address_id_foreign` (`address_id`),
  CONSTRAINT `hospitals_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `hospitals` WRITE;
/*!40000 ALTER TABLE `hospitals` DISABLE KEYS */;

INSERT INTO `hospitals` (`id`, `address_id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,'DiaSpectrEx Clinic',NULL,'2018-06-24 03:06:34','2018-06-24 03:06:34',NULL);

/*!40000 ALTER TABLE `hospitals` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2018_04_26_000000_create_permission_tables',1),
	(4,'2018_04_26_100000_create_patient_types_table',1),
	(5,'2018_04_26_182500_create_diagnostic_groups_table',1),
	(6,'2018_04_26_183027_create_tests_table',1),
	(7,'2018_05_05_140759_create_hospitals_table',1),
	(8,'2018_05_06_021132_create_patient_cards_table',1),
	(9,'2018_05_06_021208_create_phones_table',1),
	(10,'2018_05_06_122343_create_countries_table',1),
	(11,'2018_05_06_122820_create_regions_table',1),
	(12,'2018_05_06_123143_create_cities_table',1),
	(13,'2018_05_06_123542_create_streets_table',1),
	(14,'2018_05_07_004501_create_addresses_table',1),
	(15,'2018_05_07_005051_add_foreign_keys_to_users',1),
	(16,'2018_05_07_005210_add_foreign_keys_to_hospitals',1),
	(17,'2018_05_08_011809_create_examinations_table',1),
	(18,'2018_05_08_012732_create_services_table',1),
	(19,'2018_05_08_013021_create_classifiers_table',1),
	(20,'2018_05_08_013156_create_seances_table',1),
	(21,'2018_05_08_013748_create_seance_service_table',1),
	(22,'2018_05_10_015623_add_hospital_id_to_users',1),
	(23,'2018_05_12_122506_create_activity_log_table',1),
	(24,'2018_05_22_002055_rename_phone_in_phones',1),
	(25,'2018_06_11_102836_create_predictions_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы patient_cards
# ------------------------------------------------------------

DROP TABLE IF EXISTS `patient_cards`;

CREATE TABLE `patient_cards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_id` int(10) unsigned NOT NULL,
  `patient_type_id` int(10) unsigned NOT NULL,
  `allergies` text COLLATE utf8mb4_unicode_ci,
  `diseases` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_cards_patient_id_foreign` (`patient_id`),
  KEY `patient_cards_patient_type_id_foreign` (`patient_type_id`),
  CONSTRAINT `patient_cards_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `patient_cards_patient_type_id_foreign` FOREIGN KEY (`patient_type_id`) REFERENCES `patient_types` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `patient_cards` WRITE;
/*!40000 ALTER TABLE `patient_cards` DISABLE KEYS */;

INSERT INTO `patient_cards` (`id`, `code`, `patient_id`, `patient_type_id`, `allergies`, `diseases`, `is_active`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'C1',1,2,NULL,NULL,0,'2000-01-01 00:00:00','2018-01-01 00:00:00',NULL),
	(2,'A1',1,1,NULL,NULL,1,'2018-01-01 00:00:00','2018-01-01 00:00:00',NULL);

/*!40000 ALTER TABLE `patient_cards` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы patient_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `patient_types`;

CREATE TABLE `patient_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `patient_types` WRITE;
/*!40000 ALTER TABLE `patient_types` DISABLE KEYS */;

INSERT INTO `patient_types` (`id`, `name`, `display_name`, `deleted_at`)
VALUES
	(1,'adult','Adults',NULL),
	(2,'child','Children',NULL);

/*!40000 ALTER TABLE `patient_types` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы permission_model
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_model`;

CREATE TABLE `permission_model` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `permission_model_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `permission_model_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'be support','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(2,'be patient','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(3,'be employee','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(4,'be doctor','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(5,'be head','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(6,'access support pages','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(7,'access patient pages','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(8,'access employee pages','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(9,'access doctor pages','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(10,'access head pages','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(11,'see users','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(12,'manage supports','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(13,'manage patients','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(14,'manage employees','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(15,'manage doctors','api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(16,'manage heads','api','2018-06-24 03:06:34','2018-06-24 03:06:34');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы phones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `phones`;

CREATE TABLE `phones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phoneable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneable_id` bigint(20) unsigned NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phones_phone_unique` (`number`),
  KEY `phones_phoneable_type_phoneable_id_index` (`phoneable_type`,`phoneable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы predictions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `predictions`;

CREATE TABLE `predictions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seance_id` int(10) unsigned NOT NULL,
  `classifier_id` int(10) unsigned NOT NULL,
  `diagnostic_group_id` int(10) unsigned NOT NULL,
  `test_id` int(10) unsigned DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `raw_value` double(8,2) DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `predictions_seance_id_foreign` (`seance_id`),
  KEY `predictions_classifier_id_foreign` (`classifier_id`),
  KEY `predictions_diagnostic_group_id_foreign` (`diagnostic_group_id`),
  KEY `predictions_test_id_foreign` (`test_id`),
  CONSTRAINT `predictions_classifier_id_foreign` FOREIGN KEY (`classifier_id`) REFERENCES `classifiers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `predictions_diagnostic_group_id_foreign` FOREIGN KEY (`diagnostic_group_id`) REFERENCES `diagnostic_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `predictions_seance_id_foreign` FOREIGN KEY (`seance_id`) REFERENCES `seances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `predictions_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `predictions` WRITE;
/*!40000 ALTER TABLE `predictions` DISABLE KEYS */;

INSERT INTO `predictions` (`id`, `seance_id`, `classifier_id`, `diagnostic_group_id`, `test_id`, `is_approved`, `raw_value`, `info`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,2,1,3,1,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(2,2,1,3,2,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(3,2,1,3,3,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(4,2,1,3,4,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(5,2,1,3,5,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(6,2,1,3,6,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(7,2,1,3,7,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(8,2,1,3,8,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(9,2,1,3,9,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(10,2,1,3,10,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(11,2,1,3,11,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(12,2,1,3,12,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(13,2,1,3,13,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(14,2,1,3,14,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(15,2,1,3,15,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(16,2,1,3,16,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(17,2,1,3,17,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(18,2,1,3,18,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(19,2,1,3,19,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(20,2,1,3,20,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(21,2,1,3,21,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(22,2,1,3,22,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(23,2,1,3,23,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(24,2,1,3,24,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(25,2,1,3,25,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(26,2,1,3,26,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(27,2,1,3,27,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(28,2,1,3,28,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(29,2,1,3,29,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(30,2,1,3,30,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(31,2,1,3,31,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(32,2,1,3,32,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(33,2,1,3,33,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(34,2,1,3,34,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(35,2,1,3,35,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(36,2,1,3,36,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(37,2,1,3,37,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(38,2,1,3,38,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(39,2,1,3,39,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(40,2,1,3,40,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(41,2,1,3,41,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(42,2,1,3,42,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(43,2,1,3,43,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(44,2,1,3,44,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(45,2,1,3,45,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(46,2,1,3,46,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(47,2,1,3,47,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(48,2,1,3,48,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(49,2,1,3,49,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(50,2,1,3,50,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(51,2,1,3,51,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(52,2,1,3,52,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(53,2,1,1,53,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(54,2,1,1,54,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(55,2,1,1,55,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(56,2,1,1,56,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(57,2,1,1,57,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(58,2,1,1,58,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(59,2,1,1,59,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(60,2,1,1,60,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(61,2,1,1,61,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(62,2,1,1,62,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(63,2,1,1,63,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(64,2,1,1,64,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(65,2,1,1,65,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(66,2,1,1,66,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(67,2,1,1,67,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(68,2,1,1,68,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(69,2,1,1,69,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(70,2,1,1,70,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(71,2,1,1,71,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(72,2,1,1,72,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(73,2,1,1,73,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(74,2,1,1,74,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(75,2,1,1,75,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(76,2,1,1,76,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(77,2,1,1,77,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(78,2,1,1,78,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(79,2,1,1,79,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(80,2,1,1,80,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(81,2,1,1,81,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(82,2,1,1,82,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(83,2,1,1,83,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(84,2,1,1,84,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(85,2,1,1,85,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(86,2,1,1,86,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(87,2,1,1,87,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(88,2,1,1,88,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(89,2,1,1,89,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(90,2,1,1,90,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(91,2,1,1,91,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(92,2,1,1,92,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(93,2,1,1,93,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(94,2,1,1,94,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(95,2,1,1,95,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(96,2,1,1,96,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(97,2,1,1,97,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(98,2,1,1,98,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(99,2,1,1,99,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(100,2,1,1,100,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(101,2,1,1,101,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(102,2,1,1,102,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(103,2,1,1,103,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(104,2,1,1,104,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(105,2,1,1,105,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(106,2,1,1,106,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(107,2,1,1,107,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(108,2,1,1,108,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(109,2,1,1,109,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(110,2,1,1,110,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(111,2,1,1,111,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(112,2,1,1,112,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(113,2,1,1,113,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(114,2,1,1,114,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(115,2,1,1,115,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(116,2,1,1,116,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(117,2,1,1,117,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(118,2,1,1,118,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(119,2,1,1,119,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(120,2,1,1,120,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(121,2,1,1,121,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(122,2,1,1,122,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(123,2,1,1,123,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(124,2,1,1,124,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(125,2,1,1,125,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(126,2,1,1,126,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(127,2,1,1,127,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(128,2,1,1,128,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(129,2,1,1,129,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(130,2,1,1,130,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(131,2,1,1,131,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(132,2,1,1,132,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(133,2,1,1,133,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(134,2,1,1,134,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(135,2,1,1,135,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(136,2,1,1,136,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(137,2,1,1,137,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(138,2,1,1,138,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(139,2,1,1,139,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(140,2,1,1,140,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(141,2,1,1,141,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(142,2,1,1,142,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(143,2,1,1,143,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(144,2,1,1,144,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(145,2,1,1,145,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(146,2,1,1,146,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(147,2,1,1,147,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(148,2,1,1,148,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(149,2,1,1,149,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(150,2,1,1,150,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(151,2,1,1,151,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(152,2,1,1,152,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(153,2,1,1,153,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(154,2,1,1,154,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(155,2,1,1,155,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(156,2,1,1,156,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(157,2,1,1,157,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(158,2,1,1,158,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(159,2,1,1,159,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(160,2,1,1,160,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(161,2,1,1,161,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(162,2,1,1,162,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(163,2,1,1,163,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(164,2,1,1,164,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(165,2,1,1,165,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(166,2,1,1,166,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(167,2,1,1,167,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(168,2,1,1,168,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(169,2,1,1,169,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(170,2,1,1,170,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(171,2,1,1,171,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(172,2,1,1,172,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(173,2,1,1,173,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(174,2,1,1,174,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(175,2,1,1,175,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(176,2,1,1,176,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(177,2,1,1,177,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(178,2,1,1,178,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(179,2,1,1,179,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(180,2,1,1,180,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(181,2,1,1,181,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(182,2,1,1,182,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(183,2,1,1,183,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(184,2,1,1,184,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(185,2,1,1,185,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(186,2,1,1,186,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(187,2,1,1,187,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(188,2,1,1,188,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(189,2,1,1,189,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(190,2,1,1,190,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(191,2,1,1,191,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(192,2,1,1,192,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(193,2,1,4,193,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(194,2,1,4,194,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(195,2,1,4,195,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(196,2,1,4,196,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(197,2,1,4,197,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(198,2,1,4,198,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(199,2,1,4,199,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(200,2,1,4,200,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(201,2,1,4,201,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(202,2,1,4,202,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(203,2,1,4,203,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(204,2,1,4,204,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(205,2,1,4,205,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(206,2,1,4,206,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(207,2,1,4,207,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(208,2,1,4,208,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(209,2,1,4,209,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(210,2,1,4,210,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(211,2,1,4,211,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(212,2,1,4,212,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(213,2,1,4,213,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(214,2,1,4,214,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(215,2,1,4,215,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(216,2,1,4,216,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(217,2,1,4,217,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(218,2,1,4,218,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(219,2,1,4,219,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(220,2,1,4,220,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(221,2,1,4,221,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(222,2,1,4,222,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(223,2,1,4,223,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(224,2,1,4,224,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(225,2,1,4,225,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(226,2,1,4,226,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(227,2,1,4,227,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(228,2,1,4,228,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(229,2,1,4,229,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(230,2,1,4,230,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(231,2,1,4,231,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(232,2,1,4,232,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(233,2,1,4,233,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(234,2,1,4,234,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(235,2,1,4,235,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(236,2,1,4,236,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(237,2,1,4,237,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(238,2,1,4,238,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(239,2,1,4,239,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(240,2,1,4,240,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(241,2,1,4,241,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(242,2,1,4,242,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(243,2,1,4,243,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(244,2,1,4,244,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(245,2,1,4,245,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(246,2,1,4,246,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(247,2,1,4,247,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(248,2,1,4,248,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(249,2,1,4,249,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(250,2,1,4,250,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(251,2,1,4,251,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(252,2,1,4,252,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(253,2,1,4,253,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(254,2,1,4,254,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(255,2,1,4,255,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(256,2,1,4,256,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(257,2,1,4,257,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(258,2,1,4,258,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(259,2,1,4,259,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(260,2,1,4,260,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(261,2,1,4,261,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(262,2,1,4,262,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(263,2,1,4,263,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(264,2,1,4,264,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(265,2,1,4,265,1,NULL,'Database seeding','2018-06-24 03:06:35','2018-06-24 03:06:35',NULL),
	(266,1,2,5,266,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(267,1,2,5,267,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(268,1,2,5,268,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(269,1,2,5,269,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(270,1,2,5,270,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(271,1,2,5,271,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(272,1,2,5,272,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(273,1,2,5,273,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(274,1,2,5,274,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(275,1,2,5,275,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(276,1,2,5,276,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(277,1,2,5,277,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(278,1,2,5,278,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(279,1,2,5,279,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(280,1,2,5,280,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(281,1,2,5,281,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(282,1,2,5,282,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(283,1,2,5,283,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(284,1,2,5,284,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(285,1,2,5,285,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(286,1,2,5,286,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(287,1,2,5,287,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(288,1,2,5,288,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(289,1,2,5,289,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(290,1,2,5,290,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(291,1,2,5,291,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(292,1,2,5,292,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(293,1,2,5,293,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(294,1,2,5,294,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(295,1,2,6,295,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(296,1,2,6,296,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(297,1,2,6,297,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(298,1,2,6,298,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(299,1,2,6,299,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(300,1,2,6,300,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(301,1,2,6,301,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(302,1,2,6,302,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(303,1,2,6,303,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(304,1,2,6,304,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(305,1,2,6,305,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(306,1,2,6,306,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(307,1,2,6,307,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(308,1,2,6,308,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(309,1,2,6,309,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(310,1,2,6,310,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(311,1,2,6,311,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(312,1,2,6,312,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(313,1,2,6,313,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(314,1,2,6,314,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(315,1,2,6,315,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(316,1,2,6,316,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(317,1,2,6,317,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(318,1,2,6,318,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(319,1,2,6,319,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(320,1,2,6,320,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(321,1,2,6,321,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(322,1,2,6,322,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(323,1,2,6,323,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(324,1,2,6,324,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(325,1,2,6,325,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(326,1,2,6,326,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(327,1,2,6,327,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(328,1,2,6,328,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(329,1,2,6,329,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(330,1,2,6,330,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(331,1,2,6,331,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(332,1,2,6,332,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(333,1,2,6,333,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(334,1,2,6,334,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(335,1,2,6,335,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(336,1,2,6,336,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(337,1,2,6,337,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(338,1,2,6,338,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(339,1,2,6,339,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(340,1,2,7,340,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(341,1,2,7,341,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(342,1,2,7,342,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(343,1,2,7,343,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(344,1,2,7,344,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(345,1,2,7,345,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(346,1,2,7,346,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(347,1,2,7,347,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(348,1,2,7,348,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(349,1,2,7,349,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(350,1,2,7,350,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(351,1,2,7,351,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(352,1,2,7,352,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(353,1,2,7,353,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(354,1,2,7,354,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(355,1,2,7,355,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(356,1,2,7,356,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(357,1,2,8,357,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(358,1,2,8,358,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(359,1,2,8,359,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(360,1,2,8,360,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(361,1,2,8,361,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(362,1,2,8,362,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(363,1,2,8,363,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(364,1,2,8,364,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(365,1,2,8,365,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(366,1,2,8,366,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(367,1,2,8,367,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(368,1,2,8,368,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(369,1,2,8,369,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(370,1,2,8,370,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(371,1,2,8,371,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(372,1,2,2,372,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(373,1,2,2,373,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(374,1,2,2,374,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(375,1,2,2,375,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(376,1,2,2,376,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(377,1,2,2,377,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(378,1,2,2,378,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(379,1,2,2,379,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(380,1,2,2,380,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(381,1,2,2,381,1,NULL,'Database seeding','2018-06-24 03:06:36','2018-06-24 03:06:36',NULL);

/*!40000 ALTER TABLE `predictions` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы regions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `regions`;

CREATE TABLE `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `regions_country_id_name_unique` (`country_id`,`name`),
  CONSTRAINT `regions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;

INSERT INTO `regions` (`id`, `country_id`, `name`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,233,'Cherkasy Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(2,233,'Chernihiv Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(3,233,'Chernivtsi Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(4,233,'Dnipropetrovsk Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(5,233,'Donetsk Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(6,233,'Ivano-Frankivsk Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(7,233,'Kharkiv Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(8,233,'Kherson Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(9,233,'Khmelnytskyi Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(10,233,'Kiev Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(11,233,'Kirovohrad Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(12,233,'Luhansk Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(13,233,'Lviv Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(14,233,'Mykolaiv Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(15,233,'Odessa Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(16,233,'Poltava Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(17,233,'Rivne Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(18,233,'Sumy Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(19,233,'Ternopil Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(20,233,'Vinnytsia Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(21,233,'Volyn Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(22,233,'Zakarpattia Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(23,233,'Zaporizhia Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(24,233,'Zhytomyr Oblast','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL);

/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы role_model
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_model`;

CREATE TABLE `role_model` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `role_model_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `role_model_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_model` WRITE;
/*!40000 ALTER TABLE `role_model` DISABLE KEYS */;

INSERT INTO `role_model` (`role_id`, `model_type`, `model_id`)
VALUES
	(1,'User',1),
	(2,'User',2),
	(3,'User',3),
	(4,'User',4),
	(5,'User',5);

/*!40000 ALTER TABLE `role_model` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы role_permission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_permission`;

CREATE TABLE `role_permission` (
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_permission_role_id_foreign` (`role_id`),
  CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_permission` WRITE;
/*!40000 ALTER TABLE `role_permission` DISABLE KEYS */;

INSERT INTO `role_permission` (`role_id`, `permission_id`)
VALUES
	(1,1),
	(1,2),
	(1,3),
	(1,4),
	(1,5),
	(1,6),
	(1,7),
	(1,8),
	(1,9),
	(1,10),
	(1,11),
	(1,12),
	(1,13),
	(1,14),
	(1,15),
	(1,16),
	(2,2),
	(2,7),
	(2,11),
	(3,3),
	(3,8),
	(3,11),
	(3,13),
	(3,14),
	(4,3),
	(4,4),
	(4,8),
	(4,9),
	(4,11),
	(4,13),
	(4,14),
	(4,15),
	(5,3),
	(5,4),
	(5,5),
	(5,8),
	(5,9),
	(5,10),
	(5,11),
	(5,13),
	(5,14),
	(5,15),
	(5,16);

/*!40000 ALTER TABLE `role_permission` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'support','Tech Support',NULL,'api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(2,'patient','Patient',NULL,'api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(3,'employee','Employee',NULL,'api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(4,'doctor','Doctor',NULL,'api','2018-06-24 03:06:34','2018-06-24 03:06:34'),
	(5,'head','Head Doctor',NULL,'api','2018-06-24 03:06:34','2018-06-24 03:06:34');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы seance_service
# ------------------------------------------------------------

DROP TABLE IF EXISTS `seance_service`;

CREATE TABLE `seance_service` (
  `seance_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы seances
# ------------------------------------------------------------

DROP TABLE IF EXISTS `seances`;

CREATE TABLE `seances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `examination_id` int(10) unsigned NOT NULL,
  `doctor_id` int(10) unsigned DEFAULT NULL,
  `complaints` text COLLATE utf8mb4_unicode_ci,
  `diagnosis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `started_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ended_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seances_examination_id_foreign` (`examination_id`),
  KEY `seances_doctor_id_foreign` (`doctor_id`),
  CONSTRAINT `seances_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `seances_examination_id_foreign` FOREIGN KEY (`examination_id`) REFERENCES `examinations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `seances` WRITE;
/*!40000 ALTER TABLE `seances` DISABLE KEYS */;

INSERT INTO `seances` (`id`, `examination_id`, `doctor_id`, `complaints`, `diagnosis`, `notes`, `started_at`, `updated_at`, `ended_at`, `deleted_at`)
VALUES
	(1,1,1,NULL,NULL,'Database seeding','2000-01-01 01:00:00','2000-01-01 01:00:00','2000-01-01 01:00:00',NULL),
	(2,2,1,NULL,NULL,'Database seeding','2018-01-01 01:00:00','2018-01-01 01:00:00','2018-01-01 01:00:00',NULL);

/*!40000 ALTER TABLE `seances` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы streets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `streets`;

CREATE TABLE `streets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `streets_city_id_foreign` (`city_id`),
  CONSTRAINT `streets_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `streets` WRITE;
/*!40000 ALTER TABLE `streets` DISABLE KEYS */;

INSERT INTO `streets` (`id`, `city_id`, `name`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,12,'Derybasivska','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(2,12,'Hrets\'ka,','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(3,12,'Bunina','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(4,12,'Zhukovs\'koho','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(5,12,'Yevreis\'ka','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(6,12,'Troitska','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(7,12,'Uspenska','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(8,12,'Bazarna','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(9,12,'Velyka Arnauts\'ka','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(10,12,'Mala Arnauts\'ka','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(11,12,'Panteleimonivs\'ka','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(12,12,'Osypova','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(13,12,'Pushkins\'ka','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(14,12,'Rishelievska','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(15,12,'Katerynyns\'ka','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(16,12,'Oleksandrivs\'kyi Ave','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(17,12,'Preobrazhens\'ka','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(18,12,'Zaslavs\'koho','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(19,12,'Shevchenka Ave','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL);

/*!40000 ALTER TABLE `streets` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы tests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tests`;

CREATE TABLE `tests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d2` double(8,2) NOT NULL,
  `d3` double(8,2) NOT NULL,
  `d4` double(8,2) NOT NULL,
  `d5` double(8,2) NOT NULL,
  `d6` double(8,2) NOT NULL,
  `d8` double(8,2) NOT NULL,
  `d11` double(8,2) NOT NULL,
  `d15` double(8,2) NOT NULL,
  `d20` double(8,2) NOT NULL,
  `d26` double(8,2) NOT NULL,
  `d36` double(8,2) NOT NULL,
  `d40` double(8,2) NOT NULL,
  `d65` double(8,2) NOT NULL,
  `d85` double(8,2) NOT NULL,
  `d120` double(8,2) NOT NULL,
  `d150` double(8,2) NOT NULL,
  `d210` double(8,2) NOT NULL,
  `d290` double(8,2) NOT NULL,
  `d300` double(8,2) NOT NULL,
  `d520` double(8,2) NOT NULL,
  `d700` double(8,2) NOT NULL,
  `d950` double(8,2) NOT NULL,
  `d1300` double(8,2) NOT NULL,
  `d1700` double(8,2) NOT NULL,
  `d2300` double(8,2) NOT NULL,
  `d3100` double(8,2) NOT NULL,
  `d4200` double(8,2) NOT NULL,
  `d5600` double(8,2) NOT NULL,
  `d7600` double(8,2) NOT NULL,
  `d10200` double(8,2) NOT NULL,
  `d13800` double(8,2) NOT NULL,
  `d18500` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;

INSERT INTO `tests` (`id`, `file_path`, `d2`, `d3`, `d4`, `d5`, `d6`, `d8`, `d11`, `d15`, `d20`, `d26`, `d36`, `d40`, `d65`, `d85`, `d120`, `d150`, `d210`, `d290`, `d300`, `d520`, `d700`, `d950`, `d1300`, `d1700`, `d2300`, `d3100`, `d4200`, `d5600`, `d7600`, `d10200`, `d13800`, `d18500`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'tests/other classifiers/adult.training.xlsx',41.16,34.30,17.46,1.65,0.03,0.00,0.00,1.59,0.27,0.01,0.00,0.00,0.90,0.62,0.08,1.12,0.76,0.06,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(2,'tests/other classifiers/adult.training.xlsx',91.20,0.00,0.00,0.00,0.00,0.00,0.00,1.07,1.61,0.44,0.00,0.00,0.00,2.56,2.40,0.72,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(3,'tests/other classifiers/adult.training.xlsx',28.27,2.31,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,40.85,24.24,4.33,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(4,'tests/other classifiers/adult.training.xlsx',97.56,0.00,0.00,0.00,0.00,0.00,0.00,1.06,0.16,0.00,0.00,0.00,0.00,0.00,0.00,0.18,0.48,0.11,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.42,0.04,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(5,'tests/other classifiers/adult.training.xlsx',40.32,27.45,18.37,10.87,0.00,0.00,0.00,1.57,0.35,0.04,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.65,0.34,0.04,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(6,'tests/other classifiers/adult.training.xlsx',98.03,0.00,0.00,0.00,0.00,0.00,0.42,1.09,0.12,0.00,0.00,0.00,0.00,0.00,0.11,0.09,0.02,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.11,0.01,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(7,'tests/other classifiers/adult.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,5.45,1.33,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,20.52,63.40,9.29,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(8,'tests/other classifiers/adult.training.xlsx',66.74,23.69,6.68,0.00,0.00,0.09,1.32,0.19,0.00,0.00,0.00,0.00,0.57,0.20,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.23,0.25,0.05,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(9,'tests/other classifiers/adult.training.xlsx',92.24,5.66,0.00,0.00,0.00,0.13,0.27,0.03,0.89,0.23,0.00,0.00,0.00,0.00,0.00,0.38,0.17,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(10,'tests/other classifiers/adult.training.xlsx',98.98,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.03,0.03,0.00,0.18,0.56,0.20,0.01,0.02,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(11,'tests/other classifiers/adult.training.xlsx',0.22,0.21,0.31,0.40,0.97,2.55,6.07,12.86,22.99,36.58,9.87,0.00,0.00,0.00,0.00,1.81,0.98,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.04,1.13,0.02,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(12,'tests/other classifiers/adult.training.xlsx',96.96,0.00,0.00,0.00,0.00,0.00,2.21,0.34,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.26,0.21,0.02,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(13,'tests/other classifiers/adult.training.xlsx',96.96,0.00,0.00,0.00,0.00,0.00,2.21,0.34,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.26,0.21,0.02,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(14,'tests/other classifiers/adult.training.xlsx',0.00,0.00,0.00,1.10,35.89,8.29,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,18.23,19.35,5.39,0.00,0.00,0.00,9.75,2.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(15,'tests/other classifiers/adult.training.xlsx',0.00,0.00,0.00,0.19,5.13,1.90,0.13,0.00,0.00,0.00,0.00,0.00,0.00,0.00,11.40,5.87,0.84,0.00,0.00,0.00,0.00,0.00,19.06,45.42,10.06,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(16,'tests/other classifiers/adult.training.xlsx',57.17,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,22.66,18.20,1.97,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(17,'tests/other classifiers/adult.training.xlsx',54.19,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.21,4.67,0.66,0.00,0.00,0.00,17.54,9.71,10.01,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(18,'tests/other classifiers/adult.training.xlsx',61.84,26.77,8.10,0.00,0.00,0.00,0.28,1.58,0.24,0.00,0.00,0.15,0.13,0.00,0.00,0.21,0.11,0.19,0.39,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(19,'tests/other classifiers/adult.training.xlsx',46.84,25.28,11.62,1.48,0.03,0.00,0.57,1.70,0.27,0.00,0.00,1.81,1.64,0.00,0.00,0.00,2.42,2.52,3.83,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(20,'tests/other classifiers/adult.training.xlsx',34.19,3.05,0.00,0.00,0.00,0.00,3.57,7.61,1.06,0.00,0.00,0.00,0.00,0.00,31.99,16.66,1.86,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(21,'tests/other classifiers/adult.training.xlsx',4.67,2.42,2.78,2.87,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,19.54,8.54,0.62,0.00,0.00,0.00,5.68,44.84,8.03,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(22,'tests/other classifiers/adult.training.xlsx',89.18,9.08,0.00,0.00,0.00,0.00,0.00,1.36,0.16,0.00,0.00,0.00,0.00,0.00,0.04,0.05,0.02,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.02,0.08,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(23,'tests/other classifiers/adult.training.xlsx',99.38,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.19,0.42,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.01,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(24,'tests/other classifiers/adult.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.05,9.97,14.61,33.92,27.61,3.65,0.00,0.00,0.00,0.16,0.31,0.00,0.97,0.95,0.12,0.00,0.00,0.15,1.12,0.29,0.00,3.85,0.26,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(25,'tests/other classifiers/adult.training.xlsx',99.97,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.01,0.02,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(26,'tests/other classifiers/adult.training.xlsx',0.22,0.17,0.22,0.27,0.62,1.56,3.61,7.51,13.57,24.46,18.04,14.68,0.00,0.00,0.00,0.00,0.00,0.00,1.41,1.78,0.00,0.00,0.00,0.00,2.40,1.62,0.24,0.00,0.00,7.07,0.54,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(27,'tests/other classifiers/adult.training.xlsx',57.94,33.06,0.00,0.00,0.00,4.18,1.85,0.13,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.88,0.81,1.15,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(28,'tests/other classifiers/adult.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,5.29,22.27,42.22,23.46,3.60,0.00,0.00,0.10,1.13,1.23,0.00,0.00,0.00,0.19,0.20,0.04,0.00,0.00,0.00,0.22,0.02,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(29,'tests/other classifiers/adult.training.xlsx',13.79,28.68,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,6.93,3.18,0.57,0.00,0.00,6.21,33.74,6.89,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(30,'tests/other classifiers/adult.training.xlsx',90.45,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.61,0.16,0.00,0.00,0.00,0.00,0.00,0.00,2.78,1.04,0.71,0.00,0.00,0.39,3.20,0.67,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(31,'tests/other classifiers/adult.training.xlsx',99.92,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.08,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(32,'tests/other classifiers/adult.training.xlsx',99.92,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.07,0.02,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(33,'tests/other classifiers/adult.training.xlsx',99.40,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.15,0.26,0.07,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.09,0.02,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(34,'tests/other classifiers/adult.training.xlsx',0.17,0.21,0.33,0.43,1.10,2.92,6.92,14.28,24.23,35.40,8.16,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.68,0.19,0.00,0.00,0.11,0.72,0.20,0.00,0.00,0.00,3.64,0.31,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(35,'tests/other classifiers/adult.training.xlsx',28.38,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,40.36,28.74,2.52,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(36,'tests/other classifiers/adult.training.xlsx',25.06,50.84,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.17,6.13,11.92,3.20,1.68,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(37,'tests/other classifiers/adult.training.xlsx',95.76,0.00,0.00,0.00,0.00,0.00,0.00,1.68,0.27,0.00,0.00,0.00,0.00,0.00,0.00,0.54,1.42,0.32,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(38,'tests/other classifiers/adult.training.xlsx',93.86,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.74,0.22,0.00,0.00,0.00,0.09,3.40,1.68,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(39,'tests/other classifiers/adult.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,5.27,46.95,47.78,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(40,'tests/other classifiers/adult.training.xlsx',20.44,52.35,9.77,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,12.37,5.07,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(41,'tests/other classifiers/adult.training.xlsx',37.36,0.00,0.00,0.00,0.00,0.00,0.00,0.00,6.29,3.19,0.40,0.00,0.00,0.00,0.00,26.87,23.23,2.66,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(42,'tests/other classifiers/adult.training.xlsx',99.27,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.28,0.23,0.00,0.00,0.00,0.04,0.07,0.11,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(43,'tests/other classifiers/adult.training.xlsx',98.38,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.17,0.22,0.00,0.00,0.00,0.00,0.26,0.28,0.43,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.24,0.02,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(44,'tests/other classifiers/adult.training.xlsx',0.25,0.26,0.38,0.49,1.21,3.14,7.33,14.91,24.66,33.33,7.99,0.00,0.00,0.00,0.00,0.00,0.00,0.18,0.37,0.00,0.00,0.00,0.00,0.00,0.03,0.88,0.25,0.00,0.00,3.94,0.40,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(45,'tests/other classifiers/adult.training.xlsx',61.55,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.15,12.36,22.94,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(46,'tests/other classifiers/adult.training.xlsx',97.53,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.04,0.90,0.15,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.35,0.03,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(47,'tests/other classifiers/adult.training.xlsx',1.06,0.20,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,10.60,2.83,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.41,27.74,7.89,0.00,45.39,3.86,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(48,'tests/other classifiers/adult.training.xlsx',92.89,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.72,5.05,1.35,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(49,'tests/other classifiers/adult.training.xlsx',97.14,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.03,0.54,0.00,0.00,0.00,0.00,0.23,0.06,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(50,'tests/other classifiers/adult.training.xlsx',82.20,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.23,1.57,1.15,0.00,0.00,0.00,4.13,7.24,1.48,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(51,'tests/other classifiers/adult.training.xlsx',18.83,0.00,0.00,0.00,1.72,1.51,0.26,0.00,0.00,0.00,0.00,0.00,0.00,0.00,17.17,42.03,18.48,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(52,'tests/other classifiers/adult.training.xlsx',71.92,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,21.06,6.71,0.32,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(53,'tests/other classifiers/adult.training.xlsx',92.28,0.00,0.00,0.00,0.00,0.03,4.16,0.54,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.86,1.91,0.22,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(54,'tests/other classifiers/adult.training.xlsx',93.94,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.47,0.55,0.00,0.78,0.18,0.00,0.00,0.94,2.38,0.75,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(55,'tests/other classifiers/adult.training.xlsx',80.33,0.00,0.00,0.00,0.00,0.00,0.00,1.04,0.39,0.07,0.00,0.00,0.00,0.00,2.33,0.87,0.00,0.00,4.06,9.71,1.21,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(56,'tests/other classifiers/adult.training.xlsx',95.20,0.00,0.00,0.00,0.00,1.54,0.32,0.00,0.00,0.00,0.00,0.00,0.00,1.06,1.43,0.44,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(57,'tests/other classifiers/adult.training.xlsx',84.98,0.00,0.00,0.00,0.00,0.00,1.82,0.24,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.75,2.44,0.19,0.00,0.00,0.00,1.24,4.41,0.93,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(58,'tests/other classifiers/adult.training.xlsx',79.67,0.00,0.00,0.00,0.00,0.00,0.00,0.80,0.57,0.12,0.00,0.00,0.00,0.00,0.00,4.36,12.00,2.48,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(59,'tests/other classifiers/adult.training.xlsx',94.46,0.00,0.00,0.00,0.00,0.00,0.00,1.78,0.24,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.10,0.76,0.86,0.66,0.45,0.28,0.17,0.11,0.08,0.06,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(60,'tests/other classifiers/adult.training.xlsx',90.02,0.00,0.00,0.00,0.00,0.00,0.00,0.87,0.84,0.19,0.00,0.00,1.25,0.95,0.13,0.00,0.00,0.00,0.79,4.15,0.81,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(61,'tests/other classifiers/adult.training.xlsx',62.12,0.00,0.00,0.00,0.00,0.00,0.00,4.00,3.77,0.85,0.00,0.00,0.00,2.38,9.01,10.05,6.41,0.99,0.36,0.06,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(62,'tests/other classifiers/adult.training.xlsx',97.45,0.00,0.00,0.00,0.00,0.00,0.50,1.44,0.18,0.00,0.00,0.00,0.00,0.00,0.21,0.18,0.05,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(63,'tests/other classifiers/adult.training.xlsx',90.51,0.00,0.00,0.00,0.00,2.25,0.47,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.60,3.58,0.60,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(64,'tests/other classifiers/adult.training.xlsx',36.95,0.00,0.00,0.00,0.00,0.00,0.00,1.35,2.26,0.55,0.00,0.00,0.00,4.30,2.12,0.42,0.00,10.86,28.97,10.33,0.00,0.48,0.72,0.56,0.13,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(65,'tests/other classifiers/adult.training.xlsx',79.31,0.00,1.75,4.09,8.12,2.08,0.00,0.00,0.00,0.00,0.00,0.11,1.89,0.58,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.41,0.61,0.06,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(66,'tests/other classifiers/adult.training.xlsx',35.51,0.00,0.00,0.00,0.00,0.00,1.24,0.16,0.00,0.00,0.00,0.97,9.19,2.70,0.00,0.00,1.87,17.00,31.35,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(67,'tests/other classifiers/adult.training.xlsx',58.67,23.16,10.68,4.03,0.00,0.00,0.00,0.04,1.17,0.31,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.71,1.16,0.07,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(68,'tests/other classifiers/adult.training.xlsx',93.52,0.00,0.00,0.00,0.00,0.00,2.91,0.38,0.00,0.00,0.00,0.32,0.27,0.00,0.00,0.00,1.17,0.69,0.75,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(69,'tests/other classifiers/adult.training.xlsx',91.33,0.00,0.00,0.00,0.00,1.81,1.95,0.20,0.00,0.00,0.00,0.00,0.00,1.25,1.07,0.29,0.00,0.00,0.31,1.50,0.29,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(70,'tests/other classifiers/adult.training.xlsx',96.36,0.00,0.00,0.00,0.00,0.00,0.00,1.08,0.60,0.12,0.00,0.00,0.00,0.00,0.53,0.96,0.34,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(71,'tests/other classifiers/adult.training.xlsx',93.37,0.00,0.00,0.00,0.00,0.00,0.00,3.86,0.51,0.00,0.00,0.00,0.00,0.00,1.17,0.58,0.06,0.00,0.20,0.25,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(72,'tests/other classifiers/adult.training.xlsx',96.21,0.00,0.00,0.00,0.00,0.00,0.89,0.95,0.11,0.00,0.00,0.00,0.00,0.00,0.63,0.91,0.30,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(73,'tests/other classifiers/adult.training.xlsx',74.48,0.00,0.00,0.00,0.00,0.00,2.18,2.90,0.35,0.00,1.83,2.13,0.00,0.00,0.00,8.24,7.05,0.83,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(74,'tests/other classifiers/adult.training.xlsx',58.68,34.82,0.00,0.00,0.00,0.00,0.00,0.00,1.87,0.49,0.00,0.00,0.00,1.16,0.27,0.00,0.00,0.00,0.00,0.00,2.20,0.51,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(75,'tests/other classifiers/adult.training.xlsx',56.74,10.97,0.00,0.00,0.00,0.00,7.10,0.92,0.00,0.00,0.00,0.00,5.81,1.87,0.00,0.00,0.00,4.72,10.26,1.62,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(76,'tests/other classifiers/adult.training.xlsx',36.45,7.01,0.00,0.00,0.00,0.00,3.73,0.49,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,16.08,31.58,4.66,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(77,'tests/other classifiers/adult.training.xlsx',92.39,0.00,0.00,0.00,0.00,3.59,2.57,0.24,0.00,0.00,0.00,0.00,0.00,0.00,0.31,0.12,0.00,0.00,0.34,0.45,0.01,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(78,'tests/other classifiers/adult.training.xlsx',93.96,0.00,0.00,0.00,0.00,0.00,1.84,2.13,0.25,0.00,0.00,0.00,0.00,0.07,0.02,0.00,0.00,0.00,0.00,0.60,0.96,0.19,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(79,'tests/other classifiers/adult.training.xlsx',64.73,0.00,3.61,8.41,13.45,3.44,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.84,3.78,0.73,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(80,'tests/other classifiers/adult.training.xlsx',75.35,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.25,0.71,0.10,0.00,0.00,0.00,0.00,0.00,0.00,0.00,10.12,12.47,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(81,'tests/other classifiers/adult.training.xlsx',97.29,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.04,0.97,0.18,0.00,0.00,0.00,0.00,0.00,0.00,0.04,0.25,0.23,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(82,'tests/other classifiers/adult.training.xlsx',95.82,0.00,0.00,0.00,0.00,0.00,1.07,1.39,0.17,0.00,0.00,0.00,0.00,0.00,0.33,0.89,0.34,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(83,'tests/other classifiers/adult.training.xlsx',91.97,0.00,0.04,0.16,4.54,1.16,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.42,0.56,0.01,0.00,0.00,0.12,0.03,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(84,'tests/other classifiers/adult.training.xlsx',96.61,0.00,0.00,0.00,0.00,1.22,0.26,0.00,0.00,0.00,0.00,0.00,0.00,1.30,0.31,0.00,0.00,0.00,0.00,0.24,0.06,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(85,'tests/other classifiers/adult.training.xlsx',86.68,0.00,0.00,0.00,0.00,8.37,1.77,0.00,0.00,0.00,0.00,0.00,1.98,0.64,0.00,0.00,0.00,0.00,0.25,0.31,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(86,'tests/other classifiers/adult.training.xlsx',83.19,0.00,0.00,0.00,0.00,0.00,1.11,3.33,0.42,0.00,0.00,0.00,0.00,2.11,4.78,1.60,0.00,0.00,0.00,0.00,1.46,1.75,0.24,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(87,'tests/other classifiers/adult.training.xlsx',57.04,0.00,0.00,0.03,2.53,0.65,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.21,19.73,16.81,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(88,'tests/other classifiers/adult.training.xlsx',72.69,0.00,0.00,0.00,0.00,0.00,0.00,4.85,0.65,0.00,0.00,1.03,4.65,1.22,0.00,0.00,11.17,3.10,0.64,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(89,'tests/other classifiers/adult.training.xlsx',93.97,0.00,0.00,0.00,0.00,0.00,0.00,0.95,0.55,0.11,0.00,0.00,0.37,1.36,0.29,0.00,0.00,0.12,1.15,1.14,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(90,'tests/other classifiers/adult.training.xlsx',95.66,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.06,0.54,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.49,0.25,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(91,'tests/other classifiers/adult.training.xlsx',21.84,17.82,0.00,0.00,0.00,0.00,0.00,0.00,0.00,7.85,2.62,0.67,18.95,6.10,0.00,12.04,10.78,1.33,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(92,'tests/other classifiers/adult.training.xlsx',21.27,54.31,13.27,0.00,0.00,0.00,0.00,0.00,3.46,0.91,0.00,0.00,0.00,0.00,0.00,0.00,3.04,1.78,1.96,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(93,'tests/other classifiers/adult.training.xlsx',94.92,0.00,0.00,0.00,0.00,0.00,2.33,1.73,0.19,0.00,0.00,0.00,0.00,0.00,0.00,0.57,0.26,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(94,'tests/other classifiers/adult.training.xlsx',94.08,0.00,0.00,0.00,0.00,0.00,0.00,2.12,0.98,0.19,0.00,0.00,0.00,0.00,0.80,0.30,0.00,0.00,0.00,0.92,0.54,0.07,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(95,'tests/other classifiers/adult.training.xlsx',80.24,0.00,0.00,0.05,4.12,1.15,0.02,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.87,7.58,4.98,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(96,'tests/other classifiers/adult.training.xlsx',96.32,0.00,0.00,0.00,0.00,0.00,2.34,0.32,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.70,0.31,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(97,'tests/other classifiers/adult.training.xlsx',34.41,0.00,0.00,0.01,0.52,0.13,0.00,0.00,0.00,2.60,6.05,6.24,0.00,0.00,0.33,34.39,15.33,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(98,'tests/other classifiers/adult.training.xlsx',86.75,0.00,0.00,0.00,0.00,4.60,0.97,0.00,0.00,1.53,0.40,0.00,0.00,0.00,0.00,1.90,0.85,0.00,0.00,0.00,0.04,0.08,0.01,2.24,0.63,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(99,'tests/other classifiers/adult.training.xlsx',95.01,0.00,0.00,0.00,0.00,0.87,2.90,0.35,0.00,0.00,0.00,0.00,0.00,0.13,0.55,0.19,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(100,'tests/other classifiers/adult.training.xlsx',92.14,0.00,0.00,0.00,0.00,0.00,0.00,2.19,0.29,0.00,0.00,0.00,0.00,0.00,1.04,0.39,0.00,0.00,0.00,0.16,3.08,0.71,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(101,'tests/other classifiers/adult.training.xlsx',88.12,0.25,0.00,0.00,0.00,0.00,0.00,1.95,0.26,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.09,2.87,4.46,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(102,'tests/other classifiers/adult.training.xlsx',95.49,0.00,0.00,0.00,0.00,0.00,0.98,0.64,0.07,0.00,0.00,0.00,0.00,0.00,0.54,0.70,0.22,0.00,0.00,0.00,0.00,1.17,0.20,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(103,'tests/other classifiers/adult.training.xlsx',64.53,3.75,0.00,0.08,6.63,1.70,0.00,0.00,0.00,2.72,1.30,0.68,0.00,0.00,0.00,6.28,6.58,0.93,0.00,0.00,1.16,1.76,1.26,0.56,0.09,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(104,'tests/other classifiers/adult.training.xlsx',94.87,0.00,0.00,0.00,0.00,0.00,0.22,1.17,0.15,0.00,0.00,0.00,0.00,0.00,0.74,2.05,0.79,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(105,'tests/other classifiers/adult.training.xlsx',80.69,0.00,0.00,0.00,0.00,0.00,4.85,0.63,0.00,0.20,0.19,0.16,0.00,0.00,0.00,0.00,0.00,3.97,8.32,0.99,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(106,'tests/other classifiers/adult.training.xlsx',33.16,23.27,0.00,0.00,0.00,0.00,11.85,1.54,0.00,0.00,0.00,0.00,0.00,2.08,10.49,3.75,0.00,0.00,3.59,9.08,1.19,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(107,'tests/other classifiers/adult.training.xlsx',85.52,0.00,0.00,0.00,0.00,0.00,1.22,0.16,0.07,0.02,0.00,0.00,0.00,0.00,0.00,0.00,5.70,3.45,3.87,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(108,'tests/other classifiers/adult.training.xlsx',96.19,0.00,0.00,0.00,0.00,0.00,0.00,1.12,0.66,0.13,0.00,0.00,0.00,0.00,0.00,0.00,0.56,0.56,0.79,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(109,'tests/other classifiers/adult.training.xlsx',59.71,0.00,0.00,0.00,0.00,1.77,3.93,0.46,0.00,0.00,0.00,0.00,5.41,1.74,0.00,8.27,15.73,2.97,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(110,'tests/other classifiers/adult.training.xlsx',63.39,0.00,0.00,0.00,0.00,0.00,0.00,0.00,7.01,1.85,0.00,2.28,12.37,3.38,0.00,2.26,6.18,1.27,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(111,'tests/other classifiers/adult.training.xlsx',87.48,0.00,0.00,0.00,0.00,3.15,6.00,0.69,0.00,0.00,0.00,0.00,0.00,0.00,0.33,1.66,0.69,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(112,'tests/other classifiers/adult.training.xlsx',90.03,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.81,0.21,0.00,0.00,0.00,0.00,3.62,4.10,1.23,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(113,'tests/other classifiers/adult.training.xlsx',91.57,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.79,0.89,0.18,0.00,0.00,0.00,0.00,0.00,0.00,0.24,3.08,3.25,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(114,'tests/other classifiers/adult.training.xlsx',85.96,0.00,1.36,3.09,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.18,7.54,1.87,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(115,'tests/other classifiers/adult.training.xlsx',85.74,0.00,1.41,3.24,2.37,0.61,0.00,0.00,0.00,0.00,0.82,1.93,0.80,0.00,0.00,0.00,0.00,0.80,1.86,0.42,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(116,'tests/other classifiers/adult.training.xlsx',95.93,0.00,0.00,0.00,0.00,1.12,1.62,0.18,0.00,0.00,0.00,0.00,0.00,0.00,0.25,0.65,0.25,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(117,'tests/other classifiers/adult.training.xlsx',90.76,0.00,0.00,0.00,0.00,0.00,4.05,1.70,0.16,0.00,0.00,0.00,0.00,0.00,0.00,0.04,0.02,0.23,1.60,1.44,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(118,'tests/other classifiers/adult.training.xlsx',91.50,0.00,0.00,0.00,0.00,0.00,0.00,1.39,0.63,0.12,0.00,0.00,0.00,0.00,2.06,3.21,1.09,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(119,'tests/other classifiers/adult.training.xlsx',85.74,0.00,1.41,3.24,2.37,0.61,0.00,0.00,0.00,0.00,0.82,1.93,0.80,0.00,0.00,0.00,0.00,0.80,1.86,0.42,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(120,'tests/other classifiers/adult.training.xlsx',66.30,11.65,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,6.78,13.93,1.34,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(121,'tests/other classifiers/adult.training.xlsx',90.92,0.00,0.00,0.00,0.00,0.00,0.00,0.82,0.11,0.00,0.00,0.00,0.00,1.22,1.21,0.39,0.02,0.00,2.14,3.05,0.11,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(122,'tests/other classifiers/adult.training.xlsx',90.63,0.00,0.00,0.00,0.00,0.00,0.99,0.13,0.00,0.00,0.00,0.00,0.00,2.15,1.43,0.35,0.00,0.00,1.94,2.39,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(123,'tests/other classifiers/adult.training.xlsx',74.57,0.00,0.00,0.00,0.00,0.00,0.00,3.49,0.46,0.00,0.00,0.00,0.00,0.00,7.71,3.77,0.39,0.00,0.00,3.76,4.92,0.92,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(124,'tests/other classifiers/adult.training.xlsx',86.62,0.00,0.00,0.00,0.00,7.79,1.64,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.23,0.96,0.77,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(125,'tests/other classifiers/adult.training.xlsx',96.42,0.00,0.00,0.00,0.00,0.00,0.00,1.66,0.62,0.11,0.00,0.00,0.00,0.00,0.00,0.83,0.37,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(126,'tests/other classifiers/adult.training.xlsx',87.31,0.00,0.00,0.02,1.99,0.51,0.00,0.65,0.43,0.09,0.00,0.00,0.00,0.00,0.00,0.00,3.16,2.39,3.05,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.10,0.15,0.16,0.01,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(127,'tests/other classifiers/adult.training.xlsx',79.53,0.00,0.00,0.08,6.25,3.08,0.31,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.76,4.20,1.42,0.00,0.00,0.00,0.00,0.01,1.94,0.43,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(128,'tests/other classifiers/adult.training.xlsx',56.75,0.00,0.00,0.00,0.00,0.00,0.00,4.89,0.65,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,13.03,22.92,1.76,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(129,'tests/other classifiers/adult.training.xlsx',49.03,11.07,13.18,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,8.85,16.45,1.42,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(130,'tests/other classifiers/adult.training.xlsx',91.80,0.00,0.00,0.00,0.00,0.00,0.00,1.03,0.98,0.22,0.00,0.00,0.00,0.59,1.05,0.34,0.00,0.09,1.84,2.06,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(131,'tests/other classifiers/adult.training.xlsx',72.76,0.00,0.00,0.00,0.00,2.11,0.44,0.00,0.00,0.00,0.00,0.00,2.76,3.27,0.56,0.00,0.00,1.87,9.24,7.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(132,'tests/other classifiers/adult.training.xlsx',43.82,0.00,0.00,0.00,0.00,0.00,2.35,0.31,0.00,0.00,0.00,1.14,10.71,3.15,0.00,0.00,0.00,13.30,25.22,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(133,'tests/other classifiers/adult.training.xlsx',47.38,0.00,0.00,0.00,0.00,1.53,0.32,0.00,0.00,0.00,0.54,4.95,3.55,0.00,0.00,0.00,0.00,0.00,18.25,23.27,0.20,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(134,'tests/other classifiers/adult.training.xlsx',91.83,0.00,0.00,0.00,0.00,0.00,3.23,1.03,0.08,0.00,0.00,0.00,0.11,0.62,0.14,0.00,0.00,0.00,0.00,0.00,1.42,1.36,0.17,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(135,'tests/other classifiers/adult.training.xlsx',93.03,0.00,0.00,0.00,0.00,0.34,1.61,0.20,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.76,3.32,0.74,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(136,'tests/other classifiers/adult.training.xlsx',70.55,0.00,0.00,0.00,0.00,4.45,0.94,0.00,0.00,0.00,0.00,0.00,0.00,7.44,4.17,0.91,0.00,0.00,2.44,7.87,1.25,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(137,'tests/other classifiers/adult.training.xlsx',76.90,11.72,0.00,0.00,0.00,0.01,4.31,0.56,0.00,0.00,0.00,0.00,0.00,0.00,4.22,2.07,0.22,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(138,'tests/other classifiers/adult.training.xlsx',56.04,0.00,0.00,0.00,0.00,0.00,0.00,1.29,0.17,0.00,0.00,0.00,1.09,0.54,0.04,0.00,0.00,0.00,0.00,0.00,0.00,4.01,6.85,7.09,6.46,5.20,3.91,3.01,2.27,1.91,0.10,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(139,'tests/other classifiers/adult.training.xlsx',0.00,81.87,15.65,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.19,0.35,0.00,0.00,0.00,0.00,1.21,0.73,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(140,'tests/other classifiers/adult.training.xlsx',0.00,77.34,14.78,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,6.01,1.87,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(141,'tests/other classifiers/adult.training.xlsx',0.00,81.95,15.66,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.48,1.91,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(142,'tests/other classifiers/adult.training.xlsx',0.00,83.29,15.92,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.33,0.46,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(143,'tests/other classifiers/adult.training.xlsx',0.00,58.44,11.17,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,4.62,5.16,0.00,0.00,1.05,3.90,13.04,2.60,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(144,'tests/other classifiers/adult.training.xlsx',0.00,82.36,15.74,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.53,0.37,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(145,'tests/other classifiers/adult.training.xlsx',0.00,56.64,10.83,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,4.26,4.68,0.00,0.00,0.11,0.41,18.65,4.42,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(146,'tests/other classifiers/adult.training.xlsx',0.00,82.03,15.68,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.38,0.91,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(147,'tests/other classifiers/adult.training.xlsx',0.00,81.66,15.61,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.24,1.55,0.95,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(148,'tests/other classifiers/adult.training.xlsx',0.00,41.56,7.94,0.00,0.00,0.00,0.00,0.00,0.00,0.23,1.11,11.63,1.02,0.00,0.00,0.00,0.00,0.00,0.00,4.27,26.74,5.50,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(149,'tests/other classifiers/adult.training.xlsx',0.00,78.70,15.04,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.24,1.34,0.00,0.03,0.12,3.66,0.86,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(150,'tests/other classifiers/adult.training.xlsx',0.00,83.13,15.89,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.61,0.38,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(151,'tests/other classifiers/adult.training.xlsx',0.00,83.44,15.95,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.09,0.34,0.19,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(152,'tests/other classifiers/adult.training.xlsx',0.00,47.78,9.13,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,11.06,0.00,0.00,0.00,0.00,0.00,24.39,7.64,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(153,'tests/other classifiers/adult.training.xlsx',0.00,83.52,15.96,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.41,0.10,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(154,'tests/other classifiers/adult.training.xlsx',0.00,36.75,7.02,0.00,0.00,0.00,0.00,0.17,1.80,7.37,0.00,0.00,0.00,0.00,0.00,0.09,8.22,24.67,13.91,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(155,'tests/other classifiers/adult.training.xlsx',0.00,33.36,6.38,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.84,16.95,0.00,0.00,0.00,0.00,0.00,27.64,13.84,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(156,'tests/other classifiers/adult.training.xlsx',0.00,40.36,10.65,1.60,0.00,0.00,0.00,0.00,0.00,1.22,5.93,8.58,0.63,0.00,0.00,0.00,2.50,9.25,16.56,2.73,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(157,'tests/other classifiers/adult.training.xlsx',0.00,50.17,9.59,0.00,0.00,0.00,0.52,1.88,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,13.69,24.16,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(158,'tests/other classifiers/adult.training.xlsx',0.00,42.56,8.13,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,5.69,0.00,0.00,0.00,0.00,0.00,0.00,11.62,32.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(159,'tests/other classifiers/adult.training.xlsx',0.00,60.25,11.51,0.00,0.00,0.00,0.00,0.00,0.36,2.38,0.65,0.17,0.00,0.00,0.00,0.65,12.87,7.14,4.03,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(160,'tests/other classifiers/adult.training.xlsx',0.00,45.29,8.66,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,32.00,14.06,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(161,'tests/other classifiers/adult.training.xlsx',86.42,0.00,0.00,0.00,0.00,2.39,0.50,0.00,0.00,2.52,0.66,0.00,0.00,0.00,3.36,3.26,0.90,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(162,'tests/other classifiers/adult.training.xlsx',93.65,0.00,0.00,0.00,0.00,0.00,3.29,0.43,0.00,0.00,0.00,0.12,0.23,0.04,0.00,0.00,0.00,0.77,1.46,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(163,'tests/other classifiers/adult.training.xlsx',95.01,0.00,0.00,0.00,0.00,0.00,0.47,0.06,0.00,1.18,0.31,0.00,0.00,0.00,0.71,1.64,0.62,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(164,'tests/other classifiers/adult.training.xlsx',98.07,0.00,0.00,0.00,0.00,0.00,0.39,0.91,0.11,0.00,0.00,0.00,0.00,0.01,0.00,0.00,0.00,0.05,0.25,0.20,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(165,'tests/other classifiers/adult.training.xlsx',88.28,0.00,0.00,0.08,6.89,2.10,0.07,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.70,1.57,0.30,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(166,'tests/other classifiers/adult.training.xlsx',71.01,0.00,0.00,0.14,11.36,2.91,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.65,1.61,0.28,0.00,0.00,2.97,5.89,1.20,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(167,'tests/other classifiers/adult.training.xlsx',93.71,0.00,0.00,0.00,0.00,0.72,4.27,0.54,0.00,0.00,0.00,0.00,0.00,0.00,0.56,0.21,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(168,'tests/other classifiers/adult.training.xlsx',71.05,0.00,0.00,0.00,0.00,2.92,7.79,0.93,0.00,0.00,0.00,0.00,0.00,6.22,3.85,0.90,0.00,0.00,0.13,4.97,1.23,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(169,'tests/other classifiers/adult.training.xlsx',94.06,0.00,0.00,0.00,0.00,0.00,0.00,0.62,1.22,0.30,0.00,0.00,0.00,0.00,0.00,0.00,1.94,0.96,0.90,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(170,'tests/other classifiers/adult.training.xlsx',85.39,0.00,0.00,0.00,0.00,3.00,2.12,0.19,0.00,0.00,0.00,1.44,1.34,0.05,0.00,0.00,3.14,1.65,1.67,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(171,'tests/other classifiers/adult.training.xlsx',95.76,0.00,0.00,0.00,0.00,0.00,0.00,2.26,0.30,0.00,0.00,0.00,0.00,0.00,1.23,0.46,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(172,'tests/other classifiers/adult.training.xlsx',93.93,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.41,0.95,0.15,0.00,0.00,0.00,0.00,0.00,1.13,1.02,1.41,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(173,'tests/other classifiers/adult.training.xlsx',88.74,0.00,0.00,0.00,0.00,0.00,2.04,0.35,0.01,0.00,0.00,0.00,0.51,0.16,0.00,0.00,3.83,2.12,2.23,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(174,'tests/other classifiers/adult.training.xlsx',82.54,0.00,0.00,0.00,0.00,0.00,0.00,4.33,0.58,0.00,0.00,0.00,0.00,5.40,1.27,0.00,0.00,0.00,0.00,0.00,2.10,3.32,0.47,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(175,'tests/other classifiers/adult.training.xlsx',71.45,0.00,0.00,0.00,0.00,0.00,0.00,0.81,0.11,0.00,0.00,1.91,1.57,0.00,0.00,0.00,1.31,8.10,14.74,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(176,'tests/other classifiers/adult.training.xlsx',97.64,0.00,0.00,0.00,0.00,1.55,0.33,0.00,0.00,0.00,0.00,0.00,0.00,0.08,0.29,0.10,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(177,'tests/other classifiers/adult.training.xlsx',89.63,0.00,0.00,0.00,0.00,0.00,0.63,2.30,0.30,0.00,0.00,0.00,0.00,0.00,0.00,0.34,5.49,1.32,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(178,'tests/other classifiers/adult.training.xlsx',60.26,0.00,0.00,0.28,23.22,9.16,0.68,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.78,3.33,2.30,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(179,'tests/other classifiers/adult.training.xlsx',96.11,0.00,0.00,0.00,0.00,0.00,0.00,1.17,0.16,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.17,1.25,1.14,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(180,'tests/other classifiers/adult.training.xlsx',74.01,0.00,0.00,0.00,0.00,0.00,0.00,3.25,1.55,0.30,0.00,0.00,0.00,0.00,3.16,1.93,0.33,0.00,0.00,0.00,5.44,5.65,2.80,1.19,0.37,0.04,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(181,'tests/other classifiers/adult.training.xlsx',71.15,0.00,0.00,0.00,0.00,0.00,0.00,5.65,0.75,0.00,0.00,0.00,0.31,10.06,3.16,0.31,0.00,0.35,2.93,4.82,0.52,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(182,'tests/other classifiers/adult.training.xlsx',72.25,0.00,0.00,0.00,0.00,0.00,0.00,1.35,3.44,0.86,0.00,0.00,0.00,1.33,5.39,1.90,0.00,4.06,8.47,0.95,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(183,'tests/other classifiers/adult.training.xlsx',78.33,0.00,0.00,0.00,0.00,2.41,7.15,0.86,0.00,0.00,0.00,0.00,0.00,0.00,2.33,2.91,0.91,0.00,0.00,0.00,0.00,4.37,0.73,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(184,'tests/other classifiers/adult.training.xlsx',65.50,0.00,0.00,0.00,0.00,0.00,0.00,3.43,3.08,0.69,0.00,0.00,2.85,13.84,3.04,0.00,0.00,0.14,3.47,3.95,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(185,'tests/other classifiers/adult.training.xlsx',96.63,0.00,0.00,0.00,0.00,0.00,0.00,2.76,0.37,0.00,0.00,0.00,0.00,0.00,0.00,0.17,0.07,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(186,'tests/other classifiers/adult.training.xlsx',40.34,23.31,0.00,0.00,0.00,0.00,0.00,0.00,4.30,1.13,0.00,0.00,8.13,18.95,3.84,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(187,'tests/other classifiers/adult.training.xlsx',92.64,0.00,0.00,0.00,0.00,0.00,4.28,0.56,0.00,0.00,0.00,0.00,0.00,0.00,1.15,1.08,0.29,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(188,'tests/other classifiers/adult.training.xlsx',85.18,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.47,1.50,1.30,0.00,0.00,0.00,5.01,2.43,0.05,0.00,0.00,0.00,2.42,0.60,0.04,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(189,'tests/other classifiers/adult.training.xlsx',29.93,11.38,0.00,0.00,0.00,0.12,0.02,0.00,0.00,0.00,7.13,10.00,1.53,0.04,0.00,0.00,19.57,10.16,10.11,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(190,'tests/other classifiers/adult.training.xlsx',45.92,10.18,0.00,0.00,0.00,0.00,0.00,0.86,5.11,1.32,0.00,5.37,9.51,1.64,0.00,0.00,14.94,3.99,0.57,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.15,0.39,0.02,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(191,'tests/other classifiers/adult.training.xlsx',89.11,0.00,0.00,0.00,0.00,0.00,2.53,3.70,0.45,0.00,0.00,0.00,0.00,0.00,0.85,2.43,0.94,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(192,'tests/other classifiers/adult.training.xlsx',87.97,0.00,0.00,0.00,0.00,0.00,3.85,2.51,0.27,0.00,0.00,0.00,0.00,0.00,0.00,2.16,2.79,0.45,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(193,'tests/other classifiers/adult.training.xlsx',0.00,0.00,0.00,0.27,42.25,6.46,0.00,0.00,0.00,0.00,0.11,17.79,0.00,0.00,0.00,0.21,32.90,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(194,'tests/other classifiers/adult.training.xlsx',46.78,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.81,0.00,0.00,0.00,0.00,7.71,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.21,8.03,9.05,8.02,6.50,5.05,3.84,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(195,'tests/other classifiers/adult.training.xlsx',60.37,7.67,0.08,1.05,0.21,0.00,0.00,0.00,0.95,0.01,0.00,0.00,0.00,0.00,6.50,0.07,0.00,0.00,0.00,0.00,0.00,0.00,0.00,4.02,4.80,4.32,3.52,2.74,2.09,1.59,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(196,'tests/other classifiers/adult.training.xlsx',80.17,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.95,15.61,0.27,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(197,'tests/other classifiers/adult.training.xlsx',86.12,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.63,0.04,0.00,0.00,0.00,2.01,0.95,0.02,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.01,1.23,2.26,2.26,1.91,1.55,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(198,'tests/other classifiers/adult.training.xlsx',0.50,0.56,0.66,0.26,0.91,4.57,8.37,4.03,0.10,0.00,0.00,21.30,24.70,0.66,0.00,0.00,11.34,21.46,0.58,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(199,'tests/other classifiers/adult.training.xlsx',12.53,3.38,0.11,0.00,0.00,0.00,0.00,7.86,7.55,0.24,0.00,0.00,0.00,55.43,12.55,0.35,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(200,'tests/other classifiers/adult.training.xlsx',28.36,0.73,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.94,4.70,0.18,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,13.27,16.03,14.46,11.80,9.53,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(201,'tests/other classifiers/adult.training.xlsx',70.42,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,4.77,0.21,0.00,0.00,0.00,4.05,19.72,0.85,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(202,'tests/other classifiers/adult.training.xlsx',95.46,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,4.34,0.21,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(203,'tests/other classifiers/adult.training.xlsx',50.80,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.48,0.88,0.00,0.00,0.00,0.00,0.81,5.11,10.07,8.88,6.74,4.94,3.61,2.65,1.95,1.44,1.12,0.51,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(204,'tests/other classifiers/adult.training.xlsx',17.66,2.81,0.00,0.00,0.00,0.00,0.03,3.34,6.52,0.00,0.00,4.16,12.12,7.73,0.04,0.00,1.93,7.06,9.32,7.98,5.82,4.06,2.84,2.02,1.46,1.07,0.79,0.58,0.45,0.21,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(205,'tests/other classifiers/adult.training.xlsx',82.15,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.34,1.39,1.37,0.00,0.00,0.00,3.72,9.42,1.60,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(206,'tests/other classifiers/adult.training.xlsx',77.54,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.23,0.56,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.16,1.94,5.57,5.85,5.27,2.87,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(207,'tests/other classifiers/adult.training.xlsx',0.00,0.00,2.77,7.62,0.35,0.00,0.00,0.00,0.00,0.00,0.00,6.04,16.73,1.08,0.00,0.00,2.65,16.56,31.03,15.18,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(208,'tests/other classifiers/adult.training.xlsx',84.92,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.01,2.90,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.32,1.55,2.45,2.36,1.98,1.62,0.89,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(209,'tests/other classifiers/adult.training.xlsx',11.70,3.61,0.97,0.00,0.06,0.19,0.00,0.00,0.34,1.75,2.09,0.00,2.05,7.43,3.28,0.00,0.00,0.00,0.00,0.00,0.00,1.53,7.80,12.49,12.23,10.33,8.20,6.30,4.93,2.72,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(210,'tests/other classifiers/adult.training.xlsx',28.75,0.00,0.00,0.00,0.00,0.00,0.66,2.79,1.87,0.00,0.00,0.00,2.96,13.61,12.15,0.00,0.00,3.79,16.37,13.17,3.89,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(211,'tests/other classifiers/adult.training.xlsx',68.71,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.19,0.69,0.00,0.00,3.03,11.37,1.07,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.78,3.77,4.21,3.83,2.35,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(212,'tests/other classifiers/adult.training.xlsx',96.28,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.55,2.39,0.77,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(213,'tests/other classifiers/adult.training.xlsx',93.23,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.22,0.97,0.00,0.00,0.48,2.13,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.10,0.56,0.73,0.67,0.57,0.35,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(214,'tests/other classifiers/adult.training.xlsx',7.07,2.08,0.00,0.00,0.00,0.07,1.06,3.98,1.88,0.13,0.00,3.79,23.03,20.50,0.00,1.88,13.46,20.47,0.61,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(215,'tests/other classifiers/adult.training.xlsx',37.59,0.62,8.51,29.01,4.99,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.45,3.11,4.61,6.40,4.72,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(216,'tests/other classifiers/adult.training.xlsx',90.74,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.31,1.86,0.27,2.37,4.46,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(217,'tests/other classifiers/adult.training.xlsx',77.60,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.38,2.51,0.00,0.00,1.93,12.78,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.13,1.02,1.17,1.04,0.86,0.57,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(218,'tests/other classifiers/adult.training.xlsx',65.62,0.00,0.00,0.00,0.00,0.00,0.00,3.35,24.51,0.00,0.00,0.00,0.00,0.00,0.00,0.55,4.26,1.69,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(219,'tests/other classifiers/adult.training.xlsx',4.75,1.10,0.00,0.00,0.00,0.29,2.44,0.76,0.32,3.76,9.53,0.00,0.00,2.85,23.34,4.22,0.00,0.00,0.00,0.00,0.00,0.59,5.68,8.79,8.57,7.23,5.74,4.41,3.39,2.24,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(220,'tests/other classifiers/adult.training.xlsx',95.33,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.46,4.21,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(221,'tests/other classifiers/adult.training.xlsx',0.00,0.22,3.31,9.67,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.53,31.99,52.27,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(222,'tests/other classifiers/adult.training.xlsx',1.52,12.34,28.07,11.97,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.30,3.76,0.00,0.00,3.06,38.98,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(223,'tests/other classifiers/adult.training.xlsx',69.40,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.42,6.41,1.45,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.25,4.00,4.94,4.50,3.68,2.90,2.06,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(224,'tests/other classifiers/adult.training.xlsx',3.35,0.02,0.00,0.01,0.17,1.32,0.00,0.00,0.00,0.38,6.81,0.00,0.00,0.56,10.81,15.97,0.00,0.00,0.00,0.00,0.00,0.50,9.51,11.70,10.77,8.89,6.98,5.34,4.06,2.87,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(225,'tests/other classifiers/adult.training.xlsx',16.58,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.05,1.51,10.42,0.00,0.00,1.97,43.07,26.41,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(226,'tests/other classifiers/adult.training.xlsx',41.91,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.03,1.00,5.29,0.00,0.00,0.00,0.81,20.79,12.74,0.00,0.00,0.00,0.00,0.00,0.10,2.75,3.56,3.30,2.73,2.14,1.65,1.19,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(227,'tests/other classifiers/adult.training.xlsx',25.44,2.07,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.01,0.29,0.00,0.00,0.65,19.76,4.82,0.00,0.00,0.00,0.00,0.00,0.00,0.23,7.30,9.59,8.93,7.39,5.80,4.46,3.25,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(228,'tests/other classifiers/adult.training.xlsx',84.97,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.04,2.19,12.79,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(229,'tests/other classifiers/adult.training.xlsx',75.76,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.05,3.96,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.05,3.28,5.01,4.78,4.00,3.10,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(230,'tests/other classifiers/adult.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.09,16.81,11.10,0.00,0.00,0.00,0.00,0.00,0.28,50.36,21.36,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(231,'tests/other classifiers/adult.training.xlsx',0.00,0.00,0.00,0.00,8.17,0.00,0.00,0.00,0.00,0.00,13.06,0.00,0.00,0.00,43.12,35.65,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(232,'tests/other classifiers/adult.training.xlsx',64.00,0.20,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.75,8.00,0.07,0.00,0.00,0.00,10.69,13.18,0.11,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(233,'tests/other classifiers/adult.training.xlsx',87.67,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,8.63,3.62,0.08,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(234,'tests/other classifiers/adult.training.xlsx',42.39,0.49,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,7.37,0.23,0.00,0.00,0.00,44.17,5.23,0.12,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(235,'tests/other classifiers/adult.training.xlsx',34.71,0.50,0.00,0.00,0.00,0.00,0.00,0.00,0.00,8.81,4.97,2.12,5.49,2.93,0.10,0.00,19.16,20.46,0.74,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(236,'tests/other classifiers/adult.training.xlsx',0.00,9.32,8.55,0.37,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,18.99,11.42,0.48,29.79,20.23,0.86,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(237,'tests/other classifiers/adult.training.xlsx',20.97,11.31,0.69,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,6.47,13.06,8.94,7.24,5.63,0.48,0.01,0.00,0.52,3.01,4.15,4.13,3.58,2.88,2.24,1.70,1.28,0.96,0.76,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(238,'tests/other classifiers/adult.training.xlsx',55.44,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.35,0.03,0.00,0.00,0.00,0.00,11.56,5.24,0.33,0.00,0.00,0.00,0.00,1.95,4.76,5.20,4.59,3.71,2.89,2.19,1.77,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(239,'tests/other classifiers/adult.training.xlsx',3.36,0.00,0.00,1.34,6.72,8.40,0.38,0.00,0.00,3.95,14.89,13.81,0.00,2.06,6.36,4.20,0.00,0.00,0.00,1.29,4.65,5.91,5.61,4.72,3.75,2.88,2.18,1.64,1.28,0.62,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(240,'tests/other classifiers/adult.training.xlsx',13.92,0.50,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,23.58,57.43,4.57,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(241,'tests/other classifiers/adult.training.xlsx',28.61,0.83,0.00,0.00,0.00,0.00,8.19,20.42,1.74,0.00,0.00,0.00,4.62,8.72,6.11,7.03,10.79,2.77,0.16,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(242,'tests/other classifiers/adult.training.xlsx',0.37,0.00,6.78,0.68,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.19,8.24,28.31,18.02,1.52,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.76,6.95,7.16,6.16,4.93,3.80,3.14,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(243,'tests/other classifiers/adult.training.xlsx',90.68,1.70,0.00,0.04,0.09,0.01,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,6.76,0.73,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(244,'tests/other classifiers/adult.training.xlsx',13.03,0.42,0.00,0.00,0.00,0.00,0.00,0.11,0.01,4.27,13.91,2.98,0.17,0.00,6.92,16.72,3.72,0.22,0.00,0.00,0.00,4.60,6.62,6.54,5.60,4.48,3.46,2.63,1.97,1.62,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(245,'tests/other classifiers/adult.training.xlsx',57.43,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.95,4.71,5.24,0.00,0.00,0.00,0.00,1.41,4.61,5.96,5.55,4.60,3.61,2.77,2.20,0.97,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(246,'tests/other classifiers/adult.training.xlsx',84.09,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.74,1.33,0.00,0.00,0.00,4.97,8.86,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(247,'tests/other classifiers/adult.training.xlsx',30.16,0.00,0.00,0.00,3.60,6.81,0.00,0.00,0.00,0.00,0.00,4.03,12.57,9.37,0.00,0.00,0.00,6.47,17.15,9.48,0.35,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(248,'tests/other classifiers/adult.training.xlsx',100.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.01,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(249,'tests/other classifiers/adult.training.xlsx',82.93,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.23,2.83,0.00,0.00,0.00,0.00,0.04,0.86,2.82,4.19,4.30,0.80,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(250,'tests/other classifiers/adult.training.xlsx',97.34,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.22,0.67,0.25,0.00,0.00,0.43,1.09,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(251,'tests/other classifiers/adult.training.xlsx',18.65,6.26,0.00,0.00,0.00,0.00,1.79,4.92,0.00,0.00,0.00,0.00,0.00,0.00,14.72,44.04,9.63,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(252,'tests/other classifiers/adult.training.xlsx',36.17,1.85,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.80,5.40,0.00,0.00,0.00,0.00,0.00,0.00,2.35,9.87,11.05,9.81,7.96,6.19,4.87,2.67,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(253,'tests/other classifiers/adult.training.xlsx',4.39,25.83,37.43,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.59,1.94,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.32,5.91,6.50,5.71,4.60,3.69,2.09,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(254,'tests/other classifiers/adult.training.xlsx',3.85,23.58,34.81,0.00,0.00,0.00,0.00,0.00,0.00,0.19,0.68,0.00,0.00,0.00,0.00,5.19,21.63,10.07,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(255,'tests/other classifiers/adult.training.xlsx',95.62,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.21,0.83,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.09,0.93,2.33,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(256,'tests/other classifiers/adult.training.xlsx',0.24,0.55,0.86,0.68,0.00,0.00,0.00,0.00,0.10,0.54,1.05,1.37,0.90,0.20,1.83,5.81,9.73,11.90,12.23,11.34,9.78,7.98,6.28,4.82,3.65,2.74,2.05,1.52,1.16,0.69,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(257,'tests/other classifiers/adult.training.xlsx',95.52,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.02,0.10,0.00,0.00,0.00,0.00,0.00,0.02,0.82,3.52,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(258,'tests/other classifiers/adult.training.xlsx',2.21,0.00,0.00,0.00,0.04,0.86,0.37,0.02,0.50,4.39,4.88,0.69,0.23,5.23,18.42,19.58,1.77,0.00,0.00,0.00,0.26,5.29,7.32,7.08,6.01,4.78,3.68,2.79,2.11,1.49,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(259,'tests/other classifiers/adult.training.xlsx',0.00,3.00,16.19,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.93,10.44,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.89,12.41,14.00,12.41,10.06,7.81,6.07,3.80,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(260,'tests/other classifiers/adult.training.xlsx',94.94,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.16,1.26,1.35,0.00,0.00,0.00,0.00,0.00,0.06,0.43,0.50,0.45,0.36,0.29,0.19,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(261,'tests/other classifiers/adult.training.xlsx',0.00,0.37,9.50,13.90,11.53,6.44,0.34,1.53,12.33,4.09,0.00,0.00,0.00,0.00,0.29,8.29,31.39,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(262,'tests/other classifiers/adult.training.xlsx',66.34,0.82,0.00,0.00,0.00,0.00,0.00,0.00,1.36,9.92,0.29,0.00,0.00,1.02,8.98,11.26,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(263,'tests/other classifiers/adult.training.xlsx',16.10,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.33,10.77,0.00,0.00,0.00,2.20,19.54,14.24,0.00,0.00,0.00,0.00,0.00,0.00,0.64,5.97,7.30,6.66,5.46,4.27,3.31,2.20,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(264,'tests/other classifiers/adult.training.xlsx',3.25,0.82,0.00,0.01,0.32,2.31,1.91,0.00,0.58,6.24,10.19,8.02,4.32,5.91,12.38,16.79,15.35,9.56,2.04,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(265,'tests/other classifiers/adult.training.xlsx',94.64,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.30,2.97,0.00,0.00,0.00,0.19,1.89,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(266,'tests/other classifiers/child.training.xlsx',64.01,0.00,0.00,0.00,0.00,0.13,2.14,0.25,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,4.86,6.18,5.65,4.64,3.62,2.76,2.08,1.56,1.16,0.95,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(267,'tests/other classifiers/child.training.xlsx',56.06,0.00,0.00,0.00,0.00,0.00,0.00,0.19,0.60,0.60,0.70,0.00,0.00,0.00,3.00,7.02,7.91,6.50,4.82,3.48,2.52,1.83,1.34,0.99,0.73,0.54,0.40,0.30,0.22,0.22,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(268,'tests/other classifiers/child.training.xlsx',0.00,6.13,17.38,9.03,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,16.76,26.02,16.86,6.45,1.21,0.04,0.03,0.02,0.02,0.01,0.01,0.01,0.01,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(269,'tests/other classifiers/child.training.xlsx',37.86,9.65,2.24,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,12.79,9.19,0.00,0.00,0.00,0.00,2.03,4.30,4.75,4.22,3.43,2.67,2.04,1.53,1.15,0.86,0.64,0.65,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(270,'tests/other classifiers/child.training.xlsx',83.08,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.26,1.91,3.17,3.06,2.57,2.02,1.55,1.17,1.21,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(271,'tests/other classifiers/child.training.xlsx',79.50,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.07,0.07,0.11,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.78,2.60,3.62,3.39,2.80,2.20,1.68,1.27,0.95,0.98,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(272,'tests/other classifiers/child.training.xlsx',79.50,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.07,0.07,0.11,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.78,2.60,3.62,3.39,2.80,2.20,1.68,1.27,0.95,0.98,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(273,'tests/other classifiers/child.training.xlsx',96.84,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.71,1.45,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(274,'tests/other classifiers/child.training.xlsx',81.68,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.47,0.41,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.03,1.50,3.06,3.15,2.70,2.15,1.66,1.26,0.94,0.99,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(275,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.99,0.91,0.02,1.10,5.55,4.09,0.00,0.00,0.00,0.00,14.10,15.39,2.47,0.00,0.00,2.78,7.15,8.96,8.45,7.09,5.62,4.32,3.27,2.45,1.83,1.36,1.01,1.06,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(276,'tests/other classifiers/child.training.xlsx',79.41,0.00,0.00,0.00,0.00,0.00,0.00,0.94,0.72,0.72,0.40,0.00,0.39,0.61,0.18,0.00,0.00,0.00,0.88,2.32,2.79,2.56,2.12,1.66,1.27,0.96,0.72,0.54,0.40,0.43,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(277,'tests/other classifiers/child.training.xlsx',27.85,0.00,2.44,2.87,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.18,7.86,4.85,0.00,0.00,0.21,3.32,7.54,8.35,7.51,6.16,4.82,3.69,2.78,2.08,1.55,1.16,0.86,0.93,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(278,'tests/other classifiers/child.training.xlsx',16.41,2.84,1.82,1.07,0.00,0.00,0.00,0.00,0.00,0.00,2.73,7.05,4.20,0.00,0.00,0.00,0.00,0.00,4.76,10.29,10.83,9.43,7.60,5.89,4.47,3.36,2.51,1.87,1.39,1.46,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(279,'tests/other classifiers/child.training.xlsx',16.97,0.00,0.00,0.00,0.00,0.00,0.00,0.98,2.79,2.79,7.95,5.06,2.70,2.85,5.02,7.37,8.42,8.06,6.92,5.57,4.33,3.29,2.48,1.85,1.38,1.03,0.76,0.57,0.42,0.44,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(280,'tests/other classifiers/child.training.xlsx',4.73,0.00,0.00,0.22,0.22,0.00,0.00,0.00,0.00,0.00,4.42,5.17,0.80,0.00,0.00,0.00,0.00,5.42,12.59,14.03,12.56,10.26,8.01,6.11,4.61,3.45,2.57,1.91,1.42,1.50,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(281,'tests/other classifiers/child.training.xlsx',48.08,0.00,0.00,0.00,0.00,0.00,0.00,2.51,0.53,0.53,0.11,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.01,6.31,8.76,8.22,6.82,5.36,4.10,3.09,2.32,1.73,1.51,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(282,'tests/other classifiers/child.training.xlsx',0.00,17.45,22.30,4.33,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,16.00,28.05,11.87,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(283,'tests/other classifiers/child.training.xlsx',0.00,5.41,15.41,10.28,0.00,0.00,0.00,2.91,1.55,1.55,0.00,1.21,10.47,22.05,20.85,8.30,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(284,'tests/other classifiers/child.training.xlsx',26.44,0.00,0.00,2.50,2.73,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.24,0.26,2.02,6.89,10.44,10.62,9.15,7.31,5.63,4.26,3.20,2.39,1.78,1.32,0.98,0.73,0.54,0.58,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(285,'tests/other classifiers/child.training.xlsx',56.57,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.13,3.91,2.95,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.52,5.91,6.28,5.46,4.38,3.39,2.57,1.93,1.44,1.55,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(286,'tests/other classifiers/child.training.xlsx',45.20,18.18,7.63,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.48,3.93,0.00,0.00,0.28,1.69,3.25,3.48,3.09,2.52,1.97,1.50,1.13,0.85,0.63,0.47,0.35,0.38,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(287,'tests/other classifiers/child.training.xlsx',86.24,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,5.34,7.19,1.22,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(288,'tests/other classifiers/child.training.xlsx',94.70,0.00,0.00,0.00,0.00,0.18,0.63,0.49,0.37,0.37,0.93,0.04,0.00,0.00,0.00,1.04,1.25,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(289,'tests/other classifiers/child.training.xlsx',97.25,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.33,1.31,1.11,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(290,'tests/other classifiers/child.training.xlsx',39.03,14.72,6.14,0.00,0.00,0.02,0.47,3.17,1.60,1.60,0.00,0.00,6.43,12.88,6.15,0.00,0.04,0.12,0.47,1.06,1.29,1.17,0.96,0.75,0.57,0.43,0.32,0.24,0.18,0.19,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(291,'tests/other classifiers/child.training.xlsx',0.00,20.53,5.73,0.00,0.00,0.00,5.14,1.79,0.05,0.05,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,8.36,11.89,11.09,9.15,7.16,5.46,4.12,3.08,2.30,1.71,1.27,1.14,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(292,'tests/other classifiers/child.training.xlsx',97.21,0.00,0.00,0.00,0.79,0.97,0.00,0.00,0.00,0.00,0.00,0.39,0.55,0.09,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(293,'tests/other classifiers/child.training.xlsx',95.66,0.00,0.00,0.00,0.00,0.01,0.79,0.99,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.19,0.47,0.51,0.44,0.36,0.27,0.31,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(294,'tests/other classifiers/child.training.xlsx',98.12,0.00,0.00,0.00,0.00,0.02,0.71,0.88,0.00,0.00,0.00,0.00,0.12,0.15,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(295,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,33.13,62.92,3.95,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(296,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,4.09,6.31,0.78,23.67,17.35,1.49,0.00,0.00,0.00,6.20,35.47,4.65,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(297,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,30.98,11.49,0.67,0.00,0.00,16.07,22.91,0.00,0.00,0.00,1.43,14.12,2.33,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(298,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.25,12.83,2.12,0.00,0.00,0.00,0.00,0.00,0.00,0.00,63.87,19.50,1.44,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(299,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,17.02,18.71,1.62,0.00,16.21,21.99,3.43,0.00,0.00,0.00,11.42,8.28,1.32,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(300,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,18.05,12.89,3.23,0.00,0.00,0.00,32.86,28.34,4.62,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(301,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,12.92,24.79,9.01,0.30,0.00,13.58,18.58,3.07,0.00,0.00,0.00,4.81,10.76,2.18,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(302,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,41.10,16.40,0.08,5.34,14.90,5.56,0.00,10.26,5.50,0.86,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(303,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,28.15,7.70,0.49,0.00,0.00,17.47,16.14,4.29,0.00,0.00,0.00,0.00,9.91,13.29,2.56,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(304,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,14.20,2.62,0.00,11.90,36.84,4.08,0.00,0.00,0.00,0.00,4.59,22.47,3.29,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(305,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,8.78,10.50,13.24,0.00,0.00,48.08,17.72,1.67,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(306,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,7.30,1.61,0.00,0.00,44.60,7.26,0.51,0.00,0.00,0.00,16.31,19.25,3.15,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(307,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.19,10.41,20.50,6.85,0.00,0.00,11.35,44.32,4.38,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(308,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,4.50,3.78,0.00,0.00,5.44,24.11,6.55,0.00,0.00,0.00,0.00,0.00,49.30,6.14,0.17,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(309,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,8.10,1.35,0.00,18.17,14.34,1.01,0.00,0.00,0.00,39.30,16.46,1.27,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(310,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.41,18.84,3.52,21.08,8.36,0.00,0.00,0.00,2.24,37.62,4.92,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(311,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,5.66,24.89,17.25,0.00,39.18,11.81,1.20,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(312,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,23.02,8.38,0.14,0.00,0.00,0.00,0.00,0.00,22.84,37.20,8.42,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(313,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,12.06,2.81,0.00,0.00,0.00,30.66,51.05,3.42,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(314,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,5.95,2.25,0.32,0.00,0.00,0.00,0.00,0.00,48.29,36.86,6.33,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(315,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,31.70,10.66,1.35,0.00,0.00,0.00,3.54,31.79,19.10,1.86,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(316,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,21.00,24.33,6.68,0.00,0.00,2.80,38.48,6.71,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(317,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.85,40.97,14.26,0.00,1.26,2.27,0.00,25.31,13.82,1.26,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(318,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,19.68,27.90,7.48,0.00,10.26,17.01,0.22,3.06,12.70,1.65,0.04,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(319,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.80,45.03,22.16,5.59,1.12,1.01,0.00,7.89,12.02,1.39,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(320,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,12.78,9.99,0.00,0.00,44.37,25.21,1.48,0.00,4.99,1.17,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(321,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,15.72,3.38,0.00,9.86,7.44,9.38,0.00,0.00,0.00,0.00,21.72,27.20,5.30,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(322,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,22.48,23.29,3.13,19.28,30.07,1.75,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(323,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,7.56,2.11,0.00,0.00,0.00,7.13,45.70,37.50,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(324,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,20.31,5.66,0.00,0.00,0.00,22.62,44.76,6.65,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(325,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.42,3.43,32.40,9.12,5.25,0.00,0.00,15.35,29.42,4.60,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(326,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,19.61,12.82,1.39,0.00,16.54,11.47,13.66,0.00,0.00,15.07,8.35,1.10,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(327,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.74,9.24,7.48,10.18,5.37,8.63,18.69,19.08,5.15,0.00,0.00,0.21,3.99,5.20,2.89,1.02,0.14,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(328,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,16.13,26.16,4.26,3.29,1.30,1.71,23.78,23.37,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(329,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.86,0.18,0.00,0.00,0.00,25.20,4.52,0.00,0.00,0.00,0.00,0.00,0.00,49.51,17.75,1.99,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(330,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.50,28.71,7.16,0.00,0.00,34.94,6.78,0.25,0.00,0.00,18.50,2.16,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(331,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.72,15.82,21.83,3.79,0.00,13.15,28.94,5.29,0.00,0.00,0.00,0.00,4.72,2.36,0.37,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(332,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,13.23,22.85,6.69,0.00,0.00,0.00,0.00,40.82,14.81,1.60,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(333,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,9.22,22.95,8.00,0.00,52.84,7.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(334,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,11.05,20.57,6.72,0.00,0.00,0.00,37.98,21.77,1.90,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(335,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,4.06,15.18,13.92,0.00,0.00,0.00,13.14,46.49,7.22,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(336,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,16.19,23.82,2.95,0.00,1.95,24.99,3.78,0.00,0.00,0.00,4.48,19.32,2.52,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(337,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,23.65,6.59,0.00,0.00,12.13,13.00,18.00,0.00,0.00,0.00,8.57,9.30,6.01,2.39,0.34,0.01,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(338,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,41.78,4.39,0.19,0.00,0.00,0.00,0.00,0.00,30.86,21.34,1.44,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(339,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,29.70,23.98,2.60,0.00,0.00,36.06,7.66,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(340,'tests/other classifiers/child.training.xlsx',0.00,38.97,38.75,10.53,3.66,0.00,0.00,2.07,3.25,0.20,0.00,0.00,0.00,0.85,1.72,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(341,'tests/other classifiers/child.training.xlsx',0.00,42.75,37.33,10.99,4.34,0.00,1.44,2.18,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.55,0.40,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(342,'tests/other classifiers/child.training.xlsx',0.00,32.87,49.17,9.30,0.00,0.00,1.47,3.11,1.26,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.77,1.77,0.28,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(343,'tests/other classifiers/child.training.xlsx',0.00,26.38,61.91,11.71,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(344,'tests/other classifiers/child.training.xlsx',0.00,31.62,57.51,10.87,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(345,'tests/other classifiers/child.training.xlsx',0.00,35.73,54.05,10.22,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(346,'tests/other classifiers/child.training.xlsx',0.00,32.58,56.70,10.72,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(347,'tests/other classifiers/child.training.xlsx',0.00,20.00,59.57,11.26,1.45,4.71,3.01,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(348,'tests/other classifiers/child.training.xlsx',0.00,39.17,51.16,9.67,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(349,'tests/other classifiers/child.training.xlsx',61.41,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,13.50,25.10,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(350,'tests/other classifiers/child.training.xlsx',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,49.67,41.70,8.31,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.22,0.10,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(351,'tests/other classifiers/child.training.xlsx',45.87,0.00,0.00,0.00,0.00,0.00,0.00,0.30,8.07,2.70,0.00,0.00,0.00,0.00,0.00,14.69,19.41,5.28,3.68,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(352,'tests/other classifiers/child.training.xlsx',54.83,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.63,8.11,2.41,0.00,0.00,7.11,7.50,2.45,3.91,4.25,6.78,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(353,'tests/other classifiers/child.training.xlsx',73.66,0.00,0.00,0.00,0.00,0.00,0.00,1.19,3.24,1.02,0.00,0.00,0.00,9.62,2.94,0.00,4.64,2.16,1.54,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(354,'tests/other classifiers/child.training.xlsx',4.02,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.67,14.49,4.53,0.00,0.00,0.00,0.00,28.08,38.72,7.48,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(355,'tests/other classifiers/child.training.xlsx',96.89,0.58,0.00,0.00,0.01,0.00,0.00,0.89,0.43,0.09,0.04,0.07,0.02,0.00,0.00,0.38,0.21,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.35,0.05,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(356,'tests/other classifiers/child.training.xlsx',52.00,0.00,0.00,0.00,0.00,0.00,4.79,2.21,0.25,0.00,0.00,0.00,0.00,0.00,0.00,0.00,29.53,9.96,1.26,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(357,'tests/other classifiers/child.training.xlsx',98.45,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.02,1.16,0.37,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(358,'tests/other classifiers/child.training.xlsx',28.77,49.85,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.91,9.89,4.14,0.00,0.70,2.47,1.28,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(359,'tests/other classifiers/child.training.xlsx',62.50,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,19.88,15.99,1.63,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(360,'tests/other classifiers/child.training.xlsx',74.09,21.59,1.64,0.00,0.00,0.00,0.75,1.06,0.18,0.00,0.00,0.00,0.00,0.06,0.15,0.06,0.00,0.00,0.10,0.28,0.04,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(361,'tests/other classifiers/child.training.xlsx',55.85,25.91,8.60,0.00,0.00,0.02,0.90,0.18,0.00,2.50,0.86,0.00,0.00,0.00,1.71,2.50,0.94,0.00,0.00,0.00,0.02,0.01,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(362,'tests/other classifiers/child.training.xlsx',42.93,0.00,0.00,0.00,0.00,30.60,8.52,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,3.64,7.22,1.67,0.00,4.08,1.34,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(363,'tests/other classifiers/child.training.xlsx',9.02,2.48,2.08,0.01,0.00,0.00,0.00,0.00,0.00,2.48,5.36,6.18,0.00,0.00,14.69,9.53,1.50,14.34,32.34,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(364,'tests/other classifiers/child.training.xlsx',96.33,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.23,0.95,0.50,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(365,'tests/other classifiers/child.training.xlsx',43.58,0.00,0.00,0.00,0.00,0.00,0.00,0.00,6.14,8.97,8.29,9.81,1.60,0.00,0.00,12.62,8.48,0.52,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(366,'tests/other classifiers/child.training.xlsx',66.36,11.97,0.00,0.00,0.00,1.91,0.53,0.00,0.00,0.00,0.00,0.00,2.38,3.66,0.83,8.02,4.34,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(367,'tests/other classifiers/child.training.xlsx',69.18,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,18.41,11.02,1.38,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(368,'tests/other classifiers/child.training.xlsx',85.78,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,4.37,9.85,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(369,'tests/other classifiers/child.training.xlsx',91.84,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.65,1.07,0.28,0.00,0.00,0.00,0.00,0.32,3.78,1.15,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.80,0.10,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(370,'tests/other classifiers/child.training.xlsx',59.90,25.76,8.51,0.00,0.00,0.00,0.00,1.66,0.65,0.11,0.00,0.00,0.00,1.48,1.27,0.38,0.00,0.00,0.00,0.21,0.07,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(371,'tests/other classifiers/child.training.xlsx',76.03,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,4.97,13.13,5.87,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(372,'tests/other classifiers/child.training.xlsx',0.00,55.46,37.46,7.08,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(373,'tests/other classifiers/child.training.xlsx',0.00,43.60,47.43,8.97,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(374,'tests/other classifiers/child.training.xlsx',0.00,32.07,30.60,9.73,3.66,0.43,1.59,1.17,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,20.74,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(375,'tests/other classifiers/child.training.xlsx',0.00,30.56,55.47,11.34,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.23,1.12,1.27,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(376,'tests/other classifiers/child.training.xlsx',0.00,19.69,64.81,13.25,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.06,1.20,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(377,'tests/other classifiers/child.training.xlsx',0.00,25.00,60.14,12.29,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2.26,0.31,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(378,'tests/other classifiers/child.training.xlsx',0.00,37.80,42.47,8.68,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,9.12,1.93,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(379,'tests/other classifiers/child.training.xlsx',0.00,29.36,47.29,9.67,0.00,0.00,0.00,1.24,2.07,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.96,5.78,2.63,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(380,'tests/other classifiers/child.training.xlsx',0.00,33.09,49.24,11.64,1.66,0.74,1.53,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1.23,0.89,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL),
	(381,'tests/other classifiers/child.training.xlsx',0.00,44.17,46.36,9.48,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-06-24 03:06:36','2018-06-24 03:06:36',NULL);

/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address_id` int(10) unsigned DEFAULT NULL,
  `hospital_id` int(10) unsigned DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_present` tinyint(1) DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `hired_at` datetime DEFAULT NULL,
  `fired_at` datetime DEFAULT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_address_id_foreign` (`address_id`),
  KEY `users_hospital_id_foreign` (`hospital_id`),
  CONSTRAINT `users_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `users_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `first_name`, `middle_name`, `last_name`, `sex`, `birthday`, `address_id`, `hospital_id`, `passport`, `is_present`, `about`, `hired_at`, `fired_at`, `degree`, `password`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'support@dx.com','Support','Support','Support','male','1970-01-01',1,1,'AA-000001',1,'Support','2018-06-24 03:06:34',NULL,NULL,'$2y$10$dC25cIVfzWVpyEayegzmheCvvhVKEKD4FBZe5VRDsR2j83OA5cCu.','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(2,'p@dx.com','Test','Patientable','Patient','male','2000-01-01',1,NULL,'AA-000003',NULL,NULL,NULL,NULL,NULL,'$2y$10$omCNVUTZPZjmclm7EHOic.R7d7kIhrjP/eIIXZJc2y7VTPq0SWkX2','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(3,'e@dx.com','Test','Employable','Employee','female','2000-01-01',1,1,'AA-000003',1,'Testable','2018-06-24 03:06:34',NULL,NULL,'$2y$10$6lQfBlebM4DLAz9WwG/RG.qGUg/tja.G/nAOEgebcaj.u64c.Px9e','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(4,'d@dx.com','Test','Doctorable','Doctor','female','2000-01-01',1,1,'AA-000004',1,'Testable','2018-06-24 03:06:34',NULL,'Candidate of Science','$2y$10$HiwaMI6dBkNDm6Bt5.nCxeblUeJjI3ey..a7anFisKwJEZw2i6KzO','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL),
	(5,'h@dx.com','Test','Headable','Head','male','2000-01-01',1,1,'AA-000005',1,'Testable','2018-06-24 03:06:34',NULL,'Master of Science','$2y$10$T0O5R5YrUIsztKcGU5PLJOwbySA/G4jPUpjysuq05ZsRvXuB59n72','2018-06-24 03:06:34','2018-06-24 03:06:34',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
