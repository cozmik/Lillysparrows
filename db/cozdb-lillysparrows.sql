-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2016 at 05:28 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb-categories`
--

INSERT INTO `cozdb-categories` (`id`, `Name`) VALUES
(8, 'another good guy girl'),
(9, 'The first and the last'),
(1, 'Uncategorized');

--
-- Triggers `cozdb-categories`
--
DELIMITER $$
CREATE TRIGGER `cozdb-categories_BEFORE_DELETE` BEFORE DELETE ON `cozdb-categories`
 FOR EACH ROW BEGIN
	update `cozdb-post` set `categoryID` = 1;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-comments`
--

CREATE TABLE IF NOT EXISTS `cozdb-comments` (
  `id` int(255) NOT NULL,
  `author` varchar(55) NOT NULL,
  `comment` longtext NOT NULL,
  `date` date NOT NULL,
  `cozdb-post_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb-comments`
--

INSERT INTO `cozdb-comments` (`id`, `author`, `comment`, `date`, `cozdb-post_id`) VALUES
(1, 'kel', 'jasjda aj  ijaij as sjsiojcosa cas cjsiocjs aco scj dsocj dsocsjd cosdc scsj coscjso cjs csijc scpo sciosjc socdsiocsd', '2016-03-07', 1),
(2, 'Allen Esekhile', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....', '2016-03-13', 2),
(3, 'Alen Mee', 'kjh iuhsiuh icsh iu fisg fl gdslihu hf ;sdifh ds;fishuf;f s;uu ds;ifhs fi;', '2016-03-12', 1),
(4, 'Check me', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(5, 'Kay Kay', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(6, 'Kay Kay', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(7, 'Check me', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(8, 'Allen Esekhile', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 1),
(9, 'Allen Esekhile', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 1),
(10, 'Esekhile Kelvin', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(11, 'Esekhile Kelvin', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(12, 'Check me', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(13, 'Kay Kay', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(14, 'Allen Esekhile', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(15, 'Kelvin Guy', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(16, 'Yoooo', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(17, 'Kelvin Guy', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(18, 'Kay Kay', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(19, 'Kelvin Guy', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(20, 'Check me', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 2),
(21, 'Kelvin Guy', 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm', '2016-03-14', 1),
(22, 'The boy', 'fttasdyua h hc aioch as;ci', '2016-03-28', 61),
(23, 'Its Kelvin Baby', 'ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh', '2016-04-22', 4),
(24, 'Kel test', 'Lets count the comment.....Yeah', '2016-04-22', 5),
(25, 'Kelvin again', 'Test count update again....', '2016-04-22', 4),
(26, 'Kel again', 'Comments count', '2016-04-22', 5),
(27, 'Kel uptown', 'comment comment comment....', '2016-04-22', 5),
(28, 'The guy', 'Who wrote his comments in cap2?', '2016-04-22', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-post`
--

CREATE TABLE IF NOT EXISTS `cozdb-post` (
  `id` int(11) NOT NULL,
  `postTitle` varchar(50) NOT NULL,
  `post` longtext NOT NULL,
  `categoryID` int(11) NOT NULL DEFAULT '0',
  `img` varchar(45) DEFAULT NULL,
  `date` varchar(20) NOT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT 'For published and unpublished',
  `tags` longtext,
  `author_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb-post`
--

INSERT INTO `cozdb-post` (`id`, `postTitle`, `post`, `categoryID`, `img`, `date`, `status`, `tags`, `author_id`) VALUES
(1, 'post test1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute.... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....</p>', 9, '', '2016-04-08', 0, 'new tags again', 1),
(2, 'post test2 ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....', 1, NULL, '2016-01-01', 1, 'the, tag, get', 1),
(4, 'edit try', '<p>var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh</p>', 9, '', '2016-04-06', 1, NULL, 1),
(5, 'hhnhnhhh', '<p>hjgjh ugiug iug ihg ig kugkjuky fluf lufy lf flu ulf lufy ulyfy luyf ulfylufylufyufy lufy ul ul yuf u fyf yuf ufyfulfululyfulyg</p>', 9, '../images/IMG00774-20120323-0912.jpg', '2016-03-17', 1, NULL, 11),
(9, 'yu  yjguy', '<p>output.message</p>', 9, '../images/IMG00681-20120315-1412.jpg', '2016-03-17', 1, NULL, 11),
(10, 'yu  yjguy', '<p>output.message</p>', 9, '', '2016-03-17', 1, NULL, 11),
(15, 'yu  yjguy', '<p>&nbsp;var image = output.file_path;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; var status = 1;</p>', 8, '../images/WIN_20140520_131223.JPG', '2016-03-17', 1, NULL, 11),
(16, 'yu  yjguy', '<p>&nbsp;var image = output.file_path;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; var status = 1;</p>', 8, '', '2016-04-06', 0, NULL, 11),
(60, 'without pix', '<p>hyg ugiugilkgliugligy yulg lyug lu gyugf lufludluf luyfu flufy lufyu kf kuf yulf lkuf lyuf lufyyu</p>', 8, '', '2016-03-19', 1, NULL, 11),
(61, 'wat a title', '<p>fdty yg uyg kuy kutykl luyk ukyut ktt fkyf ytf kfktf khtf ktfkytfktf</p>', 1, 'image', '2016-04-06', 1, 'What a title too', 1),
(68, 'vuuuuuummmmm', '<p>var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh</p>', 9, 'images/DSC02664.JPG', '2016-03-20', 0, NULL, 11),
(69, 'my pix', '<p>var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh</p>', 9, 'images/DSC02655.JPG', '2016-03-20', 0, NULL, 11),
(70, 'trying...........', '<p>var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh</p>', 9, 'images/DSC02667.JPG', '2016-03-20', 0, NULL, 11),
(77, 'another', '<p>var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjhvar image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjhvar image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjhvar image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh</p>', 9, 'images/DSC02672.JPG', '2016-03-20', 0, NULL, 11),
(79, 'another no pix', '<p>var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjhvar image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjhvar image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjhvar image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh</p>', 8, '', '2016-03-20', 1, NULL, 11),
(80, 'i dont have', '<p>var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjhvar image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjhvar image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjhvar image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh</p>', 8, '', '2016-03-20', 1, NULL, 11),
(81, 'black and white', '<p>var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjhvar image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjhvar image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjhvar image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh</p>', 8, 'images/2T3gAGY.jpg', '2016-03-20', 0, NULL, 11),
(82, 'night', '<p>zxhzuc ds cicudi cu piu CPdsucb sdpiu dsiuds pi piu u yub ilbcxo icb poiu bcc piboub cxpo&nbsp; ylucx bio bcxo ipcxyb cxuobcojcbcxuby cxou ccu cxu cb couyb guoybgxco icgcx</p>', 8, 'images/DSC02674.JPG', '2016-03-20', 1, NULL, 11),
(83, 'night', '<p>zxhzuc ds cicudi cu piu CPdsucb sdpiu dsiuds pi piu u yub ilbcxo icb poiu bcc piboub cxpo&nbsp; ylucx bio bcxo ipcxyb cxuobcojcbcxuby cxou ccu cxu cb couyb guoybgxco icgcx</p>', 8, 'images/DSC02674.JPG', '2016-03-20', 1, NULL, 11),
(84, 'night', '<p>zxhzuc ds cicudi cu piu CPdsucb sdpiu dsiuds pi piu u yub ilbcxo icb poiu bcc piboub cxpo&nbsp; ylucx bio bcxo ipcxyb cxuobcojcbcxuby cxou ccu cxu cb couyb guoybgxco icgcx</p>', 8, 'images/1451986220_5.png', '2016-03-20', 1, NULL, 11),
(85, 'night try', '<p>kjH SAXAHSIXU AHXIU X&nbsp;&nbsp; sic dsicu sdcisc cuusciscu sic scis cisc sic iscius cisc sic scs cisdischsisiclciSYCLIds cklusyc dsoc sdupogds psdug dsposOSUyc souyuy uo dspouds dspos piu dspo dsposiudsu dsds iposugh piuh sihoiuVHCDS</p>', 9, 'images/Fiverr.png', '2016-03-20', 0, NULL, 11),
(87, 'mu ihjh jh kj ', '<p>gf v hkgkgh khg khg khj kjhk, vv,jhvnvmvmgg,mjh, jnb,j hb ,njb,j h, h,h ,hj ,jhv,hjvhgcmgc mghf g ghfjgfc gf mg fhgkmgh mgh vmhg fmghmghfmhg mhg f nb gh gh kjh,nhjv jh l hjg lkjhb kjhbkl</p>', 8, '', '2016-03-21', 1, NULL, 11),
(88, 'Dont worry', '<p>Dont worry Dont worry zxhzuc ds cicudi cu piu CPdsucb sdpiu dsiuds pi piu u yub ilbcxo icb poiu bcc piboub cxpo&nbsp; ylucx bio bcxo ipcxyb cxuobcojcbcxuby cxou ccu cxu cb couyb guoybgxco icgcx</p>', 8, 'images/Ethel 20150817_075329.jpg', '2016-03-21', 1, NULL, 11),
(89, 'Good', '<p>auhsduia dah d89ahdca 9dhas9cha cia</p>', 8, 'images/IMG-20160129-WA0002.jpg', '2016-03-28', 0, NULL, 11),
(90, 'hhnhjdb u auh auss', '<p>asiuasd iash ascih cdscds</p>', 8, '', '2016-03-28', 1, NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-quotes`
--

CREATE TABLE IF NOT EXISTS `cozdb-quotes` (
  `id` int(11) NOT NULL,
  `quote` longtext NOT NULL,
  `quote_author` int(50) NOT NULL COMMENT 'The person who originated the quote'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb-quotes`
--

INSERT INTO `cozdb-quotes` (`id`, `quote`, `quote_author`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 2),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 2),
(10, 'vdtr6 tyfi ytfiy tyfkuo tfou vyu f67f yf ufkulg liug luig liug', 2),
(11, 'ghfty f fityf ou gggggggggggggggtyo gku gfkhyf gogfffffffffffffffffuuyu tyyotf yof yuooyu', 1),
(12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 1),
(13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 4),
(16, 'var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh', 6),
(18, 'var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh', 8),
(19, 'var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh', 2),
(20, 'var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh', 8),
(21, 'var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh', 1),
(22, 'var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh', 1),
(23, 'var image = output.file_path; tfyu tif tf 7f i7ftif ik f yufg iy tg iyf iyf gotfoitf ou gfuoygfuofyguyfoyg ogyuiyutyiouygougyougyohug piugougyipugipughoygouygiuhguohglgkjh', 6);

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-storyepisode`
--

CREATE TABLE IF NOT EXISTS `cozdb-storyepisode` (
  `id` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `story` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `episodeTitle` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb-storyepisode`
--

INSERT INTO `cozdb-storyepisode` (`id`, `titleID`, `story`, `status`, `episodeTitle`) VALUES
(2, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(3, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(4, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(5, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(6, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(7, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(8, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(9, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(10, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(11, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(12, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(13, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(14, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(15, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(16, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(17, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(18, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(19, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(22, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(23, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(24, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(25, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(26, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(51, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui</p>', 1, 'One Title edited'),
(52, 7, '<p>qqqqqqqqqqqqqqqqqqqqqq&nbsp;&nbsp;&nbsp; sfdgggggggggggggggggggg</p>', 1, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqq');

-- --------------------------------------------------------

--
-- Table structure for table `cozdb-storytitle`
--

CREATE TABLE IF NOT EXISTS `cozdb-storytitle` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `author` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb-storytitle`
--

INSERT INTO `cozdb-storytitle` (`id`, `title`, `image`, `author`) VALUES
(5, 'play new title', '', 1),
(7, 'the new title', 'images/story/IMG_20140310_00161933.jpg', 1),
(15, 'The image', 'images/story/WIN_20140520_130551.JPG', 11),
(16, 'Another good title', 'images/story/WIN_20140513_163252.JPG', 11);

-- --------------------------------------------------------

--
-- Table structure for table `cozdb_mailing`
--

CREATE TABLE IF NOT EXISTS `cozdb_mailing` (
  `id` int(255) NOT NULL,
  `email` varchar(70) NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `confirm_link` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cozdb_mailing`
--

INSERT INTO `cozdb_mailing` (`id`, `email`, `confirmed`, `confirm_link`) VALUES
(1, 'cozmik05@gmail.com', 1, ''),
(2, 'blinder_007@yahoo.com', 0, ''),
(3, 'cuzmo007@yahoo.com', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cozdb_users`
--

CREATE TABLE IF NOT EXISTS `cozdb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL DEFAULT 'Admin',
  `password` varchar(45) NOT NULL,
  `fName` varchar(45) NOT NULL,
  `lName` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `priviledges` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cozdb_users`
--

INSERT INTO `cozdb_users` (`id`, `username`, `password`, `fName`, `lName`, `email`, `status`, `priviledges`) VALUES
(1, 'Lillysparrows', '111', 'Lillian', 'Eserunine', 'lillysparrows@gmail.com', 'suspended', '00'),
(11, 'anthony', '111', 'anthony', 'anthony', 'anthony@gmail.com', 'active', '2');

--
-- Triggers `cozdb_users`
--
DELIMITER $$
CREATE TRIGGER `cozdb_users_BEFORE_DELETE` BEFORE DELETE ON `cozdb_users`
 FOR EACH ROW BEGIN
 update `cozdb-post` SET `author_id`= 1;
END
$$
DELIMITER ;

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
,`username` varchar(45)
,`userID` int(11)
,`Name` varchar(55)
,`catID` int(11)
,`no_comments` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `quote_author`
--

CREATE TABLE IF NOT EXISTS `quote_author` (
  `id` int(255) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `year` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_author`
--

INSERT INTO `quote_author` (`id`, `author_name`, `year`) VALUES
(1, 'Steve Jobbs', '1952 - 2010'),
(2, 'Bill Gates', '1963 till date'),
(3, 'Anonymous', NULL),
(4, 'kelvin kay', '1989 till date'),
(5, 'No name', '1900 - 2017'),
(6, 'Woverine', '10000 till date'),
(8, 'dtrd', '2000 - 2012'),
(12, 'Phill collins', '1920 - 2006'),
(13, 'Crew Guys', '1900 - 1950');

-- --------------------------------------------------------

--
-- Stand-in structure for view `quote_author_view`
--
CREATE TABLE IF NOT EXISTS `quote_author_view` (
`id` int(255)
,`author_name` varchar(50)
,`year` varchar(255)
,`total_quotes` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `quote_view`
--
CREATE TABLE IF NOT EXISTS `quote_view` (
`id` int(11)
,`quote` longtext
,`author_name` varchar(50)
,`author_id` int(255)
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
,`status` tinyint(1)
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
,`username` varchar(45)
,`title` varchar(100)
,`image` varchar(45)
,`total_episode` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_story`
--
CREATE TABLE IF NOT EXISTS `view_story` (
);

-- --------------------------------------------------------

--
-- Structure for view `post_number`
--
DROP TABLE IF EXISTS `post_number`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_number` AS select `cozdb-categories`.`id` AS `id`,`cozdb-categories`.`Name` AS `Name`,count(`cozdb-post`.`post`) AS `post_numbers` from (`cozdb-categories` left join `cozdb-post` on((`cozdb-categories`.`id` = `cozdb-post`.`categoryID`))) group by `cozdb-categories`.`Name`;

-- --------------------------------------------------------

--
-- Structure for view `post_view`
--
DROP TABLE IF EXISTS `post_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_view` AS select `cozdb-post`.`id` AS `id`,`cozdb-post`.`postTitle` AS `postTitle`,`cozdb-post`.`post` AS `post`,`cozdb-post`.`img` AS `img`,`cozdb-post`.`date` AS `date`,`cozdb-post`.`status` AS `status`,`cozdb-post`.`tags` AS `tags`,`cozdb_users`.`username` AS `username`,`cozdb_users`.`id` AS `userID`,`cozdb-categories`.`Name` AS `Name`,`cozdb-categories`.`id` AS `catID`,count(`cozdb-comments`.`comment`) AS `no_comments` from (((`cozdb-post` left join `cozdb-comments` on((`cozdb-post`.`id` = `cozdb-comments`.`cozdb-post_id`))) join `cozdb-categories` on((`cozdb-post`.`categoryID` = `cozdb-categories`.`id`))) left join `cozdb_users` on((`cozdb-post`.`author_id` = `cozdb_users`.`id`))) group by `cozdb-post`.`post`;

-- --------------------------------------------------------

--
-- Structure for view `quote_author_view`
--
DROP TABLE IF EXISTS `quote_author_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quote_author_view` AS select `quote_author`.`id` AS `id`,`quote_author`.`author_name` AS `author_name`,`quote_author`.`year` AS `year`,count(`cozdb-quotes`.`id`) AS `total_quotes` from (`quote_author` left join `cozdb-quotes` on((`quote_author`.`id` = `cozdb-quotes`.`quote_author`))) group by `quote_author`.`author_name`;

-- --------------------------------------------------------

--
-- Structure for view `quote_view`
--
DROP TABLE IF EXISTS `quote_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quote_view` AS select `cozdb-quotes`.`id` AS `id`,`cozdb-quotes`.`quote` AS `quote`,`quote_author`.`author_name` AS `author_name`,`quote_author`.`id` AS `author_id`,`quote_author`.`year` AS `year` from (`cozdb-quotes` join `quote_author`) where (`cozdb-quotes`.`quote_author` = `quote_author`.`id`);

-- --------------------------------------------------------

--
-- Structure for view `story_view`
--
DROP TABLE IF EXISTS `story_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `story_view` AS select `cozdb-storyepisode`.`id` AS `id`,`cozdb-storyepisode`.`titleID` AS `titleID`,`cozdb-storyepisode`.`story` AS `story`,`cozdb-storyepisode`.`status` AS `status`,`cozdb-storytitle`.`image` AS `image`,`cozdb-storyepisode`.`episodeTitle` AS `episodeTitle`,`cozdb-storytitle`.`title` AS `title`,`cozdb_users`.`username` AS `username` from ((`cozdb-storyepisode` join `cozdb-storytitle`) join `cozdb_users`) where ((`cozdb-storyepisode`.`titleID` = `cozdb-storytitle`.`id`) and (`cozdb-storytitle`.`author` = `cozdb_users`.`id`));

-- --------------------------------------------------------

--
-- Structure for view `title_episode_view`
--
DROP TABLE IF EXISTS `title_episode_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `title_episode_view` AS select `cozdb-storytitle`.`id` AS `id`,`cozdb_users`.`username` AS `username`,`cozdb-storytitle`.`title` AS `title`,`cozdb-storytitle`.`image` AS `image`,count(`cozdb-storyepisode`.`story`) AS `total_episode` from ((`cozdb-storytitle` left join `cozdb-storyepisode` on((`cozdb-storytitle`.`id` = `cozdb-storyepisode`.`titleID`))) join `cozdb_users` on((`cozdb_users`.`id` = `cozdb-storytitle`.`author`))) group by `cozdb-storytitle`.`title`;

-- --------------------------------------------------------

--
-- Structure for view `view_story`
--
DROP TABLE IF EXISTS `view_story`;
-- in use(#1356 - View 'cozdb-lillysparrows.view_story' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

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
  ADD PRIMARY KEY (`id`,`cozdb-post_id`),
  ADD KEY `fk_cozdb-comments_cozdb-post1_idx` (`cozdb-post_id`);

--
-- Indexes for table `cozdb-post`
--
ALTER TABLE `cozdb-post`
  ADD PRIMARY KEY (`id`,`categoryID`,`author_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_cozdb-post_cozdb-categories1_idx` (`categoryID`),
  ADD KEY `fk_cozdb-post_cozdb_users1_idx` (`author_id`);

--
-- Indexes for table `cozdb-quotes`
--
ALTER TABLE `cozdb-quotes`
  ADD PRIMARY KEY (`id`,`quote_author`),
  ADD KEY `fk_cozdb-quotes_quote_author1_idx` (`quote_author`);

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
  ADD PRIMARY KEY (`id`,`author`),
  ADD KEY `fk_cozdb-storytitle_cozdb_users1_idx` (`author`);

--
-- Indexes for table `cozdb_mailing`
--
ALTER TABLE `cozdb_mailing`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cozdb-comments`
--
ALTER TABLE `cozdb-comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `cozdb-post`
--
ALTER TABLE `cozdb-post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `cozdb-quotes`
--
ALTER TABLE `cozdb-quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `cozdb-storyepisode`
--
ALTER TABLE `cozdb-storyepisode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `cozdb-storytitle`
--
ALTER TABLE `cozdb-storytitle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cozdb_mailing`
--
ALTER TABLE `cozdb_mailing`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cozdb_users`
--
ALTER TABLE `cozdb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `quote_author`
--
ALTER TABLE `quote_author`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cozdb-comments`
--
ALTER TABLE `cozdb-comments`
  ADD CONSTRAINT `fk_cozdb-comments_cozdb-post1` FOREIGN KEY (`cozdb-post_id`) REFERENCES `cozdb-post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cozdb-post`
--
ALTER TABLE `cozdb-post`
  ADD CONSTRAINT `fk_cozdb-post_cozdb-categories1` FOREIGN KEY (`categoryID`) REFERENCES `cozdb-categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cozdb-post_cozdb_users1` FOREIGN KEY (`author_id`) REFERENCES `cozdb_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `cozdb-quotes`
--
ALTER TABLE `cozdb-quotes`
  ADD CONSTRAINT `fk_cozdb-quotes_quote_author1` FOREIGN KEY (`quote_author`) REFERENCES `quote_author` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cozdb-storyepisode`
--
ALTER TABLE `cozdb-storyepisode`
  ADD CONSTRAINT `title_fk` FOREIGN KEY (`titleID`) REFERENCES `cozdb-storytitle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
