-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307

-- Generation Time: Jan 22, 2016 at 12:33 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=602 ;

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
(593, 'danizd', '2016-01-13 12:47:02', '127.0.0.1', 0),
(594, 'danizd', '2016-01-15 15:03:12', '127.0.0.1', 0),
(595, 'danizd', '2016-01-16 06:26:56', '127.0.0.1', 0),
(596, 'danizd', '2016-01-16 20:55:58', '127.0.0.1', 0),
(597, 'danizd', '2016-01-17 10:39:15', '127.0.0.1', 0),
(598, 'danizd', '2016-01-17 19:01:41', '127.0.0.1', 0),
(599, 'danizd', '2016-01-19 09:01:16', '127.0.0.1', 0),
(600, 'danizd', '2016-01-19 09:36:50', '127.0.0.1', 0),
(601, 'danizd', '2016-01-20 08:08:01', '127.0.0.1', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`idUsuario`, `username`, `name`, `lastname`, `password_hash`, `blocked`, `role`, `photo`, `app_version`, `created`) VALUES
(1, 'danizd', 'Dani', NULL, '$5$rounds=5000$p1o1h3b4g6s4fgfd$rMS2Eaoj6VyXW9XZEiV4ws55Gzbj4j4bMCMZT6Uf3y3', 0, 10, 'dani-160x160.jpg', '1', '2015-06-17 22:00:00'),
(2, 'elena', 'Elena', 'Melio', '$5$rounds=5000$p1o1h3b4g6s4fgfd$rMS2Eaoj6VyXW9XZEiV4ws55Gzbj4j4bMCMZT6Uf3y3', 0, 10, '', '1', '2016-01-15 15:39:13'),
(3, 'saloa', 'Saloa', 'Zas', '$5$rounds=5000$p1o1h3b4g6s4fgfd$rMS2Eaoj6VyXW9XZEiV4ws55Gzbj4j4bMCMZT6Uf3y3', 0, 10, '', '1', '2016-01-15 15:39:13');

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
  `idHorario` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `allDay` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'false',
  `backgroundColor` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `borderColor` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`idHorario`, `title`, `start`, `end`, `description`, `allDay`, `backgroundColor`, `borderColor`) VALUES
(32, '18:00 a 22:30', '2016-01-13 00:00:00', '2016-01-13 00:00:00', '', 'false', 'rgb(221, 75, 57)', 'rgb(221, 75, 57)'),
(33, '18:30 a 23:00', '2016-01-14 00:00:00', '2016-01-14 00:00:00', '', 'false', 'rgb(221, 75, 57)', 'rgb(221, 75, 57)'),
(34, '21:00 a 1:00', '2016-01-15 00:00:00', '2016-01-15 00:00:00', '', 'false', 'rgb(0, 115, 183)', 'rgb(0, 115, 183)'),
(35, '18:00 a 2:00', '2016-01-16 00:00:00', '2016-01-16 00:00:00', '', 'false', 'rgb(0, 115, 183)', 'rgb(0, 115, 183)'),
(36, '21:00 a 1:00', '2016-01-17 00:00:00', '2016-01-17 00:00:00', '', 'false', 'rgb(0, 115, 183)', 'rgb(0, 115, 183)');

-- --------------------------------------------------------

--
-- Table structure for table `informes`
--

CREATE TABLE `informes` (
  `idInformes` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `sintomas` varchar(255) NOT NULL,
  `tratamiento` text NOT NULL,
  `tipo` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  PRIMARY KEY (`idInformes`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `informes`
--

INSERT INTO `informes` (`idInformes`, `userID`, `titulo`, `sintomas`, `tratamiento`, `tipo`, `fechaInicio`, `fechaFin`) VALUES
(1, 3, 'Crisis asmática originada por una infección de garganta', 'Dificultad para respirar', 'El miércoles tarde vamos a urgencias porque no da respirado bien.\nNos atienden al momento.\nLe dan Estilsona y le ponen una media hora de nebulización con Salbutamol.\nDespues de una hora nos manda para casa.\nTotal de tiempo en urgencias: unas dos horas\nAl día siguiente no va al colegio por prescripción médica.\nTratamiento en informe adjunto', 1, '2016-01-13', '2016-01-15'),
(11, 1, 'bbbbbbbbb', 'bbbbbbbbbbb', '<p>sfsfsd</p>', 3, '2016-01-13', '2016-01-13'),
(12, 3, 'El muro de Saloa', 'asdasdasdasd', '<p>fsfsdfs</p>', 2, '2016-01-11', '2016-01-11'),
(25, 2, 'aaaaaaaaaaa', 'ccccccccccc', '<p>vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv</p>', 4, '2016-01-13', '2016-01-13');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `userID`, `titulo`, `descripcion`, `foto`, `enlace`, `activada`, `creada`) VALUES
(1, 1, 'Cuatro españoles por encima de la Mafia calabresa', 'La primera nota que Ferdinando Armani se encontró en el parabrisas de su coche parecía una broma de mal gusto. Un intrigante mensaje anónimo que le pedía al presidente del Sporting Locri.', 'analisis_clinico.jpg', 'http://www.elmundo.es/deportes/2016/01/08/56901ac2e2704e3f0c8b4587.html', 1, '2016-01-09 10:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `pendientes`
--

CREATE TABLE `pendientes` (
  `idPendientes` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `prioridad` tinyint(4) NOT NULL,
  `activada` tinyint(4) NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPendientes`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `pendientes`
--

INSERT INTO `pendientes` (`idPendientes`, `userID`, `titulo`, `descripcion`, `prioridad`, `activada`, `creada`) VALUES
(1, 1, 'Cambio en la potencia electrica para ahorrar en la factura de la luz', 'Comprobar si es viable un cambio en la potencia electrica para ahorrar en la factura de la luz', 2, 1, '2016-01-17 12:15:19'),
(7, 2, 'Cuentas', 'Pasar los gastos de los ultimos meses de 2015 para cerrar el año', 1, 0, '2016-01-19 09:02:45'),
(8, 1, 'Recuperar canales que faltan en la  TV de la habitación', 'Faltan la 1, la 2 y otros y habría que ordenarlos', 3, 0, '2016-01-19 09:03:58'),
(9, 3, 'Dormir toda la noche en tu cama', 'Noches enteras y sin necesidad de encender la luz ni despertar a nadie', 2, 0, '2016-01-19 09:05:02'),
(10, 2, 'Fotolibro y conseguir fotos creativas y de calidad', 'Avanzar en la realización del fotolibro. Esta  tarea implica conseguir fotos de calidad', 2, 0, '2016-01-19 09:07:08'),
(11, 2, 'Cursos AFD', 'Revisar casi cada día si salen los cursos AFD en la web <a href="http://traballo.xunta.es/afd">http://traballo.xunta.es/afd</a>', 1, 0, '2016-01-19 09:09:59'),
(12, 2, 'Quitar silla del coche de la puerta de casa', 'Darsela a su dueña o lo que haga falta. Quitarla de ahi', 1, 0, '2016-01-19 09:11:18'),
(13, 2, 'Darle portátil a Isa', 'Tienes que ver como user el nuevo sistema operativo para explicárselo', 2, 1, '2016-01-22 12:32:51');

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

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE `variables` (
  `idVariables` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text,
  `route` varchar(255) DEFAULT NULL,
  `is_numeric` tinyint(4) DEFAULT NULL,
  `can_be_empty` tinyint(4) DEFAULT NULL,
  `field_order` int(11) DEFAULT NULL,
  `must_be_hidden` tinyint(4) DEFAULT NULL,
  `has_note` tinyint(4) DEFAULT NULL,
  `has_options` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idVariables`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`idVariables`, `name`, `value`, `route`, `is_numeric`, `can_be_empty`, `field_order`, `must_be_hidden`, `has_note`, `has_options`) VALUES
(1, 'tipoInforme', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'prioridadPendientes', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_options`
--

CREATE TABLE `variables_options` (
  `idVariables_options` int(11) NOT NULL AUTO_INCREMENT,
  `variables_ID` int(11) NOT NULL,
  `etiqueta` varchar(255) NOT NULL,
  `valor` varchar(50) DEFAULT NULL,
  `clase` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idVariables_options`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `variables_options`
--

INSERT INTO `variables_options` (`idVariables_options`, `variables_ID`, `etiqueta`, `valor`, `clase`) VALUES
(1, 1, 'Crisis asmática', '1', 'info'),
(2, 1, 'Urgencias', '2', 'danger'),
(3, 1, 'Consulta cabecera', '3', 'warning'),
(4, 1, 'Otros', '4', 'success'),
(5, 2, 'Alta', '1', 'danger'),
(6, 2, 'Media', '2', 'warning'),
(7, 2, 'Baja', '3', 'success');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
