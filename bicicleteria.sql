-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2020 a las 01:44:29
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bicicleteria`
--
CREATE DATABASE IF NOT EXISTS `bicicleteria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bicicleteria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bicicleta`
--

CREATE TABLE `bicicleta` (
  `id_bicicleta` int(11) NOT NULL,
  `marca` varchar(250) NOT NULL,
  `modelo` varchar(250) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `condicion` tinyint(1) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bicicleta`
--

INSERT INTO `bicicleta` (`id_bicicleta`, `marca`, `modelo`, `id_categoria`, `condicion`, `precio`) VALUES
(1, 'Trek', 'Slash 9.8 XT', 1, 1, 120000),
(2, 'Trek', 'Farley 9.6', 4, 1, 80000),
(4, 'gwrfgf', 'adfafa', 5, 1, 242),
(5, 'edfad', 'afaaf', 5, 1, 24642700),
(6, 'afadfda', 'afafafa', 5, 0, 246264),
(7, 'wewqw', 'wrr', 5, 1, 51351),
(8, 'qrfq', 'qqrq', 5, 1, 4684),
(9, 'prueba', 'afa', 1, 0, 120000),
(10, 'dcqvc', 'dfcsfas', 5, 1, 24234),
(11, 'cvbsfb', 'gwsgs', 5, 0, 120000),
(12, 'gwg', '46h4ryh', 5, 1, 120000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Mountain'),
(2, 'BMX'),
(3, 'Plegable'),
(4, 'Fat Bike'),
(5, 'Bicicleta de Ruta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `permiso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `email`, `contraseña`, `permiso`) VALUES
(1, 'Ignacio Miguez', 'miguezignacio01@gmail.com', '$2y$10$8OQhslCSMypZ/Zdz6qH/weA1OgYq3YjL4O2K1waC.i7Y7I1rnBhbe', 0),
(2, 'imiguez', 'imiguez@alumnos.exa.unicen.edu.ar', '$2y$10$tlJKRg8b5cetoUuo20KXW.1KSHqXL7V.atJrnnGsHTjQNvkFfR/sC', 1),
(3, 'Ignacio 333Miguez', 'zaseznano@gmail.com', '$2y$10$6aX688be2NQY8VBg5nUDEO1qTqZqOcFclN31rLY0cZtyI5E3Ri1RO', 0),
(4, 'fefe123', 'fefe@fefe.com', '$2y$10$4G207Q6Bkhf2Wnx.zca.7OTg/fPiTQrFLi1qu.vzX.dwkZhAoGad2', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bicicleta`
--
ALTER TABLE `bicicleta`
  ADD PRIMARY KEY (`id_bicicleta`),
  ADD KEY `id_estilo` (`id_categoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bicicleta`
--
ALTER TABLE `bicicleta`
  MODIFY `id_bicicleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bicicleta`
--
ALTER TABLE `bicicleta`
  ADD CONSTRAINT `bicicleta_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
