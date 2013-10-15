-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2013 at 10:18 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

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
('user1', 'NITT16124', 'PASS18821', 70),
('205112011', 'NITT26234', 'PASS32299', 450);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user`, `feed`, `time`) VALUES
(1, '110112008', 'Service is Excellent', '2013-08-23 08:05:23'),
(2, 'user1', 'Service is Good. Feeling relief.', '2013-10-12 16:52:58');

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
('205112011', 'vikas', 'archi', 'mca', 'second', 'vikas', 'mm1', 'l', 'sss', '7894561230'),
('user1', 'vikas meghwani', 'Computer Applications', 'MCA', 'second', 'vikasmeghwani@ymail.com', 'Mega Mess-1(GF)', 'l', 'shrikanth ', '9874451245'),
('205112011', 'vikas m', 'Computer Applications', 'MCA', 'second', 'vikasmeghwani@ymail.com', 'Mega Mess-1(FF)', 'l', 'shrikanth ', '9874451245');

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
('sangeetas', 580);

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
('sangeetas', 'ec79fd84a1b297896abc0d90e39ff7d296d1b5d2', 2),
('user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
