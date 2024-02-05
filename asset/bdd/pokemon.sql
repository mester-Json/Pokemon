-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 05 fév. 2024 à 11:54
-- Version du serveur : 10.5.21-MariaDB-0+deb11u1
-- Version de PHP : 8.3.2-1+0~20240120.16+debian11~1.gbpb43448

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Pokemon`
--

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `atk` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pokemon`
--

INSERT INTO `pokemon` (`id`, `name`, `hp`, `atk`, `type`, `img`) VALUES
(1, 'Bulbasaur', '45', '49', 'Plante', '/images/001.png'),
(2, 'Ivysaur', '60', '62', 'Plante', 'images/002.png'),
(3, 'Venusaur', '80', '82', 'Plante', 'images/003.png'),
(4, 'Oddish', '45', '50', 'Plante', 'images/043.png'),
(5, 'Gloom', '60', '65', 'Plante', 'images/044.png'),
(6, 'Charmander', '39', '52', 'Feu', 'images/004.png'),
(7, 'Charmeleon', '58', '64', 'Feu', 'images/005.png'),
(8, 'Charizard', '78', '84', 'Feu', 'images/006.png'),
(9, 'Vulpix', '38', '41', 'Feu', 'images/037.png'),
(10, 'Ninetales', '73', '76', 'Feu', 'images/038.png'),
(11, 'Squirtle', '44', '48', 'Eau', 'images/007.png'),
(12, 'Wartortle', '59', '63', 'Eau', 'images/008.png'),
(13, 'Blastoise', '79', '83', 'Eau', 'images/009.png'),
(14, 'Psyduck', '50', '52', 'Eau', 'images/054.png'),
(15, 'Golduck', '80', '82', 'Eau', 'images/055.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
