-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307

-- Generation Time: Jan 08, 2016 at 12:56 PM
-- Server version: 5.5.33
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `miclan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_attempts`
--

CREATE TABLE `admin_login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `attempt_date` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `is_failed` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=574 ;

--
-- Dumping data for table `admin_login_attempts`
--

INSERT INTO `admin_login_attempts` (`id`, `username`, `attempt_date`, `ip`, `is_failed`) VALUES
(561, 'Admin', '2016-01-07 17:54:59', '127.0.0.1', 1),
(562, 'Admin', '2016-01-07 17:55:00', '127.0.0.1', 1),
(563, 'Admin', '2016-01-07 17:55:28', '127.0.0.1', 1),
(564, 'Admin', '2016-01-07 17:57:09', '127.0.0.1', 0),
(565, 'Admin', '2016-01-07 17:57:34', '127.0.0.1', 1),
(566, 'Admin', '2016-01-07 17:57:51', '127.0.0.1', 0),
(567, 'danizd', '2016-01-08 09:50:11', '127.0.0.1', 1),
(568, 'danizd', '2016-01-08 09:51:28', '127.0.0.1', 1),
(569, 'danizd', '2016-01-08 09:51:59', '127.0.0.1', 1),
(570, 'danizd', '2016-01-08 09:52:42', '127.0.0.1', 1),
(571, 'danizd', '2016-01-08 09:53:48', '127.0.0.1', 1),
(572, 'danizd', '2016-01-08 09:54:18', '127.0.0.1', 1),
(573, 'Admin', '2016-01-08 09:54:49', '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_users_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `blocked` tinyint(4) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `domain` varchar(512) NOT NULL,
  `app_version` decimal(11,0) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_users_id`, `username`, `name`, `lastname`, `password_hash`, `blocked`, `role`, `domain`, `app_version`, `created`) VALUES
(1, 'Admin', 'Administrator', NULL, '$5$rounds=5000$p1o1h3b4g6s4fgfd$rMS2Eaoj6VyXW9XZEiV4ws55Gzbj4j4bMCMZT6Uf3y3', 0, 10, '', '0', '2015-06-17 22:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
