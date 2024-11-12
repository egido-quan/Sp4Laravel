-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-11-2024 a las 12:51:06
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
-- Estructura de tabla para la tabla `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `ranking` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `height` int(11) NOT NULL,
  `playing_hand` varchar(255) NOT NULL,
  `backhand_style` varchar(255) NOT NULL,
  `briefing` text NOT NULL,
  `picture_route` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `players`
--

INSERT INTO `players` (`id`, `name`, `family_name`, `ranking`, `email`, `height`, `playing_hand`, `backhand_style`, `briefing`, `picture_route`, `created_at`, `updated_at`) VALUES
(36, 'Sasha', 'Zverez', 3, 'sasha@zverez', 191, 'right', 'two hands', 'My brother was a good player but I am better', 'images/zverev_full_2024_october.png', '2024-11-09 14:51:24', '2024-11-12 10:09:47'),
(45, 'Daniil', 'Medvedev', 4, 'daniil@medvedev', 188, 'right', 'two hands', 'I like when the crowd shouts at me', 'images/medvedev_full_2024.png', '2024-11-09 16:00:51', '2024-11-12 10:11:15'),
(46, 'Novak', 'Djokovic', 6, 'nole@djoko', 181, 'right', 'two hands', 'I am GOAT !!! (Greatest Of All Time)', 'images/djokovic_full_2024.png', '2024-11-09 16:06:18', '2024-11-12 10:17:39'),
(47, 'Carlos', 'Alcaraz', 2, 'carlos@alcaraz', 183, 'right', 'two hands', 'Me lo voy a llevar todo', 'images/alcaraz_full_2024.png', '2024-11-10 08:01:38', '2024-11-12 10:08:51'),
(48, 'Taylor', 'Fritz', 5, 'taylor@fritz', 185, 'right', 'two hands', 'California is my place and Indian Wells is my tournament', 'images/fritz_full_2024_october.png', '2024-11-10 15:07:53', '2024-11-12 10:13:05'),
(49, 'Casper', 'Ruud', 7, 'casper@ruud', 179, 'right', 'two hands', 'I beat Alcaraz recently, come one!', 'images/ruud_full_2024.png', '2024-11-10 15:12:44', '2024-11-12 10:18:49'),
(52, 'Yannik', 'sinner', 1, 'yannik@sinner', 183, 'right', 'two hands', 'I started skiing but changed to tennis', 'images/sinner_full_2024.png', '2024-11-11 09:30:40', '2024-11-12 10:07:49'),
(53, 'Andrey', 'Rublev', 10, 'andrei@rub', 178, 'right', 'two hands', 'I am a great guy but at the coart I behave very bad sorry', 'images/rublev_full_2024.png', '2024-11-11 20:30:17', '2024-11-12 10:48:17'),
(54, 'Alex', 'De Minaur', 12, 'alex@minaur', 177, 'right', 'two hands', 'I a mix from Chile, Spain and Australia.', 'images/de-minaur_full_2024_october.png', '2024-11-12 10:21:15', '2024-11-12 10:46:34'),
(55, 'Grigor', 'Dimitrov', 8, 'grigor@dimitrov', 184, 'right', 'one hand', 'Some people compare me to Federer, but I have my own style', 'images/dimitrov_full_2024.png', '2024-11-12 10:22:27', '2024-11-12 10:48:17'),
(56, 'Stefanos', 'Tsitsipas', 11, 'stefanos@tsitsi', 182, 'right', 'one hand', 'I go to bed with Paula Badosa and you don\'t', 'images/tsitsipas_full_2024_may.png', '2024-11-12 10:28:15', '2024-11-12 10:28:15'),
(57, 'Tommy', 'Paul', 9, 'tommy@paul', 181, 'right', 'two hands', 'My target is to be a top 5 player', 'images/paul_full_2024.png', '2024-11-12 10:29:35', '2024-11-12 10:46:34'),
(58, 'Holge', 'Rune', 13, 'holge@rune', 180, 'right', 'two hands', 'Mi madre es una pesada', 'images/rune_full_2024_october.png', '2024-11-12 10:30:34', '2024-11-12 10:30:34'),
(59, 'Ugo', 'Humbert', 14, 'ugo@humbert', 184, 'left', 'two hands', 'French tennis will win Roland Garros next year', 'images/humbert_full_2024.png', '2024-11-12 10:31:49', '2024-11-12 10:31:49'),
(60, 'Jack', 'Draper', 15, 'jack@draper', 186, 'left', 'two hands', 'I represent Australian tennis', 'images/draper-full-2023.png', '2024-11-12 10:37:49', '2024-11-12 10:37:49');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `players_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
