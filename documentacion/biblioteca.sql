-- phpMyAdmin SQL Dump  
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generaciÃ³n: 09-10-2011 a las 10:55:13
-- VersiÃ³n del servidor: 5.1.54
-- VersiÃ³n de PHP: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


CREATE DATABASE biblioteca;
USE biblioteca;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaestadisticas`
--

CREATE TABLE IF NOT EXISTS `tablaestadisticas` (
  `co_lector` int(8) unsigned NOT NULL,
  `registro` int(8) unsigned NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  KEY `registro` (`registro`),
  KEY `co_lector` (`co_lector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `tablaestadisticas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablalectores`
--

CREATE TABLE IF NOT EXISTS `tablalectores` (
  `co_lector` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_postal` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `localidad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`co_lector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla de lectores' AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tablalectores`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablalibros`
--

CREATE TABLE IF NOT EXISTS `tablalibros` (
  `registro` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `autor` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `editorial` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `CDU` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `localizacion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `estanteria` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `balda` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`registro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla libros' AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tablalibros`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaprestamos`
--

CREATE TABLE IF NOT EXISTS `tablaprestamos` (
  `co_lector` int(10) unsigned NOT NULL,
  `registro` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  UNIQUE `registro` (`registro`),
  KEY `co_lector` (`co_lector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `tablaprestamos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user`, `password`) VALUES
('usuario', 'clave');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `varios`
--

CREATE TABLE IF NOT EXISTS `varios` (
  `duracion_prestamo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `varios`
--

INSERT INTO `varios` (`duracion_prestamo`) VALUES
(20);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `tablaestadisticas`
--
ALTER TABLE `tablaestadisticas`
  ADD CONSTRAINT `tablaestadisticas_ibfk_1` FOREIGN KEY (`co_lector`) REFERENCES `tablalectores` (`co_lector`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tablaestadisticas_ibfk_2` FOREIGN KEY (`registro`) REFERENCES `tablalibros` (`registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tablaprestamos`
--
ALTER TABLE `tablaprestamos`
  ADD CONSTRAINT `tablaprestamos_ibfk_2` FOREIGN KEY (`registro`) REFERENCES `tablalibros` (`registro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tablaprestamos_ibfk_1` FOREIGN KEY (`co_lector`) REFERENCES `tablalectores` (`co_lector`) ON DELETE NO ACTION ON UPDATE NO ACTION;