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
(1, 'Omelette Gourmande', 10, 10, 'Coupez l''oignon en fines lamelles et les tomates cerises en deux. Faites revenir le tout dans une poêle avec un filet d''huile d''olive. Parallèlement, cassez les oeufs dans un bol et battez les jusqu''à ce que le jaune et le blanc soient bien mélangés. ajoutez le sel, le poivre et les herbes de provence et mélangez. Versez les oeufs dans la poêle et laissez cuire 8 à 15 minutes selon vos préférences. ', '- 1 oignon\r\n- 10 tomates cerises \r\n- 4 oeufs\r\n- 1 pincée de sel, poivre et herbes de provence', 600, 20, 14, 10, 3),
(2, 'Burger Diététique au poulet et tzatziki', 5, 15, 'Faites chauffer 1 cuillère à soupe d''huile d''olive dans une poêle.Faites revenir les rondelles de concombre dans la poêle 1-2 minutes de chaque côté jusqu''à ce qu''elles soient dorées.Retirez de la poêle et réservez de côté.Faites cuire l''escalope de poulet à sec dans la poêle, 4-5 minutes de chaque côté.Salez, poivrez et retirez du feu.Faites griller le pain à hamburger au grille-pain.Pendant ce temps, mélangez le tzatziki avec le jus de citron vert dans un bol.Placez les rondelles de concombre sur le talon du pain à hamburger.Recouvrez avec l''escalope de poulet grillée puis le tzatziki au citron.Fermez le burger avec la couronne du pain.Dégustez sans attendre.', '- 1 pain à hamburger\r\n- 1 escalope de poulet nature ou aux herbes \r\n- 3-4 rondelles de concombre \r\n- 2 cuillères à soupe de tzatziki \r\n- 1 cuillère à café de jus de citron vert \r\n- huile d''olive \r\n- sel, poivre \r\n', 450, 35, 16, 9, 4),
(3, 'Spaghetti à la carbonara', 15, 15, 'Faites cuire les spaghetti selon les instructions du paquet. Pendant ce temps, dans une poêle, faites revenir les lardons jusqu''à ce qu''ils soient croustillants. Dans un bol, mélangez les œufs, le parmesan, le sel et le poivre. Une fois les spaghetti cuits, égouttez-les en conservant une tasse d''eau de cuisson. Incorporez les spaghetti et l''eau de cuisson réservée aux œufs battus et mélangez rapidement pour éviter que les œufs ne cuisent. Ajoutez les lardons, mélangez à nouveau et servez immédiatement.', '- 400 g de spaghetti\r\n- 150 g de lardons\r\n- 3 œufs\r\n- 50 g de parmesan râpé\r\n- Sel, poivre', 600, 28, 70, 25, 4),
(4, 'Salade de quinoa, avocat et feta', 20, 0, 'Rincez le quinoa sous l''eau froide puis faites-le cuire selon les instructions du paquet. Laissez refroidir. Pendant ce temps, coupez l''avocat en dés, émiettez la feta et hachez finement l''oignon rouge. Dans un grand saladier, mélangez le quinoa, l''avocat, la feta, l''oignon rouge, les tomates cerises coupées en deux et le jus de citron. Assaisonnez avec de l''huile d''olive, du sel et du poivre. Mélangez bien et servez.', '- 150 g de quinoa\r\n- 1 avocat\r\n- 100 g de feta\r\n- 1 oignon rouge\r\n- 200 g de tomates cerises\r\n- 1 citron (jus)\r\n- Huile d''olive\r\n- Sel, poivre', 450, 15, 50, 22, 7),
(5, 'Soupe de légumes maison', 20, 40, 'Dans une grande casserole, faites chauffer l''huile d''olive et ajoutez l''oignon, l''ail, les carottes et le céleri. Faites revenir à feu moyen pendant 5 minutes. Ajoutez les pommes de terre, les tomates, le bouillon de légumes, le thym, le laurier, le sel et le poivre. Portez à ébullition, puis réduisez le feu et laissez mijoter pendant 30 minutes ou jusqu''à ce que les légumes soient tendres. Retirez les feuilles de laurier et servez la soupe bien chaude.', '- 2 cuillères à soupe d''huile d''olive\r\n- 1 oignon haché\r\n- 2 gousses d''ail émincées\r\n- 2 carottes coupées en dés\r\n- 2 branches de céleri coupées en dés\r\n- 2 pommes de terre coupées en dés\r\n- 400 g de tomates en dés\r\n- 1 litre de bouillon de légumes\r\n- 1 cuillère à café de thym séché\r\n- 2 feuilles de laurier\r\n- Sel, poivre', 200, 4, 30, 7, 5),
(6, 'Poulet au curry et lait de coco', 15, 25, 'Dans une grande poêle, faites chauffer l''huile d''olive et ajoutez l''oignon haché. Faites revenir pendant 5 minutes jusqu''à ce qu''il soit tendre. Ajoutez le poulet coupé en dés et faites-le dorer de tous les côtés. Ajoutez la pâte de curry, le gingembre râpé et l''ail émincé, puis remuez pour bien enrober le poulet. Versez le lait de coco et les tomates en dés dans la poêle. Portez à ébullition, puis réduisez le feu et laissez mijoter pendant 15 minutes ou jusqu''à ce que le poulet soit bien cuit. Servez le poulet au curry avec du riz basmati cuit et des feuilles de coriandre fraîches.', '- 1 cuillère à soupe d''huile d''olive\r\n- 1 oignon haché\r\n- 500 g de poulet coupé en dés\r\n- 2 cuillères à soupe de pâte de curry\r\n- 1 cuillère à café de gingembre râpé\r\n- 2 gousses d''ail émincées\r\n- 400 ml de lait de coco\r\n- 400 g de tomates en dés\r\n- Riz basmati cuit pour servir\r\n- Feuilles de coriandre fraîches pour servir', 620, 40, 45, 28, 4);

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
