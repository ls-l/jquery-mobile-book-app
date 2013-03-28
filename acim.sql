-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2013 at 09:50 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_chapter`
--

INSERT INTO `tbl_chapter` (`tbl_ch_id`, `tbl_ch_bookid`, `tbl_ch_no`, `tbl_ch_name`, `tbl_ch_date`) VALUES
(1, 1, 1, 'The Meaning Of Miracles', '2013-03-23 16:27:50'),
(2, 1, 2, 'The Separation And The Atonement', '2013-03-23 16:27:53'),
(3, 2, 1, 'The Innocent Perception', '2013-03-23 16:27:55'),
(4, 3, 1, 'Heading and Wholeness', '2013-03-23 16:27:58'),
(5, 4, 1, 'The Lessons Of Love', '2013-03-23 16:28:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

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
  `tbl_icon_date` datetime NOT NULL,
  PRIMARY KEY (`tbl_icon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 1, 1, 1, 'This is a first page content.This is a first page content.This is a first page content.This is a first page content.This is a first page content.This is a first page content.This is a first page content.This is a first page content.'),
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
