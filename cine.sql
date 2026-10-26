-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2026 a las 23:09:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'pepe', '$2y$10$7WVRcg7vQcsm4NwZVvDvPOM93MWfK/33CG.7H7h0hE0KHmmlL50T2'),
(3, 'admin2', '$2y$10$e.1EToGkM.xR5Nvg8W2Ote4Cj/X4J9fM8bY2A9UqTj2B5N.e3eFie'),
(4, 'pepito', '$2y$10$zAT3mGe4ztRXW3D9zTz90OVRL9tCEXU79U3xVU2u8BJtfASXhrrhC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `butacas`
--

CREATE TABLE `butacas` (
  `id_butaca` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `nro_asiento` varchar(10) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `butacas`
--

INSERT INTO `butacas` (`id_butaca`, `id_sala`, `nro_asiento`, `estado`) VALUES
(1, 1, 'A1', 0),
(2, 1, 'A2', 0),
(3, 1, 'A3', 0),
(4, 1, 'A4', 0),
(5, 1, 'A5', 0),
(6, 1, 'A6', 0),
(7, 1, 'A7', 0),
(8, 1, 'A8', 0),
(9, 1, 'A9', 0),
(10, 1, 'A10', 0),
(11, 1, 'B1', 0),
(12, 1, 'B2', 0),
(13, 1, 'B3', 0),
(14, 1, 'B4', 0),
(15, 1, 'B5', 0),
(16, 1, 'B6', 0),
(17, 1, 'B7', 0),
(18, 1, 'B8', 0),
(19, 1, 'B9', 0),
(20, 1, 'B10', 0),
(21, 1, 'C1', 0),
(22, 1, 'C2', 0),
(23, 1, 'C3', 0),
(24, 1, 'C4', 0),
(25, 1, 'C5', 0),
(26, 1, 'C6', 0),
(27, 1, 'C7', 0),
(28, 1, 'C8', 0),
(29, 1, 'C9', 0),
(30, 1, 'C10', 0),
(31, 1, 'D1', 0),
(32, 1, 'D2', 0),
(33, 1, 'D3', 0),
(34, 1, 'D4', 0),
(35, 1, 'D5', 0),
(36, 1, 'D6', 0),
(37, 1, 'D7', 0),
(38, 1, 'D8', 0),
(39, 1, 'D9', 0),
(40, 1, 'D10', 0),
(41, 1, 'E1', 0),
(42, 1, 'E2', 0),
(43, 1, 'E3', 0),
(44, 1, 'E4', 0),
(45, 1, 'E5', 0),
(46, 1, 'E6', 0),
(47, 1, 'E7', 0),
(48, 1, 'E8', 0),
(49, 1, 'E9', 0),
(50, 1, 'E10', 0),
(51, 1, 'F1', 0),
(52, 1, 'F2', 0),
(53, 1, 'F3', 0),
(54, 1, 'F4', 0),
(55, 1, 'F5', 0),
(56, 1, 'F6', 0),
(57, 1, 'F7', 0),
(58, 1, 'F8', 0),
(59, 1, 'F9', 0),
(60, 1, 'F10', 0),
(61, 1, 'G1', 0),
(62, 1, 'G2', 0),
(63, 1, 'G3', 0),
(64, 1, 'G4', 0),
(65, 1, 'G5', 0),
(66, 1, 'G6', 0),
(67, 1, 'G7', 0),
(68, 1, 'G8', 0),
(69, 1, 'G9', 0),
(70, 1, 'G10', 0),
(71, 1, 'H1', 0),
(72, 1, 'H2', 0),
(73, 1, 'H3', 0),
(74, 1, 'H4', 0),
(75, 1, 'H5', 0),
(76, 1, 'H6', 0),
(77, 1, 'H7', 0),
(78, 1, 'H8', 0),
(79, 1, 'H9', 0),
(80, 1, 'H10', 0),
(81, 1, 'I1', 0),
(82, 1, 'I2', 0),
(83, 1, 'I3', 0),
(84, 1, 'I4', 0),
(85, 1, 'I5', 0),
(86, 1, 'I6', 0),
(87, 1, 'I7', 0),
(88, 1, 'I8', 0),
(89, 1, 'I9', 0),
(90, 1, 'I10', 0),
(91, 1, 'J1', 0),
(92, 1, 'J2', 0),
(93, 1, 'J3', 0),
(94, 1, 'J4', 0),
(95, 1, 'J5', 0),
(96, 1, 'J6', 0),
(97, 1, 'J7', 0),
(98, 1, 'J8', 0),
(99, 1, 'J9', 0),
(100, 1, 'J10', 0),
(101, 2, 'A1', 0),
(102, 2, 'A2', 0),
(103, 2, 'A3', 0),
(104, 2, 'A4', 0),
(105, 2, 'A5', 0),
(106, 2, 'A6', 0),
(107, 2, 'A7', 0),
(108, 2, 'A8', 0),
(109, 2, 'A9', 0),
(110, 2, 'A10', 0),
(111, 2, 'B1', 0),
(112, 2, 'B2', 0),
(113, 2, 'B3', 0),
(114, 2, 'B4', 0),
(115, 2, 'B5', 0),
(116, 2, 'B6', 0),
(117, 2, 'B7', 0),
(118, 2, 'B8', 0),
(119, 2, 'B9', 0),
(120, 2, 'B10', 0),
(121, 2, 'C1', 0),
(122, 2, 'C2', 0),
(123, 2, 'C3', 0),
(124, 2, 'C4', 0),
(125, 2, 'C5', 0),
(126, 2, 'C6', 0),
(127, 2, 'C7', 0),
(128, 2, 'C8', 0),
(129, 2, 'C9', 0),
(130, 2, 'C10', 0),
(131, 2, 'D1', 0),
(132, 2, 'D2', 0),
(133, 2, 'D3', 0),
(134, 2, 'D4', 0),
(135, 2, 'D5', 0),
(136, 2, 'D6', 0),
(137, 2, 'D7', 0),
(138, 2, 'D8', 0),
(139, 2, 'D9', 0),
(140, 2, 'D10', 0),
(141, 2, 'E1', 0),
(142, 2, 'E2', 0),
(143, 2, 'E3', 0),
(144, 2, 'E4', 0),
(145, 2, 'E5', 0),
(146, 2, 'E6', 0),
(147, 2, 'E7', 0),
(148, 2, 'E8', 0),
(149, 2, 'E9', 0),
(150, 2, 'E10', 0),
(151, 2, 'F1', 0),
(152, 2, 'F2', 0),
(153, 2, 'F3', 0),
(154, 2, 'F4', 0),
(155, 2, 'F5', 0),
(156, 2, 'F6', 0),
(157, 2, 'F7', 0),
(158, 2, 'F8', 0),
(159, 2, 'F9', 0),
(160, 2, 'F10', 0),
(161, 2, 'G1', 0),
(162, 2, 'G2', 0),
(163, 2, 'G3', 0),
(164, 2, 'G4', 0),
(165, 2, 'G5', 0),
(166, 2, 'G6', 0),
(167, 2, 'G7', 0),
(168, 2, 'G8', 0),
(169, 2, 'G9', 0),
(170, 2, 'G10', 0),
(171, 2, 'H1', 0),
(172, 2, 'H2', 0),
(173, 2, 'H3', 0),
(174, 2, 'H4', 0),
(175, 2, 'H5', 0),
(176, 2, 'H6', 0),
(177, 2, 'H7', 0),
(178, 2, 'H8', 0),
(179, 2, 'H9', 0),
(180, 2, 'H10', 0),
(181, 2, 'I1', 0),
(182, 2, 'I2', 0),
(183, 2, 'I3', 0),
(184, 2, 'I4', 0),
(185, 2, 'I5', 0),
(186, 2, 'I6', 0),
(187, 2, 'I7', 0),
(188, 2, 'I8', 0),
(189, 2, 'I9', 0),
(190, 2, 'I10', 0),
(191, 2, 'J1', 0),
(192, 2, 'J2', 0),
(193, 2, 'J3', 0),
(194, 2, 'J4', 0),
(195, 2, 'J5', 0),
(196, 2, 'J6', 0),
(197, 2, 'J7', 0),
(198, 2, 'J8', 0),
(199, 2, 'J9', 0),
(200, 2, 'J10', 0),
(201, 3, 'A1', 0),
(202, 3, 'A2', 0),
(203, 3, 'A3', 0),
(204, 3, 'A4', 0),
(205, 3, 'A5', 0),
(206, 3, 'A6', 0),
(207, 3, 'A7', 0),
(208, 3, 'A8', 0),
(209, 3, 'A9', 0),
(210, 3, 'A10', 0),
(211, 3, 'B1', 0),
(212, 3, 'B2', 0),
(213, 3, 'B3', 0),
(214, 3, 'B4', 0),
(215, 3, 'B5', 0),
(216, 3, 'B6', 0),
(217, 3, 'B7', 0),
(218, 3, 'B8', 0),
(219, 3, 'B9', 0),
(220, 3, 'B10', 0),
(221, 3, 'C1', 0),
(222, 3, 'C2', 0),
(223, 3, 'C3', 0),
(224, 3, 'C4', 0),
(225, 3, 'C5', 0),
(226, 3, 'C6', 0),
(227, 3, 'C7', 0),
(228, 3, 'C8', 0),
(229, 3, 'C9', 0),
(230, 3, 'C10', 0),
(231, 3, 'D1', 0),
(232, 3, 'D2', 0),
(233, 3, 'D3', 0),
(234, 3, 'D4', 0),
(235, 3, 'D5', 0),
(236, 3, 'D6', 0),
(237, 3, 'D7', 0),
(238, 3, 'D8', 0),
(239, 3, 'D9', 0),
(240, 3, 'D10', 0),
(241, 3, 'E1', 0),
(242, 3, 'E2', 0),
(243, 3, 'E3', 0),
(244, 3, 'E4', 0),
(245, 3, 'E5', 0),
(246, 3, 'E6', 0),
(247, 3, 'E7', 0),
(248, 3, 'E8', 0),
(249, 3, 'E9', 0),
(250, 3, 'E10', 0),
(251, 3, 'F1', 0),
(252, 3, 'F2', 0),
(253, 3, 'F3', 0),
(254, 3, 'F4', 0),
(255, 3, 'F5', 0),
(256, 3, 'F6', 0),
(257, 3, 'F7', 0),
(258, 3, 'F8', 0),
(259, 3, 'F9', 0),
(260, 3, 'F10', 0),
(261, 3, 'G1', 0),
(262, 3, 'G2', 0),
(263, 3, 'G3', 0),
(264, 3, 'G4', 0),
(265, 3, 'G5', 0),
(266, 3, 'G6', 0),
(267, 3, 'G7', 0),
(268, 3, 'G8', 0),
(269, 3, 'G9', 0),
(270, 3, 'G10', 0),
(271, 3, 'H1', 0),
(272, 3, 'H2', 0),
(273, 3, 'H3', 0),
(274, 3, 'H4', 0),
(275, 3, 'H5', 0),
(276, 3, 'H6', 0),
(277, 3, 'H7', 0),
(278, 3, 'H8', 0),
(279, 3, 'H9', 0),
(280, 3, 'H10', 0),
(281, 3, 'I1', 0),
(282, 3, 'I2', 0),
(283, 3, 'I3', 0),
(284, 3, 'I4', 0),
(285, 3, 'I5', 0),
(286, 3, 'I6', 0),
(287, 3, 'I7', 0),
(288, 3, 'I8', 0),
(289, 3, 'I9', 0),
(290, 3, 'I10', 0),
(291, 3, 'J1', 0),
(292, 3, 'J2', 0),
(293, 3, 'J3', 0),
(294, 3, 'J4', 0),
(295, 3, 'J5', 0),
(296, 3, 'J6', 0),
(297, 3, 'J7', 0),
(298, 3, 'J8', 0),
(299, 3, 'J9', 0),
(300, 3, 'J10', 0),
(301, 3, 'K1', 0),
(302, 3, 'K2', 0),
(303, 3, 'K3', 0),
(304, 3, 'K4', 0),
(305, 3, 'K5', 0),
(306, 3, 'K6', 0),
(307, 3, 'K7', 0),
(308, 3, 'K8', 0),
(309, 3, 'K9', 0),
(310, 3, 'K10', 0),
(311, 3, 'L1', 0),
(312, 3, 'L2', 0),
(313, 3, 'L3', 0),
(314, 3, 'L4', 0),
(315, 3, 'L5', 0),
(316, 3, 'L6', 0),
(317, 3, 'L7', 0),
(318, 3, 'L8', 0),
(319, 3, 'L9', 0),
(320, 3, 'L10', 0),
(321, 3, 'M1', 0),
(322, 3, 'M2', 0),
(323, 3, 'M3', 0),
(324, 3, 'M4', 0),
(325, 3, 'M5', 0),
(326, 3, 'M6', 0),
(327, 3, 'M7', 0),
(328, 3, 'M8', 0),
(329, 3, 'M9', 0),
(330, 3, 'M10', 0),
(331, 3, 'N1', 0),
(332, 3, 'N2', 0),
(333, 3, 'N3', 0),
(334, 3, 'N4', 0),
(335, 3, 'N5', 0),
(336, 3, 'N6', 0),
(337, 3, 'N7', 0),
(338, 3, 'N8', 0),
(339, 3, 'N9', 0),
(340, 3, 'N10', 0),
(341, 3, 'O1', 0),
(342, 3, 'O2', 0),
(343, 3, 'O3', 0),
(344, 3, 'O4', 0),
(345, 3, 'O5', 0),
(346, 3, 'O6', 0),
(347, 3, 'O7', 0),
(348, 3, 'O8', 0),
(349, 3, 'O9', 0),
(350, 3, 'O10', 0),
(351, 3, 'P1', 0),
(352, 3, 'P2', 0),
(353, 3, 'P3', 0),
(354, 3, 'P4', 0),
(355, 3, 'P5', 0),
(356, 3, 'P6', 0),
(357, 3, 'P7', 0),
(358, 3, 'P8', 0),
(359, 3, 'P9', 0),
(360, 3, 'P10', 0),
(361, 3, 'Q1', 0),
(362, 3, 'Q2', 0),
(363, 3, 'Q3', 0),
(364, 3, 'Q4', 0),
(365, 3, 'Q5', 0),
(366, 3, 'Q6', 0),
(367, 3, 'Q7', 0),
(368, 3, 'Q8', 0),
(369, 3, 'Q9', 0),
(370, 3, 'Q10', 0),
(371, 3, 'R1', 0),
(372, 3, 'R2', 0),
(373, 3, 'R3', 0),
(374, 3, 'R4', 0),
(375, 3, 'R5', 0),
(376, 3, 'R6', 0),
(377, 3, 'R7', 0),
(378, 3, 'R8', 0),
(379, 3, 'R9', 0),
(380, 3, 'R10', 0),
(381, 3, 'S1', 0),
(382, 3, 'S2', 0),
(383, 3, 'S3', 0),
(384, 3, 'S4', 0),
(385, 3, 'S5', 0),
(386, 3, 'S6', 0),
(387, 3, 'S7', 0),
(388, 3, 'S8', 0),
(389, 3, 'S9', 0),
(390, 3, 'S10', 0),
(391, 3, 'T1', 0),
(392, 3, 'T2', 0),
(393, 3, 'T3', 0),
(394, 3, 'T4', 0),
(395, 3, 'T5', 0),
(396, 3, 'T6', 0),
(397, 3, 'T7', 0),
(398, 3, 'T8', 0),
(399, 3, 'T9', 0),
(400, 3, 'T10', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `id_funcion` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `horario` datetime NOT NULL,
  `precio_entrada` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`id_funcion`, `id_pelicula`, `id_sala`, `horario`, `precio_entrada`) VALUES
(1, 1, 2, '2026-04-28 18:00:00', 10000.00),
(2, 2, 1, '2026-04-27 20:30:00', 15000.00),
(3, 3, 3, '2026-04-29 22:30:00', 20000.00),
(4, 1, 2, '2026-08-05 00:00:00', 13111.00),
(7, 3, 2, '2026-07-02 00:00:00', 9000.00),
(8, 1, 1, '2026-08-08 00:00:00', 22222.00),
(9, 1, 1, '2026-08-10 00:00:00', 10000.00),
(10, 1, 1, '2026-08-15 00:00:00', 8989.00),
(12, 1, 2, '2026-10-01 00:00:00', 9999.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `titulo`, `descripcion`, `imagen`) VALUES
(1, 'Super Mario Galaxy: La Pelicula', 'Super Mario Galaxy: La Película (2026), producida por Nintendo e Illumination, es la secuela animada de', 'mario.jpeg'),
(2, 'Michael', '	\"Michael\" (2026) es la película biográfica oficial sobre Michael Jackson, dirigida por Antoine Fuqua y estrenada el 23 de abril de 2026. Protagonizada por Jaafar Jackson (sobrino del artista), la película narra desde sus inicios en Jackson 5 hasta convertirse en el \"Rey del Pop\". Promete una visión inmersiva con recreaciones de sus actuaciones icónicas.', 'michael.png'),
(3, 'Proyecto Fin del Mundo', 'Ryland Grace (Ryan Gosling) despierta en una nave espacial a años luz de casa, solo y sin recuerdos. Ahora, es el único sobreviviente en una misión desesperada para salvar al Sol y evitar la extinción de la humanidad. Con el tiempo agotándose, deberá usar su ingenio y ciencia para resolver un enigma cósmico antes de que la Tierra se congele para siempre. Una épica aventura de supervivencia basada en el éxito de ventas de Andy Weir.', 'findelmundo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id_sala` int(11) NOT NULL,
  `nombre_sala` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `capacidad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id_sala`, `nombre_sala`, `tipo`, `capacidad`) VALUES
(1, 'Sala 01', '2D', 100),
(2, 'Sala 02', '2D', 100),
(3, 'Sala 03', 'Monster', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL,
  `id_butaca` int(11) NOT NULL,
  `id_funcion` int(11) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id_ticket`, `id_butaca`, `id_funcion`, `nombre_cliente`, `correo`, `total`) VALUES
(1, 150, 1, 'Pedro Perez', 'pedroperez@hotmail.com', 15000.00),
(2, 70, 2, 'Juan Manuel', 'juanmanuelprogamer@gmail.com', 15000.00),
(3, 380, 3, 'Miguel Alejandro', 'miguelitoalejandrito@gmail.com', 40000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `butacas`
--
ALTER TABLE `butacas`
  ADD PRIMARY KEY (`id_butaca`),
  ADD KEY `fk_butacas_salas` (`id_sala`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`id_funcion`),
  ADD KEY `fk_funciones_peliculas` (`id_pelicula`),
  ADD KEY `fk_funciones_salas` (`id_sala`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `fk_tickets_butacas` (`id_butaca`),
  ADD KEY `ft_tickets_funciones` (`id_funcion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `butacas`
--
ALTER TABLE `butacas`
  MODIFY `id_butaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `id_funcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `butacas`
--
ALTER TABLE `butacas`
  ADD CONSTRAINT `fk_butacas_salas` FOREIGN KEY (`id_sala`) REFERENCES `salas` (`id_sala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD CONSTRAINT `fk_funciones_peliculas` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_funciones_salas` FOREIGN KEY (`id_sala`) REFERENCES `salas` (`id_sala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_tickets_butacas` FOREIGN KEY (`id_butaca`) REFERENCES `butacas` (`id_butaca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ft_tickets_funciones` FOREIGN KEY (`id_funcion`) REFERENCES `funciones` (`id_funcion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
