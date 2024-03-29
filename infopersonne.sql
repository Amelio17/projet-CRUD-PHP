-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 27 mars 2024 à 20:29
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `infopersonne`
--

-- --------------------------------------------------------

--
-- Structure de la table `perso`
--

DROP TABLE IF EXISTS `perso`;
CREATE TABLE IF NOT EXISTS `perso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `race` varchar(100) DEFAULT NULL,
  `paysOrigine` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `perso`
--

INSERT INTO `perso` (`id`, `nom`, `prenom`, `age`, `race`, `paysOrigine`) VALUES
(1, 'amelio', 'koto', 10, 'betsileo', 'fianarantso'),
(3, 'rabe', 'beloha', 13, 'betsimisaraka', 'mada'),
(4, 'gd', 'hsd', 3, 'dcqc', 'aaeae'),
(5, 'hguiegh', 'gggd', 7, 'dcvdsv', 'ggsdg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
