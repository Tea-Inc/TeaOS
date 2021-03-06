-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 09 nov. 2020 à 18:07
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `teaos`
--

-- --------------------------------------------------------

--
-- Structure de la table `banned_ip`
--

DROP TABLE IF EXISTS `banned_ip`;
CREATE TABLE IF NOT EXISTS `banned_ip` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) NOT NULL,
  `date` int(15) NOT NULL,
  `date_finish` int(15) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `browser_visits`
--

DROP TABLE IF EXISTS `browser_visits`;
CREATE TABLE IF NOT EXISTS `browser_visits` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `website_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `date` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `browser_websites`
--

DROP TABLE IF EXISTS `browser_websites`;
CREATE TABLE IF NOT EXISTS `browser_websites` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `url` varchar(2000) NOT NULL,
  `date` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `ip_reg` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `navigateur` varchar(255) NOT NULL,
  `date_reg` int(15) NOT NULL,
  `date` int(15) NOT NULL,
  `json_reg` varchar(1000) NOT NULL,
  `json` varchar(1000) NOT NULL,
  `screen` varchar(255) NOT NULL,
  `perm` int(1) NOT NULL,
  `unik` varchar(255) NOT NULL,
  `reg_by_admin` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_softwares`
--

DROP TABLE IF EXISTS `users_softwares`;
CREATE TABLE IF NOT EXISTS `users_softwares` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `date` int(15) NOT NULL,
  `toppos` varchar(7) NOT NULL,
  `leftpos` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `visits`
--

DROP TABLE IF EXISTS `visits`;
CREATE TABLE IF NOT EXISTS `visits` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `motor` varchar(1000) NOT NULL,
  `SCRIPT_NAME` varchar(1000) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
