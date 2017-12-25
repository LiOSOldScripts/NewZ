-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 18. Feb 2014 um 00:55
-- Server Version: 5.5.35-cll
-- PHP-Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `cms_newz`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `preview` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `article`
--

INSERT INTO `article` (`id`, `header`, `date`, `preview`, `pic`, `content`) VALUES
(4, 'Test', '1392677242', 'test', 'test', '<p>tet</p>\r\n');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` text CHARACTER SET latin1 NOT NULL,
  `passwrd` text CHARACTER SET latin1 NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `banned` varchar(255) CHARACTER SET latin1 NOT NULL,
  `banned_reason` varchar(255) CHARACTER SET latin1 NOT NULL,
  `banned_date` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `banned_time` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`name`, `passwrd`, `id`, `email`, `banned`, `banned_reason`, `banned_date`, `banned_time`) VALUES
('demo', '6c5ac7b4d3bd3311f033f971196cfa75', 1, 'demo@pasternt-cms.de', '0', '', '08.12.2013', '5:44 pm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
