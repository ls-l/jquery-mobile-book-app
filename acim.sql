-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2013 at 05:30 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_book`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_chapter`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_page`
--


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

--
-- Dumping data for table `tbl_user`
--

