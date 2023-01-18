-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2023 a las 15:46:00
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `masgps-telemetria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lpf`
--

CREATE TABLE `lpf` (
  `id` int(11) NOT NULL,
  `latitud` varchar(10) DEFAULT NULL,
  `longitud` varchar(10) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT NULL,
  `patente` varchar(8) DEFAULT NULL,
  `direccion_usuario` varchar(40) DEFAULT NULL,
  `id_tracker` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lpf`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_ralenti`
--

CREATE TABLE `reporte_ralenti` (
  `id_r` int(11) NOT NULL,
  `patente` varchar(8) DEFAULT NULL,
  `total_horas` varchar(5) DEFAULT NULL,
  `ralenti` varchar(5) DEFAULT NULL,
  `en_movimiento` varchar(5) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporte_ralenti`
--


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lpf`
--
ALTER TABLE `lpf`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_ralenti`
--
ALTER TABLE `reporte_ralenti`
  ADD PRIMARY KEY (`id_r`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lpf`
--
ALTER TABLE `lpf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `reporte_ralenti`
--
ALTER TABLE `reporte_ralenti`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
