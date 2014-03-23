-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 21 Mars 2014 à 02:44
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `waggle`
--
CREATE DATABASE IF NOT EXISTS `waggle` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `waggle`;

-- --------------------------------------------------------

--
-- Structure de la table `belongsto`
--

CREATE TABLE IF NOT EXISTS `belongsto` (
  `userid` int(11) NOT NULL,
  `forumid` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`,`forumid`),
  KEY `forumid` (`forumid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `fileid` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `fileextension` varchar(10) NOT NULL,
  `path` varchar(254) NOT NULL,
  PRIMARY KEY (`fileid`),
  KEY `postid` (`postid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `forumid` int(11) NOT NULL AUTO_INCREMENT,
  `forumname` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `creatorid` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`forumid`),
  KEY `userid` (`creatorid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `content` varchar(300) NOT NULL,
  `userid` int(11) NOT NULL,
  `last_edited_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` varchar(9) NOT NULL DEFAULT 'visible',
  `threadid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  PRIMARY KEY (`postid`),
  KEY `userid` (`userid`),
  KEY `threadid` (`threadid`),
  KEY `parentid` (`parentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `threadid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forumid` int(11) NOT NULL,
  PRIMARY KEY (`threadid`),
  KEY `userid` (`userid`),
  KEY `forumid` (`forumid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(5) NOT NULL DEFAULT 'user',
  `status` varchar(8) NOT NULL DEFAULT 'valid',
  `last_log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `belongsto`
--
ALTER TABLE `belongsto`
  ADD CONSTRAINT `belongsto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `belongsto_ibfk_2` FOREIGN KEY (`forumid`) REFERENCES `forum` (`forumid`);

--
-- Contraintes pour la table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `post` (`postid`);

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`creatorid`) REFERENCES `user` (`userid`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`threadid`) REFERENCES `thread` (`threadid`),
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`parentid`) REFERENCES `post` (`postid`);

--
-- Contraintes pour la table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `thread_ibfk_2` FOREIGN KEY (`forumid`) REFERENCES `forum` (`forumid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
