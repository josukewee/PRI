SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

-- tabulka registrovaných uživatelů (kteří moho nahrávat recepty)
DROP TABLE IF EXISTS `uzivatele`;
CREATE TABLE `uzivatele` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(100) NOT NULL,
  `heslo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jmeno` (`jmeno`)
);

INSERT INTO `uzivatele` (`id`, `jmeno`, `heslo`) VALUES
(1,	'pavel',	'pavel'),
(2,	'alena',	'heslo'),
(3,	'petr',	  '12345');

-- tabulka receptů – počet zobrazení
DROP TABLE IF EXISTS `drinky`;
CREATE TABLE `notes` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nazev` varchar(255) not NULL,
  `author` int not NULL,
  `jazyk` varchar(3),
  `category` varchar(255) not NULL,
  `content` TEXT,
  `cas_vytvoreni` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `cas_updatu` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO `notes` (`nazev`, `author`, `jazyk`) VALUES
(1,	'pavel',	'pavel'),
(2,	'alena',	'heslo'),
(3,	'petr',	  '12345');
