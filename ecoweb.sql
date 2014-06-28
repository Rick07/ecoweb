-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-06-2014 a las 14:51:32
-- Versión del servidor: 5.5.37-0+wheezy1
-- Versión de PHP: 5.4.4-14+deb7u11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ecoweb`
--
CREATE DATABASE IF NOT EXISTS `ecoweb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecoweb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

DROP TABLE IF EXISTS `datos`;
CREATE TABLE IF NOT EXISTS `datos` (
  `iddato` int(5) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `energiageneradadia` double NOT NULL,
  `tiempogeneraciondiaria` time NOT NULL,
  `energiatotal` double NOT NULL,
  `tiempototal` double NOT NULL,
  `equipoid` int(5) NOT NULL,
  PRIMARY KEY (`iddato`),
  KEY `equipoid` (`equipoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Truncar tablas antes de insertar `datos`
--

TRUNCATE TABLE `datos`;
--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`iddato`, `fecha`, `hora`, `energiageneradadia`, `tiempogeneraciondiaria`, `energiatotal`, `tiempototal`, `equipoid`) VALUES
(2, '2014-06-26', '08:35:00', 0.2, '00:35:00', 547, 367.3, 2),
(3, '2014-06-26', '09:30:00', 0.8, '01:30:00', 548, 368.2, 2),
(4, '2014-06-26', '10:45:00', 2.2, '02:45:00', 549, 369.6, 2),
(5, '2014-06-26', '11:33:00', 3.2, '03:33:00', 550, 370.3, 2),
(6, '2014-06-26', '12:27:00', 4.3, '04:27:00', 551, 371.2, 2),
(7, '2014-06-26', '13:32:00', 6.1, '05:32:00', 553, 372.3, 2),
(8, '2014-06-26', '14:43:00', 7.8, '06:43:00', 555, 373.5, 2),
(9, '2014-06-26', '15:36:00', 8.6, '07:36:00', 555, 374.4, 2),
(10, '2014-06-26', '16:33:00', 9.1, '08:33:00', 556, 375.3, 2),
(11, '2014-06-26', '17:28:00', 9.6, '09:28:00', 556, 376.2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor`
--

DROP TABLE IF EXISTS `distribuidor`;
CREATE TABLE IF NOT EXISTS `distribuidor` (
  `iddistribuidor` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `nick` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `empresa` varchar(20) NOT NULL,
  `zona` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`iddistribuidor`),
  KEY `zona` (`zona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncar tablas antes de insertar `distribuidor`
--

TRUNCATE TABLE `distribuidor`;
--
-- Volcado de datos para la tabla `distribuidor`
--

INSERT INTO `distribuidor` (`iddistribuidor`, `nombre`, `nick`, `password`, `direccion`, `telefono`, `empresa`, `zona`) VALUES
(1, 'Ricardo Sánchez', 'rik', '8c0c495a436a206fe36c7ec2fe094658', 'avenida tecali', '7561231', 'asiatech', 'PU'),
(2, 'Usuario de prueba', 'prueba', '202cb962ac59075b964b07152d234b70', '31 PTE', '77777', 'Ecoenergiza', 'PU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE IF NOT EXISTS `equipo` (
  `idequipo` int(5) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) NOT NULL,
  `numeroparte` int(20) DEFAULT NULL,
  `serie` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `instalacionid` int(4) NOT NULL,
  PRIMARY KEY (`idequipo`),
  KEY `instalacionid` (`instalacionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncar tablas antes de insertar `equipo`
--

TRUNCATE TABLE `equipo`;
--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `tipo`, `numeroparte`, `serie`, `modelo`, `instalacionid`) VALUES
(1, 'Inversor', 12345, '012345', 'Growatt 5000', 1),
(2, 'MicroInversor', 100028, '2586', 'jumex', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacion`
--

DROP TABLE IF EXISTS `instalacion`;
CREATE TABLE IF NOT EXISTS `instalacion` (
  `idinstalacion` int(4) NOT NULL AUTO_INCREMENT,
  `tiposistema` varchar(3) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `tipocompra` varchar(15) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `nombreinstalacion` varchar(30) NOT NULL,
  `codigoestado` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `distribuidorid` int(3) NOT NULL,
  PRIMARY KEY (`idinstalacion`,`codigoestado`),
  KEY `codigoestado` (`codigoestado`),
  KEY `distribuidorid` (`distribuidorid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Truncar tablas antes de insertar `instalacion`
--

TRUNCATE TABLE `instalacion`;
--
-- Volcado de datos para la tabla `instalacion`
--

INSERT INTO `instalacion` (`idinstalacion`, `tiposistema`, `categoria`, `tipocompra`, `direccion`, `nombreinstalacion`, `codigoestado`, `distribuidorid`) VALUES
(1, 'PV5', 'Bifásico', 'Directa', 'Priv Citlaltepetl 3105, Col. Volcanes.', 'Asiatech Casa', 'PU', 2),
(2, 'PV0', 'Bifásico', 'Directa', '2 oriente numero 56', 'fotovoltaico', 'DF', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `sName` varchar(32) COLLATE utf8_bin NOT NULL COMMENT 'State name with first letter capital',
  `sCode` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT 'Optional state abbreviation (US is 2 capital letters)',
  PRIMARY KEY (`sCode`),
  KEY `statecode` (`sCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='States by Country V0.1';

--
-- Truncar tablas antes de insertar `state`
--

TRUNCATE TABLE `state`;
--
-- Volcado de datos para la tabla `state`
--

INSERT INTO `state` (`sName`, `sCode`) VALUES
('Aguascalientes', 'AG'),
('Baja California', 'BN'),
('Baja California Sur', 'BS'),
('Coahuila', 'CA'),
('Chihuahua', 'CH'),
('Colima', 'CL'),
('Campeche', 'CM'),
('Chiapas', 'CP'),
('Distrito Federal', 'DF'),
('Durango', 'DU'),
('Guanajuato', 'GJ'),
('Guerrero', 'GR'),
('Hidalgo', 'HI'),
('Jalisco', 'JA'),
('Michoacan', 'MC'),
('Morelos', 'MR'),
('Mexico', 'MX'),
('Nayarit', 'NA'),
('Nuevo Leon', 'NL'),
('Oaxaca', 'OA'),
('Puebla', 'PU'),
('Queretaro', 'QE'),
('Quintana Roo', 'QR'),
('Sinaloa', 'SI'),
('San Luis Potosi', 'SL'),
('Sonora', 'SO'),
('Tabasco', 'TB'),
('Tlaxcala', 'TL'),
('Tamaulipas', 'TM'),
('Veracruz', 'VE'),
('Yucatan', 'YU'),
('Zacatecas', 'ZA');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`equipoid`) REFERENCES `equipo` (`idequipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD CONSTRAINT `distribuidor_ibfk_1` FOREIGN KEY (`zona`) REFERENCES `state` (`sCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`instalacionid`) REFERENCES `instalacion` (`idinstalacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `instalacion`
--
ALTER TABLE `instalacion`
  ADD CONSTRAINT `fk_instalacion_state1` FOREIGN KEY (`codigoestado`) REFERENCES `state` (`sCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instalacion_ibfk_1` FOREIGN KEY (`distribuidorid`) REFERENCES `distribuidor` (`iddistribuidor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
