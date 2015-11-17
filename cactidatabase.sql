-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2015 at 09:42 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cactidatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `area` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `area` (`area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `area`) VALUES
(9, 'kiu'),
(6, 'kyambogo'),
(7, 'mubs'),
(3, 'muk'),
(5, 'ucu'),
(4, 'utamu');

-- --------------------------------------------------------

--
-- Table structure for table `occurrences`
--

CREATE TABLE IF NOT EXISTS `occurrences` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `location_id` int(4) NOT NULL,
  `supplier_id` int(4) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `occurrences`
--

INSERT INTO `occurrences` (`id`, `location_id`, `supplier_id`, `start`, `end`) VALUES
(1, 0, 0, '2015-09-05 00:00:00', '2015-09-02 00:00:00'),
(2, 0, 0, '2014-09-17 12:45:00', '2014-09-19 10:32:00'),
(3, 0, 0, '2015-08-09 13:23:00', '2015-08-09 17:20:00'),
(4, 0, 0, '2014-09-17 12:34:00', '2014-09-18 13:56:00'),
(5, 5, 6, '2015-09-05 00:00:00', '2015-09-02 00:00:00'),
(6, 3, 3, '2014-09-17 12:45:00', '2014-09-19 10:32:00'),
(7, 3, 5, '2015-08-09 13:23:00', '2015-08-09 17:20:00'),
(8, 4, 4, '2014-09-17 12:34:00', '2014-09-18 13:56:00'),
(9, 6, 3, '2015-09-12 12:13:00', '2015-09-12 13:42:00'),
(10, 6, 5, '2015-09-05 00:00:00', '2015-09-02 00:00:00'),
(11, 3, 3, '2014-09-17 12:45:00', '2014-09-19 10:32:00'),
(12, 5, 3, '2015-08-09 13:23:00', '2015-08-09 17:20:00'),
(13, 4, 4, '2014-09-17 12:34:00', '2014-09-18 13:56:00'),
(16, 6, 4, '2015-11-02 00:00:00', '2015-11-02 01:00:00'),
(17, 5, 3, '2015-11-02 02:00:00', '2015-11-02 02:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplier` (`supplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier`) VALUES
(3, 'googlelink'),
(5, 'orange'),
(4, 'softlink');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
