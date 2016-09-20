-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?09 �?10 �?18:01
-- 服务器版本: 5.5.40
-- PHP 版本: 5.6.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `xinban32`
--

-- --------------------------------------------------------

--
-- 表的结构 `ask_ad`
--

CREATE TABLE IF NOT EXISTS `ask_ad` (
  `html` text,
  `page` varchar(50) NOT NULL DEFAULT '',
  `position` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`page`,`position`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_answer`
--

CREATE TABLE IF NOT EXISTS `ask_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` char(50) NOT NULL,
  `author` varchar(15) NOT NULL DEFAULT '',
  `authorid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `adopttime` int(10) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  `comments` int(10) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ip` varchar(20) DEFAULT NULL,
  `supports` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `qid` (`qid`),
  KEY `authorid` (`authorid`),
  KEY `adopttime` (`adopttime`),
  KEY `time` (`time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=590 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_answer_append`
--

CREATE TABLE IF NOT EXISTS `ask_answer_append` (
  `appendanswerid` int(10) NOT NULL AUTO_INCREMENT,
  `answerid` int(10) NOT NULL,
  `author` varchar(20) NOT NULL,
  `authorid` int(10) NOT NULL,
  `content` text NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`appendanswerid`),
  KEY `answerid` (`answerid`),
  KEY `authorid` (`authorid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_answer_comment`
--

CREATE TABLE IF NOT EXISTS `ask_answer_comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aid` int(10) NOT NULL,
  `authorid` int(10) NOT NULL,
  `author` char(18) NOT NULL,
  `content` varchar(100) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=196 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_answer_support`
--

CREATE TABLE IF NOT EXISTS `ask_answer_support` (
  `sid` char(16) NOT NULL,
  `aid` int(10) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`sid`,`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_attach`
--

CREATE TABLE IF NOT EXISTS `ask_attach` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `filename` char(100) NOT NULL DEFAULT '',
  `filetype` char(50) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `location` char(100) NOT NULL DEFAULT '',
  `downloads` mediumint(8) NOT NULL DEFAULT '0',
  `isimage` tinyint(1) NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `time` (`time`,`isimage`,`downloads`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ask_attach`
--

INSERT INTO `ask_attach` (`id`, `time`, `filename`, `filetype`, `filesize`, `location`, `downloads`, `isimage`, `uid`) VALUES
(1, 1453170296, '首页.png', '.png', 101404, 'data/attach/1601/L5ou07vJ.png', 0, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ask_badword`
--

CREATE TABLE IF NOT EXISTS `ask_badword` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `admin` varchar(15) NOT NULL DEFAULT '',
  `find` varchar(255) NOT NULL DEFAULT '',
  `replacement` varchar(255) NOT NULL DEFAULT '',
  `findpattern` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `find` (`find`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_banned`
--

CREATE TABLE IF NOT EXISTS `ask_banned` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `ip1` char(3) NOT NULL,
  `ip2` char(3) NOT NULL,
  `ip3` char(3) NOT NULL,
  `ip4` char(3) NOT NULL,
  `admin` varchar(15) NOT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `expiration` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_category`
--

CREATE TABLE IF NOT EXISTS `ask_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `dir` char(30) NOT NULL,
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `grade` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  `questions` int(10) unsigned NOT NULL DEFAULT '0',
  `alias` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `ask_category`
--

INSERT INTO `ask_category` (`id`, `name`, `dir`, `pid`, `grade`, `displayorder`, `questions`, `alias`) VALUES
(1, '默认分类', 'default', 0, 1, 0, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ask_category_admin`
--

CREATE TABLE IF NOT EXISTS `ask_category_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_credit`
--

CREATE TABLE IF NOT EXISTS `ask_credit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `operation` varchar(100) NOT NULL DEFAULT '',
  `credit1` smallint(6) NOT NULL DEFAULT '0',
  `credit2` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=138 ;

--
-- 转存表中的数据 `ask_credit`
--

INSERT INTO `ask_credit` (`id`, `uid`, `time`, `operation`, `credit1`, `credit2`) VALUES
(1, 1, 1448242262, 'user/login', 2, 0),
(2, 1, 1448271533, 'question/answer', 2, 0),
(3, 1, 1448273491, 'question/answer', 2, 0),
(4, 1, 1448273665, 'question/answer', 2, 0),
(5, 1, 1448274027, 'question/answer', 2, 0),
(6, 1, 1448274558, 'question/answer', 2, 0),
(7, 1, 1448274775, 'question/answer', 2, 0),
(8, 1, 1448274834, 'question/answer', 2, 0),
(9, 1, 1448335252, 'user/login', 2, 0),
(10, 1, 1451962763, 'user/login', 2, 0),
(11, 1, 1452080998, 'user/login', 2, 0),
(12, 1, 1452138169, 'user/login', 2, 0),
(13, 1, 1452144388, 'question/answer', 2, 0),
(14, 1, 1452487944, 'user/login', 2, 0),
(15, 1, 1452921338, 'user/login', 2, 0),
(16, 1, 1454158680, 'user/login', 2, 0),
(17, 312, 1454159808, 'user/register', 20, 20),
(18, 313, 1454159821, 'user/register', 20, 20),
(19, 314, 1454159862, 'user/register', 20, 20),
(20, 315, 1454159903, 'user/register', 20, 20),
(21, 316, 1454159951, 'user/register', 20, 20),
(22, 317, 1454159981, 'user/register', 20, 20),
(23, 318, 1454159988, 'user/register', 20, 20),
(24, 319, 1454160111, 'user/register', 20, 20),
(25, 315, 1454160124, 'user/login', 2, 0),
(26, 320, 1454162821, 'user/register', 20, 20),
(27, 318, 1454163066, 'user/login', 2, 0),
(28, 321, 1454163135, 'user/register', 20, 20),
(29, 313, 1454163193, 'user/login', 2, 0),
(30, 312, 1454163262, 'user/login', 2, 0),
(31, 316, 1454163322, 'user/login', 2, 0),
(32, 314, 1454163355, 'user/login', 2, 0),
(33, 321, 1454164629, 'user/login', 2, 0),
(34, 322, 1454164959, 'user/register', 20, 20),
(35, 323, 1454165385, 'user/register', 20, 20),
(36, 324, 1454165466, 'user/register', 20, 20),
(37, 325, 1454165629, 'user/register', 20, 20),
(38, 326, 1454165833, 'user/register', 20, 20),
(39, 327, 1454165859, 'user/register', 20, 20),
(40, 328, 1454166030, 'user/register', 20, 20),
(41, 329, 1454166213, 'user/register', 20, 20),
(42, 323, 1454166222, 'user/login', 2, 0),
(43, 327, 1454166567, 'user/login', 2, 0),
(44, 330, 1454172146, 'user/register', 20, 20),
(45, 331, 1454172382, 'user/register', 20, 20),
(46, 322, 1454198760, 'user/login', 2, 0),
(47, 332, 1454200042, 'user/register', 20, 20),
(48, 333, 1454201923, 'user/register', 20, 20),
(49, 334, 1454201956, 'user/register', 20, 20),
(50, 335, 1454201976, 'user/register', 20, 20),
(51, 330, 1454201997, 'user/login', 2, 0),
(52, 336, 1454202091, 'user/register', 20, 20),
(53, 337, 1454202135, 'user/register', 20, 20),
(54, 336, 1454202161, 'user/login', 2, 0),
(55, 338, 1454202199, 'user/register', 20, 20),
(56, 339, 1454202346, 'user/register', 20, 20),
(57, 1, 1454212940, 'user/login', 2, 0),
(58, 314, 1454219806, 'user/login', 2, 0),
(59, 321, 1454219852, 'user/login', 2, 0),
(60, 318, 1454222043, 'user/login', 2, 0),
(61, 318, 1454222222, 'question/answer', 2, 0),
(62, 318, 1454222242, 'question/answer', 2, 0),
(63, 318, 1454222330, 'question/answer', 2, 0),
(64, 340, 1454223570, 'user/register', 20, 20),
(65, 341, 1454223907, 'user/register', 20, 20),
(66, 342, 1454224472, 'user/register', 20, 20),
(67, 341, 1454224695, 'question/answer', 2, 0),
(68, 323, 1454226701, 'user/login', 2, 0),
(69, 319, 1454232020, 'user/login', 2, 0),
(70, 315, 1454233236, 'user/login', 2, 0),
(71, 343, 1454233299, 'user/register', 20, 20),
(72, 336, 1454257407, 'user/login', 2, 0),
(73, 327, 1454259362, 'user/login', 2, 0),
(74, 335, 1454259738, 'user/login', 2, 0),
(75, 322, 1454262535, 'user/login', 2, 0),
(76, 319, 1454301794, 'user/login', 2, 0),
(77, 331, 1454312148, 'user/login', 2, 0),
(78, 325, 1454343563, 'user/login', 2, 0),
(79, 335, 1454346200, 'user/login', 2, 0),
(80, 339, 1454350179, 'user/login', 2, 0),
(81, 334, 1454350331, 'user/login', 2, 0),
(82, 338, 1454447530, 'user/login', 2, 0),
(83, 336, 1454451091, 'user/login', 2, 0),
(84, 327, 1454513595, 'user/login', 2, 0),
(85, 335, 1454518395, 'user/login', 2, 0),
(86, 336, 1454519190, 'user/login', 2, 0),
(87, 321, 1454546904, 'user/login', 2, 0),
(88, 335, 1454605332, 'user/login', 2, 0),
(89, 321, 1454736024, 'user/login', 2, 0),
(90, 335, 1454861947, 'user/login', 2, 0),
(91, 335, 1454951793, 'user/login', 2, 0),
(92, 335, 1455038130, 'user/login', 2, 0),
(93, 344, 1455038216, 'user/register', 20, 20),
(94, 335, 1455209864, 'user/login', 2, 0),
(95, 335, 1455614096, 'user/login', 2, 0),
(96, 327, 1455902067, 'user/login', 2, 0),
(97, 1, 1456366283, 'user/login', 2, 0),
(98, 345, 1456388324, 'user/register', 20, 20),
(99, 346, 1456472699, 'user/register', 20, 20),
(100, 1, 1456715840, 'user/login', 2, 0),
(101, 1, 1456806931, 'user/login', 2, 0),
(102, 207, 1456824063, 'user/login', 2, 0),
(103, 1, 1456827366, 'message/send', -1, 0),
(104, 207, 1456827517, 'message/send', -1, 0),
(105, 207, 1456827542, 'message/send', -1, 0),
(106, 1, 1456832017, 'message/send', -1, 0),
(107, 1, 1456888611, 'message/send', -1, 0),
(108, 1, 1456888666, 'message/send', -1, 0),
(109, 1, 1456888705, 'message/send', -1, 0),
(110, 1, 1456889804, 'message/send', -1, 0),
(111, 1, 1456896166, 'offer', 0, -3),
(112, 1, 1456896166, 'question/add', 5, 0),
(113, 207, 1456896323, 'question/answer', 2, 0),
(114, 207, 1456896394, 'message/send', -1, 0),
(115, 207, 1456897013, 'question/answer', 2, 0),
(116, 1, 1456921046, 'question/answer', 2, 0),
(117, 1, 1457182725, 'question/answer', 2, 0),
(118, 1, 1457183007, 'question/answer', 2, 0),
(119, 1, 1457183097, 'question/answer', 2, 0),
(120, 1, 1457183139, 'question/answer', 2, 0),
(121, 1, 1457184804, 'question/answer', 2, 0),
(122, 1, 1457185618, 'adopt', 5, 96),
(123, 1, 1457185648, 'adopt', 5, 96),
(124, 1, 1457185975, 'adopt', 5, 95),
(125, 207, 1457186191, 'adopt', 5, 5),
(126, 1, 1457186223, 'adopt', 5, 102),
(127, 1, 1457186320, 'adopt', 5, 96),
(128, 1, 1457186913, 'adopt', 5, 35),
(129, 1, 1457233300, 'question/answer', 2, 0),
(130, 1, 1458383276, 'adopt', 5, 47),
(131, 318, 1458396805, 'adopt', 5, 92),
(132, 347, 1458446940, 'user/register', 20, 20),
(133, 347, 1458447078, 'question/answer', 2, 0),
(134, 1, 1458462441, 'user/login', 2, 0),
(135, 1, 1473480786, 'offer', 0, 0),
(136, 1, 1473480786, 'question/add', 5, 0),
(137, 1, 1473497797, 'question/answer', 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ask_crontab`
--

CREATE TABLE IF NOT EXISTS `ask_crontab` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('user','system') NOT NULL DEFAULT 'user',
  `name` char(50) NOT NULL DEFAULT '',
  `method` varchar(50) NOT NULL DEFAULT '',
  `lastrun` int(10) unsigned NOT NULL DEFAULT '0',
  `nextrun` int(10) unsigned NOT NULL DEFAULT '0',
  `weekday` tinyint(1) NOT NULL DEFAULT '0',
  `day` tinyint(2) NOT NULL DEFAULT '0',
  `hour` tinyint(2) NOT NULL DEFAULT '0',
  `minute` char(36) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `nextrun` (`available`,`nextrun`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_datacall`
--

CREATE TABLE IF NOT EXISTS `ask_datacall` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `expression` text NOT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_doing`
--

CREATE TABLE IF NOT EXISTS `ask_doing` (
  `doingid` bigint(20) NOT NULL AUTO_INCREMENT,
  `authorid` int(10) NOT NULL,
  `author` varchar(20) NOT NULL,
  `action` tinyint(1) NOT NULL,
  `questionid` int(10) NOT NULL,
  `content` text,
  `referid` int(10) NOT NULL DEFAULT '0',
  `refer_authorid` int(10) NOT NULL DEFAULT '0',
  `refer_content` tinytext,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`doingid`),
  KEY `authorid` (`authorid`,`author`),
  KEY `sourceid` (`questionid`),
  KEY `createtime` (`createtime`),
  KEY `referid` (`referid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=554 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_editor`
--

CREATE TABLE IF NOT EXISTS `ask_editor` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `tag` varchar(100) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `code` text NOT NULL,
  `displayorder` smallint(3) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_expert`
--

CREATE TABLE IF NOT EXISTS `ask_expert` (
  `uid` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  PRIMARY KEY (`uid`,`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_famous`
--

CREATE TABLE IF NOT EXISTS `ask_famous` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `reason` char(50) DEFAULT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_favorite`
--

CREATE TABLE IF NOT EXISTS `ask_favorite` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `qid` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `qid` (`qid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_gift`
--

CREATE TABLE IF NOT EXISTS `ask_gift` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `credit` int(10) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_giftlog`
--

CREATE TABLE IF NOT EXISTS `ask_giftlog` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `username` char(20) NOT NULL,
  `realname` char(20) NOT NULL,
  `gid` int(10) NOT NULL,
  `giftname` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postcode` char(10) NOT NULL,
  `phone` char(15) NOT NULL,
  `qq` char(15) NOT NULL,
  `email` varchar(30) NOT NULL DEFAULT '',
  `notes` text NOT NULL,
  `credit` int(10) NOT NULL,
  `time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_inform`
--

CREATE TABLE IF NOT EXISTS `ask_inform` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `uid` int(10) NOT NULL,
  `qtitle` varchar(200) NOT NULL,
  `qid` int(100) NOT NULL,
  `aid` int(11) NOT NULL,
  `content` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `counts` int(11) NOT NULL DEFAULT '1',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_keywords`
--

CREATE TABLE IF NOT EXISTS `ask_keywords` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `find` varchar(255) NOT NULL,
  `replacement` varchar(255) NOT NULL,
  `admin` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_link`
--

CREATE TABLE IF NOT EXISTS `ask_link` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ask_link`
--

INSERT INTO `ask_link` (`id`, `displayorder`, `name`, `url`, `description`, `logo`) VALUES
(1, 0, 'php问答系统', 'http://www.ask2.cn', '不错的php建站问答！', '');

-- --------------------------------------------------------

--
-- 表的结构 `ask_login_auth`
--

CREATE TABLE IF NOT EXISTS `ask_login_auth` (
  `uid` int(10) NOT NULL,
  `type` enum('qq','sina') NOT NULL,
  `token` varchar(50) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_message`
--

CREATE TABLE IF NOT EXISTS `ask_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(15) NOT NULL DEFAULT '',
  `fromuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `touid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `new` tinyint(1) NOT NULL DEFAULT '1',
  `subject` varchar(75) NOT NULL DEFAULT '',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `touid` (`touid`,`time`),
  KEY `fromuid` (`fromuid`,`time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_nav`
--

CREATE TABLE IF NOT EXISTS `ask_nav` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `title` char(255) NOT NULL,
  `url` char(255) NOT NULL,
  `target` tinyint(1) NOT NULL DEFAULT '0',
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `displayorder` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `ask_nav`
--

INSERT INTO `ask_nav` (`id`, `name`, `title`, `url`, `target`, `available`, `type`, `displayorder`) VALUES
(1, '问答首页', '问答首页', 'index/default', 0, 1, 1, 0),
(2, '问答动态', '问答动态', 'doing/default', 0, 0, 1, 1),
(3, '问题库', '分类大全', 'category/view/all', 0, 1, 1, 2),
(4, '问答专家', '问答专家', 'expert/default', 0, 1, 1, 3),
(5, '用户专栏', '知识专题', 'topic/default', 0, 1, 1, 4),
(6, '活跃用户', '活跃用户', 'user/activelist', 0, 0, 1, 5),
(7, '财富商城', '财富商城', 'gift/default', 0, 0, 1, 6),
(8, '站内公告', '站内公告', 'note/list', 0, 1, 1, 7);

-- --------------------------------------------------------

--
-- 表的结构 `ask_note`
--

CREATE TABLE IF NOT EXISTS `ask_note` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `authorid` int(10) NOT NULL DEFAULT '0',
  `author` char(18) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `comments` int(10) NOT NULL DEFAULT '0',
  `views` int(10) NOT NULL DEFAULT '0',
  `url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_note_comment`
--

CREATE TABLE IF NOT EXISTS `ask_note_comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `noteid` int(10) NOT NULL,
  `authorid` int(10) NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_question`
--

CREATE TABLE IF NOT EXISTS `ask_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `cid1` smallint(5) unsigned NOT NULL DEFAULT '0',
  `cid2` smallint(5) unsigned NOT NULL DEFAULT '0',
  `cid3` smallint(5) unsigned NOT NULL DEFAULT '0',
  `price` smallint(6) unsigned NOT NULL DEFAULT '0',
  `author` char(15) NOT NULL DEFAULT '',
  `authorid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` char(50) NOT NULL,
  `description` text NOT NULL,
  `supply` text NOT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `answers` smallint(5) unsigned NOT NULL DEFAULT '0',
  `attentions` int(10) NOT NULL DEFAULT '0',
  `goods` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ip` varchar(20) DEFAULT NULL COMMENT 'ipåœ°å€',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cid1` (`cid1`),
  KEY `cid2` (`cid2`),
  KEY `cid3` (`cid3`),
  KEY `time` (`time`),
  KEY `price` (`price`),
  KEY `answers` (`answers`),
  KEY `authorid` (`authorid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=299 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_question_attention`
--

CREATE TABLE IF NOT EXISTS `ask_question_attention` (
  `qid` int(10) NOT NULL,
  `followerid` int(10) NOT NULL,
  `follower` char(18) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`qid`,`followerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_question_supply`
--

CREATE TABLE IF NOT EXISTS `ask_question_supply` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `qid` int(10) NOT NULL,
  `content` text NOT NULL,
  `time` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `time` (`time`),
  KEY `qid` (`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_question_tag`
--

CREATE TABLE IF NOT EXISTS `ask_question_tag` (
  `qid` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`qid`,`name`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_recommend`
--

CREATE TABLE IF NOT EXISTS `ask_recommend` (
  `qid` int(10) unsigned NOT NULL DEFAULT '0',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` char(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_session`
--

CREATE TABLE IF NOT EXISTS `ask_session` (
  `sid` char(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `code` char(4) NOT NULL DEFAULT '',
  `islogin` tinyint(1) NOT NULL DEFAULT '0',
  `ip` varchar(20) DEFAULT NULL COMMENT 'ip地址',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `sid` (`sid`),
  KEY `uid` (`uid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ask_session`
--

INSERT INTO `ask_session` (`sid`, `uid`, `code`, `islogin`, `ip`, `time`) VALUES
('9a748363a6d7fc1a', 0, '', 0, '127.0.0.1', 1473501446);

-- --------------------------------------------------------

--
-- 表的结构 `ask_setting`
--

CREATE TABLE IF NOT EXISTS `ask_setting` (
  `k` varchar(32) NOT NULL DEFAULT '',
  `v` text NOT NULL,
  PRIMARY KEY (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ask_setting`
--

INSERT INTO `ask_setting` (`k`, `v`) VALUES
('site_name', 'ask2问答系统'),
('meta_description', 'ask2问答系统是一套开源的php问答系统，采用灵活的架构开发为企业解决内部需求'),
('meta_keywords', 'php问答系统'),
('cookie_domain', ''),
('cookie_pre', 'ask_'),
('seo_prefix', '?'),
('seo_suffix', '.html'),
('date_format', 'Y/m/d'),
('time_format', 'H:i'),
('time_offset', '8'),
('time_diff', '0'),
('site_icp', '京ICP备15032243号-1'),
('site_statcode', '<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id=''cnzz_stat_icon_1257125959''%3E%3C/span%3E%3Cscript src=''" + cnzz_protocol + "s95.cnzz.com/stat.php%3Fid%3D1257125959'' type=''text/javascript''%3E%3C/script%3E"));</script>'),
('allow_register', '1'),
('access_email', 'qq.com\r\nsina.com\r\n163.com\r\n139.com\r\ngmail.com'),
('censor_email', ''),
('censor_username', '*公主*\r\n*主席*\r\n*呼死*\r\n*云呼*'),
('maildefault', 'test@163.com'),
('mailsend', '1'),
('mailserver', 'smtp.163.com'),
('mailport', '25'),
('mailauth', '0'),
('mailfrom', 'test@163.com'),
('mailauth_username', 'test@163.com'),
('mailauth_password', '123456'),
('maildelimiter', '0'),
('mailusername', '1'),
('mailsilent', '0'),
('credit1_register', '20'),
('credit2_register', '20'),
('credit1_login', '2'),
('credit2_login', '0'),
('credit1_ask', '5'),
('credit2_ask', '0'),
('credit1_answer', '2'),
('credit2_answer', '0'),
('credit1_message', '-1'),
('credit2_message', '0'),
('credit1_adopt', '5'),
('credit2_adopt', '2'),
('list_indexnosolve', '10'),
('list_indexcommend', '10'),
('list_indexreward', '8'),
('list_indexnote', '10'),
('list_indexhottag', '20'),
('list_indexexpert', '4'),
('list_indexallscore', '8'),
('list_indexweekscore', '8'),
('list_default', '20'),
('rss_ttl', '60'),
('code_register', '0'),
('code_login', '0'),
('code_ask', '1'),
('code_message', '0'),
('passport_type', '0'),
('passport_open', '0'),
('passport_key', ''),
('passport_client', ''),
('passport_server', ''),
('passport_login', 'login.php'),
('passport_logout', 'login.php?action=quit'),
('passport_register', 'register.php'),
('passport_expire', '3600'),
('passport_credit1', '0'),
('passport_credit2', '0'),
('overdue_days', '60'),
('ucenter_open', '0'),
('seo_on', '0'),
('seo_title', ''),
('seo_keywords', ''),
('seo_description', ''),
('seo_headers', ''),
('notify_mail', '0'),
('notify_message', '1'),
('tpl_dir', 'zui'),
('verify_question', '0'),
('index_life', '0'),
('msgtpl', 'a:4:{i:0;a:2:{s:5:"title";s:36:"您的问题{wtbt}有了新回答！";s:7:"content";s:51:"你在{wzmc}上的提出的问题有了新回答！";}i:1;a:2:{s:5:"title";s:54:"恭喜，您对问题{wtbt}的回答已经被采纳！";s:7:"content";s:42:"你在{wzmc}上的回答内容被采纳！";}i:2;a:2:{s:5:"title";s:78:"抱歉，您的问题{wtbt}由于长时间没有处理，现已过期关闭！";s:7:"content";s:69:"您的问题{wtbt}由于长时间没有处理，现已过期关闭！";}i:3;a:2:{s:5:"title";s:42:"您对{wtbt}的回答有了新的评分！";s:7:"content";s:36:"您的回答{hdnr}有了新评分！";}}'),
('allow_outer', '3'),
('stopcopy_on', '0'),
('stopcopy_allowagent', 'webkit\r\nopera\r\nmsie\r\ncompatible\r\nbaiduspider\r\ngoogle\r\nsoso\r\nsogou\r\ngecko\r\nmozilla'),
('stopcopy_stopagent', ''),
('stopcopy_maxnum', '60'),
('editor_wordcount', 'false'),
('editor_elementpath', 'false'),
('editor_toolbars', 'bold,forecolor,insertimage,autotypeset,attachment,link,unlink,insertvideo,map,fullscreen'),
('gift_range', 'a:3:{i:0;s:2:"50";i:50;s:3:"100";i:100;s:3:"300";}'),
('usernamepre', 'ask_'),
('usercount', '0'),
('sum_onlineuser_time', '30'),
('sum_category_time', '60'),
('del_tmp_crontab', '1440'),
('allow_credit3', '0'),
('apend_question_num', '5'),
('time_friendly', '1'),
('register_clause', ''),
('site_alias', ''),
('openweixin', ''),
('site_logo', 'http://www.ask2.cn/data/attach/logo/logo.png'),
('tpl_wapdir', 'amazeuiwap'),
('wap_domain', ''),
('maxindex_keywords', '4'),
('pagemaxindex_keywords', '8'),
('max_register_num', '2'),
('register_on', '0'),
('hot_on', '0'),
('title_description', '知名专家为您解答'),
('search_shownum', '5'),
('site_qrcode', '站点别名'),
('banner_color', ''),
('baidu_api', ''),
('banner_img', 'https://gss0.bdstatic.com/7051cy89RcgCncy6lo7D0j9wexYrbOWh7c50/zhidaoribao/2016/0710/top.jpg'),
('wxtoken', '130da4600d0cc6caf650ca4b'),
('auth_key', '8BdS0M5Y5M1L6p8LdleedOcF0rb97Y6NfH9RatcOeV7Dd306c9e71Maq184j2Tew'),
('admin_email', 'webmaster@domain.com'),
('seo_index_title', 'php问答系统-ask2问答官网'),
('seo_index_keywords', 'php问答系统，ask2问答系统'),
('seo_index_description', 'ask2问答系统是传统的php问答系统，可以解决个人站长和中小企业内部需求'),
('seo_question_title', ''),
('seo_question_keywords', ''),
('seo_question_description', ''),
('seo_category_title', ''),
('seo_category_keywords', ''),
('seo_category_description', ''),
('question_share', '<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName(''head'')[0]||body).appendChild(createElement(''script'')).src=''http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=''+~(-new Date()/36e5)];</script>'),
('allow_expert', '0'),
('duoshuoname', '');

-- --------------------------------------------------------

--
-- 表的结构 `ask_tid_qid`
--

CREATE TABLE IF NOT EXISTS `ask_tid_qid` (
  `tid` int(10) NOT NULL DEFAULT '0',
  `qid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`,`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_topic`
--

CREATE TABLE IF NOT EXISTS `ask_topic` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `describtion` text,
  `image` varchar(100) DEFAULT NULL,
  `displayorder` int(10) NOT NULL DEFAULT '0',
  `author` varchar(200) NOT NULL,
  `authorid` int(10) NOT NULL,
  `views` int(10) NOT NULL,
  `articleclassid` int(10) NOT NULL,
  `isphone` int(10) NOT NULL,
  `viewtime` int(10) unsigned NOT NULL,
  `ispc` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_topicclass`
--

CREATE TABLE IF NOT EXISTS `ask_topicclass` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `dir` varchar(200) NOT NULL,
  `pid` int(10) NOT NULL,
  `displayorder` int(10) NOT NULL,
  `articles` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_topic_tag`
--

CREATE TABLE IF NOT EXISTS `ask_topic_tag` (
  `aid` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_user`
--

CREATE TABLE IF NOT EXISTS `ask_user` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(18) NOT NULL,
  `password` char(32) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `groupid` tinyint(3) unsigned NOT NULL DEFAULT '7',
  `credits` int(10) NOT NULL DEFAULT '0',
  `credit1` int(10) NOT NULL DEFAULT '0',
  `credit2` int(10) NOT NULL DEFAULT '0',
  `credit3` int(10) NOT NULL DEFAULT '0',
  `regip` char(15) DEFAULT NULL,
  `regtime` int(10) NOT NULL DEFAULT '0',
  `lastlogin` int(10) unsigned NOT NULL DEFAULT '0',
  `gender` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bday` date DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `qq` varchar(15) DEFAULT NULL,
  `msn` varchar(40) DEFAULT NULL,
  `authstr` varchar(25) DEFAULT NULL,
  `signature` mediumtext,
  `introduction` varchar(200) DEFAULT NULL,
  `questions` int(10) unsigned NOT NULL DEFAULT '0',
  `answers` int(10) unsigned NOT NULL DEFAULT '0',
  `adopts` int(10) unsigned NOT NULL DEFAULT '0',
  `supports` int(10) NOT NULL DEFAULT '0',
  `followers` int(10) NOT NULL DEFAULT '0',
  `attentions` int(10) NOT NULL DEFAULT '0',
  `isnotify` tinyint(1) unsigned NOT NULL DEFAULT '7',
  `elect` int(10) NOT NULL DEFAULT '0',
  `expert` tinyint(2) NOT NULL DEFAULT '0',
  `chuli` int(10) NOT NULL,
  `bankcard` varchar(200) DEFAULT NULL,
  `active` int(10) DEFAULT '0',
  `activecode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=376 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_userbank`
--

CREATE TABLE IF NOT EXISTS `ask_userbank` (
  `id` int(10) NOT NULL,
  `fromuid` int(10) NOT NULL,
  `touid` int(10) NOT NULL,
  `operation` varchar(200) NOT NULL,
  `money` int(10) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_usergroup`
--

CREATE TABLE IF NOT EXISTS `ask_usergroup` (
  `groupid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `level` int(4) NOT NULL DEFAULT '1' COMMENT '用户级别',
  `grouptitle` char(30) NOT NULL DEFAULT '',
  `grouptype` tinyint(1) NOT NULL DEFAULT '2',
  `creditslower` int(10) NOT NULL,
  `creditshigher` int(10) NOT NULL DEFAULT '0',
  `questionlimits` int(10) NOT NULL DEFAULT '0',
  `answerlimits` int(10) NOT NULL DEFAULT '0',
  `credit3limits` int(10) NOT NULL DEFAULT '0',
  `regulars` text NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `ask_usergroup`
--

INSERT INTO `ask_usergroup` (`groupid`, `level`, `grouptitle`, `grouptype`, `creditslower`, `creditshigher`, `questionlimits`, `answerlimits`, `credit3limits`, `regulars`) VALUES
(1, 0, '超级管理员', 1, 0, 1, 0, 0, 0, 'user/qqlogin,user/register,index/default,category/view,category/list,question/view,category/recommend,note/list,note/view,rss/category,rss/list,rss/question,user/space,user/scorelist,question/search,question/add,gift/default,gift/search,gift/add\r\n'),
(2, 0, '管理员', 1, 0, 1, 0, 0, 0, 'user/qqlogin,user/register,index/default,category/view,category/list,question/view,category/recommend,note/list,note/view,rss/category,rss/list,rss/question,user/space,user/scorelist,question/search,question/add,gift/default,gift/search,gift/add\r\n,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(3, 0, '分类员', 1, 0, 1, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/qqlogin,gift/default,gift/search,gift/add,question/search,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(6, 0, '游客', 3, 0, 1, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,doing/default,user/space_ask,user/space_answer,user/space'),
(7, 1, '书童', 2, 0, 80, 3, 3, 5, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail'),
(8, 2, '书生', 2, 80, 400, 5, 5, 8, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(9, 3, '秀才', 2, 400, 800, 10, 10, 10, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(10, 4, '举人', 2, 800, 2000, 15, 15, 12, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(11, 5, '解元', 2, 2000, 4000, 10, 10, 10, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(12, 6, '贡士', 2, 4000, 7000, 15, 15, 20, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(13, 7, '会元', 2, 7000, 10000, 15, 15, 20, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(14, 8, '同进士出身', 2, 10000, 14000, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(15, 9, '大学士', 2, 14000, 18000, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(16, 10, '探花', 2, 18000, 22000, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(17, 11, '榜眼', 2, 22000, 32000, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(18, 12, '状元', 2, 32000, 45000, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(19, 13, '编修', 2, 45000, 60000, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(20, 14, '府丞', 2, 60000, 100000, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(21, 15, '翰林学士', 2, 100000, 150000, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(22, 16, '御史中丞', 2, 150000, 250000, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(23, 17, '詹士', 2, 250000, 400000, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(24, 18, '侍郎', 2, 400000, 700000, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(25, 19, '大学士', 2, 700000, 1000000, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail'),
(26, 20, '文曲星', 2, 1000000, 999999999, 0, 0, 0, 'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail,user/sendcheckmail,user/editemail');

-- --------------------------------------------------------

--
-- 表的结构 `ask_userlog`
--

CREATE TABLE IF NOT EXISTS `ask_userlog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sid` varchar(10) NOT NULL DEFAULT '',
  `type` enum('login','ask','answer') NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`),
  KEY `time` (`time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- 表的结构 `ask_user_attention`
--

CREATE TABLE IF NOT EXISTS `ask_user_attention` (
  `uid` int(10) NOT NULL,
  `followerid` int(10) NOT NULL,
  `follower` char(18) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`uid`,`followerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_user_category`
--

CREATE TABLE IF NOT EXISTS `ask_user_category` (
  `uid` int(10) NOT NULL,
  `cid` int(4) NOT NULL,
  PRIMARY KEY (`uid`,`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_user_readlog`
--

CREATE TABLE IF NOT EXISTS `ask_user_readlog` (
  `uid` int(10) NOT NULL,
  `qid` int(10) NOT NULL,
  PRIMARY KEY (`uid`,`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ask_visit`
--

CREATE TABLE IF NOT EXISTS `ask_visit` (
  `ip` varchar(15) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  KEY `ip` (`ip`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
