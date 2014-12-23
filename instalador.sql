-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-12-2014 a las 00:01:49
-- Versión del servidor: 5.5.40
-- Versión de PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `instalador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctrl_config`
--

DROP TABLE IF EXISTS `ctrl_config`;
CREATE TABLE IF NOT EXISTS `ctrl_config` (
`id` int(11) NOT NULL,
  `config` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ctrl_config`
--

INSERT INTO `ctrl_config` (`id`, `config`, `valor`) VALUES
(1, 'tituloweb', 'DEG - Demonia Engine Games'),
(3, 'idioma', 'es_AR'),
(4, 'temaindex', 'vista/default/index');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctrl_contenido`
--

DROP TABLE IF EXISTS `ctrl_contenido`;
CREATE TABLE IF NOT EXISTS `ctrl_contenido` (
`id` int(11) NOT NULL,
  `funcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `ruta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `plantilla` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ctrl_contenido`
--

INSERT INTO `ctrl_contenido` (`id`, `funcion`, `tipo`, `estado`, `ruta`, `plantilla`) VALUES
(1, 'inicio', 1, 1, 'inicio', 'inicio'),
(2, 'ejemplo', 1, 1, 'ejemplo', 'ejemplo'),
(16, 'MetodoEjemplo', 1, 1, 'MetodoEjemplo', 'MetodoEjemplo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctrl_menu`
--

DROP TABLE IF EXISTS `ctrl_menu`;
CREATE TABLE IF NOT EXISTS `ctrl_menu` (
`id` int(11) NOT NULL,
  `menu_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_ruta` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_orden` int(11) NOT NULL,
  `menu_estado` int(11) NOT NULL,
  `menu_tipo` int(11) NOT NULL,
  `seccion` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ctrl_menu`
--

INSERT INTO `ctrl_menu` (`id`, `menu_nombre`, `menu_ruta`, `menu_orden`, `menu_estado`, `menu_tipo`, `seccion`) VALUES
(1, 'inicio', 'inicio', 1, 1, 1, 1),
(2, 'ejemplo', 'ejemplo', 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctrl_plantilla`
--

DROP TABLE IF EXISTS `ctrl_plantilla`;
CREATE TABLE IF NOT EXISTS `ctrl_plantilla` (
`id` int(11) NOT NULL COMMENT 'todo tiene que tener un ID',
  `clave` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nombre de la plantilla',
  `plantilla_orden` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '4'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ctrl_plantilla`
--

INSERT INTO `ctrl_plantilla` (`id`, `clave`, `nombre`, `plantilla_orden`, `estado`, `tipo`) VALUES
(1, 'sec_0', 'head', 0, 1, 1),
(2, 'sec_1', 'header', 1, 1, 1),
(3, 'sec_2', 'nav', 2, 1, 1),
(4, 'sec_3', 'tray', 3, 1, 1),
(5, 'sec_4', 'inicio', 4, 1, 1),
(6, 'sec_5', 'sidebar', 5, 1, 1),
(7, 'sec_6', 'footer', 6, 1, 1),
(15, 'sec_0', 'head', 0, 1, 4),
(16, 'sec_1', 'header', 1, 1, 4),
(17, 'sec_2', 'nav', 2, 1, 4),
(18, 'sec_3', 'tray', 3, 1, 4),
(19, 'sec_4', 'inicio', 4, 1, 4),
(20, 'sec_5', 'sidebar', 5, 1, 4),
(21, 'sec_6', 'footer', 6, 1, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ctrl_config`
--
ALTER TABLE `ctrl_config`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ctrl_contenido`
--
ALTER TABLE `ctrl_contenido`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `ctrl_menu`
--
ALTER TABLE `ctrl_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ctrl_plantilla`
--
ALTER TABLE `ctrl_plantilla`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ctrl_config`
--
ALTER TABLE `ctrl_config`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `ctrl_contenido`
--
ALTER TABLE `ctrl_contenido`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `ctrl_menu`
--
ALTER TABLE `ctrl_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `ctrl_plantilla`
--
ALTER TABLE `ctrl_plantilla`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'todo tiene que tener un ID',AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
