-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2017 a las 22:56:31
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restauranteintegrador`
--
CREATE DATABASE IF NOT EXISTS `restauranteintegrador` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restauranteintegrador`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebida`
--

DROP TABLE IF EXISTS `bebida`;
CREATE TABLE `bebida` (
  `id` varchar(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` text,
  `imagen` text,
  `idoferta` varchar(8) NOT NULL,
  `idtbebida` varchar(8) NOT NULL,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='BEBIDA';

--
-- Volcado de datos para la tabla `bebida`
--

INSERT INTO `bebida` (`id`, `nombre`, `precio`, `descripcion`, `imagen`, `idoferta`, `idtbebida`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('B0000000', 'Inca Cola', 2, 'Gaseosa inca cola personal', 'incacola.png', 'O0000000', 'BT000000', 1, 'rojasjgar@gmail.com', '2017-11-05 19:48:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidatipo`
--

DROP TABLE IF EXISTS `bebidatipo`;
CREATE TABLE `bebidatipo` (
  `id` varchar(8) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `descripcion` text,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tipo de Bebida ';

--
-- Volcado de datos para la tabla `bebidatipo`
--

INSERT INTO `bebidatipo` (`id`, `tipo`, `descripcion`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('BT000000', 'Gaseosa personal', 'Distintas gaseosas personales', 1, 'rojasjgar@gmail.com', '2017-11-05 19:37:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cli_empresa`
--

DROP TABLE IF EXISTS `cli_empresa`;
CREATE TABLE `cli_empresa` (
  `id` varchar(8) NOT NULL,
  `nombre` text NOT NULL,
  `pais` varchar(100) NOT NULL DEFAULT 'PERÚ',
  `direccion` text NOT NULL,
  `correo` text NOT NULL,
  `ruc` varchar(30) NOT NULL,
  `numcontacto` varchar(20) NOT NULL,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Empresas como clientes';

--
-- Volcado de datos para la tabla `cli_empresa`
--

INSERT INTO `cli_empresa` (`id`, `nombre`, `pais`, `direccion`, `correo`, `ruc`, `numcontacto`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('CE000000', 'PC SUMINISTROS DEL PERU SAC', 'Perú', 'int 18, Avenida Uruguay 489, Cercado de Lima 15001', 'juanluis@gmail.com', '10534898583', '950368578', 1, 'rojasjgar@gmail.com', '2017-11-05 20:36:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cli_empresapersona`
--

DROP TABLE IF EXISTS `cli_empresapersona`;
CREATE TABLE `cli_empresapersona` (
  `id` varchar(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `pais` varchar(45) DEFAULT 'Perú',
  `direccion` text NOT NULL,
  `correo` text NOT NULL,
  `ruc` varchar(20) NOT NULL,
  `numcontacto` varchar(20) NOT NULL,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cliente de persona con negocio';

--
-- Volcado de datos para la tabla `cli_empresapersona`
--

INSERT INTO `cli_empresapersona` (`id`, `nombre`, `apellido`, `pais`, `direccion`, `correo`, `ruc`, `numcontacto`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('CEP00000', 'Pedro', 'Armando', 'Perú', 'Avenida Alfonso Ugarte, Breña 15082', 'pedrodiaz@gmail.com', '10687948583', '980524862', 1, 'rojasjgar@gmail.com', '2017-11-05 20:36:28', NULL, NULL),
('CEP00001', '', '', 'PERÚ', 'asdfare', '', '1312038', '', 1, 'rojasjgar@gmail.com', '2017-11-26 10:22:08', NULL, NULL),
('CEP00002', '', '', 'PERÚ', 'asdfare', '', '1312038', '', 1, 'rojasjgar@gmail.com', '2017-11-26 10:23:32', NULL, NULL),
('CEP00003', '', '', 'PERÚ', 'asdfare', '', '1312038', '', 1, 'rojasjgar@gmail.com', '2017-11-26 10:24:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cli_persona`
--

DROP TABLE IF EXISTS `cli_persona`;
CREATE TABLE `cli_persona` (
  `id` varchar(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `pais` varchar(45) NOT NULL DEFAULT 'Peru',
  `direccion` text NOT NULL,
  `correo` text NOT NULL,
  `dni` varchar(10) NOT NULL,
  `numcontacto` varchar(20) NOT NULL,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cliente como Persona';

--
-- Volcado de datos para la tabla `cli_persona`
--

INSERT INTO `cli_persona` (`id`, `nombre`, `apellido`, `pais`, `direccion`, `correo`, `dni`, `numcontacto`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('CP000000', 'Tomaz', 'Aquino', 'Perú', 'Jirón Chota 1121, Cercado de Lima 15001', 'tomasaquino@gmail.com', '50258598', '980924162', 1, 'rojasjgar@gmail.com', '2017-11-05 20:36:28', NULL, NULL),
('CP000002', 'JErssongimar', 'ajreasf', 'PERÃš', 'dfjjersa', 'rojasga@gmailcom', '70174929', '+980501486', 1, 'rojasjgar@gmail.com', '0000-00-00 00:00:00', NULL, NULL),
('CP000003', 'dsfafdas|', 'fsafda', 'PERÃš', 'dfas', 'fasdf', 'fdsaf', 'dfas', 1, 'rojasjgar@gmail.com', '0000-00-00 00:00:00', NULL, NULL),
('CP000004', 'eadsfasd', 'fasdf', 'PERÚ', 'asfas', 'sfdaf', 'asdfas', 'sdfafas', 1, 'rojasjgar@gmail.com', '0000-00-00 00:00:00', NULL, NULL),
('CP000005', 'Jersson Giomar ', 'Arrivasplata Rojas', 'PERÚ', 'Jr wasington 1406', 'rojasjgar@gmail.com', '70174829', '980501466', 1, 'rojasjgar@gmail.com', NULL, NULL, NULL),
('CP000006', 'JErsson', 'asdfasd', 'PERÚ', 'dasrar', 'asradsfasdr', '7804148', 'refqwe', 1, 'rojasjgar@gmail.com', '2017-11-26 09:23:21', NULL, NULL),
('CP000007', 'JErsson Giomar', 'Arrivasplata Rojas', 'PERÚ', 'jrdsonsafj', 'fasdfeasr', '7017482d', '980514546', 1, 'rojasjgar@gmail.com', '2017-11-26 09:25:59', NULL, NULL),
('CP000008', 'fdsa', 'fasd', 'PERÚ', 'fsadf', 'fdsadf', 'dfsadf', 'dasf', 1, 'rojasjgar@gmail.com', '2017-11-26 09:45:56', NULL, NULL),
('CP000009', 'fdsaew', 'erwer', 'PERÚ', 'erwrew', 'erwrew', 'erwre', 'REWRWE', 1, 'rojasjgar@gmail.com', '2017-11-26 09:46:35', NULL, NULL),
('CP000010', 'Jersonfdsaf', 'efdasdf', 'PERÚ', 'fdasfas', 'efasdf', 'dfsas', 'fdasdf', 1, 'rojasjgar@gmail.com', '2017-11-26 10:35:38', NULL, NULL),
('CP000011', 'sadfasd', 'asdfasd', 'PERÚ', 'asdfasd', 'adsfasdf', 'asdfasd', 'asdfasdf', 1, 'rojasjgar@gmail.com', '2017-11-26 10:37:53', NULL, NULL),
('CP000012', 'asdfasdf', 'fasddfasd', 'PERÚ', 'asfasdf', 'fasfasd', 'fasdfas', 'dfasfasdf', 1, 'rojasjgar@gmail.com', '2017-11-26 10:39:58', NULL, NULL),
('CP000013', 'STWERT', 'ASDF', 'PERÚ', 'FDAS', 'FASFDF', 'FASDF', 'FDASFSD', 1, 'rojasjgar@gmail.com', '2017-11-26 10:44:36', NULL, NULL),
('CP000014', 'fdsa', 'fasd', 'PERÚ', 'asdf', 'asdf', 'asdf', 'asdf', 1, 'rojasjgar@gmail.com', '2017-11-26 12:17:17', NULL, NULL),
('CP000015', 'aaaaaaa', 'aaaaaaaaaaa', 'PERÚ', 'aaaaaaaaaaaaa', 'aaaaaaaa', 'fdasdaaaaa', 'aaa', 1, 'rojasjgar@gmail.com', '2017-11-26 12:38:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confirmacion`
--

DROP TABLE IF EXISTS `confirmacion`;
CREATE TABLE `confirmacion` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL DEFAULT 'SI',
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifca` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='SI - NO';

--
-- Volcado de datos para la tabla `confirmacion`
--

INSERT INTO `confirmacion` (`id`, `tipo`, `idestado`, `userCrea`, `fechaCrea`, `userModifca`, `fechaModifica`) VALUES
(0, 'NO', 1, 'rojasjgar@gmail.com', '2017-11-05 20:39:37', 'null', NULL),
(1, 'SI', 1, 'rojasjgar@gmail.com', '2017-11-05 20:39:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ACTIVO - DESACTIVADO';

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `tipo`, `estado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
(0, 'INACTIVO', 'ACTIVO', 'rojasjgar@gmail.com', '2017-11-05 19:25:30', NULL, NULL),
(1, 'ACTIVO', 'ACTIVO', 'rojasjgar@gmail.com', '2017-11-05 19:23:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

DROP TABLE IF EXISTS `ingrediente`;
CREATE TABLE `ingrediente` (
  `id` varchar(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` text,
  `imagen` text,
  `idtingrediente` varchar(8) NOT NULL,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='INGREDIENTES';

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`id`, `nombre`, `precio`, `descripcion`, `imagen`, `idtingrediente`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('I0000000', 'Pan', 1.5, 'Pan brioche', 'panbrioche.png', 'IT000000', 1, 'rojasjgar@gmail.com', '2017-11-05 20:15:30', NULL, NULL),
('I0000001', 'Salsa Charly', 0.5, 'Kétchup, jalapeños encurtidos, pickles,\nsalsa picante de la casa, toques\nfermentados y ácidos.', 'salsacharly.png', 'IT000001', 1, 'rojasjgar@gmail.com', '2017-11-05 20:20:25', NULL, NULL),
('I0000002', 'Queso Cheddar', 1, 'Cheddar traído directamente de Oxapampa. Encargado de envolver las carnes con todo su sabor.', 'quesocheddar.png', 'IT000002', 1, 'rojasjgar@gmail.com', '2017-11-05 20:21:42', NULL, NULL),
('I0000003', 'Carne Hamburguer', 5, 'Resultado de una mezcla de: \n- Punta de pecho de res nacional\n- Costillar de res nacional\n- Chuck steak americano\n- Brisket americano\n- Panceta curada Joselito', 'carnemamacha.png', 'IT000003', 1, 'rojasjgar@gmail.com', '2017-11-05 20:25:27', NULL, NULL),
('I0000004', 'Pickles Especiales', 1.5, 'Encurtidos especialmente\npara La Mamacha.', 'picklesespeciales.png', 'IT000004', 1, 'rojasjgar@gmail.com', '2017-11-05 20:26:49', NULL, NULL),
('I0000005', 'Papas huayro (porcion)', 10, 'Papas Huayro: Cocinadas al vapor y luego fritas, para que estén crujiente por fuera y cremosas por dentro', 'papashuayro.png', 'IT000005', 1, 'rojasjgar@gmail.com', '2017-11-05 20:28:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientetipo`
--

DROP TABLE IF EXISTS `ingredientetipo`;
CREATE TABLE `ingredientetipo` (
  `id` varchar(8) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `descripcion` text,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tipo de Ingrediente';

--
-- Volcado de datos para la tabla `ingredientetipo`
--

INSERT INTO `ingredientetipo` (`id`, `tipo`, `descripcion`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('IT000000', 'Pan brioche', 'Pan brioche de oriental', 1, 'rojasjgar@gmail.com', '2017-11-05 20:15:30', NULL, NULL),
('IT000001', 'Salsa', 'salsa de casa ketchup', 1, 'rojasjgar@gmail.com', '2017-11-05 20:20:25', NULL, NULL),
('IT000002', 'Queso', 'Queso de la selva', 1, 'rojasjgar@gmail.com', '2017-11-05 20:21:42', NULL, NULL),
('IT000003', 'Carne', 'Carne de distintas mezclas', 1, 'rojasjgar@gmail.com', '2017-11-05 20:22:43', NULL, NULL),
('IT000004', 'Encurtidos', 'Encurtidos especiales', 1, 'rojasjgar@gmail.com', '2017-11-05 20:26:49', NULL, NULL),
('IT000005', 'Papas', 'papas de la sierra', 1, 'rojasjgar@gmail.com', '2017-11-05 20:27:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

DROP TABLE IF EXISTS `oferta`;
CREATE TABLE `oferta` (
  `id` varchar(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `oferta` float NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `descripcion` text,
  `idtipo` varchar(8) NOT NULL,
  `idestado` int(11) DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Oferta';

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`id`, `nombre`, `oferta`, `fechaInicio`, `fechaFin`, `descripcion`, `idtipo`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('O0000000', 'Descuento personal', 0.05, '2017-11-05 19:48:28', '2017-11-05 19:48:35', 'Oferta de descuento de 50 centimos por la compra de gaseosa personal', 'BT000000', 1, 'rojasjgar@gmail.com', '2017-11-05 19:48:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id` varchar(8) NOT NULL,
  `precio` float NOT NULL,
  `horalisto` datetime DEFAULT NULL,
  `mensaje` text,
  `ingredientespedido` text,
  `caracteristicaspedido` text,
  `idenviado` int(11) NOT NULL,
  `idrecibido` int(11) NOT NULL,
  `idcliente` varchar(8) NOT NULL,
  `idrestaurante` varchar(45) NOT NULL,
  `idestado` int(11) DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla pedido';

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `precio`, `horalisto`, `mensaje`, `ingredientespedido`, `caracteristicaspedido`, `idenviado`, `idrecibido`, `idcliente`, `idrestaurante`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('P0000000', 150, '2017-11-05 21:25:01', 'Pedido de mamacha', NULL, NULL, 0, 0, 'CE000000', 'R0000000', 1, 'rojasjgar@gmail.com', '2017-11-05 21:25:01', NULL, NULL),
('P0000001', 12.5, '2017-11-05 21:25:01', '2017-11-05 21:25:01', '2017-11-05 21:25:01', '2017-11-05 21:25:01', 1, 1, 'CE000000', 'R0000000', 1, 'rojasjgar@gmail.com', '2017-11-05 21:25:01', NULL, NULL),
('P0000002', 1, '0000-00-00 00:00:00', 's/17.5', 'CP000015', 'Array', 0, 0, '2017-11-', 'R0000000', 1, 'rojasjgar@gmail.com', '0000-00-00 00:00:00', NULL, NULL),
('P0000003', 37.5, '2017-11-26 12:30:08', 'asdf', 'Array', 'Array', 0, 0, 'CP000015', 'R0000000', 1, 'rojasjgar@gmail.com', '2017-11-26 12:30:08', NULL, NULL),
('P0000004', 23.5, '2017-11-26 12:35:12', 'Hola que tal estoy a la espalda', 'Pan s/1.5 Cantidad:1;Salsa Charly s/0.5 Cantidad:1;Queso Cheddar s/1 Cantidad:1;Carne mamacha s/5 Cantidad:1;Pickles Especiales s/1.5 Cantidad:0;Papas huayro (porcion) s/10 Cantidad:0', 'Inca Cola s/2 Cantidad:0;Ensalada Cesar s/20 Cantidad:0', 1, 0, 'CP000015', 'R0000000', 1, 'rojasjgar@gmail.com', '2017-11-26 12:35:12', NULL, NULL),
('P0000005', 32.5, '2017-11-26 12:37:32', 'Lima peru', 'Pan s/1.5 Cantidad:1;Salsa Charly s/0.5 Cantidad:1;Queso Cheddar s/1 Cantidad:0;Carne mamacha s/5 Cantidad:1;Pickles Especiales s/1.5 Cantidad:0;Papas huayro (porcion) s/10 Cantidad:1', 'Inca Cola s/2 Cantidad:0;Ensalada Cesar s/20 Cantidad:0', 0, 0, 'CP000015', 'R0000000', 1, 'rojasjgar@gmail.com', '2017-11-26 12:37:32', NULL, NULL),
('P0000006', 21.5, '2017-11-26 12:38:20', 'aaa', 'Pan s/1.5 Cantidad:0;Salsa Charly s/0.5 Cantidad:0;Queso Cheddar s/1 Cantidad:1;Carne mamacha s/5 Cantidad:1;Pickles Especiales s/1.5 Cantidad:0;Papas huayro (porcion) s/10 Cantidad:0', 'Inca Cola s/2 Cantidad:0;Ensalada Cesar s/20 Cantidad:0', 0, 0, 'CP000015', 'R0000000', 1, 'rojasjgar@gmail.com', '2017-11-26 12:38:20', NULL, NULL),
('P0000007', 62, '2017-11-29 21:50:26', 'asdfasd', 'Pan s/1.5 Cantidad:1;Salsa Charly s/0.5 Cantidad:1;Queso Cheddar s/1 Cantidad:1;Carne Hamburguer s/5 Cantidad:1;Pickles Especiales s/1.5 Cantidad:0;Papas huayro (porcion) s/10 Cantidad:0', 'Inca Cola s/2 Cantidad:1;Ensalada Cesar s/20 Cantidad:1;Hamburguesa rico s/16.5 Cantidad:1', 0, 0, 'CP000016', 'R0000000', 1, 'rojasjgar@gmail.com', '2017-11-29 21:50:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

DROP TABLE IF EXISTS `plato`;
CREATE TABLE `plato` (
  `id` varchar(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ingredientes` text NOT NULL,
  `precio` double NOT NULL,
  `descripcion` text,
  `imagen` text,
  `logo` text,
  `idoferta` varchar(8) DEFAULT NULL,
  `idtplato` varchar(8) NOT NULL,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='La carta(hamburguesas, papas fritas, etc)';

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`id`, `nombre`, `ingredientes`, `precio`, `descripcion`, `imagen`, `logo`, `idoferta`, `idtplato`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('PL000000', 'LA MAMACHA', 'EL PAN\n\nPan brioche, con papa amarilla, \nyemas dehuevo y mantequilla.\n\n\nLA CARNE\n\nResultado de una mezcla de: \n- Punta de pecho de res nacional\n- Costillar de res nacional\n- Chuck steak americano\n- Brisket americano\n- Panceta curada Joselito\nSALSA CHARLY\n\nKétchup, jalapeños encurtidos, pickles,\nsalsa picante de la casa, toques\nfermentados y ácidos.\nPICKLES ESPECIALES\n\nEncurtidos especialmente\npara La Mamacha.\n\nEL QUESO\n\nCheddar traído directamente de Oxapampa. Encargado de envolver las carnes con todo su sabor.\n\nLAS PAPAS\n\nPapas Huayro: Cocinadas al vapor y luego fritas, para que estén crujiente por fuera y cremosas por dentro', 15.5, 'Hamburguesa oriental de casa', 'mamacha-bg.jpg', 'mamacha-logo.png', NULL, 'PT000000', 1, 'rojasjgar@gmail.com', '2017-11-05 20:10:00', NULL, NULL),
('PL000001', 'Ensalada Cesar', 'Ensalada ', 20, 'ensalada de cesar ', 'ensaladacesar-bg.jpg', 'ensaladacesar-logo.png', NULL, 'PT000001', 1, 'rojasjgar@gmail.com', '2017-11-05 20:10:00', 'null', NULL),
('PL000002', 'Hamburguesa rico', 'AJi con matin', 16.5, 'trabajoso', 'd2e2cf66120bdb59f4e9bab49595a886.jpg', 'hamburguesa.jpg', '', 'PT000000', 1, 'rojasjgar@gmail.com', '2017-11-29 00:16:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platoadherir`
--

DROP TABLE IF EXISTS `platoadherir`;
CREATE TABLE `platoadherir` (
  `id` varchar(8) NOT NULL,
  `idplato` varchar(8) NOT NULL,
  `idpb` varchar(8) NOT NULL,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Adherir a plato caracteristicas';

--
-- Volcado de datos para la tabla `platoadherir`
--

INSERT INTO `platoadherir` (`id`, `idplato`, `idpb`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('PA000000', 'PL000000', 'B0000000', 1, 'rojasjgar@gmail.com', '2017-11-05 19:48:36', 'null', NULL),
('PA000001', 'PL000000', 'PL000001', 1, 'rojasjgar@gmail.com', '2017-11-05 19:48:36', 'null', NULL),
('PA000002', 'PL000002', 'PL000000', 1, 'rojasjgar@gmail.com', '2017-11-29 19:09:11', NULL, NULL),
('PA000003', 'PL000002', 'PL000001', 1, 'rojasjgar@gmail.com', '2017-11-29 19:11:56', NULL, NULL),
('PA000004', 'PL000002', 'B0000000', 1, 'rojasjgar@gmail.com', '2017-11-29 19:40:57', NULL, NULL),
('PA000005', 'PL000000', 'PL000002', 1, 'rojasjgar@gmail.com', '2017-11-29 21:48:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platoingrediente`
--

DROP TABLE IF EXISTS `platoingrediente`;
CREATE TABLE `platoingrediente` (
  `id` varchar(8) NOT NULL,
  `idplato` varchar(8) NOT NULL,
  `idingrediente` varchar(8) NOT NULL,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Plato por cada ingrediente';

--
-- Volcado de datos para la tabla `platoingrediente`
--

INSERT INTO `platoingrediente` (`id`, `idplato`, `idingrediente`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('PI000000', 'PL000000', 'I0000000', 1, 'rojasjgar@gmail.com', '2017-11-05 20:10:00', 'null', NULL),
('PI000001', 'PL000000', 'I0000001', 1, 'rojasjgar@gmail.com', '2017-11-05 20:10:00', 'null', NULL),
('PI000002', 'PL000000', 'I0000002', 1, 'rojasjgar@gmail.com', '2017-11-05 20:10:00', 'null', NULL),
('PI000003', 'PL000000', 'I0000003', 1, 'rojasjgar@gmail.com', '2017-11-05 20:10:00', 'null', NULL),
('PI000004', 'PL000000', 'I0000004', 1, 'rojasjgar@gmail.com', '2017-11-05 20:10:00', 'null', NULL),
('PI000005', 'PL000000', 'I0000005', 1, 'rojasjgar@gmail.com', '2017-11-05 20:10:00', 'null', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platotipo`
--

DROP TABLE IF EXISTS `platotipo`;
CREATE TABLE `platotipo` (
  `id` varchar(8) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `descripcion` text,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='TIPO DE PLATOS';

--
-- Volcado de datos para la tabla `platotipo`
--

INSERT INTO `platotipo` (`id`, `tipo`, `descripcion`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('PT000000', 'Hamburguesa', 'Hamburguesa orientales', 1, 'rojasjgar@gmail.com', '2017-11-05 20:10:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

DROP TABLE IF EXISTS `restaurante`;
CREATE TABLE `restaurante` (
  `id` varchar(8) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` text NOT NULL,
  `descripcion` text,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT 'null',
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Restaurantes';

--
-- Volcado de datos para la tabla `restaurante`
--

INSERT INTO `restaurante` (`id`, `nombre`, `direccion`, `descripcion`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('R0000000', 'PAPACHOS', 'CC Larcomar, Miraflores – Lima.', 'Restaurante de hamburguesas, carnes y platos a la carta', 1, 'rojasjgar@gmail.com', '2017-11-05 20:10:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `dni` varchar(15) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` text NOT NULL,
  `password` varchar(45) NOT NULL,
  `idestado` int(11) NOT NULL DEFAULT '1',
  `userCrea` varchar(45) DEFAULT 'null',
  `fechaCrea` datetime DEFAULT NULL,
  `userModifica` varchar(45) DEFAULT NULL,
  `fechaModifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Usuarios - modificar - eliminar ';

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`dni`, `nombre`, `apellido`, `correo`, `password`, `idestado`, `userCrea`, `fechaCrea`, `userModifica`, `fechaModifica`) VALUES
('11111111', 'admin', 'admin', 'admin@gmail.com', 'admin', 1, 'rojasjgar@gmail.com', '2017-11-05 19:33:07', NULL, NULL),
('70174829', 'Jersson', 'Arrivasplata', 'rojasjgar@gmail.com', '123456', 1, 'rojasjgar@gmail.com', '2017-11-05 19:30:13', NULL, NULL),
('70174830', 'Albert', 'Bernachea', 'Rbernachea@gmail.com', '123456', 1, 'rojasjgar@gmail.com', '2017-11-05 19:32:13', NULL, NULL),
('70174831', 'Diego', 'Huamani', 'dieg.huamani@gmail.com', '123456', 1, 'rojasjgar@gmail.com', '2017-11-05 19:32:42', NULL, NULL),
('70174832', 'Jeddy', 'Saccatoma', 'sofia.saccatoma@gmail.com', '123456', 1, 'rojasjgar@gmail.com', '2017-11-05 19:33:07', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `id_idx` (`idtbebida`),
  ADD KEY `id_idx1` (`idoferta`),
  ADD KEY `idestado_idx` (`idestado`);

--
-- Indices de la tabla `bebidatipo`
--
ALTER TABLE `bebidatipo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Tipo_UNIQUE` (`tipo`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `idestado_idx` (`idestado`);

--
-- Indices de la tabla `cli_empresa`
--
ALTER TABLE `cli_empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `idcliempestado_idx` (`idestado`);

--
-- Indices de la tabla `cli_empresapersona`
--
ALTER TABLE `cli_empresapersona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcepestado_idx` (`idestado`);

--
-- Indices de la tabla `cli_persona`
--
ALTER TABLE `cli_persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`),
  ADD KEY `idcp_idx` (`idestado`);

--
-- Indices de la tabla `confirmacion`
--
ALTER TABLE `confirmacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `idcestado_idx` (`idestado`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `idiestado_idx` (`idestado`),
  ADD KEY `iditingrediente_idx` (`idtingrediente`);

--
-- Indices de la tabla `ingredientetipo`
--
ALTER TABLE `ingredientetipo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `Tipo_UNIQUE` (`tipo`),
  ADD KEY `iditestado_idx` (`idestado`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `idpestado_idx` (`idestado`),
  ADD KEY `idprestaurante_idx` (`idrestaurante`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `platoadherir`
--
ALTER TABLE `platoadherir`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `idestado_idx` (`idestado`),
  ADD KEY `idplato_idx` (`idplato`);

--
-- Indices de la tabla `platoingrediente`
--
ALTER TABLE `platoingrediente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `idestado_idx` (`idestado`),
  ADD KEY `idingrediente_idx` (`idingrediente`),
  ADD KEY `idplato_idx` (`idplato`);

--
-- Indices de la tabla `platotipo`
--
ALTER TABLE `platotipo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `tipo_UNIQUE` (`tipo`),
  ADD KEY `idptestado_idx` (`idestado`);

--
-- Indices de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `idrestado_idx` (`idestado`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`),
  ADD KEY `iduestado_idx` (`idestado`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bebida`
--
ALTER TABLE `bebida`
  ADD CONSTRAINT `idbestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idoferta` FOREIGN KEY (`idoferta`) REFERENCES `oferta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idtbebida` FOREIGN KEY (`idtbebida`) REFERENCES `bebidatipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bebidatipo`
--
ALTER TABLE `bebidatipo`
  ADD CONSTRAINT `idbtestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cli_empresa`
--
ALTER TABLE `cli_empresa`
  ADD CONSTRAINT `idceestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cli_empresapersona`
--
ALTER TABLE `cli_empresapersona`
  ADD CONSTRAINT `idcepestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cli_persona`
--
ALTER TABLE `cli_persona`
  ADD CONSTRAINT `idcp` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `confirmacion`
--
ALTER TABLE `confirmacion`
  ADD CONSTRAINT `idcestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD CONSTRAINT `idiestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iditingrediente` FOREIGN KEY (`idtingrediente`) REFERENCES `ingredientetipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingredientetipo`
--
ALTER TABLE `ingredientetipo`
  ADD CONSTRAINT `iditestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `idpestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idprestaurante` FOREIGN KEY (`idrestaurante`) REFERENCES `restaurante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `platoingrediente`
--
ALTER TABLE `platoingrediente`
  ADD CONSTRAINT `idestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idingrediente` FOREIGN KEY (`idingrediente`) REFERENCES `ingrediente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idplato` FOREIGN KEY (`idplato`) REFERENCES `plato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `platotipo`
--
ALTER TABLE `platotipo`
  ADD CONSTRAINT `idptestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD CONSTRAINT `idrestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `iduestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
