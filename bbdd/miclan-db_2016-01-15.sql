-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307

-- Generation Time: Jan 15, 2016 at 12:52 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=594 ;

--
-- Dumping data for table `admin_login_attempts`
--

INSERT INTO `admin_login_attempts` (`id`, `username`, `attempt_date`, `ip`, `is_failed`) VALUES
(581, 'Admin', '2016-01-09 12:49:55', '127.0.0.1', 1),
(582, 'danizd', '2016-01-09 12:50:02', '127.0.0.1', 0),
(583, 'Admin', '2016-01-09 12:50:32', '127.0.0.1', 1),
(584, 'danizd', '2016-01-09 12:50:42', '127.0.0.1', 0),
(585, 'danizd', '2016-01-09 12:52:22', '127.0.0.1', 0),
(586, 'danizd', '2016-01-09 16:54:39', '127.0.0.1', 0),
(587, 'danizd', '2016-01-10 11:01:57', '127.0.0.1', 0),
(588, 'danizd', '2016-01-11 09:07:59', '127.0.0.1', 0),
(589, 'danizd', '2016-01-11 15:55:58', '127.0.0.1', 0),
(590, 'danizd', '2016-01-12 08:25:56', '127.0.0.1', 0),
(591, 'danizd', '2016-01-12 09:20:34', '127.0.0.1', 0),
(592, 'danizd', '2016-01-12 17:33:41', '127.0.0.1', 0),
(593, 'danizd', '2016-01-13 12:47:02', '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `blocked` tinyint(4) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `app_version` decimal(11,0) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`idUsuario`, `username`, `name`, `lastname`, `password_hash`, `blocked`, `role`, `photo`, `app_version`, `created`) VALUES
(1, 'danizd', 'Dani', NULL, '$5$rounds=5000$p1o1h3b4g6s4fgfd$rMS2Eaoj6VyXW9XZEiV4ws55Gzbj4j4bMCMZT6Uf3y3', 0, 10, 'dani-160x160.jpg', '0', '2015-06-17 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `idCita` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `allDay` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'false',
  `backgroundColor` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `borderColor` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idCita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dudas`
--

CREATE TABLE `dudas` (
  `idDuda` int(11) NOT NULL AUTO_INCREMENT,
  `duda` varchar(255) NOT NULL,
  `respuesta` text NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idDuda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `idHorario` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `allDay` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'false',
  `backgroundColor` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `borderColor` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `informes`
--

CREATE TABLE `informes` (
  `idInformes` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(255) NOT NULL,
  `sintomas` varchar(255) NOT NULL,
  `tratamiento` text NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `idNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `enlace` varchar(255) NOT NULL,
  `activada` tinyint(4) NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idNoticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `userID`, `titulo`, `descripcion`, `foto`, `enlace`, `activada`, `creada`) VALUES
(1, 1, 'Cuatro españoles por encima de la Mafia calabresa', 'La primera nota que Ferdinando Armani se encontró en el parabrisas de su coche parecía una broma de mal gusto. Un intrigante mensaje anónimo que le pedía al presidente del Sporting Locri.', 'analisis_clinico.jpg', 'http://www.elmundo.es/deportes/2016/01/08/56901ac2e2704e3f0c8b4587.html', 1, '2016-01-09 10:21:08'),
(18, 1, 'dfgdf', 'dsfg', '2016_01_11_09_47_12_000000_7131.jpg', 'tryerty', 1, '2016-01-11 09:47:12'),
(19, 1, 'dfgdf', 'dsfg', '2016_01_11_09_48_50_000000_5705.jpg', 'tryerty', 1, '2016-01-11 09:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `que_ver`
--

CREATE TABLE `que_ver` (
  `idQuever` int(11) NOT NULL DEFAULT '0',
  `pelicula` varchar(255) NOT NULL,
  `quienPide` varchar(255) NOT NULL,
  `notaFilmaffinity` int(11) NOT NULL,
  `razon` varchar(255) NOT NULL,
  `creada` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
