-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2014 at 04:36 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd-grp32`
--

-- --------------------------------------------------------

--
-- Table structure for table `bans`
--

CREATE TABLE IF NOT EXISTS `bans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `banned_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `bans_banned_user_foreign` (`banned_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username6` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username8` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username9` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username10` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_players` int(11) NOT NULL,
  `winner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `games_username1_foreign` (`username1`),
  KEY `games_username2_foreign` (`username2`),
  KEY `games_username3_foreign` (`username3`),
  KEY `games_username4_foreign` (`username4`),
  KEY `games_username5_foreign` (`username5`),
  KEY `games_username6_foreign` (`username6`),
  KEY `games_username7_foreign` (`username7`),
  KEY `games_username8_foreign` (`username8`),
  KEY `games_username9_foreign` (`username9`),
  KEY `games_username10_foreign` (`username10`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_25_202217_create_users_table', 1),
('2014_10_25_202317_create_bans_table', 1),
('2014_10_25_202417_create_games_table', 1),
('2014_10_25_202517_create_plays_table', 1),
('2014_10_25_202617_create_tournaments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plays`
--

CREATE TABLE IF NOT EXISTS `plays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(10) unsigned NOT NULL,
  `player_sequence` text COLLATE utf8_unicode_ci NOT NULL,
  `rolls` text COLLATE utf8_unicode_ci NOT NULL,
  `dice_value` text COLLATE utf8_unicode_ci NOT NULL,
  `dice_saved_value` text COLLATE utf8_unicode_ci NOT NULL,
  `score_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `plays_game_id_foreign` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE IF NOT EXISTS `tournaments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `register_date_start` date NOT NULL,
  `register_date_end` date NOT NULL,
  `num_rounds` int(11) NOT NULL,
  `bots` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creditcard` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` blob,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `creditcard`, `birthdate`, `country`, `picture`, `address`, `phone`, `facebook`, `twitter`, `admin`, `created_at`, `updated_at`) VALUES
(1, 'Mateus', '$2y$10$z6LHnDIT/swPyQLZFjAXLOIlZr6eYsOz1wpKfD/l7SAWbGLOSI4gC', 'Mateus Silva', 'mateusgsilva_@hotmail.com', 2147483647, '0000-00-00', 'Portugal', '', '', 914114359, '', '', 0, '2014-11-07 22:12:21', '2014-11-07 22:12:21'),
(2, 'Marta', '$2y$10$4vt0zkN5nJHELGQVKpMBdOLT7sSfojEsREnL1HayGJXCzuTkH/uvu', 'Marta Brito', 'martaAfeia@gmail.com', 2147483647, '0000-00-00', 'Leiria', '', '', 0, '', '', 0, '2014-11-08 00:18:30', '2014-11-08 00:18:30'),
(4, '<i>Mateus', '$2y$10$kF4pYA7.QyhObC7z/1pSt.rBDdc6gXGsueNV8mdf3PQ4/P/YC8ply', 'Mateus Silva', 'mateusgsilva_@hotmail.com2', 2147483647, '0000-00-00', 'Portugal', '', '', 914114359, '', '', 0, '2014-11-08 14:03:22', '2014-11-08 14:03:22');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bans`
--
ALTER TABLE `bans`
  ADD CONSTRAINT `bans_banned_user_foreign` FOREIGN KEY (`banned_user`) REFERENCES `users` (`username`);

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_username10_foreign` FOREIGN KEY (`username10`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `games_username1_foreign` FOREIGN KEY (`username1`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `games_username2_foreign` FOREIGN KEY (`username2`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `games_username3_foreign` FOREIGN KEY (`username3`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `games_username4_foreign` FOREIGN KEY (`username4`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `games_username5_foreign` FOREIGN KEY (`username5`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `games_username6_foreign` FOREIGN KEY (`username6`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `games_username7_foreign` FOREIGN KEY (`username7`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `games_username8_foreign` FOREIGN KEY (`username8`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `games_username9_foreign` FOREIGN KEY (`username9`) REFERENCES `users` (`username`);

--
-- Constraints for table `plays`
--
ALTER TABLE `plays`
  ADD CONSTRAINT `plays_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
