-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 31-01-2016 a las 14:14:30
-- Versión del servidor: 5.5.47-cll
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `wcagfnzk_miclan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_login_attempts`
--

CREATE TABLE IF NOT EXISTS `admin_login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `attempt_date` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `is_failed` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=635 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
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
-- Volcado de datos para la tabla `admin_users`
--

INSERT INTO `admin_users` (`idUsuario`, `username`, `name`, `lastname`, `password_hash`, `blocked`, `role`, `photo`, `app_version`, `created`) VALUES
(1, 'danizd', 'Dani', NULL, '$5$rounds=5000$p1o1h3b4g6s4fgfd$rMS2Eaoj6VyXW9XZEiV4ws55Gzbj4j4bMCMZT6Uf3y3', 0, 10, 'dani-160x160.jpg', '1', '2015-06-17 22:00:00'),
(2, 'elena', 'Elena', 'Melio', '$5$rounds=5000$p1o1h3b4g6s4fgfd$JxJr4hbM2l40OIY0nvnAOg01bYS3EIgRbwzNPga0Q5D', 0, 10, 'elena-160x160.jpg', '1', '2016-01-15 15:39:13'),
(3, 'saloa', 'Saloa', 'Zas', '$5$rounds=5000$p1o1h3b4g6s4fgfd$JxJr4hbM2l40OIY0nvnAOg01bYS3EIgRbwzNPga0Q5D', 0, 10, 'saloa-160x160.jpg', '1', '2016-01-15 15:39:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE IF NOT EXISTS `citas` (
  `idCita` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `allDay` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'false',
  `backgroundColor` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `borderColor` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idCita`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idCita`, `title`, `start`, `end`, `description`, `allDay`, `backgroundColor`, `borderColor`) VALUES
(17, 'Cita de oftalmologia de Dani (10:00)', '2016-02-16 00:00:00', '2016-02-16 00:00:00', '', 'false', 'rgb(60, 141, 188)', 'rgb(60, 141, 188)'),
(19, 'Cita de Otorrino - Elena', '2016-11-28 00:00:00', '2016-11-28 00:00:00', '', 'false', 'rgb(60, 141, 188)', 'rgb(60, 141, 188)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dudas`
--

CREATE TABLE IF NOT EXISTS `dudas` (
  `idDuda` int(11) NOT NULL AUTO_INCREMENT,
  `duda` varchar(255) NOT NULL,
  `respuesta` text NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idDuda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `idHorario` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `allDay` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'false',
  `backgroundColor` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `borderColor` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`idHorario`, `title`, `start`, `end`, `description`, `allDay`, `backgroundColor`, `borderColor`) VALUES
(32, '18:00 a 22:30', '2016-01-13 00:00:00', '2016-01-13 00:00:00', '', 'false', 'rgb(221, 75, 57)', 'rgb(221, 75, 57)'),
(33, '18:30 a 23:00', '2016-01-14 00:00:00', '2016-01-14 00:00:00', '', 'false', 'rgb(221, 75, 57)', 'rgb(221, 75, 57)'),
(34, '21:00 a 1:00', '2016-01-15 00:00:00', '2016-01-15 00:00:00', '', 'false', 'rgb(0, 115, 183)', 'rgb(0, 115, 183)'),
(35, '18:00 a 2:00', '2016-01-16 00:00:00', '2016-01-16 00:00:00', '', 'false', 'rgb(0, 115, 183)', 'rgb(0, 115, 183)'),
(36, '21:00 a 1:00', '2016-01-17 00:00:00', '2016-01-17 00:00:00', '', 'false', 'rgb(0, 115, 183)', 'rgb(0, 115, 183)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE IF NOT EXISTS `informes` (
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
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`idInformes`, `userID`, `titulo`, `sintomas`, `tratamiento`, `tipo`, `fechaInicio`, `fechaFin`) VALUES
(1, 3, 'Crisis asmática originada por una infección de garganta', 'Dificultad para respirar', 'El miércoles tarde vamos a urgencias porque no da respirado bien.\nNos atienden al momento.\nLe dan Estilsona y le ponen una media hora de nebulización con Salbutamol.\nDespues de una hora nos manda para casa.\nTotal de tiempo en urgencias: unas dos horas\nAl día siguiente no va al colegio por prescripción médica.\nTratamiento en informe adjunto', 1, '2016-01-13', '2016-01-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `idNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `descripcion` blob NOT NULL,
  `enlace` varchar(255) NOT NULL,
  `activada` tinyint(4) NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idNoticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `userID`, `descripcion`, `enlace`, `activada`, `creada`) VALUES
(7, 1, 0x3c703e3c656d626564207372633d22687474703a2f2f6d656469612e7674656c65766973696f6e2e65732f64656661756c742f323031342f30322f32382f303033315f32365f3230333239392f566964656f2f766964656f5f3230333239392e6d70342220747970653d226170706c69636174696f6e2f782d73686f636b776176652d666c61736822207374796c653d226d61782d77696474683a2033303070783b223e3c623e4c616cc3ad6e2073652071756564612073696e2063696e653c2f623e3c62723e4465737075c3a9732064652031312061c3b16f732c206c617320747265732073616c6173206465206c6f732046696c6d617820506f6e7469c3b1617320656e204c616cc3ad6e2068616e2065636861646f20656c206369657272652e2048656d6f732065737461646f20636f6e20656c6c6f7320656e20737520c3ba6c74696d6f2064c3ad613c62723e3c2f703e, 'http://www.vtelevision.es/programas/laotravia/2014/02/28/0031_26_203299.htm', 1, '2016-01-26 10:59:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pendientes`
--

CREATE TABLE IF NOT EXISTS `pendientes` (
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
-- Volcado de datos para la tabla `pendientes`
--

INSERT INTO `pendientes` (`idPendientes`, `userID`, `titulo`, `descripcion`, `prioridad`, `activada`, `creada`) VALUES
(1, 1, 'Cambio en la potencia electrica para ahorrar en la factura de la luz', 'Comprobar si es viable un cambio en la potencia electrica para ahorrar en la factura de la luz', 2, 1, '2016-01-17 12:15:19'),
(7, 2, 'Cuentas', 'Pasar los gastos de los ultimos meses de 2015 para cerrar el año', 1, 1, '2016-01-19 09:02:45'),
(8, 1, 'Recuperar canales que faltan en la  TV de la habitación', 'Faltan la 1, la 2 y otros y habría que ordenarlos', 3, 1, '2016-01-19 09:03:58'),
(9, 3, 'Dormir toda la noche en tu cama', 'Noches enteras y sin necesidad de encender la luz ni despertar a nadie', 2, 1, '2016-01-19 09:05:02'),
(10, 2, 'Fotolibro y conseguir fotos creativas y de calidad', 'Avanzar en la realización del fotolibro. Esta  tarea implica conseguir fotos de calidad', 2, 1, '2016-01-19 09:07:08'),
(11, 2, 'Cursos AFD', 'Revisar casi cada día si salen los cursos AFD en la web <a href="http://traballo.xunta.es/afd">http://traballo.xunta.es/afd</a>', 1, 1, '2016-01-19 09:09:59'),
(12, 2, 'Quitar silla del coche de la puerta de casa', 'Darsela a su dueña o lo que haga falta. Quitarla de ahi', 1, 1, '2016-01-19 09:11:18'),
(13, 2, 'Darle portátil a Isa', 'Tienes que ver como user el nuevo sistema operativo para explicárselo', 2, 1, '2016-01-22 12:32:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quever`
--

CREATE TABLE IF NOT EXISTS `quever` (
  `idQuever` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `enlace` varchar(255) NOT NULL,
  `descargada` tinyint(4) NOT NULL,
  `vista` int(4) NOT NULL,
  `activada` int(4) NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idQuever`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `quever`
--

INSERT INTO `quever` (`idQuever`, `userID`, `titulo`, `descripcion`, `foto`, `enlace`, `descargada`, `vista`, `activada`, `creada`) VALUES
(2, 1, '', '<p><img src="http://pics.filmaffinity.com/Ex_Machina-368494509-main.jpg" style="max-width: 300px;"><b>Ex Machina  (2015)</b><br>Director: Alex Garland | Reparto: Domhnall Gleeson, Alicia Vikander, Oscar Isaac | Género: Ciencia ficción | Sinopsis: Un progr', '', 'https://www.filmaffinity.com/es/film132582.html', 1, 1, 1, '2016-01-30 12:22:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variables`
--

CREATE TABLE IF NOT EXISTS `variables` (
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
-- Volcado de datos para la tabla `variables`
--

INSERT INTO `variables` (`idVariables`, `name`, `value`, `route`, `is_numeric`, `can_be_empty`, `field_order`, `must_be_hidden`, `has_note`, `has_options`) VALUES
(1, 'tipoInforme', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'prioridadPendientes', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variables_options`
--

CREATE TABLE IF NOT EXISTS `variables_options` (
  `idVariables_options` int(11) NOT NULL AUTO_INCREMENT,
  `variables_ID` int(11) NOT NULL,
  `etiqueta` varchar(255) NOT NULL,
  `valor` varchar(50) DEFAULT NULL,
  `clase` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idVariables_options`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `variables_options`
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
