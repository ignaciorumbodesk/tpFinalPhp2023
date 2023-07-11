-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-07-2023 a las 04:18:21
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `instituto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `tel` bigint NOT NULL,
  `dni` bigint NOT NULL,
  `fechaNac` date NOT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  `fotoPerfil` blob,
  `pasaporte` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `email`, `tel`, `dni`, `fechaNac`, `observaciones`, `fotoPerfil`, `pasaporte`) VALUES
(1, 'Pedro', 'Caceres', 'pedrocaceres@gmail.com', 2235538382, 15606481, '1973-01-17', NULL, NULL, NULL),
(2, 'Pedro', 'Suarez', 'pjsuarez@yahoo.com', 3885873714, 32236194, '1985-11-20', NULL, NULL, NULL),
(3, 'Juan', 'Caceres', '', 0, 0, '0000-00-00', NULL, NULL, NULL),
(4, 'Laura', 'Caceres', '', 0, 0, '0000-00-00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnosmaterias`
--

DROP TABLE IF EXISTS `alumnosmaterias`;
CREATE TABLE IF NOT EXISTS `alumnosmaterias` (
  `idAlumno` int NOT NULL,
  `idMaterias` int NOT NULL,
  KEY `idAlumno` (`idAlumno`),
  KEY `idMaterias` (`idMaterias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `alumnosmaterias`
--

INSERT INTO `alumnosmaterias` (`idAlumno`, `idMaterias`) VALUES
(1, 1),
(1, 3),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE IF NOT EXISTS `direccion` (
  `id` int NOT NULL,
  `calle` varchar(50) COLLATE utf8mb4_es_trad_0900_ai_ci NOT NULL,
  `numero` int NOT NULL,
  `piso` int DEFAULT NULL,
  `dpto` varchar(10) COLLATE utf8mb4_es_trad_0900_ai_ci DEFAULT NULL,
  `localidad` varchar(50) COLLATE utf8mb4_es_trad_0900_ai_ci NOT NULL,
  `provincia` varchar(50) COLLATE utf8mb4_es_trad_0900_ai_ci NOT NULL,
  `codPostal` varchar(50) COLLATE utf8mb4_es_trad_0900_ai_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_es_trad_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `idProfesor` int NOT NULL,
  `idTutor` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProfesor` (`idProfesor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`, `idProfesor`, `idTutor`) VALUES
(1, 'Matemática', 1, 2),
(2, 'Química', 2, 0),
(3, 'Literatura', 1, 1),
(4, 'Matemática 2', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE IF NOT EXISTS `profesores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `apellido`) VALUES
(1, 'Juan', 'Somoza'),
(2, 'Lorena', 'Somoza'),
(3, 'Juan', 'Ruperez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

DROP TABLE IF EXISTS `tutores`;
CREATE TABLE IF NOT EXISTS `tutores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_usuario_user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `pass`) VALUES
(1, 'jperez@gmail.com', '1Aaaaaaa');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnosmaterias`
--
ALTER TABLE `alumnosmaterias`
  ADD CONSTRAINT `alumnosmaterias_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `alumnosmaterias_ibfk_2` FOREIGN KEY (`idMaterias`) REFERENCES `materias` (`id`);

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
