-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2020 a las 17:12:29
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aseomatic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nombre_cargo`) VALUES
(1, 'Desarrollador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id_concepto` int(11) NOT NULL,
  `concepto` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_pago` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_tipo_concepto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `titulo_evento` varchar(45) DEFAULT NULL,
  `descripcion_evento` longtext DEFAULT NULL,
  `fecha_publicado` date DEFAULT NULL,
  `imagen_evento` longtext DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs_contactenos`
--

CREATE TABLE `logs_contactenos` (
  `id_log_contactenos` int(11) NOT NULL,
  `nombres_contactenos` varchar(50) DEFAULT NULL,
  `apellidos_contactenos` varchar(50) DEFAULT NULL,
  `genero_contactenos` varchar(10) DEFAULT NULL,
  `correo_contactenos` varchar(50) DEFAULT NULL,
  `asunto_contactenos` varchar(25) DEFAULT NULL,
  `mensaje_contactenos` longtext DEFAULT NULL,
  `fecha_envio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nominas`
--

CREATE TABLE `nominas` (
  `id_nomina` int(11) NOT NULL,
  `fecha_de` date DEFAULT NULL,
  `fecha_hasta` date DEFAULT NULL,
  `fk_conceptos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(120) DEFAULT NULL,
  `descripcion_noticia` longtext DEFAULT NULL,
  `fecha_publicado` date DEFAULT NULL,
  `imagen_noticia` longtext DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documentos`
--

CREATE TABLE `tipos_documentos` (
  `id_tipo_documento` int(11) NOT NULL,
  `tipo_documento` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_documentos`
--

INSERT INTO `tipos_documentos` (`id_tipo_documento`, `tipo_documento`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'Tarjeta de Identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_concepto`
--

CREATE TABLE `tipo_concepto` (
  `id_tipo_concepto` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `asiento_contable` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `id_tipo_contrato` int(11) NOT NULL,
  `tipo_contrato` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `clave` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_usuario` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `numero_documento` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_rol` int(11) DEFAULT NULL,
  `fk_cargo` int(11) DEFAULT NULL,
  `fk_tipo_documento` int(11) DEFAULT NULL,
  `fk_nomina` int(11) DEFAULT NULL,
  `fk_tipo_contrato` int(11) DEFAULT NULL,
  `token` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id_concepto`),
  ADD KEY `fk_tipo_concepto` (`fk_tipo_concepto`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indices de la tabla `logs_contactenos`
--
ALTER TABLE `logs_contactenos`
  ADD PRIMARY KEY (`id_log_contactenos`);

--
-- Indices de la tabla `nominas`
--
ALTER TABLE `nominas`
  ADD PRIMARY KEY (`id_nomina`),
  ADD KEY `fk_conceptos` (`fk_conceptos`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indices de la tabla `tipo_concepto`
--
ALTER TABLE `tipo_concepto`
  ADD PRIMARY KEY (`id_tipo_concepto`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`id_tipo_contrato`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_rol` (`fk_rol`),
  ADD KEY `fk_cargo` (`fk_cargo`),
  ADD KEY `fk_tipo_documento` (`fk_tipo_documento`),
  ADD KEY `fk_nomina` (`fk_nomina`),
  ADD KEY `fk_tipo_contrato` (`fk_tipo_contrato`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id_concepto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logs_contactenos`
--
ALTER TABLE `logs_contactenos`
  MODIFY `id_log_contactenos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nominas`
--
ALTER TABLE `nominas`
  MODIFY `id_nomina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_concepto`
--
ALTER TABLE `tipo_concepto`
  MODIFY `id_tipo_concepto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  MODIFY `id_tipo_contrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD CONSTRAINT `conceptos_ibfk_1` FOREIGN KEY (`fk_tipo_concepto`) REFERENCES `tipo_concepto` (`id_tipo_concepto`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `nominas`
--
ALTER TABLE `nominas`
  ADD CONSTRAINT `nominas_ibfk_1` FOREIGN KEY (`fk_conceptos`) REFERENCES `conceptos` (`id_concepto`);

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`fk_cargo`) REFERENCES `cargos` (`id_cargo`),
  ADD CONSTRAINT `usuarios_ibfk_4` FOREIGN KEY (`fk_tipo_documento`) REFERENCES `tipos_documentos` (`id_tipo_documento`),
  ADD CONSTRAINT `usuarios_ibfk_5` FOREIGN KEY (`fk_nomina`) REFERENCES `nominas` (`id_nomina`),
  ADD CONSTRAINT `usuarios_ibfk_6` FOREIGN KEY (`fk_tipo_contrato`) REFERENCES `tipo_contrato` (`id_tipo_contrato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
