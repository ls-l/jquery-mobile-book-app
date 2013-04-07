-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2013 at 11:25 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acim`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE IF NOT EXISTS `tbl_book` (
  `tbl_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_book_title` varchar(100) NOT NULL,
  `tbl_book_date` datetime NOT NULL,
  PRIMARY KEY (`tbl_book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`tbl_book_id`, `tbl_book_title`, `tbl_book_date`) VALUES
(1, 'Text Book', '2013-03-23 00:00:00'),
(2, 'Teachers Manual', '2013-03-23 00:00:00'),
(3, 'The Song of Prayer', '2013-03-23 00:00:00'),
(4, 'The Psychotherapy Supplementory', '2013-03-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chapter`
--

CREATE TABLE IF NOT EXISTS `tbl_chapter` (
  `tbl_ch_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_ch_bookid` int(11) NOT NULL,
  `tbl_ch_no` int(11) NOT NULL,
  `tbl_ch_name` varchar(100) NOT NULL,
  `tbl_ch_date` datetime NOT NULL,
  PRIMARY KEY (`tbl_ch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_chapter`
--

INSERT INTO `tbl_chapter` (`tbl_ch_id`, `tbl_ch_bookid`, `tbl_ch_no`, `tbl_ch_name`, `tbl_ch_date`) VALUES
(1, 1, 1, 'introduction-to-miracles', '0000-00-00 00:00:00'),
(2, 1, 2, 'The Illusion Of Separation', '0000-00-00 00:00:00'),
(3, 1, 3, 'Retraining The Mind', '0000-00-00 00:00:00'),
(4, 1, 4, 'The Root Of All Evil', '0000-00-00 00:00:00'),
(5, 1, 5, 'Healing And Wholeness', '0000-00-00 00:00:00'),
(6, 1, 6, 'Attack And Fear', '0000-00-00 00:00:00'),
(7, 1, 7, 'The Consistency Of The Kingdom', '0000-00-00 00:00:00'),
(8, 1, 8, 'The Journey Back', '0000-00-00 00:00:00'),
(9, 1, 9, 'The Correction Of Error', '0000-00-00 00:00:00'),
(10, 1, 10, 'God And The Ego', '0000-00-00 00:00:00'),
(11, 1, 11, 'God''s Plan For Salvation', '0000-00-00 00:00:00'),
(12, 1, 12, 'The Problem Of Guilt', '0000-00-00 00:00:00'),
(13, 1, 13, 'From Perception To Knowledge', '0000-00-00 00:00:00'),
(14, 1, 14, 'bringing-illusions-to-truth', '0000-00-00 00:00:00'),
(15, 1, 15, 'the-purpose-of-time', '0000-00-00 00:00:00'),
(16, 1, 16, 'the-forgiveness-of-illusions', '0000-00-00 00:00:00'),
(17, 1, 17, 'forgiveness-and-healing', '0000-00-00 00:00:00'),
(18, 1, 18, 'the-dream-and-the-reality', '0000-00-00 00:00:00'),
(19, 1, 19, 'beyond-the-body', '0000-00-00 00:00:00'),
(20, 1, 20, 'the-promise-of-resurrection', '0000-00-00 00:00:00'),
(21, 1, 21, 'the-inner-picture', '0000-00-00 00:00:00'),
(22, 1, 22, 'salvation-and-the-holy-relationship', '0000-00-00 00:00:00'),
(23, 1, 23, 'the-war-against-yourself', '0000-00-00 00:00:00'),
(24, 1, 24, 'specialness-and-separation', '0000-00-00 00:00:00'),
(25, 1, 25, 'the-remedy', '0000-00-00 00:00:00'),
(26, 1, 26, 'the-transition', '0000-00-00 00:00:00'),
(27, 1, 27, 'the-body-and-the-dream', '0000-00-00 00:00:00'),
(28, 1, 28, 'the-undoing-of-fear', '0000-00-00 00:00:00'),
(29, 1, 29, 'the-awakening', '0000-00-00 00:00:00'),
(30, 1, 30, 'the-new-beginning', '0000-00-00 00:00:00'),
(31, 1, 31, 'the-simplicity-of-salvation', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `tbl_feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_feedback_enter_date` varchar(10) DEFAULT NULL,
  `tbl_feedback_email` varchar(150) DEFAULT NULL,
  `tbl_feedback_comments` text,
  PRIMARY KEY (`tbl_feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`tbl_feedback_id`, `tbl_feedback_enter_date`, `tbl_feedback_email`, `tbl_feedback_comments`) VALUES
(6, 'dsfsdf', 'sdfsdf', 'sdfsdf'),
(7, '12/03/2013', 'testa1@gmail.com', 'this is a first test comments');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_highlighted_icon`
--

CREATE TABLE IF NOT EXISTS `tbl_highlighted_icon` (
  `tbl_highlighted_icon_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_highlighted_icon_userid` int(11) NOT NULL,
  `tbl_highlighted_icon_chid` int(11) NOT NULL,
  `tbl_highlighted_icon_bookid` int(11) NOT NULL,
  `tbl_highlighted_icon_chno` int(11) NOT NULL,
  `tbl_highlighted_icon_pageno` int(11) NOT NULL,
  `tbl_highlighted_icon_content` text NOT NULL,
  `tbl_highlighted_icon_date` datetime NOT NULL,
  PRIMARY KEY (`tbl_highlighted_icon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_icon`
--

CREATE TABLE IF NOT EXISTS `tbl_icon` (
  `tbl_icon_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_icon_userid` int(11) DEFAULT NULL,
  `tbl_icon_chid` int(11) NOT NULL,
  `tbl_icon_bookid` int(11) NOT NULL,
  `tbl_icon_chno` int(11) NOT NULL,
  `tbl_icon_pageno` int(11) NOT NULL,
  `tbl_icon_type` varchar(50) NOT NULL,
  `tbl_icon_no` int(5) DEFAULT NULL,
  `tbl_icon_top_position` decimal(10,2) NOT NULL,
  `tbl_icon_screen_width` int(6) DEFAULT NULL,
  `tbl_icon_screen_height` int(6) DEFAULT NULL,
  `tbl_icon_content_height` int(6) DEFAULT NULL,
  `tbl_icon_date` datetime NOT NULL,
  PRIMARY KEY (`tbl_icon_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE IF NOT EXISTS `tbl_page` (
  `tbl_page_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_page_chid` int(11) NOT NULL,
  `tbl_page_bookid` int(11) NOT NULL,
  `tbl_page_no` int(11) NOT NULL,
  `tbl_page_content` text NOT NULL,
  PRIMARY KEY (`tbl_page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`tbl_page_id`, `tbl_page_chid`, `tbl_page_bookid`, `tbl_page_no`, `tbl_page_content`) VALUES
(1, 1, 1, 1, '1This is a first page content.2This is a first page content.3This is a first page content.4This is a first page content.5This is a first page content.6This is a first page content.7This is a first page content.8This is a first page content.\r\n9This is a first page content.10This is a first page content.11This is a first page content.12This is a first page content.13This is a first page content.14This is a first page content.15This is a first page content.16This is a first page content.\r\n17This is a first page content.18This is a first page content.19This is a first page content.20This is a first page content.21This is a first page content.22This is a first page content.23This is a first page content.24This is a first page content.\r\n25This is a first page content.26This is a first page content.27This is a first page content.28This is a first page content.29This is a first page content.30This is a first page content.31This is a first page content.32This is a first page content.\r\n33This is a first page content.34This is a first page content.35This is a first page content.36This is a first page content.37This is a first page content.38This is a first page content.39This is a first page content.40This is a first page content.\r\n41This is a first page 42content.This is a first page 43content.This is a first page 44content.This is a first page 45content.This is a first page 46content.This is a first page 47content.This is a first page 48content.This is a first page content.\r\n49This is a first page content.50This is a first page content.51This is a first page content.52This is a first page content.53This is a first page content.54This is a first page content.55This is a first page content.56This is a first page content.\r\n57This is a first page content.58This is a first page content.59This is a first page content.60This is a first page content.61This is a first page content.62This is a first page content.63This is a first page content.64This is a first page content.'),
(2, 1, 1, 2, 'This is a second page content.This is a second page content.This is a second page content.This is a second page content.This is a second page content.This is a second page content.This is a second page content.'),
(3, 1, 1, 3, 'This is a Third page content.This is a Third page content.This is a Third page content.This is a Third page content.This is a Third page content.This is a Third page content.This is a Third page content.This is a Third page content.'),
(4, 2, 1, 4, 'Second chapter fourth page content.'),
(5, 2, 1, 5, 'Second chapter fifth page content.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `tbl_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_user_firstname` varchar(50) NOT NULL,
  `tbl_user_lastname` varchar(50) NOT NULL,
  `tbl_user_email` varchar(100) NOT NULL,
  `tbl_user_password` varchar(255) NOT NULL,
  `tbl_user_date` datetime NOT NULL,
  PRIMARY KEY (`tbl_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
