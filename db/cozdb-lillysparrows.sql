-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2016 at 10:17 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cozdb-lillysparrows`
--

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-categories`
--

CREATE TABLE IF NOT EXISTS `cozdb-categories` (
  `id` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb-categories`
--

INSERT INTO `cozdb-categories` (`id`, `Name`) VALUES
(1, 'category one'),
(2, 'category two');

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-comments`
--

CREATE TABLE IF NOT EXISTS `cozdb-comments` (
  `postID` int(11) NOT NULL,
  `author` varchar(55) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `comment` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb-comments`
--

INSERT INTO `cozdb-comments` (`postID`, `author`, `img`, `comment`) VALUES
(1, 'kel', NULL, 'jasjda aj  ijaij as sjsiojcosa cas cjsiocjs aco scj dsocj dsocsjd cosdc scsj coscjso cjs csijc scpo sciosjc socdsiocsd');

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
  `tags` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb-post`
--

INSERT INTO `cozdb-post` (`id`, `postTitle`, `author-user`, `post`, `categoryID`, `img`, `date`, `status`, `tags`) VALUES
(1, 'post test1', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....', 2, NULL, '12/05/2015', 0, 'what, is, the, tag?'),
(2, 'post test2', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....', 1, NULL, '1/1/2016', 1, 'the, tag, get'),
(3, 'another post', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....', 1, NULL, '12/06/2015', 0, 'what, a, tag, does');

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-quotes`
--

CREATE TABLE IF NOT EXISTS `cozdb-quotes` (
  `id` int(11) NOT NULL,
  `quote` longtext NOT NULL,
  `quote_author` int(50) NOT NULL COMMENT 'The person who originated the quote'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb-quotes`
--

INSERT INTO `cozdb-quotes` (`id`, `quote`, `quote_author`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-storyepisode`
--

CREATE TABLE IF NOT EXISTS `cozdb-storyepisode` (
  `id` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `story` longtext NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `episodeTitle` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb-storyepisode`
--

INSERT INTO `cozdb-storyepisode` (`id`, `titleID`, `story`, `image`, `episodeTitle`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....', NULL, 'episode 1'),
(2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....', NULL, 'episode 1'),
(3, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." ', NULL, 'The other try');

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-storytitle`
--

CREATE TABLE IF NOT EXISTS `cozdb-storytitle` (
  `id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb-storytitle`
--

INSERT INTO `cozdb-storytitle` (`id`, `author`, `title`, `image`) VALUES
(1, '10', 'The first Story', NULL),
(2, '9', 'The second story', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cozdb_mailing`
--

CREATE TABLE IF NOT EXISTS `cozdb_mailing` (
  `id` int(255) NOT NULL,
  `email` varchar(70) NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cozdb_mailing`
--

INSERT INTO `cozdb_mailing` (`id`, `email`, `confirmed`) VALUES
(1, 'cozmik05@gmail.com', 1),
(2, 'blinder_007@yahoo.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cozdb_subscribers`
--

CREATE TABLE IF NOT EXISTS `cozdb_subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cozdb_users`
--

CREATE TABLE IF NOT EXISTS `cozdb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fName` varchar(45) NOT NULL,
  `lName` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `priviledges` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb_users`
--

INSERT INTO `cozdb_users` (`id`, `username`, `password`, `fName`, `lName`, `email`, `status`, `priviledges`) VALUES
(9, 'cozmik', '111', 'cozmik', 'coz3', 'cozmik05@webcontractorz.com', 'suspended', 2),
(10, 'dCoz', '111', 'cash', 'flow', 'coz@themail.com', 'active', 0),
(11, 'anthony', '111', 'anthony', 'anthony', 'anthony@gmail.com', 'pending', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_number`
--
CREATE TABLE IF NOT EXISTS `post_number` (
`id` int(11)
,`Name` varchar(55)
,`post_numbers` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_view`
--
CREATE TABLE IF NOT EXISTS `post_view` (
`id` int(11)
,`postTitle` varchar(50)
,`post` longtext
,`img` varchar(45)
,`date` varchar(20)
,`status` tinyint(1)
,`tags` longtext
,`Name` varchar(55)
,`username` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `quote_author`
--

CREATE TABLE IF NOT EXISTS `quote_author` (
  `id` int(255) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `year` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_author`
--

INSERT INTO `quote_author` (`id`, `author_name`, `year`) VALUES
(1, 'Steve Jobbs', '1952 - 2010'),
(2, 'Bill Gates', '1963 till date'),
(3, 'Anonymous', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `quote_view`
--
CREATE TABLE IF NOT EXISTS `quote_view` (
`id` int(11)
,`quote` longtext
,`author_name` varchar(50)
,`year` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `story_view`
--
CREATE TABLE IF NOT EXISTS `story_view` (
`id` int(11)
,`titleID` int(11)
,`story` longtext
,`image` varchar(45)
,`episodeTitle` varchar(100)
,`title` varchar(100)
,`username` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `title_episode_view`
--
CREATE TABLE IF NOT EXISTS `title_episode_view` (
`id` int(11)
,`title` varchar(100)
,`username` varchar(45)
,`total_episode` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_story`
--
CREATE TABLE IF NOT EXISTS `view_story` (
`id` int(11)
,`story` longtext
,`story_image` varchar(45)
,`episodeTitle` varchar(100)
,`title` varchar(100)
,`image` varchar(45)
,`username` varchar(45)
);

-- --------------------------------------------------------

--
-- Structure for view `post_number`
--
DROP TABLE IF EXISTS `post_number`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_number` AS select `cozdb-categories`.`id` AS `id`,`cozdb-categories`.`Name` AS `Name`,count(`cozdb-post`.`post`) AS `post_numbers` from (`cozdb-categories` join `cozdb-post`) where (`cozdb-categories`.`id` = `cozdb-post`.`categoryID`) group by `cozdb-categories`.`Name`;

-- --------------------------------------------------------

--
-- Structure for view `post_view`
--
DROP TABLE IF EXISTS `post_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_view` AS select `cozdb-post`.`id` AS `id`,`cozdb-post`.`postTitle` AS `postTitle`,`cozdb-post`.`post` AS `post`,`cozdb-post`.`img` AS `img`,`cozdb-post`.`date` AS `date`,`cozdb-post`.`status` AS `status`,`cozdb-post`.`tags` AS `tags`,`cozdb-categories`.`Name` AS `Name`,`cozdb_users`.`username` AS `username` from ((`cozdb-post` join `cozdb-categories`) join `cozdb_users`) where ((`cozdb-post`.`categoryID` = `cozdb-categories`.`id`) and (`cozdb-post`.`author-user` = `cozdb_users`.`id`));

-- --------------------------------------------------------

--
-- Structure for view `quote_view`
--
DROP TABLE IF EXISTS `quote_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quote_view` AS select `cozdb-quotes`.`id` AS `id`,`cozdb-quotes`.`quote` AS `quote`,`quote_author`.`author_name` AS `author_name`,`quote_author`.`year` AS `year` from (`cozdb-quotes` join `quote_author`) where (`cozdb-quotes`.`quote_author` = `quote_author`.`id`);

-- --------------------------------------------------------

--
-- Structure for view `story_view`
--
DROP TABLE IF EXISTS `story_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `story_view` AS select `cozdb-storyepisode`.`id` AS `id`,`cozdb-storyepisode`.`titleID` AS `titleID`,`cozdb-storyepisode`.`story` AS `story`,`cozdb-storyepisode`.`image` AS `image`,`cozdb-storyepisode`.`episodeTitle` AS `episodeTitle`,`cozdb-storytitle`.`title` AS `title`,`cozdb_users`.`username` AS `username` from ((`cozdb-storyepisode` join `cozdb-storytitle`) join `cozdb_users`) where ((`cozdb-storyepisode`.`titleID` = `cozdb-storytitle`.`id`) and (`cozdb-storytitle`.`author` = `cozdb_users`.`id`));

-- --------------------------------------------------------

--
-- Structure for view `title_episode_view`
--
DROP TABLE IF EXISTS `title_episode_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `title_episode_view` AS select `cozdb-storytitle`.`id` AS `id`,`cozdb-storytitle`.`title` AS `title`,`cozdb_users`.`username` AS `username`,count(`cozdb-storyepisode`.`story`) AS `total_episode` from ((`cozdb-storytitle` join `cozdb_users`) join `cozdb-storyepisode`) where ((`cozdb-storytitle`.`author` = `cozdb_users`.`id`) and (`cozdb-storytitle`.`id` = `cozdb-storyepisode`.`titleID`)) group by `cozdb-storytitle`.`title`;

-- --------------------------------------------------------

--
-- Structure for view `view_story`
--
DROP TABLE IF EXISTS `view_story`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_story` AS select `cozdb-storyepisode`.`id` AS `id`,`cozdb-storyepisode`.`story` AS `story`,`cozdb-storyepisode`.`image` AS `story_image`,`cozdb-storyepisode`.`episodeTitle` AS `episodeTitle`,`cozdb-storytitle`.`title` AS `title`,`cozdb-storytitle`.`image` AS `image`,`cozdb_users`.`username` AS `username` from ((`cozdb-storyepisode` join `cozdb-storytitle`) join `cozdb_users`) where ((`cozdb-storyepisode`.`episodeTitle` = `cozdb-storytitle`.`id`) and (`cozdb-storytitle`.`author` = `cozdb_users`.`id`));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cozdb-categories`
--
ALTER TABLE `cozdb-categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `Name_UNIQUE` (`Name`);

--
-- Indexes for table `cozdb-comments`
--
ALTER TABLE `cozdb-comments`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `cozdb-post`
--
ALTER TABLE `cozdb-post`
  ADD PRIMARY KEY (`id`,`author-user`,`categoryID`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_cozdb-post_cozdb-users_idx` (`author-user`),
  ADD KEY `fk_cozdb-post_cozdb-categories1_idx` (`categoryID`);

--
-- Indexes for table `cozdb-quotes`
--
ALTER TABLE `cozdb-quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cozdb-storyepisode`
--
ALTER TABLE `cozdb-storyepisode`
  ADD PRIMARY KEY (`titleID`,`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_cozdb-storyEpisode_cozdb-storyTitle1_idx` (`titleID`);

--
-- Indexes for table `cozdb-storytitle`
--
ALTER TABLE `cozdb-storytitle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cozdb_mailing`
--
ALTER TABLE `cozdb_mailing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cozdb_subscribers`
--
ALTER TABLE `cozdb_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `cozdb_users`
--
ALTER TABLE `cozdb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `quote_author`
--
ALTER TABLE `quote_author`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cozdb-categories`
--
ALTER TABLE `cozdb-categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cozdb_mailing`
--
ALTER TABLE `cozdb_mailing`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cozdb_subscribers`
--
ALTER TABLE `cozdb_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cozdb_users`
--
ALTER TABLE `cozdb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `quote_author`
--
ALTER TABLE `quote_author`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
-- Constraints for table `cozdb-storyepisode`
--
ALTER TABLE `cozdb-storyepisode`
  ADD CONSTRAINT `fk_cozdb-storyEpisode_cozdb-storyTitle1` FOREIGN KEY (`titleID`) REFERENCES `cozdb-storytitle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
