-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2021 a las 01:26:24
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `idVehiculo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `celda` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `idVehiculo`, `fecha`, `hora`, `celda`, `estado`) VALUES
(1, 3, '2021-08-28', '18:15:03', '1', 0),
(2, 5, '2021-08-28', '18:22:04', '2', 0),
(3, 7, '2021-08-28', '18:23:36', '3', 0),
(4, 1, '2021-08-28', '18:24:56', '3', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `id` int(11) NOT NULL,
  `idVehiculo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `celda` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`id`, `idVehiculo`, `fecha`, `hora`, `celda`, `estado`) VALUES
(1, 7, '2021-08-28', '18:24:31', '3', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `placa` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `modelo_cilindraje` int(11) NOT NULL,
  `puertas_tiempos` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `celda` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaRetiro` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `cedula`, `foto`, `placa`, `modelo_cilindraje`, `puertas_tiempos`, `tipo`, `celda`, `fechaRegistro`, `fechaRetiro`, `estado`) VALUES
(1, '1000328139', '1_a1609c1c940ea85b3d085d740e5f053b67fb1385.png', 'qwe123', 2021, 4, 1, '3', '2021-08-28 23:10:34', NULL, 0),
(2, '1000212345', '1_e90919fc68c311411f84f5c9e7e51105f71dfe0c.png', 'wpy087', 2022, 4, 1, NULL, '2021-08-28 23:11:04', NULL, 1),
(3, '10006542312', '1_6b0150fd3f78d0e3860b18334917bc0d1daea296.png', 'qas123', 2000, 4, 1, '1', '2021-08-28 23:15:00', NULL, 0),
(4, '1000452321', '1_3d6c94d06dc0df5a9c0b2ee406c9598503473b58.png', 'qwe34w', 660, 4, 2, NULL, '2021-08-28 23:21:10', NULL, 1),
(5, '1000328139', '1_4e840899c43d1dcb88a9860b3d2d84695e2362ec.png', 'rdf12g', 650, 4, 2, '2', '2021-08-28 23:22:01', NULL, 0),
(6, '1000328139', '1_1a7edd72680f568468ae1e45ab14da25cd1ce967.png', 'null', 0, 0, 3, NULL, '2021-08-28 23:23:17', NULL, 1),
(7, '10006542198', '1_df5e7f9132c492e02090f2937826fdfda3a4f996.png', 'null', 0, 0, 3, NULL, '2021-08-28 23:23:33', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
