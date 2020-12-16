-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2020 a las 00:04:53
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `unidades` int(2) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `tipo`, `unidades`, `precio`, `imagen`) VALUES
(1, 'Bandeja Especialidades', 'Bombones', 2, 19, 'https://www.lechocolat.es/wp-content/uploads/2020/04/IMG_20200421_124836-500x500.jpg'),
(2, 'Caja x9', 'Bombones', 4, 8.95, 'https://www.lechocolat.es/wp-content/uploads/2020/04/Caja-9-Bombones-8-500x500.jpg'),
(3, 'caja x30', 'Baldosas', 8, 14, 'https://www.lechocolat.es/wp-content/uploads/2020/04/lata-baldositas-athletic-taldea-30-500x500.jpg'),
(4, 'Caja x12', 'Baldosas', 16, 6.95, 'https://www.lechocolat.es/wp-content/uploads/2020/04/Lata-Pisadas-en-Bilbao-12-baldosas-6-500x500.jpg'),
(5, 'Naranjas con chocolate', 'Fruta', 32, 8.95, 'https://www.lechocolat.es/wp-content/uploads/2020/04/Lata-Naranjas-500x500.jpg'),
(6, 'Caja de Trufas', 'Trufa', 64, 28, 'https://www.lechocolat.es/wp-content/uploads/2020/04/Caja-22-trufas-28-_-500x500.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
