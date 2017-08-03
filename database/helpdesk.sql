-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2016 at 07:50 AM
-- Server version: 5.1.69
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `request_id` int(7) NOT NULL,
  `request_type` varchar(50) NOT NULL,
  `datefrom` datetime NOT NULL,
  `dateto` datetime NOT NULL,
  `description` varchar(500) NOT NULL,
  `if_canceled_reason` varchar(500) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `request_type`, `datefrom`, `dateto`, `description`, `if_canceled_reason`, `status`, `is_deleted`) VALUES
(2, 'Encoding', '2016-11-01 00:00:00', '2016-11-01 00:00:00', 'Test encode', '', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_type`
--

CREATE TABLE IF NOT EXISTS `request_type` (
  `request_type` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_type`
--

INSERT INTO `request_type` (`request_type`) VALUES
('Encoding'),
('PC troubleshoot (software)'),
('PC troubleshoot (hardware)'),
('UPS (power box) replace'),
('Utility Software'),
('System Software (desktop)'),
('System Software (web)'),
('Printing Assistance'),
('Meeting Room Assistance'),
('ID assistance (entry gate - door biometrics)'),
('Food Assistance (leaving office for area)'),
('Food Assistance (Overtime/Work Load)'),
('Photocopy/Scanning'),
('Documents (Finance)'),
('Documents (Marketing)'),
('Documents (Purchasing/Sales)'),
('Documents (HR)'),
('Documents (IT)');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(7) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `user_role` varchar(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `position` varchar(60) NOT NULL,
  `department` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `username`, `user_role`, `first_name`, `middle_name`, `last_name`, `position`, `department`, `phone`, `email`, `password`) VALUES
(1, 'admin', 'sa', 'Ron Gerard', 'Pili', 'Valero', 'Programmer/IT Staff', 'IT', '09232422006', 'rongerardvalero@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'user', 'su', 'Ron Gerard', 'Pili', 'Valero', 'Accountant 1', 'Finance', '09232422006', 'v.rongerard@yahoo.com', '12dea96fec20593566ab75692c9949596833adc9');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
