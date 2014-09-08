-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2014 at 04:57 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tortoise`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `attachmentid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `letterid` mediumint(8) unsigned NOT NULL,
  `filename` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `filesize` varchar(30) NOT NULL,
  PRIMARY KEY (`attachmentid`),
  KEY `letterid` (`letterid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contactid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `userid` mediumint(8) unsigned NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `cellphone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `groups` varchar(30) NOT NULL,
  `shared` binary(1) NOT NULL,
  PRIMARY KEY (`contactid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grouppermission`
--

CREATE TABLE IF NOT EXISTS `grouppermission` (
  `grouppermissionid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `groupid` mediumint(8) unsigned NOT NULL,
  `permissionid` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`grouppermissionid`),
  KEY `permissionid` (`permissionid`),
  KEY `groupid` (`groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `grouppermission`
--

INSERT INTO `grouppermission` (`grouppermissionid`, `groupid`, `permissionid`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 3, 2),
(4, 1, 3),
(5, 2, 3),
(6, 1, 4),
(7, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `groupid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(30) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`groupid`, `groupname`) VALUES
(1, 'مدیریت'),
(2, 'خوراکی'),
(3, 'خدماتی');

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE IF NOT EXISTS `letter` (
  `letterid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `usertitle` mediumint(8) unsigned NOT NULL,
  `userid` mediumint(8) unsigned NOT NULL,
  `parentletterid` mediumint(8) unsigned DEFAULT NULL,
  `letternumber` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `fromuser` varchar(30) NOT NULL,
  `touser` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `mainText` varchar(30) NOT NULL,
  `attachment` varchar(30) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `hasattachment` binary(1) NOT NULL,
  `eghdam` varchar(30) NOT NULL,
  PRIMARY KEY (`letterid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `optionid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(200) NOT NULL,
  `option_value` varchar(200) NOT NULL,
  PRIMARY KEY (`optionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`optionid`, `option_name`, `option_value`) VALUES
(1, 'organization_name', 'اتوماسیون اداری سنگ پشت'),
(2, 'letter_header', 'images/header/5e168911bd81395fe9fb4eb8fad4adfb.jpg'),
(4, 'deadline_archive', '7');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `permissionId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `permissionName` varchar(50) NOT NULL,
  PRIMARY KEY (`permissionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permissionId`, `permissionName`) VALUES
(1, 'لاگین کردن'),
(2, 'ارسال نامه'),
(3, 'حذف نامه'),
(4, 'حذف کاربر');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE IF NOT EXISTS `receivers` (
  `receiverid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `userid` mediumint(8) unsigned NOT NULL,
  `letterid` mediumint(8) unsigned NOT NULL,
  `receivertype` varchar(100) NOT NULL,
  `viewed` binary(1) NOT NULL,
  PRIMARY KEY (`receiverid`),
  KEY `userid` (`userid`),
  KEY `letterid` (`letterid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `titleid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `groupid` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`titleid`),
  KEY `groupid` (`groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`titleid`, `title`, `groupid`) VALUES
(1, 'مدیر سیستم', 1),
(2, 'مسئول سایت', 2),
(3, 'مسئول دبیرخانه', 2),
(7, 'آبدارچی', 3),
(8, 'همینجوری', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(40) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `signature` varchar(500) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  `melicode` varchar(10) NOT NULL,
  `cellphone` varchar(11) DEFAULT NULL,
  `birthdate` varchar(30) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `successor` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `firstname`, `lastname`, `signature`, `createdate`, `melicode`, `cellphone`, `birthdate`, `address`, `successor`) VALUES
(1, 'admin', '6f8f57715090da2632453988d9a1501b', 'سیدمجتبی', 'میردهقان اشکذری', 'null', '2014-07-23 00:00:00', '5518876542', '09133509180', '1987-05-02', 'ایران - یزد - اشکذر', 'not-select'),
(64, 'kamal', '6f8f57715090da2632453988d9a1501b', 'کمال', 'میرزایی صدرآبادی', 'images/signature/10489719_797428810287580_4748689122730761621_n.jpg', '2014-09-04 17:15:40', '3123123', '43322', '34234', '34', 'not-select'),
(65, 'ashraf', '6f8f57715090da2632453988d9a1501b', 'اشرف السادات', 'میردهقان اشکذری', 'images/signature/monitor.png', '2014-09-05 20:31:42', '31245', '546', '7568', '7868', 'not-select');

-- --------------------------------------------------------

--
-- Table structure for table `userpermission`
--

CREATE TABLE IF NOT EXISTS `userpermission` (
  `userpermissionId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `userid` mediumint(8) unsigned NOT NULL,
  `permissionid` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`userpermissionId`),
  KEY `userid` (`userid`),
  KEY `permissionid` (`permissionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usertitle`
--

CREATE TABLE IF NOT EXISTS `usertitle` (
  `usertitleid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `userid` mediumint(8) unsigned NOT NULL,
  `titleid` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`usertitleid`),
  KEY `titleid` (`titleid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `usertitle`
--

INSERT INTO `usertitle` (`usertitleid`, `userid`, `titleid`) VALUES
(100, 1, 1),
(121, 65, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `attachment_ibfk_1` FOREIGN KEY (`letterid`) REFERENCES `letter` (`letterid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grouppermission`
--
ALTER TABLE `grouppermission`
  ADD CONSTRAINT `grouppermission_ibfk_1` FOREIGN KEY (`permissionid`) REFERENCES `permission` (`permissionId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grouppermission_ibfk_2` FOREIGN KEY (`groupid`) REFERENCES `groups` (`groupid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `letter`
--
ALTER TABLE `letter`
  ADD CONSTRAINT `letter_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receivers`
--
ALTER TABLE `receivers`
  ADD CONSTRAINT `receivers_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receivers_ibfk_2` FOREIGN KEY (`letterid`) REFERENCES `letter` (`letterid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `title`
--
ALTER TABLE `title`
  ADD CONSTRAINT `title_ibfk_1` FOREIGN KEY (`groupid`) REFERENCES `groups` (`groupid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userpermission`
--
ALTER TABLE `userpermission`
  ADD CONSTRAINT `userpermission_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userpermission_ibfk_2` FOREIGN KEY (`permissionid`) REFERENCES `permission` (`permissionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usertitle`
--
ALTER TABLE `usertitle`
  ADD CONSTRAINT `usertitle_ibfk_1` FOREIGN KEY (`titleid`) REFERENCES `title` (`titleid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usertitle_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
