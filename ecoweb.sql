-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-06-2014 a las 21:02:38
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ecoweb`
--
DROP DATABASE `ecoweb`;
CREATE DATABASE `ecoweb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
  `energiatotal` int(5) NOT NULL,
  `tiempototal` double NOT NULL,
  `equipoid` int(5) NOT NULL,
  PRIMARY KEY (`iddato`),
  KEY `equipoid` (`equipoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`iddato`, `fecha`, `hora`, `energiageneradadia`, `tiempogeneraciondiaria`, `energiatotal`, `tiempototal`, `equipoid`) VALUES
(50, '2003-06-14', '09:23:00', 0.3, '01:12:00', 5977, 2257.1, 9),
(51, '2002-02-14', '09:29:00', 1.4, '02:18:00', 5978, 2258.2, 9),
(52, '2002-02-14', '10:31:00', 4.3, '03:21:00', 5981, 2259.3, 9),
(53, '2002-02-14', '11:24:00', 6.8, '04:14:00', 5984, 2260.2, 9),
(54, '2002-02-14', '12:23:00', 10.9, '05:13:00', 5988, 2261.2, 9);

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
-- Volcado de datos para la tabla `distribuidor`
--

INSERT INTO `distribuidor` (`iddistribuidor`, `nombre`, `nick`, `password`, `direccion`, `telefono`, `empresa`, `zona`) VALUES
(1, 'Ricardo Sánchez', 'rik', '8c0c495a436a206fe36c7ec2fe094658', 'avenida tecali', '7561231', 'asiatech', 'PU'),
(2, 'Distribuidor 2', 'dist', '202cb962ac59075b964b07152d234b70', 'asdasd', '123123', 'sadsa', 'CM');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `tipo`, `numeroparte`, `serie`, `modelo`, `instalacionid`) VALUES
(9, 'Inversor', 123, 'asd12', 'asda', 131),
(10, 'Inversor', 21, '213', 'sad', 131);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=134 ;

--
-- Volcado de datos para la tabla `instalacion`
--

INSERT INTO `instalacion` (`idinstalacion`, `tiposistema`, `categoria`, `tipocompra`, `direccion`, `nombreinstalacion`, `codigoestado`, `distribuidorid`) VALUES
(131, 'PV0', 'Bifásico', 'Directa', 'asdas', 'ada', 'MC', 1),
(132, 'PV1', 'Bifásico', 'Arrendamiento', 'sadsa', 'sadas', 'NA', 1),
(133, 'PV0', 'Bifásico', 'Directa', '31 pte', 'ASIATECH CASA', 'PU', 1);

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
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`equipoid`) REFERENCES `equipo` (`idequipo`);

--
-- Filtros para la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD CONSTRAINT `distribuidor_ibfk_1` FOREIGN KEY (`zona`) REFERENCES `state` (`sCode`);

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`instalacionid`) REFERENCES `instalacion` (`idinstalacion`);

--
-- Filtros para la tabla `instalacion`
--
ALTER TABLE `instalacion`
  ADD CONSTRAINT `fk_instalacion_state1` FOREIGN KEY (`codigoestado`) REFERENCES `state` (`sCode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `instalacion_ibfk_1` FOREIGN KEY (`distribuidorid`) REFERENCES `distribuidor` (`iddistribuidor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
