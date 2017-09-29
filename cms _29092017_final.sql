-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2017 a las 23:16:06
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `punctuation` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `type_file` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `path` mediumtext NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `registration_status` varchar(2) NOT NULL DEFAULT 'AC'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `file`
--

INSERT INTO `file` (`id_file`, `type_file`, `creator`, `owner`, `path`, `count`, `registration_date`, `update_date`, `registration_status`) VALUES
(1, 1, 1, 2, '', 0, '2017-09-29 21:07:23', '2017-09-29 21:07:23', 'AC'),
(2, 2, 1, 2, '', 0, '2017-09-29 21:07:23', '2017-09-29 21:07:23', 'AC'),
(3, 3, 1, 2, '', 0, '2017-09-29 21:08:23', '2017-09-29 21:08:23', 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `controller` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `menu_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `name`, `created`, `updated`, `controller`, `action`, `url`, `menu_order`) VALUES
(1, 'Perfiles', '2016-03-15 00:00:00', '2016-03-16 15:06:00', 'profile', 'index', '', 0),
(2, 'Usuarios', '2016-03-16 15:01:00', '2016-03-16 15:49:00', 'user', 'index', '', 1),
(3, 'Opciones de menú', '2016-03-16 15:02:00', '2016-03-16 15:07:00', 'menu', 'index', '', 2),
(4, 'Permisos', '2016-03-16 15:09:00', '2016-03-17 09:00:00', 'menu_profile', 'index', '', 3),
(5, 'Artículos', '2016-03-17 18:25:00', '2016-03-17 18:25:00', 'article', 'index', '', 4),
(6, 'Comentarios', '2016-03-18 11:34:00', '2016-03-18 11:34:00', 'comment', 'index', '', 5),
(7, 'Cargar Archivos', '2017-09-26 22:15:00', '2017-09-26 22:15:00', 'upload_file', 'index', '', 6),
(8, 'Descargar Archivos', '2017-09-27 22:21:00', '2017-09-27 22:21:00', 'download_file', 'index', '', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_profile`
--

CREATE TABLE `menu_profile` (
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `menu_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `menu_profile`
--

INSERT INTO `menu_profile` (`id`, `created`, `updated`, `menu_id`, `profile_id`) VALUES
(1, '2017-09-29 22:55:00', '2017-09-29 22:55:00', 1, 1),
(2, '2017-09-29 22:55:00', '2017-09-29 22:55:00', 2, 1),
(3, '2017-09-29 22:55:00', '2017-09-29 22:55:00', 3, 1),
(4, '2017-09-29 22:55:00', '2017-09-29 22:55:00', 4, 1),
(5, '2017-09-29 22:55:00', '2017-09-29 22:55:00', 5, 1),
(6, '2017-09-29 22:55:00', '2017-09-29 22:55:00', 6, 1),
(7, '2017-09-29 22:55:00', '2017-09-29 22:55:00', 7, 1),
(8, '2017-09-29 22:55:00', '2017-09-29 22:55:00', 8, 1),
(9, '2017-09-29 22:55:00', '2017-09-29 22:55:00', 7, 6),
(10, '2017-09-29 22:57:00', '2017-09-29 22:57:00', 8, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`id`, `name`, `created`, `updated`) VALUES
(1, 'Administrador', '2016-03-15 00:00:00', '2016-03-17 15:33:00'),
(2, 'Redactor', '2016-03-16 11:17:00', '2016-03-17 15:33:00'),
(4, 'Moderador', '2016-03-16 11:47:00', '2016-03-17 15:33:00'),
(5, 'Usuario', '2016-03-17 15:33:00', '2016-03-17 15:33:00'),
(6, 'Gestor Archivos', '2016-03-18 14:19:00', '2016-03-18 14:19:00'),
(7, 'Cliente', '2017-09-26 16:55:00', '2017-09-26 16:55:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_file`
--

CREATE TABLE `type_file` (
  `id_type_file` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT 'AC'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `type_file`
--

INSERT INTO `type_file` (`id_type_file`, `description`, `total`, `tags`, `status`) VALUES
(1, 'Certificado de retención en la fuente a proveedores', 1, '', 'AC'),
(2, 'Certificado de ingresos y retención para empleados', 1, '', 'AC'),
(3, 'Certificado de retención a título de industria y comercio', 1, '', 'AC'),
(4, 'Bitácora del cliente', 1, '', 'AC'),
(5, 'Retención en la fuente', 12, '', 'AC'),
(6, 'Impuestos sobre las ventas y complementarios', 12, '', 'AC'),
(7, 'Declaración de renta y complementarios', 5, '', 'AC'),
(8, 'Estados financieros clientes', 12, '', 'AC'),
(9, 'Registro único tributario', 3, '', 'AC'),
(10, 'Cámara de comercio', 3, '', 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `created`, `updated`, `login`, `password`, `email`, `profile_id`) VALUES
(1, 'Administrator', '2017-09-26 16:37:00', '2017-09-26 16:37:00', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'etaborda@gmail.com', 1),
(2, 'Todos', '2017-09-29 00:00:00', '2017-09-29 00:00:00', 'all', 'all', 'all', 7),
(3, 'Fabian Jaimes', '2017-09-29 19:33:00', '2017-09-29 19:34:00', 'fajaimesm', '111256d5d5e833a24d72c5820218e4be', 'fajaimes@dane.gov.co', 6),
(4, 'Emmanuel Taborda', '2017-09-29 19:36:00', '2017-09-29 19:36:00', 'etabordac', '78458e12cea2dc077c710bd76b577f95', 'etabordac@dane.gov.co', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `owner` (`owner`),
  ADD KEY `creater` (`creator`),
  ADD KEY `type_file` (`type_file`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu_profile`
--
ALTER TABLE `menu_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_file`
--
ALTER TABLE `type_file`
  ADD PRIMARY KEY (`id_type_file`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `menu_profile`
--
ALTER TABLE `menu_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `type_file`
--
ALTER TABLE `type_file`
  MODIFY `id_type_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `creater` FOREIGN KEY (`creator`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `owner` FOREIGN KEY (`owner`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `type_file` FOREIGN KEY (`type_file`) REFERENCES `type_file` (`id_type_file`);

--
-- Filtros para la tabla `menu_profile`
--
ALTER TABLE `menu_profile`
  ADD CONSTRAINT `menu_profile_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `menu_profile_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
