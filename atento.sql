-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2013 a las 21:44:41
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `atento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_base_equipo`
--

CREATE TABLE IF NOT EXISTS `tbl_base_equipo` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Marca` varchar(100) DEFAULT NULL,
  `Modelo` varchar(100) DEFAULT NULL,
  `Estado` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `tbl_base_equipo`
--

INSERT INTO `tbl_base_equipo` (`Id`, `Marca`, `Modelo`, `Estado`) VALUES
(1, 'UBEE', 'DVW2110', 'ACTIVO'),
(2, 'UBEE', 'DVW2100', 'ACTIVO'),
(3, 'UBEE', 'DDW2608', 'ACTIVO'),
(4, 'THOMSON', 'DWG849', 'ACTIVO'),
(5, 'THOMSON', 'DCW725', 'ACTIVO'),
(6, 'TECHNICOLOR', 'TC7110.02', 'ACTIVO'),
(7, 'CISCO', 'DPC2425', 'ACTIVO'),
(8, 'CISCO', 'DPC2420', 'ACTIVO'),
(9, 'CISCO', 'DPC2420R2', 'ACTIVO'),
(10, 'MOTOROLA', 'SBG900', 'ACTIVO'),
(11, 'MOTOROLA', 'SBG901', 'ACTIVO'),
(12, 'MOTOROLA', 'SBV5120', 'ACTIVO'),
(13, 'SCIENTIFIC ATLANTA', 'sa1', 'ACTIVO'),
(14, 'SCIENTIFIC ATLANTA', 'sa2', 'ACTIVO'),
(15, 'ARRIS', '501', 'ACTIVO'),
(16, 'ARRIS', '502', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_base_firmware`
--

CREATE TABLE IF NOT EXISTS `tbl_base_firmware` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Marca` varchar(100) DEFAULT NULL,
  `Firmware` varchar(255) DEFAULT NULL,
  `Estado` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `tbl_base_firmware`
--

INSERT INTO `tbl_base_firmware` (`Id`, `Marca`, `Firmware`, `Estado`) VALUES
(1, 'UBEE', '6.28.3000', 'ACTIVO'),
(2, 'UBEE', '6.28.2011', 'ACTIVO'),
(3, 'UBEE', '6.28.1020', 'ACTIVO'),
(4, 'UBEE', '5.117.1007', 'ACTIVO'),
(5, 'THOMSON', 'STC0.01.11', 'ACTIVO'),
(6, 'THOMSON', 'ST5A.31.13', 'ACTIVO'),
(7, 'THOMSON', 'STC0.01.07', 'ACTIVO'),
(8, 'TECHNICOLOR', 'STD3.31.02', 'ACTIVO'),
(9, 'TECHNICOLOR', 'STD3.31.11', 'ACTIVO'),
(10, 'CISCO', '111014as', 'ACTIVO'),
(11, 'CISCO', '120514as-v6', 'ACTIVO'),
(12, 'CISCO', '130311as-v6', 'ACTIVO'),
(13, 'CISCO', '120120as-v6', 'ACTIVO'),
(14, 'MOTOROLA ', 'SCM00-NOSH', 'ACTIVO'),
(15, 'MOTOROLA', 'SCM-00-SHPC', 'ACTIVO'),
(16, 'SCIENTIFIC ATLANTA', 'No Existe', 'ACTIVO'),
(17, 'ARRIS', 'No Existe', 'ACTIVO'),
(18, 'UBEE', '6.28.4002', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_base_general`
--

CREATE TABLE IF NOT EXISTS `tbl_base_general` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Asesor` varchar(100) DEFAULT NULL,
  `Usuario` varchar(100) DEFAULT NULL,
  `Tipo_Reporte` varchar(100) DEFAULT NULL,
  `Cuenta` int(10) DEFAULT NULL,
  `MAC` varchar(100) DEFAULT NULL,
  `Marca` varchar(100) DEFAULT NULL,
  `Modelo` varchar(100) DEFAULT NULL,
  `Firmware` varchar(100) DEFAULT NULL,
  `Sintoma` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `Observaciones` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `Seguimiento` varchar(11) DEFAULT NULL,
  `Softswitch` varchar(50) DEFAULT NULL,
  `Nodo` varchar(8) DEFAULT NULL,
  `Paquete` varchar(100) DEFAULT NULL,
  `Aviso` bigint(20) DEFAULT NULL,
  `CMTS` varchar(100) DEFAULT NULL COMMENT 'CMTS',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_base_paquete_tv`
--

CREATE TABLE IF NOT EXISTS `tbl_base_paquete_tv` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Paquete` varchar(255) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `tbl_base_paquete_tv`
--

INSERT INTO `tbl_base_paquete_tv` (`Id`, `Paquete`, `Modelo`) VALUES
(1, 'TV BASICA', 'No Existe'),
(2, 'HD', 'No Existe'),
(3, 'HBO', 'No Existe'),
(4, 'MOVIE CITY', 'No Existe'),
(5, 'TV DIGITAL AVANZADA', 'DBV CSH'),
(6, 'TV DIGITAL AVANZADA', 'DBV WHI'),
(7, 'TV DIGITAL AVANZADA', 'DBV SKY'),
(8, 'TV DIGITAL AVANZADA', 'HBV CHD'),
(9, 'TV DIGITAL AVANZADA', 'No Existe'),
(10, 'TV DIGITAL BASICA', 'DBV CSH'),
(11, 'TV DIGITAL BASICA', 'DBV WHI'),
(12, 'TV DIGITAL BASICA', 'DBV SKY'),
(13, 'TV DIGITAL BASICA', 'HBV CHD'),
(14, 'TV DIGITAL BASICA', 'No Existe'),
(15, 'TV AVANZADA', 'DDG DC7'),
(16, 'TV AVANZADA', 'DDG DCI'),
(17, 'TV AVANZADA', 'DDG DX4'),
(18, 'TV AVANZADA', 'DDG DX7'),
(19, 'TV AVANZADA', 'DDG DX2'),
(20, 'TV AVANZADA', 'DDG DCX'),
(21, 'TV AVANZADA', 'No Existe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_base_sintoma`
--

CREATE TABLE IF NOT EXISTS `tbl_base_sintoma` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Tipo_Reporte` varchar(100) DEFAULT NULL,
  `Sintoma` varchar(255) DEFAULT NULL,
  `Estado` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

--
-- Volcado de datos para la tabla `tbl_base_sintoma`
--

INSERT INTO `tbl_base_sintoma` (`Id`, `Tipo_Reporte`, `Sintoma`, `Estado`) VALUES
(1, 'Internet', 'No Navega', 'ACTIVO'),
(2, 'Internet', 'Sin Ip en La WAN', 'ACTIVO'),
(3, 'Internet', 'No permite clave WEP', 'ACTIVO'),
(4, 'Internet', 'Potencia Ganancia', 'ACTIVO'),
(5, 'Internet', 'Leases Time ', 'ACTIVO'),
(6, 'Internet', 'Accesos LAN', 'ACTIVO'),
(7, 'Internet', 'Cisco se reinicia al ingresar llamada', 'ACTIVO'),
(8, 'Internet', 'Necesario reiniciar modem para navegar ', 'ACTIVO'),
(9, 'Internet', 'Fallas con los DNS', 'ACTIVO'),
(10, 'Internet', 'Modems con firewall activos', 'ACTIVO'),
(11, 'Internet', 'Youtube congelamiento de imagen ', 'ACTIVO'),
(12, 'Internet', 'No toma IP en la WAN', 'ACTIVO'),
(13, 'Internet', 'Lentitud', 'ACTIVO'),
(14, 'Internet', 'Todo bien y NO navega porWiFi falla DNS', 'ACTIVO'),
(15, 'Internet', 'No ingresa al admin ', 'ACTIVO'),
(16, 'Internet', 'Lentitud no permite ingresar el Dominio', 'ACTIVO'),
(17, 'Internet', 'No aparece la red WiFi', 'ACTIVO'),
(18, 'Internet', 'CISCO se reinicia cuando conecta a WiFi  ', 'ACTIVO'),
(19, 'Internet', 'No aparece opcion wifi en admin', 'ACTIVO'),
(20, 'Internet', 'Todo bien y no navega por solo wifi', 'ACTIVO'),
(21, 'Internet', 'Windows No puede conectarse a WLAN ', 'ACTIVO'),
(22, 'Internet', 'Navega sin clave wifi ', 'ACTIVO'),
(23, 'Internet', 'DNS fijos sobre el modem no navega', 'ACTIVO'),
(24, 'Internet', 'UBEE navega y se reincia', 'ACTIVO'),
(25, 'Internet', 'CISCO Sin 20 Accesos ', 'ACTIVO'),
(26, 'Internet', 'Modem pierde configuracion', 'ACTIVO'),
(27, 'Internet', 'Windows No puede conectarse a LAN', 'ACTIVO'),
(28, 'Internet', 'Lentitud de Aprovisionamiento', 'ACTIVO'),
(29, 'Telefonia', 'Error integrity', 'ACTIVO'),
(30, 'Telefonia', 'Softphone sin funcionalidades', 'ACTIVO'),
(31, 'Telefonia', 'Aprovisionamiento', 'ACTIVO'),
(32, 'Telefonia', 'Dexon', 'ACTIVO'),
(33, 'Telefonia', 'Circuitos ocupados', 'ACTIVO'),
(34, 'Telefonia', 'Dexon por duplicidad', 'ACTIVO'),
(35, 'Telefonia', 'No direcciona a Voice Mail', 'ACTIVO'),
(36, 'Telefonia', 'Falla cargar configuracion desde el servidor', 'ACTIVO'),
(37, 'Telefonia', 'Error 403', 'ACTIVO'),
(38, 'Telefonia', 'Falla en salida de llamadas', 'ACTIVO'),
(39, 'Telefonia', 'Otro Error', 'ACTIVO'),
(40, 'Television', 'Problemas de retorno red ATSC', 'ACTIVO'),
(41, 'Television', 'Canal V+TV señal/audio intermitente', 'ACTIVO'),
(42, 'Television', 'Adaptadores corriente con variacion Voltaje', 'ACTIVO'),
(43, 'Television', 'DVB HD error DPG', 'ACTIVO'),
(44, 'Television', 'Guia No concuerda', 'ACTIVO'),
(45, 'Television', 'No aparecen algunos canales', 'ACTIVO'),
(46, 'Television', 'Deco se queda cargando', 'ACTIVO'),
(47, 'Television', 'Deco con ruido', 'ACTIVO'),
(48, 'Television', 'Otro Error', 'ACTIVO'),
(50, 'Miclaro', 'Error 500', 'ACTIVO'),
(51, 'Miclaro', 'Descarga de McAfee', 'ACTIVO'),
(52, 'Miclaro', 'Descarga Telefono Virtual', 'ACTIVO'),
(53, 'Miclaro', 'Registro de Mi Claro', 'ACTIVO'),
(54, 'Miclaro', 'Registro de Claro Video', 'ACTIVO'),
(55, 'Miclaro', 'Solo se ve la sinopsis de la pelicula', 'ACTIVO'),
(56, 'Miclaro', 'No carga la opcion de servicios', 'ACTIVO'),
(57, 'Miclaro', 'Consultar Buzon Virtual', 'ACTIVO'),
(58, 'Miclaro', 'Eliminar registro de Mi Claro', 'ACTIVO'),
(59, 'Miclaro', 'Eliminar registro de Claro Video', 'ACTIVO'),
(60, 'Miclaro', 'No carga pagina de Claro', 'ACTIVO'),
(61, 'Miclaro', 'Otro Error', 'ACTIVO'),
(62, 'Masivos', 'Triple Play', 'ACTIVO'),
(63, 'Masivos', 'Internet', 'ACTIVO'),
(64, 'Masivos', 'Telefonia', 'ACTIVO'),
(65, 'Masivos', 'Television', 'ACTIVO'),
(66, 'Masivos', 'Internet y Telefonia', 'ACTIVO'),
(67, 'Masivos', 'Internet y Television', 'ACTIVO'),
(68, 'Masivos', 'Telefonia y Television', 'ACTIVO'),
(69, 'Lls', 'Sin señal', 'ACTIVO'),
(70, 'Lls', 'Intermitencia', 'ACTIVO'),
(71, 'Lls', 'Potencia ganancia', 'ACTIVO'),
(72, 'Lls', 'Modem no enciende', 'ACTIVO'),
(73, 'Lls', 'No le aparece la WLAN', 'ACTIVO'),
(74, 'Lls', 'No aparece opcion WiFi en admin', 'ACTIVO'),
(75, 'Lls', 'Windows No puede conectarse a LAN', 'ACTIVO'),
(76, 'Lls', 'Falla derivacion', 'ACTIVO'),
(77, 'Lls', 'Decos PVR con mal olor', 'ACTIVO'),
(78, 'Lls', 'Problemas de retorno red ATSC', 'ACTIVO'),
(79, 'Lls', 'No le aparecen algunos canales', 'ACTIVO'),
(80, 'Lls', 'Deco no enciende', 'ACTIVO'),
(81, 'Lls', 'Deco se queda cargando', 'ACTIVO'),
(82, 'Lls', 'Deco con ruido', 'ACTIVO'),
(83, 'Lls', 'Otro Error', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_base_softswitch`
--

CREATE TABLE IF NOT EXISTS `tbl_base_softswitch` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  `Estado` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_base_softswitch`
--

INSERT INTO `tbl_base_softswitch` (`Id`, `Nombre`, `Estado`) VALUES
(1, 'HIQCMS_TRI', 'ACTIVO'),
(2, 'HiQCMS_ORT', 'ACTIVO'),
(3, 'SAFARI', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_gestion_asesores`
--

CREATE TABLE IF NOT EXISTS `tbl_gestion_asesores` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(100) DEFAULT NULL,
  `Nombres` varchar(100) DEFAULT NULL,
  `Apellidos` varchar(100) DEFAULT NULL,
  `Cedula` varchar(50) DEFAULT NULL,
  `Estado` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_gestion_asesores`
--

INSERT INTO `tbl_gestion_asesores` (`Id`, `Usuario`, `Nombres`, `Apellidos`, `Cedula`, `Estado`) VALUES
(1, 'Fix', 'Fix', 'Fix', '123456789', 'ACTIVO'),
(2, 'Zyos', 'Zyos', 'Zyos', '23132132131', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_gestion_asesor_asignado`
--

CREATE TABLE IF NOT EXISTS `tbl_gestion_asesor_asignado` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Asesor` varchar(100) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Estado` varchar(8) DEFAULT 'INACTIVO',
  `Ubicacion` varchar(100) NOT NULL DEFAULT 'HALL' COMMENT 'Ubicación Usuario',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_gestion_asesor_asignado`
--

INSERT INTO `tbl_gestion_asesor_asignado` (`Id`, `Asesor`, `Usuario`, `Estado`, `Ubicacion`) VALUES
(1, 'Fix', 'Zyos', 'ACTIVO', 'HALL'),
(2, 'Zyos', 'Zyos', 'ACTIVO', 'HALL'),
(3, 'Zyos', 'Fix', 'ACTIVO', 'HALL'),
(4, 'Fix', 'Fix', 'ACTIVO', 'HALL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_gestion_seguimiento`
--

CREATE TABLE IF NOT EXISTS `tbl_gestion_seguimiento` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Fecha_Inicio` datetime NOT NULL,
  `Fecha_Fin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Registro` bigint(20) DEFAULT NULL,
  `Observaciones` text,
  `Usuario` varchar(100) NOT NULL COMMENT 'Usuario',
  `TipoReporte` varchar(50) NOT NULL COMMENT 'Tipo de Reporte',
  `Estado` varchar(8) NOT NULL DEFAULT 'INACTIVO' COMMENT 'Estado',
  PRIMARY KEY (`Id`),
  KEY `Usuario` (`Usuario`),
  KEY `TipoReporte` (`TipoReporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_gestion_seguimiento_notas`
--

CREATE TABLE IF NOT EXISTS `tbl_gestion_seguimiento_notas` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Id de Registro',
  `Registro` bigint(20) NOT NULL COMMENT 'Registro',
  `Notas` text NOT NULL COMMENT 'Notas de Observacion',
  `Fecha` date NOT NULL COMMENT 'Fecha',
  `Hora` time NOT NULL COMMENT 'Hora',
  `Usuario` varchar(50) NOT NULL COMMENT 'Usuario',
  PRIMARY KEY (`Id`),
  KEY `Registro` (`Registro`),
  KEY `Fecha` (`Fecha`,`Hora`),
  KEY `Usuario` (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sistema_permisos`
--

CREATE TABLE IF NOT EXISTS `tbl_sistema_permisos` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Error` varchar(100) DEFAULT 'true',
  `Central` varchar(5) NOT NULL DEFAULT 'false' COMMENT 'Sitio Central',
  `AsignacionAsesores` varchar(5) NOT NULL DEFAULT 'false' COMMENT 'Asignación de Asesores',
  `BaseGestion` varchar(5) NOT NULL DEFAULT 'false' COMMENT 'Base de Gestion',
  `Widgets` varchar(5) NOT NULL DEFAULT 'false' COMMENT 'Widgets de Aplicación',
  `Ajax` varchar(5) NOT NULL DEFAULT 'false' COMMENT 'Procesos Ajax',
  `Ajax_AdminUsuarios` varchar(5) NOT NULL DEFAULT 'false' COMMENT 'Procedimiento Ajax de Administrador de Usuarios',
  `Ajax_Consultas` varchar(5) NOT NULL DEFAULT 'false' COMMENT 'Procedimiento Ajax de Consultas',
  `Seguimiento` varchar(5) NOT NULL DEFAULT 'false' COMMENT 'Observar Seguimiento Usuario',
  `Consultas` varchar(5) NOT NULL DEFAULT 'false' COMMENT 'Busqueda y Consultas de Registros',
  `AdminUsuarios` varchar(5) NOT NULL DEFAULT 'false' COMMENT 'Administracion de Usuarios',
  PRIMARY KEY (`Id`),
  KEY `Consultas` (`Consultas`),
  KEY `Ajax_Consultas` (`Ajax_Consultas`),
  KEY `AdminUsuarios` (`AdminUsuarios`),
  KEY `Ajax_AdminUsuarios` (`Ajax_AdminUsuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_sistema_permisos`
--

INSERT INTO `tbl_sistema_permisos` (`Id`, `Nombre`, `Error`, `Central`, `AsignacionAsesores`, `BaseGestion`, `Widgets`, `Ajax`, `Ajax_AdminUsuarios`, `Ajax_Consultas`, `Seguimiento`, `Consultas`, `AdminUsuarios`) VALUES
(1, 'Developer Administration', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sistema_usuarios`
--

CREATE TABLE IF NOT EXISTS `tbl_sistema_usuarios` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Nombres` varchar(255) DEFAULT NULL,
  `Apellidos` varchar(255) DEFAULT NULL,
  `Cedula` varchar(255) NOT NULL COMMENT 'Cedula',
  `Cargo` varchar(50) DEFAULT NULL,
  `Permisos` int(2) DEFAULT NULL,
  `Estado` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Cedula` (`Cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_sistema_usuarios`
--

INSERT INTO `tbl_sistema_usuarios` (`Id`, `Usuario`, `Password`, `Nombres`, `Apellidos`, `Cedula`, `Cargo`, `Permisos`, `Estado`) VALUES
(1, 'Zyos', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Administrador', 'Sistema', '123', 'WebDeveloper', 1, 'ACTIVO'),
(2, 'Fix', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Alejo', 'Montenegro', '123', 'Administrador', 1, 'ACTIVO'),
(3, 'Prueba', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Usuario', 'Prueba', '123', 'Experto', 1, 'ACTIVO');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
