-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2020 a las 17:31:58
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
(4, 'GT Bikes', 'Conway Team Comp', 2, 1, 500),
(5, 'Giant', 'Roam E+', 7, 1, 2350),
(6, 'Giant', 'Explore E+', 7, 0, 1200),
(7, 'Specialized', 'Tarmac SL6', 5, 1, 1599),
(22, 'GT Bikes', 'Transeo Comp', 5, 0, 500),
(23, 'Cannondale', 'Synapse Carbon', 5, 1, 10000),
(24, 'Cannondale', 'Scalpel', 1, 0, 6000),
(25, 'Nilox', 'X0', 3, 1, 149);

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
(5, 'Road Bike'),
(7, 'Electrica');

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
(7, 'usuario', 'usuario@gmail.com', '$2y$10$LRjhcb9IxQ2NMu5H7D82gehFv35ki.TzqtpdH8HLBRgS1sfraPfkC', 0),
(8, 'admin', 'admin@gmail.com', '$2y$10$sDYS/BPF0ZLoYAn5QWu2e..PMPJ9422JNFKArUrAZx01PTKetMZ4O', 1);

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
  MODIFY `id_bicicleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
