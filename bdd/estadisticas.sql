-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2023 a las 04:03:31
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

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
-- Estructura de tabla para la tabla `reporte_ralenti`
--

CREATE TABLE `reporte_ralenti` (
  `id_r` int(11) NOT NULL,
  `patente` varchar(8) DEFAULT NULL,
  `total_horas` varchar(5) DEFAULT NULL,
  `ralenti` varchar(5) DEFAULT NULL,
  `en_movimiento` varchar(5) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reporte_ralenti`
--

INSERT INTO `reporte_ralenti` (`id_r`, `patente`, `total_horas`, `ralenti`, `en_movimiento`, `fecha`) VALUES
(61, 'LGJW-28 ', '05:33', '00:37', '04:55', NULL),
(62, 'LGJW-26 ', '09:36', '02:59', '06:37', NULL),
(63, 'LGJW-24 ', '09:45', '02:21', '07:23', NULL),
(64, 'LGJW-17 ', '10:05', '02:10', '07:54', NULL),
(65, 'LGJW-25 ', '08:34', '01:41', '06:53', NULL),
(66, 'LGJW-23 ', '10:38', '00:36', '10:02', NULL),
(67, 'LGJW-22 ', '10:11', '01:37', '08:34', NULL),
(68, 'LGJW-15 ', '07:51', '01:45', '06:06', NULL),
(69, 'LGJW-21 ', '07:57', '00:51', '07:05', NULL),
(70, 'LGJW-16 ', '10:06', '01:21', '08:45', NULL),
(71, 'LGJW-28 ', '05:33', '00:37', '04:55', NULL),
(72, 'LGJW-26 ', '09:36', '02:59', '06:37', NULL),
(73, 'LGJW-24 ', '09:45', '02:21', '07:23', NULL),
(74, 'LGJW-17 ', '10:05', '02:10', '07:54', NULL),
(75, 'LGJW-25 ', '08:34', '01:41', '06:53', NULL),
(76, 'LGJW-23 ', '10:38', '00:36', '10:02', NULL),
(77, 'LGJW-22 ', '10:11', '01:37', '08:34', NULL),
(78, 'LGJW-15 ', '07:51', '01:45', '06:06', NULL),
(79, 'LGJW-21 ', '07:57', '00:51', '07:05', NULL),
(80, 'LGJW-16 ', '10:06', '01:21', '08:45', NULL),
(81, 'LGJW-28 ', '05:33', '00:37', '04:55', NULL),
(82, 'LGJW-26 ', '09:36', '02:59', '06:37', NULL),
(83, 'LGJW-24 ', '09:45', '02:21', '07:23', NULL),
(84, 'LGJW-17 ', '10:05', '02:10', '07:54', NULL),
(85, 'LGJW-25 ', '08:34', '01:41', '06:53', NULL),
(86, 'LGJW-23 ', '10:38', '00:36', '10:02', NULL),
(87, 'LGJW-22 ', '10:11', '01:37', '08:34', NULL),
(88, 'LGJW-15 ', '07:51', '01:45', '06:06', NULL),
(89, 'LGJW-21 ', '07:57', '00:51', '07:05', NULL),
(90, 'LGJW-16 ', '10:06', '01:21', '08:45', NULL),
(91, 'LGJW-28 ', '05:33', '00:37', '04:55', NULL),
(92, 'LGJW-26 ', '09:36', '02:59', '06:37', NULL),
(93, 'LGJW-24 ', '09:45', '02:21', '07:23', NULL),
(94, 'LGJW-17 ', '10:05', '02:10', '07:54', NULL),
(95, 'LGJW-25 ', '08:34', '01:41', '06:53', NULL),
(96, 'LGJW-23 ', '10:38', '00:36', '10:02', NULL),
(97, 'LGJW-22 ', '10:11', '01:37', '08:34', NULL),
(98, 'LGJW-15 ', '07:51', '01:45', '06:06', NULL),
(99, 'LGJW-21 ', '07:57', '00:51', '07:05', NULL),
(100, 'LGJW-16 ', '10:06', '01:21', '08:45', NULL),
(101, 'LGJW-28 ', '05:33', '00:37', '04:55', NULL),
(102, 'LGJW-26 ', '09:36', '02:59', '06:37', NULL),
(103, 'LGJW-24 ', '09:45', '02:21', '07:23', NULL),
(104, 'LGJW-17 ', '10:05', '02:10', '07:54', NULL),
(105, 'LGJW-25 ', '08:34', '01:41', '06:53', NULL),
(106, 'LGJW-23 ', '10:38', '00:36', '10:02', NULL),
(107, 'LGJW-22 ', '10:11', '01:37', '08:34', NULL),
(108, 'LGJW-15 ', '07:51', '01:45', '06:06', NULL),
(109, 'LGJW-21 ', '07:57', '00:51', '07:05', NULL),
(110, 'LGJW-16 ', '10:06', '01:21', '08:45', NULL),
(111, 'LGJW-28 ', '05:33', '00:37', '04:55', NULL),
(112, 'LGJW-26 ', '09:36', '02:59', '06:37', NULL),
(113, 'LGJW-24 ', '09:45', '02:21', '07:23', NULL),
(114, 'LGJW-17 ', '10:05', '02:10', '07:54', NULL),
(115, 'LGJW-25 ', '08:34', '01:41', '06:53', NULL),
(116, 'LGJW-23 ', '10:38', '00:36', '10:02', NULL),
(117, 'LGJW-22 ', '10:11', '01:37', '08:34', NULL),
(118, 'LGJW-15 ', '07:51', '01:45', '06:06', NULL),
(119, 'LGJW-21 ', '07:57', '00:51', '07:05', NULL),
(120, 'LGJW-16 ', '10:06', '01:21', '08:45', NULL),
(121, 'LGJW-28 ', '05:33', '00:37', '04:55', NULL),
(122, 'LGJW-26 ', '09:36', '02:59', '06:37', NULL),
(123, 'LGJW-24 ', '09:45', '02:21', '07:23', NULL),
(124, 'LGJW-17 ', '10:05', '02:10', '07:54', NULL),
(125, 'LGJW-25 ', '08:34', '01:41', '06:53', NULL),
(126, 'LGJW-23 ', '10:38', '00:36', '10:02', NULL),
(127, 'LGJW-22 ', '10:11', '01:37', '08:34', NULL),
(128, 'LGJW-15 ', '07:51', '01:45', '06:06', NULL),
(129, 'LGJW-21 ', '07:57', '00:51', '07:05', NULL),
(130, 'LGJW-16 ', '10:06', '01:21', '08:45', NULL),
(131, 'LGJW-28 ', '05:33', '00:37', '04:55', NULL),
(132, 'LGJW-26 ', '09:36', '02:59', '06:37', NULL),
(133, 'LGJW-24 ', '09:45', '02:21', '07:23', NULL),
(134, 'LGJW-17 ', '10:05', '02:10', '07:54', NULL),
(135, 'LGJW-25 ', '08:34', '01:41', '06:53', NULL),
(136, 'LGJW-23 ', '10:38', '00:36', '10:02', NULL),
(137, 'LGJW-22 ', '10:11', '01:37', '08:34', NULL),
(138, 'LGJW-15 ', '07:51', '01:45', '06:06', NULL),
(139, 'LGJW-21 ', '07:57', '00:51', '07:05', NULL),
(140, 'LGJW-16 ', '10:06', '01:21', '08:45', NULL),
(141, 'LGJW-28 ', '05:33', '00:37', '04:55', NULL),
(142, 'LGJW-26 ', '09:36', '02:59', '06:37', NULL),
(143, 'LGJW-24 ', '09:45', '02:21', '07:23', NULL),
(144, 'LGJW-17 ', '10:05', '02:10', '07:54', NULL),
(145, 'LGJW-25 ', '08:34', '01:41', '06:53', NULL),
(146, 'LGJW-23 ', '10:38', '00:36', '10:02', NULL),
(147, 'LGJW-22 ', '10:11', '01:37', '08:34', NULL),
(148, 'LGJW-15 ', '07:51', '01:45', '06:06', NULL),
(149, 'LGJW-21 ', '07:57', '00:51', '07:05', NULL),
(150, 'LGJW-16 ', '10:06', '01:21', '08:45', NULL),
(151, 'LGJW-28 ', '05:33', '00:37', '04:55', NULL),
(152, 'LGJW-26 ', '09:36', '02:59', '06:37', NULL),
(153, 'LGJW-24 ', '09:45', '02:21', '07:23', NULL),
(154, 'LGJW-17 ', '10:05', '02:10', '07:54', NULL),
(155, 'LGJW-25 ', '08:34', '01:41', '06:53', NULL),
(156, 'LGJW-23 ', '10:38', '00:36', '10:02', NULL),
(157, 'LGJW-22 ', '10:11', '01:37', '08:34', NULL),
(158, 'LGJW-15 ', '07:51', '01:45', '06:06', NULL),
(159, 'LGJW-21 ', '07:57', '00:51', '07:05', NULL),
(160, 'LGJW-16 ', '10:06', '01:21', '08:45', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reporte_ralenti`
--
ALTER TABLE `reporte_ralenti`
  ADD PRIMARY KEY (`id_r`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reporte_ralenti`
--
ALTER TABLE `reporte_ralenti`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
