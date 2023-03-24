-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 mars 2023 à 17:50
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `epidemia`
--

-- --------------------------------------------------------

--
-- Structure de la table `ajout_pays`
--

CREATE TABLE `ajout_pays` (
  `id` int(6) NOT NULL,
  `pays` varchar(25) NOT NULL,
  `villes` varchar(30) NOT NULL,
  `hopitaux` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ajout_pays`
--

INSERT INTO `ajout_pays` (`id`, `pays`, `villes`, `hopitaux`) VALUES
(2, 'Mali', 'bamako', 'Hospital Ibrahim b keita'),
(3, 'Gambie', 'banjul', 'Hôpital royal victoria');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `type` varchar(15) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`type`, `login`, `password`) VALUES
('ADMIN', 'ADMIN2023', '446210d850d7aadf022a3ce00d8d3bc919af52d9'),
('AG-SANTE', 'AG-01-2023', 'f098c58e337797dd6f7a73a16888b4456b7ee0f6'),
('AG-SANTE', 'AGS-02-2023', '20eabe5d64b0e216796e834f52d61fd0b70332fc');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id` int(9) NOT NULL,
  `matricule` varchar(25) NOT NULL,
  `nomp` varchar(20) NOT NULL,
  `prenomp` varchar(25) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `sexe` char(1) NOT NULL,
  `res_analyse` varchar(20) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `villes` varchar(30) NOT NULL,
  `nb_persons` int(6) NOT NULL,
  `hopitaux` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `matricule`, `nomp`, `prenomp`, `tel`, `sexe`, `res_analyse`, `pays`, `villes`, `nb_persons`, `hopitaux`) VALUES
(1, 'mat#@24:03:23 10:03:32', 'dext', 'dext', '+22178533236', 'H', 'Negatif', 'Sénégal', 'Dakar', 0, 'Hôpital Abass Ndao'),
(2, 'mat#@24:03:23 10:03:32', 'dext', 'dext', '+22178533236', 'H', 'Negatif', 'Sénégal', 'Dakar', 0, 'Hôpital Abass Ndao');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ajout_pays`
--
ALTER TABLE `ajout_pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ajout_pays`
--
ALTER TABLE `ajout_pays`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
