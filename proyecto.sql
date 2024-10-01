-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2023 a las 21:43:04
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--
CREATE DATABASE IF NOT EXISTS `proyecto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciones_ofertas`
--

CREATE TABLE `aplicaciones_ofertas` (
  `id` int(11) NOT NULL,
  `id_ofertas` int(11) NOT NULL,
  `nombre_usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre_creador` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aplicaciones_ofertas`
--

INSERT INTO `aplicaciones_ofertas` (`id`, `id_ofertas`, `nombre_usuario`, `nombre_creador`) VALUES
(2, 22, 'leoemplea', 'leoemplea'),
(3, 27, 'sebasusua', 'leoemplea'),
(4, 32, 'sebasusua', 'leoemplea'),
(11, 22, 'sebasusua', 'leoemplea'),
(15, 11, 'sebasusua', 'leoemplea'),
(16, 11, 'sebasusua', 'leoemplea'),
(17, 11, 'sebasusua', 'leoemplea'),
(18, 22, 'sebasusua', 'leoemplea'),
(19, 11, 'sebasusua', 'leoemplea'),
(20, 11, 'sebasusua', 'justin22'),
(21, 11, 'sebasusua', 'justin22'),
(22, 11, 'sebasusua', 'leoemplea'),
(23, 11, 'sebasusua', 'justin22'),
(24, 11, 'sebasusua', 'justin22'),
(25, 11, 'sebasusua', 'justin22'),
(26, 33, 'sebasusua', 'justin22'),
(27, 11, 'sebasusua', 'justin22'),
(28, 44, 'sebasusua', 'justin22'),
(29, 11, 'sebasusua', 'justin22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad_residencia`
--

CREATE TABLE `ciudad_residencia` (
  `id` int(11) NOT NULL,
  `ciudad_residencia` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad_residencia`
--

INSERT INTO `ciudad_residencia` (`id`, `ciudad_residencia`) VALUES
(1, 'bogota'),
(2, 'medellin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(10) NOT NULL,
  `genero` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `genero`) VALUES
(1, 'femenino'),
(2, 'masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `cargo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` int(11) NOT NULL,
  `caracteristicas` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `funciones` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pago` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `num_celular` bigint(10) NOT NULL,
  `correo` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id`, `cargo`, `ciudad`, `caracteristicas`, `funciones`, `pago`, `nombre`, `num_celular`, `correo`) VALUES
(11, 'ingeniero', 1, 'rwerwwrwrwrrwe', 'rwrwerwrwrwrwr', 50000, 'leoemplea', 3224241333, 'jk@gmail.com'),
(22, 'aseador', 2, 'dadada adasdsad adasdda', 'addas adasdas adsadada', 10000, 'leoemplea', 3224321233, 'sjaas@gmail.com'),
(27, 'cocinero', 2, 'dadada adasdsad adasdda', 'addas adasdas adsadada', 10000, 'leoemplea', 3224321233, 'sjaas@gmail.com'),
(32, 'electrico', 1, 'dasdasd asdasd asdad', 'asdad aasdadad asdasdasd', 100000, 'leoemplea', 3224321233, 'dadda@gmail.com'),
(33, 'ingeniero', 1, 'weqeqqeqeqweqeqe', 'qeqeqweqeqeqe', 100000, 'leoemplea', 3224321232, 'dadda@gmail.com'),
(34, 'accion', 1, 'fsfsddfrsdfsds ', 'sfsdfsdfsfsdfsf', 100000, 'leoemplea', 3224321233, 'dadda@gmail.com'),
(35, 'electrico', 1, 'dasdasd asdasd asdad', 'asdad aasdadad asdasdasd', 100000, 'leoemplea', 3224321233, 'dadda@gmail.com'),
(36, 'veterinario', 1, 'ass asas asasas', 'asas asas asas', 100000, 'leoemplea', 3221432544, 'shs@gmail.com'),
(37, 'veterinario', 1, 'adada adsasda asddada', 'asdad adasd asdasd', 210000, 'leoemplea', 3221432544, 'as@gmail.com'),
(38, 'veterinario', 1, 'adada adsasda asddada', 'asdad adasd asdasd', 210000, 'leoemplea', 3221432544, 'as@gmail.com'),
(39, 'veterinario', 1, 'adada adsasda asddada', 'asdad adasd asdasd', 210000, 'leoemplea', 3221432544, 'as@gmail.com'),
(40, 'veterinario', 1, 'adada adsasda asddada', 'asdad adasd asdasd', 210000, 'leoemplea', 3221432544, 'as@gmail.com'),
(41, 'veterinario', 1, 'adada adsasda asddada', 'asdad adasd asdasd', 210000, 'leoemplea', 3221432544, 'as@gmail.com'),
(42, 'doctor', 2, 'adada adadad adadad', 'adasdas asdasdas asdsadas', 500000, 'leoemplea', 3221432544, 'leo@gmail.com'),
(43, 'doctor', 2, 'adada adadad adadad', 'adasdas asdasdas asdsadas', 500000, 'leoemplea', 3221432544, 'leo@gmail.com'),
(44, 'doctor', 2, 'adada adadad adadad', 'adasdas asdasdas asdsadas', 500000, 'justin22', 3221432544, 'leo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_usuarios`
--

CREATE TABLE `reg_usuarios` (
  `id` int(10) NOT NULL,
  `nombres` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_documento` int(11) NOT NULL,
  `num_documento` bigint(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nombre_usuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(512) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_rol` int(11) NOT NULL,
  `num_celular` bigint(11) NOT NULL,
  `id_genero` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reg_usuarios`
--

INSERT INTO `reg_usuarios` (`id`, `nombres`, `apellidos`, `id_documento`, `num_documento`, `id_ciudad`, `fecha_nacimiento`, `nombre_usuario`, `clave`, `email`, `id_rol`, `num_celular`, `id_genero`) VALUES
(2, 'leo', 'polanco', 1, 1000786433, 1, '0000-00-00', 'leoemplea', '11111111', 'jk1@gmail.com', 2, 3226007456, 2),
(4, 'Justin Damian', 'Montenegro Diaz', 1, 10007864444, 1, '2023-11-07', 'justin22', '1111', 'jkgmail.com', 1, 3226007455, 1),
(5, 'sebastian', 'delgado', 1, 1133234123, 1, '0000-00-00', 'sebasusua', '11111111', 'sebas@gmail.com', 3, 3114563244, 1),
(6, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(7, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(8, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(9, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(10, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(11, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(12, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(13, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(14, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(15, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(16, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(17, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(18, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(19, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(20, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(21, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(22, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(23, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(24, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(25, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(26, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(27, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(28, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(29, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(30, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(31, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(32, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(33, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(34, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(35, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(36, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(37, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(38, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(39, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(40, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(41, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(42, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(43, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(44, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(45, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(46, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(47, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(48, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(49, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(50, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(51, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(52, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(53, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(54, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(55, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(56, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(57, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(58, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(59, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(60, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(61, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(62, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(63, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(64, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(65, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(66, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(67, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(68, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(69, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(70, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(71, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(72, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(73, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(74, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(75, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(76, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(77, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(78, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(79, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(80, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(81, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(82, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(83, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(84, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(85, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(86, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(87, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(88, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(89, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(90, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(91, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(92, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(93, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(94, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(95, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(96, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(97, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(98, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(99, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(100, 'justin', 'diaz', 1, 1000786470, 2, '2023-12-11', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 1),
(101, 'justin', 'diaz', 1, 1000786470, 2, '0000-00-00', 'invitado', '111111111', 'invitado@gmail.com', 4, 3221432544, 2),
(103, 'justin      ', 'diaz', 1, 1000786222, 1, '2023-12-15', 'justin2211', '328cc831f82a45a11c7ebbf6ec07cb', '4343@fdfdfdfddd', 3, 1111111122, 2),
(104, 'justin', 'diaz', 1, 4444444446, 1, '2023-12-02', 'leoemplea12', '328cc831f82a45a11c7ebbf6ec07cb', '114343@fdfdfdfdd', 3, 4444444442, 2),
(105, 'justin', 'diaz', 1, 1000784444, 1, '2023-12-08', 'justin22111111', '328cc831f82a45a11c7ebbf6ec07cb619e32f06457c8cb654b8973b5c9b68231', '14343@fdfdfdfdd', 3, 1111111333, 2),
(106, 'justin', 'diaz', 1, 1004444444, 1, '2023-12-15', 'justin111', '328cc831f82a45a11c7ebbf6ec07cb619e32f06457c8cb654b8973b5c9b68231f167cbc740558080193111b9f40246ee086a16cda184eb267f37fa315250e2d6', '334343@fdfdfdfdd', 3, 1111333333, 2),
(107, 'Justin', 'Diaz', 1, 1000786555, 1, '2023-12-01', 'justinaaa', '328cc831f82a45a11c7ebbf6ec07cb619e32f06457c8cb654b8973b5c9b68231f167cbc740558080193111b9f40246ee086a16cda184eb267f37fa315250e2d6', 'a4343@fdfdfdfdd', 3, 1111155555, 2),
(108, 'Justin', 'Diaz', 1, 2222222222, 1, '2023-12-01', 'justino', '328cc831f82a45a11c7ebbf6ec07cb619e32f06457c8cb654b8973b5c9b68231f167cbc740558080193111b9f40246ee086a16cda184eb267f37fa315250e2d6', 'adadada@xxx.co', 3, 4444443333, 2),
(109, 'Justin', 'Diaz', 1, 2222244444, 1, '2023-12-01', 'justino1', '328cc831f82a45a11c7ebbf6ec07cb619e32f06457c8cb654b8973b5c9b68231f167cbc740558080193111b9f40246ee086a16cda184eb267f37fa315250e2d6', 'adadada@xxx.com', 3, 4244443222, 2),
(110, 'Justin', 'Diaz', 1, 2229999999, 1, '2023-12-08', 'justinb', 'cc47ce39f0430806ae75a9a1f2730d63e6ddb024fa360565a52fef1e2ec7bc920548ea812790eacb76b42c4da113510fa3773561f236e04f1bc80965dc02e0eb', 'adadada@xxx.cox', 3, 4249999999, 2),
(111, 'Justin', 'Diaz', 1, 2229666666, 1, '2023-12-08', 'justinbo', 'c51113887652873c02751013b66d125bb593c7c0ddc41f209cbb40f54cf5eb6e944c7e32cdcd331dcc3d8dc3b166affbba0acb9672ab603f24c351b5edbf6db2', 'adadada@xxx.cob', 3, 4249666666, 2),
(112, 'Justin', 'Diaz', 1, 2225555555, 1, '2023-12-08', 'justinboa', '6dc842c26a89205b95a79bb6297687a6956db99ce83077fc2d8a39f2c6e1d26b565e26f44c36b234278f83c7f2f4fa74cc6f1b017a25a41e777f9211c493728b', 'adadada@xxx.cobx', 3, 4249666555, 2),
(113, 'Justin', 'Diaz', 1, 3245352225, 1, '2023-12-08', 'justinx', '$argon2id$v=19$m=65536,t=2,p=1$42tquI+7d50IIHrGjoRD0Q$5SwFsnaqstBWMUKc/qqHuyra0H3EoPJ9zh+VJORXRrM', 'adadada@xxx.co11', 3, 4244353453, 2),
(114, 'Justin', 'Diaz', 1, 3243232532, 1, '2023-12-08', 'justinxx', '$argon2id$v=19$m=65536,t=2,p=1$Nt44Kq9g67EkubPMowSbsQ$NWVaFBaz+BVO1RpqvjaDLLRRMCy5Boea0p+Vm+hYlto', 'adadada@xxx.co112', 3, 4244353232, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'administrador'),
(2, 'empleador'),
(3, 'usuario'),
(4, 'invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL,
  `tipo_doc` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `tipo_doc`) VALUES
(1, 'cedula de ciudadania'),
(2, 'targeta de identidad'),
(3, 'cedula de extranjeria');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aplicaciones_ofertas`
--
ALTER TABLE `aplicaciones_ofertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aplicaciones_ofertas` (`id_ofertas`);

--
-- Indices de la tabla `ciudad_residencia`
--
ALTER TABLE `ciudad_residencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ofertas` (`ciudad`);

--
-- Indices de la tabla `reg_usuarios`
--
ALTER TABLE `reg_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg_usuarios` (`id_genero`),
  ADD KEY `reg_usuarios1` (`id_rol`),
  ADD KEY `reg_usuarios2` (`id_ciudad`),
  ADD KEY `reg_usuarios3` (`id_documento`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aplicaciones_ofertas`
--
ALTER TABLE `aplicaciones_ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `ciudad_residencia`
--
ALTER TABLE `ciudad_residencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `reg_usuarios`
--
ALTER TABLE `reg_usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `ofertas` FOREIGN KEY (`ciudad`) REFERENCES `ciudad_residencia` (`id`);

--
-- Filtros para la tabla `reg_usuarios`
--
ALTER TABLE `reg_usuarios`
  ADD CONSTRAINT `reg_usuarios` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`),
  ADD CONSTRAINT `reg_usuarios1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`),
  ADD CONSTRAINT `reg_usuarios2` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad_residencia` (`id`),
  ADD CONSTRAINT `reg_usuarios3` FOREIGN KEY (`id_documento`) REFERENCES `tipo_documento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
