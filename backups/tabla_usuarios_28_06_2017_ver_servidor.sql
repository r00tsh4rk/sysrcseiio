-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-06-2017 a las 10:05:11
-- Versión del servidor: 5.1.73
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `syscseiio_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL COMMENT '3 = Administracion total 2 = Administracion de elementos de curso, taller e infromacion'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla que contiene los usuarios administrativos';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `nombre`, `nivel`) VALUES
(1, 'sysadmincseiio1', 'fadeca2512', 'JOSUE ALEJANDRO RUIZ CHIMAL', 3),
(2, 'ciidiruser1', 'ciidir201750', 'HÉCTOR AGUILAR HERRERA', 2),
(3, 'ciidiruser2', 'ciidir201751', 'MAGALI MARTÍNEZ CORTÉS', 2),
(4, 'ciidiruser3', 'ciidir201752', 'OLGA PATRICIA HERRERA ARENAS', 2),
(5, 'sysadmincseiio2', 'fadeca2512', 'ROMEO CANSINO LOPEZ', 3),
(6, 'sysadmincseiio3', 'fadeca2512', 'ANGEL HERNANDEZ CRUZ', 3),
(7, 'sysadmincseiio4', 'fadeca2512', 'JOSE LOPEZ VELASCO', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
