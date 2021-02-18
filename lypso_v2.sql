-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 18 fév. 2021 à 10:37
-- Version du serveur :  10.3.25-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lypso_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `responsable_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `department`
--

INSERT INTO `department` (`id`, `nom`, `responsable_id`) VALUES
(6, 'Direction', 1),
(7, 'Développement', 1),
(8, 'Comptabilité', 2),
(9, 'Commercial', 3);

-- --------------------------------------------------------

--
-- Structure de la table `reason`
--

CREATE TABLE `reason` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reason`
--

INSERT INTO `reason` (`id`, `label`) VALUES
(4, 'AA'),
(3, 'CC'),
(1, 'CP'),
(2, 'CS'),
(5, 'RTT');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `department_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `lastname`, `firstname`, `department_id`, `active`) VALUES
(1, 'usersio', '0ec960d4105605608894658ed65e81a85a34839e', 'SIO', 'User', 6, 1),
(4, 'albinm', '0ec960d4105605608894658ed65e81a85a34839e', 'ALBIN', 'Michel', 7, 1),
(5, 'feram', '7d471deedae687d5f48fbfcaa3972d1bda1078f5', 'FERA', 'Magalie', 7, 1),
(6, 'lauterl', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'LAUTER', 'Laurent', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vacation`
--

CREATE TABLE `vacation` (
  `id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT '0',
  `reason_id` int(11) NOT NULL,
  `comentary` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vacation`
--

INSERT INTO `vacation` (`id`, `start`, `end`, `user_id`, `status`, `reason_id`, `comentary`) VALUES
(37, '2021-02-18', '2021-02-19', 1, '1', 3, ''),
(50, '2021-02-18', '2021-02-24', 1, '2', 4, ''),
(58, '2021-02-01', '2021-02-08', 4, '1', 4, ''),
(59, '2021-02-24', '2021-02-27', 4, '1', 5, ''),
(65, '2021-02-23', '2021-03-31', 4, '2', 5, 'Voila quoi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `responsable_id` (`responsable_id`);

--
-- Index pour la table `reason`
--
ALTER TABLE `reason`
  ADD PRIMARY KEY (`id`),
  ADD KEY `label` (`label`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `department_id` (`department_id`) USING BTREE;

--
-- Index pour la table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vacation_ibfk_2` (`reason_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `reason`
--
ALTER TABLE `reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `vacation`
--
ALTER TABLE `vacation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Contraintes pour la table `vacation`
--
ALTER TABLE `vacation`
  ADD CONSTRAINT `vacation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `vacation_ibfk_2` FOREIGN KEY (`reason_id`) REFERENCES `reason` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
