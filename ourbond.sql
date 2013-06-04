-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2012 at 09:57 PM
-- Server version: 5.5.20
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ourbond`
--

-- --------------------------------------------------------

--
-- Table structure for table `bond`
--

CREATE TABLE IF NOT EXISTS `bond` (
  `ID_BOND` int(11) NOT NULL AUTO_INCREMENT,
  `BOND_NAME` varchar(20) NOT NULL DEFAULT 'New Group',
  `ISPUBLIC` int(1) NOT NULL DEFAULT '1',
  `FOUND_DATE` datetime NOT NULL,
  `FOUNDER_ID` int(11) NOT NULL,
  `bond_pic` varchar(60) NOT NULL DEFAULT 'bond_pics/default_bond.jpg',
  `post_number` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_BOND`),
  UNIQUE KEY `BOND_NAME` (`BOND_NAME`),
  KEY `FOUNDER_ID` (`FOUNDER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `bond`
--

INSERT INTO `bond` (`ID_BOND`, `BOND_NAME`, `ISPUBLIC`, `FOUND_DATE`, `FOUNDER_ID`, `bond_pic`, `post_number`) VALUES
(24, 'Music', 1, '2012-05-09 20:45:41', 20, 'bond_pics/24.jpg', 4),
(25, 'Test', 0, '2012-05-10 14:25:22', 23, 'bond_pics/25.jpg', 1),
(26, 'tiny_img', 0, '2012-05-10 14:28:27', 23, 'bond_pics/26.jpg', 0),
(27, 'Movies', 1, '2012-05-10 14:39:23', 22, 'bond_pics/27.jpg', 1),
(28, 'Travels', 1, '2012-05-10 15:22:09', 23, 'bond_pics/28.jpg', 14),
(29, 'Manga', 1, '2012-05-10 15:22:48', 23, 'bond_pics/29.jpg', 0),
(30, 'Rock Band', 0, '2012-05-10 15:24:52', 21, 'bond_pics/30.jpg', 1),
(31, 'Sports', 0, '2012-05-10 15:25:24', 21, 'bond_pics/31.jpg', 0),
(32, 'Bleach', 1, '2012-05-10 15:26:04', 21, 'bond_pics/32.jpg', 1),
(33, 'Japan', 1, '2012-05-10 15:27:43', 22, 'bond_pics/33.jpg', 0),
(34, 'France', 1, '2012-05-10 15:28:28', 20, 'bond_pics/34.jpg', 0),
(35, 'alert("asdfas");', 0, '2012-05-10 16:31:25', 22, 'bond_pics/35.jpg', 0),
(36, 'dfgdfgd', 0, '2012-05-10 20:39:10', 20, 'bond_pics/36.jpg', 0),
(37, '', 0, '2012-05-10 20:52:37', 23, 'bond_pics/37.jpg', 0),
(38, 'New', 1, '2012-05-10 20:52:57', 23, 'bond_pics/38.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT,
  `POST_CONTENT` varchar(1000) DEFAULT NULL,
  `ID_POST` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `COMMENT_DATE` datetime NOT NULL,
  `good` int(11) NOT NULL DEFAULT '0',
  `bad` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_COMMENT`),
  KEY `ID_POST` (`ID_POST`),
  KEY `ID_USER` (`ID_USER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID_COMMENT`, `POST_CONTENT`, `ID_POST`, `ID_USER`, `COMMENT_DATE`, `good`, `bad`) VALUES
(76, 'No, How is that?', 9, 20, '2012-05-10 11:21:16', 0, 0),
(77, 'I like Wonder Girl.', 9, 20, '2012-05-10 11:25:16', 0, 0),
(78, 'WG is much better than GG.', 9, 20, '2012-05-10 11:26:53', 0, 0),
(79, 'Hide in the restroom at 2nd floor of library.', 8, 20, '2012-05-10 11:27:40', 1, 0),
(80, 'Ok, then I don''t like them either. I like bb...looking forward their concert in New York.', 9, 21, '2012-05-10 11:29:24', 0, 0),
(81, 'The champion of American Idol sings very good. What''s her name?<br>Carrie?<br>', 9, 21, '2012-05-10 11:30:59', 0, 0),
(82, 'I only know Big Bang theory.', 10, 20, '2012-05-10 11:35:25', 0, 0),
(83, 'Do you mean the TV show. Yeah, I like that very much.', 10, 21, '2012-05-10 11:37:27', 0, 0),
(84, 'Are you still online?', 10, 21, '2012-05-10 13:09:30', 0, 0),
(85, 'Do you know her name ?', 9, 21, '2012-05-10 13:09:54', 0, 0),
(86, 'Great plan ~~', 8, 21, '2012-05-10 13:10:24', 0, 0),
(88, '6-time GRAMMY winner Taylor Swift is at the top of the Billboard chart this week.', 11, 21, '2012-05-10 13:16:26', 1, 0),
(89, 'On Sunday evening, Taylor performed the 111th and final show of her 13-month blockbuster Speak Now World Tour, playing to a capacity crowd for the third consecutive night in Auckland, New Zealandâ€™s Vector Arena. The tour visited stadiums and arenas in 19 countries spanning four continents, with the New Zealand Herald writing of the final show, â€œWhen she came out the room exploded, and she opened super-strong. The set heats up and stays strong â€¦one of the best things about the show is how inclusive it feels - like she would sing personally for everyone on the arena if she couldâ€¦.while as a production it dwarfs any other arena show I''ve seen. One thing abundantly clear to all concerned was that we''re unlikely to witness a show like that again in a long, long time. Maybe ever.â€ Taylor holds the #1, #2, #5 and #8 positions on Australiaâ€™s Aria Top 20 Country Albums sales chart this week.', 11, 21, '2012-05-10 13:17:46', 0, 0),
(90, 'Taylor has two songs on the soundtrack album The Hunger Games â€“ Songs From District 12 and Beyond, which is currently #1 on the iTunes Albums Chart. In addition, she voices the character of Audrey in Dr. Seussâ€™s The LORAX, which is this yearâ€™s top grossing movie to date, with a box office total in excess of $158 million.', 11, 21, '2012-05-10 13:18:01', 0, 0),
(91, 'She is great~', 11, 20, '2012-05-10 13:33:15', 0, 0),
(92, '', 12, 23, '2012-05-10 15:17:56', 1, 0),
(93, 'This is a beautiful place.<br>I want to go there.<br>', 18, 23, '2012-05-10 15:43:44', 1, 0),
(94, 'I have been to span. Barcelona is great', 18, 23, '2012-05-10 15:45:47', 1, 0),
(95, 'I haven''t been to there. But I would like to go there. It looks nice.<br>', 18, 20, '2012-05-10 15:58:08', 0, 0),
(96, 'I agree with you guys.', 18, 20, '2012-05-10 15:58:26', 0, 0),
(97, 'I have been to Japan. It''s also a good place to travel.', 18, 20, '2012-05-10 15:59:31', 0, 0),
(98, 'Have you guys been to China. It''s a great place.', 18, 20, '2012-05-10 16:01:25', 0, 0),
(99, 'I don''t like this place', 18, 22, '2012-05-10 16:14:11', 0, 1),
(100, 'I don''t know what to do', 18, 22, '2012-05-10 16:24:02', 0, 0),
(101, 'It is OK', 18, 22, '2012-05-10 16:24:11', 0, 0),
(102, 'But not that OK', 18, 22, '2012-05-10 16:24:18', 0, 0),
(103, 'O hahahahahahhahaha', 18, 22, '2012-05-10 16:24:26', 0, 0),
(104, 'alert("fasdf");', 27, 22, '2012-05-10 16:29:48', 0, 0),
(105, 'hello', 24, 23, '2012-05-10 18:46:46', 0, 0),
(106, 'create', 23, 23, '2012-05-10 19:09:13', 0, 0),
(107, 'You have to say something!!', 26, 23, '2012-05-10 19:14:45', 0, 0),
(108, 'OMG', 26, 23, '2012-05-10 19:14:49', 0, 0),
(109, 'Hi, what'' s that?', 27, 23, '2012-05-10 19:15:01', 0, 0),
(110, 'haha!! It is interesting~~~', 25, 23, '2012-05-10 19:15:21', 0, 0),
(111, 'I want to see this one. I''m waiting it for a long time!!!', 28, 22, '2012-05-10 19:20:25', 0, 0),
(112, 'I like Will Smith!!', 28, 22, '2012-05-10 19:20:44', 1, 0),
(113, 'This just kicks ass!!', 13, 21, '2012-05-10 19:21:35', 0, 0),
(114, 'Me too. I like him very much. I have seen all his movies.', 28, 21, '2012-05-10 19:22:28', 0, 0),
(115, 'Have you seen this!! It''s very interesting.', 29, 21, '2012-05-10 19:23:57', 1, 0),
(116, 'I also like Naruto!!', 29, 21, '2012-05-10 19:24:14', 0, 0),
(117, 'asasa', 21, 23, '2012-05-10 19:32:31', 0, 0),
(118, 'wqwq', 18, 23, '2012-05-10 19:46:12', 0, 0),
(119, 'fjdsaklfjlaskdf', 32, 23, '2012-05-10 21:00:54', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotkey`
--

CREATE TABLE IF NOT EXISTS `hotkey` (
  `ID_HOTKEY` int(11) NOT NULL AUTO_INCREMENT,
  `CONTENT` varchar(140) NOT NULL,
  `KEY_DATE` datetime NOT NULL,
  PRIMARY KEY (`ID_HOTKEY`),
  UNIQUE KEY `CONTENT` (`CONTENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `ID_POST` int(11) NOT NULL AUTO_INCREMENT,
  `CONTENT` varchar(1000) DEFAULT NULL,
  `ALLOW_COMMENT` int(1) NOT NULL DEFAULT '1' COMMENT '1 true; 0 false',
  `ID_BOND` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `POST_DATE` datetime NOT NULL,
  `nice` int(11) NOT NULL DEFAULT '0',
  `ugly` int(11) NOT NULL DEFAULT '0',
  `pic` varchar(60) NOT NULL DEFAULT 'img/default_p.jpg',
  PRIMARY KEY (`ID_POST`),
  KEY `ID_BOND` (`ID_BOND`),
  KEY `ID_USER` (`ID_USER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID_POST`, `CONTENT`, `ALLOW_COMMENT`, `ID_BOND`, `ID_USER`, `POST_DATE`, `nice`, `ugly`, `pic`) VALUES
(8, 'What''s your zombie survival plan?', 1, 24, 20, '2012-05-09 21:40:16', 1, 0, 'postpic/8.jpg'),
(9, 'Have you been to the concert of Girls Generation at New York City?', 1, 24, 21, '2012-05-10 11:20:45', 1, 0, 'postpic/9.jpg'),
(10, 'Is there anyone here like BigBang?', 1, 24, 21, '2012-05-10 11:33:36', 1, 0, 'postpic/10.jpg'),
(11, 'Anyone here like Tyler Swift?', 1, 24, 21, '2012-05-10 13:12:52', 1, 0, 'postpic/11.jpg'),
(12, ' alert("I input java script code");', 1, 25, 23, '2012-05-10 15:17:10', 0, 0, 'postpic/12.jpg'),
(13, 'I like rockin roll !!!!', 1, 30, 21, '2012-05-10 15:27:01', 0, 1, 'postpic/13.jpg'),
(14, 'Base', 1, 28, 20, '2012-05-10 15:31:50', 0, 0, 'postpic/14.jpg'),
(15, 'Kai xuan men', 1, 28, 20, '2012-05-10 15:32:12', 1, 0, 'postpic/15.jpg'),
(16, 'Greece. A beautiful country ', 1, 28, 20, '2012-05-10 15:33:11', 0, 0, 'img/default_p.jpg'),
(17, 'The Great Wall', 1, 28, 20, '2012-05-10 15:33:57', 0, 0, 'postpic/17.jpg'),
(18, 'Excellent Beach.', 1, 28, 21, '2012-05-10 15:35:12', 0, 0, 'postpic/18.jpg'),
(20, 'Fuji Mountain', 1, 28, 21, '2012-05-10 15:36:26', 0, 0, 'postpic/20.jpg'),
(21, 'Mountain', 1, 28, 21, '2012-05-10 15:36:47', 0, 0, 'postpic/21.jpg'),
(22, 'Beautiful Beach', 1, 28, 23, '2012-05-10 15:37:30', 0, 0, 'postpic/22.jpg'),
(23, 'Honey Moon places', 1, 28, 23, '2012-05-10 15:38:08', 0, 0, 'postpic/23.jpg'),
(24, 'Topics-greece', 1, 28, 23, '2012-05-10 15:38:36', 0, 0, 'postpic/24.jpg'),
(25, 'Fuji mountain 2', 1, 28, 23, '2012-05-10 15:38:58', 0, 0, 'postpic/25.jpg'),
(26, 'Hello Prof.', 1, 28, 23, '2012-05-10 15:39:29', 0, 0, 'img/default_p.jpg'),
(27, 'I am in wrong group.', 1, 28, 23, '2012-05-10 15:39:54', 0, 0, 'postpic/27.jpg'),
(28, 'This will be on May 25th!!!', 1, 27, 22, '2012-05-10 19:19:22', 1, 0, 'postpic/28.jpg'),
(29, 'This is just awesome!!', 1, 32, 21, '2012-05-10 19:23:26', 1, 0, 'postpic/29.jpg'),
(30, 'flkjlfjakjlfasfas', 1, 24, 23, '2012-05-10 20:54:46', 0, 0, 'postpic/30.jpg'),
(31, 'fsadfasf', 1, 38, 23, '2012-05-10 20:59:58', 0, 0, 'img/default_p.jpg'),
(32, ';zxlkgf;lkg;sdlf', 1, 38, 23, '2012-05-10 21:00:17', 0, 0, 'img/default_p.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post_hotkey`
--

CREATE TABLE IF NOT EXISTS `post_hotkey` (
  `ID_POST` int(11) NOT NULL,
  `ID_HOTKEY` int(11) NOT NULL,
  PRIMARY KEY (`ID_POST`,`ID_HOTKEY`),
  KEY `ID_HOTKEY` (`ID_HOTKEY`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `ROLE` int(1) NOT NULL,
  `ISPUBLIC` int(1) NOT NULL COMMENT 'personal page can be view by others or not',
  `ID_USER` int(11) NOT NULL,
  KEY `ID_USER` (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `ID_STATUS` int(11) NOT NULL AUTO_INCREMENT,
  `CONTENT` varchar(140) DEFAULT NULL,
  `ID_USER` int(11) NOT NULL,
  `STATUS_DATE` datetime NOT NULL,
  PRIMARY KEY (`ID_STATUS`),
  KEY `ID_USER` (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `PASSWORD` varchar(40) NOT NULL,
  `FIRSTNAME` varchar(20) NOT NULL,
  `LASTNAME` varchar(20) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `SEX` int(1) NOT NULL COMMENT '0 female\r\n1 male',
  `BITHDAY` date NOT NULL,
  `photo` varchar(20) NOT NULL DEFAULT 'img/default.jpg',
  `ispublic` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `SEX`, `BITHDAY`, `photo`, `ispublic`) VALUES
(20, '88QNpqLp96rfA', 'Binzhe', 'Liu', 'liubinzhe@gmail.com', 1, '1988-11-08', 'img/default.jpg', 0),
(21, '88QNpqLp96rfA', 'Wen', 'Wang', 'wwang22@stevens.edu', 0, '1988-08-24', 'img/default.jpg', 0),
(22, '12yJ.Of/NQ.Pk', 'Cha''o', 'Cui', 'cc.chaocui@gmail.com', 1, '1988-01-06', 'img/default.jpg', 0),
(23, '88QNpqLp96rfA', 'Tyler', 'Swift', 'liubinzhe@sina.com', 0, '1988-09-08', 'img/default.jpg', 1),
(27, 'XyTRtfCeWSPsI', 'Bob', 'O''Connor', 'wangwen8820@gmail.com', 1, '1984-08-17', 'img/default.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_bond`
--

CREATE TABLE IF NOT EXISTS `user_bond` (
  `ID_USER` int(11) NOT NULL,
  `ID_BOND` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`ID_USER`,`ID_BOND`),
  KEY `ID_BOND` (`ID_BOND`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_bond`
--

INSERT INTO `user_bond` (`ID_USER`, `ID_BOND`, `status`) VALUES
(20, 24, 1),
(20, 34, 1),
(20, 36, 1),
(21, 24, 1),
(21, 30, 1),
(21, 31, 1),
(21, 32, 1),
(22, 24, 1),
(22, 27, 1),
(22, 28, 1),
(22, 33, 1),
(22, 35, 1),
(23, 24, 1),
(23, 25, 1),
(23, 26, 1),
(23, 27, 1),
(23, 28, 1),
(23, 29, 1),
(23, 32, 1),
(23, 37, 1),
(23, 38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_comment`
--

CREATE TABLE IF NOT EXISTS `user_comment` (
  `id_user` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_comment`
--

INSERT INTO `user_comment` (`id_user`, `id_comment`) VALUES
(20, 74),
(21, 88),
(23, 92),
(23, 93),
(23, 94),
(22, 99),
(22, 112),
(21, 115),
(23, 79);

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE IF NOT EXISTS `user_post` (
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`id_user`, `id_post`) VALUES
(21, 9),
(21, 11),
(21, 13),
(23, 15),
(22, 28),
(21, 29),
(23, 8),
(23, 10);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bond`
--
ALTER TABLE `bond`
  ADD CONSTRAINT `bond_ibfk_1` FOREIGN KEY (`FOUNDER_ID`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`ID_BOND`) REFERENCES `bond` (`ID_BOND`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `post_hotkey`
--
ALTER TABLE `post_hotkey`
  ADD CONSTRAINT `post_hotkey_ibfk_1` FOREIGN KEY (`ID_HOTKEY`) REFERENCES `hotkey` (`ID_HOTKEY`),
  ADD CONSTRAINT `post_hotkey_ibfk_2` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`);

--
-- Constraints for table `setting`
--
ALTER TABLE `setting`
  ADD CONSTRAINT `setting_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE;

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE;

--
-- Constraints for table `user_bond`
--
ALTER TABLE `user_bond`
  ADD CONSTRAINT `user_bond_ibfk_1` FOREIGN KEY (`ID_BOND`) REFERENCES `bond` (`ID_BOND`),
  ADD CONSTRAINT `user_bond_ibfk_2` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
