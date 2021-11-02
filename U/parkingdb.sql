-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-11-2021 a las 03:30:37
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parkingdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID` int(10) NOT NULL,
  `tipo` varchar(120) DEFAULT NULL,
  `valor_tarifa` int(11) NOT NULL,
  `fechacreacion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID`, `tipo`, `valor_tarifa`, `fechacreacion`) VALUES
(1, 'Automovil', 99, '2021-10-30 16:03:50'),
(2, 'Moto', 50, '2021-10-30 16:05:09'),
(3, 'Bicicleta', 10, '2021-10-30 16:31:17'),
(4, 'Camioneta', 110, '2021-11-01 07:17:02'),
(6, 'tractocamion', 300, '2021-11-01 20:44:54'),
(7, 'camion', 200, '2021-11-02 01:50:37'),
(8, 'camioneta', 300, '2021-11-02 01:57:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ID` int(10) NOT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `Apellido` varchar(100) NOT NULL,
  `tipo_Documento` varchar(50) NOT NULL,
  `documento` varchar(30) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `correo` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `celular` bigint(10) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ID`, `nombre`, `Apellido`, `tipo_Documento`, `documento`, `Direccion`, `usuario`, `correo`, `password`, `celular`, `AdminRegdate`) VALUES
(11, 'Pedrito', 'Perez', 'cedula', '10231234567', 'calle falsa', 'pedrito', 'pedrito@gmail.com', '$2y$10$KODD2j/6otHo.E39jaWvqer0R8GgkGnDZhogqJknc8XS8wFBDanHi', 3201234567, '2021-11-01 20:42:19'),
(12, 'karol', 'perdomo', 'cedula', '10236657838', 'av68-cl20', 'karol', 'karol@gmail.com', '$2y$10$qOOrmL6K6YGB0IFjkaDzfODHKoV/WRWwoHf1MGLx.fcyXkV8xy8F.', 312556364677, '2021-11-02 01:28:13'),
(13, 'Alejandro', 'chacon', 'cedula', '1023547777', 'av ciudad de cali', 'alejandro', 'alejandro@gmail.com', '$2y$10$vms6YWFC0XcPyVO2/oAHp.csJ9vtuXYG9PD2AvtiHnrBGUKEth0Me', 312777848848, '2021-11-02 01:33:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `ID` int(10) NOT NULL,
  `Bahia` varchar(3) DEFAULT NULL,
  `Categoria` varchar(120) NOT NULL,
  `Marca` varchar(120) DEFAULT NULL,
  `Placa` varchar(120) DEFAULT NULL,
  `numero_identificacion` varchar(100) DEFAULT NULL,
  `Propietario` varchar(120) DEFAULT NULL,
  `Celular` bigint(10) DEFAULT NULL,
  `HoraEntrada` timestamp NULL DEFAULT current_timestamp(),
  `HoraSalida` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Valor` varchar(120) DEFAULT NULL,
  `Observacion` mediumtext DEFAULT NULL,
  `Estado` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`ID`, `Bahia`, `Categoria`, `Marca`, `Placa`, `numero_identificacion`, `Propietario`, `Celular`, `HoraEntrada`, `HoraSalida`, `Valor`, `Observacion`, `Estado`) VALUES
(15, '7', 'Moto', 'kawasaki', 'NRN27D', '10231111', 'Edwin', 320111, '2021-11-02 00:15:20', '2021-11-02 02:26:34', '0', 'ok', 'exit'),
(16, '1', 'Moto', 'yamaha', 'stv28b', '1049633765', 'segundo fidel', 321653467, '2021-11-02 02:02:39', '2021-11-02 02:26:00', NULL, NULL, 'Out'),
(17, '2', 'Moto', 'Akt', 'abe23k', '1023915658', 'fidel segundo', 3126566666, '2021-11-02 02:16:39', '2021-11-02 02:26:06', NULL, NULL, 'Out'),
(18, '9', 'Automovil', 'sandero', 'hty234', '1023915658', 'fidel segundo', 3126566666, '2021-11-02 02:19:04', NULL, NULL, NULL, 'Out');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
