-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2015 a las 00:29:31
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `arterisk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `departamento_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ciudad_departamento_id_foreign` (`departamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`, `departamento_id`) VALUES
(2, 'Bogotá.', 'Bogotá', '2015-12-20 11:10:16', '2015-12-20 11:10:16', 1),
(3, 'Viani', 'Viani', '2015-12-20 11:22:14', '2015-12-20 11:22:14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dias_plazo_pago` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pais_id` int(10) unsigned NOT NULL,
  `departamento_id` int(10) unsigned NOT NULL,
  `ciudad_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_pais_id_foreign` (`pais_id`),
  KEY `cliente_departamento_id_foreign` (`departamento_id`),
  KEY `cliente_ciudad_id_foreign` (`ciudad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `celular`, `correo`, `dias_plazo_pago`, `estado`, `created_at`, `updated_at`, `pais_id`, `departamento_id`, `ciudad_id`) VALUES
(1, '123456789', 'Pepito Perez', 'Calle falsa 123', '0000000', '000 000 0000', 'pepe@perez.com', 3, 0, '2015-12-20 12:32:12', '2015-12-21 10:02:49', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pais_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `departamento_pais_id_foreign` (`pais_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`, `pais_id`) VALUES
(1, 'D.C.', 'Distrito Capital', '0000-00-00 00:00:00', '2015-12-20 11:42:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_facturacion` datetime NOT NULL,
  `fecha_vencimiento` datetime NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_total` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cliente_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `factura_cliente_id_foreign` (`cliente_id`),
  KEY `factura_usuario_id_foreign` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_producto`
--

CREATE TABLE IF NOT EXISTS `factura_producto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `factura_id` int(10) unsigned NOT NULL,
  `producto_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `factura_producto_factura_id_foreign` (`factura_id`),
  KEY `factura_producto_producto_id_foreign` (`producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_menu`
--

CREATE TABLE IF NOT EXISTS `item_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `etiqueta` text COLLATE utf8_unicode_ci NOT NULL,
  `permiso_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `menu_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_menu_permiso_id_foreign` (`permiso_id`),
  KEY `item_menu_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `item_menu`
--

INSERT INTO `item_menu` (`id`, `etiqueta`, `permiso_id`, `created_at`, `updated_at`, `menu_id`) VALUES
(1, 'Clientes', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'Ciudades', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'Departamentos', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'Paises', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'Productos', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'Marcas', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 'Usuarios', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 'Facturas', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 'Reportes', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `marca` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `marca`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Bimbo', 'Pan', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'principal', 'Menu principal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'menu_derecho', 'Menu derecho', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_12_16_034601_bd_arterisk', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Colombia', 'Colombia', '0000-00-00 00:00:00', '2015-12-20 12:19:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Administrador', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Usuario', 'Usuario', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Cliente', 'Cliente', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ruta` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `perfil_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permiso_perfil_id_foreign` (`perfil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id`, `ruta`, `created_at`, `updated_at`, `perfil_id`) VALUES
(1, 'homeClientes', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'homeDepartamentos', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'homePaises', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'homeProductos', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'homeMarcas', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'homeCiudades', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 'homeAuth', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 'facturas', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(9, 'reportes', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3),
(10, 'infoFacturas', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(11, 'guardarFactura', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(12, 'editarFactura', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(13, 'eliminarFactura', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `referencia` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pvp` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `marca_id` int(10) unsigned NOT NULL,
  `unidad_medida_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_marca_id_foreign` (`marca_id`),
  KEY `producto_unidad_medida_id_foreign` (`unidad_medida_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `referencia`, `pvp`, `created_at`, `updated_at`, `marca_id`, `unidad_medida_id`) VALUES
(1, 'Pan Tajado', '55345435', 1000.00, '2015-12-20 08:39:54', '2015-12-21 10:01:15', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE IF NOT EXISTS `unidad_medida` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unidad_medida` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`id`, `unidad_medida`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Gramos', 'Gramos', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `perfil_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_usuario_unique` (`username`),
  UNIQUE KEY `usuario_correo_unique` (`correo`),
  KEY `usuario_perfil_id_foreign` (`perfil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `nombres`, `apellidos`, `correo`, `password`, `estado`, `created_at`, `updated_at`, `perfil_id`, `remember_token`) VALUES
(1, 'admin', 'Sistema', 'Administrador', 'admin@admin.com', '$2y$10$v8k3xaxq5vRAVZtvcRUpY.bsrchbpZZ/qr2xw1WHQN4AX29ZJxnSi', 1, '2015-12-20 01:59:50', '2015-12-21 09:57:42', 1, 'dsDVIwdnUVdOCsT6YxqHSHhxRD433myWp1vHBKG09VGlXnEDcrVMHQMojYhz'),
(2, 'usuario', 'Usuario', 'Usuario', 'usuario@usuario.com', '$2y$10$Df89QCJgMtx8C4G9BLofi.c0MEAGDPHS27SS1jlWJLstDFeeIUV/6', 1, '2015-12-20 13:30:25', '2015-12-21 10:26:13', 2, '0YsGKaMS1OBT1LNTYBebHMwsmuGHTuUHWvJAGfuI9Z25IvUSUQJqWOVeTwb4'),
(3, 'cliente', 'Cliente', 'Cliente', 'cliente@cliente.com', '$2y$10$h2gWxqPdpKACVYEGoPBJweZ3XZ4Py1BX4o/zuVZDdUmE7oHBcHUKG', 1, '2015-12-21 09:59:38', '2015-12-21 10:00:38', 3, 'e1hhKaGv2a1QcXT6GytuiYY4UzoZ7IvrCy44OUC2RmP8rV83BqIOaOO4tzgZ');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ciudad_id_foreign` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudad` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cliente_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cliente_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `factura_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `factura_producto`
--
ALTER TABLE `factura_producto`
  ADD CONSTRAINT `factura_producto_factura_id_foreign` FOREIGN KEY (`factura_id`) REFERENCES `factura` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `factura_producto_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `item_menu`
--
ALTER TABLE `item_menu`
  ADD CONSTRAINT `item_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_menu_permiso_id_foreign` FOREIGN KEY (`permiso_id`) REFERENCES `permiso` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `producto_unidad_medida_id_foreign` FOREIGN KEY (`unidad_medida_id`) REFERENCES `unidad_medida` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
