-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 18 avr. 2023 à 14:26
-- Version du serveur : 10.3.36-MariaDB-0+deb10u2
-- Version de PHP : 7.3.31-1~deb10u2
drop database if exists smarteats;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `smart2093867`
--
CREATE DATABASE IF NOT EXISTS `smarteats` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `smarteats`;

-- --------------------------------------------------------

--
-- Structure de la table `exercice`
--

CREATE TABLE `exercice` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `descript` text NOT NULL,
  `duree` int(11) NOT NULL,
  `objectif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `exercice`
--

INSERT INTO `exercice` (`ID`, `nom`, `descript`, `duree`, `objectif`) VALUES
(1, 'Développé couché', 'Couché avec les deux épaules sur le banc, fléchissez vos coudes pour ramener la barre au niveau du bas de votre poitrine puis poussez la jusqu''à l''extension quasiment complète de vos bras. Effectuez cet exercice 3 à 4 fois à raison de 10 à 15 répétitions.', 15, 'Développement des pectoraux, des épaules et des triceps'),
(2, 'Tirage vertical', 'Asseyez vous devant une poulie haute à laquelle vous avez accroché une barre longue. Attrapez la barre en pronation et tirez la jusqu''au haut de votre poitrine en utilisant vos dorsaux. Laissez ensuite la barre remonter et recommencez. Effectuez cet exercice 3 à 4 fois à raison de 10 à 15 répétitions.', 15, 'Développement des grands dorsaux.'),
(3, 'Jumping jacks', 'Sautez en écartant les jambes et en levant les bras. Sautez encore une fois mais cette fois-ci en abaissant les bras et en joignant vos jambes. Continuez à sauter en alternant ces positions pendant 1 minute. prenez ensuite 30 secondes de repos et continuez autant que vous le pouvez avec le même temps de repos. ', 20, 'Développe votre endurance, votre capacité cardio-vasculaire');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `ID` int(11) NOT NULL,
  `ID_utilisateur` int(11) NOT NULL,
  `ID_recette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `info_nutri`
--

CREATE TABLE `info_nutri` (
  `ID` int(11) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `code_barres` varchar(255) NOT NULL,
  `calories` int(11) NOT NULL,
  `proteines` int(11) NOT NULL,
  `glucides` int(11) NOT NULL,
  `graisses` int(11) NOT NULL,
  `fibres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `ID` int(11) NOT NULL,
  `nom_recette` varchar(255) NOT NULL,
  `temps_preparation` int(11) NOT NULL,
  `temps_cuisson` int(11) NOT NULL,
  `instructions_preparation` text NOT NULL,
  `liste_ingredients` text NOT NULL,
  `calories_par_portion` int(11) NOT NULL,
  `proteines_par_portion` int(11) NOT NULL,
  `glucides_par_portion` int(11) NOT NULL,
  `graisses_par_portion` int(11) NOT NULL,
  `fibres_par_portion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`ID`, `nom_recette`, `temps_preparation`, `temps_cuisson`, `instructions_preparation`, `liste_ingredients`, `calories_par_portion`, `proteines_par_portion`, `glucides_par_portion`, `graisses_par_portion`, `fibres_par_portion`) VALUES
(1, 'Omelette Gourmande', 10, 10, 'Coupez l\'oignon en fines lamelles et les tomates cerises en deux. Faites revenir le tout dans une poêle avec un filet d\'huîle d\'olive. Parallèlement, cassez les oeufs dans un bol et battez les jusqu\'à ce que le jaune et le blanc soient bien mélangés. ajoutez le sel, le poivre et les herbes de provence et mélangez. Versez les oeufs dans la poêle et laissez cuire 8 à 15 minutes selon vos préférences. ', '- 1 oignon\r\n- 10 tomates cerises \r\n- 4 oeufs\r\n- 1 pincée de sel, poivre et herbes de provence', 600, 20, 14, 10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID` int(11) NOT NULL,
  `TYPE` int(11) NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `DATENAISSANCE` date NOT NULL,
  `POIDS` decimal(4,1) NOT NULL,
  `TAILLE_CM` decimal(4,1) NOT NULL,
  `SEXE` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `TYPE`, `MAIL`, `PASSWORD`, `NOM`, `PRENOM`, `DATENAISSANCE`, `POIDS`, `TAILLE_CM`, `SEXE`) VALUES
(1, 0, 'louis.criquillion@gmail.com', '$2y$10$McWm13yhvFLOkbvRcKkniOjPjmTVu8jKQjgpnlZnvtzl/0hX0aWIe', 'Criquillion', 'Louis', '2002-10-18', 69.0, 169.0, 'H'),
(2, 0, 'odoakd@gmail.com', '$2y$10$QOWJFPOO.N3zUQ7RzX6oCet35vaapkhmEfTjvEmX3A817G.u/3DJy', 'Criquillion', 'Louis', '1993-02-26', 123.0, 123.0, 'H'),
(3, 0, 'manon240204@gmail.com', '$2y$10$cz/JZ5cZMITkDYShg5fF.eLjBcMjAbRBe3WoZ/kINoOBbEyzE.03C', 'de Heinzelin', 'Manon', '2004-02-24', 55.0, 167.0, 'F'),
(4, 0, 'jules.criquillion@gmail.com', '$2y$10$f762whkx2RTgFZ4A/nSwoeX1.VjyNlg2bFoa5VfrObKqNXRtximJe', 'Criquillion ', 'Jules', '2007-09-25', 70.0, 172.0, 'H'),
(5, 0, 'christelleingnomeriello@gmail.com', '$2y$10$DqYcpXWquB62F6/Qlecl3eP/hmdPhNtCZoCHdyK/Wl72lzAmZ8Gni', 'Ingnomeriello ', 'Christelle ', '1970-10-09', 87.0, 160.0, 'F');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `exercice`
--
ALTER TABLE `exercice`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_utilisateur` (`ID_utilisateur`),
  ADD KEY `ID_recette` (`ID_recette`);

--
-- Index pour la table `info_nutri`
--
ALTER TABLE `info_nutri`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `code_barres` (`code_barres`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `exercice`
--
ALTER TABLE `exercice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `info_nutri`
--
ALTER TABLE `info_nutri`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`ID_utilisateur`) REFERENCES `utilisateurs` (`ID`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`ID_recette`) REFERENCES `recettes` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
