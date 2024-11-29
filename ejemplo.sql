-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2024 a las 01:10:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejemplo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `correo` varchar(11) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`nombre`, `apellido`, `edad`, `correo`, `telefono`) VALUES
('0', '0', 19, '0', 123),
('0', '0', 19, '0', 2147483647),
('e', 'r', 12, 'dfgd@gmail.', 345566),
('miguel', 'goyeneche', 25, 'xxx@gmail.c', 123456789),
('michell', 'sanchez', 19, 'a@lk.com', 2147483647),
('michell', 'sanchez', 19, 'a@lk.com', 2147483647),
('michell', 'sanchez', 19, 'a@lk.com', 2147483647),
('S', 'W', 1, 'dfg@JHS', 2147483647),
('S', 'W', 1, 'dfg@JHS', 2147483647),
('D', 'D', 0, 'D', 0),
('', '', 0, '', 0),
('', '', 0, '', 0),
('michell', 'sanchez', 19, 'a@lk.com', 2147483647),
('michell', 'sanchez', 19, 'a@lk.com', 2147483647),
('michell', 'sanchez', 19, 'a@lk.com', 2147483647),
('michell', 'sanchez', 19, 'a@lk.com', 2147483647),
('michell', 'sanchez', 19, 'a@lk.com', 2147483647),
('prueba', '', 0, 's|', 12),
('e', 'r', 12, 'dfgd@gmail.', 345566),
('e', 'r', 12, 'dfgd@gmail.', 345566),
('e', 'r', 12, 'dfgd@gmail.', 345566),
('michellssss', 'sanchez', 19, 'dfgd', 2147483647),
('prueba', 'prueba', 99, 'a@lk.com', 123456),
('prueba 2', 'prueba3', 88, 'a@gmail.com', 66666),
('S', 'S', 12, 'a@lk.com', 123),
('daiana ', 'garcia', 99, 'andres@gmai', 1234),
('michell', 'sanchez', 7, 'a@lk.com', 2147483647),
('michell', 'sanchez', 19, 'a@lk.com', 2147483647),
('fabian', 'blanco', 50, 'fa_blan@yah', 3111111),
('michell', 'sanchez', 19, 'a@lk.com', 2147483647),
('ana', 'gabriel', 100, 'agabriel@ya', 320202020),
('michell', 'sanchez', 19, 'andres@gmai', 2147483647),
('andres', 'sanchez', 15, 'aa@gmail.co', 123456789),
('andres', 'sanchez', 1, 'a@lk.com', 2147483647),
('andres', 'sanchez', 1, 'a@lk.com', 2147483647),
('t', 't', 34, 'a@lk.com', 2147483647),
('t', 't', 34, 'a@lk.com', 2147483647),
('23', '23', 0, 'sads', 0),
('23', '23', 0, 'sads', 0),
('a', 'a', 0, 'a', 0),
('a', 'a', 0, 'a', 0),
('a', 'a', 0, 'a', 0),
('sda', 'dsas', 12, 'a@lk.com', 2147483647),
('sda', 'dsas', 12, 'a@lk.com', 2147483647),
('michell', 'sanchez', 12, 'a@lk.com', 2147483647),
('michell', 'sanchez', 12, 'a@lk.com', 2147483647),
('michell', 'sanchez', 12, 'a@lk.com', 2147483647),
('michell', 'sanchez', 12, 'a@lk.com', 2147483647),
('michell', 'sanchez', 12, 'a@lk.com', 2147483647),
('michell', 'sanchez', 12, 'a@lk.com', 2147483647),
('sda', 'dsas', 12, 'a@lk.com', 2147483647),
('sda', 'dsas', 12, 'a@lk.com', 2147483647),
('sda', 'dsas', 12, 'a@lk.com', 2147483647),
('michell', 'sanchez', 66, 'andres@gmai', 2147483647),
('michell', 'sanchez', 66, 'andres@gmai', 2147483647),
('michell', 'sanchez', 66, 'andres@gmai', 2147483647),
('michellqqq', 'sanchez', 0, 'andres@gmai', 2147483647),
('l1123', 'A,MSN', 0, 'S@', 2147483647),
('l1123', 'A,MSN', 0, 'S@', 2147483647),
('michell', 'sanchez', 19, 'f@s.com', 2147483647),
('as', 'sa', 19, 'a@cs.co', 675716),
('ca', 'sanchez', 34, 'sdsasd@hot.', 2147483647),
('michell', 'sanchez', 12, 'ñla@gmail.c', 2147483647),
('michell', 'sanchez', 12, 'ñl{ñl@ha.co', 2147483647),
('michell', 'sanchez', 12, 'altron@altr', 2147483647),
('michell', 'sanchez', 12, 'altron@altr', 2147483647),
('michell', 'sanchez', 78, 'altron@altr', 2147483647),
('michell', 'sanchez', 98, 'altron@altr', 2147483647),
('Michell', 'Andrés Snch', 6985, 'altron@altr', 2147483647),
('michell', 'sanchez', 444, 'altron@altr', 2147483647),
('michell', 'sanchez', 12, 'altron@altr', 2147483647);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
