-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2018 a las 17:38:36
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros_referencia`
--

CREATE TABLE `centros_referencia` (
  `codigo` varchar(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `distrito` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `centros_referencia`
--

INSERT INTO `centros_referencia` (`codigo`, `nombre`, `distrito`) VALUES
('666', '22', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controles_bilateral`
--

CREATE TABLE `controles_bilateral` (
  `codigobilateral` int(11) NOT NULL,
  `fechabilateral` date NOT NULL,
  `descripcionbilateral` varchar(200) NOT NULL,
  `codigopaciente` int(11) NOT NULL,
  `codigocontrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `controles_bilateral`
--

INSERT INTO `controles_bilateral` (`codigobilateral`, `fechabilateral`, `descripcionbilateral`, `codigopaciente`, `codigocontrol`) VALUES
(4, '2018-12-22', 'sadasdsa', 66666666, 1),
(5, '2018-12-15', 'sdaasdas', 66666666, 1),
(6, '2018-12-05', 'nuevo control ', 66666666, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controles_pap_ivaa`
--

CREATE TABLE `controles_pap_ivaa` (
  `codigodetalle` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `idcontrol` int(11) NOT NULL,
  `fechacontrol` date NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `controles_pap_ivaa`
--

INSERT INTO `controles_pap_ivaa` (`codigodetalle`, `idpaciente`, `idcontrol`, `fechacontrol`, `descripcion`) VALUES
(1, 77777777, 1, '2018-12-22', 'dasdas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_mamografia`
--

CREATE TABLE `control_mamografia` (
  `idcontrol_mamografia` int(11) NOT NULL,
  `nombremamografia` varchar(100) NOT NULL,
  `codigoreferenciamamografia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_mamografia`
--

INSERT INTO `control_mamografia` (`idcontrol_mamografia`, `nombremamografia`, `codigoreferenciamamografia`) VALUES
(1, 'BI-RADS 0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_pap_iva`
--

CREATE TABLE `control_pap_iva` (
  `idcontro_pap_iva` int(11) NOT NULL,
  `nombreexamen` varchar(100) NOT NULL,
  `codigoseguimientopapivaa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_pap_iva`
--

INSERT INTO `control_pap_iva` (`idcontro_pap_iva`, `nombreexamen`, `codigoseguimientopapivaa`) VALUES
(1, 'ADASD', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecografia`
--

CREATE TABLE `ecografia` (
  `idecografia` int(11) NOT NULL,
  `fechaecografia` date DEFAULT NULL,
  `resultado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ecografia`
--

INSERT INTO `ecografia` (`idecografia`, `fechaecografia`, `resultado`) VALUES
(1, '2018-12-19', 'BI-RADS 0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

CREATE TABLE `establecimiento` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `provincia` varchar(60) NOT NULL,
  `distrito` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `establecimiento`
--

INSERT INTO `establecimiento` (`codigo`, `nombre`, `provincia`, `distrito`) VALUES
(1234, 'ASDFASDSA', 'TRUJILLO', 'DASDASD'),
(5195, 'HOSPITAL REGIONAL DE TRUJILLO', 'TRUJILLO', 'TRUJILLO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_ecm`
--

CREATE TABLE `examen_ecm` (
  `id` int(11) NOT NULL,
  `annio` int(4) NOT NULL,
  `fecha_examen` date NOT NULL,
  `centro_origen` varchar(40) NOT NULL,
  `diagnostico` varchar(100) NOT NULL,
  `descripcion_diagnostico` varchar(100) NOT NULL,
  `referenciar` varchar(2) NOT NULL,
  `centro_referencia` varchar(60) DEFAULT NULL,
  `paciente_dni` int(8) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `examen_ecm`
--

INSERT INTO `examen_ecm` (`id`, `annio`, `fecha_examen`, `centro_origen`, `diagnostico`, `descripcion_diagnostico`, `referenciar`, `centro_referencia`, `paciente_dni`, `usuario_id`) VALUES
(3, 2018, '2018-12-21', 'HOSPITAL REGIONAL DE TRUJILLO ', 'ANORMAL NO TUMORAL', 'SADASDAS', 'SI', '22 ', 99999999, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `dni` int(8) NOT NULL,
  `nombres_apellidos` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(2) NOT NULL,
  `direccion` varchar(90) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `telefono2` varchar(20) NOT NULL,
  `grupo_familiar` varchar(45) DEFAULT NULL,
  `historiaclinica` varchar(30) NOT NULL,
  `sis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`dni`, `nombres_apellidos`, `fecha_nacimiento`, `edad`, `direccion`, `telefono`, `telefono2`, `grupo_familiar`, `historiaclinica`, `sis`) VALUES
(11111111, '1', '2018-12-08', 0, '111', '11', '11', '111', '11', 'ESSALUD'),
(33333333, 'GRAUS', '2018-12-01', 0, 'ASDAS', 'ASDAS', 'ADSA', '55555555SA', 'ASFASD', 'ESSALUD'),
(44444444, 'SDDFAS', '2018-12-08', 0, 'ASFAS', 'fasf', 'asfas', 'fas', 'fas', ''),
(45454545, '45454545', '2018-11-29', 0, '', '4545', '454', '', '', 'SIS'),
(55555555, '555555555', '2018-12-15', 0, '555', '5', '55', '55555555', '5555', 'ESSALUD'),
(66666666, 'MARIA TERESA', '2016-01-01', 0, 'SDAS', 'asdasd', 'DSADSA', 'ASDAS', 'DADASD', 'ESSALUD'),
(71234567, 'JUANITA GONZALES ', '2018-12-31', 0, 'TRUJILLO', '5456456', '55', '564654', '54564', 'NO TIENE'),
(77777777, 'JUANITA', '2014-03-01', 0, 'ASDASD', 'SAFASD', 'ASDAS', 'DASDAS', 'ASDASDAS', 'SIS'),
(88888888, 'ADASD', '2018-12-08', 0, 'DASDA', 'ASDAS', 'ASDAS', 'DSADS', 'ASDAS', 'ESSALUD'),
(99999999, '99999999', '2015-02-02', 0, 'DASD', 'ADASD', 'ASDAS', 'ASDAS', 'ASDASD', 'ESSALUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia_ecm`
--

CREATE TABLE `referencia_ecm` (
  `id` int(11) NOT NULL,
  `fecha_atencion` date NOT NULL,
  `hacer_baf` varchar(2) NOT NULL,
  `fecha_examen_ref` date DEFAULT NULL,
  `especialista` varchar(45) DEFAULT NULL,
  `descripcion_muestra` varchar(100) DEFAULT NULL,
  `numero_registro` varchar(20) DEFAULT NULL,
  `fecha_resultado` date DEFAULT NULL,
  `patologo` varchar(45) DEFAULT NULL,
  `resultado` varchar(45) DEFAULT NULL,
  `descripcion_resultado` varchar(130) DEFAULT NULL,
  `examen_ecm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `referencia_ecm`
--

INSERT INTO `referencia_ecm` (`id`, `fecha_atencion`, `hacer_baf`, `fecha_examen_ref`, `especialista`, `descripcion_muestra`, `numero_registro`, `fecha_resultado`, `patologo`, `resultado`, `descripcion_resultado`, `examen_ecm_id`) VALUES
(2, '2018-12-01', 'SI', '2018-12-08', 'SADASD', 'ASDAS', '11', '2018-12-15', 'SAFASFAS', 'DASDAS', 'ASDSADA', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia_mamografia`
--

CREATE TABLE `referencia_mamografia` (
  `idreferencia` int(11) NOT NULL,
  `fechareferencia` date NOT NULL,
  `idecografia` int(11) NOT NULL,
  `idexamen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `referencia_mamografia`
--

INSERT INTO `referencia_mamografia` (`idreferencia`, `fechareferencia`, `idecografia`, `idexamen`) VALUES
(1, '2018-12-08', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia_papiva`
--

CREATE TABLE `referencia_papiva` (
  `idpapiva` int(11) NOT NULL,
  `fechareferencia` date NOT NULL,
  `procedimiento` varchar(100) NOT NULL,
  `resultadoprocedimiento` varchar(100) NOT NULL,
  `tratamiento` int(11) NOT NULL,
  `codigopapiva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `referencia_papiva`
--

INSERT INTO `referencia_papiva` (`idpapiva`, `fechareferencia`, `procedimiento`, `resultadoprocedimiento`, `tratamiento`, `codigopapiva`) VALUES
(1, '2018-12-14', 'ADASD', 'ASDAS', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_ecm`
--

CREATE TABLE `seguimiento_ecm` (
  `id` int(11) NOT NULL,
  `fecha_seg` date DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `referencia_ecm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguimiento_ecm`
--

INSERT INTO `seguimiento_ecm` (`id`, `fecha_seg`, `descripcion`, `referencia_ecm_id`) VALUES
(1, '2018-12-15', 'AAAA', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_mamografia`
--

CREATE TABLE `seguimiento_mamografia` (
  `idmamografia` int(11) NOT NULL,
  `nombreexamen` varchar(100) NOT NULL,
  `fechaexamen` date NOT NULL,
  `centroprocedencia` varchar(100) NOT NULL,
  `diagnostico` varchar(100) NOT NULL,
  `centroreferencia` varchar(50) NOT NULL,
  `referencia` varchar(2) NOT NULL,
  `dnipaciente` int(8) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguimiento_mamografia`
--

INSERT INTO `seguimiento_mamografia` (`idmamografia`, `nombreexamen`, `fechaexamen`, `centroprocedencia`, `diagnostico`, `centroreferencia`, `referencia`, `dnipaciente`, `idusuario`) VALUES
(4, 'MX. BILATERAL', '2018-12-21', 'HOSPITAL', 'BI-RADS V', '22 ', 'SI', 66666666, 3),
(5, 'MX. BILATERAL', '2018-12-13', 'HOSPITAL', 'BI-RADS VI', '22 ', 'SI', 99999999, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_pap_ivaa`
--

CREATE TABLE `seguimiento_pap_ivaa` (
  `codigoseguimientopapivaa` int(11) NOT NULL,
  `fechaexamen` date NOT NULL,
  `establecimientoreferencia` varchar(100) NOT NULL,
  `establecimientoatencion` varchar(100) NOT NULL,
  `responsable` int(11) NOT NULL,
  `resultados` varchar(50) NOT NULL,
  `referirvph` varchar(2) NOT NULL,
  `tipoexamen` varchar(50) NOT NULL,
  `codigopaciente` int(8) NOT NULL,
  `motivoreferencia` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguimiento_pap_ivaa`
--

INSERT INTO `seguimiento_pap_ivaa` (`codigoseguimientopapivaa`, `fechaexamen`, `establecimientoreferencia`, `establecimientoatencion`, `responsable`, `resultados`, `referirvph`, `tipoexamen`, `codigopaciente`, `motivoreferencia`) VALUES
(2, '2018-12-01', '22 ', 'HOSPITAL', 3, 'IVAA Negativa', 'SI', 'IVAA', 77777777, 'ASDASDAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usuario` int(8) NOT NULL,
  `password` varchar(300) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `celular` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `usuario`, `password`, `tipo`, `celular`) VALUES
(1, 'ESTALIN CAYETANO', 'stalyn797@gmail.com', 73657426, '18a3e9f0c7af6bec298f64d68001fb41ab8b61be', 'Coordinador', '943905055'),
(3, 'ALEX GRAUS GUZMAN', 'alexgraus2g@gmail.com', 74985963, '8bb222311fa2ac66e07138fc1969e15be7674ef5', 'Coordinador', NULL),
(6, '222222', '22', 22222258, 'f8014a85146fa9b25ef20398a8f860f31ee1b6d4', 'Administrador', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `centros_referencia`
--
ALTER TABLE `centros_referencia`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `controles_bilateral`
--
ALTER TABLE `controles_bilateral`
  ADD PRIMARY KEY (`codigobilateral`),
  ADD KEY `detalleControlFK` (`codigocontrol`);

--
-- Indices de la tabla `controles_pap_ivaa`
--
ALTER TABLE `controles_pap_ivaa`
  ADD PRIMARY KEY (`codigodetalle`),
  ADD KEY `controlesControlFK` (`idcontrol`);

--
-- Indices de la tabla `control_mamografia`
--
ALTER TABLE `control_mamografia`
  ADD PRIMARY KEY (`idcontrol_mamografia`),
  ADD KEY `controlReferenciaFK` (`codigoreferenciamamografia`);

--
-- Indices de la tabla `control_pap_iva`
--
ALTER TABLE `control_pap_iva`
  ADD PRIMARY KEY (`idcontro_pap_iva`),
  ADD KEY `seguimientoControlFK` (`codigoseguimientopapivaa`);

--
-- Indices de la tabla `ecografia`
--
ALTER TABLE `ecografia`
  ADD PRIMARY KEY (`idecografia`);

--
-- Indices de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `examen_ecm`
--
ALTER TABLE `examen_ecm`
  ADD PRIMARY KEY (`id`,`paciente_dni`,`usuario_id`),
  ADD KEY `fk_examen_ecm_paciente1` (`paciente_dni`),
  ADD KEY `fk_examen_ecm_usuario1` (`usuario_id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `referencia_ecm`
--
ALTER TABLE `referencia_ecm`
  ADD PRIMARY KEY (`id`,`examen_ecm_id`),
  ADD KEY `fk_referencia_ecm_examen_ecm1` (`examen_ecm_id`);

--
-- Indices de la tabla `referencia_mamografia`
--
ALTER TABLE `referencia_mamografia`
  ADD PRIMARY KEY (`idreferencia`),
  ADD KEY `examenReferenciaFK` (`idexamen`),
  ADD KEY `ecografiaReferenciaFK` (`idecografia`);

--
-- Indices de la tabla `referencia_papiva`
--
ALTER TABLE `referencia_papiva`
  ADD PRIMARY KEY (`idpapiva`),
  ADD KEY `referenciaPapFK` (`codigopapiva`);

--
-- Indices de la tabla `seguimiento_ecm`
--
ALTER TABLE `seguimiento_ecm`
  ADD PRIMARY KEY (`id`,`referencia_ecm_id`),
  ADD KEY `fk_seguimiento_ecm_referencia_ecm1` (`referencia_ecm_id`);

--
-- Indices de la tabla `seguimiento_mamografia`
--
ALTER TABLE `seguimiento_mamografia`
  ADD PRIMARY KEY (`idmamografia`),
  ADD KEY `mamografiaPacienteFK` (`dnipaciente`),
  ADD KEY `mamografiaUsuarioFK` (`idusuario`);

--
-- Indices de la tabla `seguimiento_pap_ivaa`
--
ALTER TABLE `seguimiento_pap_ivaa`
  ADD PRIMARY KEY (`codigoseguimientopapivaa`),
  ADD KEY `atencionPacienteFK` (`codigopaciente`),
  ADD KEY `atencionUsuarioFK` (`responsable`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `controles_bilateral`
--
ALTER TABLE `controles_bilateral`
  MODIFY `codigobilateral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `controles_pap_ivaa`
--
ALTER TABLE `controles_pap_ivaa`
  MODIFY `codigodetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `control_mamografia`
--
ALTER TABLE `control_mamografia`
  MODIFY `idcontrol_mamografia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `control_pap_iva`
--
ALTER TABLE `control_pap_iva`
  MODIFY `idcontro_pap_iva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ecografia`
--
ALTER TABLE `ecografia`
  MODIFY `idecografia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `examen_ecm`
--
ALTER TABLE `examen_ecm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `referencia_ecm`
--
ALTER TABLE `referencia_ecm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `referencia_mamografia`
--
ALTER TABLE `referencia_mamografia`
  MODIFY `idreferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `referencia_papiva`
--
ALTER TABLE `referencia_papiva`
  MODIFY `idpapiva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `seguimiento_ecm`
--
ALTER TABLE `seguimiento_ecm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `seguimiento_mamografia`
--
ALTER TABLE `seguimiento_mamografia`
  MODIFY `idmamografia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `seguimiento_pap_ivaa`
--
ALTER TABLE `seguimiento_pap_ivaa`
  MODIFY `codigoseguimientopapivaa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `controles_bilateral`
--
ALTER TABLE `controles_bilateral`
  ADD CONSTRAINT `detalleControlFK` FOREIGN KEY (`codigocontrol`) REFERENCES `control_mamografia` (`idcontrol_mamografia`);

--
-- Filtros para la tabla `controles_pap_ivaa`
--
ALTER TABLE `controles_pap_ivaa`
  ADD CONSTRAINT `controlesControlFK` FOREIGN KEY (`idcontrol`) REFERENCES `control_pap_iva` (`idcontro_pap_iva`);

--
-- Filtros para la tabla `control_mamografia`
--
ALTER TABLE `control_mamografia`
  ADD CONSTRAINT `controlReferenciaFK` FOREIGN KEY (`codigoreferenciamamografia`) REFERENCES `referencia_mamografia` (`idreferencia`);

--
-- Filtros para la tabla `control_pap_iva`
--
ALTER TABLE `control_pap_iva`
  ADD CONSTRAINT `seguimientoControlFK` FOREIGN KEY (`codigoseguimientopapivaa`) REFERENCES `referencia_papiva` (`idpapiva`);

--
-- Filtros para la tabla `examen_ecm`
--
ALTER TABLE `examen_ecm`
  ADD CONSTRAINT `fk_examen_ecm_paciente1` FOREIGN KEY (`paciente_dni`) REFERENCES `paciente` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_examen_ecm_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `referencia_ecm`
--
ALTER TABLE `referencia_ecm`
  ADD CONSTRAINT `fk_referencia_ecm_examen_ecm1` FOREIGN KEY (`examen_ecm_id`) REFERENCES `examen_ecm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `referencia_mamografia`
--
ALTER TABLE `referencia_mamografia`
  ADD CONSTRAINT `ecografiaReferenciaFK` FOREIGN KEY (`idecografia`) REFERENCES `ecografia` (`idecografia`),
  ADD CONSTRAINT `examenReferenciaFK` FOREIGN KEY (`idexamen`) REFERENCES `seguimiento_mamografia` (`idmamografia`);

--
-- Filtros para la tabla `referencia_papiva`
--
ALTER TABLE `referencia_papiva`
  ADD CONSTRAINT `referenciaPapFK` FOREIGN KEY (`codigopapiva`) REFERENCES `seguimiento_pap_ivaa` (`codigoseguimientopapivaa`);

--
-- Filtros para la tabla `seguimiento_ecm`
--
ALTER TABLE `seguimiento_ecm`
  ADD CONSTRAINT `seguimiento_ecm_ibfk_1` FOREIGN KEY (`referencia_ecm_id`) REFERENCES `referencia_ecm` (`id`);

--
-- Filtros para la tabla `seguimiento_mamografia`
--
ALTER TABLE `seguimiento_mamografia`
  ADD CONSTRAINT `mamografiaPacienteFK` FOREIGN KEY (`dnipaciente`) REFERENCES `paciente` (`dni`),
  ADD CONSTRAINT `mamografiaUsuarioFK` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `seguimiento_pap_ivaa`
--
ALTER TABLE `seguimiento_pap_ivaa`
  ADD CONSTRAINT `atencionPacienteFK` FOREIGN KEY (`codigopaciente`) REFERENCES `paciente` (`dni`),
  ADD CONSTRAINT `atencionUsuarioFK` FOREIGN KEY (`responsable`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
