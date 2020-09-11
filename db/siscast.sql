-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2020 a las 08:40:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siscast`
--
CREATE DATABASE IF NOT EXISTS `siscast` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `siscast`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambientes`
--

CREATE TABLE `ambientes` (
  `id` int(11) NOT NULL,
  `dormitorio` varchar(255) DEFAULT NULL,
  `comedor` varchar(255) DEFAULT NULL,
  `sala` varchar(255) DEFAULT NULL,
  `banos` varchar(255) DEFAULT NULL,
  `cocina` varchar(255) DEFAULT NULL,
  `servicio` varchar(255) DEFAULT NULL,
  `oficina` varchar(255) DEFAULT NULL,
  `garaje` varchar(255) DEFAULT NULL,
  `estacionamiento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas_construccion`
--

CREATE TABLE `caracteristicas_construccion` (
  `id` int(11) NOT NULL,
  `destino` text DEFAULT NULL,
  `estructura` text DEFAULT NULL,
  `paredes_tipo` text DEFAULT NULL,
  `paredes_acabado` text DEFAULT NULL,
  `pintura` text DEFAULT NULL,
  `techo` text DEFAULT NULL,
  `pisos` text DEFAULT NULL,
  `ventanas` text DEFAULT NULL,
  `insta_electricas` text DEFAULT NULL,
  `observ` text DEFAULT NULL,
  `Regimen` varchar(255) DEFAULT NULL,
  `fk_puertas` varchar(255) DEFAULT NULL,
  `fk_estadoConserv` varchar(255) DEFAULT NULL,
  `fk_piezasSanitarias` varchar(255) DEFAULT NULL,
  `fk_complementos` varchar(255) DEFAULT NULL,
  `fk_ambientes` varchar(255) DEFAULT NULL,
  `fk_estadoCons` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carc_inmueble`
--

CREATE TABLE `carc_inmueble` (
  `id` int(11) NOT NULL,
  `topografia` text DEFAULT NULL,
  `forma` text DEFAULT NULL,
  `uso` text DEFAULT NULL,
  `tenencia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cod_catastral`
--

CREATE TABLE `cod_catastral` (
  `id` int(11) NOT NULL,
  `efed` int(11) DEFAULT NULL,
  `mun` int(11) DEFAULT NULL,
  `prr` int(11) DEFAULT NULL,
  `amb` int(11) DEFAULT NULL,
  `sec` int(11) DEFAULT NULL,
  `ssec` int(11) DEFAULT NULL,
  `man` int(11) DEFAULT NULL,
  `par` int(11) DEFAULT NULL,
  `sbp` int(11) DEFAULT NULL,
  `niv` int(11) DEFAULT NULL,
  `und` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complementos`
--

CREATE TABLE `complementos` (
  `id` int(11) DEFAULT NULL,
  `ascensor` varchar(255) DEFAULT NULL,
  `aire_acond` varchar(255) DEFAULT NULL,
  `rejas` varchar(255) DEFAULT NULL,
  `closets` varchar(255) DEFAULT NULL,
  `porcelana` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constancias`
--

CREATE TABLE `constancias` (
  `id` int(11) NOT NULL,
  `tipo_operacion` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fk_redactor` int(11) DEFAULT NULL,
  `fk_expedi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_protocolizacion`
--

CREATE TABLE `datos_protocolizacion` (
  `id` int(11) NOT NULL,
  `documento` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `tomo` varchar(255) DEFAULT NULL,
  `folio` varchar(255) DEFAULT NULL,
  `protocolo` varchar(255) DEFAULT NULL,
  `trimestre` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `valor_inmueble` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_conservacion`
--

CREATE TABLE `estado_conservacion` (
  `id` int(11) NOT NULL,
  `ano_construccion` varchar(255) DEFAULT NULL,
  `ano_refaccion` varchar(255) DEFAULT NULL,
  `edad_efectiva` varchar(255) DEFAULT NULL,
  `nro_planta` varchar(255) DEFAULT NULL,
  `nro_vivienda` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id` int(11) NOT NULL,
  `fk_inmueble` int(11) DEFAULT NULL,
  `fk_propietario` int(11) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `n_expediente` varchar(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `condicion` varchar(255) DEFAULT NULL,
  `valorInmue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expempadro`
--

CREATE TABLE `expempadro` (
  `id` int(11) NOT NULL,
  `fk_inmueble` int(11) DEFAULT NULL,
  `fk_propietario` int(11) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `n_expediente` varchar(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `condicion` varchar(255) DEFAULT NULL,
  `valorInmue` varchar(255) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2730 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `monto` varchar(255) DEFAULT NULL,
  `n_factura` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `n_recibo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_user`
--

CREATE TABLE `historial_user` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `accion` text DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `id` int(11) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `parroquia` text DEFAULT NULL,
  `sector` varchar(255) DEFAULT NULL,
  `ambito` text DEFAULT NULL,
  `fk_carac_construccion` int(11) DEFAULT NULL,
  `fk_protocolizacion` int(11) DEFAULT NULL,
  `fk_carac_inmuebles` int(11) DEFAULT NULL,
  `fk_lind_documento` int(11) DEFAULT NULL,
  `fk_lind_general` int(11) DEFAULT NULL,
  `fk_lind_pos_venta` int(11) DEFAULT NULL,
  `fk_servicios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linderos_documento`
--

CREATE TABLE `linderos_documento` (
  `id` int(11) NOT NULL,
  `norte` varchar(255) DEFAULT NULL,
  `noreste` varchar(255) DEFAULT NULL,
  `sur` varchar(255) DEFAULT NULL,
  `sureste` varchar(255) DEFAULT NULL,
  `este` varchar(255) DEFAULT NULL,
  `suroeste` varchar(255) DEFAULT NULL,
  `oeste` varchar(255) DEFAULT NULL,
  `noroeste` varchar(255) DEFAULT NULL,
  `alind_n` varchar(255) DEFAULT NULL,
  `alind_s` varchar(255) DEFAULT NULL,
  `alind_e` varchar(255) DEFAULT NULL,
  `alind_o` varchar(255) DEFAULT NULL,
  `areaTotal` varchar(255) DEFAULT NULL,
  `uniAreaT` varchar(255) DEFAULT NULL,
  `nivelesConst` varchar(255) DEFAULT NULL,
  `uniAreaC` varchar(255) DEFAULT NULL,
  `areaConst` varchar(255) DEFAULT NULL,
  `uniNorte` text DEFAULT NULL,
  `uniSur` text DEFAULT NULL,
  `uniEste` text DEFAULT NULL,
  `uniOeste` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linderos_general`
--

CREATE TABLE `linderos_general` (
  `id` int(11) NOT NULL,
  `norte` varchar(255) DEFAULT NULL,
  `noreste` varchar(255) DEFAULT NULL,
  `sur` varchar(255) DEFAULT NULL,
  `sureste` varchar(255) DEFAULT NULL,
  `este` varchar(255) DEFAULT NULL,
  `suroeste` varchar(255) DEFAULT NULL,
  `oeste` varchar(255) DEFAULT NULL,
  `noroeste` varchar(255) DEFAULT NULL,
  `alind_n` varchar(255) DEFAULT NULL,
  `alind_s` varchar(255) DEFAULT NULL,
  `alind_e` varchar(255) DEFAULT NULL,
  `alind_o` varchar(255) DEFAULT NULL,
  `areaTotal` varchar(255) DEFAULT NULL,
  `uniAreaT` varchar(255) DEFAULT NULL,
  `nivelesConst` varchar(255) DEFAULT NULL,
  `uniAreaC` varchar(255) DEFAULT NULL,
  `areaConst` varchar(255) DEFAULT NULL,
  `uniNorte` text DEFAULT NULL,
  `uniSur` text DEFAULT NULL,
  `uniEste` text DEFAULT NULL,
  `uniOeste` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linderos_posible_venta`
--

CREATE TABLE `linderos_posible_venta` (
  `id` int(11) NOT NULL,
  `norte` varchar(255) DEFAULT NULL,
  `noreste` varchar(255) DEFAULT NULL,
  `sur` varchar(255) DEFAULT NULL,
  `sureste` varchar(255) DEFAULT NULL,
  `este` varchar(255) DEFAULT NULL,
  `suroeste` varchar(255) DEFAULT NULL,
  `oeste` varchar(255) DEFAULT NULL,
  `noroeste` varchar(255) DEFAULT NULL,
  `alind_n` varchar(255) DEFAULT NULL,
  `alind_s` varchar(255) DEFAULT NULL,
  `alind_o` varchar(255) DEFAULT NULL,
  `alind_e` varchar(255) DEFAULT NULL,
  `areaTotal` varchar(255) DEFAULT NULL,
  `uniAreaT` varchar(255) DEFAULT NULL,
  `nivelesConst` varchar(255) DEFAULT NULL,
  `uniAreaC` varchar(255) DEFAULT NULL,
  `areaConst` varchar(255) DEFAULT NULL,
  `uniNorte` text DEFAULT NULL,
  `uniSur` text DEFAULT NULL,
  `uniEste` text DEFAULT NULL,
  `uniOeste` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multa`
--

CREATE TABLE `multa` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `fk_expedient` int(11) NOT NULL,
  `fk_factura` int(11) NOT NULL,
  `fechaPagos` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas_sanitarias`
--

CREATE TABLE `piezas_sanitarias` (
  `id` int(11) NOT NULL,
  `porcelana_fina` text DEFAULT NULL,
  `porcelana_econ` text DEFAULT NULL,
  `banera` text DEFAULT NULL,
  `calentador` text DEFAULT NULL,
  `wc` text DEFAULT NULL,
  `bidet` text DEFAULT NULL,
  `lavamanos` text DEFAULT NULL,
  `ducha` text DEFAULT NULL,
  `urinario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `id` int(11) NOT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `rif` varchar(255) DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `apellido` text DEFAULT NULL,
  `telef` varchar(255) DEFAULT NULL,
  `dir_hab` varchar(255) DEFAULT NULL,
  `telef_hab` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puertas`
--

CREATE TABLE `puertas` (
  `id` int(11) NOT NULL,
  `entamborada_fina` text DEFAULT NULL,
  `ent_econo` text DEFAULT NULL,
  `madera_cepi` text DEFAULT NULL,
  `hierro` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recaudacion`
--

CREATE TABLE `recaudacion` (
  `id` int(11) NOT NULL,
  `monto` varchar(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_inmue`
--

CREATE TABLE `servicios_inmue` (
  `id` int(11) NOT NULL,
  `acued` text DEFAULT NULL,
  `acuedRural` text DEFAULT NULL,
  `aguasSubter` text DEFAULT NULL,
  `aguasServ` text DEFAULT NULL,
  `pavimentoFlex` text DEFAULT NULL,
  `pavimentoRig` text DEFAULT NULL,
  `viaEngran` text DEFAULT NULL,
  `acera` text DEFAULT NULL,
  `alumbradoPub` text DEFAULT NULL,
  `aseo` text DEFAULT NULL,
  `transportePublic` text DEFAULT NULL,
  `pozoSept` text DEFAULT NULL,
  `electriResi` text DEFAULT NULL,
  `electriIndus` text DEFAULT NULL,
  `lineaTelef` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_ambientes`
--

CREATE TABLE `temp_ambientes` (
  `id` int(11) NOT NULL,
  `dormitorio` varchar(255) DEFAULT NULL,
  `comedor` varchar(255) DEFAULT NULL,
  `sala` varchar(255) DEFAULT NULL,
  `banos` varchar(255) DEFAULT NULL,
  `cocina` varchar(255) DEFAULT NULL,
  `servicio` varchar(255) DEFAULT NULL,
  `oficina` varchar(255) DEFAULT NULL,
  `garaje` varchar(255) DEFAULT NULL,
  `estacionamiento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_caraconst`
--

CREATE TABLE `temp_caraconst` (
  `id` int(11) NOT NULL,
  `destino` text DEFAULT NULL,
  `estructura` text DEFAULT NULL,
  `paredes_tipo` text DEFAULT NULL,
  `paredes_acabado` text DEFAULT NULL,
  `pintura` text DEFAULT NULL,
  `techo` text DEFAULT NULL,
  `pisos` text DEFAULT NULL,
  `ventanas` text DEFAULT NULL,
  `insta_electricas` text DEFAULT NULL,
  `observ` text DEFAULT NULL,
  `Regimen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_carainmue`
--

CREATE TABLE `temp_carainmue` (
  `id` int(11) NOT NULL,
  `topografia` text DEFAULT NULL,
  `forma` text DEFAULT NULL,
  `uso` text DEFAULT NULL,
  `tenencia` text DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2048 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_complementos`
--

CREATE TABLE `temp_complementos` (
  `id` int(11) NOT NULL,
  `ascensor` varchar(255) DEFAULT NULL,
  `aire_acond` varchar(255) DEFAULT NULL,
  `rejas` varchar(255) DEFAULT NULL,
  `closets` varchar(255) DEFAULT NULL,
  `porcelana` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_datos_protocolizacion`
--

CREATE TABLE `temp_datos_protocolizacion` (
  `id` int(11) NOT NULL,
  `documento` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `tomo` varchar(255) DEFAULT NULL,
  `folio` varchar(255) DEFAULT NULL,
  `protocolo` varchar(255) DEFAULT NULL,
  `trimestre` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `valor_inmueble` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2048 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_estado_conservacion`
--

CREATE TABLE `temp_estado_conservacion` (
  `id` int(11) NOT NULL,
  `ano_construccion` varchar(255) DEFAULT NULL,
  `ano_refaccion` varchar(255) DEFAULT NULL,
  `edad_efectiva` varchar(255) DEFAULT NULL,
  `nro_planta` varchar(255) DEFAULT NULL,
  `nro_vivienda` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_expediente`
--

CREATE TABLE `temp_expediente` (
  `id` int(11) NOT NULL,
  `no_expediente` varchar(255) DEFAULT NULL,
  `condicion` varchar(255) DEFAULT NULL,
  `fecha` varbinary(255) DEFAULT NULL,
  `valorInmue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_factura`
--

CREATE TABLE `temp_factura` (
  `id` int(11) NOT NULL,
  `monto` varchar(255) DEFAULT NULL,
  `n_factura` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `n_recibo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2048 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_inmueble`
--

CREATE TABLE `temp_inmueble` (
  `id` int(11) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `parroquia` text DEFAULT NULL,
  `sector` varchar(255) DEFAULT NULL,
  `ambito` text DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2048 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_linderos_documento`
--

CREATE TABLE `temp_linderos_documento` (
  `id` int(11) NOT NULL,
  `norte` varchar(255) DEFAULT NULL,
  `noreste` varchar(255) DEFAULT NULL,
  `sur` varchar(255) DEFAULT NULL,
  `sureste` varchar(255) DEFAULT NULL,
  `este` varchar(255) DEFAULT NULL,
  `suroeste` varchar(255) DEFAULT NULL,
  `oeste` varchar(255) DEFAULT NULL,
  `noroeste` varchar(255) DEFAULT NULL,
  `alind_n` varchar(255) DEFAULT NULL,
  `alind_s` varchar(255) DEFAULT NULL,
  `alind_e` varchar(255) DEFAULT NULL,
  `alind_o` varchar(255) DEFAULT NULL,
  `areaTotal` varchar(255) DEFAULT NULL,
  `uniAreaT` varchar(255) DEFAULT NULL,
  `nivelesConst` varchar(255) DEFAULT NULL,
  `uniAreaC` varchar(255) DEFAULT NULL,
  `areaConst` varchar(255) DEFAULT NULL,
  `uniNorte` text DEFAULT NULL,
  `uniSur` text DEFAULT NULL,
  `uniEste` text DEFAULT NULL,
  `uniOeste` text DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2048 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_linderos_general`
--

CREATE TABLE `temp_linderos_general` (
  `id` int(11) NOT NULL,
  `norte` varchar(255) DEFAULT NULL,
  `noreste` varchar(255) DEFAULT NULL,
  `sur` varchar(255) DEFAULT NULL,
  `sureste` varchar(255) DEFAULT NULL,
  `este` varchar(255) DEFAULT NULL,
  `suroeste` varchar(255) DEFAULT NULL,
  `oeste` varchar(255) DEFAULT NULL,
  `noroeste` varchar(255) DEFAULT NULL,
  `alind_n` varchar(255) DEFAULT NULL,
  `alind_s` varchar(255) DEFAULT NULL,
  `alind_e` varchar(255) DEFAULT NULL,
  `alind_o` varchar(255) DEFAULT NULL,
  `areaTotal` varchar(255) DEFAULT NULL,
  `uniAreaT` varchar(255) DEFAULT NULL,
  `nivelesConst` varchar(255) DEFAULT NULL,
  `uniAreaC` varchar(255) DEFAULT NULL,
  `areaConst` varchar(255) DEFAULT NULL,
  `uniNorte` text DEFAULT NULL,
  `uniSur` text DEFAULT NULL,
  `uniEste` text DEFAULT NULL,
  `uniOeste` text DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2048 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_linderos_posible_venta`
--

CREATE TABLE `temp_linderos_posible_venta` (
  `id` int(11) NOT NULL,
  `norte` varchar(255) DEFAULT NULL,
  `noreste` varchar(255) DEFAULT NULL,
  `sur` varchar(255) DEFAULT NULL,
  `sureste` varchar(255) DEFAULT NULL,
  `este` varchar(255) DEFAULT NULL,
  `suroeste` varchar(255) DEFAULT NULL,
  `oeste` varchar(255) DEFAULT NULL,
  `noroeste` varchar(255) DEFAULT NULL,
  `alind_n` varchar(255) DEFAULT NULL,
  `alind_s` varchar(255) DEFAULT NULL,
  `alind_o` varchar(255) DEFAULT NULL,
  `alind_e` varchar(255) DEFAULT NULL,
  `areaTotal` varchar(255) DEFAULT NULL,
  `uniAreaT` varchar(255) DEFAULT NULL,
  `nivelesConst` varchar(255) DEFAULT NULL,
  `uniAreaC` varchar(255) DEFAULT NULL,
  `areaConst` varchar(255) DEFAULT NULL,
  `uniNorte` text DEFAULT NULL,
  `uniSur` text DEFAULT NULL,
  `uniEste` text DEFAULT NULL,
  `uniOeste` text DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2048 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_piezas_sanitarias`
--

CREATE TABLE `temp_piezas_sanitarias` (
  `id` int(11) NOT NULL,
  `porcelana_fina` text DEFAULT NULL,
  `porcelana_econ` text DEFAULT NULL,
  `banera` text DEFAULT NULL,
  `calentador` text DEFAULT NULL,
  `wc` text DEFAULT NULL,
  `bidet` text DEFAULT NULL,
  `lavamanos` text DEFAULT NULL,
  `ducha` text DEFAULT NULL,
  `urinario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_propietarios`
--

CREATE TABLE `temp_propietarios` (
  `id` int(11) NOT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `rif` varchar(255) DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `apellido` text DEFAULT NULL,
  `telef` varchar(255) DEFAULT NULL,
  `dir_hab` varchar(255) DEFAULT NULL,
  `telef_hab` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_puertas`
--

CREATE TABLE `temp_puertas` (
  `id` int(11) NOT NULL,
  `entamborada_fina` text DEFAULT NULL,
  `ent_econo` text DEFAULT NULL,
  `madera_cepi` text DEFAULT NULL,
  `hierro` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_servicios_inmue`
--

CREATE TABLE `temp_servicios_inmue` (
  `id` int(11) NOT NULL,
  `acued` text DEFAULT NULL,
  `acuedRural` text DEFAULT NULL,
  `aguasSubter` text DEFAULT NULL,
  `aguasServ` text DEFAULT NULL,
  `pavimentoFlex` text DEFAULT NULL,
  `pavimentoRig` text DEFAULT NULL,
  `viaEngran` text DEFAULT NULL,
  `acera` text DEFAULT NULL,
  `alumbradoPub` text DEFAULT NULL,
  `aseo` text DEFAULT NULL,
  `transportePublic` text DEFAULT NULL,
  `pozoSept` text DEFAULT NULL,
  `electriResi` text DEFAULT NULL,
  `electriIndus` text DEFAULT NULL,
  `lineaTelef` text DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2048 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_temp`
--

CREATE TABLE `user_temp` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `temp_ambientes` int(11) DEFAULT NULL,
  `temp_caraconst` int(11) DEFAULT NULL,
  `temp_carainmue` int(11) DEFAULT NULL,
  `temp_complementos` int(11) DEFAULT NULL,
  `temp_datos_protocolizacion` int(11) DEFAULT NULL,
  `temp_expediente` int(11) DEFAULT NULL,
  `temp_factura` int(11) DEFAULT NULL,
  `temp_inmueble` int(11) DEFAULT NULL,
  `temp_linderos_documento` int(11) DEFAULT NULL,
  `temp_linderos_general` int(11) DEFAULT NULL,
  `temp_linderos_posible_venta` int(11) DEFAULT NULL,
  `temp_piezas_sanitarias` int(11) DEFAULT NULL,
  `temp_propietarios` int(11) DEFAULT NULL,
  `temp_puertas` int(11) DEFAULT NULL,
  `temp_servicios_inmue` int(11) DEFAULT NULL,
  `temp_estado_conservacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `apellido` text DEFAULT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telef` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambientes`
--
ALTER TABLE `ambientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `caracteristicas_construccion`
--
ALTER TABLE `caracteristicas_construccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carc_inmueble`
--
ALTER TABLE `carc_inmueble`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cod_catastral`
--
ALTER TABLE `cod_catastral`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `constancias`
--
ALTER TABLE `constancias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_redactor` (`fk_redactor`);

--
-- Indices de la tabla `datos_protocolizacion`
--
ALTER TABLE `datos_protocolizacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_conservacion`
--
ALTER TABLE `estado_conservacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_inmueble` (`fk_inmueble`),
  ADD KEY `FK_usuario` (`fk_usuario`),
  ADD KEY `FK_prop` (`fk_propietario`);

--
-- Indices de la tabla `expempadro`
--
ALTER TABLE `expempadro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_user`
--
ALTER TABLE `historial_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user` (`fk_user`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_carac_inmueble` (`fk_carac_inmuebles`),
  ADD KEY `FK_lind_documento` (`fk_lind_documento`),
  ADD KEY `FK_lind_general` (`fk_lind_general`),
  ADD KEY `FK_lindpos_venta` (`fk_lind_pos_venta`),
  ADD KEY `FK_protocolizacion` (`fk_protocolizacion`),
  ADD KEY `FK_servicios_inmue` (`fk_servicios`),
  ADD KEY `FK_carac_construc` (`fk_carac_construccion`);

--
-- Indices de la tabla `linderos_documento`
--
ALTER TABLE `linderos_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `linderos_general`
--
ALTER TABLE `linderos_general`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `linderos_posible_venta`
--
ALTER TABLE `linderos_posible_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `multa`
--
ALTER TABLE `multa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `piezas_sanitarias`
--
ALTER TABLE `piezas_sanitarias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puertas`
--
ALTER TABLE `puertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recaudacion`
--
ALTER TABLE `recaudacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios_inmue`
--
ALTER TABLE `servicios_inmue`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_ambientes`
--
ALTER TABLE `temp_ambientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_caraconst`
--
ALTER TABLE `temp_caraconst`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_carainmue`
--
ALTER TABLE `temp_carainmue`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_complementos`
--
ALTER TABLE `temp_complementos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_datos_protocolizacion`
--
ALTER TABLE `temp_datos_protocolizacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_estado_conservacion`
--
ALTER TABLE `temp_estado_conservacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_expediente`
--
ALTER TABLE `temp_expediente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_factura`
--
ALTER TABLE `temp_factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_inmueble`
--
ALTER TABLE `temp_inmueble`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_linderos_documento`
--
ALTER TABLE `temp_linderos_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_linderos_general`
--
ALTER TABLE `temp_linderos_general`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_linderos_posible_venta`
--
ALTER TABLE `temp_linderos_posible_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_piezas_sanitarias`
--
ALTER TABLE `temp_piezas_sanitarias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_propietarios`
--
ALTER TABLE `temp_propietarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_puertas`
--
ALTER TABLE `temp_puertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_servicios_inmue`
--
ALTER TABLE `temp_servicios_inmue`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_temp`
--
ALTER TABLE `user_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambientes`
--
ALTER TABLE `ambientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caracteristicas_construccion`
--
ALTER TABLE `caracteristicas_construccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carc_inmueble`
--
ALTER TABLE `carc_inmueble`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cod_catastral`
--
ALTER TABLE `cod_catastral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `constancias`
--
ALTER TABLE `constancias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_protocolizacion`
--
ALTER TABLE `datos_protocolizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_conservacion`
--
ALTER TABLE `estado_conservacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `expempadro`
--
ALTER TABLE `expempadro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_user`
--
ALTER TABLE `historial_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `linderos_documento`
--
ALTER TABLE `linderos_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `linderos_general`
--
ALTER TABLE `linderos_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `linderos_posible_venta`
--
ALTER TABLE `linderos_posible_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `multa`
--
ALTER TABLE `multa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `piezas_sanitarias`
--
ALTER TABLE `piezas_sanitarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puertas`
--
ALTER TABLE `puertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recaudacion`
--
ALTER TABLE `recaudacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios_inmue`
--
ALTER TABLE `servicios_inmue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_ambientes`
--
ALTER TABLE `temp_ambientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_caraconst`
--
ALTER TABLE `temp_caraconst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_carainmue`
--
ALTER TABLE `temp_carainmue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_complementos`
--
ALTER TABLE `temp_complementos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_datos_protocolizacion`
--
ALTER TABLE `temp_datos_protocolizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_estado_conservacion`
--
ALTER TABLE `temp_estado_conservacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_expediente`
--
ALTER TABLE `temp_expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_factura`
--
ALTER TABLE `temp_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_inmueble`
--
ALTER TABLE `temp_inmueble`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_linderos_documento`
--
ALTER TABLE `temp_linderos_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_linderos_general`
--
ALTER TABLE `temp_linderos_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_linderos_posible_venta`
--
ALTER TABLE `temp_linderos_posible_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_piezas_sanitarias`
--
ALTER TABLE `temp_piezas_sanitarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_propietarios`
--
ALTER TABLE `temp_propietarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_puertas`
--
ALTER TABLE `temp_puertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_servicios_inmue`
--
ALTER TABLE `temp_servicios_inmue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_temp`
--
ALTER TABLE `user_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `constancias`
--
ALTER TABLE `constancias`
  ADD CONSTRAINT `FK_redactor` FOREIGN KEY (`fk_redactor`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `FK_inmueble` FOREIGN KEY (`fk_inmueble`) REFERENCES `inmueble` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_prop` FOREIGN KEY (`fk_propietario`) REFERENCES `propietarios` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historial_user`
--
ALTER TABLE `historial_user`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`fk_user`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `FK_carac_construc` FOREIGN KEY (`fk_carac_construccion`) REFERENCES `caracteristicas_construccion` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_carac_inmueble` FOREIGN KEY (`fk_carac_inmuebles`) REFERENCES `carc_inmueble` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_lind_documento` FOREIGN KEY (`fk_lind_documento`) REFERENCES `linderos_documento` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_lind_general` FOREIGN KEY (`fk_lind_general`) REFERENCES `linderos_general` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_lindpos_venta` FOREIGN KEY (`fk_lind_pos_venta`) REFERENCES `linderos_posible_venta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_protocolizacion` FOREIGN KEY (`fk_protocolizacion`) REFERENCES `datos_protocolizacion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_servicios_inmue` FOREIGN KEY (`fk_servicios`) REFERENCES `servicios_inmue` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
