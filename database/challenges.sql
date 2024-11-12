-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-11-2024 a las 12:50:52
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
-- Base de datos: `reto_tennis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `challenges`
--

CREATE TABLE `challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player1_id` bigint(20) UNSIGNED NOT NULL,
  `player2_id` bigint(20) UNSIGNED NOT NULL,
  `p1_set1` int(11) NOT NULL,
  `p1_set2` int(11) NOT NULL,
  `p1_set3` int(11) NOT NULL,
  `p2_set1` int(11) NOT NULL,
  `p2_set2` int(11) NOT NULL,
  `p2_set3` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `challenges`
--

INSERT INTO `challenges` (`id`, `player1_id`, `player2_id`, `p1_set1`, `p1_set2`, `p1_set3`, `p2_set1`, `p2_set2`, `p2_set3`, `created_at`, `updated_at`) VALUES
(12, 53, 49, 6, 6, 0, 2, 2, 0, '2024-11-12 08:32:21', '2024-11-12 08:32:21'),
(13, 36, 52, 1, 2, 0, 6, 6, 0, '2024-11-12 08:56:55', '2024-11-12 08:56:55'),
(14, 47, 46, 1, 1, 0, 6, 6, 0, '2024-11-12 09:18:02', '2024-11-12 09:18:02'),
(15, 47, 48, 1, 1, 0, 6, 6, 0, '2024-11-12 09:20:25', '2024-11-12 09:20:25'),
(16, 36, 52, 2, 2, 0, 6, 6, 0, '2024-11-12 09:20:50', '2024-11-12 09:20:50'),
(17, 48, 49, 2, 2, 0, 6, 6, 0, '2024-11-12 09:22:17', '2024-11-12 09:22:17'),
(18, 52, 36, 6, 6, 0, 1, 1, 0, '2024-11-12 09:26:22', '2024-11-12 09:26:22'),
(19, 47, 45, 1, 1, 0, 6, 6, 0, '2024-11-12 09:27:03', '2024-11-12 09:27:03'),
(20, 57, 54, 1, 1, 0, 6, 6, 0, '2024-11-12 10:46:34', '2024-11-12 10:46:34'),
(21, 55, 53, 1, 6, 2, 6, 4, 6, '2024-11-12 10:48:17', '2024-11-12 10:48:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenges_player1_id_foreign` (`player1_id`),
  ADD KEY `challenges_player2_id_foreign` (`player2_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_player1_id_foreign` FOREIGN KEY (`player1_id`) REFERENCES `players` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `challenges_player2_id_foreign` FOREIGN KEY (`player2_id`) REFERENCES `players` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
