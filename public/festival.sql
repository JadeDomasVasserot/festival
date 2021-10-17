-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 13 oct. 2021 à 14:13
-- Version du serveur :  8.0.26
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `festival`
--

-- --------------------------------------------------------

--
-- Structure de la table `chanson`
--

DROP TABLE IF EXISTS `chanson`;
CREATE TABLE IF NOT EXISTS `chanson` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomChanson` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomAlbum` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` time NOT NULL,
  `genre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chanson`
--

INSERT INTO `chanson` (`id`, `nomChanson`, `nomAlbum`, `duree`, `genre`) VALUES
(1, 'Tombé', 'Pyramide', '03:37:00', 'Variété Française'),
(2, 'Si t\'es pas là', 'Pyramide', '03:59:00', 'Variété Française'),
(3, 'Aimer à mort', 'Joie de vivre', '02:52:00', 'Pop'),
(4, 'Jour 1', 'Chambre 12', '03:43:00', 'Pop française'),
(5, 'Dingue', 'Chasseur d\'étoiles', '05:28:00', 'Variété'),
(6, 'En feu', 'L\'Everest', '03:58:00', 'variété'),
(7, 'L\'instinct', 'L\'avenir', '03:38:00', 'Variété'),
(8, 'Le soldat', 'Vieillir avec toi', '03:53:00', 'Variété'),
(9, 'Les gens qu\'on aime', 'Promesse', '03:24:00', 'Variété'),
(10, '4 mots sur un piano', 'Si on chantait plus fort', '04:17:00', 'Variété');

-- --------------------------------------------------------

--
-- Structure de la table `chanson_chanteur`
--

DROP TABLE IF EXISTS `chanson_chanteur`;
CREATE TABLE IF NOT EXISTS `chanson_chanteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idChanson` int NOT NULL,
  `idChanteur` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IdChansonFk_ChansonChanteur` (`idChanson`),
  KEY `IdChanteurFk_ChansonChanteur` (`idChanteur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chanson_chanteur`
--

INSERT INTO `chanson_chanteur` (`id`, `idChanson`, `idChanteur`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 5, 5),
(6, 6, 5),
(7, 7, 1),
(8, 8, 1),
(9, 9, 4),
(10, 10, 4);

-- --------------------------------------------------------

--
-- Structure de la table `chanteur`
--

DROP TABLE IF EXISTS `chanteur`;
CREATE TABLE IF NOT EXISTS `chanteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomScene` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `sexe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chanteur`
--

INSERT INTO `chanteur` (`id`, `nomScene`, `prenom`, `nom`, `dateNaissance`, `sexe`) VALUES
(1, 'Florent Pagny', 'Florent', 'Pagny', '1961-11-06', 'Homme'),
(2, 'M.POKORA', 'Matthieu', 'Tota', '1985-09-26', 'Homme'),
(3, 'Louane', 'Anne', 'Peichert', '1996-11-26', 'Femme'),
(4, 'Patrick Fiori', 'Patrick', 'Chouchayan', '1969-09-23', 'Homme'),
(5, 'Soprano', 'Saïd', 'M\'Roumbaba', '1979-01-14', 'Homme');

-- --------------------------------------------------------

--
-- Structure de la table `chanteur_festival`
--

DROP TABLE IF EXISTS `chanteur_festival`;
CREATE TABLE IF NOT EXISTS `chanteur_festival` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idChanteur` int NOT NULL,
  `idFestival` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IdFestivalFk_ChanteurFestival` (`idFestival`),
  KEY `IdChanteurFk_ChanteurFestival` (`idChanteur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chanteur_festival`
--

INSERT INTO `chanteur_festival` (`id`, `idChanteur`, `idFestival`) VALUES
(1, 1, 3),
(2, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` text NOT NULL,
  `nom` text NOT NULL,
  `dateNaissance` date NOT NULL,
  `adresse` text NOT NULL,
  `email` text NOT NULL,
  `telephone` int NOT NULL,
  `sexe` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `prenom`, `nom`, `dateNaissance`, `adresse`, `email`, `telephone`, `sexe`) VALUES
(1, 'Pacôme', 'GUILLERMIN', '2000-03-16', '40 rue francisque Jomard 6900 Oullins', 'c.guillermin@epsi.fr', 781893199, 'H'),
(2, 'Jade', 'DOMAS-VASSEROT', '2002-06-10', '30 rue du docteur Bonhomme, Étage 1\r\nÉtage 1', 'jadedomasvasserot@gmail.com', 781278622, 'F'),
(3, 'Test', 'Effacer/edit', '1912-05-10', 'RUE DES AMOURS', 'test-edit.effacer@gmail.com', 758964845, 'H'),
(4, 'Erine', 'Berard', '2012-10-11', 'RUE de la paix', 'erine.berard@epsi.fr', 658479658, 'F'),
(5, 'Antoine', 'BRUNEAUX', '2021-09-12', 'Rue du Japon', 'antoine.bruneau@epsi.fr', 658479586, 'H'),
(6, 'Jade', 'DOMAS', '2016-06-10', 'test', 'jade.test@gmail.com', 781597854, 'femme');

-- --------------------------------------------------------

--
-- Structure de la table `client_festival`
--

DROP TABLE IF EXISTS `client_festival`;
CREATE TABLE IF NOT EXISTS `client_festival` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idClient` int NOT NULL,
  `idFestival` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IdClientFk_ClientFestival` (`idClient`),
  KEY `IdFestivalFk_ClientFestival` (`idFestival`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client_festival`
--

INSERT INTO `client_festival` (`id`, `idClient`, `idFestival`) VALUES
(2, 2, 2),
(3, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `festival`
--

DROP TABLE IF EXISTS `festival`;
CREATE TABLE IF NOT EXISTS `festival` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomFestival` text NOT NULL,
  `dateDebut` datetime NOT NULL,
  `lieu` text NOT NULL,
  `genre` text NOT NULL,
  `nbPlaces` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `festival`
--

INSERT INTO `festival` (`id`, `nomFestival`, `dateDebut`, `lieu`, `genre`, `nbPlaces`) VALUES
(1, 'Francofolies', '2022-07-13 19:00:00', 'La rochelle', 'Tous genre', 1500),
(2, 'TomorrowLand', '2022-07-22 20:15:00', 'Belgique', 'Fous Furieux', 1750),
(3, 'Festival Rock in Rio', '2022-06-18 16:45:00', 'Lisbonne', 'Rock', 1386);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chanson_chanteur`
--
ALTER TABLE `chanson_chanteur`
  ADD CONSTRAINT `IdChansonFk_ChansonChanteur` FOREIGN KEY (`idChanson`) REFERENCES `chanson` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `IdChanteurFk_ChansonChanteur` FOREIGN KEY (`idChanteur`) REFERENCES `chanteur` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `chanteur_festival`
--
ALTER TABLE `chanteur_festival`
  ADD CONSTRAINT `IdChanteurFk_ChanteurFestival` FOREIGN KEY (`idChanteur`) REFERENCES `chanteur` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `IdFestivalFk_ChanteurFestival` FOREIGN KEY (`idFestival`) REFERENCES `festival` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `client_festival`
--
ALTER TABLE `client_festival`
  ADD CONSTRAINT `IdClientFk_ClientFestival` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `IdFestivalFk_ClientFestival` FOREIGN KEY (`idFestival`) REFERENCES `festival` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
