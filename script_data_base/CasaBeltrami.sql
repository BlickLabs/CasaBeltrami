-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-04-2016 a las 23:46:07
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CasaBeltrami`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content`
--

CREATE DATABASE IF NOT EXISTS CasaBeltrami;
use CasaBeltrami;

CREATE TABLE IF NOT EXISTS `content` (
  `id_content` int(11) NOT NULL,
  `tittle` varchar(45) NOT NULL,
  `route` text,
  `url` varchar(45) DEFAULT NULL,
  `description` text,
  `status` boolean NOT NULL,
  `creation_date` date NOT NULL,
  `modification_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `content`
--

-- INSERT INTO `content` (`id_content`, `tittle`, `route`, `url`, `description`, `status`, `creation_date`, `modification_date`) VALUES
-- (1, 'algo', 'Captura de pantalla de 2016-01-04 00:24:08.png', NULL, ' algo', 'true', '2016-04-06', NULL),
-- (2, 'prueba', 'ubuntu005.jpg', NULL, ' prueba', 'true', '2016-04-06', NULL),
-- (3, 'prueba', 'front-image.jpg', NULL, ' prueba', 'true', '2016-04-06', NULL),
-- (4, 'casa beltrami', 'Captura de pantalla de 2015-10-16 19:44:31.png', NULL, ' casa beltrami', 'true', '2016-04-06', NULL),
-- (5, 'captura ', 'IDEADEV', NULL, ' casa beltrami', 'true', '2016-04-06', NULL),
-- (6, 'Fulanitos 6', 'front-image.jpg', NULL, 'LGO', 'true', '2016-04-06', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_decoration`
--

CREATE TABLE IF NOT EXISTS `content_decoration` (
  `id` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `id_decoration` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `content_event`
--

CREATE TABLE IF NOT EXISTS `content_event` (
  `id` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `content_event`
--

CREATE TABLE IF NOT EXISTS `content_sub_service` (
  `id` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `id_sub_service` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decorations`
--

CREATE TABLE IF NOT EXISTS `decorations` (
  `id_decoration` int(11) NOT NULL,
  `name_decoration` varchar(45) NOT NULL,
  `id_party` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `decorations`
--

INSERT INTO `decorations` (`id_decoration`, `name_decoration`, `id_party`) VALUES
(0, 'El salón', 0),
(1, 'Exteriores', 0),
(2, 'Cuarto de la novia', 0),
(3, 'Galería de evetos', 0),
(4, 'Baños', 0),
(5, 'Cocinas', 0),
(7, 'Extras', 0),
(8, 'El salón', 1),
(9, 'Exteriores', 1),
(10, 'Baños y cocina', 1),
(11, 'Galería de eventos', 1),
(12, 'El salón', 2),
(13, 'Juegos interiores', 2),
(14, 'Juegos exteriores', 2),
(15, 'Galería de eventos', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id_event` int(11) NOT NULL,
  `name_event` varchar(25) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id_event`, `name_event`) VALUES
(0, 'Bautizo'),
(1, 'Baby Shower'),
(2, 'Boda'),
(3, 'Comunión'),
(4, 'Iglesias'),
(5, 'Despedida de soltera'),
(6, 'Evento empresarial'),
(7, 'Fiesta infantil'),
(8, 'Fiesta privada'),
(9, 'Graduación'),
(10, 'XV años');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `party_room`
--

CREATE TABLE IF NOT EXISTS `party_room` (
  `id_party_room` int(11) NOT NULL,
  `party_room_name` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `party_room`
--

INSERT INTO `party_room` (`id_party_room`, `party_room_name`) VALUES
(0, 'L’incanto'),
(1, 'Farfala'),
(2, 'Bambinos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id_service` int(11) NOT NULL,
  `name_service` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id_service`, `name_service`) VALUES
(0, 'Diseño floral'),
(1, 'Mesas de postres y quesos'),
(2, 'Renta de mobiliario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_services`
--

CREATE TABLE IF NOT EXISTS `sub_services` (
  `id_sub_service` int(11) NOT NULL,
  `name_sub_service` varchar(20) NOT NULL,
  `id_service` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sub_services`
--

INSERT INTO `sub_services` (`id_sub_service`, `name_sub_service`, `id_service`) VALUES
(0, 'Centros de mesa', 0),
(1, 'Decoración floral', 0),
(2, 'Otros', 0),
(3, 'Mesas de postres', 1),
(4, 'Mesas de quesos', 1),
(5, 'Otros', 1),
(6, 'Mesas', 2),
(7, 'Sillas', 2),
(8, 'Mantelería', 2);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Users`
--

INSERT INTO `Users` (`id`, `nombre`, `user`, `password`) VALUES
(0, 'test', 'test@test.com', 'testtesttest');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_content`);

--
-- Indices de la tabla `content_decoration`
--
ALTER TABLE `content_decoration`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `content_event`
--
ALTER TABLE `content_event`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `content_sub_service`
--
ALTER TABLE `content_sub_service`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `decorations`
--
ALTER TABLE `decorations`
  ADD PRIMARY KEY (`id_decoration`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indices de la tabla `party_room`
--
ALTER TABLE `party_room`
  ADD PRIMARY KEY (`id_party_room`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`);

--
-- Indices de la tabla `sub_services`
--
ALTER TABLE `sub_services`
  ADD PRIMARY KEY (`id_sub_service`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
