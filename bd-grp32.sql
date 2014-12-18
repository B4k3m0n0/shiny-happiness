-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 18/12/2014 às 16:49
-- Versão do servidor: 5.5.38-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `bd-grp32`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `bans`
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
-- Estrutura para tabela `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_bots` int(11) NOT NULL,
  `num_players` int(11) NOT NULL,
  `winner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Fazendo dump de dados para tabela `games`
--

INSERT INTO `games` (`id`, `title`, `status`, `num_bots`, `num_players`, `winner`, `created_at`, `updated_at`) VALUES
(1, 'Jogo do Mateus', 'pendente', 5, 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Jogos', 'ended', 0, 10, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Teste de Jogo', 'Waiting', 2, 7, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'EU', 'eu', 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'tu', 'tu', 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'asd', 'asd', 4, 3, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'hh', 'hh', 2, 7, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'as', 'ss', 3, 3, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Nie', 'Nie', 4, 6, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Po', 'po', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'FF', 'FF', 2, 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'XX', 'XX', 3, 5, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'DSA', 'DSA', 4, 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'EU', 'eu', 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'tu', 'tu', 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'asd', 'asd', 4, 3, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'hh', 'hh', 2, 7, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'as', 'ss', 3, 3, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Nie', 'Nie', 4, 6, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Po', 'po', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'FF', 'FF', 2, 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'XX', 'XX', 3, 5, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'DSA', 'DSA', 4, 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_25_202217_create_users_table', 1),
('2014_10_25_202317_create_bans_table', 1),
('2014_10_25_202417_create_games_table', 1),
('2014_10_25_202517_create_plays_table', 1),
('2014_10_25_202617_create_tournaments_table', 1),
('2014_10_26_202020_create_users_games_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `plays`
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
-- Estrutura para tabela `tournaments`
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
-- Estrutura para tabela `users`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `creditcard`, `birthdate`, `country`, `picture`, `address`, `phone`, `facebook`, `twitter`, `admin`, `created_at`, `updated_at`) VALUES
(1, 'Mateus', '$2y$10$Pi2gacW0/RGrdcvXWv/QEO2RpDfcZC30vPDuGK0ibba2QpOvOlMVS', 'Mateus Silva', 'mateusgsilva99@gmail.com', 2147483647, '0000-00-00', 'Leiria', '', '', 0, '', '', 0, '2014-12-16 12:02:20', '2014-12-16 12:02:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users_games`
--

CREATE TABLE IF NOT EXISTS `users_games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gameId` int(10) unsigned NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `users_games_gameid_foreign` (`gameId`),
  KEY `users_games_user_foreign` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `bans`
--
ALTER TABLE `bans`
  ADD CONSTRAINT `bans_banned_user_foreign` FOREIGN KEY (`banned_user`) REFERENCES `users` (`username`);

--
-- Restrições para tabelas `plays`
--
ALTER TABLE `plays`
  ADD CONSTRAINT `plays_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Restrições para tabelas `users_games`
--
ALTER TABLE `users_games`
  ADD CONSTRAINT `users_games_gameid_foreign` FOREIGN KEY (`gameId`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `users_games_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
