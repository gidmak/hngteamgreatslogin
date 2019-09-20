-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2019 at 01:57 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team_greats`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(2, 'Olagoke Abel Olayinka', 'admin@gmail.com', '$2y$10$j7jUS0orbsBDuOBA4soJPeuubSsseupreUw03w3ENH20QUgCBPjYy', '2019-09-19 13:37:50'),
(3, 'Ade', 'olagoke@gmail.com', '$2y$10$56FMQIYiPozlW/f8viFcGeJ2HrACu/IE4bnIfhF.91NA6D/Owe9/G', '2019-09-19 14:06:34'),
(4, 'Olagoke Abel O', 'olagokeabel@gmail.com', '$2y$10$W2e9TLBWtIv.c1krlx3r5OMEIdJ.ZrIfgJCB7Dm1lXhGUcvtx4XpW', '2019-09-19 14:11:23'),
(5, 'jerry', 'jerry@gmail.com', '$2y$10$D4uOM/93/Ws.XAEorm7OLexFYcgcIly3p9fxVQHssT4lUPvxCQKXi', '2019-09-19 14:14:40'),
(6, 'rita', 'rita@gmail.com', '$2y$10$oiRdUjlHbB26AuT71X7VUORkDt6T3PFam8hhn3kK.iRb3qc.5f7QG', '2019-09-19 14:17:58'),
(7, 'frank', 'frank@gmail.com', '$2y$10$jHbHpFyZC7qj1UztBp/Q1.rmfdWL1FKbwQk/7OKW2Qw1EE4u0ZUQ.', '2019-09-19 14:27:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
