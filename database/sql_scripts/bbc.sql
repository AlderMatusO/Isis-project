-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-07-2018 a las 02:43:47
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbEstacionamiento`
--

CREATE TABLE `tbEstacionamiento` (
  `idEstacionamiento` int(11) NOT NULL,
  `idTipoPension` int(11) NOT NULL,
  `fechaPago` datetime NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `auto` varchar(50) NOT NULL,
  `mes` text NOT NULL,
  `autorizado` text NOT NULL,
  `total` text NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `eliminada` binary(1) NOT NULL DEFAULT '\0',
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `usrMod` int(11) NOT NULL,
  `fechaMod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbMarcas`
--

CREATE TABLE `tbMarcas` (
  `idMarca` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `usrMod` int(11) NOT NULL,
  `fechaMod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbMesas`
--

CREATE TABLE `tbMesas` (
  `idMesa` int(11) NOT NULL,
  `mesa` varchar(20) NOT NULL,
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `usrMod` int(11) NOT NULL,
  `fechaMod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbMesas`
--

INSERT INTO `tbMesas` (`idMesa`, `mesa`, `usrCreacion`, `fechaCreacion`, `usrMod`, `fechaMod`) VALUES
(1, 'a1', 1, '2018-03-09 12:40:02', 0, '0000-00-00 00:00:00'),
(2, 'a2', 1, '2018-03-09 12:41:25', 0, '0000-00-00 00:00:00'),
(3, 'a3', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(4, 'a4', 1, '2018-03-09 12:41:25', 0, '0000-00-00 00:00:00'),
(5, 'a5', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(6, 'b1', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(7, 'b2', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(8, 'b3', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(9, 'b4', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(10, 'b5', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(11, 'c1', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(12, 'c2', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(13, 'c3', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(14, 'c4', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(15, 'c5', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(16, 'd1', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(17, 'd2', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(18, 'd3', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(19, 'd4', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(20, 'd5', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(21, 'e1', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(22, 'e2', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(23, 'e3', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(24, 'e4', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00'),
(25, 'e5', 1, '2018-03-09 12:41:33', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbNota`
--

CREATE TABLE `tbNota` (
  `idNota` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idMesa` int(11) NOT NULL,
  `idPago` int(11) NOT NULL,
  `propina` float NOT NULL,
  `servicioDom` tinyint(1) NOT NULL,
  `idTipoNota` int(11) NOT NULL,
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `usrMod` int(11) NOT NULL,
  `fechaMod` datetime NOT NULL,
  `atendida` binary(1) NOT NULL DEFAULT '0',
  `subtotal` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbPago`
--

CREATE TABLE `tbPago` (
  `idPago` int(11) NOT NULL,
  `tipoPago` varchar(50) DEFAULT NULL,
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `usrMod` int(11) NOT NULL,
  `fechaMod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbPrecios`
--

CREATE TABLE `tbPrecios` (
  `idPrecio` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` text NOT NULL COMMENT 'Campo para tener la descripcion del precio agregado segun el producto',
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `usrMod` int(11) NOT NULL,
  `fechaMod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbProductos`
--

CREATE TABLE `tbProductos` (
  `idProducto` int(11) NOT NULL,
  `nomProducto` varchar(50) NOT NULL,
  `imagen` text NOT NULL,
  `idTipoProd` int(11) NOT NULL,
  `idPrecio` int(11) NOT NULL,
  `unidad` varchar(100) NOT NULL,
  `costo` double NOT NULL,
  `idMarca` int(11) NOT NULL,
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `usrMod` int(11) NOT NULL,
  `fechaMod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbRelNotaProd`
--

CREATE TABLE `tbRelNotaProd` (
  `idRelNotaProd` int(11) NOT NULL,
  `idNota` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iva` float NOT NULL,
  `subtotal` float NOT NULL,
  `total` float NOT NULL,
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `usrMod` int(11) NOT NULL,
  `fechaMod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbTipoNota`
--

CREATE TABLE `tbTipoNota` (
  `idTipoNota` int(11) NOT NULL,
  `tipoNota` varchar(100) NOT NULL,
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `usrMod` int(11) NOT NULL,
  `fechaMod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbTipoPension`
--

CREATE TABLE `tbTipoPension` (
  `idTipoPension` int(11) NOT NULL,
  `tipoPension` varchar(50) NOT NULL,
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `usrMod` int(11) NOT NULL,
  `fechaMod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbTipoProd`
--

CREATE TABLE `tbTipoProd` (
  `idTipoProd` int(11) NOT NULL,
  `tipoProd` varchar(100) NOT NULL,
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `usrMod` int(11) NOT NULL,
  `fechaMod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbTipoUsr`
--

CREATE TABLE `tbTipoUsr` (
  `idTipoUsr` int(11) NOT NULL,
  `tipousr` varchar(30) NOT NULL,
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usrMod` int(11) NOT NULL,
  `fechaMod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbTipoUsr`
--

INSERT INTO `tbTipoUsr` (`idTipoUsr`, `tipousr`, `usrCreacion`, `fechaCreacion`, `usrMod`, `fechaMod`) VALUES
(7, 'Administrador', 0, '2018-06-29 17:26:07', 0, '0000-00-00 00:00:00'),
(8, 'Administrador', 0, '2018-06-29 17:26:12', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbUsuarios`
--

CREATE TABLE `tbUsuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `refFamiliar` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `parentesco` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telReferencia` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idtipoUsr` int(11) NOT NULL,
  `contrasena` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `uid` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Salt` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usrCreacion` int(11) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usrMod` int(11) DEFAULT NULL,
  `fechaMod` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbUsuarios`
--

INSERT INTO `tbUsuarios` (`idUsuarios`, `nombre`, `direccion`, `telefono`, `refFamiliar`, `parentesco`, `telReferencia`, `usuario`, `idtipoUsr`, `contrasena`, `uid`, `Salt`, `correo`, `usrCreacion`, `fechaCreacion`, `usrMod`, `fechaMod`) VALUES
(3, 'ssanchez', NULL, '2211234556', NULL, NULL, NULL, 'ssanchez', 7, '12345', NULL, NULL, 'sanchez@hotmail.com', 1, '2018-06-29 17:37:54', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbEstacionamiento`
--
ALTER TABLE `tbEstacionamiento`
  ADD PRIMARY KEY (`idEstacionamiento`),
  ADD KEY `idTipoPension` (`idTipoPension`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `tbMarcas`
--
ALTER TABLE `tbMarcas`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `tbMesas`
--
ALTER TABLE `tbMesas`
  ADD PRIMARY KEY (`idMesa`);

--
-- Indices de la tabla `tbNota`
--
ALTER TABLE `tbNota`
  ADD PRIMARY KEY (`idNota`),
  ADD KEY `idTipoNota` (`idTipoNota`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idMesa` (`idMesa`),
  ADD KEY `idPago` (`idPago`);

--
-- Indices de la tabla `tbPago`
--
ALTER TABLE `tbPago`
  ADD PRIMARY KEY (`idPago`);

--
-- Indices de la tabla `tbPrecios`
--
ALTER TABLE `tbPrecios`
  ADD PRIMARY KEY (`idPrecio`);

--
-- Indices de la tabla `tbProductos`
--
ALTER TABLE `tbProductos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idTipoProd` (`idTipoProd`),
  ADD KEY `idMarca` (`idMarca`),
  ADD KEY `idPrecio` (`idPrecio`);

--
-- Indices de la tabla `tbRelNotaProd`
--
ALTER TABLE `tbRelNotaProd`
  ADD PRIMARY KEY (`idRelNotaProd`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idNota` (`idNota`);

--
-- Indices de la tabla `tbTipoNota`
--
ALTER TABLE `tbTipoNota`
  ADD PRIMARY KEY (`idTipoNota`);

--
-- Indices de la tabla `tbTipoPension`
--
ALTER TABLE `tbTipoPension`
  ADD PRIMARY KEY (`idTipoPension`);

--
-- Indices de la tabla `tbTipoProd`
--
ALTER TABLE `tbTipoProd`
  ADD PRIMARY KEY (`idTipoProd`);

--
-- Indices de la tabla `tbTipoUsr`
--
ALTER TABLE `tbTipoUsr`
  ADD PRIMARY KEY (`idTipoUsr`);

--
-- Indices de la tabla `tbUsuarios`
--
ALTER TABLE `tbUsuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `idtipoUsr` (`idtipoUsr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbEstacionamiento`
--
ALTER TABLE `tbEstacionamiento`
  MODIFY `idEstacionamiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbMarcas`
--
ALTER TABLE `tbMarcas`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbMesas`
--
ALTER TABLE `tbMesas`
  MODIFY `idMesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tbNota`
--
ALTER TABLE `tbNota`
  MODIFY `idNota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbPago`
--
ALTER TABLE `tbPago`
  MODIFY `idPago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbPrecios`
--
ALTER TABLE `tbPrecios`
  MODIFY `idPrecio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbProductos`
--
ALTER TABLE `tbProductos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbRelNotaProd`
--
ALTER TABLE `tbRelNotaProd`
  MODIFY `idRelNotaProd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbTipoNota`
--
ALTER TABLE `tbTipoNota`
  MODIFY `idTipoNota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbTipoPension`
--
ALTER TABLE `tbTipoPension`
  MODIFY `idTipoPension` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbTipoProd`
--
ALTER TABLE `tbTipoProd`
  MODIFY `idTipoProd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbTipoUsr`
--
ALTER TABLE `tbTipoUsr`
  MODIFY `idTipoUsr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbUsuarios`
--
ALTER TABLE `tbUsuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbUsuarios`
--
ALTER TABLE `tbUsuarios`
  ADD CONSTRAINT `idtipoUsr` FOREIGN KEY (`idtipoUsr`) REFERENCES `tbTipoUsr` (`idTipoUsr`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
