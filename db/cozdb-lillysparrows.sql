-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2016 at 08:13 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cozdb-lillysparrows`
--

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-categories`
--

CREATE TABLE IF NOT EXISTS `cozdb-categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(55) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `Name_UNIQUE` (`Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-comments`
--

CREATE TABLE IF NOT EXISTS `cozdb-comments` (
  `postID` int(11) NOT NULL,
  `author` varchar(55) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `comment` longtext,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-post`
--

CREATE TABLE IF NOT EXISTS `cozdb-post` (
  `id` int(11) NOT NULL,
  `postTitle` varchar(50) NOT NULL,
  `author-user` int(11) NOT NULL,
  `post` longtext NOT NULL,
  `categoryID` int(11) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `date` varchar(20) NOT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT 'For published and unpublished',
  `tags` longtext,
  PRIMARY KEY (`id`,`author-user`,`categoryID`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_cozdb-post_cozdb-users_idx` (`author-user`),
  KEY `fk_cozdb-post_cozdb-categories1_idx` (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-quotes`
--

CREATE TABLE IF NOT EXISTS `cozdb-quotes` (
  `id` int(11) NOT NULL,
  `quote` longtext NOT NULL,
  `post_author` varchar(50) NOT NULL DEFAULT 'Unknown' COMMENT 'The person who originated the quote',
  `date` varchar(20) NOT NULL,
  `cozdb-users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`cozdb-users_id`),
  KEY `fk_cozdb-quotes_cozdb-users1_idx` (`cozdb-users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-storyepisode`
--

CREATE TABLE IF NOT EXISTS `cozdb-storyepisode` (
  `id` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `story` longtext NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `episodeTitle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`titleID`,`userID`,`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_cozdb-storyEpisode_cozdb-storyTitle1_idx` (`titleID`),
  KEY `fk_cozdb-storyEpisode_cozdb-users1` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-storytitle`
--

CREATE TABLE IF NOT EXISTS `cozdb-storytitle` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cozdb_subscribers`
--

CREATE TABLE IF NOT EXISTS `cozdb_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cozdb_users`
--

CREATE TABLE IF NOT EXISTS `cozdb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fName` varchar(45) NOT NULL,
  `lName` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `priviledges` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cozdb_users`
--

INSERT INTO `cozdb_users` (`id`, `username`, `password`, `fName`, `lName`, `email`, `status`, `priviledges`) VALUES
(1, 'a', 'a', 'tony', 'joe', 'tj@gmail.com', 'pending', 0),
(8, 'b', 'b', 'ben', 'cole', 'bcole@gmail.com', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rss_table`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cozdb-lillysparrows`.`rss_table` AS select `cozdb-lillysparrows`.`cozdb-post`.`id` AS `id`,`cozdb-lillysparrows`.`cozdb-post`.`postTitle` AS `title`,`cozdb-lillysparrows`.`cozdb-users`.`displayName` AS `author`,`cozdb-lillysparrows`.`cozdb-post`.`post` AS `post`,`cozdb-lillysparrows`.`cozdb-post`.`date` AS `date` from (`cozdb-lillysparrows`.`cozdb-post` join `cozdb-lillysparrows`.`cozdb-users`) where (`cozdb-lillysparrows`.`cozdb-post`.`author-user` = `cozdb-lillysparrows`.`cozdb-users`.`id`);
-- Error reading data: (#1356 - View 'cozdb-lillysparrows.rss_table' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cozdb-comments`
--
ALTER TABLE `cozdb-comments`
  ADD CONSTRAINT `fk_cozdb-comments_cozdb-post1` FOREIGN KEY (`postID`) REFERENCES `cozdb-post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cozdb-post`
--
ALTER TABLE `cozdb-post`
  ADD CONSTRAINT `fk_cozdb-post_cozdb-categories1` FOREIGN KEY (`categoryID`) REFERENCES `cozdb-categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cozdb-post_cozdb-users` FOREIGN KEY (`author-user`) REFERENCES `cozdb_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cozdb-quotes`
--
ALTER TABLE `cozdb-quotes`
  ADD CONSTRAINT `fk_cozdb-quotes_cozdb-users1` FOREIGN KEY (`cozdb-users_id`) REFERENCES `cozdb_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cozdb-storyepisode`
--
ALTER TABLE `cozdb-storyepisode`
  ADD CONSTRAINT `fk_cozdb-storyEpisode_cozdb-storyTitle1` FOREIGN KEY (`titleID`) REFERENCES `cozdb-storytitle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cozdb-storyEpisode_cozdb-users1` FOREIGN KEY (`userID`) REFERENCES `cozdb_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
