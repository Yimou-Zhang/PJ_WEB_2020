-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  sam. 18 avr. 2020 à 10:07
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

DROP TABLE IF EXISTS `enchere`;
CREATE TABLE IF NOT EXISTS `enchere` (
  `idEnchere` int(255) NOT NULL AUTO_INCREMENT,
  `idItem` int(255) NOT NULL,
  `idsUtilisateur` mediumtext NOT NULL,
  `tempsRestant` time NOT NULL,
  `prixMaximum` int(255) NOT NULL,
  PRIMARY KEY (`idEnchere`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `idItem` int(255) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `photos` blob NOT NULL,
  `video` blob NOT NULL,
  `vente` set('enchere','meilleureOffre') NOT NULL,
  `estVenteImmediate` tinyint(1) NOT NULL,
  `categorie` set('meuble','tableau','bijouterie') NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` int(255) NOT NULL,
  PRIMARY KEY (`idItem`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `idLivraison` int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(255) UNSIGNED NOT NULL,
  `idItem` int(255) UNSIGNED NOT NULL,
  `nomPrenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `codePostal` int(5) UNSIGNED NOT NULL,
  `pays` varchar(255) NOT NULL,
  `numTelephone` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idLivraison`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `meilleureoffre`
--

DROP TABLE IF EXISTS `meilleureoffre`;
CREATE TABLE IF NOT EXISTS `meilleureoffre` (
  `idMeilleureOffre` int(255) NOT NULL AUTO_INCREMENT,
  `idItem` int(255) NOT NULL,
  `idsUtilisateur` int(255) NOT NULL,
  `prixActuel` int(255) NOT NULL,
  PRIMARY KEY (`idMeilleureOffre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `idPaiement` int(255) NOT NULL,
  `idUtilisateur` int(255) NOT NULL,
  `typeCarte` set('visa','mastercard','americanExpert','paypal') NOT NULL,
  `nomSurCarte` varchar(255) NOT NULL,
  `dateExpiration` date NOT NULL,
  `codeSecurite` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `idPanier` int(255) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(255) NOT NULL,
  `idsItem` int(255) NOT NULL,
  `sousTotal` int(255) NOT NULL,
  `nbItems` int(255) NOT NULL,
  PRIMARY KEY (`idPanier`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `photoProfil` blob NOT NULL,
  `type` set('acheteur','vendeur','administrateur') NOT NULL,
  `imagePrefere` blob NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `email`, `motDePasse`, `pseudo`, `photoProfil`, `type`, `imagePrefere`) VALUES
(51, 'sthsdfg', 'yh', 'qgedrthe', '', '', '', 'vendeur', ''),
(52, 'qsfgqrg', 'hsedrfg', 'sedrtfhsedt', '', 'qsdfh', '', 'vendeur', ''),
(55, '', '', 'qsd', '', '', '', 'vendeur', ''),
(57, '', '', 'No', '', '', '', 'acheteur', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
