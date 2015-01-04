-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 05-Jan-2015 às 00:52
-- Versão do servidor: 5.5.38-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `bd-grp32`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bans`
--

CREATE TABLE IF NOT EXISTS `bans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `banned_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `bans_banned_user_foreign` (`banned_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=104 ;

--
-- Extraindo dados da tabela `bans`
--

INSERT INTO `bans` (`id`, `banned_user`, `reason`, `created_at`, `updated_at`) VALUES
(85, '1dfsgfdgsdf', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, '123456789', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, '2110095', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'admin', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `game_owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_bots` int(11) NOT NULL,
  `num_players` int(11) NOT NULL,
  `winner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `games_game_owner_foreign` (`game_owner`),
  KEY `games_winner_foreign` (`winner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `games`
--

INSERT INTO `games` (`id`, `game_name`, `game_owner`, `status`, `num_bots`, `num_players`, `winner`, `created_at`, `updated_at`) VALUES
(1, 'scd', 'joao', 'Waiting', 1, 1, NULL, '2015-01-02 12:35:00', '2015-01-02 12:35:00'),
(2, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'jogo1', 'joao', 'Waiting', 7, 2, 'joao', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_25_202217_create_users_table', 1),
('2014_10_25_202317_create_bans_table', 1),
('2014_10_25_202417_create_games_table', 1),
('2014_10_25_202517_create_plays_table', 1),
('2014_10_25_202617_create_tournaments_table', 1),
('2014_10_26_202020_create_users_games_table', 1),
('2014_10_26_202020_create_settings_table', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `plays`
--

CREATE TABLE IF NOT EXISTS `plays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(10) unsigned NOT NULL,
  `player_sequence` text COLLATE utf8_unicode_ci NOT NULL,
  `current_player` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rolls` text COLLATE utf8_unicode_ci NOT NULL,
  `dice_value` text COLLATE utf8_unicode_ci NOT NULL,
  `dice_saved` text COLLATE utf8_unicode_ci NOT NULL,
  `score_id` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `plays_game_id_foreign` (`game_id`),
  KEY `plays_current_player_foreign` (`current_player`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `diceImageName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diceImage` blob,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `settings`
--

INSERT INTO `settings` (`id`, `diceImageName`, `diceImage`, `created_at`, `updated_at`) VALUES
(18, '1.jpg', 0x696d672f73657474696e677350696374757265732f312e6a7067, '2015-01-04 01:11:49', '2015-01-04 01:11:49'),
(19, '2.jpg', 0x696d672f73657474696e677350696374757265732f322e6a7067, '2015-01-04 01:12:00', '2015-01-04 01:12:00'),
(20, '3.jpg', 0x696d672f73657474696e677350696374757265732f332e6a7067, '2015-01-04 01:12:14', '2015-01-04 01:12:14'),
(21, '4.jpg', 0x696d672f73657474696e677350696374757265732f342e6a7067, '2015-01-04 01:20:12', '2015-01-04 01:20:12'),
(22, '5.jpg', 0x696d672f73657474696e677350696374757265732f352e6a7067, '2015-01-04 01:23:16', '2015-01-04 01:23:16'),
(23, '6.jpg', 0x696d672f73657474696e677350696374757265732f362e6a7067, '2015-01-04 01:24:10', '2015-01-04 01:24:10'),
(24, '7.jpg', 0x696d672f73657474696e677350696374757265732f372e6a7067, '2015-01-04 01:25:34', '2015-01-04 01:25:34'),
(25, '8.png', 0x696d672f73657474696e677350696374757265732f382e706e67, '2015-01-04 01:26:20', '2015-01-04 01:26:20'),
(26, '9.jpg', 0x696d672f73657474696e677350696374757265732f392e6a7067, '2015-01-04 01:28:20', '2015-01-04 01:28:20'),
(27, '10.png', 0x696d672f73657474696e677350696374757265732f31302e706e67, '2015-01-04 01:42:00', '2015-01-04 01:42:00'),
(28, '11.jpg', 0x696d672f73657474696e677350696374757265732f31312e6a7067, '2015-01-04 01:43:26', '2015-01-04 01:43:26'),
(29, '12.jpg', 0x696d672f73657474696e677350696374757265732f31322e6a7067, '2015-01-04 01:47:23', '2015-01-04 01:47:23'),
(30, '13.png', 0x696d672f73657474696e677350696374757265732f31332e706e67, '2015-01-04 01:49:04', '2015-01-04 01:49:04'),
(31, '14.jpg', 0x696d672f73657474696e677350696374757265732f31342e6a7067, '2015-01-04 01:50:27', '2015-01-04 01:50:27'),
(32, '15.jpg', 0x696d672f73657474696e677350696374757265732f31352e6a7067, '2015-01-04 01:50:39', '2015-01-04 01:50:39'),
(33, '16.png', 0x696d672f73657474696e677350696374757265732f31362e706e67, '2015-01-04 01:50:46', '2015-01-04 01:50:46'),
(34, '17.jpg', 0x696d672f73657474696e677350696374757265732f31372e6a7067, '2015-01-04 01:55:30', '2015-01-04 01:55:30'),
(35, '18.jpg', 0x696d672f73657474696e677350696374757265732f31382e6a7067, '2015-01-04 01:55:33', '2015-01-04 01:55:33'),
(36, '19.jpg', 0x696d672f73657474696e677350696374757265732f31392e6a7067, '2015-01-04 01:58:40', '2015-01-04 01:58:40'),
(37, '20.jpg', 0x696d672f73657474696e677350696374757265732f32302e6a7067, '2015-01-04 01:58:43', '2015-01-04 01:58:43'),
(38, '21.jpg', 0x696d672f73657474696e677350696374757265732f32312e6a7067, '2015-01-04 01:58:47', '2015-01-04 01:58:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tournaments`
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
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creditcard` bigint(20) NOT NULL,
  `birthdate` date NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` blob,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `creditcard`, `birthdate`, `country`, `picture`, `address`, `phone`, `facebook`, `twitter`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'joao', '$2y$10$jlUmS7.sR.xKd7q29OclOOqsUg2vNIrCKZsw.qTSaIx1H5yLNO9fG', 'João Dias', 'joka.93@hotmail.com', 111111111111, '2012-12-12', 'Portugal', '', '', 916314468, '', '', 0, 'TzsAIoFOgktDFDifd0qpPadEZvFtRs1RnVYrqrYZPxdvg4ZXvKfVfq2IjzNq', '2015-01-02 12:27:09', '2015-01-02 20:51:00'),
(2, 'coiso', '$2y$10$pGtGlLqWxOloB/u6CfGkxe0Cm0O5uqt2ZfL9api47GxKUw5U52N7i', 'Guy Man', '123@123.com', 1111111111111111, '2012-12-12', 'Portugal', '', '', 0, '', '', 0, NULL, '2015-01-02 13:25:52', '2015-01-02 13:25:52'),
(3, 'dfsdfsdfdsf1', '$2y$10$SrxogCyXBFiQg54LiOm5Ge04449PdhWQ0V2J/dJdeRbVq001kPdx2', 'João Dias', 'sdafsdfgjoka.93@hotmail.com', 4532679144125176, '2012-12-12', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 15:40:08', '2015-01-02 15:40:08'),
(4, 'fdfdhgfhgf', '$2y$10$i1Ery9qyhL41egcbvWaOF.pTm758N7sYG8Qm5Wjam8.iHleo2yNUq', 'João Dias', 'sdffdgfdgjoka.93@hotmail.com', 4556757099454949, '2012-12-12', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 15:41:26', '2015-01-02 15:41:26'),
(5, 'Mateussadsdf', '$2y$10$Sai7Jowhe4RvEG74poiDFewhtZDzfPCAFzzO2KUtV.TIkFrgsKRe2', 'João Dias', 'sdfsdfsdjoka.93@hotmail.com', 4124875001997657, '2012-12-12', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 15:42:10', '2015-01-02 15:42:10'),
(6, 'coiso123', '$2y$10$FV9MyBxw2P01pN5uRdA41Oyx9hiL8rUmaVW.ONCe/AEEM.aPJzmcO', 'João Dias', 'sadsadsadjoka.93@hotmail.com', 4716219162831807, '1975-12-12', 'Portugal', '', '', 916314468, '', '', 0, 'RJx8r37hxGXGgOkM6BjDciLdOsRnNfXIsq0z2TZIBb5NVcbE1ynVzrYahoNS', '2015-01-02 15:49:20', '2015-01-02 18:17:23'),
(7, 'hfghgfhgf', '$2y$10$9MetXDxyO.xj1qA/CKdeZOBbUaBzyudSTcNhdGbXe8m45x5k0mbW2', 'João Dias', 'fdgghbfgjoka.93@hotmail.com', 4532679144125176, '2012-12-12', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 17:27:57', '2015-01-02 17:27:57'),
(8, 'gtfgfjhgjg', '$2y$10$j6RmjgaCV7KiOZEqxkiutO74WzmTtJNhgiE29DMfv1ijiR28XGjMO', 'João Dias', 'fdsfsdfgsdg@s.com', 4556757099454949, '2012-12-12', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 17:30:38', '2015-01-02 17:30:38'),
(9, 'chçljop', '$2y$10$cNkuGiOJP7zZOUr9RWNeOuwANW0/wqZziCawURA2aB7PQSUHTcur.', 'João Dias', 'fdgfdgfdhgjoka.93@hotmail.com', 4556757099454949, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 17:31:43', '2015-01-02 17:31:43'),
(10, 'vhfhgfhgfhf', '$2y$10$tfqERVqeS.lrXP5UiW.MBujFvz8dfNvukPDaG8xnvj4VlQ0PcaTrC', 'João Dias', 'sdfsdfsdf@a.com', 4024007119837382, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 17:38:37', '2015-01-02 17:38:37'),
(11, 'gfdhgh', '$2y$10$X8xQKh8NxFCSlRq0HvtoHenpoh9zqYENoElTyllvXlGZpq4qFD.pu', 'João Dias', 'dfsgfdgjoka.93@hotmail.com', 4716219162831807, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 17:48:59', '2015-01-02 17:48:59'),
(12, '1dfsgfdgsdf', '$2y$10$QTMrxonqqKPn/iV2jYY3aOohVZOFfbnCdF1YvKFAltpqZm9Q.1T/a', 'João Dias', 'gffdhhjoka.93@hotmail.com', 4532679144125176, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 17:50:01', '2015-01-02 17:50:01'),
(13, 'mateusdfgfdg', '$2y$10$cKwvE1AQ4hjR8GV7CfyPQOfUMfH1Xw/aB67oqkDWNiUgVV5bo.D3S', 'João Dias', 'fsdgfdgfdsjoka.93@hotmail.com', 4024007119837382, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 17:57:16', '2015-01-02 17:57:16'),
(14, 'fghgfhgfhf', '$2y$10$6LPWGj3Q3suQsKtamyaiKeJ3.q8Yo81/uLHBRnFnDlOzJFJyeOZum', 'João Dias', 'dsgffdgfdgjoka.93@hotmail.com', 4024007119837382, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 18:06:46', '2015-01-02 18:06:46'),
(15, 'mateussdfgfdhfdg', '$2y$10$ntFlYaqacpnr6o2mq7r5RuStd3uIuFUurago2hEJPEmxn2v3v7fmu', 'João Dias', 'dfghghghjoka.93@hotmail.com', 4556757099454949, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 18:18:09', '2015-01-02 18:18:09'),
(16, 'ZeToino512', '$2y$10$94Dzfhx.PK4l9B4Sm7wGvu8cFQj0cyPA1V4Y5XTj9LWpnwzNTxEXm', 'João Dias', 'dfgfdhfdgfdgjoka.93@hotmail.com', 4716219162831807, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 18:19:25', '2015-01-02 18:19:25'),
(17, 'joaodias', '$2y$10$BgKWYI2A1NCTFkSL4Z/GnuMEoxIowtN3zBY9W88N5mqYEDIOBXUN2', 'João Dias', 'sdfsdfsdfsdfsdfjoka.93@hotmail.com', 4024007119837382, '1993-07-21', 'Portugal', '', '', 916314468, '', '', 0, '3X0VbBC0NQ8j53peuXAbvhzydbtKBB7oNsKw4Gos49rsSM40mXGXmoOEcJg0', '2015-01-02 18:22:07', '2015-01-02 18:42:42'),
(18, 'hfghgjhgkhgjk', '$2y$10$dVq6Y3jVD1.2RZsogKaX3e658sxiW/b9HWfb3EPHut1LQrp.Q1wUW', 'João Diassd', 'sdsdgfdsgsdg@a.com', 4024007119837382, '1988-12-12', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 18:44:50', '2015-01-02 18:44:50'),
(19, 'gfdfhgdfhfdhj', '$2y$10$qxy3Batuf5CLCEafyORqZupXmWSxvJv414xd4HgXFiKCkONOUCyZy', 'João Dias', 'sdffdsgjoka.93@hotmail.com', 4716219162831807, '1988-12-12', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 18:45:56', '2015-01-02 18:45:56'),
(20, 'fghgfdsg', '$2y$10$cLuj/68eA7YvQxQ1itroUuIl94ho6qVrKKKiXQPAKr.HvHR3XLYWK', 'João Dias', 'fdgfdhgfdhjoka.93@hotmail.com', 4716219162831807, '1975-12-12', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 18:46:51', '2015-01-02 18:46:51'),
(21, 'hgjhgkhgkk', '$2y$10$bYyecekEaAI4NCk.tOQguejyUMC99pdSk/TJlmrHWTf1UTgDRIv5y', 'João Dias', 'fdghhjoka.93@hotmail.com', 4532679144125176, '1988-12-12', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 18:48:40', '2015-01-02 18:48:40'),
(22, 'hgfjgfjkgfjk', '$2y$10$5sfMk2q5tbwPd/5aYTiiT.T89/PYvrVVzL4jHHR.puUu4L8DtQGIW', 'João Dias', 'dhgfjjjjoka.93@hotmail.com', 4024007119837382, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 18:49:32', '2015-01-02 18:49:32'),
(23, '2110095', '$2y$10$DyqrDZ/H9bznh7XJCjhYJuKWQwfoob.VgsAYslrD333K1lRGk3o9G', 'João Dias', 'btnext_1@hotmail.com', 4024007119837382, '0000-00-00', 'Portugal', '', '', 0, '', '', 0, NULL, '2015-01-02 19:23:35', '2015-01-02 19:23:35'),
(24, 'fdhhkjfdkj', '$2y$10$.10jkMaG4A/2YdFYeyhq..R1nLn3JJnCFrWFA41aPlsD/5.5E6x6u', 'João Dias', 'rfhgfdhjoka.93@hotmail.com', 4716219162831807, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 19:31:41', '2015-01-02 19:31:41'),
(25, 'hgfhgfj', '$2y$10$Zk8Kzja8gXQkppYnGTfIiOuSYtrr91ec498BTupe744zWSrbomfbC', 'João Dias', 'fdhhhjjoka.93@hotmail.com', 4556757099454949, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 19:33:06', '2015-01-02 19:33:06'),
(26, 'Mateusfdsghh', '$2y$10$1VhPed2DUuVzTthRvnkoUOEfJkGl1HnVnUDlmBS7NV0q1E1UZ6y1y', 'João Dias', 'fdhjhhhhjoka.93@hotmail.com', 4556757099454949, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 19:38:34', '2015-01-02 19:38:34'),
(27, 'fgfdhjj', '$2y$10$UMNTHNeLkb/eDAUfAvc4Heq6juoWw5f/s6OvS3omIV06mIHQQtq.m', 'João Dias', 'sdghjjjoka.93@hotmail.com', 4929349546360273, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 19:40:45', '2015-01-02 19:40:45'),
(28, 'fsdgfhgfj', '$2y$10$luL4oQwOvGAoPEAwtMDdd.Kdojvyovv1ibVYImECmQvDm0//qj7UG', 'João Dias', 'dshgjkklljoka.93@hotmail.com', 4929349546360273, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 19:41:22', '2015-01-02 19:41:22'),
(29, 'fhgfj', '$2y$10$ywbvVddpWEoDQ45ee9UN6eJVZRFnbgKAYSob3aYspCl3z9jH9WoVi', 'João Dias', 'sdghjkjoka.93@hotmail.com', 4929349546360273, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 19:42:29', '2015-01-02 19:42:29'),
(30, 'sdglfdjhiohj', '$2y$10$4s4asVhG9gJBvmrOriWAdexsjuhFV9N9k6UKwPkjlxtpek77qAZLi', 'Guy Man', 'gggbtnext_1@hotmail.com', 4929349546360273, '0000-00-00', 'Portugal', '', '', 0, '', '', 0, NULL, '2015-01-02 19:43:38', '2015-01-02 19:43:38'),
(31, 'fdsh', '$2y$10$sQNdIfGaFKWqgcmhBXFM1eJecHo7to.ZlgY3qQrDZuG5yXBPQD1XO', 'João Dias', 'fdhhjjjjoka.93@hotmail.com', 4929349546360273, '0000-00-00', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 19:44:28', '2015-01-02 19:44:28'),
(32, 'jllll', '$2y$10$zlMr8g.Ovq61Q4i4SJZpNewbINZp3RHVnm.SpSTHwkhpmMvGgWzky', 'João Dias', 'dfhklljoka.93@hotmail.com', 4556757099454949, '1888-12-12', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 19:45:59', '2015-01-02 19:45:59'),
(33, 'ghlçq', '$2y$10$284KfegxXW5B.Hp/lJifuuvgzpAuUPgeGWXT7uIMLQ7wwMD4pD/Ny', 'João Dias', 'gggggjoka.93@hotmail.com', 4716219162831807, '1988-12-12', 'Portugal', '', '', 916314468, '', '', 0, NULL, '2015-01-02 19:47:14', '2015-01-02 19:47:14'),
(34, 'xfdfgfgthj', '$2y$10$eH/sDpCOSrDY0Yfbca.aFeoYqzPjOk5fWWlsd9Q7wB0yPNuklg9bG', 'João Dias', 'gfdhjjjoka.93@hotmail.com', 4929349546360273, '1888-12-12', 'Portugal', NULL, '', 916314468, '', '', 0, NULL, '2015-01-02 21:24:24', '2015-01-02 21:24:24'),
(35, 'teste1', '$2y$10$w.V8C.VIlJ9Oh06UzUa2XOml7asU21LOzE7vjIGQJxDI4EqAUziYe', 'João Dias', 'fghjjbtnext_1@hotmail.com', 4024007127995024, '1212-12-12', 'Portugal', NULL, '', 0, '', '', 0, NULL, '2015-01-03 18:01:48', '2015-01-03 18:01:48'),
(36, 'ggg', '$2y$10$v6SvRtlP.fzLoNgQUB8Ur.vZroVkkyFfbvOUbGSBak/J1fd3Tp37a', 'João Dias', 'ggg4g4gjoka.93@hotmail.com', 4024007127995024, '1888-12-12', 'Portugal', NULL, '', 916314468, '', '', 0, NULL, '2015-01-03 18:09:16', '2015-01-03 18:09:16'),
(37, 'fg1', '$2y$10$Mv38uFwu8GglrfsrSDUl1O969HeZAtQYtVe.3ZXt50274QzfLgpea', 'João Dias', '1f1fjoka.93@hotmail.com', 4024007127995024, '1888-12-12', 'Portugal', NULL, '', 916314468, '', '', 0, NULL, '2015-01-03 18:09:45', '2015-01-03 18:09:45'),
(38, 'teste', '$2y$10$JoeFa0T4ks/JTamGTsnmlOpacs0OylpoFBEfqEUghOfwkEQhyxccG', 'João Dias', 'f1fjoka.93@hotmail.com', 4024007127995024, '1988-12-12', 'Portugal', NULL, '', 916314468, '', '', 0, NULL, '2015-01-03 18:10:34', '2015-01-03 18:10:34'),
(39, 'ssss', '$2y$10$r4rFSBV15z5sevU6rQqoZe2NMJvPMr3U0nh8X/uKd6O5rK9nugi6S', 'ssssssss', 'ssss@a.com', 4024007127995024, '1988-12-12', 'Portugal', NULL, '', 0, '', '', 0, NULL, '2015-01-03 18:12:04', '2015-01-03 18:12:04'),
(40, 'ssss1', '$2y$10$PbnRMTiSACfMpyEl/ZaZaeNZClWKP8S1UV.sj7QtCfP34QNdmHJq6', 'Guy Man', 'dfgf1ggbtnext_1@hotmail.com', 4024007127995024, '1888-12-12', 'Portugal', NULL, '', 0, '', '', 0, NULL, '2015-01-03 18:12:39', '2015-01-03 18:12:39'),
(41, 'fdgh64', '$2y$10$uy1sSfChZxmX/gSzoyg.g.aLrC/ichxibpP9EleTnHeeqHjIunsZ2', 'João Dias', 'sfgd12g3fdjoka.93@hotmail.com', 4024007127995024, '1888-12-12', 'Portugal', NULL, '', 916314468, '', '', 0, NULL, '2015-01-03 18:13:23', '2015-01-03 18:13:23'),
(42, 'joaodias123', '$2y$10$KLURc6c1AMSOu0NNUbEZveWYGQh6wdM7DORt9r8yR7K1iK6AgbQ2y', 'João Dias', 'fg3hfd5h3fdhg1joka.93@hotmail.com', 4024007127995024, '1888-12-12', 'Portugal', NULL, '', 916314468, '', '', 0, '0edbL1QOLeN5vrQke1nM9txzqrE1Gx7f9PMIR8pqDrVlAoqOGA9ob6637tpl', '2015-01-03 18:19:07', '2015-01-03 18:44:31'),
(43, 'dasdfsdfdsf', '$2y$10$8quB05tpZrUYux7Fe3rzwOP4qq8qgfAaeXg7NyOUo2lXDTfWJilX2', 'João Dias', 'dsf1h1joka.93@hotmail.com', 4024007127995024, '0000-00-00', 'Portugal', 0x696d672f7573657250696374757265732f64617364667364666473662e706e67, '', 916314468, '', '', 0, NULL, '2015-01-03 18:27:23', '2015-01-03 18:27:23'),
(44, 'joaodias1234', '$2y$10$6GX4fudYQjvf4CGrNUod.OQmjVGQpuF/PjDhMHfU2mZv29ndto9rW', 'João Dias', 'sd2f22joka.93@hotmail.com', 4024007127995024, '0000-00-00', 'Portugal', 0x696d672f7573657250696374757265732f6a6f616f64696173313233342e706e67, '', 916314468, '', '', 0, 'MBhvz37hzC2uPv08BHqhBZkozoIsiWIOnAvfuZYvCkpJp7prFdDRl3kz3h9Z', '2015-01-03 18:28:23', '2015-01-03 18:43:19'),
(45, 'toto', '$2y$10$dwUBdGCiUS6Z.YjytYSAheTSxseQ0SJMJmhkrRMugOVnD/xzYNVPq', 'João Dias', '1f1f1fjoka.93@hotmail.com', 4716945695319551, '0000-00-00', 'Portugal', 0x696d672f7573657250696374757265732f64656661756c74506963747572652e706e67, '', 916314468, '', '', 0, 'VYAH7EWanAbe2Cd41cLQsDwAYbTCg2QV0MoSlqafA6jKXMVN0MtAXdokGmth', '2015-01-03 18:44:52', '2015-01-03 18:45:46'),
(46, 'toto123', '$2y$10$ALvrY25IXvG68o5YYbebYelnRJ20/Zkjt6v01diw2l4lnnBnieWnC', 'João Dias', 'fd2fdjoka.93@hotmail.com', 4716945695319551, '0000-00-00', 'Portugal', 0x696d672f7573657250696374757265732f746f746f3132332e706e67, '', 916314468, '', '', 0, NULL, '2015-01-03 18:46:21', '2015-01-03 18:46:21'),
(47, 'toto1234', '$2y$10$9UMzfkX/2zc6C2Qxe0Sf2e/V5OjPjHTmtiW3gj1Ciq3SBDI.qE3ke', 'João Dias', 'fd1f1f1fjoka.93@hotmail.com', 4716945695319551, '0000-00-00', 'Portugal', 0x696d672f7573657250696374757265732f746f746f313233342e706e67, '', 916314468, '', '', 0, 'XACMuH6IYnYQREXM1oJHHvJqpsM3erPObBKsTMqE1Hl0AfBTMKjelkC752YM', '2015-01-03 18:48:01', '2015-01-03 18:51:12'),
(48, 'toto12345', '$2y$10$wBf3MLeVp6HvQtBdSZowU.YjzQANsMIHMmFGWyLLU7eEyCqsl2eSO', 'João Dias', 'dfggjoka.93@hotmail.com', 4024007127995024, '1888-12-12', 'Portugal', 0x696d672f7573657250696374757265732f746f746f31323334352e706e67, '', 916314468, '', '', 0, 'Me4kuZdXGPcUvjbK2lNZKHnGcUrmaLwPqD8ON6p16W0JyLV4NsIvxyRTn29o', '2015-01-03 18:51:53', '2015-01-03 18:52:08'),
(49, 'toto123456', '$2y$10$GOu/JJFtI1pMfT9MOKZB1.plUQZNHxRLz6gYQhcSQ6LQS6oRIMRmO', 'João Dias', 'f1f1f1fjoka.93@hotmail.com', 4024007127995024, '1888-12-12', 'Portugal', NULL, '', 916314468, '', '', 0, 'R3WhVPhLbkkRLseEdL7G1tB3JpN4sFFjYRaNQN6ME80PPxNKuurWZnAjRvcw', '2015-01-03 18:52:49', '2015-01-03 19:03:32'),
(50, '123456789', '$2y$10$QQ8R3/H8vpyM5Wa8pUkQJ.pyqjRRp9/RpuLhJ2RV.rx5J3z8LyGWy', 'João Dias', 'fd1f1f1f1joka.93@hotmail.com', 4024007108064642, '1888-12-12', 'Portugal', 0x696d672f7573657250696374757265732f3132333435363738392e6a7067, '', 916314468, '', '', 0, NULL, '2015-01-03 19:03:08', '2015-01-03 19:03:08'),
(51, 'teste2', '$2y$10$kViMf0LhwW4LnPkh0pc0q.uK6wK7WG9OpJmBH5v9MrIk5o2TlJZOy', 'João Dias', 'ff1f1f1f1f1joka.93@hotmail.com', 4024007108064642, '1888-12-12', 'Portugal', 0x696d672f7573657250696374757265732f7465737465322e6a7067, '', 916314468, '', '', 1, 'U3cJSu4grqrlc839ugo26w6xJ0SGhK9uQ1WyQvvI19q1SPRDiz2u7IBCHcNB', '2015-01-03 19:04:34', '2015-01-03 21:41:09'),
(52, 'jonny015', '$2y$10$RJUyujOLiI6hg2sq9fF9zuomjG8aryeMXrkFLlo5rKmsSlXcDFSdK', 'João Dias', 'd1d1d1djoka.93@hotmail.com', 4024007108064642, '1882-12-12', 'Portugal', NULL, '', 916314468, '', '', 0, 'Y8nFdiUfdmaAGiPEWnf5iOWrmBuZoMV8rQwd1mIVkKIVDupRPY7egvTbCC6Y', '2015-01-03 19:16:21', '2015-01-03 19:18:30'),
(53, 'jonny0015', '$2y$10$VBJvkBu.we9C0rsgeE2swOkk0Fktb.9hTHrFzcgjlk3l1MUr/RSTC', 'João Dias', 'fd1f1f1f1fjoka.93@hotmail.com', 4916717617954122, '1888-12-12', 'Portugal', 0x696d672f7573657250696374757265732f6a6f6e6e79303031352e706e67, '', 916314468, '', '', 0, '7ndBEnlq2jqmrye2xFqLnjdQfqHpio1aASzAMIeBvIwa3D0LhRdlP1ISidSw', '2015-01-03 19:18:53', '2015-01-03 19:57:09'),
(54, 'jonny000015', '$2y$10$kE4BjgOR6popVaGCzNV6uOgcPDSCpp9oyGwAdPWavR4ardWqgo8s6', 'Guy Man', 'fdfd1fd12fd12btnext_1@hotmail.com', 4716794514022867, '1888-12-12', 'Portugal', 0x696d672f7573657250696374757265732f64656661756c74506963747572652e706e67, '', 0, '', '', 0, 'TK4BfvsYFTQ9SUBuD0DjckvjPhCjbjSOpx44z55lslaakQpw8UiVxO8spbtZ', '2015-01-03 19:57:44', '2015-01-03 23:46:13'),
(55, 'joaooo', '$2y$10$eZJyHQLKBBxFNo4IiGiE1uccSdpOlUSFgKOz/ZPqsr2dtOM7uV4Bm', 'João Dias', '1g1g1e11wjoka.93@hotmail.com', 4485413906606794, '1888-12-12', 'Portugal', 0x696d672f7573657250696374757265732f64656661756c74506963747572652e706e67, '', 916314468, '', '', 0, NULL, '2015-01-03 20:01:50', '2015-01-03 20:01:50'),
(56, 'joaooooo', '$2y$10$/h0mrmjCqxMBFE4Sf0yPJeXa8Q.zv4IE9qvWotKU9BW6HxyilU0Pi', 'João Diass', 'a@dgfgghgg.comsss', 4485413906606794, '1888-12-12', 'Portugal', 0x696d672f7573657250696374757265732f6a6f616f6f6f6f6f2e6a7067, '', 916314468, '', '', 0, NULL, '2015-01-03 20:02:33', '2015-01-03 20:16:41'),
(57, 'teste3', '$2y$10$RshzoqPEr9YYSgtpqyyk1e0d3/wftwReQVVZ75cmV/ZSicHNOITj.', 'João Dias', 'dfgfdhfdgfdgjoka.93@hotmail.coggm', 4716794514022867, '1888-12-12', 'Portugal', 0x696d672f7573657250696374757265732f7465737465332e706e67, '', 916314468, '', '', 1, 'g7WUqfmMhtY2ih4xsRNoUW3fND2o5X6TidwmJzFeZyxQ0p3fcaQpBryqFW4P', '2015-01-03 22:24:04', '2015-01-03 23:44:17'),
(58, 'teste4', '$2y$10$gG4MFFkqllYQWV8ccBjYw.BkCPV.RROji0KrfPaAsH/faMxpERU4e', 'João Dias', 'sdfggfdgdgdgjoka.93@hotmail.com', 4980747851629636, '1888-12-12', 'Portugal', 0x696d672f7573657250696374757265732f7465737465342e6a7067, '', 916314468, '', '', 1, NULL, '2015-01-03 22:34:59', '2015-01-03 22:34:59'),
(59, 'admin', '$2y$10$ane2aHSrcKAgu.3OEp9MP.ouO0hRv/i.LpYncs2zkXsWw/DZDitPi', 'Admin', 'Admin@yahtzee.com', 4485996848653619, '1888-12-12', 'Portugal', 0x696d672f7573657250696374757265732f61646d696e2e706e67, '', 0, '', '', 1, 'xDhawY8eC5SfP3qYPgcU6QkkRYoY7cur4xEvhTUNx3lglqdu7Qyt3i4aOy7w', '2015-01-03 23:47:44', '2015-01-04 01:58:52'),
(60, 'user1', '$2y$10$AIluj9U9oAovuQuAeiFJP.eMlHqnTjxbcsxxBKQ/ODRawNZhigtay', 'TheUser', 'user@yahtzee.com', 4716876333538015, '1888-12-12', 'Portugal', 0x696d672f7573657250696374757265732f64656661756c74506963747572652e706e67, '', 0, '', '', 1, 'N8zytlUPZklJUeUCouGls04u0jRrnD1yLwfSaHgfABfVSfxiqImDufnfIlWo', '2015-01-03 23:51:32', '2015-01-04 16:18:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_games`
--

CREATE TABLE IF NOT EXISTS `users_games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(10) unsigned NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `users_games_game_id_foreign` (`game_id`),
  KEY `users_games_user_foreign` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=313 ;

--
-- Extraindo dados da tabela `users_games`
--

INSERT INTO `users_games` (`id`, `game_id`, `user`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 1, 'joao', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 1, 'fdfdhgfhgf', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 1, 'dfsdfsdfdsf1', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 2, 'dfsdfsdfdsf1', 400, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 2, 'coiso', 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 2, 'fdfdhgfhgf', 600, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 2, 'coiso123', 700, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 4, 'Mateussadsdf', 800, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 4, 'joao', 900, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 6, 'coiso123', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 6, 'Mateussadsdf', 1100, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, 4, 'joao', 1200, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bans`
--
ALTER TABLE `bans`
  ADD CONSTRAINT `bans_banned_user_foreign` FOREIGN KEY (`banned_user`) REFERENCES `users` (`username`);

--
-- Limitadores para a tabela `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_game_owner_foreign` FOREIGN KEY (`game_owner`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `games_winner_foreign` FOREIGN KEY (`winner`) REFERENCES `users` (`username`);

--
-- Limitadores para a tabela `plays`
--
ALTER TABLE `plays`
  ADD CONSTRAINT `plays_current_player_foreign` FOREIGN KEY (`current_player`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `plays_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Limitadores para a tabela `users_games`
--
ALTER TABLE `users_games`
  ADD CONSTRAINT `users_games_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `users_games_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
