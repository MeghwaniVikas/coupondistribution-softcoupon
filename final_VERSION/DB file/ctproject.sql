-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2013 at 11:46 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `rollno` varchar(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`rollno`, `id`, `pass`, `amount`) VALUES
('205112011', 'NITT04448', 'PASS22041', 450);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `feed` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user`, `feed`, `time`) VALUES
(1, '110112008', 'Service is Excellent', '2013-08-23 08:05:23'),
(4, '205112011', 'Service is Good.grgerg', '2013-10-22 08:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE IF NOT EXISTS `registrations` (
  `rollno` varchar(9) NOT NULL,
  `name` text NOT NULL,
  `department` text NOT NULL,
  `class` text NOT NULL,
  `year` text NOT NULL,
  `email` text NOT NULL,
  `mess` text NOT NULL,
  `tshirt` text NOT NULL,
  `crname` text NOT NULL,
  `crcontact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`rollno`, `name`, `department`, `class`, `year`, `email`, `mess`, `tshirt`, `crname`, `crcontact`) VALUES
('user1', 'DKC', 'Architecture', 'MCA', 'second', 'hh@gmail.com', 'Mega Mess-1(FF)', 'm', 'shrikanth ', '9874451245'),
('205112011', 'vikas', 'Computer Applications', 'MCA', 'second', 'vikasmeghwani@ymail.com', 'Mega Mess-1(FF)', 'l', 'srghth', '7894561230'),
('205112011', 'vikas', 'Computer Applications', 'MCA', 'second', 'vikasmeghwani@ymail.com', 'Mega Mess-1(FF)', 'l', 'srghth', '7894561230');

-- --------------------------------------------------------

--
-- Table structure for table `stall`
--

CREATE TABLE IF NOT EXISTS `stall` (
  `name` varchar(30) NOT NULL,
  `stallamount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stall`
--

INSERT INTO `stall` (`name`, `stallamount`) VALUES
('sangeetas', 980);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `role`) VALUES
('205112011', '11749eb9160710bdaae4a2edc065283d51ddcea6', 1),
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 3),
('sangeetas', 'ec79fd84a1b297896abc0d90e39ff7d296d1b5d2', 2),
('user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
