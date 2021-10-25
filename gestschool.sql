-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 25 oct. 2021 à 11:44
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestschool`
--

-- --------------------------------------------------------

--
-- Structure de la table `p3_g3_comptes`
--

CREATE TABLE `p3_g3_comptes` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `famille_id` int(11) DEFAULT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `enseignant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `p3_g3_comptes`
--

INSERT INTO `p3_g3_comptes` (`id`, `username`, `email`, `password`, `type`, `status`, `famille_id`, `eleve_id`, `enseignant_id`) VALUES
(1, 'admin', 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, NULL, NULL, NULL),
(105, 'profdemaths', '0@mail.com', '202cb962ac59075b964b07152d234b70', 'enseignant', 0, NULL, NULL, 3),
(106, 'profdhistgeo', '1@mail.com', '202cb962ac59075b964b07152d234b70', 'enseignant', 1, NULL, NULL, 4),
(107, 'prof de philo', '2@mail.com', '202cb962ac59075b964b07152d234b70', 'enseignant', 1, NULL, NULL, 5),
(114, 'proffrancais', '9@mail.com', '202cb962ac59075b964b07152d234b70', 'enseignant', 1, NULL, NULL, 6),
(168, 'familleDupont', 'f1@mail.com', '202cb962ac59075b964b07152d234b70', 'famille', 1, 15, NULL, NULL),
(169, 'Fdf', 'dd@dfg.gt', '0c1b3cd3c593655ff1fab8837a79d235', 'eleve', 1, 15, 84, NULL),
(172, 'elevetest', 'elevetest@mail.com', '202cb962ac59075b964b07152d234b70', 'eleve', 1, 15, 87, NULL),
(173, 'eleve2test', 'eleve2test@mail.com', '202cb962ac59075b964b07152d234b70', 'eleve', 1, 15, 88, NULL),
(177, 'new', 'new@mail.com', '202cb962ac59075b964b07152d234b70', 'famille', 1, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `p3_g3_controle`
--

CREATE TABLE `p3_g3_controle` (
  `idControle` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `note` float NOT NULL,
  `commentaire` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `enseignant_id` int(11) DEFAULT NULL,
  `eleve_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `p3_g3_controle`
--

INSERT INTO `p3_g3_controle` (`idControle`, `intitule`, `note`, `commentaire`, `date`, `enseignant_id`, `eleve_id`) VALUES
(14, 't bb', 19, 'SSE IPPP', '2021-10-21', 3, 87);

-- --------------------------------------------------------

--
-- Structure de la table `p3_g3_cursus`
--

CREATE TABLE `p3_g3_cursus` (
  `idCursus` int(11) NOT NULL,
  `matiere` varchar(50) NOT NULL,
  `annee` varchar(100) NOT NULL,
  `frais` varchar(100) NOT NULL,
  `enseignant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `p3_g3_cursus`
--

INSERT INTO `p3_g3_cursus` (`idCursus`, `matiere`, `annee`, `frais`, `enseignant_id`) VALUES
(24, 'maths', '2021-2022', '2500€', 6),
(25, 'histoire-geo', '2021-2022', '3000€', 3),
(26, 'francais', '2021-2022', '4000€', 5),
(28, 'philo', '2021-2022', '10000€', 6),
(29, 'chimie', '2021-2022', '3000€', 4),
(31, 'anglais', '2021-2022', '3500€', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `p3_g3_eleve`
--

CREATE TABLE `p3_g3_eleve` (
  `idEleve` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `famille_id` int(11) DEFAULT NULL,
  `cursus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `p3_g3_eleve`
--

INSERT INTO `p3_g3_eleve` (`idEleve`, `username`, `email`, `password`, `type`, `famille_id`, `cursus_id`) VALUES
(84, 'Fdf', 'dd@dfg.gt', '0c1b3cd3c593655ff1fab8837a79d235', 'eleve', 15, NULL),
(87, 'elevetest', 'elevetest@mail.com', '202cb962ac59075b964b07152d234b70', 'eleve', 15, 25),
(88, 'eleve2test', 'eleve2test@mail.com', '202cb962ac59075b964b07152d234b70', 'eleve', 15, 29);

-- --------------------------------------------------------

--
-- Structure de la table `p3_g3_enseignant`
--

CREATE TABLE `p3_g3_enseignant` (
  `idEnseignant` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `p3_g3_enseignant`
--

INSERT INTO `p3_g3_enseignant` (`idEnseignant`, `username`, `email`, `password`, `type`) VALUES
(3, 'enseignant3', '3@mail.com', '202cb962ac59075b964b07152d234b70', 'enseignant'),
(4, 'enseignant4', '4@mail.com', '202cb962ac59075b964b07152d234b70', 'enseignant'),
(5, 'enseignant5', '5@mail.com', '202cb962ac59075b964b07152d234b70', 'enseignant'),
(6, 'enseignant6', '6@mail.com', '202cb962ac59075b964b07152d234b70', 'enseignant');

-- --------------------------------------------------------

--
-- Structure de la table `p3_g3_famille`
--

CREATE TABLE `p3_g3_famille` (
  `idFamille` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `p3_g3_famille`
--

INSERT INTO `p3_g3_famille` (`idFamille`, `username`, `email`, `password`, `type`) VALUES
(15, 'familleDupont', 'f1@mail.com', '202cb962ac59075b964b07152d234b70', 'famille'),
(19, 'new', 'new@mail.com', '202cb962ac59075b964b07152d234b70', 'famille');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `p3_g3_comptes`
--
ALTER TABLE `p3_g3_comptes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eleve_id` (`eleve_id`),
  ADD KEY `enseignant_id` (`enseignant_id`),
  ADD KEY `comptes_ibfk_3` (`famille_id`);

--
-- Index pour la table `p3_g3_controle`
--
ALTER TABLE `p3_g3_controle`
  ADD PRIMARY KEY (`idControle`),
  ADD KEY `eleve_id` (`eleve_id`),
  ADD KEY `enseignant_id` (`enseignant_id`);

--
-- Index pour la table `p3_g3_cursus`
--
ALTER TABLE `p3_g3_cursus`
  ADD PRIMARY KEY (`idCursus`),
  ADD KEY `enseignant_id` (`enseignant_id`);

--
-- Index pour la table `p3_g3_eleve`
--
ALTER TABLE `p3_g3_eleve`
  ADD PRIMARY KEY (`idEleve`),
  ADD KEY `cursus_id` (`cursus_id`),
  ADD KEY `famille_id` (`famille_id`);

--
-- Index pour la table `p3_g3_enseignant`
--
ALTER TABLE `p3_g3_enseignant`
  ADD PRIMARY KEY (`idEnseignant`);

--
-- Index pour la table `p3_g3_famille`
--
ALTER TABLE `p3_g3_famille`
  ADD PRIMARY KEY (`idFamille`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `p3_g3_comptes`
--
ALTER TABLE `p3_g3_comptes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT pour la table `p3_g3_controle`
--
ALTER TABLE `p3_g3_controle`
  MODIFY `idControle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `p3_g3_cursus`
--
ALTER TABLE `p3_g3_cursus`
  MODIFY `idCursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `p3_g3_eleve`
--
ALTER TABLE `p3_g3_eleve`
  MODIFY `idEleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `p3_g3_enseignant`
--
ALTER TABLE `p3_g3_enseignant`
  MODIFY `idEnseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `p3_g3_famille`
--
ALTER TABLE `p3_g3_famille`
  MODIFY `idFamille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `p3_g3_comptes`
--
ALTER TABLE `p3_g3_comptes`
  ADD CONSTRAINT `p3_g3_comptes_ibfk_1` FOREIGN KEY (`eleve_id`) REFERENCES `p3_g3_eleve` (`idEleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p3_g3_comptes_ibfk_2` FOREIGN KEY (`enseignant_id`) REFERENCES `p3_g3_enseignant` (`idEnseignant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p3_g3_comptes_ibfk_3` FOREIGN KEY (`famille_id`) REFERENCES `p3_g3_famille` (`idFamille`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `p3_g3_controle`
--
ALTER TABLE `p3_g3_controle`
  ADD CONSTRAINT `p3_g3_controle_ibfk_1` FOREIGN KEY (`eleve_id`) REFERENCES `p3_g3_eleve` (`idEleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p3_g3_controle_ibfk_2` FOREIGN KEY (`enseignant_id`) REFERENCES `p3_g3_enseignant` (`idEnseignant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `p3_g3_cursus`
--
ALTER TABLE `p3_g3_cursus`
  ADD CONSTRAINT `p3_g3_cursus_ibfk_1` FOREIGN KEY (`enseignant_id`) REFERENCES `p3_g3_enseignant` (`idEnseignant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `p3_g3_eleve`
--
ALTER TABLE `p3_g3_eleve`
  ADD CONSTRAINT `p3_g3_eleve_ibfk_6` FOREIGN KEY (`cursus_id`) REFERENCES `p3_g3_cursus` (`idCursus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p3_g3_eleve_ibfk_8` FOREIGN KEY (`famille_id`) REFERENCES `p3_g3_famille` (`idFamille`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
