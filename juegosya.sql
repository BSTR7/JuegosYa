-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2023 a las 09:25:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juegosya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` int(11) NOT NULL,
  `fechapedido` date NOT NULL,
  `idcliente` int(11) NOT NULL,
  `articulos` varchar(250) NOT NULL,
  `total` int(11) NOT NULL,
  `estadopedido` int(11) NOT NULL,
  `metodopago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `stock` int(11) NOT NULL,
  `plataforma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre`, `descripcion`, `precio`, `imagen`, `stock`, `plataforma`) VALUES
(2, 'Mortal Kombat 11', 'La historia se centra en la travesía de Liu Kang para salvar al mundo del malvado hechicero Shang Tsung, travesía que acaba con su enfrentamiento en el torneo llamado Mortal Kombat. Mortal Kombat se convirtió en un éxito de ventas y sigue siendo uno ', 10000, 'imagenproducto/649d10fead277_mortalk.jpeg', 6, 1),
(5, ' Cyberpunk 2077', 'Compra Cyberpunk 2077 key y sumérgete en un mundo abierto donde serás capaz de explorar Night City: una enorme, distópica metrópolis, donde todos están obsesionados con tecnología sci-fi y modificación corporales. Esta experiencia RPG', 8000, 'imagenproducto/649d21bb688cd_cyberpk.jpeg', 8, 3),
(6, 'Resident Evil 6', 'Resident Evil 6 es un juego FPS de acción cooperativa desarrollado por Capcom. Es una historia de terror dramática y emocionante para experimentar. ¡Participa en cuatro narraciones de historias distintas pero entrelazadas, cada una con protagonistas ', 9000, 'imagenproducto/649d22ac8c16b_resident.jpeg', 9, 3),
(7, 'Marvels SpiderMan Remastered', 'Sumérgete en la caótica vida de SpiderMan con la nueva y mejorada versión del título original aclamado por la crítica ¡Marvels SpiderMan Remasterizado! Insomniac Games y Sony Interactive Entertainment se han unido para rediseñar', 30000, 'imagenproducto/649d23da238b4_Spider.jpeg', 8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `passwrd` varchar(50) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `Correo` varchar(250) NOT NULL,
  `tipodecuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `Usuario`, `passwrd`, `Nombre`, `Correo`, `tipodecuenta`) VALUES
(1, 'BSTRCL', 'Gusa1393', 'Jorge Bustamante', 'jorge.bustamante1393@gmail.com', 1),
(4, 'LucasHZ', 'Gusa1393', 'Lucas Jimenez', 'lukas@gmail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
