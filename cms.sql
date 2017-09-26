-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2017 a las 00:04:19
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
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `article`
--

INSERT INTO `article` (`id`, `title`, `body`, `created`, `updated`, `user_id`) VALUES
(2, 'Primer Artículo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi euismod convallis odio in finibus. Pellentesque volutpat nunc egestas est euismod facilisis. Fusce lobortis tempor lacus in elementum. Morbi eu quam at ipsum mattis feugiat quis ornare ex. Praesent semper sem ut sapien semper ornare. Mauris ut ornare sapien, at efficitur purus. Vivamus sit amet sapien auctor, mattis nisl at, dictum elit. Nunc id tellus cursus nisl vestibulum auctor. In hac.', '2016-03-16 00:00:00', '2016-03-16 00:00:00', 1),
(4, 'Título', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tincidunt sapien, eu placerat dui. Praesent ac erat eget mi semper finibus placerat a nibh. Praesent turpis nunc, porta at ex eget, pellentesque rutrum est. Aliquam erat volutpat. Curabitur rutrum auctor interdum. Nunc id leo iaculis, luctus metus vitae, consectetur dolor. Suspendisse gravida arcu quis neque tempus varius. Vestibulum gravida.', '2016-03-18 08:58:00', '2016-03-18 09:55:00', 3),
(5, 'Titulo modificado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tincidunt sapien, eu placerat dui. Praesent ac erat eget mi semper finibus placerat a nibh. Praesent turpis nunc, porta at ex eget, pellentesque rutrum est. Aliquam erat volutpat. Curabitur rutrum auctor interdum. Nunc id leo iaculis, luctus metus vitae, consectetur dolor. Suspendisse gravida arcu quis neque tempus varius. Vestibulum gravida.', '2016-03-18 09:49:00', '2016-03-18 09:56:00', 3),
(6, 'Artículo cuatro', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tincidunt sapien, eu placerat dui. Praesent ac erat eget mi semper finibus placerat a nibh. Praesent turpis nunc, porta at ex eget, pellentesque rutrum est. Aliquam erat volutpat. Curabitur rutrum auctor interdum. Nunc id leo iaculis, luctus metus vitae, consectetur dolor. Suspendisse gravida arcu quis neque tempus varius. Vestibulum gravida.', '2016-03-18 09:57:00', '2016-03-18 09:57:00', 3),
(7, 'Artículo cinco', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tincidunt sapien, eu placerat dui. Praesent ac erat eget mi semper finibus placerat a nibh. Praesent turpis nunc, porta at ex eget, pellentesque rutrum est. Aliquam erat volutpat. Curabitur rutrum auctor interdum. Nunc id leo iaculis, luctus metus vitae, consectetur dolor. Suspendisse gravida arcu quis neque tempus varius. Vestibulum gravida.', '2016-03-18 09:57:00', '2016-03-18 09:57:00', 3),
(8, 'Artículo seis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tincidunt sapien, eu placerat dui. Praesent ac erat eget mi semper finibus placerat a nibh. Praesent turpis nunc, porta at ex eget, pellentesque rutrum est. Aliquam erat volutpat. Curabitur rutrum auctor interdum. Nunc id leo iaculis, luctus metus vitae, consectetur dolor. Suspendisse gravida arcu quis neque tempus varius. Vestibulum gravida.', '2016-03-18 09:58:00', '2016-03-18 09:58:00', 3);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`id`, `content`, `created`, `updated`, `article_id`, `user_id`) VALUES
(1, 'Comentario a la última noticia (id = 8) actualizado', '2016-03-18 00:00:00', '2016-03-18 12:55:00', 8, 3),
(2, 'Lorem ipsum dolor sit amet', '2016-03-18 12:37:00', '2016-03-18 12:37:00', 2, 3),
(3, 'Otro comentario a la primera noticia', '2016-03-18 12:43:00', '2016-03-18 12:43:00', 2, 3),
(5, 'Este es un comentario creado por Emmanuel Taborda.', '2017-09-26 17:02:00', '2017-09-26 17:02:00', 8, 9);

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
  `count` int(11) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `registration_status` varchar(2) NOT NULL DEFAULT 'AC'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `name`, `created`, `updated`, `controller`, `action`, `url`, `menu_order`) VALUES
(1, 'Perfiles', '2016-03-15 00:00:00', '2016-03-16 15:06:00', 'profile', 'index', '', 0),
(4, 'Usuarios', '2016-03-16 15:01:00', '2016-03-16 15:49:00', 'user', 'index', '', 1),
(5, 'Opciones de menú', '2016-03-16 15:02:00', '2016-03-16 15:07:00', 'menu', 'index', '', 2),
(6, 'Google', '2016-03-16 15:02:00', '2016-03-16 15:09:00', '', '', 'http://www.google.com', 10),
(7, 'Permisos', '2016-03-16 15:09:00', '2016-03-17 09:00:00', 'menu_profile', 'index', '', 3),
(8, 'Artículos', '2016-03-17 18:25:00', '2016-03-17 18:25:00', 'article', 'index', '', 4),
(9, 'Comentarios', '2016-03-18 11:34:00', '2016-03-18 11:34:00', 'comment', 'index', '', 5),
(10, 'Cargar Archivos', '2017-09-26 22:15:00', '2017-09-26 22:15:00', 'upload_file', 'index', '', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu_profile`
--

INSERT INTO `menu_profile` (`id`, `created`, `updated`, `menu_id`, `profile_id`) VALUES
(1, '2016-03-15 00:00:00', '2016-03-15 00:00:00', 1, 1),
(6, '2016-03-17 12:14:00', '2016-03-17 12:14:00', 7, 1),
(8, '2016-03-17 12:48:00', '2016-03-17 12:48:00', 1, 4),
(10, '2016-03-17 12:48:00', '2016-03-17 12:48:00', 5, 1),
(13, '2016-03-17 15:34:00', '2016-03-17 15:34:00', 4, 1),
(14, '2016-03-17 15:34:00', '2016-03-17 15:34:00', 4, 4),
(15, '2016-03-17 15:34:00', '2016-03-17 15:34:00', 6, 1),
(16, '2016-03-17 15:34:00', '2016-03-17 15:34:00', 6, 2),
(17, '2016-03-17 15:34:00', '2016-03-17 15:34:00', 6, 4),
(18, '2016-03-17 15:34:00', '2016-03-17 15:34:00', 6, 5),
(19, '2016-03-17 18:26:00', '2016-03-17 18:26:00', 8, 1),
(20, '2016-03-17 18:26:00', '2016-03-17 18:26:00', 8, 2),
(21, '2016-03-18 11:34:00', '2016-03-18 11:34:00', 9, 1),
(22, '2016-03-18 11:34:00', '2016-03-18 11:34:00', 9, 4),
(23, '2016-03-18 14:14:00', '2016-03-18 14:14:00', 9, 5),
(24, '2016-03-18 14:20:00', '2016-03-18 14:20:00', 1, 6),
(25, '2016-03-18 14:20:00', '2016-03-18 14:20:00', 6, 6),
(26, '2017-09-26 22:19:00', '2017-09-26 22:19:00', 10, 1);

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
(6, 'Prueba', '2016-03-18 14:19:00', '2016-03-18 14:19:00'),
(7, 'etabordac', '2017-09-26 16:55:00', '2017-09-26 16:55:00');

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
(1, 'Certificado de retención en la fuente a proveedores.', 0, '', 'AC'),
(2, 'Certificado de ingresos y retención para empleados.', 0, '', 'AC'),
(3, 'Certificado de retención a título de industria y comercio.', 0, '', 'AC'),
(4, 'Bitácora del cliente.', 1, '', 'AC'),
(5, 'Retención en la fuente.', 12, '', 'AC'),
(6, 'Impuestos sobre las ventas y complementarios.', 12, '', 'AC'),
(7, 'Declaración de renta y complementarios.', 5, '', 'AC'),
(8, 'Estados financieros clientes.', 12, '', 'AC'),
(9, 'Registro único tributario.', 3, '', 'AC'),
(10, 'Cámara de comercio.', 3, '', 'AC');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `created`, `updated`, `login`, `password`, `email`, `profile_id`) VALUES
(1, 'Daniel de Miguel', '2016-03-15 00:00:00', '2016-03-15 00:00:00', 'dorell', '68053af2923e00204c3ca7c6a3150cf7', 'dorell@kitmaker.com', 1),
(2, 'Peter Parker', '2016-03-16 16:29:00', '2016-03-17 16:32:00', 'Spiderman', 'efaa25379dced0fea71b03fe37da6d08', 'photo@daleybugel.com', 4),
(3, 'Adrian Admitamoslo', '2016-03-17 16:34:00', '2016-03-17 16:36:00', 'admitamoslo', '3a0b88d19c3c3a24e2bd1bf38a627683', 'a_admitamoslo@myweb.com', 1),
(4, 'Renato Redactoso', '2016-03-17 16:38:00', '2016-03-17 16:38:00', 'redactoso', 'b649fe4402ecd507b73dce815ff0700d', 'r_redactoso@myweb.com', 2),
(5, 'Manuela Modena', '2016-03-17 16:39:00', '2016-03-17 16:39:00', 'modena', 'aed1b2010409df362d530baab8bf298d', 'm_modena@myweb.com', 4),
(6, 'Ursula Usualmente', '2016-03-17 16:40:00', '2016-03-17 16:40:00', 'usualmente', '82d6185ffb00e2d91d6366a5cc7bdf4e', 'u_usualmente@gmail.com', 5),
(7, 'Emmanuel', '2017-09-26 16:28:00', '2017-09-26 16:28:00', 'etabordac', 'ede744f17cd9d3b297cd4318be453641', 'tabordaemmanuel@gmail.com', 5),
(8, 'etabordac2', '2017-09-26 16:29:00', '2017-09-26 16:29:00', 'etabordac2', '2cf473cfdb10f45a34754aa94e010085', 'tabordaemmanuel@gmail.com', 5),
(9, 'etaborda', '2017-09-26 16:37:00', '2017-09-26 16:37:00', 'etaborda', '78458e12cea2dc077c710bd76b577f95', 'etaborda@gmail.com', 1);

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
  ADD KEY `type` (`type_file`),
  ADD KEY `owner` (`owner`),
  ADD KEY `creater` (`creator`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `menu_profile`
--
ALTER TABLE `menu_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  ADD CONSTRAINT `type` FOREIGN KEY (`type_file`) REFERENCES `file` (`id_file`);

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
